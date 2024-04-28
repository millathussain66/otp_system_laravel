<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


use DB;


class ConventImport implements ToCollection
{
    
    public function startRow(): int
    {
        return 2;
    }



    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            DB::Table('convents')->insert([
                'cus_id' => $row[0],
                'cus_name' => $row[1],
                'branch_name' => $row[2],
                'cu_type' => $row[3],
                'Business_Solicitor' => $row[4],
                'Customer_Segment_ID' => $row[5],
                
            ]);
        }
    }
}
