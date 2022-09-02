@extends('layouts.master')
@section('title', 'Edit Driver')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Driver</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('administrator.dashboard') }}">Dashboard </a></li>
                                <li class="breadcrumb-item active" style="color: #74788d;">Edit Driver</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    
                    @if(count($errors) > 0)
                        <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                            <x-jet-validation-errors class="mb-4 my-2 text-white" />
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                        
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="needs-validation" action="{{ route('driver.update', $driver->id) }}" method="post" enctype="multipart/form-data" novalidate="">
                            @csrf

                                <div class="row">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-2">
                                        <p style="text-align: center;">@if($driver->photo) Current @else Default @endif Photo</p>
                                        <div class="zoom-gallery d-flex flex-wrap">
                                            @if($driver->photo)
                                                <a href="{{ asset('assets/uploads/drivers/'.$driver->photo) }}" title="{{ $driver->photo }}">
                                                    <img src="{{ asset('assets/uploads/drivers/'.$driver->photo) }}" alt="" style="height: 175px !important; width: 175px !important;" class="img-thumbnail rounded-circle">
                                                </a>
                                            @else
                                                <a href="{{ config('core.image.default.avatar') }}" title="Default Driver Image">
                                                    <img src="{{ config('core.image.default.avatar') }}" alt="" style="height: 175px !important; width: 175px !important;" class="img-thumbnail rounded-circle">
                                                </a>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-md-5"></div>
                                </div>
                                
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">Driver Name</label>
                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter driver name" name="name" value="{{ old('name', $driver->name) }}" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter driver name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip03" class="form-label">Change Photo</label>
                                            <input type="file" class="form-control" name="photo" >  
                                        </div>
                                    </div>
                                                                      
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip04" class="form-label">Phone No.</label>
                                            <input type="text" class="form-control" id="validationTooltip04" placeholder="Enter phone no" name="phone" value="{{ old('phone', $driver->phone) }}" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter phone no.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip05" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="validationTooltip05" placeholder="Enter email address" name="email" value="{{ old('email', $driver->email) }}">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter email address.
                                            </div>
                                        </div>
                                    </div>
                                                                      
                                </div>

                                <br>

                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        
                                        <button class="btn btn-primary" style="margin-top: 6px !important; width: 100% !important" type="submit">Update Bus</button>
                                        
                                    </div>
                            
                                </div>

                            </form>

                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection