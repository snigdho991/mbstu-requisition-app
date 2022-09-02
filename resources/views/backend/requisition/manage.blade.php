@extends('layouts.master')
@section('title', 'Requisition Information')

@section('content')
    
    <!-- Detail Modal -->
        <div class="modal fade detailModal" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form class="needs-validation" action="{{ route('admin.confirm.requisition') }}" method="post">
                    @csrf
                                    

                        <div class="modal-body">
                            
                            <span style="text-align: center;">
                                
                                <input type="hidden" name="id" value="{{ $requisition->id }}">

                                <?php
                                    $all_drivers = \App\Models\Driver::all();
                                ?>

                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip12" class="form-label">Select an available Driver</label><br>
                                    <select class="form-control select2" style="width: 100% !important;" id="validationTooltip12" name="driver_id" required="">
                                    
                                        <option value="">Select</option>

                                        <optgroup label="All Drivers">
                                            @foreach($all_drivers as $driver)
                                                {{-- <?php
                                                    $find_requisition = \App\Models\Requisition::where('driver_id', $driver->id)->first();
                                            
                                                    if (isset($find_requisition)) {
                                                        $date_time = strtotime($find_requisition->start_at);
                                                        $req_start = date('d M, Y', $date_time);
                                                    }       

                                                    $date_time_two = strtotime($requisition->start_at);
                                                    $find_start = date('d M, Y', $date_time_two);                                     
                                                ?>

                                                @if(isset($find_requisition))
                                                    @if($req_start != $find_start)
                                                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                                    @endif
                                                @else
                                                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                                @endif --}}
                                                <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                            @endforeach
                                        </optgroup>

                                    </select>

                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>

                                    <div class="invalid-tooltip">
                                        Please select any driver.
                                    </div>
                                </div>
                                    
                            </span>
                        </div>

                        <div class="modal-footer">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-10">
                                        <button class="btn btn-success" style="margin-left: 0.6rem !important; width: 100% !important" type="submit">Confirm Requisition</button>
                                    </div>

                                    <div class="col-2">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- end modal -->

    <!-- Reject Modal -->
        <div class="modal fade rejectModal" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Reject Requisition</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form class="needs-validation" action="{{ route('admin.reject.requisition') }}" method="post">
                    
                    @csrf
                        
                        <input type="hidden" name="id" value="{{ $requisition->id }}">

                        <div class="modal-body">
                            
                            <span style="text-align: center;">
                                
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip100" class="form-label">Rejection Reason</label><br>
                                    <textarea id="validationTooltip100" name="reject_reason" required="" class="form-control" rows="3" placeholder="Write down the reason for rejection"></textarea>

                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>

                                    <div class="invalid-tooltip">
                                        Please write the reason for rejection.
                                    </div>
                                </div>
                                    
                            </span>
                        </div>

                        <div class="modal-footer">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-10">
                                        <button class="btn btn-danger" style="margin-left: 0.6rem !important; width: 100% !important" type="submit">Reject Requisition</button>
                                    </div>

                                    <div class="col-2">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- end modal -->

    <!-- Decline Modal -->
        <div class="modal fade declineModal" role="dialog" aria-labelledby="declineModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="declineModalLabel">Decline Requisition</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form class="needs-validation" action="{{ route('chair.decline.requisition') }}" method="post">
                    
                    @csrf
                        
                        <input type="hidden" name="id" value="{{ $requisition->id }}">

                        <div class="modal-body">
                            
                            <span style="text-align: center;">
                                
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip100" class="form-label">Rejection Reason</label><br>
                                    <textarea id="validationTooltip100" name="reject_reason" required="" class="form-control" rows="3" placeholder="Write down the reason for rejection"></textarea>

                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>

                                    <div class="invalid-tooltip">
                                        Please write the reason for rejection.
                                    </div>
                                </div>
                                    
                            </span>
                        </div>

                        <div class="modal-footer">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-10">
                                        <button class="btn btn-danger" style="margin-left: 0.6rem !important; width: 100% !important" type="submit">Decline Requisition</button>
                                    </div>

                                    <div class="col-2">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- end modal -->

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Requisition Information</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="@if(Auth::user()->hasRole('Administration')) {{ route('administrator.dashboard') }} @elseif(Auth::user()->hasRole('Chairman')) {{ route('chairman.dashboard') }} @elseif(Auth::user()->hasRole('Teacher')) {{ route('teacher.dashboard') }} @endif">Dashboard</a></li>
                                <li class="breadcrumb-item active">Requisition Information</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">

                    @if($requisition->status == "Pending")
                        <div class="alert bg-info bg-gradient text-white" style="text-align: center; font-weight: 550;" role="alert">
                            <i class="mdi mdi-bell-ring-outline me-2"></i>
                            Requisition is Pending now and being reviewed by the Administration.
                        </div>
                    @elseif($requisition->status == "Approved By Administration")
                        <div class="alert bg-success bg-gradient text-white" style="text-align: center;font-weight: 550;" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            Good news! Requisition is approved by the <b>Administration</b> successfully.
                        </div>
                    @elseif($requisition->status == "Approved By Vice Chancellor")
                        <div class="alert bg-success bg-gradient text-white" style="text-align: center;font-weight: 550;" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            Good news! Requisition is approved by the <b>Vice Chancellor</b> successfully.
                        </div>
                    @elseif($requisition->status == "Forwarded To Vice Chancellor")
                        <div class="alert bg-primary bg-gradient text-white" style="text-align: center;font-weight: 550;" role="alert">
                            <i class="mdi mdi-bell-check-outline me-2"></i>
                            Requisition is forwarded to <b>Vice Chancellor</b> by the Administration successfully.
                        </div>
                    @elseif($requisition->status == "Declined By Vice Chancellor")
                        <div class="alert bg-danger bg-gradient text-white" style="text-align: center;font-weight: 550;" role="alert">
                            <i class="mdi mdi-block-helper me-2"></i>
                            Requisition has been forwarded by the Administration and unfortunately declined by the Vice Chancellor.
                        </div>
                    @elseif($requisition->status == "Declined By Administration")
                        <div class="alert bg-danger bg-gradient text-white" style="text-align: center;font-weight: 550;" role="alert">
                            <i class="mdi mdi-block-helper me-2"></i>
                            Requisition is unfortunately declined by the Administration.
                        </div>
                    @endif

                </div>
            </div>

            <div class="row" id="pdf">
                <div class="col-lg-9" style="margin-bottom: 25px !important;">                    
                    <div id="map" data-origin="{{ $requisition->from }}" data-destination="{{ $requisition->to }}" style="height: 450px !important; border: 1px solid #bbb !important;" class="gmaps"></div> 

                    <br><br>

                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15">Requisition Type : <span class="text-primary">{{ $requisition->requisition_type }}</span></h5>
                                    <p class="text-muted">You can know the current situation of a requsition from this details.</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="font-size-15 mt-4">Requisition Details :</h5>
                                    <div class="text-muted mt-4">

                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> From: <span style="text-transform: uppercase; font-weight: 550;">{{ $requisition->from }}</span></p>
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> To: <span style="text-transform: uppercase; font-weight: 550;">{{ $requisition->to }}</span></p>
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Status: <span style="text-transform: uppercase; font-weight: 550;">{{ $requisition->status }}</span></p>
                                                                             
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h5 class="font-size-15 mt-4">Requisition Reason :</h5>
                                    <div class="text-muted mt-4">

                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> {{ $requisition->reason }}</p>
                                                                             
                                    </div>

                                    @if($requisition->reject_reason)
                                        <h5 class="font-size-15 mt-4">Rejection Reason :</h5>
                                        <div class="text-muted mt-4">

                                            <p><i class="mdi mdi-chevron-right text-primary me-1"></i> {{ $requisition->reject_reason }}</p>
                                                                                 
                                        </div>
                                    @endif
                                </div>

                            </div>
                            
                            <div class="row task-dates">

                                <div class="col-sm-4 col-4">
                                    <div class="mt-4">
                                        <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Start Date</h5>
                                        <p class="text-muted mb-0">{{ substr($requisition->start_at, 0, 10) }}</p>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-4">
                                    <div class="mt-4">
                                        <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Time</h5>
                                        <p class="text-muted mb-0" style="margin-left: 22px;">{{ substr($requisition->start_at, 11, 16) }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    @if(Auth::user()->role == 'Administration')
                        @if($requisition->status == 'Approved By Administration' || $requisition->status == 'Approved By Vice Chancellor')
                            <br>

                            <a class="btn btn-sm btn-danger" href="{{ route('manage.requisition', ['id' => $requisition->id, 'download'=>'pdf']) }}" target="_blank">Download PDF Version</a>
                        @endif
                    @endif

{{--                     <a class="btn btn-sm btn-danger" href="{{ route('print.requisition', ['id' => $requisition->id]) }}" target="_blank">Check Printable Version</a>
 --}}
                    {{-- @if(Auth::user()->hasRole('Administration'))
                        <br><br><br>
                        <div class="card">
                            <div class="card-body">

                                <form class="needs-validation" action="{{ route('store.extra') }}" method="post" novalidate="">
                                @csrf

                                    <input type="hidden" name="id" value="{{ $requisition->id }}">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip500" class="form-label">Extra Kilometers(km)</label>
                                                <input type="number" min="0" step="any" class="form-control" id="validationTooltip500" placeholder="Enter extra km" name="extra_km" value="{{ old('extra_km', $requisition->extra_km) }}" required="">
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter extra km.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 position-relative">
                                                <label for="validationTooltip502" class="form-label">Extra Duration(eg: 1.45)</label>
                                                <input type="number" min="0" step="any" class="form-control" id="validationTooltip502" placeholder="Enter extra duration" name="extra_duration" value="{{ old('extra_duration', $requisition->extra_duration) }}" required="">
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please enter extra duration.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            
                                            <button class="btn btn-primary" style="margin-top: 20px !important; width: 100% !important" type="submit">Save</button>
                                            
                                        </div>
                                
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif --}}

                </div>

                <div class="col-lg-3" id="tooltip-container">
                    <div class="mb-3 position-relative">
                        
                        <div class="card text-center" style="border: 1px solid #bbb !important;">
                            <div class="card-body">
                                <span class="badge rounded-pill badge-soft-primary font-size-11"><i class="fas fa-arrows-alt-h me-1" style="position: relative; top: 0.7px;"></i> Two Way Calculation</span>
                                <br>

                                <br>

                                <h5 class="font-size-15 mb-1">Approx. Time</h5>
                                <p class="text-muted" id="duration_text" style="font-weight: 500;">{{ $requisition->duration }}</p>

                                <h5 class="font-size-15 mb-1">Approx. Distance</h5>
                                <p class="text-muted" id="in_kilo" style="font-weight: 500;">{{ $requisition->distance }} Km</p>

                                <h5 class="font-size-15 mb-1">Selected Car</h5>
                                <p class="text-muted" id="selected_car" style="font-weight: 500;">{{ $requisition->car_type }}</p>
                                
                                <h5 class="font-size-15 mb-1">Approx. Cost</h5>
                                <p class="text-muted" id="cost_cal" style="font-weight: 500;">{{ $requisition->cost }} Tk</p>

                                @if($requisition->extra_duration && $requisition->extra_km)

                                    <h5 class="font-size-15 mb-1">Extra Time</h5>
                                    <p class="text-muted" id="extra_duration" style="font-weight: 500;">{{ $requisition->extra_duration }} Hours</p>

                                    <h5 class="font-size-15 mb-1">Extra Distance</h5>
                                    <p class="text-muted" id="extra_km" style="font-weight: 500;">{{ $requisition->extra_km }} Km</p>

                                    <h5 class="font-size-15 mb-1">Grand Total</h5>
                                    <p class="text-success" id="grand_total" style="font-weight: 500;">{{ $requisition->grand_total }} Tk</p>

                                @else
                                    <h5 class="font-size-15 mb-1">Grand Total</h5>
                                    <p class="text-muted" id="grand_total" style="font-weight: 500;">{{ $requisition->cost }} Tk</p>
                                @endif
                                
                            </div>
                        </div>

                        <div class="card text-center">
                            <div class="card-body">
                                <span class="badge rounded-pill badge-soft-primary font-size-11">User</span>
                                <div class="avatar-sm mx-auto mb-4">
                                    <br><span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                        @if($user->profile_photo_path)
                                            <img src="{{ asset('/assets/uploads/teachers/'.$user->profile_photo_path) }}" alt="admin-pic" height="40" width="40" style="border-radius: 50%;">
                                        @else
                                            {{ avatarLetter($user->name) }}
                                        @endif
                                    </span>
                                </div>
                                <br><h5 class="font-size-15 mb-1"><a href="#" class="text-dark" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $user->name }}">{{ $user->name }}</a></h5>
                                <p class="text-muted">{{ $user->email }}</p>

                            </div>
                        </div>

                        @if($requisition->driver_id)
                            <?php
                                $driver = \App\Models\Driver::findOrFail($requisition->driver_id);
                            ?>

                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="avatar-md me-4">
                                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                {{-- @if($driver->photo)
                                                    <img src="{{ asset('/assets/uploads/driver/'.$driver->photo) }}" alt="user-pic" height="30">
                                                @else
                                                     --}}{{ avatarLetter($driver->name) }}
                                                {{-- @endif --}}
                                            </span>
                                        </div>

                                        <div class="media-body overflow-hidden">
                                            <span class="badge rounded-pill badge-soft-info font-size-11">Driver</span>
                                            <h5 class="text-truncate font-size-15 mt-2"><a href="#" class="text-dark" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $driver->name }}">{{ $driver->name }}</a></h5>
                                            <p class="text-muted mb-4">+88{{ $driver->phone }}</p>

                                        </div>
                                    </div>
                                </div>                   
                            </div>
                        @endif

                        @if(Auth::user()->hasRole('Teacher'))

                            <div class="card">
                                <div class="card-header bg-info bg-gradient text-white text-center border-bottom text-uppercase">
                                    Your Tools
                                </div>

                                @if($requisition->status == "Pending")

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Administration Confirmation</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-warning">Waiting For Approval from Administration.</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @elseif($requisition->status == "Approved By Administration")

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Administration Confirmed!</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-success">Requisition Confirmed By Administration Successfully!</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @elseif($requisition->status == "Approved By Vice Chancellor")

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Vice Chancellor Confirmed!</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-success">Requisition Confirmed By Vice Chancellor Successfully!</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($requisition->status == "Forwarded To Vice Chancellor")
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Forwarded!</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-info">Requisition Forwarded To Vice Chancellor!</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($requisition->status == "Declined By Administration")
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Declined!</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-danger">Requisition Declined by Administration!</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($requisition->status == "Declined By Vice Chancellor")
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Declined!</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-danger">Requisition Declined by Vice Chancellor!</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        @elseif(Auth::user()->hasRole('Chairman'))

                            <div class="card">
                                <div class="card-header bg-info bg-gradient text-white text-center border-bottom text-uppercase">
                                    Vice Chancellor Tools
                                </div>

                                @if($requisition->status == "Forwarded To Vice Chancellor")

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Vice Chancellor Confirmation</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <div style="display: flex; gap: 5px;">
                                                            <div class="col-md-6">
                                                                <form action="{{ route('chair.approve.requisition') }}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $requisition->id }}">

                                                                    <button type="submit" class="btn btn-success btn-sm waves-effect btn-label waves-light"><i class="bx bx-check-double label-icon"></i> Approve</button>
                                                                </form>
                                                            </div>

                                                            <div class="col-md-6">
                                                                
                                                                <button type="button" class="btn btn-danger btn-sm waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target=".declineModal"><i class="bx bx-block label-icon"></i> Decline </button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @elseif($requisition->status == "Approved By Vice Chancellor")

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Vice Chancellor Approved!</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-info">Approved Successfully by Vice Chancellor!</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @elseif($requisition->status == "Approved By Administration")

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Administration Confirmed!</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-success">Requisition Confirmed By Administration Successfully!</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @elseif($requisition->status == "Declined By Vice Chancellor")
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Declined!</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-danger">Requisition Declined by Vice Chancellor!</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                @elseif($requisition->status == "Declined By Administration")
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Declined!</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-danger">Requisition Declined by Administration!</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @elseif($requisition->status == "Pending")
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Pending Now!</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-danger">Requisition is Pending by Administration!</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            </div>

                        @elseif(Auth::user()->hasRole('Administration'))

                            <div class="card">
                                <div class="card-header bg-info bg-gradient text-white text-center border-bottom text-uppercase">
                                    Administration Tools
                                </div>

                                @if($requisition->status == "Pending")

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Administration Confirmation</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <div style="display: flex; gap: 5px;">
                                                            <div class="col-md-6">                                                                    
                                                                <button type="button" class="btn btn-success btn-sm waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target=".detailModal"><i class="bx bx-check-double label-icon"></i> Confirm</button>
                                                                
                                                            </div>

                                                            <div class="col-md-6">
                                                                
                                                                <button type="button" class="btn btn-danger btn-sm waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target=".rejectModal"><i class="bx bx-block label-icon"></i> Reject</button>

                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <form action="{{ route('admin.forward.requisition') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $requisition->id }}">
                                                                
                                                                <button type="submit" class="btn btn-primary btn-sm waves-effect btn-label waves-light" onclick="return confirm('Are you sure to forward?')"><i class="bx bx-send label-icon"></i> Forward to VC</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @elseif($requisition->status == "Forwarded To Vice Chancellor")

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Vice Chancellor Confirmation</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-warning">Waiting For Approval from Vice Chancellor.</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @elseif($requisition->status == "Approved By Vice Chancellor")

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Approved!</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-success">Requisition Approved by Vice Chancellor Successfully!</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @elseif($requisition->status == "Approved By Administration")

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Confirmed!</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-success">Requisition Confirmed by Administration Successfully!</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($requisition->status == "Declined By Vice Chancellor")
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Declined!</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-danger">Requisition Declined by Vice Chancellor!</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($requisition->status == "Declined By Administration")
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border mb-0">
                                                    <div class="card-header">
                                                        <h6 class="my-0 text-dark text-center">Declined!</h6>
                                                    </div> 
                                                    <div class="card-body bg-transparent text-center">
                                                        <small class="text-danger">Requisition Declined by Administration!</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                {{-- <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15">Transaction ID : <span class="text-primary">{{ $transaction->transaction_id }}</span></h5>
                                    <p class="text-muted">You can track your own prefered transaction by using this qrcode link.</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="font-size-15 mt-4">Transaction Details :</h5>
                                    <div class="text-muted mt-4">
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Type: <span style="text-transform: uppercase; font-weight: 550;">{{ $transaction->type }}</span></p>
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Amount: <span style="text-transform: uppercase; font-weight: 550;">{{ $transaction->amount }}</span></p>

                                        @if($transaction->type == 'wire-money')
                                            <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Beneficiary: <span style="text-transform: uppercase; font-weight: 550;">{{ $transaction->beneficiary }}</span></p>
                                            <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Company: <span style="text-transform: uppercase; font-weight: 550;">{{ App\Models\Company::where('id', $transaction->company_id)->first()->company_name }}</span></p>
                                        @else
                                            <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Fee: <span style="text-transform: uppercase; font-weight: 550;">{{ $transaction->fee }}</span></p>

                                        @endif
                                        
                                    </div>
                                </div>

                                @if($transaction->type == 'cheque')
                                    <div class="col-md-6">
                                    <div class="zoom-gallery d-flex flex-wrap">
                                         <a href="{{ asset('assets/uploads/cheque-transaction/successful/'.$transaction->photo) }}" title="{{ $transaction->photo }}">   
                                            <img src="{{ asset('assets/uploads/cheque-transaction/successful/'.$transaction->photo) }}" style="height: 160px;" alt="transaction-cheque" width="275">
                                        </a>
                                    </div>
                                    </div>
                                @endif

                            </div>
                            
                            <?php
                                $date_time = strtotime($transaction->created_at);
                                $not_date = date('d M, Y', $date_time);

                                $newDateTime = date('h:i A', $date_time);
                            ?>
                            <div class="row task-dates">

                                <div class="col-sm-4 col-4">
                                    <div class="mt-4">
                                        <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Start Date</h5>
                                        <p class="text-muted mb-0">{{ $not_date }} - {{ $newDateTime }}</p>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-4">
                                    <div class="mt-4">
                                        <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Since</h5>
                                        <p class="text-muted mb-0" style="margin-left: 22px;">{{ $transaction->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">Transaction Tracker</h4>
                            <div class="">
                                <ul class="verti-timeline list-unstyled">
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-check-circle"></i>
                                        </div>
                                        <div class="media">
                                            <div class="me-3">
                                                <i class="bx bx-copy-alt h2 text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <h5>Transaction Generated</h5>
                                                    <p class="text-muted">New transaction has been created by an agency successfully.</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="event-list active">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-check-circle bx-fade-right"></i>
                                        </div>
                                        <div class="media">
                                            <div class="me-3">
                                                <i class="bx bx-copy-alt h2 text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <h5>Transaction Completed</h5>
                                                    <p class="text-muted">Transaction has been completed successfully.</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3 col-sm-6" id="tooltip-container">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="badge rounded-pill badge-soft-primary font-size-11">Agency</span>
                            <div class="avatar-sm mx-auto mb-4">
                                <br><span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                    @if($agency->profile_photo_path)
                                        <img src="{{ asset('/assets/uploads/agency/'.$agency->photo) }}" alt="admin-pic" height="40" width="40" style="border-radius: 50%;">
                                    @else
                                        {{ avatarLetter($agency->name) }}
                                    @endif
                                </span>
                            </div>
                            <br><h5 class="font-size-15 mb-1"><a href="#" class="text-dark" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $agency->name }}">{{ $agency->name }}</a></h5>
                            <p class="text-muted">{{ $agency->email }}</p>

                        </div>
                    </div>

                    <?php
                        $customer = \App\Models\Customer::find($transaction->customer_id);
                    ?>

                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                            <div class="avatar-md me-4">
                                <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                    @if($customer->photo)
                                        <img src="{{ asset('/assets/uploads/customer/'.$customer->photo) }}" alt="customer-pic" height="30">
                                    @else
                                        {{ avatarLetter($customer->name) }}
                                    @endif
                                </span>
                            </div>

                            <div class="media-body overflow-hidden">
                                <span class="badge rounded-pill badge-soft-info font-size-11">Customer</span>
                                <h5 class="text-truncate font-size-15 mt-2"><a href="#" class="text-dark" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $customer->name }}">{{ $customer->name }}</a></h5>
                                <p class="text-muted mb-4">{{ $customer->email }}</p>
                                
                            </div>
                            </div>
                        </div>                   
                    </div>
                
                </div> --}}

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection

