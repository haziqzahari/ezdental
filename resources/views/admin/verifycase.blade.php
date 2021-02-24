@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clerk.css') }}" rel="stylesheet">
    <link href="{{ asset('css/student.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid case-register login-section">
        <div class="row h-100 justify-content-center">
            <div class="col-xs-12 col-md-8">
                <div class="card h-100">
                    <div class="card-header pl-5">
                        <strong>Case Details : {{$dentalcase->case_id}}</strong>
                    </div>

                    <div class="card-body pr-5 pl-5">
                        <form action="{{route('admin.verifycase', $dentalcase->case_id)}}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-4 offset-md-8 col-xs-12 mt-1">
                                    <label for="case_id" class="col-md-12 pl-0">{{ __('Reference Number :') }}</label>
                                    <input id="case_id" type="text" class="form-control @error('case_id') is-invalid @enderror" name="case_id" value="{{$dentalcase->case_id}}" required autocomplete="case_id" autofocus disabled>

                                    @error('case_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8 col-xs-12 mt-1">
                                    <label for="student_name" class="col-md-12 pl-0">{{ __('Student Name :') }}</label>
                                    <input id="student_name" type="text" class="form-control @error('student_name') is-invalid @enderror" name="student_name" value="{{ $dentalcase->student_name }}" required autocomplete="student_name" autofocus disabled>

                                    @error('student_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="student_id" class="col-md-12 pl-0">{{ __('Student ID :') }}</label>
                                    <input id="student_id" type="text" class="form-control @error('student_id') is-invalid @enderror" name="student_id" value="{{ $dentalcase->student_id }}" required autocomplete="student_id" autofocus disabled>

                                    @error('student_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 col-xs-12 mt-1">
                                    <label for="dentist_name" class="col-md-12 pl-0">{{ __('Dentist Name :') }}</label>
                                    <select name="dentist_name" id="dentist_name" class="form-control" disabled>
                                        <option value="" disabled>Choose a dentist.</option>
                                        @foreach ($dentists as $dentist)
                                            <option value="{{ $dentist->dentist_id }}" @if($dentalcase->dentist_id == $dentist->dentist_id) ? selected : null @endif>{{ $dentist->dentist_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('dentist_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 col-xs-12 mt-1">
                                    <label for="technician_name" class="col-md-12 pl-0">{{ __('Technician Name :') }}</label>
                                    <input id="technician_name" type="text" class="form-control @error('technician_name') is-invalid @enderror" name="technician_name" value="{{$dentalcase->technician_name}}" required autofocus disabled>

                                    @error('technician_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 col-xs-12 mt-1">
                                    <label for="patient_name" class="col-md-12 pl-0">{{ __('Patient Name :') }}</label>
                                    <input id="patient_name" type="text" class="form-control @error('dentist_name') is-invalid @enderror" name="patient_name" value="{{$dentalcase->patient_name}}" required autofocus disabled>

                                    @error('patient_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mt-4 mb-3">

                            <div class="form-group row">
                                <div class="col-md-12 col-xs-12 mt-1">
                                    <label for="case_type" class="col-md-12 pl-0">{{ __('Case Type :') }}</label>
                                    <select name="case_type" id="case_type" class="form-control" required disabled>
                                        <option value="" disabled selected>Please choose a type.</option>
                                        <option id="alginate" value="Alginate" @if($dentalcase->case_type == 'Alginate') ? selected : null @endif>Alginate</option>
                                        <option id="silicone" value="Silicone" @if($dentalcase->case_type == 'Silicone') ? selected : null @endif>Silicone</option>
                                        <option id="compound" value="Compound" @if($dentalcase->case_type == 'Compound') ? selected : null @endif>Compound</option>
                                        <option id="zoe" value="ZOE" @if($dentalcase->case_type == 'ZOE') ? selected : null @endif>ZOE</option>
                                        <option id="model" value="Model" @if($dentalcase->case_type == 'Model') ? selected : null @endif>Model</option>
                                        <option id="casetoproceed" value="Case To Proceed" @if($dentalcase->case_type == 'Case To Proceed') ? selected : null @endif>Case To Proceed</option>
                                        <option id="other" value="Other" @if($dentalcase->case_type == 'Other') ? selected : null @endif>Other</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="px-5">

                            <div class="form-group row mt-md-3 mb-md-4">
                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="case_1" class="col-md-12 pl-0">{{ __('Case 1') }}</label>
                                    <select name="case_1" id="case_1" class="form-control" onchange="caseSection(this); caseRemark(this);" disabled>
                                        <option value="" selected>{{$dentalcase->case_1}}</option>
                                    </select>
                                </div>

                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="case1_section" class="col-md-12 pl-0">{{ __('Upper/Lower') }}</label>
                                    <select name="case1_section" id="case1_section" class="form-control" required disabled>
                                        <option value="" selected>{{$dentalcase->case1_section}}</option>
                                    </select>

                                    @error('case_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>
                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="remark_1" class="col-md-12 pl-0">{{ __('Case Remark') }}</label>
                                    <select name="remark_1" id="remark_1" class="form-control" disabled required>
                                        <option value="" selected>{{$dentalcase->remark_1}}</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="px-5">

                            <div class="form-group row">
                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="case_2" class="col-md-12 pl-0">{{ __('Case 2') }}</label>
                                    <select name="case_2" id="case_2" class="form-control"  onchange="caseSection(this); caseRemark(this);" disabled required>
                                        <option value="-" selected>{{$dentalcase->case_2}}</option>
                                    </select>

                                    @error('case_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>

                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="case2_section" class="col-md-12 pl-0">{{ __('Upper/Lower') }}</label>
                                    <select name="case2_section" id="case2_section" class="form-control" disabled required>
                                        <option value="-" selected>{{$dentalcase->case2_section}}</option>
                                    </select>

                                    @error('case_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>

                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="remark_2" class="col-md-12 pl-0">{{ __('Case Remark') }}</label>
                                    <select name="remark_2" id="remark_2" class="form-control" required disabled>
                                        <option value="-" selected>{{$dentalcase->remark_2}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-4 mb-4 text-center">
                                <div class="col-md-12 col-xs-12">
                                    <div class="row justify-content-xs-center justify-content-md-end pr-md-3">
                                        @if ($dentalcase->verification_status == 1)
                                            {{-- <a href="/admin/{{$dentalcase->case_id}}/edit" class="btn btn-success-outline">Edit</a> --}}
                                        @else
                                            {{-- <a href="/admin/{{$dentalcase->case_id}}/edit" class="btn btn-success-outline mr-3">Edit</a> --}}
                                            <button type="submit" class="btn btn-success">
                                                {{ __('Verify') }}
                                            </button>
                                        @endif

                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer p-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('action_script')
    <script src="{{ asset('js/caseregistration.js') }}"></script>
@endsection


