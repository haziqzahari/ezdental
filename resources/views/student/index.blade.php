@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/student.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid content index-height student-index">
        <div class="row mt-4 h-100 pr-md-5 pl-md-5">
            <div class="col-md-12 col-xs-12 pr-md-5 pl-md-5 mb-3">
                <div class="row first-section pr-md-5 pl-md-5 mb-3">
                    <div class="col-md-6 col-xs-12">
                        <div class="card h-100 profile-border">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 pl-md-4">
                                        <img class="dashboard-img" src="{{ asset('images/dashboardindex.png')}}" alt="">
                                    </div>
                                    <div class="col-md-9 pl-md-5 text-left">
                                        <p class="mb-1 profile-title">Welcome Back, {{ $student->student_name }}!</p>
                                        <p class="mb-1 profile-subtitle">{{ Auth::user()->name}}</p>
                                        <p class="mb-1 profile-subtitle">{{ Auth::user()->role}}</p>
                                        <p class="mb-1 profile-subtitle">{{ $student->student_phone}}</p>
                                        <p class="mb-1 profile-subtitle">{{ $student->student_email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="card h-100 new-border">
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-md-12 new-count">{{$count}}</div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">NEW CASES</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="card h-100 ongoing-border">
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-md-12 ongoing-count">100</div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">PENDING CASES</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row second-section pr-md-5 pl-md-5 mt-md-5">
                    <div class="col-md-12">
                        <div class="card h-100 table-index">
                            <div class="card-header text-left">Case Updates</div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Case ID</th>
                                            <th>Type</th>
                                            <th>Dentist</th>
                                            <th>Patient</th>
                                            <th>Technician</th>
                                            <th>Verified</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    @if( count($dentalcases) > 0)
                                    @foreach ($dentalcases as $dentalcase)
                                        <tr>
                                            <td>{{ $dentalcase->case_id }}</td>
                                            <td>{{ $dentalcase->case_type }}</td>
                                            <td>{{ $dentalcase->dentist_name }}</td>
                                            <td>{{ $dentalcase->patient_name }}</td>
                                            <td>{{ $dentalcase->technician_name }}</td>
                                            <td>{{ $dentalcase->verification_status }}</td>
                                            <td>{{ $dentalcase->case_status }}</td>
                                        </tr>
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                            <div class="card-footer">{{$dentalcases->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
