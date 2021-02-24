<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DentalCase;
use App\Models\Clerk;
use App\Models\Dentist;

class ClerkController extends Controller
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

       $id = Auth::user()->name;
       $clerk = Clerk::where('clerk_id', $id)->get();
       $dentalcases = new DentalCase();
       $count= new DentalCase();

       try {
           // $dentalcases = DB::select("select * from dental_cases where clerk_id='{$id}'", [1]);
           $count = DentalCase::where('case_status', 'New')->orderBy('updated_at', 'desc')->get();
           $dentalcases = DentalCase::orderBy('updated_at', 'desc')->paginate(3);

       } catch (\Throwable $th) {
           $dentalcases = [];
       }

       // dd($dentalcases);

       return view('clerk.index')->with(['clerk'=> $clerk[0], 'dentalcases' => $dentalcases, 'count' => count($count)]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registercase_show()
    {
        $dentists = Dentist::all();

        return view('clerk.caseregistration')->with(['dentists' => $dentists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registercase(Request $request)
    {
        $dentist = new Dentist();
        $dentist = Dentist::where('dentist_id', $request->input('dentist_name'))->get();
        $dentist->dentist_id = $dentist[0]->dentist_id;
        $dentist->dentist_name = $dentist[0]->dentist_name;

        $dentalcase = new DentalCase();
        $dentalcase->case_id = $request->input('case_id');
        $dentalcase->case_type = $request->input('case_type');
        $dentalcase->case_1 = $request->input('case_1');
        $dentalcase->case1_section = $request->input('case1_section');
        $dentalcase->remark_1 = $request->input('remark_1');
        $dentalcase->case_2 = $request->input('case_2');
        $dentalcase->case2_section = $request->input('case2_section');
        $dentalcase->remark_2 = $request->input('remark_2');
        $dentalcase->verification_status = 0;
        $dentalcase->case_status = "New";
        $dentalcase->dentist_id = $dentist->dentist_id;
        $dentalcase->dentist_name = $dentist->dentist_name;
        $dentalcase->technician_id = "Not Assigned.";
        $dentalcase->technician_name = "Not Assigned.";
        $dentalcase->student_id = $request->input('student_id');
        $dentalcase->student_name = $request->input('student_name');
        $dentalcase->patient_name = $request->input('patient_name');

        $workload_1 = countworkload($dentalcase->case_1, $dentalcase->case1_section, $dentalcase->remark_1);
        $workload_2 = countworkload($dentalcase->case_2, $dentalcase->case2_section, $dentalcase->remark_2);

        $dentalcase->workload = $workload_1 + $workload_2;
        $dentalcase->save();

        return redirect(route('clerk.index'));

    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyfull_show()
    {
        $dentalcases = new DentalCase();

        try {
            $dentalcases = DentalCase::orderBy('verification_status', 'asc')->orderBy('updated_at', 'desc')->paginate(6);
        } catch (\Throwable $th) {
            $dentalcases = [];
        }


        return view('clerk.verifyfull')->with(['dentalcases' => $dentalcases]);
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
        $dentalcase = new DentalCase();
        $dentists = Dentist::all();

        try {
            $dentalcase = DentalCase::where('case_id', $id)->get();

        } catch (\Throwable $th) {
            $dentalcase = [];
        }


        return view('clerk.edit')->with(['dentalcase' => $dentalcase[0], 'dentists' => $dentists]);
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
        $dentist = new Dentist();
        $dentist = Dentist::where('dentist_id', $request->input('dentist_name'))->get();
        $dentist->dentist_id = $dentist[0]->dentist_id;
        $dentist->dentist_name = $dentist[0]->dentist_name;

        $dentalcase = DentalCase::where('case_id', $id)->first();
        $dentalcase->case_id = $request->input('case_id');
        $dentalcase->case_type = $request->input('case_type');
        $dentalcase->case_1 = $request->input('case_1');
        $dentalcase->remark_1 = $request->input('remark_1');
        $dentalcase->case_2 = $request->input('case_2');
        $dentalcase->remark_2 = $request->input('remark_2');
        $dentalcase->verification_status = 0;
        $dentalcase->case_status = "New";
        $dentalcase->dentist_id = $dentist->dentist_id;
        $dentalcase->dentist_name = $dentist->dentist_name;
        $dentalcase->technician_id = "Not Assigned.";
        $dentalcase->technician_name = "Not Assigned.";
        $dentalcase->student_id = $request->input('student_id');
        $dentalcase->student_name = $request->input('student_name');
        $dentalcase->patient_name = $request->input('patient_name');

        $dentalcase->update();

        return redirect(route('clerk.verifycase_view', $dentalcase->case_id));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifycase_view($id)
    {
        $dentalcase = new DentalCase();
        $dentists = Dentist::all();

        try {
            $dentalcase = DentalCase::where('case_id', $id)->get();

        } catch (\Throwable $th) {
            $dentalcase = [];
        }


        return view('clerk.verifycase')->with(['dentalcase' => $dentalcase[0], 'dentists' => $dentists]);
    }

    public function verifycase(Request $request, $id)
    {
        $dentalcase = DentalCase::where('case_id', $id)->first();
        $dentalcase->verification_status = 1;
        $dentalcase->update();

        return redirect(route('clerk.verifyfull_show'));

    }
}
