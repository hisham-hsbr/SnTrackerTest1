<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Division;
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
        $Divisions = Division::all();


        // return Datatables::of(BottomPrice::where('status', 1))
        return Datatables::of(BottomPrice::query())

            ->addColumn('code', function (BottomPrice $BottomPrice) {
                return strtoupper($BottomPrice->code);
            })

            ->addColumn('name', function (BottomPrice $BottomPrice) {
                return strtoupper($BottomPrice->name);

            })
            ->addColumn('model', function (BottomPrice $BottomPrice) {
                return strtoupper($BottomPrice->model);
            })
            ->addColumn('division', function (BottomPrice $BottomPrice) {

                return strtoupper($BottomPrice->Divisions->name);
            })
            ->addColumn('brand', function (BottomPrice $BottomPrice) {
                return strtoupper($BottomPrice->Brands->name);
            })
            ->setRowId(function ($BottomPrice) {
                return $BottomPrice->id;
            })
            ->addColumn('updated_at', function (BottomPrice $BottomPrice) {
                return $BottomPrice->updated_at->diffForHumans();
            })

            ->setRowData([
                'data-rt' => 'SAR-{{$rt}}',
            ])

            ->addColumn('CreatedBy', function (BottomPrice $BottomPrice) {

                return strtoupper($BottomPrice->createdUser->name);
            })
            ->addColumn('UpdatedBy', function (BottomPrice $BottomPrice) {

                // return strtoupper($BottomPrice->updatedUser->name."( ".$BottomPrice->created_at." )");
                return strtoupper($BottomPrice->updatedUser->name);
            })

            ->addColumn('columnEdit', function (BottomPrice $BottomPrice) {

                return '<a href="/admin/BottomPrice/'.$BottomPrice->id.'/edit"><span class="fas fa-edit"></span></a>';

            })



            ->rawColumns(['columnEdit'])

        // })
            // ->rawColumns(['columnEdit','columnDelete'])


            ->toJson();
    }



    public function index()
    {
        //
        $BottomPrices = BottomPrice::where('status', 1)->paginate(15);
        // $BottomPrices = BottomPrice::where('status', 1)->orderBy('created_at', 'DESC')->paginate(15);
        // $BottomPrices = BottomPrice::paginate(15);
        // $Brands = Brand::where('status', 1);
        $Brands = Brand::all();
        $Divisions = Division::all();
        return view('adminPanel.BottomPrice.show', compact('BottomPrices','Brands','Divisions'));
    }
    public function act()
    {
        //
        $BottomPrices = BottomPrice::all();
        return view('adminPanel.BottomPrice.columnEdit', compact('BottomPrices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Brands = Brand::where('status', 1)->get();
        $Divisions = Division::where('status', 1)->get();

        return view('adminPanel.BottomPrice.create', compact('Brands','Divisions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        switch ($request->submitbutton) {

            case 'save':


                //
                $this->validate($request, [
                    'code' => 'required|unique:bottom_prices',
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
                $BottomPrice->division_id = $request->division;
                $BottomPrice->brand_id = $request->brand;
                $BottomPrice->fb = $request->fb;
                $BottomPrice->sb = $request->sb;
                $BottomPrice->tb = $request->tb;
                $BottomPrice->lb = $request->lb;
                $BottomPrice->rt = $request->rt;
                if ($request->status=0)
                {
                    $BottomPrice->status=0;
                }

                $BottomPrice->status = $request->status;

                $BottomPrice->CreatedBy = auth('admin')->user()->id;
                $BottomPrice->UpdatedBy = auth('admin')->user()->id;

                $BottomPrice->save();
                // $BottomPrice->divisions()->save($request->division);
                return redirect(route('BottomPrice.index'))->with('message_store', 'BottomPrice Created Successfully');



                break;

            case 'save and new':
                $this->validate($request, [
                    'code' => 'required|unique:bottom_prices',
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
                $BottomPrice->division_id = $request->division;
                $BottomPrice->brand_id = $request->brand;
                $BottomPrice->fb = $request->fb;
                $BottomPrice->sb = $request->sb;
                $BottomPrice->tb = $request->tb;
                $BottomPrice->lb = $request->lb;
                $BottomPrice->rt = $request->rt;
                if ($request->status=0)
                {
                    $BottomPrice->status=0;
                }
                $BottomPrice->status = $request->status;

                $BottomPrice->CreatedBy = auth('admin')->user()->id;
                $BottomPrice->UpdatedBy = auth('admin')->user()->id;

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

    // public function columnEdit(BottomPrice $bottomPrice)
    // {
    //     //
    //     // return view('adminPanel.BottomPrice.columnEdit', compact('BottomPrices'));
    //     return view('adminPanel.BottomPrice.columnEdit', compact('BottomPrice'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BottomPrice  $bottomPrice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Brands = Brand::all();
        $Divisions = Division::all();
        $BottomPrice = BottomPrice::where('id', $id)->first();
        // return view('adminPanel.BottomPrice.edit', compact('BottomPrice'));

        // $BottomPrice = BottomPrice::all();
        return view('adminPanel.BottomPrice.edit', compact('BottomPrice','Brands','Divisions'));
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
        // dd($request->all());
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
        $BottomPrice->division_id = $request->division;
        $BottomPrice->brand_id = $request->brand;
        $BottomPrice->fb = $request->fb;
        $BottomPrice->sb = $request->sb;
        $BottomPrice->tb = $request->tb;
        $BottomPrice->lb = $request->lb;
        $BottomPrice->rt = $request->rt;

        if ($request->status=0)
        {
            $BottomPrice->status=0;
        }

        $BottomPrice->status = $request->status;


        $BottomPrice->UpdatedBy = auth('admin')->user()->id;

        $BottomPrice->save();
        return redirect(route('BottomPrice.index'))->with('message_store', 'BottomPrice updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BottomPrice  $bottomPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        BottomPrice::where('id', $id)->delete();
        return redirect()->back();
    }
}
