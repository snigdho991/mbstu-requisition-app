@extends('layouts.master')
@section('title', 'Vice Chancellor - Approved Requisitions')

@section('content')

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Vice Chancellor - Approved Requisitions (<?php echo $approved->count(); ?>)</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('chairman.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Approved Requisitions(Vice Chancellor)</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            @if(count($errors) > 0)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                    <x-jet-validation-errors class="mb-4 my-2 text-white" />
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <h5>
                                <span class="text-success"><b>Vice Chancellor - Approved Requisitions (<?php echo $approved->count(); ?>)</b></span>
                                
                            </h5> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Car Type</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Dept.</th>
                                        <th>Requisition</th>
                                        <th>Start At</th>

                                        <th>Distance</th>
                                        <th>Duration</th>
                                        <th>Cost</th>

                                        <th style="text-align: center;">Action</th>

                                        <th>From</th>
                                        <th>To</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach($approved as $key => $data)
                                        <?php
                                            $teacher = \App\Models\User::find($data->user_id);
                                        ?>
                                        <tr>
                                            <td><span style="margin-left: 3px;">{{ $key + 1 }}</span></td>
                                            
                                            <td>
                                                <span>{{ $data->car_type }}</span>
                                                <span class="CellWithComment">
                                                    <i class="mdi mdi-arrow-up-bold-circle-outline ms-1 text-success" style="position: relative; top: -4px; cursor: pointer; font-size: 18px; float: right;"></i>
                                                    <span class="CellComment" style="background-color:#34c38f !important;">Approved By VC</span>
                                                </span>
                                            </td>
                                            <td>{{ $teacher->name }}</td>
                                            <td>{{ $teacher->recognition }}</td>
                                            <td><span style="font-weight: 500;">{{ $teacher->dept }}</span></td>
                                            <td>{{ $data->requisition_type }}</td>
                                            <td>{{ $data->start_at }}</td>
                                            
                                            <td><span style="font-weight: 500;">{{ $data->distance }} Km</span></td>
                                            <td>{{ $data->duration }}</td>
                                            <td><span style="font-weight: 500;">{{ $data->cost }} Tk</span></td>

                                            <td style="text-align: center;">
                                                <a class="btn btn-primary btn-rounded btn-sm waves-effect waves-light" href="{{ route('manage.requisition', $data->id) }}">
                                                    <i class="bx bx-loader bx-spin font-size-16 align-middle me-1"></i> View Details 
                                                    <i class="bx bxs-right-arrow bx-fade-right" style="position: relative; top: 1px;"></i>
                                                </a>
                                            </td>

                                            <td>{{ $data->from }}</td>
                                            <td>{{ $data->to }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <p style="text-align: center; margin-top: 10px;"><a class="btn btn-primary waves-effect waves-light" href="{{ route('chairman.dashboard') }}"><i class="far fa-arrow-alt-circle-left"></i> Go To Dashboard </a></p>
            <br>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection


@section('styles')
    <style type="text/css">

        .table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before {
            margin-top: -14px !important;
        }

        .CellWithComment{
            position:relative;
        }

        .CellComment{
            display: none;
            position: absolute; 
            z-index: 100;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 500;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
        }

        .CellWithComment:hover span.CellComment{
            display:block;
        }

        .form-control:disabled, .form-control[readonly] {
            color: #000 !important;
            background: rgb(142 147 168 / 25%)!important;
        }
    </style>
@endsection