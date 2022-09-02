@extends('layouts.master')
@section('title', 'Scheduled Drivers')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Scheduled Drivers</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('administrator.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Scheduled Drivers</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            {{-- @if(Session::has('error'))
                                <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                    <span class="mb-4 my-2 text-white">{{ Session::get('error') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif --}}

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th style="width: 20px;">
                                            SL
                                        </th>
                                        <th class="align-middle">Name</th>
                                        <th class="align-middle">Phone No.</th>
                                        <th class="align-middle">Date & Time</th>
                                        <th class="align-middle text-center">Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                
                                <?php $i = 1; ?>
                                @foreach($requisitions as $key => $requisition)

                                    @if($requisition->driver_id != null)
                                        <?php 
                                            $driver = \App\Models\Driver::findOrFail($requisition->driver_id);
                                        ?>
                                        <tr>
                                            <td>
                                                {{ $i++ }}
                                            </td>
                                            
                                            <td id="tooltip-container">
                                                <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $driver->name }}">
                                                    {{ $driver->name }}
                                                </span> 
                                            </td>

                                            <td id="tooltip-container">
                                                <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $driver->phone }}">
                                                    {{ $driver->phone }}
                                                </span> 
                                            </td>

                                            <td>
                                                <?php
                                                    $date_time = strtotime($requisition->start_at);
                                                    $not_date = date('d M, Y', $date_time);

                                                    $time = date('h:i A', $date_time)
                                                ?>
                                                {{ $not_date }} - {{ $time }}
                                            </td>

                                            <td style="text-align: center;">
                                                <a class="btn btn-primary btn-rounded btn-sm waves-effect waves-light" href="{{ route('manage.requisition', $requisition->id) }}">
                                                    <i class="bx bx-loader bx-spin font-size-16 align-middle me-1"></i> View Requisition 
                                                    <i class="bx bxs-right-arrow bx-fade-right" style="position: relative; top: 1px;"></i>
                                                </a>
                                            </td>                                           
                                            
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection