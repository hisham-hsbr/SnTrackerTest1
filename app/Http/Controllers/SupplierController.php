<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('permitTo:CreateSupplier', ['only' => 'create']);
        // $this->middleware('role:super');
        // $this->roleModel        = config('multiauth.models.role');
        // $this->adminModel       = config('multiauth.models.admin');
        // $this->permissionModel  = config('multiauth.models.permission');
    }

    public function getSuppliers()
    {
         // return Datatables::of(Supplier::query())->make(true);
         return DataTables::of(Supplier::query())

         ->editColumn('code', function (Supplier $Supplier) {
             return strtoupper($Supplier->code);
         })


         ->editColumn('name', function (Supplier $Supplier) {
             return strtoupper($Supplier->name);
         })

         ->setRowId(function ($Supplier) {
             return $Supplier->id;
         })

         ->addColumn('supplierEdit', function (Supplier $Supplier) {
             return '<a href="/admin/supplier/'.$Supplier->id.'/edit"><span class="fas fa-edit"></span></a>'. $Supplier->id;
         })



         // ->addColumn('columnEdit', '<a href="Supplier/edit"><span class="fas fa-edit"></span></a>')

         // ->editColumn('columnEdit', 'adminPanel.Supplier.columnEdit')
         ->rawColumns(['supplierEdit'])

         ->toJson();
    }
    public function index()
    {
        //
        $supplier = supplier::all();
        return view('adminPanel.supplier.show', compact('supplier'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adminPanel.supplier.create');
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