@section('scripts')
    <script defer
            src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDhIlCdeDI_Im1XrLOxjocXsCCbWmK-_2M"
            type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {
            var origin, destination, travel_mode, map, getmap;

            // add input listeners
            google.maps.event.addDomListener(window, 'load', function (listener) {
                displayRoute();
            });

            function displayRoute() {
                getmap = document.getElementById('map');
                origin = getmap.getAttribute('data-origin');
                destination = getmap.getAttribute('data-destination');
                travel_mode = 'DRIVING';

                var directionsDisplay = new google.maps.DirectionsRenderer({'draggable': false});
                var directionsService = new google.maps.DirectionsService();

                map = new google.maps.Map(document.getElementById('map'));

                directionsService.route({
                    origin: origin,
                    destination: destination,
                    travelMode: travel_mode,
                    avoidTolls: true
                }, function (response, status) {
                    if (status === 'OK') {
                        directionsDisplay.setMap(map);
                        directionsDisplay.setDirections(response);
                    } else {
                        directionsDisplay.setMap(null);
                        directionsDisplay.setDirections(null);
                        alert('Could not display directions due to: ' + status);
                    }
                });
            }
        });
    </script>

    <script type="text/javascript">
        $('.detailModal').on('show.bs.modal', function(e) {
            /*var link           = $(e.relatedTarget),
                bday           = link.data('banned'),
                banreason      = link.data('banreason'),
                userid         = link.data('userid'),*/
                modal          = $(this);
               
            modal.find('#detailModalLabel').html('Assign Driver');
            
            /*
            modal.find('.modal-title').html('Edit Product: ' + name);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #price').val(price);
            */
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2();
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <script type="text/javascript">
        function printReq() {
            window.print();
        }
    </script>
@endsection