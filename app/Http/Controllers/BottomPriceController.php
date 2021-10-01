<?php

namespace App\Http\Controllers;

use App\BottomPrice;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;






class BottomPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permitTo:CreateBottomPrice', ['only' => 'create']);
        // $this->middleware('role:super');
        // $this->roleModel        = config('multiauth.models.role');
        // $this->adminModel       = config('multiauth.models.admin');
        // $this->permissionModel  = config('multiauth.models.permission');
    }





    public function getBottomPrices()
    {
        // return Datatables::of(BottomPrice::query())->make(true);
        return Datatables::of(BottomPrice::query())


        ->editColumn('code', function(BottomPrice $BottomPrice) {
            return strtoupper($BottomPrice->code);
        })

        ->editColumn('name', function(BottomPrice $BottomPrice) {
            return strtoupper($BottomPrice->name);
        })
        ->editColumn('model', function(BottomPrice $BottomPrice) {
            return strtoupper($BottomPrice->model);
        })
        ->editColumn('division', function(BottomPrice $BottomPrice) {
            return strtoupper($BottomPrice->division);
        })
        ->editColumn('brand', function(BottomPrice $BottomPrice) {
            return strtoupper($BottomPrice->brand);
        })
        ->setRowId(function ($BottomPrice) {
            return $BottomPrice->id;
        })

        ->setRowData([
            'data-rt' => 'SAR-{{$rt}}',
        ])
        // <a href="/BottomPrice/edit"><span class="fas fa-edit"></span></a>


        ->addColumn('columnEdit',function(BottomPrice $BottomPrice) {
            // return '<a href="/BottomPrice/edit"><span class="fas fa-edit"></span></a>', $BottomPrice->id;



            return '<a href="/admin/BottomPrice/id/edit"><span class="fas fa-edit"></span></a>'  .$BottomPrice->id;




        })



        // ->addColumn('columnEdit', '<a href="BottomPrice/edit"><span class="fas fa-edit"></span></a>')

        // ->editColumn('columnEdit', 'adminPanel.BottomPrice.columnEdit')
        ->rawColumns(['columnEdit'])


        ->toJson();

    }



    public function index()
    {
        //
        $BottomPrices = BottomPrice::paginate(15);
        return view('adminPanel.BottomPrice.show', compact('BottomPrices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adminPanel.BottomPrice.create');
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
        // $this->validate($request, [
        //     'code' => 'required',
        //     'name' => 'required',
        //     'model' => 'required',
        //     'division' => 'required',
        //     'brand' => 'required',
        //     'fb' => 'required',
        //     'sb' => 'required',
        //     'tb' => 'required',
        //     'lb' => 'required',
        //     'rt' => 'required',
        // ]);
        // $BottomPrice = new BottomPrice();
        // $BottomPrice->code = $request->code;
        // $BottomPrice->name = $request->name;
        // $BottomPrice->model = $request->model;
        // $BottomPrice->division = $request->division;
        // $BottomPrice->brand = $request->brand;
        // $BottomPrice->fb = $request->fb;
        // $BottomPrice->sb = $request->sb;
        // $BottomPrice->tb = $request->tb;
        // $BottomPrice->lb = $request->lb;
        // $BottomPrice->rt = $request->rt;
        // $BottomPrice->save();
        // return redirect(route('BottomPrice.index'))->with('message_store', 'BottomPrice Created Successfully');

        switch($request->submitbutton) {

            case 'save':


                //
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'model' => 'required',
            'division' => 'required',
            'brand' => 'required',
            'fb' => 'required',
            'sb' => 'required',
            'tb' => 'required',
            'lb' => 'required',
            'rt' => 'required',
        ]);
        $BottomPrice = new BottomPrice();
        $BottomPrice->code = $request->code;
        $BottomPrice->name = $request->name;
        $BottomPrice->model = $request->model;
        $BottomPrice->division = $request->division;
        $BottomPrice->brand = $request->brand;
        $BottomPrice->fb = $request->fb;
        $BottomPrice->sb = $request->sb;
        $BottomPrice->tb = $request->tb;
        $BottomPrice->lb = $request->lb;
        $BottomPrice->rt = $request->rt;
        $BottomPrice->save();
        return redirect(route('BottomPrice.index'))->with('message_store', 'BottomPrice Created Successfully');



            break;

            case 'save and new':
                $this->validate($request, [
                    'code' => 'required',
                    'name' => 'required',
                    'model' => 'required',
                    'division' => 'required',
                    'brand' => 'required',
                    'fb' => 'required',
                    'sb' => 'required',
                    'tb' => 'required',
                    'lb' => 'required',
                    'rt' => 'required',
                ]);
                $BottomPrice = new BottomPrice();
                $BottomPrice->code = $request->code;
                $BottomPrice->name = $request->name;
                $BottomPrice->model = $request->model;
                $BottomPrice->division = $request->division;
                $BottomPrice->brand = $request->brand;
                $BottomPrice->fb = $request->fb;
                $BottomPrice->sb = $request->sb;
                $BottomPrice->tb = $request->tb;
                $BottomPrice->lb = $request->lb;
                $BottomPrice->rt = $request->rt;
                $BottomPrice->save();
                return redirect(route('BottomPrice.create'))->with('message_store', 'BottomPrice Created Successfully');
            break;

            // case 'save and search':
            //     //action for save and search
            // break;

            // case 'apply':
            //     //action for save and route here
            // break;
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BottomPrice  $bottomPrice
     * @return \Illuminate\Http\Response
     */
    public function show(BottomPrice $bottomPrice)
    {
        //
    }

    public function columnEdit(BottomPrice $bottomPrice)
    {
        //
        // return view('adminPanel.BottomPrice.columnEdit', compact('BottomPrices'));
        return view('adminPanel.BottomPrice.columnEdit', compact('BottomPrice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BottomPrice  $bottomPrice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $BottomPrice = BottomPrice::where('id', $id)->first();
        // return view('adminPanel.BottomPrice.edit', compact('BottomPrice'));

        // $BottomPrice = BottomPrice::all();
        return view('adminPanel.BottomPrice.edit', compact('BottomPrice'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BottomPrice  $bottomPrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'model' => 'required',
            'division' => 'required',
            'brand' => 'required',
            'fb' => 'required',
            'sb' => 'required',
            'tb' => 'required',
            'lb' => 'required',
            'rt' => 'required',
        ]);
        $BottomPrice = BottomPrice::find($id);

        $BottomPrice->code = $request->code;
        $BottomPrice->name = $request->name;
        $BottomPrice->model = $request->model;
        $BottomPrice->division = $request->division;
        $BottomPrice->brand = $request->brand;
        $BottomPrice->fb = $request->fb;
        $BottomPrice->sb = $request->sb;
        $BottomPrice->tb = $request->tb;
        $BottomPrice->lb = $request->lb;
        $BottomPrice->rt = $request->rt;
        $BottomPrice->save();
        return redirect(route('BottomPrice.index'))->with('message_store', 'BottomPrice updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BottomPrice  $bottomPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(BottomPrice $bottomPrice)
    {
        //
    }
}
