<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
 
class PaymentController extends Controller
{
  public function freeTrial(){

    $id = auth()->user()->id;
    $data = array('planType' => 'free', 'user_id' => $id, 'success' => '1');

    DB::table('payments')->insert($data);

    return redirect('/add'); 




  }
}
