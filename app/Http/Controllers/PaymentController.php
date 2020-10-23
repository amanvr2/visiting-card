<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
 
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

}
