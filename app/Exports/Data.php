<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\User;

class Data implements FromCollection,WithHeadings
{   
  public function headings(): array {
    return [
       "name","email","number","date"
    ];
  }

   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = DB::select('select name,email,number,dateTime from freetrial LEFT JOIN data USING (user_id)');

        // $records = DB::table('freetrial')->select('*')->get()->toArray();
        return collect($data);
    }

    
}
