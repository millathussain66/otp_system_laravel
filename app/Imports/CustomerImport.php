<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


use DB;

class CustomerImport implements ToCollection
{
    public function startRow(): int
    {
        return 3;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            DB::Table('userinfo')->insert([
                'name' => $row[0],
                'email' => $row[1],
                'password' => $row[2],
                'current_team_id' => $row[3],
                
            ]);
        }
    }
}
