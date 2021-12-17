<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('permitTo:CreateBranch', ['only' => 'create']);
        // $this->middleware('role:super');
        // $this->roleModel        = config('multiauth.models.role');
        // $this->adminModel       = config('multiauth.models.admin');
        // $this->permissionModel  = config('multiauth.models.permission');
    }

    public function getBranches()
    {
        // return Datatables::of(Branch::query())->make(true);
        return DataTables::of(Branch::query())

            ->editColumn('code', function (Branch $Branch) {
                return strtoupper($Branch->code);
            })


            ->editColumn('name', function (Branch $Branch) {
                return strtoupper($Branch->name);
            })

            ->setRowId(function ($Branch) {
                return $Branch->id;
            })
            ->editColumn('CreatedBy', function (Branch $Branch) {

                return strtoupper($Branch->createdUser->name);
            })
            ->editColumn('UpdatedBy', function (Branch $Branch) {

                // return strtoupper($Branch->updatedUser->name."( ".$Branch->created_at." )");
                return strtoupper($Branch->updatedUser->name);
            })

            ->addColumn('created_at', function (Branch $Branch) {
                return $Branch->created_at->format('d-M-Y');
            })
            ->addColumn('updated_at', function (Branch $Branch) {
                // return $Branch->updated_at->format('d-M-Y');
                return $Branch->updated_at->format('d-M-Y');
            })


            ->editColumn('status', function (Branch $Branch) {

                $active = ($Branch->status);
                if($active==1){
                 $active = 'Active';
                }
                else {
                $active = 'InActive';
                }
                return $active;
            })


            ->addColumn('branchEdit', function (Branch $Branch) {


                return '<a href="/admin/branch/'.$Branch->id.'/edit"><span class="fas fa-edit"></span></a>';

            })

            // ->addColumn('columnEdit', '<a href="Branch/edit"><span class="fas fa-edit"></span></a>')

            // ->editColumn('columnEdit', 'adminPanel.Branch.columnEdit')
            ->rawColumns(['branchEdit'])

            ->toJson();
    }

    public function index()
    {
        //
        $branch = Branch::all();
        return view('adminPanel.branch.show', compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('adminPanel.branch.create');
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
        switch ($request->submitbutton) {

            case 'save':

        $this->validate($request, [
            'code' => 'required|unique:brands',
            'name' => 'required',
            'slug' => 'required',
            // 'body' => 'required',
        ]);

        // $adminid=(auth('admin')->user()->id);

        $branch = new Branch();
        $branch->code = $request->code;
        $branch->name = $request->name;
        $branch->slug = $request->slug;
        $branch->body = $request->body;


        if ($request->status==0)
        {
            $branch->status==0;
        }

        $branch->status = $request->status;

// dd($branch->status);

        $branch->CreatedBy = auth('admin')->user()->id;
        $branch->UpdatedBy = auth('admin')->user()->id;

        $branch->save();
        return redirect(route('branch.index'))->with('message_store', 'Branch Created Successfully');

        break;
        case 'save and new':
            $this->validate($request, [
                'code' => 'required|unique:branchs',
                'name' => 'required',
                'slug' => 'required',
                // 'body' => 'required',
            ]);

            // $adminid=(auth('admin')->user()->id);

            $branch = new Branch();
            $branch->code = $request->code;
            $branch->name = $request->name;
            $branch->slug = $request->slug;
            $branch->body = $request->body;

            if ($request->status==0)
            {
                $branch->status==0;
            }

            $branch->status = $request->status;



            $branch->CreatedBy = auth('admin')->user()->id;
            $branch->UpdatedBy = auth('admin')->user()->id;

            $branch->save();
            return redirect(route('branch.create'))->with('message_store', 'Branch Created Successfully');
            break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $Branch = Branch::where('id', $id)->first();
        // return view('adminPanel.BRAND.edit', compact('BRAND'));

        // $BRAND = BRAND::all();
        return view('adminPanel.branch.edit', compact('Branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $this->validate($request, [
            'code' => "required|unique:branches,code,$id",
            'name' => 'required',
            'slug' => 'required',
            // 'body' => 'required',
        ]);
        $branch = Branch::find($id);
        $branch->code = $request->code;
        $branch->name = $request->name;
        $branch->slug = $request->slug;
        $branch->body = $request->body;

        if ($request->status==0)
        {
            $branch->status==0;
        }
        $branch->status = $request->status;




$branch->UpdatedBy = auth('admin')->user()->id;


        $branch->save();
        return redirect(route('branch.index'))->with('message_store', 'Branch updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
