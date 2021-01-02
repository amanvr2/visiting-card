<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use PDF;
use App\User; 
use App\Exports\Data;
use Intervention\Image\ImageManagerStatic as Image;

class UserdataController extends Controller
{
  public function fetch(){

    return Excel::download(new Data, 'invoices.xlsx');

    // $data = DB::select('select * from freetrial LEFT JOIN data USING (user_id)');

    // $data_array[] = array('Name', 'email', 'number', 'date');
    //  foreach($data as $customer)
    //  {
    //   $data_array[] = array(
    //    'Name'  => $customer->name,
    //    'email' => $customer->email,
    //    'number' => $customer->number,
    //    'date' => $customer->dateTime,
      
    //   );
    //  }
    //  Excel::download('Customer Data', function($excel) use ($data_array){
    //   $excel->setTitle('Customer Data');
    //   $excel->sheet('Customer Data', function($sheet) use ($data_array){
    //    $sheet->fromArray($data_array, null, 'A1', false, false);
    //   });
    //  })->download('xlsx');
 
    

    // return view('test')->with('data', $data);

    
  }

  public function go(Request $req){

    $file = $req->file('image');
    $destinationPath = 'public/setimage/';
    $originalFile = $file->getClientOriginalName();
    $setfile = Image::make($file->getRealPath());   

    $setfile->resize(300, 300);
    $setfile->save($destinationPath. $originalFile);

    $data=array('image'=>$originalFile);

    DB::table('image')->insert($data);
 

  }

}
  