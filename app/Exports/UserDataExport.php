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
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithChunkReading;

use DB;

class UserDataExport implements FromView,ShouldAutoSize,WithEvents,WithStyles,FromQuery,WithChunkReading
{
    
    use Exportable;

    public function view(): View
    {
        return view('PdfExcel::usersview', [
            'excle' => DB::Table('customerexcle')->get(['Particulars','File_Submission','CPV_sent','CPV_sending_g','no_of_items','Instation','outstati','within_sla','within_sla1','sla_breac','sla_breac_h','cpv_problem','cpv_problem_incomplete','cus_is_in','cus_is_ina','cpv_customer','cpv_customer_issue','total_mcq','total_s','Report_not_receive','report_not_receive_a'])
        ]);
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

  public function chunkSize(): int
    {
        return 100; 
    }


}
