<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Division;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
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

    public function getProducts()
    {

        // return Datatables::of(Product::query())->make(true);
        return Datatables::of(Product::query())

            ->editColumn('code', function (Product $Product) {
                return strtoupper($Product->code);
            })


            ->editColumn('name', function (Product $Product) {
                return strtoupper($Product->name);
            })
            ->editColumn('model', function (Product $Product) {
                return strtoupper($Product->model);
            })

            ->editColumn('division', function (Product $Product) {

                return strtoupper($Product->Divisions->name);
            })
            ->editColumn('brand', function (Product $Product) {
                return strtoupper($Product->Brands->name);
            })


            ->editColumn('status', function (Product $Product) {

                $active = ($Product->status);
                if($active==1){
                 $active = 'Active';
                }
                else {
                $active = 'InActive';
                }
                return $active;

                // return strtoupper($Product->status);
            })




            ->addColumn('Edit', function (Product $Product) {

                return '<a href="/admin/Product/'.$Product->id.'/edit"><span class="fas fa-edit"></span></a>';

            })



            ->rawColumns(['Edit'])


            ->toJson();
    }



    public function index()
    {
        //
        $Products = Product::all();
        $Brands = Brand::all();
        $Divisions = Division::all();

        return view('adminPanel.product.show', compact('Products','Brands','Divisions'));
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


        return view('adminPanel.product.create', compact('Brands','Divisions'));
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
            'code' => 'required|unique:products',
            'name' => 'required',
            'slug' => 'required',
            'model' => 'required',
            'division' => 'required',
            'brand' => 'required',
            // 'body' => 'required',
        ]);
        $product = new product();
        $product->code = $request->code;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->model = $request->model;
        $product->division_id = $request->division;
        $product->brand_id = $request->brand;
        $product->body = $request->body;
        if ($request->status==0)
        {
            $product->status=0;
        }
        $product->status = $request->status;
        $product->CreatedBy = auth('admin')->user()->id;
        $product->UpdatedBy = auth('admin')->user()->id;
        $product->save();
        return redirect(route('product.index'))->with('message_store', 'product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $Product = Product::where('id', $id)->first();
        $Brands = Brand::all();
        $Divisions = Division::all();

        return view('adminPanel.product.edit', compact('Product','Brands','Divisions'));

        // $Brands = Brand::all();
        // $Divisions = Division::all();
        // $Products = Product::where('id', $id)->first();
        // return view('adminPanel.Product.edit', compact('Products','Brands','Divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'code' => 'required|unique:products',
            'name' => 'required',
            'slug' => 'required',
            'model' => 'required',
            'division' => 'required',
            'brand' => 'required',
            // 'body' => 'required',
        ]);
        $Product = Product::find($id);

        $Product->code = $request->code;
        $Product->name = $request->name;
        $Product->model = $request->model;
        $Product->division_id = $request->division;
        $Product->brand_id = $request->brand;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->model = $request->model;
        $product->division_id = $request->division;
        $product->brand_id = $request->brand;
        $product->body = $request->body;
        $product->status = $request->status;
        $product->save();
        return redirect(route('product.index'))->with('message_store', 'product updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
