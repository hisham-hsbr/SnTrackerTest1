<?php

namespace App\Http\Controllers;

use App\Product;
use App\Supplier;
use App\SerialNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SerialNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permitTo:CreateCustomer', ['only' => 'create']);
        // $this->middleware('role:super');
        $this->roleModel        = config('multiauth.models.role');
        $this->adminModel       = config('multiauth.models.admin');
        $this->permissionModel  = config('multiauth.models.permission');
    }



    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSerialNumbers()
    {
        // return Datatables::of(SerialNumber::query())->make(true);
        return Datatables::of(SerialNumber::query())

        ->addColumn('product', function(SerialNumber $SerialNumber) {

            foreach ($SerialNumber->products as $product)
            return $product->name ;


            return $SerialNumber->products->name ;
        })
          ->addColumn('code', function(SerialNumber $SerialNumber) {

            foreach ($SerialNumber->products as $product)
            return $product->code ;


            return $SerialNumber->products->code ;
        })
        ->addColumn('supplier', function(SerialNumber $SerialNumber) {

            foreach ($SerialNumber->Suppliers as $Supplier)
            return $Supplier->name ;


            return $SerialNumber->Suppliers->name ;
        })

         ->editColumn('date', function(SerialNumber $SerialNumber) {
            $datenow = Carbon::now();
            $date=Carbon::parse($SerialNumber['date']);
            // $date=Carbon::parse($SerialNumber['date']);
            $diffDate=$date->diffInDays($datenow);
            $remDate=365-$diffDate;

            return $remDate;

            // return Carbon::parse($SerialNumber['date'])->format('d-M-Y');
            // return $SerialNumber->date;
        })



        ->toJson()

        ;



    }



    public function index()
    {
        //
        $SerialNumbers = SerialNumber::paginate(15);
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('adminPanel.SerialNumber.show', compact('SerialNumbers', 'suppliers', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('adminPanel.SerialNumber.create', compact('products','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $this->validate($request, [
            'invoice' => 'required',
            'date' => 'required',
            'invoiceSupplier' => 'required',
            'serialNumber' => 'required|unique:serial_numbers',
            'remark' => 'required',
        ]);
        $serialNumber = new SerialNumber;
        $serialNumber->invoice = $request->invoice;
        $serialNumber->date = $request->date;
        $serialNumber->invoiceSupplier = $request->invoiceSupplier;
        $serialNumber->serialNumber = $request->serialNumber;
        $serialNumber->remark = $request->remark;

        $serialNumber->save();
        $serialNumber->products()->sync($request->products);
        $serialNumber->suppliers()->sync($request->suppliers);
        return redirect(route('SerialNumber.index'))->with('message', 'serialNumber Created Successfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SerialNumber  $serialNumber
     * @return \Illuminate\Http\Response
     */
    public function show(SerialNumber $serialNumber)
    {
        //
        $SerialNumbers = SerialNumber::all();
        return view('adminPanel.SerialNumbers.show', compact('SerialNumbers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SerialNumber  $serialNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(SerialNumber $serialNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SerialNumber  $serialNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SerialNumber $serialNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SerialNumber  $serialNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(SerialNumber $serialNumber)
    {
        //
    }
}
