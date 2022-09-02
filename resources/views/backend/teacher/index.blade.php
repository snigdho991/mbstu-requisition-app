@extends('layouts.master')
@section('title', 'Backend Dashboard')

@section('content')

	<div class="page-content">
	    <div class="container-fluid">

            {{-- <div class="alert alert-success" role="alert" style="margin-bottom: 40px;">
                <marquee direction="left" style="font-weight: 500; margin-top: 6.5px;">All new requisitions are checked at 4 AM to 5 AM everyday. </marquee>
            </div> --}}

            <div class="alert bg-danger bg-gradient text-white" style="text-align: center;font-weight: 550; margin-bottom: 40px;" role="alert">
               <marquee direction="left" style="font-weight: 550; margin-top: 6.5px; font-size: 14.5px;"><i class="mdi mdi-check-all me-2"></i> All new requisitions are checked at 10 AM to 11 AM everyday. </marquee>
            </div>

	        <!-- start page title -->
	        <div class="row">
	            <div class="col-12">
	                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        @if (Auth::user()->is_official == 'No')
	                       <h4 class="mb-sm-0 font-size-18">{{ Auth::user()->role }} Dashboard <span class="text-primary">({{ Auth::user()->dept }} Dept.)</span></h4> 
                        @else
                            <h4 class="mb-sm-0 font-size-18">Official Dashboard <span class="text-primary">({{ Auth::user()->recognition }})</span></h4> 
                        @endif                     
	                </div>
	            </div>
	        </div>

	        <div class="row">
                <div class="col-xl-12">
                    <div class="row" id="deviceStandard" style="margin-top: -45px;">
                        <div class="col-md-4"></div>
                        <div class="col-md-4" style="text-align: center !important;">
                            <span class="badge bg-dark font-size-12">Requisition Stats <i class="bx bx-caret-down"></i></span><br><br>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">My Requisitions</p>
                                            <h4 class="mb-0">4</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Pending</p>
                                            <h4 class="mb-0">2</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Approved</p>
                                            <h4 class="mb-0">1</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-check-shield font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Declined</p>
                                            <h4 class="mb-0">1</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- end row -->

	    </div>
	</div>

@endsection

@section('styles')
    <style type="text/css">
        @media screen and (max-width: 1199px) and (min-width: 300px) {
            #deviceStandard {
                margin-top: 10px !important;
            }
        }
    </style>
@endsection