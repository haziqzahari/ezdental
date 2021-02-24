@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clerk.css') }}" rel="stylesheet">
    <link href="{{ asset('css/student.css') }}" rel="stylesheet">
@endsection

@section('content')
     <div class="container-fluid pr-md-5 pl-md-5 clerk-verify-show">
         <div class="row pr-md-5 pl-md-5 full-height">
             <div class="col-md-12 pr-md-5 pl-md-5">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <div class="row text-right pr-3">
                            <div class="col-md-4 text-left pt-2 pl-5 pb-4">
                                <div style="font-size: 22px;">CASE ASSIGNATION</div>
                            </div>
                            <div class="col-md-8 text-left">
                                @if(session('message'))
                                <div class="alert alert-success">
                                    <strong>{{session('message')}}</strong>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Case ID</th>
                                    <th>Type</th>
                                    <th>Dentist Name</th>
                                    <th>Patient Name</th>
                                    <th>Student Name</th>
                                    <th>Technician Name</th>
                                    <th>Status</th>
                                    <th>Updated at</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @if( count($dentalcases) > 0)
                            @foreach ($dentalcases as $index => $dentalcase)
                                @if ($dentalcase->technician_id == "Not Assigned.")
                                <tr class="table-danger">
                                    <td>{{ $index +1 }}</td>
                                    <td>{{ $dentalcase->case_id }}</td>
                                    <td>{{ $dentalcase->case_type }}</td>
                                    <td>{{ $dentalcase->dentist_name }}</td>
                                    <td>{{ $dentalcase->patient_name }}</td>
                                    <td>{{ $dentalcase->student_name }}</td>
                                    <td>{{ $dentalcase->technician_name}}</td>
                                    <td>{{ $dentalcase->case_status }}</td>
                                    <td>{{ $dentalcase->updated_at }}</td>
                                    @if ($dentalcase->technician_id == "Not Assigned.")
                                        <td class="assign-case">
                                            <a href="{{route('admin.assignview', $dentalcase->case_id) }}" class="btn btn-success">View Case</a>
                                            <form action="{{route('admin.assigncase', $dentalcase->case_id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Assign Case</button>
                                            </form>
                                        </td>
                                    @else
                                            <td class="assign-case"><a href="{{route('admin.assignview', $dentalcase->case_id) }}" class="btn btn-success">View Case</a></td>
                                    @endif
                                </tr>
                                @else
                                <tr>
                                    <td>{{ $index +1 }}</td>
                                    <td>{{ $dentalcase->case_id}}</td>
                                    <td>{{ $dentalcase->case_type }}</td>
                                    <td>{{ $dentalcase->dentist_name }}</td>
                                    <td>{{ $dentalcase->patient_name }}</td>
                                    <td>{{ $dentalcase->student_name }}</td>
                                    <td>{{ $dentalcase->technician_name}}</td>
                                    <td>{{ $dentalcase->case_status }}</td>
                                    <td>{{ $dentalcase->updated_at }}</td>
                                    @if ($dentalcase->technician_id == "Not Assigned.")
                                        <td class="assign-case">
                                            <a href="{{route('admin.assignview', $dentalcase->case_id) }}" class="btn btn-success">View Case</a>
                                            <form action="{{route('admin.assigncase', $dentalcase->case_id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Assign Case</button>
                                            </form>
                                        </td>
                                    @else
                                            <td class="assign-case"><a href="{{route('admin.assignview', $dentalcase->case_id) }}" class="btn btn-success">View Case</a></td>
                                    @endif
                                </tr>
                                @endif
                            @endforeach
                            @endif
                        </table>
                        </div>
                    </div>
                    <div class="card-footer">{{$dentalcases->links()}}</div>
                </div>
             </div>
         </div>
     </div>
@endsection
