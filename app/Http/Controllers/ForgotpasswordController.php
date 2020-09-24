<?php

namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;



class ForgotpasswordController extends Controller
{
  public function otp_sent(Request $req)
    {

        $no = $req->input('no');
        
        $MobileConfirmationCode = rand(1001, 9999);

        $curl_url = 'http://bulksmsindia.mobi/sendurlcomma.aspx';
        $ch = curl_init();
        $curlConfig = array(
            CURLOPT_URL => $curl_url,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => array(
                'user' => '20083281',
                'pwd' => 'Mudra@1234',
                'senderid' => 'MYCRED',
                'mobileno' => $no,
                'msgtext' => 'Hello, OTP is ' . $MobileConfirmationCode,
            ),
        );
        curl_setopt_array($ch, $curlConfig);
        if ($result = curl_exec($ch)) {
            curl_close($ch);
            setcookie('MobileConfirmationCode', $MobileConfirmationCode);

        }
        $test = DB::select('select * from data where number = ?', [$no]);
        foreach($test as $user)
        {
          $uid = $user->user_id; 
          Cookie::queue('uid', $uid);


        }





        return view('forgotPassword.otp-page');

    }

    public function verify(Request $req)

    {

      $otp = $req->input('otp');

      if ($_COOKIE['MobileConfirmationCode'] == $otp) {


        return view('forgotPassword.changePassword');




      }

      else{return redirect('/otp-sent')->with('message', 'Wrong OTP'); }


    }

    public function change(Request $req){

      $pass = $req->input('pass');
      $pass = Hash::make($pass);
      $uid = Cookie::get('uid');
      DB::update('update users set password = ? where id = ?',[$pass,$uid]); 
      echo "done";





    }








}
