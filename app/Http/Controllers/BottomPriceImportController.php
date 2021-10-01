<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\BottomPricesImport;
use Maatwebsite\Excel\Facades\Excel;

class BottomPriceImportController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permitTo:CreateProduct', ['only' => 'create']);
        // $this->middleware('role:super');
        $this->roleModel        = config('multiauth.models.role');
        $this->adminModel       = config('multiauth.models.admin');
        $this->permissionModel  = config('multiauth.models.permission');
    }

    public function show()
    {
        return view('adminPanel.BottomPrice.Import');
    }
    public function store(Request $request)
    {

        $file= $request->file('file');

        $import= new BottomPricesImport;

        $import->import($file);

       if($import->failures()->isNotEmpty()){
           return back()->withFailures($import->failures());
       }


        return back()->with('message_store', 'Excel File Imported Successfully');

    }

}
