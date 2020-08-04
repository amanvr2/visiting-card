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
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function store(Request $req)
    {
        $businessname = $req->input('businessname');
        $tagline = $req->input('tagline');
        $name = $req->input('name');
        $number = $req->input('number');
        $email = $req->input('email');
        $address = $req->input('address');
        $fbLink = $req->input('fbLink');
        $twitterLink = $req->input('twitterLink');
        $instaLink = $req->input('instaLink');
        $linkedinLink = $req->input('linkedinLink');
        $aboutUs = $req->input('aboutUs');
        $aboutusDesc = $req->input('aboutusDesc');
       

        $user_id = auth()->user()->id;

        $file1 = $req->file('image1');
        $destinationPath = 'public/img/';
        $originalFile1 = $file1->getClientOriginalName();
        $file1->move($destinationPath, $originalFile1);

        $file2 = $req->file('vcf');
        $destinationPath = 'public/vcf/';
        $originalFile2 = $file2->getClientOriginalName();
        $file2->move($destinationPath, $originalFile2);

        $idCheck = DB::select('select * from data where user_id = ?', [$user_id]);
        $idCount = 0;

        foreach ($idCheck as $luck) {

          $idCount++;
        }
 

        if($idCount == 0){

        $link = "/card/" . $user_id;

        $data = array('businessname' => $businessname, 'tagline' => $tagline, 'name' => $name, 'number' => $number, 'email' => $email, 'address' => $address, 'fbLink' => $fbLink, 'twitterLink' => $twitterLink, 'instaLink' => $instaLink, 'linkedinLink' => $linkedinLink,'aboutUs' => $aboutUs,'aboutusDesc' => $aboutusDesc, 'image1' => $originalFile1, 'vcf' => $originalFile2, 'link' => $link, 'user_id' => $user_id);

        DB::table('data')->insert($data);

        $maildata = array(

          'name' => $req->name,
          'link' => $link,

        );

        Mail::to($email)->send(new LinkMail($maildata));

        session()->flash('success', 'Data has been saved successfully !'); 

        return back();

        }

        else{

          session()->flash('error', 'Data Already Present !');

          return back();
        }

    

    }

    public function service_store(Request $req)
    {
        $title = $req->input('title');
        $body = $req->input('body');
        $user_id = auth()->user()->id;

        $data = array('title' => $title, 'body' => $body, 'user_id' => $user_id);

        DB::table('services')->insert($data);

        session()->flash('service_success', 'Data has been saved successfully !'); 

        return back();

       

    }

    public function project_store(Request $req)
    {
        $title = $req->input('title');
        $body = $req->input('body');

        $file = $req->file('image');
        $destinationPath = 'public/project-images/';
        $originalFile = $file->getClientOriginalName();
        $file->move($destinationPath, $originalFile);

        $user_id = auth()->user()->id;

        $data = array('title' => $title, 'body' => $body, 'image' => $originalFile, 'user_id' => $user_id);

        DB::table('projects')->insert($data);

        session()->flash('project_success', 'Data has been saved successfully !'); 

        return back();

        // $link = "https://" .$name."/". $user_id ;

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

    public function view()
    {

        $stud = DB::select('select * from data');
        return view('viewfile', ['stud' => $stud]);
    }

    public function map()
    {
        Mapper::map(53.381128999999990000, -1.470085000000040000);

        return view('map');
    }

    // public function whtsapp(Request $req)
    // {

    //     $whtsAPPno = $req->input('whtsappNo');

    //     setcookie('whtsAPPno', $whtsAPPno);

    //     $wtsap = $_COOKIE['whtsAPPno'];

    //     // $li = 'https://api.whatsapp.com/send?phone={{ $whtsAPPno }}&text=This%20is%20my%20digital%20Visiting%20card:%20https://www.juzvcard.com/golukoshti265462.%20Reply%20with%20Hi%20incase%20link%20is%20not%20clickable';

    //     return redirect()->back()->with('wtsap', [$wtsap]);

    // }

    // public function dynamicview($id)
    // {

    //     $stud = DB::select('select * from data where user_id = ?', [$id]);
    //     $serviceData = DB::select('select * from services where user_id = ?', [$id]);
    //     $projectData = DB::select('select * from projects where user_id = ?', [$id]);

    //     return view('viewfile', ['stud' => $stud], ['serviceData' => $serviceData])->with('projectData', $projectData);
    // }
}
