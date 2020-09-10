<?php

namespace App\Http\Controllers;

use DB;
use Mapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ViewController extends Controller
{
    public function dynamicview($id)
    {

        $stud = DB::select('select * from data where user_id = ?', [$id]);
        $serviceData = DB::select('select * from services where user_id = ?', [$id]);
        $projectData = DB::select('select * from projects where user_id = ?', [$id]);

        $adress = DB::select('select * from data where user_id = ?', [$id]);
       
        foreach ($adress as $test) {

          $add = $test->address;
          $pincode = $test->pincode; 

          $full = $add.$pincode;
        }
        Mapper::location($full)->map(['zoom' => 15, 'marker' => true, 'type' => 'NORMAL']);

        $date = DB::select('select * from payments where user_id = ?', [$id]);
        foreach($date as $vali){

          $regdate = $vali->dateTime;
          $regsdate = strtotime($regdate);
      
          $d2 = ceil(( time() - $regsdate )/60/60/24);
          // echo "There are " . $d2 ." days left"; 

        }

        if($d2 <= 15)
        {
          return view('viewfile', ['stud' => $stud], ['serviceData' => $serviceData])->with('projectData', $projectData);
        }

        else{echo"account expired";}
    }

        
    public function contact_mail(Request $req, $email)
    {

        $maildata = array(

            'name' => $req->name,
            'email' => $req->email,
            'number' => $req->number,
            'subject' => $req->subject,

        );

        Mail::to($email)->send(new ContactMail($maildata));

        session()->flash('success', 'Your Message has been sent successfully !');

        return back();
    }
}
