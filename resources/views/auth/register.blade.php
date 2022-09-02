@extends('layouts.frontend-master')

@section('title', 'Register with us')

@section('content')

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Free Register</h5>
                                        <p>Grab your free {{ config('app.name') }} account now.</b></p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0"> 
                            <div>
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                                
                            </div>
                            <div class="p-2">

                                @if(count($errors) > 0)
                                    <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                        <x-jet-validation-errors class="mb-4 my-2 text-white" />
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif


                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist" style="border: 1px solid #ced4da; border-radius: 0.3rem; margin-top: 1px !important;">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab" aria-selected="true">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Teachers</span> 
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab" aria-selected="false">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Officials</span> 
                                        </a>
                                    </li>
                                </ul>

                                <br>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">

                                        <form class="needs-validation" action="{{ route('register') }}" method="POST" enctype="multipart/form-data" novalidate>
                                            
                                            @csrf

                                            <input type="hidden" name="is_official" value="No">

                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip01" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter your name" name="name" value="{{ old('name') }}" required="">
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter your name.
                                                </div>
                                            </div>

                                            <br>
                                        
                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip02" class="form-label">E-mail</label>
                                                <input type="email" class="form-control" id="validationTooltip02" name="email" value="{{ old('email') }}" placeholder="Enter E-mail Address" required="">
                                                
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter valid E-mail address.
                                                </div>
                                            </div>

                                            <br>

                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip200" class="form-label">Phone No.(11 digit)</label>
                                                <input type="tel" class="form-control" id="validationTooltip200" name="phone" pattern="[0-9]{11}" placeholder="Enter Phone No." required="">
                                                
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter valid phone number.
                                                </div>
                                            </div>

                                            <br>

                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip12" class="form-label">Department</label>
                                                <select class="form-control select2" id="validationTooltip12" name="dept" required="">
                                                
                                                    <option value="">Select Your Dept.</option>

                                                    <optgroup label="Faculty of Engineering">
                                                        <option value="ICT">ICT</option>
                                                        <option value="CSE">CSE</option>
                                                        <option value="TE">TE</option>
                                                        <option value="ME">ME</option>
                                                    </optgroup>

                                                    <optgroup label="Faculty of Life Science">
                                                        <option value="ESRM">ESRM</option>
                                                        <option value="CPS">CPS</option>
                                                        <option value="FTNS">FTNS</option>
                                                        <option value="BGE">BGE</option>
                                                        <option value="Pharmacy">Pharmacy</option>
                                                        <option value="BMB">BMB</option>
                                                    </optgroup>

                                                    <optgroup label="Faculty of Business Studies">
                                                        <option value="Business Administration">Business Administration</option>
                                                        <option value="Management">Management</option>
                                                        <option value="Accounting">Accounting</option>
                                                    </optgroup>

                                                    <optgroup label="Faculty of Science">
                                                        <option value="Chemistry">Chemistry</option>
                                                        <option value="MATH">MATH</option>
                                                        <option value="Physics">Physics</option>
                                                        <option value="STAT">STAT</option>
                                                    </optgroup>

                                                    <optgroup label="Faculty of Social Science">
                                                        <option value="ECO">ECO</option>
                                                    </optgroup>

                                                    <optgroup label="Faculty of Arts">
                                                        <option value="English">English</option>
                                                    </optgroup>

                                                </select>

                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please select your Dept.
                                                </div>
                                            </div>

                                            <br>

                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip13" class="form-label">Designation</label>
                                                <select class="form-control select2" id="validationTooltip13" name="recognition" required="">
                                                
                                                    <option value="">Select Your Designation</option>

                                                    <option value="Professor">Professor</option>
                                                    <option value="Assistant Professor">Assistant Professor</option>
                                                    <option value="Associate Professor">Associate Professor</option>
                                                    <option value="Lecturer">Lecturer</option>

                                                </select>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter your designation.
                                                </div>
                                            </div>

                                            <br>

                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip29" class="form-label">Signature(Optional) - Valid Format: <span class="text-primary">jpg & jpeg</span></label>
                                                <input type="file" id="validationTooltip29" class="form-control" accept=".jpg, .jpeg" name="signature">  

                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter your signature.
                                                </div>
                                            </div>

                                            <br>
                                        
                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip07" class="form-label">Password</label>

                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" id="validationTooltip07" name="password" value="{{ old('password') }}" aria-label="Password" aria-describedby="password-addon" placeholder="Enter Password" required="">

                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>

                                                    <div class="invalid-tooltip">
                                                        Please enter valid password.
                                                    </div>
                                                    
                                                    <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>

                                            <br>

                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip08" class="form-label">Re-type Password</label>
                                                
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" id="validationTooltip08" placeholder="Re-type Password" aria-label="Password" name="password_confirmation" aria-describedby="password-addon-two" onkeyup="matchPassword()" required="">

                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>

                                                    <div class="invalid-tooltip">
                                                        Please Re-type Password again.
                                                    </div>

                                                    <button class="btn btn-light" type="button" id="password-addon-two" onclick="TogglePass()"><i class="mdi mdi-eye-outline"></i></button>

                                                    <div class="valid-tooltip" id="matched" style="display: none;">
                                                        Password Matched!
                                                    </div>

                                                    <div class="invalid-tooltip" id="notmatched" style="display: none;">
                                                        Password not matched yet.
                                                    </div>

                                                </div>
                                            </div>

                                            <br>
                        
                                            <div class="d-grid">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Register as Teacher</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <p class="mb-0">By registering you agree to the {{ config('app.name') }} <a href="#" class="text-primary">Terms of Use</a></p>
                                            </div>
                                        </form>

                                    </div>

                                    <div class="tab-pane" id="profile-1" role="tabpanel">

                                        <form class="needs-validation" action="{{ route('register') }}" method="POST" enctype="multipart/form-data" novalidate>
                                            
                                            @csrf

                                            <input type="hidden" name="dept" value="Not Available">
                                            <input type="hidden" name="is_official" value="Yes">

                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip100" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="validationTooltip100" placeholder="Enter your name" name="name" value="{{ old('name') }}" required="">
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter your name.
                                                </div>
                                            </div>

                                            <br>
                                        
                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip102" class="form-label">E-mail</label>
                                                <input type="email" class="form-control" id="validationTooltip102" name="email" value="{{ old('email') }}" placeholder="Enter E-mail Address" required="">
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter valid E-mail address.
                                                </div>
                                            </div>

                                            <br>

                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip201" class="form-label">Phone No.(11 digit)</label>
                                                <input type="tel" class="form-control" id="validationTooltip201" name="phone" pattern="[0-9]{11}" placeholder="Enter Phone No." required="">
                                                
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter valid phone number.
                                                </div>
                                            </div>

                                            <br>

                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip103" class="form-label">Designation</label>
                                                <select class="form-control select2" id="validationTooltip103" name="recognition" required="">
                                                
                                                    <option value="">Select Your Designation</option>

                                                    <option value="Deputy Register">Deputy Register</option>
                                                    <option value="Assistant Register">Assistant Register</option>
                                                    <option value="Section Officer">Section Officer</option>
                                                    <option value="UDA">UDA</option>
                                                    <option value="LDA">LDA</option>

                                                </select>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter your designation.
                                                </div>
                                            </div>

                                            <br>

                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip35" class="form-label">Signature(Optional) - Valid Format: <span class="text-primary">jpg & jpeg</span></label>
                                                <input type="file" id="validationTooltip35" class="form-control" accept=".jpg, .jpeg" name="signature">  

                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter your valid (jpg, jpeg format) signature.
                                                </div>
                                            </div>

                                            <br>
                                        
                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip107" class="form-label">Password</label>

                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" id="validationTooltip107" name="password" value="{{ old('password') }}" aria-label="Password" aria-describedby="password-addon" placeholder="Enter Password" required="">

                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>

                                                    <div class="invalid-tooltip">
                                                        Please enter valid password.
                                                    </div>
                                                    
                                                    <button class="btn btn-light" type="button" id="password-addon" onclick="TogglePassTwo()"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>

                                            <br>

                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip108" class="form-label">Re-type Password</label>
                                                
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" id="validationTooltip108" placeholder="Re-type Password" aria-label="Password" name="password_confirmation" aria-describedby="password-addon-two" onkeyup="matchPasswordTwo()" required="">

                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>

                                                    <div class="invalid-tooltip">
                                                        Please Re-type Password again.
                                                    </div>

                                                    <button class="btn btn-light" type="button" id="password-addon-two" onclick="TogglePassThree()"><i class="mdi mdi-eye-outline"></i></button>

                                                    <div class="valid-tooltip" id="matchedtwo" style="display: none;">
                                                        Password Matched!
                                                    </div>

                                                    <div class="invalid-tooltip" id="notmatchedtwo" style="display: none;">
                                                        Password not matched yet.
                                                    </div>

                                                </div>
                                            </div>

                                            <br>
                        
                                            <div class="d-grid">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Register as Official</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <p class="mb-0">By registering you agree to the {{ config('app.name') }} <a href="#" class="text-primary">Terms of Use</a></p>
                                            </div>
                                        </form>

                                    </div>

                                </div>

                            </div>
        
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        
                        <div>
                            <p>© <script>document.write(new Date().getFullYear())</script> {{ config('app.name') }}. Crafted with <i class="mdi mdi-heart text-danger"></i> by Snigdho</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('styles')
    <style type="text/css">
        .select2-container .select2-selection--single {
            width: 363px !important;
        }

        .navigation .navbar-nav .nav-item .nav-link {
            color: #556ee6 !important;
        }

        .navigation .navbar-nav .nav-item .nav-link.active, .navigation .navbar-nav .nav-item .nav-link:hover {
            color: #556ee6 !important;
        }

        .navigation.nav-sticky .navbar-nav .nav-item .nav-link {
            color: #556ee6 !important;
        }
    </style>
