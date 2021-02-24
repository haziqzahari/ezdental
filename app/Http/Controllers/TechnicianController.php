<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Technician;
use App\Models\DentalCase;
use App\Models\Dentist;

class TechnicianController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->name;
        $technician = Technician::where('technician_id', $id)->get();
        $dentalcases = new DentalCase();
        $count= new DentalCase();

        try {
            // $dentalcases = DB::select("select * from dental_cases where student_id='{$id}'", [1]);
            $count = DentalCase::where('technician_id', $id)->orderBy('updated_at', 'desc')->get();
            $dentalcases = DentalCase::where('technician_id', $id)->orderBy('updated_at', 'desc')->paginate(3);
        } catch (\Throwable $th) {
            $dentalcases = [];
        }

        // dd($dentalcases);

        return view('technician.index')->with(['technician'=> $technician[0], 'dentalcases' => $dentalcases, 'count' => count($count)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function caseupdates()
    {
        $id = Auth::user()->name;
        $dentalcases = new DentalCase();

        try {
            $dentalcases = DentalCase::where('technician_id', $id)->orderBy('updated_at', 'desc')->paginate(6);
        } catch (\Throwable $th) {
            $dentalcases = [];
        }


        return view('technician.caseupdates')->with(['dentalcases' => $dentalcases]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function casedetails($id)
    {
        $dentalcase = new DentalCase();
        $dentists = Dentist::all();

        try {
            $dentalcase = DentalCase::where('case_id', $id)->get();

        } catch (\Throwable $th) {
            $dentalcase = [];
        }


        return view('technician.casedetails')->with(['dentalcase' => $dentalcase[0], 'dentists' => $dentists]);
    }
}
