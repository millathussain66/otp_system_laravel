<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiImport implements WithMultipleSheets
{
    
    public function sheets(): array
    {
        return [
            new ConventImport(),
            new SegmentImport(),
            new CustomerImport(),
            new LoanImport(),
        ];
    }
}
