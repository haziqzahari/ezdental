@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/student.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid student case-register">
        <div class="row h-100 justify-content-center">
            <div class="col-xs-12 col-md-8">
                <div class="card h-100">
                    <div class="card-header pl-5">Case Registration</div>

                    <div class="card-body pr-5 pl-5">
                        <form action="{{ route('student.registercase') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-4 offset-md-8 col-xs-12 mt-1">
                                    <label for="case_id" class="col-md-12 pl-0">{{ __('Reference Number') }}</label>
                                    <input id="case_id" type="text" class="form-control @error('case_id') is-invalid @enderror" name="case_id" value="" required autofocus>

                                    @error('case_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8 col-xs-12 mt-1">
                                    <label for="student_name" class="col-md-12 pl-0">{{ __('Student Name') }}</label>
                                <input id="student_name" type="text" class="form-control @error('student_name') is-invalid @enderror" name="student_name" value="{{ $student->student_name }}" required autofocus>

                                    @error('student_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="student_id" class="col-md-12 pl-0">{{ __('Student ID') }}</label>
                                <input id="student_id" type="text" class="form-control @error('student_id') is-invalid @enderror" name="student_id" value="{{ Auth::user()->name }}" required autofocus>

                                    @error('student_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 col-xs-12 mt-1">
                                    <label for="dentist_name" class="col-md-12 pl-0">{{ __('Supervisor Name') }}</label>
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
                                    <label for="patient_name" class="col-md-12 pl-0">{{ __('Patient Name') }}</label>
                                    <input id="patient_name" type="text" class="form-control @error('dentist_name') is-invalid @enderror" name="patient_name" value="" required autofocus>

                                    @error('patient_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mt-4 mb-3">

                            <div class="form-group row mb-md-4">
                                <div class="col-md-12 col-xs-12 mt-1">
                                    <label for="case_type" class="col-md-12 pl-0">{{ __('Case Type') }}</label>
                                    <select name="case_type" id="case_type" class="form-control" required>
                                        <option value="" disabled selected>Please choose a type.</option>
                                        <option id="alginate" value="Alginate">Alginate</option>
                                        <option id="silicone" value="Silicone">Silicone</option>
                                        <option id="compound" value="Compound">Compound</option>
                                        <option id="zoe" value="ZOE">ZOE</option>
                                        <option id="model" value="Model">Model</option>
                                        <option id="case_to_proceed" value="Case To Proceed">Case To Proceed</option>
                                        <option id="other" value="Other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="px-5">

                            <div class="form-group row mt-md-3 mb-md-4">
                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="case_1" class="col-md-12 pl-0">{{ __('Case 1') }}</label>
                                    <select name="case_1" id="case_1" class="form-control" onchange="caseSection(this); caseRemark(this);">
                                        <option value="-" selected>-</option>
                                        <option value="Full">Full</option>
                                        <option value="Partial">Partial</option>
                                        <option value="Chrome">Chrome</option>
                                        <option value="Immediate">Immediate</option>
                                        <option value="Study Model">Study Model</option>
                                        <option value="Splint">Splint</option>
                                        <option value="Repair">Repair</option>
                                        <option value="Reline/Rebase">Reline/Rebase</option>
                                    </select>
                                </div>

                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="case1_section" class="col-md-12 pl-0">{{ __('Upper/Lower') }}</label>
                                    <select name="case1_section" id="case1_section" class="form-control" required>
                                        <option value="-" selected>-</option>
                                    </select>

                                    @error('case_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>
                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="remark_1" class="col-md-12 pl-0">{{ __('Case Remark') }}</label>
                                    <select name="remark_1" id="remark_1" class="form-control" required>
                                        <option value="-" selected>-</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="px-5">

                            <div class="form-group row pb-3">
                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="case_2" class="col-md-12 pl-0">{{ __('Case 2') }}</label>
                                    <select name="case_2" id="case_2" class="form-control"  onchange="caseSection(this); caseRemark(this);" required>
                                        <option value="-" selected>-</option>
                                        <option value="Full">Full</option>
                                        <option value="Partial">Partial</option>
                                        <option value="Chrome">Chrome</option>
                                        <option value="Immediate">Immediate</option>
                                        <option value="Study Model">Study Model</option>
                                        <option value="Splint">Splint</option>
                                        <option value="Repair">Repair</option>
                                        <option value="Reline/Rebase">Reline/Rebase</option>
                                    </select>

                                    @error('case_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>

                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="case2_section" class="col-md-12 pl-0">{{ __('Upper/Lower') }}</label>
                                    <select name="case2_section" id="case2_section" class="form-control"  required>
                                        <option value="-" selected>-</option>
                                    </select>

                                    @error('case_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>

                                <div class="col-md-4 col-xs-12 mt-1">
                                    <label for="remark_2" class="col-md-12 pl-0">{{ __('Case Remark') }}</label>
                                    <select name="remark_2" id="remark_2" class="form-control" required>
                                        <option value="-" selected>-</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="px-5 mt-3">

                            <div class="form-group row mt-4 mb-4 text-center">
                                <div class="col-md-12 col-xs-12">
                                    <div class="row justify-content-xs-center justify-content-md-end pr-md-3">
                                        <button type="submit" class="btn btn-success">
                                            <div class="pull-left">Register
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill ml-2 text-left" viewBox="0 0 20 20">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                            </svg>
                                            </div>

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
    <script>
        function caseRemark(selectObject)
        {
            if(selectObject.id == 'case_1')
            {
                const myNode = document.getElementById("remark_1");
                while (myNode.lastElementChild) {
                    myNode.removeChild(myNode.lastElementChild);
                }

                var text=[];

                if(selectObject.value == "Full" || selectObject.value == "Partial")
                {
                    text = ["Special Tray", "MMR", "Setting", "Process"];
                }
                else if(selectObject.value == "Chrome")
                {
                    text = ["Special Tray", "Framework", "MMR", "Setting", "Process"];
                }
                else
                {
                    text = ["-"];
                }

                text.forEach(function(t){
                        var option = document.createElement("option");
                        option.setAttribute("value", t);
                        option.innerHTML = t;
                        document.getElementById("remark_1").appendChild(option);
                    });

            }
            else
            {
                const myNode = document.getElementById("remark_2");
                while (myNode.lastElementChild) {
                    myNode.removeChild(myNode.lastElementChild);
                }

                var text=[];

                if(selectObject.value == "Full" || selectObject.value == "Partial")
                {
                    text = ["Special Tray", "MMR", "Setting", "Process"];
                }
                else if(selectObject.value == "Chrome")
                {
                    text = ["Special Tray", "Framework", "MMR", "Setting", "Process"];
                }
                else
                {
                    text = ["-"];
                }
                text.forEach(function(t){
                        var option = document.createElement("option");
                        option.setAttribute("value", t);
                        option.innerHTML = t;
                        document.getElementById("remark_2").appendChild(option);
                    });

            }
        }


        function caseSection(selectObject)
        {

            if(selectObject.id=='case_1'){

                const myNode = document.getElementById("case1_section");
                while (myNode.lastElementChild) {
                    myNode.removeChild(myNode.lastElementChild);
                }

                var text = [];

                if (selectObject.value == "Full")
                {
                    text = ["F/F", "F/", "/F"];
                }
                else if (selectObject.value == "Partial")
                {
                    text = ["P/P", "P/", "/P"];
                }
                else if (selectObject.value == "Chrome")
                {
                    text = ["K/K", "K/", "/K"];
                }
                else if (selectObject.value == "Immediate")
                {
                    text = ["I/I", "I/", "/I"];
                }
                else if (selectObject.value == "Study Model")
                {
                    text = ["M/M", "M/", "/M"];
                }
                else if (selectObject.value == "Splint")
                {
                    text = ["S/S", "S/", "/S"];
                }
                else if (selectObject.value == "Repair")
                {
                    text = ["R/R", "R/", "/R"];
                }
                else if (selectObject.value == "Reline/Rebase")
                {
                    text = ["L/L", "L/", "/L"];
                }
                else
                {
                    text = ["-"];
                }

                text.forEach(function(t){
                        var option = document.createElement("option");
                        option.setAttribute("value", t);
                        option.innerHTML = t;
                        document.getElementById("case1_section").appendChild(option);
                });

            }
            else{
                const myNode = document.getElementById("case2_section");
                while (myNode.lastElementChild) {
                    myNode.removeChild(myNode.lastElementChild);
                }

                var text = [];

                if (selectObject.value == "Full")
                {
                    text = ["F/F", "F/", "/F"];
                }
                else if (selectObject.value == "Partial")
                {
                    text = ["P/P", "P/", "/P"];
                }
                else if (selectObject.value == "Chrome")
                {
                    text = ["K/K", "K/", "/K"];
                }
                else if (selectObject.value == "Immediate")
                {
                    text = ["I/I", "I/", "/I"];
                }
                else if (selectObject.value == "Study Model")
                {
                    text = ["M/M", "M/", "/M"];
                }
                else if (selectObject.value == "Splint")
                {
                    text = ["S/S", "S/", "/S"];
                }
                else if (selectObject.value == "Repair")
                {
                    text = ["R/R", "R/", "/R"];
                }
                else if (selectObject.value == "Reline/Rebase")
                {
                    text = ["L/L", "L/", "/L"];
                }
                else
                {
                    text = ["-"];
                }
                text.forEach(function(t){
                        var option = document.createElement("option");
                        option.setAttribute("value", t);
                        option.innerHTML = t;
                        document.getElementById("case2_section").appendChild(option);
                });
            }


        }
    </script>
@endsection
