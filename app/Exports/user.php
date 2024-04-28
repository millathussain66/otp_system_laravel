<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;


use DB;

class user implements FromView,ShouldAutoSize,WithEvents,WithStyles,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function view(): View
    {
        return view('PdfExcel::user', [
            'user' => DB::Table('users')->limit(100)->get(['name','email','password','current_team_id'])
        ]);
    }

    public function title(): string
    {
        return 'User';
    }

    public function registerEvents(): array
    {
        return [
          
                AfterSheet::class => function(AfterSheet $event) {
                    $sheet = $event->sheet; 

                    // Boder//
    
                    $sheet->getStyle('A1:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
                        ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    
                    // Optionally, you can set the border color
                    $sheet->getStyle('A1:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
                        ->getBorders()->getAllBorders()->getColor()->setARGB('000000');
                        // font size//
                    $sheet->getDelegate()->getStyle('A1:'.$sheet->getHighestColumn() . $sheet->getHighestRow())->getFont()->setSize(11);
                    
                    // height and width//

                    $sheet->getColumnDimension('A')->setWidth(10);
                    $sheet->getRowDimension(1)->setRowHeight(30); 

                   // $sheet->getActiveSheet()->getStyle('A1:'.$sheet->getHighestColumn() . $sheet->getHighestRow())->getAlignment()->setWrapText(true);
           
                       
                },
    
            
        ];
    }

    public function styles(Worksheet $sheet)
  {
            return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true],
        
        ],
           
        ];

  }
}
