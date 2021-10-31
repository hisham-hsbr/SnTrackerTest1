<?php

namespace App\Http\Controllers;

use App\Division;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('permitTo:CreateDivision', ['only' => 'create']);
        // $this->middleware('role:super');
        // $this->roleModel        = config('multiauth.models.role');
        // $this->adminModel       = config('multiauth.models.admin');
        // $this->permissionModel  = config('multiauth.models.permission');
    }

    public function getDivisions()
    {
        // return Datatables::of(Division::query())->make(true);
        return DataTables::of(Division::query())

            ->editColumn('code', function (Division $Division) {
                return strtoupper($Division->code);
            })


            ->editColumn('name', function (Division $Division) {
                return strtoupper($Division->name);
            })

            ->editColumn('status', function (Division $Division) {

                $active = ($Division->status);
                if($active==1){
                 $active = 'Active';
                }
                else {
                $active = 'InActive';
                }
                return $active;

                // return strtoupper($Division->status);
            })

            ->setRowId(function ($Division) {
                return $Division->id;
            })

            ->addColumn('divisionEdit', function (Division $Division) {
                return '<a href="/admin/division/'.$Division->id.'/edit"><span class="fas fa-edit"></span></a>';
            })



            // ->addColumn('columnEdit', '<a href="Division/edit"><span class="fas fa-edit"></span></a>')

            // ->editColumn('columnEdit', 'adminPanel.Division.columnEdit')
            ->rawColumns(['divisionEdit'])

            ->toJson();
    }

    public function index()
    {
        //
        $division = Division::all();
        return view('adminPanel.division.show', compact('division'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adminPanel.division.create');
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
            'code' => 'required|unique:divisions',
            'name' => 'required',
            'slug' => 'required',
            // 'body' => 'required',
        ]);
        $division = new Division();
        $division->code = $request->code;
        $division->name = $request->name;
        $division->slug = $request->slug;
        $division->body = $request->body;
        if ($request->status=0)
        {
            $division->status=0;
        }
        $division->status = $request->status;
        $division->save();
        return redirect(route('division.index'))->with('message_store', 'Division Created Successfully');
        break;

        case 'save and new':

            $this->validate($request, [
                'code' => 'required|unique:divisions',
                'name' => 'required',
                'slug' => 'required',
                // 'body' => 'required',
            ]);
            $division = new Division();
            $division->code = $request->code;
            $division->name = $request->name;
            $division->slug = $request->slug;
            $division->body = $request->body;
            if ($request->status=0)
        {
            $division->status=0;
        }
        $division->status = $request->status;
            $division->save();
            return redirect(route('division.create'))->with('message_store', 'Division Created Successfully');
            break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Division = Division::where('id', $id)->first();
        // return view('adminPanel.Division.edit', compact('Division'));

        // $Division = Division::all();
        return view('adminPanel.division.edit', compact('Division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            // 'code' => 'required|unique:divisions',
            'code' => 'required',
            'name' => 'required',
            'slug' => 'required',
            // 'body' => 'required',
        ]);
        $division = Division::find($id);
        $division->code = $request->code;
        $division->name = $request->name;
        $division->slug = $request->slug;
        $division->body = $request->body;



        $division->save();
        return redirect(route('division.index'))->with('message_store', 'Division updated Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        //
    }
}
