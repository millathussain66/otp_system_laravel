<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

use DB;

class LoanImport implements ToCollection
{
    public function startRow(): int
    {
        return 3;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            DB::Table('loan')->insert([
                'apporval_no' => $row[0],
                'cus_id' => $row[1],
                'loan_apporval_date' => $row[2],
                'review_date' => $row[3],
                'proposal_type' => $row[3],
                
            ]);
        }
    }
}
