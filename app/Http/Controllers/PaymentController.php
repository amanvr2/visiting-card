<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use PDF;
use App\User; 
use App\Exports\Data;
use Intervention\Image\ImageManagerStatic as Image;
 
class PaymentController extends Controller
{


  public function __construct()
  { 
    $this->middleware('auth');
  }

  public function freeTrial(){                                        // registers user in free trial plan

    $id = auth()->user()->id;
    $data = array('planType' => 'free', 'user_id' => $id);

    DB::table('freetrial')->insert($data);

    return redirect('/add'); 

  }

  public function refer($id){  


    $user_id = auth()->user()->id;

    $refer_id = $id;

    $data = array('user_id'=> $user_id, 'refer_id'=> $refer_id);

    DB::table('refferals')->insert($data);

    $link = 'https://shoperkart-rel.herokuapp.com/payments/mycredential?userId='.$user_id;

    return redirect($link);




  }


  public function paymentshistory(){

    $id=auth()->user()->id;

    $data= DB::table('payments')->where([['user_id', '=', [$id]],['success', '=', '1'],])->get();

   
    return view('payments')->with('data', $data);

  }

  public function export_pdf($invoiceId)
  {

    $id = auth()->user()->id;
    $data = DB::select('select * from data where user_id = ?',[$id]);
    $test = DB::select('select * from payments where id = ?',[$invoiceId]);
    foreach($test as $user){
      $igst =  (0.18 * $user->planAmount);
      $total = $igst + $user->planAmount;
      $grandTotal = round($total);
      if($total<$grandTotal){
      $roundOff = $grandTotal-$total;
      }
      else{
        $roundOff = $total-$grandTotal;
      }

    }
    $pdf = PDF::loadView('pdf.customers', compact('data','test','igst','total','grandTotal','roundOff'));
    return $pdf->download('customers.pdf');

    // return view('pdf.customers')->with('data', $data);
  }

}
