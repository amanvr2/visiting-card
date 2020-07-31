<?php

namespace App\Http\Controllers;

use DB;
use Mapper;

class ViewController extends Controller
{
    public function dynamicview($id)
    {

        $stud = DB::select('select * from data where user_id = ?', [$id]);
        $serviceData = DB::select('select * from services where user_id = ?', [$id]);
        $projectData = DB::select('select * from projects where user_id = ?', [$id]);

        $adress = DB::select('select address from data where user_id = ?', [$id]);

        foreach ($adress as $test) {

            Mapper::location($test->address)->map(['zoom' => 15, 'marker' => true, 'type' => 'NORMAL']);

        }

        return view('viewfile', ['stud' => $stud], ['serviceData' => $serviceData])->with('projectData', $projectData);
    }
}
