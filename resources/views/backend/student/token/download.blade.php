<body style="page-break-inside: avoid;">
    
<table cellspacing="0" cellpadding="0" width="100%" style=" max-width: 80%; margin: 0 auto; font-family: monospace; page-break-inside: avoid !important; padding: 0 20px;">
  
  <tbody>

    <tr>
      <th colspan="2" style="text-align: center; font-weight: 400; border-bottom: 1px solid #ccc;">
        <img src="{{ asset('/assets/uploads/default/logo-jp.jpg') }}" style="margin-bottom: 15px;" width="85" height="80" alt="MBSTU Logo">

        <div id="photo" style="text-align: center">
            <h1 style="color: #3bb2e6; margin:  0 0 5px; text-transform: uppercase; font-size: 24px; text-align: center;">BSMRH Food Token </h1>
            <p style="margin: 0; font-size: 19px; text-align: center;">Token ID: {{ $check_today->id }} </p>
            <img src="{{ asset('/assets/uploads/default/mujib-100_logo.jpg') }}" style="vertical-align: middle; margin-top: -59px; margin-left: 580px;" width="80" height="65" alt="Logo">
        </div>
      </th>
      
    </tr>
    <tr>
      <td colspan="2" style="padding: 10px 10px 5px;">
            <p style="font-size: 20px; margin: 0 0 5px;">Hello <strong>{{ $user->name }}</strong>,</p><p style="font-size:18px; margin: 0;">Congratulations! You have available food tokens to reedem today.</p>
      </td>
    </tr>
    <!--Departure Flight Details Start-->
    
    <tr>
      <td style="padding-right: 15px; padding-top: 10px;" colspan="2">
        <p style="text-transform: uppercase; margin: 0 0 5px;font-size:17px;"><b>Token Details:</b></p>
      </td>
    </tr>

    <tr>
      <td style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 0px 15px; width: 20%; border: 1px solid #ccc; border-right: 0; border-bottom: 0; text-align: center; font-size:17px;">Today's Date</td>
      <td style="padding: 0 15px; border: 1px solid #ccc; width: 80%;">
        <p style="font-size:19px;">{{ date('d F, Y') }}</p>
      </td>
    </tr>
    
    @if($check_today->lunch)
        <tr>
          <td style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 0px 15px; width: 20%; border: 1px solid #ccc; border-right: 0; border-bottom: 0; text-align: center; font-size:17px;">Lunch</td>
          <td style="padding: 0 15px; border: 1px solid #ccc; width: 80%;">
            <p style="font-size:19px;"><b>{{ $check_today->id.'-'.$check_today->lunch }}</b></p>
          </td>
        </tr>
    @endif

    @if($check_today->dinner)
        <tr>
          <td style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 0px 15px; width: 20%; border: 1px solid #ccc; border-right: 0; border-bottom: 0; text-align: center; font-size:17px;">Dinner</td>
          <td style="padding: 0 15px; width: 80%;border: 1px solid #ccc;">
            <p style="font-size:19px;"><b>{{ $check_today->id.'-'.$check_today->dinner }}</b></p>
          </td>
        </tr>
    @endif

    <!--Return Bus Details End-->
    
    <!--Passenger Details Start-->
    
    <tr>
      <td style="padding-right: 15px; padding-top: 30px;" colspan="2">
        <p style="text-transform: uppercase; margin: 0 0 5px;font-size:17px;"><b>Student Details:</b></p>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <table cellspacing="0" cellpadding="0" width="100%" style="border: 1px solid #ccc; margin: 0 0 10px;">
          <thead>
            <tr>
              <th style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 2px 15px; width: 35%;font-size:17px;">
                Name
              </th>
              
              <th style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 2px 15px; border-left: 1px solid #fff; width: 25%;font-size:17px;">
                Room & Seat
              </th>

              @if($user->department != '')
                  <th style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 2px 15px; border-left: 1px solid #fff; width: 20%;font-size:17px;">
                    Dept.
                  </th>
              @endif
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="font-size: 18px; padding: 7px; text-align: center; width: 35%;">
                {{ $user->name }}
              </td>
              
              <td style="font-size: 18px; padding: 7px; text-align: center; border-left: 1px solid #ccc; width: 35%;">
                <b style="font-weight: 550;">{{ $user->username }}</b>
              </td>
              
              @if($user->department != '') 
                  <td style="font-size: 18px; padding: 7px; text-align: center; border-left: 1px solid #ccc; width: 30%;">
                    {{ $user->department }}
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
      <td style="padding-right: 15px; padding-top: 20px;" colspan="2">
        <p style="text-transform: uppercase; margin: 0 0 5px;font-size:17px;"><b>Meal Calculation:</b></p>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <table cellspacing="0" cellpadding="0" width="100%" style="border: 1px solid #ccc; margin: 0 0 5px;">
          <thead>
            <tr>
              <th style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 2px 15px; width: 70%;font-size:17px;">
                Particulars
              </th>
              <th style="font-weight: 1000; background-color: #34c38f!important; color: #fff; padding: 2px 15px; border-left: 1px solid #fff; width: 30%;font-size:17px;">Amount</th>
            </tr>
          </thead>
          <tbody>

            @if($check_today->lunch)
                <tr>

                  <td style="font-size:17px; padding: 6px 15px; width: 70%;">
                    Lunch
                  </td>
                  <td style="font-size:19px; padding: 6px 15px; border-left: 1px solid #ccc; width: 30%;">
                    30.30 Tk
                  </td>
                </tr>
            @endif

            @if($check_today->lunch)
                <tr>

                  <td style="font-size:17px; padding: 6px 15px; width: 70%;">
                    Dinner
                  </td>
                  <td style="font-size:19px; padding: 6px 15px; border-left: 1px solid #ccc; width: 30%;">
                    30.30 Tk
                  </td>
                </tr>
            @endif
            
            <tr>
              <td style="font-size:17px; padding: 6px 15px; width: 70%; border-top: 1px solid #ccc;">
                <strong>TOTAL COST</strong>
              </td>
              <td style="font-size:19px; padding: 6px 15px; border-left: 1px solid #ccc; width: 30%; border-top: 1px solid #ccc;">
                  <b>{{ number_format($check_today->cost, 2) }} TK</b>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="2" style="font-size: 16px; padding: 0px 0 11px;">
        * The cost has been calculated based on the standard charges policy. BSMRH Hall Management has authority to change the cost anytime.
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