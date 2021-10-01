<?php

namespace App\Exports;

use App\Product;

use App\SerialNumber;
use App\Supplier;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SerialNumbersExport implements FromCollection, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;


    public function __construct()
    {
        $this->products = Product::all();
        $this->suppliers = Supplier::all();
    //     foreach($this->products as $product)
    // {
    //     $this->$product->name;
    // }
    }

    public function collection()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        // $SerialNumber= SerialNumber::with(('products')->name());
        // dd($SerialNumber);

        return SerialNumber::all();
        // foreach ($SerialNumber->products as $product)
    }

    public function map($SerialNumber):array
    {
        foreach ($SerialNumber->products as $product)
        foreach ($SerialNumber->suppliers as $supplier)
        return[
            $SerialNumber->id,
            $SerialNumber->invoice,
            $SerialNumber->SerialNumber,

            $product->name,
            $supplier->name,

            $SerialNumber->date
        ];


    }

}
