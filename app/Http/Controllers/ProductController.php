<?php

namespace App\Http\Controllers;

use App\Product;
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
            ->toJson();
    }



    public function index()
    {
        //
        $products = Product::all();
        return view('adminPanel.products.show', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adminPanel.products.create');
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
            'body' => 'required',
        ]);
        $product = new product();
        $product->code = $request->code;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->body = $request->body;
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
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
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
