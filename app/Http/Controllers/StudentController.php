<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Dentist;
use App\Models\DentalCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
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
        $student = Student::where('student_id', $id)->get();
        $dentalcases = new DentalCase();
        $count= new DentalCase();

        try {
            // $dentalcases = DB::select("select * from dental_cases where student_id='{$id}'", [1]);
            $count = DentalCase::where('student_id', $id)->orderBy('updated_at', 'desc')->get();
            $dentalcases = DentalCase::where('student_id', $id)->orderBy('updated_at', 'desc')->paginate(3);
        } catch (\Throwable $th) {
            $dentalcases = [];
        }

        // dd($dentalcases);

        return view('student.index')->with(['student'=> $student[0], 'dentalcases' => $dentalcases, 'count' => count($count)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registercase_show()
    {
        $id = Auth::user()->name;
        $data = Student::where('student_id', $id)->get();
        $dentists = Dentist::all();

        $student = new Student();
        $student->student_id = $id;
        $student->student_name = $data[0]->student_name;

        return view('student.caseregistration')->with(['student'=> $student, 'dentists' => $dentists]);
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

        return redirect(route('student.index'));

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewcase()
    {
        $dentalcases = new DentalCase();

        try {
            $dentalcases = DentalCase::where('student_id', Auth::user()->name)->orderBy('verification_status', 'asc')->orderBy('updated_at', 'desc')->paginate(6);
        } catch (\Throwable $th) {
            $dentalcases = [];
        }


        return view('student.viewcase')->with(['dentalcases' => $dentalcases]);
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


        return view('student.casedetails')->with(['dentalcase' => $dentalcase[0], 'dentists' => $dentists]);
    }
}
