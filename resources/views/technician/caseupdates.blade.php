@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clerk.css') }}" rel="stylesheet">
    <link href="{{ asset('css/student.css') }}" rel="stylesheet">
@endsection

@section('content')
     <div class="container-fluid pr-md-5 pl-md-5 student-viewcase">
         <div class="row pr-md-5 pl-md-5 full-height">
             <div class="col-md-12 pr-md-5 pl-md-5">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <div class="row text-right pr-3">
                            <div class="col-md-4 text-left pt-2 pl-5">
                                <div style="font-size: 22px;">CASE UPDATES</div>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <form action="" method="POST">
                                    <div class="row form-group align-items-center pt-2">
                                        <label for="search_case" class="col-md-4">Search :</label>
                                        <input type="text" class="form-control col-md-8">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Case ID</th>
                                    <th>Type</th>
                                    <th>Patient Name</th>
                                    <th>Student Name</th>
                                    <th>Verified</th>
                                    <th>Status</th>
                                    <th>Updated at</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @if( count($dentalcases) > 0)
                            @foreach ($dentalcases as $index => $dentalcase)
                                <tr>
                                    <td>{{ $index +1 }}</td>
                                    <td>{{ $dentalcase->case_id }}</td>
                                    <td>{{ $dentalcase->case_type }}</td>
                                    <td>{{ $dentalcase->patient_name }}</td>
                                    <td>{{ $dentalcase->student_name }}</td>
                                    <td>{{ $dentalcase->verification_status }}</td>
                                    <td>{{ $dentalcase->case_status }}</td>
                                    <td>{{ $dentalcase->updated_at }}</td>
                                    <td class="assign-case">
                                        <a class="btn btn-success" href="{{ route('technician.casedetails', $dentalcase->case_id)}}">Update Case</a>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                    <div class="card-footer text-right">{{$dentalcases->links()}}</div>
                </div>
             </div>
         </div>
     </div>
@endsection


