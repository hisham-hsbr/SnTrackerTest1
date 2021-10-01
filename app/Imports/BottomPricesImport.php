<?php

namespace App\Imports;

use App\BottomPrice;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class BottomPricesImport implements
ToModel,
WithHeadingRow,
SkipsOnError,
WithValidation,
SkipsOnFailure
{
   use Importable,SkipsErrors,SkipsFailures;

    public function model(array $row)
    {

        return new BottomPrice([
            //

            'code'=>$row['code'],
            'name'=>$row['name'],
            'name'=>$row['model'],
            'name'=>$row['division'],
            'name'=>$row['brand'],
            'fb'=>$row['fb'],
            'sb'=>$row['sb'],
            'tb'=>$row['tb'],
            'lb'=>$row['lb'],
            'rt'=>$row['rt'],
            // 'status'=>$row[8],
        ]);
    }
    public function rules():array
    {
        return [
            '*.code'=>['unique:Bottom_Prices,code']
        ];
    }


}
