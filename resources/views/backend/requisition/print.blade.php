<body style="page-break-inside: avoid;">
    
<table cellspacing="0" cellpadding="0" width="100%" style=" max-width: 80%; margin: 0 auto; font-family: monospace; page-break-inside: avoid !important; padding: 0 20px;">
  
  <tbody>

    <tr>
      <th colspan="2" style="text-align: center; font-weight: 400; border-bottom: 1px solid #ccc;">
        <img src="{{ asset('/assets/uploads/default/logo-jp.jpg') }}" style="margin-bottom: 15px;" width="85" height="80" alt="MBSTU Logo">

        <div id="photo" style="text-align: center">
            <h1 style="color: #3bb2e6; margin:  0 0 5px; text-transform: uppercase; font-size: 22px; text-align: center;">MBSTU Vehicle Requisition </h1>
            <p style="margin: 0; font-size: 18px; text-align: center;">Requisition ID: {{ $requisition->id }} </p>
            <img src="{{ asset('/assets/uploads/default/mujib-100_logo.jpg') }}" style="vertical-align: middle; margin-top: -59px; margin-left: 580px;" width="80" height="65" alt="Logo">
        </div>
      </th>
      {{-- <th style="border-bottom: 1px solid #ccc;">
        <img src="{{ asset('/assets/uploads/default/logo-jp.jpg') }}" style="margin-bottom: 10px; margin-top: 5px;" width="60" height="60" alt="MBSTU Logo">
      </th> --}}


{{--       <p style="text-align: center;"><img src="{{ asset('/assets/uploads/default/logo-jp.jpg') }}" width="80" height="75" alt="MBSTU Logo"></p>
 --}}
      {{-- <th style="padding: 0px 0px 0px; width: 30%; text-align: left; font-weight: 400; border-bottom: 1px solid #ccc;">
        <h1 style="color: #3bb2e6; margin:  0 0 5px; text-transform: uppercase; font-size: 22px;"> MBSTU Vehicle Requisition </h1>
        <p style="margin: 0; font-size: 18px;">Requisition ID: {{ $requisition->id }}</p>
      </th>
      <th align="right" style="padding-right: 15px; border-bottom: 1px solid #ccc;">
        <img src="{{ asset('/assets/uploads/default/logo-jp.jpg') }}" style="margin-bottom: 10px; margin-top: 5px;" width="60" height="60" alt="MBSTU Logo">
      </th> --}}
    </tr>
    <tr>
      <td colspan="2" style="padding: 10px 10px 5px;">
            <p style="font-size: 15px; margin: 0 0 5px;">Hello <strong>{{ $user->name }}</strong>,</p><p style="font-size:14px; margin: 0;">Congratulations! Your requisition has been approved successfully.</p>
      </td>
    </tr>
    <!--Departure Flight Details Start-->
    
    <tr>
      <td style="padding-right: 15px; padding-top: 10px;" colspan="2">
        <p style="text-transform: uppercase; margin: 0 0 5px;font-size:11px;"><b>Requisition Details:</b></p>
      </td>
    </tr>

    <!--Return Flight Details Start-->
    {{-- <tr>
        <?php
            $date_time = strtotime($requisition->start_at);
            $not_date = date('d M, Y', $date_time);

            $time = date('h:i A', $date_time)
        ?>
                                                
      <td colspan="2">
        <p style="font-size: 16px; background-color: #34c38f!important; text-align: center; padding: 5px 15px; color: #fff; font-weight: 500; margin: 0px 0 0px; letter-spacing: 1px;">DEPARTURE: {{ $not_date }} - {{ $time }} | RETURN: {{ $not_date }} - {{ $time }}</p>
      </td>
    </tr> --}}
    
    <tr>
      <td style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 0px 15px; width: 20%; border: 1px solid #ccc; border-right: 0; border-bottom: 0; text-align: center; font-size:12px;">Type</td>
      <td style="padding: 0 15px; width: 20%; border: 1px solid #ccc; width: 80%; border-bottom: 0;">
        <p style="font-size:12px;">{{ $requisition->requisition_type }}</p>
      </td>
    </tr>
    <tr>
      <td style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 0px 15px; width: 20%; border: 1px solid #ccc; border-right: 0; border-bottom: 0; text-align: center; font-size:12px;">From</td>
      <td style="padding: 0 15px; width: 20%; border: 1px solid #ccc; width: 80%;  border-bottom: 0;">
        <p style="font-size:12px;">{{ $requisition->from }}</p>
      </td>
    </tr>
    <tr>
      <td style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 0px 15px; width: 20%; border: 1px solid #ccc; border-right: 0; border-bottom: 0; text-align: center; font-size:12px;">To</td>
      <td style="padding: 0 15px; width: 20%; border: 1px solid #ccc; width: 80%;  border-bottom: 0;">
        <p style="font-size:12px;">{{ $requisition->to }}</p>
      </td>
    </tr>

     <tr>
        <?php
            $date_time = strtotime($requisition->start_at);
            $not_date = date('d M, Y', $date_time);

            $time = date('h:i A', $date_time)
        ?>
      <td style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 0px 15px; width: 20%; border: 1px solid #ccc; border-right: 0; border-bottom: 0; text-align: center; font-size:12px;">Approx. Duration</td>
      <td style="padding: 0 15px; width: 20%; border: 1px solid #ccc; width: 80%;  border-bottom: 0;">
        <p style="font-size:12px;">{{ $not_date }} - {{ $time }} <b>To</b> {{ $not_date }} - {{ $time }}</p>
      </td>
    </tr>
    
    <tr>
      <td style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 0px 15px; width: 20%; border: 1px solid #ccc; border-right: 0; text-align: center; font-size:12px;">Reason</td>
      <td style="padding: 0 15px; width: 20%; border: 1px solid #ccc; width: 80%;">
        <p style="font-size:12px;">{{ $requisition->reason }}</p>
      </td>
    </tr>
