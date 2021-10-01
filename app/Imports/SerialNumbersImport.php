<?php

namespace App\Imports;

use Carbon\Carbon;
use App\SerialNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;




class SerialNumbersImport implements
ToModel,
WithHeadingRow,
SkipsOnError,
WithValidation,
SkipsOnFailure

{

    use Importable,SkipsErrors,SkipsFailures;

    public function model(array $row)
    {

        return new SerialNumber([
            //

            'invoice'=>$row['invoice'],
            'invoicesupplier'=>$row['invoicesupplier'],
            'date'=>$row['date'],
            // 'date' => Carbon::parse($row['date']),

            'serialnumber'=>$row['serialnumber'],
            'remark'=>$row['remark'],

        ]);
    }
    public function rules():array
    {
        return [
            '*.serialnumber'=>['unique:serial_numbers,serialnumber']
        ];
    }
}


