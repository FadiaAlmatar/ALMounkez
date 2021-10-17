<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        @if (app()->getLocale() == 'ar')
        <style>
           body {
            font-family: 'XBRiyaz', sans-serif;
            direction: rtl;
           }
           table{
                width:100%;
                border: 1px solid black;
                border-collapse: collapse;
            }
            td,th{
                border: 1px solid black;
            }
            th{
                text-align: right;
                width:30%;
            }
            td{
                width:20%;
            }
        </style>
           @else
        <style>
            body {
            font-family: 'XBRiyaz', sans-serif;
           }
           h5 {
            /* border:1px solid #220044; */
            text-align: center;
            text-decoration: underline;
            font-size: 20px;
            }
            table{
                width:100%;
                border: 1px solid black;
                border-collapse: collapse;
            }
            td,th{
                border: 1px solid black;
                width:24%;
            }
            td{
                text-align: center;
            }
            th{
                text-align: left;
            }
        </style>
        @endif
    </head>
    <body>
        {{-- <h5>{{__('Personal data')}} </h5> --}}
          <table class="table table-bordered">
              <tr>
                  <th scope="col" colspan="6">{{__('Personal data')}}</th>
              </tr>
            <tr>
                <th scope="col">{{__('FullName/English')}}</th>
                <td scope="row" colspan="5">{{ $order->english_firstname }}{{ $order->english_father_name }}{{ $order->english_lastname }}</td>
              </tr>
            <tr>
              <th scope="col">{{__('Name and Nickname')}}</th>
              <td scope="row">{{ $order->firstname }}{{ $order->lastname}}</td>
              <th scope="col">{{__('Father name')}}</th>
              <td scope="row">{{ $order->father_name }}</td>
              <th scope="col">{{__('Grandfather name')}}</th>
              <td scope="row">{{ $order->grandfather_name }}</td>
            </tr>
            <tr>
              <th scope="col">{{__('Mother name')}}</th>
              <td scope="row">{{ $order->mother_name }}</td>
              <th scope="col">{{__('Gender')}}</th>
              <td scope="row">>{{ $order->gender }}</td>
              <th scope="col">{{__('Nationality')}}</th>
              <td scope="row">{{$order->Nationality}}</td>
            </tr>
            <tr>
              <th scope="col">{{__('Place and Date of birth')}}</th>
              <td scope="row">{{ $order->place_of_birth}}{{ $order->date_of_birth}}</td>
              <th scope="col">{{__('National ID')}}</th>
              <td scope="row">{{ $order->national_id }}</td>
              <th scope="col">{{__('Personal Identification Number')}}</th>
              <td scope="row">{{ $order->personal_identification_number }}</td>
            </tr>
            <tr>
              <th scope="col">{{__('Public Record Number(For non-Syrians)')}}</th>
              <td scope="row">{{$order->public_record_number }}</td>
              <th scope="col">{{__('Military')}}</th>
              <td scope="row">{{$order->military}}</td>
              <th scope="col">{{__('Civil Registry')}}</th>
              <td scope="row">{{$order->civil_registry_secretariat}}</td>
            </tr>
            <tr>
              <th scope="col">{{__('Present Address')}}</th>
              <td scope="row" colspan="2">{{ $order->address }}</td>
              <td scope="row">{{__('work side')}}</td>
              <th scope="col" colspan="2">{{ $order->side_work}}</th>
            </tr>
        </table>
        {{-- <br> --}}
    {{-- <h5>{{__('contact information')}}</h5> --}}
        <table class="table table-bordered">
            <tr>
                <th scope="col" colspan="6">{{__('contact information')}}</th>
            </tr>
            <tr>
                <th scope="col">{{__('House Phone')}}</th>
                <td scope="row">{{$order->house_phone}}</td>
                <th scope="col">{{__('Mobile')}}</th>
                <td scope="row">{{ $order->mobile }}</td>
                <th scope="col">{{__('Work Phone')}}</th>
                <td scope="row">{{ $order->work_phone }}</td>
            </tr>
            <tr>
                <th scope="col">{{__('E-mail')}}</th>
                <td scope="row">{{ $order->email}}</td>
                <th scope="col">{{__('Fax')}}</th>
                <td scope="row" colspan="3">{{$order->fax }}</td>
            </tr>
        </table>

        </div>
    {{-- <h5>{{__('Qualifications')}}</h5> --}}
          <div class="tab-pane fade" id="Qualifications" role="tabpanel" aria-labelledby="Qualifications-tab">
                    <div class="table-responsive">
                        <table class="table" id="Qualification">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="6">{{__('Qualifications')}}</th>
                                </tr>
                            <tr>
                                <th scope="col">{{__('Qualification')}}</th>
                                <th scope="col">{{__('University')}}</th>
                                <th scope="col">{{__('Country')}}</th>
                                <th scope="col">{{__('Graduation Year')}}</th>
                                <td scope="col">{{__('Graduation Rate')}}</td>
                                <th scope="col">{{__('Specialization')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for ($i = 0; $i < sizeof($order->qualifications); $i++)
                            <tr class="cloning_row" id="0">
                                <td scope="row">{{ $order->qualifications[$i]->qualification}}</td>
                                <td scope="row">{{ $order->qualifications[$i]->university }}</td>
                                <td scope="row">{{ $order->qualifications[$i]->country}}</td>
                                <td scope="row">{{ $order->qualifications[$i]->graduation_year }}</td>
                                <td scope="row">{{ $order->qualifications[$i]->graduation_rate }}</td>
                                <td scope="row">{{ $order->qualifications[$i]->Specialization }}</td>
                            </tr>
                            @endfor
                            <tr>
                                <th scope="col">{{__('How to pay the affiliation fee')}}</th>
                                <td scope="row" colspan="5">{{__('Payment method')}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
        </div>
        {{-- <h5>{{__('How to pay the affiliation fee')}}</h5> --}}
          {{-- <div id="pay" class="tab-pane fade"  role="tabpanel" aria-labelledby="pay-tab">
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Payment method">{{__('Payment method')}}</label>
                        {{$order->pay_affiliation_fee}}
                  </div>
                </div>
              </div>
        </div> --}}
        {{-- نهايةطريقة الدفع --}}
    </div>
    </body>
</html>

















