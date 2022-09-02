@extends('layouts.master')
@section('title', 'Requisition Information')

@section('content')
    
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Requisition Information <button class="btn btn-sm btn-danger" style="margin-left: 10px;" onclick="printReq()">Print This Requisition</button></h4>

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
                        <div class="alert text-info" style="text-align: center; font-weight: 550; border: 1px solid;" role="alert">
                            <i class="mdi mdi-bell-ring-outline me-2"></i>
                            Requisition is Pending now and being reviewed by the Administration.
                        </div>
                    @elseif($requisition->status == "Approved By Administration")
                        <div class="alert text-success" style="text-align: center;font-weight: 550; border: 1px solid;" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            Good news! Requisition is approved by the <b>Administration</b> successfully.
                        </div>
                    @elseif($requisition->status == "Approved By Vice Chancellor")
                        <div class="alert text-success" style="text-align: center;font-weight: 550; border: 1px solid;" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            Good news! Requisition is approved by the <b>Vice Chancellor</b> successfully.
                        </div>
                    @elseif($requisition->status == "Forwarded To Vice Chancellor")
                        <div class="alert text-primary" style="text-align: center;font-weight: 550; border: 1px solid;" role="alert">
                            <i class="mdi mdi-bell-check-outline me-2"></i>
                            Requisition is forwarded to <b>Vice Chancellor</b> by the Administration successfully.
                        </div>
                    @elseif($requisition->status == "Declined By Vice Chancellor")
                        <div class="alert text-danger" style="text-align: center;font-weight: 550; border: 1px solid;" role="alert">
                            <i class="mdi mdi-block-helper me-2"></i>
                            Requisition has been forwarded by the Administration and unfortunately declined by the Vice Chancellor.
                        </div>
                    @elseif($requisition->status == "Declined By Administration")
                        <div class="alert text-danger" style="text-align: center;font-weight: 550; border: 1px solid;" role="alert">
                            <i class="mdi mdi-block-helper me-2"></i>
                            Requisition is unfortunately declined by the Administration.
                        </div>
                    @endif

                </div>
            </div>

            <div class="row" id="pdf">
                <div class="col-lg-9" style="margin-bottom: 25px !important; margin-top: 10px !important;">                    
                    <div id="map" data-origin="{{ $requisition->from }}" data-destination="{{ $requisition->to }}" style="height: 450px !important; border: 1px solid #bbb !important;" class="gmaps"></div> 

                    <br><br>

                    <div class="card" style="border: 1px solid #bbb !important;">
                        <div class="card-body" style="margin-top: 25px; margin-left: 25px; margin-bottom: 15px;">
                            <div class="media">
                                
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15">Requisition Type : <span class="text-primary">{{ $requisition->requisition_type }}</span></h5>
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

                    <br>

                </div>

                <div class="col-lg-3" id="tooltip-container">
                    <div class="mb-3 position-relative">
                        
                        <div class="card text-center" style="border: 1px solid #bbb !important; margin-top: 10px !important;">
                            <div class="card-body">
                                <span class="badge rounded-pill badge-soft-primary font-size-11" style="margin-top: 15px;"><i class="fas fa-arrows-alt-h me-1" style="position: relative; top: 0.7px;"></i> Two Way Calculation</span>
                                <br>

                                <br>

                                <h5 class="font-size-15 mb-1">Time</h5>
                                <p class="text-muted" id="duration_text" style="font-weight: 500;">{{ $requisition->duration }}</p>

                                <h5 class="font-size-15 mb-1">Distance</h5>
                                <p class="text-muted" id="in_kilo" style="font-weight: 500;">{{ $requisition->distance }} Km</p>

                                <h5 class="font-size-15 mb-1">Selected Car</h5>
                                <p class="text-muted" id="selected_car" style="font-weight: 500;">{{ $requisition->car_type }}</p>
                                
                                <h5 class="font-size-15 mb-1">Cost</h5>
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

                        <div class="card text-center" style="border: 1px solid #bbb !important; margin-top: 10px !important;">
                            <div class="card-body">
                                <span class="badge rounded-pill badge-soft-primary font-size-11" style="margin-top: 15px;">Teacher</span>
                                
                                <br>
                                <br>
                                <h5 class="font-size-15 mb-1">
                                    <a href="#" class="text-dark" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $user->name }}">{{ $user->name }}</a>
                                </h5>
                                <p class="text-muted">{{ $user->recognition }}, {{ $user->dept }}</p>
                                <p class="text-muted" style="margin-top: -12px;">{{ $user->email }}</p>

                            </div>
                        </div>

                        @if($requisition->driver_id)
                            <?php
                                $driver = \App\Models\Driver::findOrFail($requisition->driver_id);
                            ?>

                            <div class="card text-center" style="border: 1px solid #bbb !important; margin-top: 10px !important;">
                                <div class="card-body">
                                    <span class="badge rounded-pill badge-soft-primary font-size-11" style="margin-top: 15px;">Driver</span>
                                    
                                    <br>
                                    <br>
                                    <h5 class="font-size-15 mb-1">
                                        <a href="#" class="text-dark" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $driver->name }}">{{ $driver->name }}</a>
                                    </h5>
                                    <p class="text-muted">+88{{ $driver->phone }}</p>
                                    
                                </div>                 
                            </div>
                        @endif

                    </div>
                </div>

                @if(Auth::user()->hasRole('Administration'))

                    <div class="col-lg-12">
                            
                            <div class="card">
                                <div class="card-body">

                                    <form class="needs-validation"{{--  action="{{ route('store.extra') }}" method="post" --}} novalidate="">
                                    {{-- @csrf

                                        <input type="hidden" name="id" value="{{ $requisition->id }}"> --}}

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 position-relative">
                                                    <label for="validationTooltip500" class="form-label">Extra Kilometers(km)</label>
                                                    <input type="number" min="0" step="any" class="form-control" id="validationTooltip500" name="extra_km" {{-- value="{{ old('extra_km', $requisition->extra_km) }}" --}} required="">
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
                                                    <input type="number" min="0" step="any" class="form-control" id="validationTooltip502" name="extra_duration" {{--  value="{{ old('extra_duration', $requisition->extra_duration) }}" --}} required="">
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
                                            <div class="col-md-6">
                                                <div class="mb-3 position-relative">
                                                    <label for="validationTooltip511" class="form-label">Extra Cost (Tk)</label>
                                                    <input type="number" min="0" step="any" class="form-control" id="validationTooltip511" required="">
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>

                                                    <div class="invalid-tooltip">
                                                        Please enter extra cost.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3 position-relative">
                                                    <label for="validationTooltip522" class="form-label">Total Payable Amount <span class="text-primary">(Grand Total + Extra Cost)</span></label>
                                                    <input type="number" min="0" step="any" class="form-control" id="validationTooltip522" required="">
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>

                                                    <div class="invalid-tooltip">
                                                        Please enter total amount.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        {{-- <div class="row">
                                            
                                            <div class="col-md-12">
                                                
                                                <button class="btn btn-primary" style="margin-top: 20px !important; width: 100% !important" type="submit">Save</button>
                                                
                                            </div>
                                    
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                    </div>
                @endif

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