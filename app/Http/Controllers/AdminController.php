<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DentalCase;
use App\Models\Technician;
use App\Models\Dentist;
use App\Models\User;
use App\Models\Workload;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
        $technician = Technician::where('technician_id', $id)->get(); //PDO
        $dentalcases = new DentalCase();
        $count= new DentalCase();

        try {
            // $dentalcases = DB::select("select * from dental_cases where student_id='{$id}'", [1]);
            $count = DentalCase::where('case_status', 'New')->orderBy('updated_at', 'desc')->get(); //Eloquent ORM
            $dentalcases = DentalCase::orderBy('updated_at', 'desc')->paginate(3);
        } catch (\Throwable $th) {
            $dentalcases = [];
        }

        $pending_count = 0;
        if(count($dentalcases)>0){
            foreach($dentalcases as $dentalcase){
                if($dentalcase->case_status != "New"){
                    $pending_count++;
                }
            }
        }

        // dd($dentalcases);

        return view('admin.index')->with(['technician'=> $technician[0], 'dentalcases' => $dentalcases, 'count' => count($count), 'pending_count'=>$pending_count]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registercase_show()
    {
        $dentists = Dentist::all();

        return view('admin.caseregistration')->with(['dentists' => $dentists]);
    }

    public function view_full()
    {
        $dentalcases = new DentalCase();

        try {
            $dentalcases = DentalCase::where('technician_id', Auth::user()->name)->paginate(7);
        } catch (\Throwable $th) {
            $dentalcases = [];
        }

        return view('admin.view_case')->with(['dentalcases'=>$dentalcases]);
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

        return redirect(route('admin.verifyfull_show'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

    public function verifyfull_show()
    {
        $dentalcases = new DentalCase();

        try {
            $dentalcases = DentalCase::orderBy('verification_status', 'asc')->orderBy('updated_at', 'desc')->paginate(6);
        } catch (\Throwable $th) {
            $dentalcases = [];
        }


        return view('admin.verifyfull')->with(['dentalcases' => $dentalcases]);
    }

    public function verifycase_view($id) //edit
    {
        $dentalcase = new DentalCase();
        $dentists = Dentist::all();

        try {
            $dentalcase = DentalCase::where('case_id', $id)->get();

        } catch (\Throwable $th) {
            $dentalcase = [];
        }


        return view('admin.verifycase')->with(['dentalcase' => $dentalcase[0], 'dentists' => $dentists]);
    }

    public function verifycase(Request $request, $id)
    {
        $dentalcase = DentalCase::where('case_id', $id)->first();
        $dentalcase->verification_status = 1;
        $dentalcase->update();

        return redirect(route('admin.verifyfull_show'))->with('message', 'Case '.$dentalcase->case_id.' is verified.');

    }

    public function assignview($id) //edit
    {
        $dentalcase = new DentalCase();
        $dentists = Dentist::all();

        try {
            $dentalcase = DentalCase::where('case_id', $id)->get();

        } catch (\Throwable $th) {
            $dentalcase = [];
        }
        return view('admin.assignview')->with(['dentalcase' => $dentalcase[0], 'dentists' => $dentists]);
    }

    public function userslist()
    {
        $users = new User();
        $users = User::orderBy('role', 'asc')->orderBy('name', 'asc')->paginate(6);

        return view('admin.userlist')->with('users', $users);
    }

    public function assignfull()
    {
        $dentalcases = new DentalCase();
        $dentists = Dentist::all();

        try {
            $dentalcases = DentalCase::orderBy('verification_status', 'desc')->orderBy('updated_at', 'desc')->paginate(6);

        } catch (\Throwable $th) {
            $dentalcases = [];
        }


        return view('admin.assignfull')->with(['dentalcases' => $dentalcases, 'dentists' => $dentists]);
    }

    public function assigncase($id)
    {
        $dentalcase = DentalCase::where('case_id', $id)->first();
        $workload = new Workload();

        $technician = Technician::where('technician_id', assignTechnician($dentalcase->case_id, $dentalcase->workload))->first();

        $dentalcase->technician_id = $technician->technician_id;
        $dentalcase->technician_name = $technician->technician_name;
        $dentalcase->update();

        $workload->case_id = $dentalcase->case_id;
        $workload->technician_id = $technician->technician_id;
        $workload->technician_name = $technician->technician_name;
        $workload->workload = $dentalcase->workload;
        $workload->save();

        return redirect(route('admin.assignfull'))->with('message', 'Case '.$dentalcase->case_id.' is assigned to '.$dentalcase->technician_name.'.');
    }

}
