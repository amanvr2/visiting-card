<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\LinkMail;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mapper;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { 
        $this->middleware('auth');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()                                 // view dashboard Page
    { 
      $freedata = DB::select('select * from freetrial where user_id = ?', [auth()->user()->id]);
      $paiddata = DB::select('select * from paid where user_id = ?', [auth()->user()->id]);
      $freecount = count($freedata);
      $paidcount = count($paiddata);

      
      if($paidcount == 1)
      {
        $count = $paidcount;
      }
      else
      {
        $count = $freecount;
      }
      return view('dashboard', ['count' => $count]);
    }


    public function add()                                 // view AddDetails page
    { 
      $data = DB::select('select * from data where user_id = ?', [auth()->user()->id]);
      $vcf = DB::select('select * from vcf where user_id = ?', [auth()->user()->id]);
      $count = count($data);
      $vcfcount = count($vcf);
      return view('addDetails', ['data' => $data])->with('count',$count)->with('vcfcount',$vcfcount); 
    }


    public function store(Request $req)                  // store basic details
    {
        $businessname = $req->input('businessname');
        $tagline = $req->input('tagline');
        $name = $req->input('name');
        $number = $req->input('number'); 
        $email = $req->input('email');
        $address = $req->input('address');
        $pincode = $req->input('pincode');
        $fbLink = $req->input('fbLink');
        $twitterLink = $req->input('twitterLink');
        $instaLink = $req->input('instaLink');
        $linkedinLink = $req->input('linkedinLink');
        $aboutUs = $req->input('aboutUs');
        $website = $req->input('website');
       

        $user_id = auth()->user()->id;

        $file1 = $req->file('image1');
        $destinationPath = 'public/img/';
        $originalFile1 = $file1->getClientOriginalName();
        $file1->move($destinationPath, $originalFile1);

        $file3 = $req->file('image2');
        $destinationPath = 'public/Cover-img/';
        $originalFile3 = $file3->getClientOriginalName();
        $file3->move($destinationPath, $originalFile3);

        $idCheck = DB::select('select * from data where user_id = ?', [$user_id]);
        $idCount = 0;

        foreach ($idCheck as $luck) {

          $idCount++;
        }
 

        if($idCount == 0){

        $link = "/card/" . $user_id;

        setcookie('name',$name);
        setcookie('email',$email);
        setcookie('link',$link);

      

        $data = array('businessname' => $businessname, 'tagline' => $tagline, 'name' => $name, 'number' => $number, 'email' => $email, 'address' => $address,'pincode' => $pincode,'website'=>$website, 'fbLink' => $fbLink, 'twitterLink' => $twitterLink, 'instaLink' => $instaLink, 'linkedinLink' => $linkedinLink,'aboutUs' => $aboutUs, 'image1' => $originalFile1,'image2' => $originalFile3, 'link' => $link, 'user_id' => $user_id);
       

   

        DB::table('data')->insert($data);

        session()->flash('success', 'Data has been saved successfully !'); 

        return back();

        }

        else{

          session()->flash('error', 'Data Already Present !');

          return back();
        }

    

    }

    public function service_store(Request $req)                         // store services
    {
        // $title = $req->input('title');
        // $body = $req->input('body');
        // $user_id = auth()->user()->id;

        // $data = array('title' => $title, 'body' => $body, 'user_id' => $user_id);

        // DB::table('services')->insert($data);

        // session()->flash('service_success', 'Service Added !'); 
 
        // return back();
        $title = $req->input('title');
        $body = $req->input('body');
        $user_id = auth()->user()->id;
       
        foreach($title as $item=>$v){
        $data = array('title' => $title[$item], 'body' => $body[$item], 'user_id' => $user_id); 
        DB::table('services')->insert($data);
        
        }
        session()->flash('service_success', 'Service Added !'); 

        return redirect('/add#service-form');
       

    }

    public function project_store(Request $req)                             // store Projects
    {
        $title = $req->input('title');
        $body = $req->input('body');

        $file = $req->file('image');
        $file1 = $req->file('image1');

        if($req->hasFile('image')){
          $arr_len = count($file);

          for($i=0; $i<$arr_len; $i++){
            $destinationPath = 'public/project-images/';
            $size[$i] = $file[$i]->getSize();
            if($size[$i] < 200000){

              $originalFile[$i] = $file[$i]->getClientOriginalName();
              $file[$i]->move($destinationPath, $originalFile[$i]);
            }
            else
            {
              return redirect('/add')->with('image_error', 'large'); 
            }
          }
        }

        if($req->hasFile('image1')){
          $arr_len1 = count($file1);
          for($i=0; $i<$arr_len1; $i++){

            $destinationPath = 'public/project-images/';

            $size1[$i] = $file1[$i]->getSize();
            if($size1[$i] < 200000){

              $originalFile1[$i] = $file1[$i]->getClientOriginalName();
              $file1[$i]->move($destinationPath, $originalFile1[$i]);

            }
            else{return redirect('/add')->with('image_error', 'large'); }

          } 
        }

        $user_id = auth()->user()->id;

        foreach($title as $item=>$v){
  

          if($file == NULL && $file1 == NULL){
            $data = array('title' => $title[$item], 'body' => $body[$item], 'user_id' => $user_id);
          }

          elseif($file == NULL){
            $data = array('title' => $title[$item], 'body' => $body[$item],'image1' => $originalFile1[$item], 'user_id' => $user_id);
          }
     
          elseif($file1 == NULL){
            $data = array('title' => $title[$item], 'body' => $body[$item],'image' => $originalFile[$item], 'user_id' => $user_id);
          }

          elseif($file != NULL && $file1 != NULL){
            
            $data = array('title' => $title[$item], 'body' => $body[$item], 'image' => $originalFile[$item],'image1' => $originalFile1[$item], 'user_id' => $user_id);
          }


          DB::table('projects')->insert($data);
        }

        session()->flash('project_success', 'Data has been saved successfully !'); 

        return redirect('/add#project-form');

       
    }

    public function vcf(Request $req)                                   // store VCF
    {
      $vcf = $req->file('vcf');

      $user_id = auth()->user()->id;

      $destinationPath = 'public/vcfnew/';
      $originalFile = $vcf->getClientOriginalName();
      $imageext = $vcf->getClientOriginalExtension();
      $newName = rand(12456, 999999).".".$imageext;
      $vcf->move($destinationPath, $newName);

      $data = array('name' => $newName, 'user_id' => $user_id); 
      DB::table('vcf')->insert($data);

      session()->flash('vcfUploaded', 'VCF Uploaded Successfully !'); 
      return back();

    }


    public function link(Request $req)                                // send card link
    {

        $name = $_COOKIE['name'];
        $email = $_COOKIE['email']; 
        $link = $_COOKIE['link']; 

        $maildata = array(

          'name' => $name, 
          'link' => $link,

        );

        Mail::to($email)->send(new LinkMail($maildata));

        session()->flash('email', 'Link Sent !'); 

        return back();
    }


    public function myDetails(){                                    // view mydetails page


      $id = auth()->user()->id;
      $data = DB::select('select * from data where user_id = ?', [$id]);
      $serviceData = DB::select('select * from services where user_id = ?', [$id]);
      $projectData = DB::select('select * from projects where user_id = ?', [$id]);
      $vcfData = DB::select('select * from vcf where user_id = ?', [$id]);

      $idCount = 0;

        foreach ($data as $luck) {

          $idCount++;
        } 
      $serviceCount = count($serviceData);
      $projectCount = count($projectData);
      return view('mydetails', ['data' => $data], ['serviceData' => $serviceData])->with('projectData', $projectData)->with('vcfData',$vcfData)->with('idCount',$idCount)->with('serviceCount',$serviceCount)->with('projectCount',$projectCount);

 


    }

    public function showbasicDetails($id){                                // show basic details for edit

      $data = DB::select('select * from data where id = ?', [$id]); 
          
      return view('updatedetails', ['data' => $data]);  

  


    }

    public function editbasicDetails(Request $req,$id){                   // edit basic details


        $businessname = $req->input('businessname');
        $tagline = $req->input('tagline');
        $name = $req->input('name');
        $number = $req->input('number');
        $email = $req->input('email');
        $address = $req->input('address');
        $website = $req->input('website');
        $fbLink = $req->input('fbLink');
        $twitterLink = $req->input('twitterLink');
        $instaLink = $req->input('instaLink');
        $linkedinLink = $req->input('linkedinLink');
        $aboutUs = $req->input('aboutUs');

        
        $file1 = $req->file('image1');
        if($file1 != NULL){
          $destinationPath = 'public/img/';
          $originalFile1 = $file1->getClientOriginalName();
          $file1->move($destinationPath, $originalFile1);
        }

        $file3 = $req->file('image2');
        if($file3 != NULL){
        $destinationPath = 'public/Cover-img/';
        $originalFile3 = $file3->getClientOriginalName();
        $file3->move($destinationPath, $originalFile3);
        }

  
          
        DB::update('update data set businessname = ? where id = ?',[$businessname,$id]); 
        DB::update('update data set tagline = ? where id = ?',[$tagline,$id]); 
        DB::update('update data set name = ? where id = ?',[$name,$id]); 
        DB::update('update data set number = ? where id = ?',[$number,$id]); 
        DB::update('update data set email = ? where id = ?',[$email,$id]); 
        DB::update('update data set address = ? where id = ?',[$address,$id]); 
        DB::update('update data set website = ? where id = ?',[$website,$id]); 
        DB::update('update data set fbLink = ? where id = ?',[$fbLink,$id]); 
        DB::update('update data set twitterLink = ? where id = ?',[$twitterLink,$id]); 
        DB::update('update data set instaLink = ? where id = ?',[$instaLink,$id]); 
        DB::update('update data set linkedinLink = ? where id = ?',[$linkedinLink,$id]); 
        DB::update('update data set aboutUs = ? where id = ?',[$aboutUs,$id]);
        if($file1 != NULL){
          DB::update('update data set image1 = ? where id = ?',[$originalFile1,$id]);
        }
        if($file3 != NULL){
        DB::update('update data set image2 = ? where id = ?',[$originalFile3,$id]);
        }
     
        return redirect('/my-details')->with('updated', 'Details has been updated successfully'); 

  


    }
 

    public function showserviceDetails($id){                                    // show service details for edit

      $data = DB::select('select * from services where id = ?', [$id]); 
          
      return view('updateServicedetails', ['data' => $data]);   

    }


    public function editserviceDetails(Request $req,$id){                       // edit services


        $title = $req->input('title');
        $body = $req->input('body');
       
          
        DB::update('update services set title = ? where id = ?',[$title,$id]); 
        DB::update('update services set body = ? where id = ?',[$body,$id]); 
    
        return redirect('/my-details')->with('updated', 'Details has been updated successfully'); 

    }

    public function showprojectDetails($id){                                  // show projects for edit

      $data = DB::select('select * from projects where id = ?', [$id]); 
          
      return view('updateProjectdetails', ['data' => $data]);    

    }


    public function editprojectDetails(Request $req,$id){                     // edit projects


        $title = $req->input('title');
        $body = $req->input('body');
        $file = $req->file('image');
        if($file != NULL){
          $destinationPath = 'public/project-images/';
          $originalFile = $file->getClientOriginalName();
          $file->move($destinationPath, $originalFile);
        }
        $file1 = $req->file('image1');
        if($file1 != NULL){
          $destinationPath = 'public/project-images/';
          $originalFile1 = $file1->getClientOriginalName();
          $file1->move($destinationPath, $originalFile1);
        }





        DB::update('update projects set title = ? where id = ?',[$title,$id]); 
        DB::update('update projects set body = ? where id = ?',[$body,$id]); 
        if($file != NULL){
        DB::update('update projects set image = ? where id = ?',[$originalFile,$id]); 
        
        }
        if($file1 != NULL){
        DB::update('update projects set image1 = ? where id = ?',[$originalFile1,$id]); 
        
        }



        return redirect('/my-details')->with('updated', 'Details has been updated successfully'); 
    }


    public function editvcf(Request $req,$id){                              // edit VCF

      $file = $req->file('vcf');

      $destinationPath = 'public/vcfnew/';
      $originalFile = $file->getClientOriginalName();
      $file->move($destinationPath, $originalFile);

      DB::update('update vcf set name = ? where id = ?',[$originalFile,$id]); 
      return redirect('/my-details')->with('updated', 'Details has been updated successfully'); 




    }

























































    // public function test(Request $req)
    // {
    //     $title = $req->input('title');
    //     $body = $req->input('body');
    //     $user_id = auth()->user()->id;
       
    //     foreach($title as $item=>$v){
    //     $data = array('title' => $title[$item], 'body' => $body[$item], 'user_id' => $user_id); 
    //     DB::table('services')->insert($data);
        
    //     }
    //     echo "done";
       
    
    // }

    // public function view()
    // {

    //     $stud = DB::select('select * from data');
    //     return view('viewfile', ['stud' => $stud]);
    // }

    // public function map()
    // {
    //     Mapper::map(53.381128999999990000, -1.470085000000040000);

    //     return view('map');
    // }



    // public function whtsapp(Request $req)
    // {

    //     $whtsAPPno = $req->input('whtsappNo');

    //     setcookie('whtsAPPno', $whtsAPPno);

    //     $wtsap = $_COOKIE['whtsAPPno'];

    //     // $li = 'https://api.whatsapp.com/send?phone={{ $whtsAPPno }}&text=This%20is%20my%20digital%20Visiting%20card:%20https://www.juzvcard.com/golukoshti265462.%20Reply%20with%20Hi%20incase%20link%20is%20not%20clickable';

    //     return redirect()->back()->with('wtsap', [$wtsap]);

    // }

   
}
