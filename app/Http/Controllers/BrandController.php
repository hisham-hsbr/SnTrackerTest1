<?php

namespace App\Http\Controllers;

use admin;
use App\Brand;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('permitTo:Createbrand', ['only' => 'create']);
        // $this->middleware('role:super');
        // $this->roleModel        = config('multiauth.models.role');
        // $this->adminModel       = config('multiauth.models.admin');
        // $this->permissionModel  = config('multiauth.models.permission');
    }

    public function getBrands()
    {
        // return Datatables::of(Brand::query())->make(true);
        return DataTables::of(Brand::query())

            ->editColumn('code', function (Brand $Brand) {
                return strtoupper($Brand->code);
            })


            ->editColumn('name', function (Brand $Brand) {
                return strtoupper($Brand->name);
            })

            ->setRowId(function ($Brand) {
                return $Brand->id;
            })
            ->editColumn('CreatedBy', function (Brand $Brand) {

                return strtoupper($Brand->createdUser->name);
            })
            ->editColumn('UpdatedBy', function (Brand $Brand) {

                // return strtoupper($Brand->updatedUser->name."( ".$Brand->created_at." )");
                return strtoupper($Brand->updatedUser->name);
            })




            ->editColumn('status', function (Brand $Brand) {

                $active = ($Brand->status);
                if($active==1){
                 $active = 'Active';
                }
                else {
                $active = 'InActive';
                }
                return $active;
            })


            ->addColumn('brandEdit', function (Brand $Brand) {


                return '<a href="/admin/brand/'.$Brand->id.'/edit"><span class="fas fa-edit"></span></a>';

            })

            // ->addColumn('columnEdit', '<a href="Brand/edit"><span class="fas fa-edit"></span></a>')

            // ->editColumn('columnEdit', 'adminPanel.Brand.columnEdit')
            ->rawColumns(['brandEdit'])

            ->toJson();
    }

    public function index()
    {
        //
        $brand = brand::all();
        return view('adminPanel.brand.show', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adminPanel.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch ($request->submitbutton) {

            case 'save':

        $this->validate($request, [
            'code' => 'required|unique:brands',
            'name' => 'required',
            'slug' => 'required',
            // 'body' => 'required',
        ]);

        // $adminid=(auth('admin')->user()->id);

        $brand = new Brand();
        $brand->code = $request->code;
        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->body = $request->body;


        if ($request->status==0)
        {
            $brand->status==0;
        }

        $brand->status = $request->status;

// dd($brand->status);

        $brand->CreatedBy = auth('admin')->user()->id;
        $brand->UpdatedBy = auth('admin')->user()->id;

        $brand->save();
        return redirect(route('brand.index'))->with('message_store', 'Brand Created Successfully');

        break;
        case 'save and new':
            $this->validate($request, [
                'code' => 'required|unique:brands',
                'name' => 'required',
                'slug' => 'required',
                // 'body' => 'required',
            ]);

            // $adminid=(auth('admin')->user()->id);

            $brand = new Brand();
            $brand->code = $request->code;
            $brand->name = $request->name;
            $brand->slug = $request->slug;
            $brand->body = $request->body;

            if ($request->status==0)
            {
                $brand->status==0;
            }

            $brand->status = $request->status;



            $brand->CreatedBy = auth('admin')->user()->id;
            $brand->UpdatedBy = auth('admin')->user()->id;

            $brand->save();
            return redirect(route('brand.create'))->with('message_store', 'Brand Created Successfully');
            break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Brand = Brand::where('id', $id)->first();
        // return view('adminPanel.BRAND.edit', compact('BRAND'));

        // $BRAND = BRAND::all();
        return view('adminPanel.brand.edit', compact('Brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        // dd(auth('admin')->user()->id);

        $this->validate($request, [
            'code' => "required|unique:brands,code,$id",
            'name' => 'required',
            'slug' => 'required',
            // 'body' => 'required',
        ]);
        $brand = Brand::find($id);
        $brand->code = $request->code;
        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->body = $request->body;

        if ($request->status==0)
        {
            $brand->status==0;
        }
        $brand->status = $request->status;




$brand->UpdatedBy = auth('admin')->user()->id;


        $brand->save();
        return redirect(route('brand.index'))->with('message_store', 'Brand updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
