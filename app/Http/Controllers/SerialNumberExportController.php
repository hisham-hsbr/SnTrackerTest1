<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SerialNumbersExport;
use Maatwebsite\Excel\Excel;

class SerialNumberExportController extends Controller
{
    //
    private $excel;
    public function __construct(Excel $excel)
    {
        $this->excel=$excel;
    }

    public function export()
    {
        return $this->excel->download(new SerialNumbersExport,'SerialNumbers.xlsx') ;
    }
}
