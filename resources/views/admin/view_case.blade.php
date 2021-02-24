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
                                <div style="font-size: 22px;">CASE UPDATES</div>
                            </div>
                            {{-- <div class="col-md-4 offset-md-4">
                                <form action="" method="POST">
                                    <div class="row form-group align-items-center pt-2">
                                        <label for="search_case" class="col-md-4">Search :</label>
                                        <input type="text" class="form-control col-md-8">
                                    </div>
                                </form>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Case ID</th>
                                    <th>Type</th>
                                    <th>Dentist Name</th>
                                    <th>Patient Name</th>
                                    <th>Student Name</th>
                                    <th>Verification Status</th>
                                    <th>Status</th>
                                    <th>Updated at</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @if( count($dentalcases) > 0)
                            @foreach ($dentalcases as $index => $dentalcase)
                                @if ($dentalcase->verification_status==1)
                                    <tr class="case-verification">
                                        <td>{{ $index +1 }}</td>
                                        <td>{{ $dentalcase->case_id }}</td>
                                        <td>{{ $dentalcase->case_type }}</td>
                                        <td>{{ $dentalcase->dentist_name }}</td>
                                        <td>{{ $dentalcase->patient_name }}</td>
                                        <td>{{ $dentalcase->student_name }}</td>
                                        <td>
                                            @if ($dentalcase->verification_status == 1)
                                                Verified
                                            @else
                                                Not Verified
                                            @endif
                                        </td>
                                        <td>{{ $dentalcase->case_status }}</td>
                                        <td>{{ $dentalcase->updated_at }}</td>
                                        <td><a class="btn btn-success" href="verifycase_view/{{ $dentalcase->case_id }}">View Case</a></td>
                                    </tr>
                                @else
                                    <tr class="case-verification table-danger">
                                        <td>{{ $index +1 }}</td>
                                        <td>{{ $dentalcase->case_id }}</td>
                                        <td>{{ $dentalcase->case_type }}</td>
                                        <td>{{ $dentalcase->dentist_name }}</td>
                                        <td>{{ $dentalcase->patient_name }}</td>
                                        <td>{{ $dentalcase->student_name }}</td>
                                        <td>
                                            @if ($dentalcase->verification_status == 1)
                                                Verified
                                            @else
                                                Not Verified
                                            @endif
                                        </td>
                                        <td>{{ $dentalcase->case_status }}</td>
                                        <td>{{ $dentalcase->updated_at }}</td>
                                        <td><a class="btn btn-success" href="verifycase_view/{{ $dentalcase->case_id }}">View Case</a></td>
                                    </tr>
                                @endif
                            @endforeach
                            @endif
                        </table>
                    </div>
                    <div class="card-footer">{{$dentalcases->links()}}</div>
                </div>
             </div>
         </div>
     </div>
@endsection

@section('action-script')
     <script>
        function redirectForm()
        {
            var case_id = document.getElementsByClassName('case-verification').id;
            var url = "verifycase_view/"+id;
            window.location.href(url);

        }
     </script>
@endsection
