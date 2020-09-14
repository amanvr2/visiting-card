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
          Mapper::location($full)->map(['zoom' => 15, 'marker' => true, 'type' => 'NORMAL']);
        }
        

        $freeData = DB::select('select * from freetrial where user_id = ?', [$id]);
        $freecount = count($freeData);
        $paidData = DB::select('select * from paid where user_id = ?', [$id]);
        $paidcount = count($paidData);

        if($paidcount == 1){
          foreach($paidData as $vali){

          $regdate = $vali->dateTime;
          $regsdate = strtotime($regdate);
          // $testdate=strtotime("2021-09-16 13:21:17");
          $days = ceil(( time() - $regsdate )/60/60/24);
          // echo "Days over - " . $d2 ; 

          }
          if($days <= 365)
          {
            return view('viewfile', ['stud' => $stud], ['serviceData' => $serviceData])->with('projectData', $projectData);
          }

          else{echo"account expired";}

          // echo "paid ";


        }


        elseif($freecount == 1){

          foreach($freeData as $vali){

            $regdate = $vali->dateTime;
            $regsdate = strtotime($regdate);
        
            $daysLeft = ceil(( time() - $regsdate )/60/60/24);
            // echo "diff is " . $d2 ; 
           
          }
          if($daysLeft <= 15)
            {
              return view('viewfile', ['stud' => $stud], ['serviceData' => $serviceData])->with('projectData', $projectData);
            }

          else{echo"account expired";}

          // echo "free";
        }

          
        else{echo "Not registered";}


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
