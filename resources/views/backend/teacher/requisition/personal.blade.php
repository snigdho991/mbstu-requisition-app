@extends('layouts.master')
@section('title', 'Create New Requisition - Personal')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Create New Requisition - <span class="text-primary">Personal</span></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('teacher.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Create Personal Requisition</li>
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

                            <form class="needs-validation" action="{{ route('store.requisition') }}" method="post" novalidate="">
                            @csrf

                                <input type="hidden" name="dept" value="{{ auth()->user()->dept }}">
                                <input type="hidden" name="requisition_type" value="Personal">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="from_places" class="form-label">From</label>

                                            <input type="text" class="form-control" id="from_places" placeholder="Enter start place" required="">
                                            <input id="origin" name="from" required="" type="hidden" />

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter start place.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="to_places" class="form-label">To</label>

                                            <input type="text" class="form-control" id="to_places" placeholder="Enter finish place" required="">
                                            <input id="destination" name="to" required="" type="hidden" />

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter finish place.
                                            </div>
                                        </div>
                                    </div>                                                                      
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip03" class="form-label">Start Date & Time</label>
                                            <input class="form-control" type="datetime-local" name="start_at" id="example-datetime-local-input" required="">

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please select start date & time.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6" style="text-align: center;">
                                        <div class="mb-3 position-relative">
                                            <br>
                                            <button type="button" id="calculate_and_draw" class="btn btn-dark waves-effect btn-label waves-light" style="margin-top: 10px !important; width: 100%;"><i class="bx bxs-map-pin label-icon "></i> Calculate and Draw Route <i class="bx bx-right-arrow-circle bx-fade-right font-size-20 align-middle me-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <br>


                                <div class="row" style="background: #f8f8fb!important; margin-top: 10px;">
                                    <div class="col-md-10" style="margin-top: 10px;">
                                        <div class="mb-3 position-relative">
                                            <label for="map" class="form-label">Map Result</label>

                                            <div id="map" style="height: 845px !important; border: 1px solid #bbb !important;" class="gmaps"></div>   
                                        </div>
                                    </div>

                                    <div class="col-md-2" style="margin-top: 10px;">
                                        <div class="mb-3 position-relative">
                                            <label for="time" class="form-label">Estimated Time & Distance</label>
                                            
                                            <div class="card text-center" style="border: 1px solid #bbb !important;">
                                                <div class="card-body">
                                                    <span class="badge rounded-pill badge-soft-primary font-size-11"><i class="fas fa-arrows-alt-h me-1" style="position: relative; top: 0.7px;"></i> Two Way Calculation</span>
                                                    <br>

                                                    <br><h5 class="font-size-15 mb-1">Approx. Time</h5>
                                                    <p class="text-muted" id="duration_text" style="font-weight: 500;">N/A</p>
                                                    <input type="hidden" id="duration" name="duration" value="">

                                                    <h5 class="font-size-15 mb-1">Approx. Distance</h5>
                                                    <p class="text-muted" id="in_kilo" style="font-weight: 500;">N/A</p>
                                                    <input type="hidden" id="distance" name="distance" value="">

                                                    <h5 class="font-size-15 mb-1">Selected Car</h5>
                                                    <p class="text-muted" id="selected_car" style="font-weight: 500;">{{ request()->car_type }}</p>
                                                    <input type="hidden" id="car" name="car_type" value="{{ request()->car_type }}">

                                                    <h5 class="font-size-15 mb-1">Approx. Cost</h5>
                                                    <p class="text-muted" id="cost_cal" style="font-weight: 500;">N/A</p>
                                                    <input type="hidden" id="cost" name="cost" value="">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label for="time" class="form-label">All Available Vehicles</label>
                                            
                                            <div class="card text-center" style="border: 1px solid #bbb !important;">
                                                <div class="card-body">
                                                    <span class="badge rounded-pill badge-soft-primary font-size-11"><i class="fas fa-arrows-alt-h me-1" style="position: relative; top: 0.7px;"></i> Vechicles In Stock</span>
                                                    <br>

                                                    <br><h5 class="font-size-15 mb-1">BIG BUS</h5>
                                                    <p class="text-muted" style="font-weight: 500;">9</p>
                                                    
                                                    <h5 class="font-size-15 mb-1">MINI BUS</h5>
                                                    <p class="text-muted" style="font-weight: 500;">5</p>

                                                    <h5 class="font-size-15 mb-1">MICRO BUS</h5>
                                                    <p class="text-muted" style="font-weight: 500;">4</p>

                                                    <h5 class="font-size-15 mb-1">PAJERO JEEP</h5>
                                                    <p class="text-muted" style="font-weight: 500;">1</p>

                                                    <h5 class="font-size-15 mb-1">PICKUP</h5>
                                                    <p class="text-muted" style="font-weight: 500;">0</p>

                                                    <h5 class="font-size-15 mb-1">CAR</h5>
                                                    <p class="text-muted" style="font-weight: 500;">1</p>

                                                    <h5 class="font-size-15 mb-1">AMBULANCE</h5>
                                                    <p class="text-muted" style="font-weight: 500;">2</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label for="textarea" class="form-label">Detailed Reason</label>
                                            <textarea id="textarea" name="reason" required="" class="form-control" rows="3" placeholder="Write down the reason for the requisition"></textarea>

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please write down the reason.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        
                                        <button class="btn btn-primary" onclick="return confirm('Are you sure to start a new requisition?')" style="margin-top: 6px !important; width: 100% !important" type="submit">Save New Requisition</button>
                                        
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

@section('styles')
    <style type="text/css">
        .select2 {
            width: 100%!important;
        }
    </style>
@endsection

@section('scripts')
    <script defer
            src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDhIlCdeDI_Im1XrLOxjocXsCCbWmK-_2M"
            type="text/javascript"></script>

    <script>
        $(function () {
            var origin, destination, map;

            // add input listeners
            google.maps.event.addDomListener(window, 'load', function (listener) {
                setDestination();
                initMap();
            });

            // init or load map
            function initMap() {

                var myLatLng = {
                    lat: 24.2505086,
                    lng: 89.8985288
                };
                map = new google.maps.Map(document.getElementById('map'), {zoom: 14, center: myLatLng,});
            }

            function setDestination() {
                var options = {
                    componentRestrictions: {country: "bd"}
                };

                var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'), options);
                var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'), options);

                google.maps.event.addListener(from_places, 'place_changed', function () {
                    var from_place = from_places.getPlace();
                    var from_address = from_place.formatted_address;
                    $('#origin').val(from_address);
                });

                google.maps.event.addListener(to_places, 'place_changed', function () {
                    var to_place = to_places.getPlace();
                    var to_address = to_place.formatted_address;
                    $('#destination').val(to_address);
                });
            }

            function displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay) {
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

            // calculate distance , after finish send result to callback function
            function calculateDistance(travel_mode, origin, destination) {

                var DistanceMatrixService = new google.maps.DistanceMatrixService();
                DistanceMatrixService.getDistanceMatrix(
                    {
                        origins: [origin],
                        destinations: [destination],
                        travelMode: google.maps.TravelMode[travel_mode],
                        unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                        // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                        avoidHighways: false,
                        avoidTolls: false
                    }, save_results);
            }

            // save distance results
            function save_results(response, status) {

                if (status != google.maps.DistanceMatrixStatus.OK) {
                    alert(err);
                } else {
                    var origin = response.originAddresses[0];
                    var destination = response.destinationAddresses[0];
                    if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                        alert("Sorry , not available to use this travel mode between " + origin + " and " + destination);
                    } else {
                        var distance = response.rows[0].elements[0].distance;
                        var duration = response.rows[0].elements[0].duration;
                        var distance_in_kilo = distance.value / 1000; // the kilo meter
                        var distance_in_mile = distance.value / 1609.34; // the mile
                        var duration_text = duration.text;
                        var duration_final = duration.value/(60*60);
                        
                        appendResults(distance_in_kilo, distance_in_mile, duration_text, duration_final);
                        // sendAjaxRequest(origin, destination, distance_in_kilo, distance_in_mile, duration_text);
                    }
                }
            }

            // append html results
            function appendResults(distance_in_kilo, distance_in_mile, duration_text, duration_final) {
                               
                $('#in_kilo').html((distance_in_kilo * 2).toFixed(3) + " km");
                $('#duration_text').html((duration_final * 2).toFixed(3) + " Hours");

                $("#distance").val((distance_in_kilo * 2).toFixed(3));
                $("#duration").val((duration_final * 2).toFixed(3) + " Hours");
                
                var selected_car = $('#selected_car').html();
                if (selected_car == 'Big Bus') {
                    var kilo_cost = (distance_in_kilo * 2 * 20).toFixed(3);
                    var holtage_cost = (duration_final * 2 * 20).toFixed(3);
                    var final_cost = +kilo_cost + +holtage_cost;
                    $('#cost_cal').html(final_cost.toFixed(2) + ' Tk');
                    $('#cost').val(final_cost.toFixed(2));
                } else if (selected_car == 'Mini Bus') {
                    var kilo_cost = (distance_in_kilo * 2 * 15).toFixed(3);
                    var holtage_cost = (duration_final * 2 * 15).toFixed(3);
                    var final_cost = +kilo_cost + +holtage_cost;
                    $('#cost_cal').html(final_cost.toFixed(2) + ' Tk');
                    $('#cost').val(final_cost.toFixed(2));
                } else if (selected_car == 'Micro Bus' || selected_car == 'Pajero' || selected_car == 'Pickup') {
                    var kilo_cost = (distance_in_kilo * 2 * 6).toFixed(3);
                    var holtage_cost = (duration_final * 2 * 12).toFixed(3);
                    var final_cost = +kilo_cost + +holtage_cost;
                    $('#cost_cal').html(final_cost.toFixed(2) + ' Tk');
                    $('#cost').val(final_cost.toFixed(2));
                } else if (selected_car == 'Car' || selected_car == 'Ambulance') {
                    var kilo_cost = (distance_in_kilo * 2 * 4).toFixed(3);
                    var holtage_cost = (duration_final * 2 * 10).toFixed(3);
                    var final_cost = +kilo_cost + +holtage_cost;
                    $('#cost_cal').html(final_cost.toFixed(2) + ' Tk');
                    $('#cost').val(final_cost.toFixed(2));
                }
            }

            // send ajax request to save results in the database
            /*function sendAjaxRequest(origin, destination, distance_in_kilo, distance_in_mile, duration_text) {
                var username =   $('#username').val();
                var travel_mode =  $('#travel_mode').find(':selected').text();
                $.ajax({
                    url: 'common.php',
                    type: 'POST',
                    data: {
                        username,
                        travel_mode,
                        origin,
                        destination,
                        distance_in_kilo,
                        distance_in_mile,
                        duration_text
                    },
                    success: function (response) {
                        console.info(response);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }*/

            $(document).ready(function() {
                $("#calculate_and_draw").click(function(e){
                    e.preventDefault();
                    var origin = $('#origin').val();
                    var destination = $('#destination').val();
                    var travel_mode = 'DRIVING';
                    var directionsDisplay = new google.maps.DirectionsRenderer({'draggable': false});
                    var directionsService = new google.maps.DirectionsService();

                    displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay);
                    calculateDistance(travel_mode, origin, destination);
                });
            });
        });
    </script>

@endsection