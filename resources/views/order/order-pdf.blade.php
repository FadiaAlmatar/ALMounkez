<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
    </head>
    <body>
        <h5>{{__('Personal data')}} </h5>
        <table class="table table-bordered">
              <tr>
                <th scope="col">{{__('name*')}}</th>
                <td scope="row">{{ $order->firstname }}</td>
                <th scope="col">{{__('nickname*')}}</th>
                <td scope="row">{{ $order->lastname}}</td>
              </tr>
              <tr>
                <th scope="col">{{__('father name*')}}</th>
                <td scope="row">{{ $order->father_name }}</td>
                <th scope="col">{{__('grandfather name*')}}</th>
                <td scope="row">{{ $order->grandfather_name }}</td>
              </tr>
              <tr>
                <th scope="col">{{__('mother name*')}}</th>
                <td scope="row">{{ $order->mother_name }}</td>
                <th scope="col">{{__('Gender')}}</th>
                <td scope="row">{{ $order->gender }}</td>
              </tr>
              <tr>
                <th scope="col">{{__('fname/english*')}}</th>
                <td scope="row">{{ $order->english_firstname }}</td>
                <th scope="col">{{__('lname/english*')}}</th>
                <td scope="row">{{ $order->english_lastname }}</td>
              </tr>
              <tr>
                <th scope="col">{{__('fathername/english*')}}</th>
                <td scope="row">{{ $order->english_father_name }}</td>
                <th scope="col">{{__('mothername/english*')}}</th>
                <td scope="row">{{ $order->english_mother_name }}</td>
              </tr>
              <tr>
                <th scope="col">{{__('Nationality')}}</th>
                <td scope="row">{{$order->Nationality}}</td>
                <th scope="col">{{__('Martial status')}}</th>
                <td scope="row">{{$order->Marital_status}}</td>
              </tr>
              <tr>
                <th scope="col">{{__('Place of birth*')}}</th>
                <td scope="row">{{ $order->place_of_birth}}</td>
                <th scope="col">{{__('Date of birth*')}}</th>
                <td scope="row">{{ $order->date_of_birth}}</td>
              </tr>
              <tr>
                <th scope="col">{{__('National ID*')}}</th>
                <td scope="row">{{ $order->national_id }}</td>
                <th scope="col">{{__('Civil Registry*')}}</th>
                <td scope="row">{{$order->civil_registry_secretariat}}</td>
              </tr>
              <tr>
                <th scope="col">{{__('Personal Identification Number*')}}</th>
                <td scope="row">{{ $order->personal_identification_number }}</td>
                <th scope="col">{{__('Identity Grant Date*')}}</th>
                <td scope="row">{{ $order->Identity_grant_date }}</td>
              </tr>
              <tr>
                <th scope="col">{{__('Constraint*')}}</th>
                <td scope="row">{{ $order->constraint}}</td>
                <th scope="col">{{__('Military')}}</th>
                <td scope="row">{{$order->military}}</td>
              </tr>
              <tr>
                <th scope="col">{{__('Public Record Number')}}</th>
                <td scope="row">{{$order->public_record_number }}</td>
                <th scope="col">{{__('Health Status')}}</th>
                <td scope="row">{{$order->Health_status}}</td>
              </tr>
          </table>
    <h5>{{__('contact information')}}</h5>
        <table class="table table-bordered">
            <tr>
                <th scope="col">{{__('country you wish to join*')}}</th>
                <td scope="row">{{$order->Affiliation_country}}</td>
                <th scope="col">{{__('Address*')}}</th>
                <td scope="row">{{ $order->address }}</td>
            </tr>
            <tr>
                <th scope="col">{{__('House Phone')}}</th>
                <td scope="row">{{$order->house_phone}}</td>
                <th scope="col">{{__('Work Phone')}}</th>
                <td scope="row">{{ $order->work_phone }}</td>
            </tr>
            <tr>
                <th scope="col">{{__('Mobile')}}</th>
                <td scope="row">{{ $order->mobile }}</td>
                <th scope="col">{{__('E-mail')}}</th>
                <td scope="row">{{ $order->email}}</td>
            </tr>
            <tr>
                <th scope="col">{{__('Fax')}}</th>
                <td scope="row">{{$order->fax }}</td>
                <th scope="col">{{__('Site')}}</th>
                <td scope="row">{{ $order->site }}</td>
            </tr>
            <tr>
                <th scope="col">{{__('work at government')}}</th>
                <td scope="row">@if ($order->work_in_government == 1){{__('Worker at government')}}
                                @else {{__('not Worker at government')}}@endif</td>
                <th scope="col">{{__('work side')}}</th>
                <td scope="row">{{ $order->side_work}}</td>
            </tr>
            <tr>
                <th scope="col">{{__('Insurance number')}}</th>
                <td scope="row">{{ $order->insurance_number }}</td>
                <th scope="col">{{__('Do you want to display your data on the site (contact information only) after approving the affiliation request?*')}}</th>
                <td scope="row"> @if($order->displayData == 1){{__('Yes')}}
                                 @else {{__('No')}}@endif</td>
            </tr>
        </table>

        </div>
    <h5>{{__('Qualifications')}}</h5>
          <div class="tab-pane fade" id="Qualifications" role="tabpanel" aria-labelledby="Qualifications-tab">
                    <div class="table-responsive">
                        <table class="table" id="Qualification">
                            <thead>
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
                            </tbody>
                        </table>
                    </div>
        </div>
        <h5>{{__('How to pay the affiliation fee')}}</h5>
          <div id="pay" class="tab-pane fade"  role="tabpanel" aria-labelledby="pay-tab">
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Payment method">{{__('Payment method')}}</label>
                        <input class="input"type="text" name="specialization[0]" value="{{$order->pay_affiliation_fee}}" id="Specialization" placeholder="" readonly>

                  </div>
                </div>
              </div>

        </div>
        {{-- نهايةطريقة الدفع --}}
    </div>
    </body>
</html>

















