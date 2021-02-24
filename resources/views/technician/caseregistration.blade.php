@extends('layouts.app')

@section('content')
    <div class="container-fluid case-register login-section">
        <div class="row h-100 justify-content-center">
            <div class="col-xs-12 col-md-8">
                <div class="card h-100">
                    <div class="card-header">Case Registration</div>

                    <div class="card-body pr-5 pl-5">
                        <form action="{{ route('student.registercase') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-4 offset-md-8 col-xs-12 mt-1">
                                    <label for="case_id" class="col-md-12 pl-0">{{ __('Reference Number :') }}</label>
                                    <input id="case_id" type="text" class="form-control @error('case_id') is-invalid @enderror" name="case_id" value="" required autocomplete="case_id" autofocus>

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
                                <input id="student_name" type="text" class="form-control @error('student_name') is-invalid @enderror" name="student_name" value="{{ $student->student_name }}" required autocomplete="student_name" autofocus>

                                    @error('student_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="student_id" class="col-md-12 pl-0">{{ __('Student ID :') }}</label>
                                <input id="student_id" type="text" class="form-control @error('student_id') is-invalid @enderror" name="student_id" value="{{ Auth::user()->name }}" required autocomplete="student_id" autofocus>

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
                                    <select name="dentist_name" id="dentist_name" class="form-control">
                                        <option value="" disabled selected>Choose a dentist.</option>
                                        @foreach ($dentists as $dentist)
                                            <option value="{{ $dentist->dentist_id }}">{{ $dentist->dentist_name }}</option>
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
                                    <label for="patient_name" class="col-md-12 pl-0">{{ __('Patient Name :') }}</label>
                                    <input id="patient_name" type="text" class="form-control @error('dentist_name') is-invalid @enderror" name="patient_name" value="" required autofocus>

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
                                    <select name="case_type" id="case_type" class="form-control" required>
                                        <option value="" disabled selected>Please choose a type.</option>
                                        <option id="alginate" value="Alginate">Alginate</option>
                                        <option id="silicone" value="Silicone">Silicone</option>
                                        <option id="compound" value="Compound">Compound</option>
                                        <option id="zoe" value="ZOE">ZOE</option>
                                        <option id="model" value="Model">Model</option>
                                        <option id="other" value="Other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-md-3">
                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="case_1" class="col-md-12 pl-0">{{ __('Case 1 :') }}</label>
                                    <select name="case_1" id="case_1" class="form-control" required>
                                        <option value="" disabled selected>Please choose a case.</option>
                                        <optgroup label="Full">
                                            <option value="F/F">F/F</option>
                                            <option value="F/">F/</option>
                                            <option value="/F">/F</option>
                                        </optgroup>
                                        <optgroup label="Partial">
                                            <option value="P/P">P/P</option>
                                            <option value="P/">P/</option>
                                            <option value="/P">/P</option>
                                        </optgroup>
                                        <optgroup label="Immediate">
                                            <option value="P/P">P/P</option>
                                            <option value="P/">P/</option>
                                            <option value="/P">/P</option>
                                        </optgroup>
                                        <optgroup label="Cobalt Chrome">
                                            <option value="K/K">K/K</option>
                                            <option value="K/">K/</option>
                                            <option value="/K">/K</option>
                                        </optgroup>
                                        <optgroup label="Study Model">
                                            <option value="M/M">M/M</option>
                                            <option value="M/">M/</option>
                                            <option value="/M">/M</option>
                                        </optgroup>
                                        <optgroup label="Repair">
                                            <option value="R/R">R/R</option>
                                            <option value="R/">R/</option>
                                            <option value="/R">/R</option>
                                        </optgroup>
                                        <optgroup label="Splint">
                                            <option value="S/S">S/S</option>
                                            <option value="S/">S/</option>
                                            <option value="/S">/S</option>
                                        </optgroup>
                                        <optgroup label="Reline/Rebase">
                                            <option value="R/R">R/R</option>
                                            <option value="R/">R/</option>
                                            <option value="/R">/R</option>
                                        </optgroup>
                                    </select>

                                    @error('case_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>
                                <div class="col-md-8 col-xs-12 mt-1">
                                    <label for="remark_1" class="col-md-12 pl-0">{{ __('Case Type :') }}</label>
                                    <select name="remark_1" id="remark_1" class="form-control" required>
                                        <option value="none" selected>None</option>
                                        <option value="specialtray">Special Tray</option>
                                        <option value="framework">Framework</option>
                                        <option value="mmr">MMR</option>
                                        <option value="setting">Setting</option>
                                        <option value="process">Process</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="case_2" class="col-md-12 pl-0">{{ __('Case 2 :') }}</label>
                                    <select name="case_2" id="case_2" class="form-control" required>
                                        <option value="" disabled selected>Please choose a case.</option>
                                        <optgroup label="Full">
                                            <option value="F/F">F/F</option>
                                            <option value="F/">F/</option>
                                            <option value="/F">/F</option>
                                        </optgroup>
                                        <optgroup label="Partial">
                                            <option value="P/P">P/P</option>
                                            <option value="P/">P/</option>
                                            <option value="/P">/P</option>
                                        </optgroup>
                                        <optgroup label="Immediate">
                                            <option value="P/P">P/P</option>
                                            <option value="P/">P/</option>
                                            <option value="/P">/P</option>
                                        </optgroup>
                                        <optgroup label="Cobalt Chrome">
                                            <option value="K/K">K/K</option>
                                            <option value="K/">K/</option>
                                            <option value="/K">/K</option>
                                        </optgroup>
                                        <optgroup label="Study Model">
                                            <option value="M/M">M/M</option>
                                            <option value="M/">M/</option>
                                            <option value="/M">/M</option>
                                        </optgroup>
                                        <optgroup label="Repair">
                                            <option value="R/R">R/R</option>
                                            <option value="R/">R/</option>
                                            <option value="/R">/R</option>
                                        </optgroup>
                                        <optgroup label="Splint">
                                            <option value="S/S">S/S</option>
                                            <option value="S/">S/</option>
                                            <option value="/S">/S</option>
                                        </optgroup>
                                        <optgroup label="Reline/Rebase">
                                            <option value="R/R">R/R</option>
                                            <option value="R/">R/</option>
                                            <option value="/R">/R</option>
                                        </optgroup>
                                    </select>

                                    @error('case_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>
                                <div class="col-md-8 col-xs-12 mt-1">
                                    <label for="remark_2" class="col-md-12 pl-0">{{ __('Case Remark :') }}</label>
                                    <select name="remark_2" id="remark_2" class="form-control" required>
                                        <option value="none" selected>None</option>
                                        <option value="specialtray">Special Tray</option>
                                        <option value="framework">Framework</option>
                                        <option value="mmr">MMR</option>
                                        <option value="setting">Setting</option>
                                        <option value="process">Process</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-4 mb-4 text-center">
                                <div class="col-md-12 col-xs-12">
                                    <div class="row justify-content-xs-center justify-content-md-end pr-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('action_script')
    <script src="{{ asset('js/caseregistration.js') }}"></script>
@endsection
