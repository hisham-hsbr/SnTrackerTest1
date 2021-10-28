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


        // return Datatables::of(BottomPrice::query())->make(true);
        return Datatables::of(BottomPrice::query())


            ->editColumn('code', function (BottomPrice $BottomPrice) {
                return strtoupper($BottomPrice->code);
            })

            ->editColumn('name', function (BottomPrice $BottomPrice) {
                return strtoupper($BottomPrice->name);

            })
            ->editColumn('model', function (BottomPrice $BottomPrice) {
                return strtoupper($BottomPrice->model);
            })
            ->editColumn('division', function (BottomPrice $BottomPrice) {

                return strtoupper($BottomPrice->Divisions->name);
            })
            ->editColumn('brand', function (BottomPrice $BottomPrice) {
                return strtoupper($BottomPrice->Brands->name);
            })
            ->setRowId(function ($BottomPrice) {
                return $BottomPrice->id;
            })
            ->editColumn('updated_at', function (BottomPrice $BottomPrice) {
                return $BottomPrice->updated_at->diffForHumans();
            })

            ->setRowData([
                'data-rt' => 'SAR-{{$rt}}',
            ])



            ->addColumn('columnEdit', function (BottomPrice $BottomPrice) {


                // return '<a href="/admin/BottomPrice/'.$BottomPrice->id.'/edit"><span class="fas fa-edit"></span></a>'. $BottomPrice->id;
                return '<a href="/admin/BottomPrice/'.$BottomPrice->id.'/edit"><span class="fas fa-edit"></span></a>';

            })
            // ->addColumn('columnDelete',function (BottomPrice $BottomPrice) {
            //         return '<form id="delete-form-{{ $BottomPrice->id }}" method="post"
            //         action="{{ route("BottomPrice.destroy",'. $BottomPrice->id.') }}" style="display:none">
            //         {{ csrf_field() }}
            //         {{ method_field("DELETE") }}
            //     </form>
            //     <a href="" onclick="
            // if(confirm("Are you sure, You Want to delete this?"))
            // {
            //     event.preventDefault();
            //     document.getElementById('.'delete-form-{{ $BottomPrice->id }}'.').submit();
            // }
            // else{
            //     event.preventDefault();
            // }
            // "><span class="fas fa-trash-alt"></span></a>';


            ->rawColumns(['columnEdit'])

        // })
            // ->rawColumns(['columnEdit','columnDelete'])


            ->toJson();
    }



    public function index()
    {
        //
        $BottomPrices = BottomPrice::paginate(15);
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
        $Brands = Brand::all();
        $Divisions = Division::all();

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

        switch ($request->submitbutton) {

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
                $BottomPrice->division_id = $request->division;
                $BottomPrice->brand_id = $request->brand;
                $BottomPrice->fb = $request->fb;
                $BottomPrice->sb = $request->sb;
                $BottomPrice->tb = $request->tb;
                $BottomPrice->lb = $request->lb;
                $BottomPrice->rt = $request->rt;
                $BottomPrice->save();
                // $BottomPrice->divisions()->save($request->division);
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
                $BottomPrice->division_id = $request->division;
                $BottomPrice->brand_id = $request->brand;
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
