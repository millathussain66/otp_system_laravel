<?php

namespace App\Imports;

use Illuminate\Support\Facades\DB;
use App\Models\userdata;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Http\Response;

class UsersImport implements ToModel, WithStartRow
//, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function startRow(): int
    {
        return 3;
    }

    public function rules(): array
    {
        return [
            '0' => 'required|in:January,February,March,April,May,June,July,August,September,October,November,December',
            '1' => 'required',
            '2' => 'required',

        ];
    }

    public function model(array $row)
    {


        $errors = [];

        $tableName = 'userdatas';

        $existingRecord = DB::table($tableName)
            ->select('Particulars')
            ->where('Particulars', $row[0])
            ->first();


        if ($existingRecord || ($row[0] === null)) {

            return null;
        }

        if (!in_array($row[0], [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ])) {
            $errors[] = 'Invalid "Particulars" value: ' . $row[0];
        }

        if (!preg_match('/^\d+%$/', $row[3])) {
            $errors[] = 'Invalid format for "CPV sending g" value: ' . $row[3];
        }

        if (!empty($errors)) {
            // If there are errors, throw an exception with all error messages.
            throw new \Exception(implode("\n", $errors));
        }

        return new userdata([

            "Particulars" => $row[0],
            "File_Submission" => $row[1],
            "CPV_sent" => $row[2],
            "CPV_sending_g" => $row[3],
            "no_of_items" => $row[4],
            "Instation" => $row[5],
            "outstati" => $row[6],
            "within_sla" => $row[7],
            "within_sla1" => $row[8],
            "sla_breac" => $row[9],
            "sla_breac_h" => $row[10],
            "cpv_problem" => $row[11],
            "cpv_problem_incomplete" => $row[12],
            "cus_is_in" => $row[13],
            "cus_is_ina" => $row[14],
            "cpv_customer" => $row[15],
            "cpv_customer_issue" => $row[16],
            "total_mcq" => $row[17],
            "total_s" => $row[18],
            "Report_not_receive" => $row[19],
            "report_not_receive_a" => $row[20],



        ]);
    }
}