@endsection

@section('scripts')
    <script>  
        
        function matchPassword() {  
            var pw1 = document.getElementById("validationTooltip07").value;  
            var pw2 = document.getElementById("validationTooltip08").value;
            if($.trim(pw1) != ''){
                if($.trim(pw2) != ''){
                    if(pw1 != pw2)  
                    { 
                        $('#matched').css('display', 'none');  
                        $('#notmatched').css('display', 'block');
                    } else { 
                        $('#notmatched').css('display', 'none');
                        $('#matched').css('display', 'block');
                    }
                } else {
                    $('#notmatched').css('display', 'none');
                    $('#matched').css('display', 'none');
                }
            }
        }


        function matchPasswordTwo() {  
            var pw1 = document.getElementById("validationTooltip107").value;  
            var pw2 = document.getElementById("validationTooltip108").value;
            if($.trim(pw1) != ''){
                if($.trim(pw2) != ''){
                    if(pw1 != pw2)  
                    { 
                        $('#matchedtwo').css('display', 'none');  
                        $('#notmatchedtwo').css('display', 'block');
                    } else { 
                        $('#notmatchedtwo').css('display', 'none');
                        $('#matchedtwo').css('display', 'block');
                    }
                } else {
                    $('#notmatchedtwo').css('display', 'none');
                    $('#matchedtwo').css('display', 'none');
                }
            }
        }


        function TogglePass() {
            var temp = document.getElementById("validationTooltip08");
            if (temp.type === "password") {
                temp.type = "input";
            }
            else {
                temp.type = "password";
            }
        }

        function TogglePassTwo() {
            var temp = document.getElementById("validationTooltip107");
            if (temp.type === "password") {
                temp.type = "input";
            }
            else {
                temp.type = "password";
            }
        }

        function TogglePassThree() {
            var temp = document.getElementById("validationTooltip108");
            if (temp.type === "password") {
                temp.type = "input";
            }
            else {
                temp.type = "password";
            }
        }
    
    </script>   

    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2();
        });
    </script>      
@endsection