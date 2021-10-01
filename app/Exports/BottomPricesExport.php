<?php

namespace App\Exports;

use App\BottomPrice;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


use Maatwebsite\Excel\Events\AfterSheet;

class BottomPricesExport implements

ShouldAutoSize,
WithMapping,
WithHeadings,
WithEvents,
FromQuery
{

    use Exportable;


    public function query()
    {
        // return BottomPrice::all();
        return BottomPrice::query();
    }

    public function map($BottomPrice):array
    {
        return[
            $BottomPrice->id,
            $BottomPrice->code,
            $BottomPrice->name,
            $BottomPrice->model,
            $BottomPrice->division,
            $BottomPrice->brand,
            $BottomPrice->fb,
            $BottomPrice->sb,
            $BottomPrice->tb,
            $BottomPrice->lb,
            $BottomPrice->rt
        ];
    }
    public function headings(): array
    {
        return [
            '#',
            'Code',
            'Name',
            'Model',
            'Division',
            'Brand',
            'First (fb)',
            'Second (sb)',
            'Third (tb)',
            'Last (lb)',
            'Retail+VAT (RT)'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:K1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFF0000'],
                    ]
                ]);


            }


        ];
    }
}
