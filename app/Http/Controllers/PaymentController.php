<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\User; 
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Storage\StorageClient;
 
class PaymentController extends Controller
{


  public function __construct()
  { 
    $this->middleware('auth');
  }


    public function hell()
    {

        $config = [
            'projectId' => 'shoperkart-rel',
            'keyFilePath' => 'C:\wamp64\www\V-card\app\Http\Controllers\Shoperkart-Rel-7ecad553a80e.json',
        ];

        $storage = new StorageClient($config);

        foreach ($storage->buckets() as $bucket) {
            printf('Bucket: %s' . PHP_EOL, $bucket->name());
        }
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

    foreach($data as $user){
      $pincode = $user->pincode;
    }
    $cityData = file_get_contents('http://postalpincode.in/api/pincode/'.$pincode);
    $cityData = json_decode($cityData);
    $city = $cityData->PostOffice['0']->Taluk;
    
 

    foreach($test as $user){
      $igst =  (0.18 * $user->planAmount);
      $cgst = $igst/2;
      $sgst = $cgst;
      $total = $igst + $user->planAmount;
      $grandTotal = round($total);
      if($total<$grandTotal){
      $roundOff = $grandTotal-$total;
      }
      else{
        $roundOff = $total-$grandTotal;
      }

      $orderid = $user->orderId;

    }
   

    $config = [
      'projectId' => 'shoperkart-rel',
      'keyFilePath' => 'C:\wamp64\www\V-card\app\Http\Controllers\Shoperkart-Rel-7ecad553a80e.json',
    ];

    $db = new FirestoreClient($config);
    $citiesRef = $db->collection('Mycredential');
    $query = $citiesRef->where('orderId', '=', $orderid);
    $snapshot = $query->documents();
 
    $count=0;

    foreach($snapshot as $user){
      $count++;

    }

    if($count == 1){

      foreach($snapshot as $user){
        $invoice_no = $user['invoice_no'];

      } 

      if($city == 'Delhi'){
        $igst = NULL;
        $pdf = PDF::loadView('pdf.customers', compact('data','test','igst','cgst','total','grandTotal','roundOff','invoice_no'));
        return $pdf->download('customers.pdf');
      }

      else{

        $cgst = NULL;

        $pdf = PDF::loadView('pdf.customers', compact('data','test','igst','cgst','total','grandTotal','roundOff','invoice_no'));
        return $pdf->download('customers.pdf');

      }




    }

    else{
      echo "Unable to get Invoice Number";
    }




    

    
  }

 

}
