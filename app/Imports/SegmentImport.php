<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

use DB;

class SegmentImport implements ToCollection
{

    public function startRow(): int
    {
        return 2;
    }
   
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            DB::Table('segments')->insert([
                'name' => $row[0],        
            ]);
        }
    }
}
