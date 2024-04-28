<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiSheet implements WithMultipleSheets
{
   
    use Exportable;


   public function sheets(): array 
     {   
    //     return [
    //         'Customer' => new convents(),
    //         'Segment' => new segment(),
    //         'user' => new user(),
    //         'loan' => new loan(),
            

    //     ];
    // }

    $sheets = [];

   
    $sheets[] = new convents();
    $sheets[] = new segment();
    $sheets[] = new user();
    $sheets[] = new loan();
     

    return $sheets;

}

}