<!--     <tr>
      <td style="font-weight: 400; background-color: #34c38f!important; color: #fff; padding: 10px 15px; width: 30%; border: 1px solid #ccc; border-right: 0;text-align: center; font-size: 18px;">Seat(s)</td>
      <td style="padding: 0 15px; width: 20%; border: 1px solid #ccc; width: 70%;">
        <p style="font-size: 18px;">18, 23, 24, 19, 14, 9</p>
      </td>
    </tr> -->

    <!--Return Bus Details End-->
    
    <!--Passenger Details Start-->
    <tr>
      <td style="padding-right: 15px; padding-top: 10px;" colspan="2">
        <p style="text-transform: uppercase; margin: 0 0 5px;font-size:11px;"><b>Traveller Details:</b></p>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <table cellspacing="0" cellpadding="0" width="100%" style="border: 1px solid #ccc; margin: 0 0 10px;">
          <thead>
            <tr>
              <th style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 2px 15px; width: 35%;font-size:13px;">
                Name
              </th>
              <th style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 2px 15px; border-left: 1px solid #fff; width: 20%;font-size:13px;">
                Phone No.
              </th>
              <th style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 2px 15px; border-left: 1px solid #fff; width: 25%;font-size:13px;">
                Designation
              </th>

              @if($user->is_official == 'No')
                  <th style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 2px 15px; border-left: 1px solid #fff; width: 20%;font-size:13px;">
                    Dept.
                  </th>
              @endif
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="font-size: 12px; padding: 7px; text-align: center; width: 35%;">
               {{ $user->name }}
              </td>
              <td style="font-size: 12px; padding: 7px; text-align: center; border-left: 1px solid #ccc; width: 20%;">
                01721366765677
              </td>
              <td style="font-size: 12px; padding: 7px; text-align: center; border-left: 1px solid #ccc; width: 25%;">
                {{ $user->recognition }}
              </td>
              
              @if($user->is_official == 'No') 
                  <td style="font-size: 12px; padding: 7px; text-align: center; border-left: 1px solid #ccc; width: 20%;">
                    {{ $user->dept }}
                  </td>
              @endif
            </tr>
            
          </tbody>
        </table>
      </td>
    </tr>
    <!--Passenger Details End-->
    
    <!--Departure Bus Details End-->
    
    
    
    <!--Price Table Start-->
    <tr>
      <td style="padding-right: 15px; padding-top: 0px;" colspan="2">
        <p style="text-transform: uppercase; margin: 0 0 5px;font-size:11px;"><b>Two Way Calculation(Approx.):</b></p>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <table cellspacing="0" cellpadding="0" width="100%" style="border: 1px solid #ccc; margin: 0 0 5px;">
          <thead>
            <tr>
              <th style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 2px 15px; width: 70%;font-size:13px;">
                Particulars
              </th>
              <th style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 2px 15px; border-left: 1px solid #fff; width: 30%;font-size:13px;">Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="font-size:12px; padding: 6px 15px; width: 70%;">
                Approx. Time
              </td>
              <td style="font-size:12px; padding: 6px 15px; border-left: 1px solid #ccc; width: 30%;">
                {{ $requisition->duration }}
              </td>
            </tr>
            <tr>
              <td style="font-size:12px; padding: 6px 15px; width: 70%; border-top: 1px solid #ccc;">
                Approx. Distance
              </td>
              <td style="font-size:12px; padding: 6px 15px; border-left: 1px solid #ccc; width: 30%; border-top: 1px solid #ccc;">
                {{ $requisition->distance }} Km
              </td>
            </tr>

            <tr>
              <td style="font-size:12px; padding: 6px 15px; width: 70%; border-top: 1px solid #ccc;">
                Selected Car
              </td>
              <td style="font-size:12px; padding: 6px 15px; border-left: 1px solid #ccc; width: 30%; border-top: 1px solid #ccc;">
                {{ $requisition->car_type }}
              </td>
            </tr>

            <tr>
              <td style="font-size:12px; padding: 6px 15px; width: 70%; border-top: 1px solid #ccc;">
                <strong>Approx. Cost*</strong>
              </td>
              <td style="font-size:12px; padding: 6px 15px; border-left: 1px solid #ccc; width: 30%; border-top: 1px solid #ccc;">
                <strong>{{ $requisition->cost }} Tk</strong>
              </td>
            </tr>
            <tr>
              <td style="font-size:12px; padding: 6px 15px; width: 70%; border-top: 1px solid #ccc;">
                Extra Time
              </td>
              <td style="font-size:12px; padding: 6px 15px; border-left: 1px solid #ccc; width: 30%; border-top: 1px solid #ccc;">
                
              </td>
            </tr>
            <tr>
              <td style="font-size:12px; padding: 6px 15px; width: 70%; border-top: 1px solid #ccc;">
                Extra Distance
              </td>
              <td style="font-size:12px; padding: 6px 15px; border-left: 1px solid #ccc; width: 30%; border-top: 1px solid #ccc;">
                
              </td>
            </tr>
            <tr>
              <td style="font-size:12px; padding: 6px 15px; width: 70%; border-top: 1px solid #ccc;">
                Extra Cost
              </td>
              <td style="font-size:12px; padding: 6px 15px; border-left: 1px solid #ccc; width: 30%; border-top: 1px solid #ccc;">
                
              </td>
            </tr>
            
            <tr>
              <td style="font-size:12px; padding: 6px 15px; width: 70%; border-top: 1px solid #ccc;">
                <strong>GRAND TOTAL</strong>
              </td>
              <td style="font-size:12px; padding: 6px 15px; border-left: 1px solid #ccc; width: 30%; border-top: 1px solid #ccc;">
                
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="2" style="font-size: 14px; padding: 0px 0 11px;">
        * The approximate cost has been calculated for only up-down travel. The grand total cost will be calculated after completing the trip.
      </td>
    </tr>
    <!--Price Table End-->
    
    <!--Cancellation Start-->
    {{-- <tr>
      <td style="padding-right: 15px; padding-top: 25px;" colspan="2">
        <p style="text-transform: uppercase; margin: 0 0 5px;">Assigned Driver:</p>
      </td>
    </tr> --}}
    <!--Cancellation End-->
    
    <!--Support Footer Start-->
    @if($requisition->driver_id)
        <?php
            $driver = \App\Models\Driver::findOrFail($requisition->driver_id);
        ?>
        <tr>
          <td style="border: 1px solid #ccc; border-top-width: 1px" colspan="2">
            <p style="margin: 0; padding: 2px 0; background-color: #34c38f!important; color: #fff; text-align: center; text-transform: uppercase; font-size: 12px; font-weight: 1000;">Driver Info:</p>
            <p style="padding-left: 15px; font-weight: 400; text-align: center; margin-top: 5px; font-size: 12px;">Name: <span style="color: #3bb2e6; font-weight: 600;">{{ $driver->name }}</span></p>
            
            <p style="padding-left: 15px; font-weight: 400; text-align: center; margin-top: -10px; margin-bottom: 7px; font-size: 12px;">Phone No: <a style="color: #3bb2e6; font-weight: 600;" href="tel:<?php echo $driver->phone; ?>">{{ $driver->phone }}</a></p>
          </td>
        </tr>
    @endif
    {{-- <tr>
      <td colspan="2" style="font-size: 13px; padding: 25px 0;">
        Note: This is a computer generated invoice and does not require a signature/stamp. Please do not reply to this email. It has been sent from an email account that is not monitored.
      </td>  
    </tr> --}}
    <!--Support Footer End-->

    <tr>
      <td style="padding-right: 15px; padding-top: 10px;" colspan="2">
        <p style="text-transform: uppercase; margin: 0 0 5px;font-size:11px;"><b>Signatures:</b></p>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <table cellspacing="0" cellpadding="0" width="100%" style="border: 1px solid #ccc; margin: 0 0 25px;">
          <thead>
            <tr>
              <th style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 3px 15px; font-size:13px; width: 50%;">
                User
              </th>
              
              <th style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 3px 15px; border-left: 1px solid #fff; font-size:13px; width: 50%;">
                Director of Transport
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
                @if($user->signature != null)

                    <td style="font-size: 17px; padding: 30px; text-align: center; width: 50%;">
                        <img src="{{ asset('/assets/uploads/signatures/'.$user->signature) }}" width="200" height="40" style="vertical-align: middle;" alt="User Signature">
                    </td>
              
                    <td style="font-size: 17px; padding: 30px; text-align: center; border-left: 1px solid #ccc; width: 50%;">
                    
                    </td>

                @else
                    <td style="font-size: 17px; padding: 50px; text-align: center; width: 50%;">
                        
                    </td>
              
                    <td style="font-size: 17px; padding: 50px; text-align: center; border-left: 1px solid #ccc; width: 50%;">
                    
                    </td>
                @endif
              
            </tr>
            
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<style>
   body::after {
      /*content: '';
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background: url('/assets/uploads/default/logo-jp.jpg');
      opacity: 0.1;
      pointer-events: none;*/
    }
</style>
</body>