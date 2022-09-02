@extends('layouts.master')
@section('title', 'Get Started | Requisition')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Requisition</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('teacher.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">New Requisition</li>
                            </ol>
                        </div>
                        
                    </div>
                </div>
            </div>     
            <!-- end page title -->

            
            <div class="row">
                <div class="col-lg-6">

                    <div class="card text-center">
                        <div class="card-body">
                            <span class="badge rounded-pill badge-soft-primary font-size-11">Teacher</span>
                            <div class="avatar-sm mx-auto mb-4">
                                <br><span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                    <a class="image-popup-vertical-fit" href="{{ config('core.image.default.avatar') }}">
                                        <img src="{{ config('core.image.default.avatar') }}" alt="agency-pic" height="40" width="40" style="border-radius: 50%;">
                                    </a>
                                </span>
                            </div>
                            <br><h5 class="font-size-16 mb-1">{{ $auth->name }}</h5>
                            <p class="text-muted">{{ $auth->recognition }}, {{ $auth->dept }}</p>
                            <p class="text-muted" style="margin-top: -15px;">{{ $auth->email }}</p>

                        </div>
                    </div>

                </div> <!-- end col -->
                <div class="col-lg-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="badge rounded-pill badge-soft-info font-size-11">Vehicle Charges</span>
                            
                            <div class="text-muted mt-4" style="text-align: justify;">

                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i> <span style="font-weight: 550;">20 Tk/Km + 20 Tk/Hr haltage charge</span> (Minimum <b style="font-weight: 550;">2000 Tk</b>) - <span class="text-primary" style="text-transform: uppercase; font-weight: 550;">Big Bus</span></p>

                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i> <span style="font-weight: 550;">15 Tk/Km + 15 Tk/Hr haltage charge</span> (Minimum <b style="font-weight: 550;">1500 Tk</b>) - <span class="text-primary" style="text-transform: uppercase; font-weight: 550;">Mini Bus</span></p>

                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i> <span style="font-weight: 550;">06 Tk/Km + 12 Tk/Hr haltage</span> (Minimum <b style="font-weight: 550;">150 Tk</b>) - <span class="text-primary" style="text-transform: uppercase; font-weight: 550;">Micro Bus/Pajero/Pickup</span></p>

                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i> <span style="font-weight: 550;">04 Tk/Km + 10 Tk/Hr haltage charge</span> (Minimum <b style="font-weight: 550;">100 Tk</b>) - <span class="text-primary" style="text-transform: uppercase; font-weight: 550;">Car/Ambulance</span></p>

                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i> <span style="font-weight: 550;"> <span class="text-primary" style="text-transform: uppercase; font-weight: 550;">**</span>No charge applicable for the official requisition.</span></p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <br><br>

            <div class="row">
                <div class="col-xl-12 text-center">
                    <h4 class="mb-sm-0 font-size-18">Select an Option</h4>
                </div>
            </div>

            <div class="row" style="margin-top: 10px !important;">
                <div class="col-lg-6">
                    <div class="card border border-primary">
                        <div class="card-header bg-transparent border-primary">
                            <h5 class="my-0 text-primary text-center"><i class="mdi mdi-bullseye-arrow me-3"></i>Official</h5>

                            <div class="d-flex justify-content-center" style="margin-top: 10px; margin-bottom: -15px;">
                                <div class="spinner-grow text-primary m-1" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title mt-0">Type : Official</h5>
                            <p class="card-text" style="text-align: justify;">Click on the below button to go with Official work.</p>
                        </div>
                    <?php
                        
                    ?>
                        <div class="card-footer">

                            <form class="needs-validation" action="{{ route('create.official.requisition') }}" method="post" novalidate="">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">Car Type</label>
                                        <select class="form-control select2" id="validationTooltip01" name="car_type" required="">
                                    
                                            <option value="">Select Car Type</option>
                                            <optgroup label="Group 1">
                                                <option value="Big Bus">BIG BUS</option>
                                            </optgroup>

                                            <optgroup label="Group 2">
                                                <option value="Mini Bus">MINI BUS</option>
                                            </optgroup>

                                            <optgroup label="Group 3">
                                                <option value="Micro Bus">MICRO BUS</option>
                                                <option value="Pajero">PAJERO</option>
                                                <option value="Pickup">PICKUP</option>
                                            </optgroup>

                                            <optgroup label="Group 4">
                                                <option value="Car">Car</option>
                                                <option value="Ambulance">AMBULANCE</option>
                                            </optgroup>

                                        </select>

                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please select car type.
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" style="width: 100%;" class="btn btn-primary waves-effect waves-light">Go for Official</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border border-success">
                        <div class="card-header bg-transparent border-success">
                            <h5 class="my-0 text-success text-center"><i class="mdi mdi-check-all me-3"></i>Personal</h5>

                            <div class="d-flex justify-content-center" style="margin-top: 10px; margin-bottom: -15px;">
                                <div class="spinner-grow text-success m-1" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title mt-0">Type : Personal</h5>
                            <p class="card-text" style="text-align: justify;">Click on the below button to go with Personal work.</p>
                        </div>
                        <div class="card-footer">
                            <form class="needs-validation" action="{{ route('create.personal.requisition') }}" method="post" novalidate="">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip100" class="form-label">Car Type</label>
                                        <select class="form-control select2" id="validationTooltip100" name="car_type" required="">
                                    
                                            <option value="">Select Car Type</option>
                                            <optgroup label="Group 1">
                                                <option value="Big Bus">BIG BUS</option>
                                            </optgroup>

                                            <optgroup label="Group 2">
                                                <option value="Mini Bus">MINI BUS</option>
                                            </optgroup>

                                            <optgroup label="Group 3">
                                                <option value="Micro Bus">MICRO BUS</option>
                                                <option value="Pajero">PAJERO</option>
                                                <option value="Pickup">PICKUP</option>
                                            </optgroup>

                                            <optgroup label="Group 4">
                                                <option value="Car">Car</option>
                                                <option value="Ambulance">AMBULANCE</option>
                                            </optgroup>

                                        </select>

                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please select car type.
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" style="width: 100%;" class="btn btn-success waves-effect waves-light">Go for Personal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection