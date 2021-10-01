<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\BottomPricesExport;
use Maatwebsite\Excel\Excel;

class BottomPricesExportController extends Controller
{
    //

    private $excel;
    public function __construct(Excel $excel)
    {
        $this->excel=$excel;
    }

    public function export()
    {
        return $this->excel->download(new BottomPricesExport,'BottomPrices.xlsx') ;
    }
}
