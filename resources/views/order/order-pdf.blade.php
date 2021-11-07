<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        @if (app()->getLocale() == 'ar')
        <style>
           body {
            font-family: 'XBRiyaz', sans-serif;
            direction: rtl;
            font-size: 20px;
            height: 100%;
           }
           table{
                width:100%;
                min-height: 75%;
                border: 1px solid black;
                border-collapse: collapse;
                direction: rtl;
           }
            td,th{
                border: 1px solid black;
                height:45px;
                padding-right: 5px;
            }
            th{
                text-align: right;
                width:30%;
                font-size: 25px;
            }
            td{
                width:15%;
            }
            img{
                width: 100%;
                height: 280mm;
            }
        </style>
           @else
        <style>
            body {
            font-family: 'XBRiyaz', sans-serif;
            font-size: 12px;
           }
           h5 {
            text-align: center;
            text-decoration: underline;
            font-size: 20px;
            }
            table{
                width:100%;
                height:100%;
                border: 1px solid black;
                border-collapse: collapse;
            }
            td,th{
                border: 1px solid black;
                height:25px;
            }
            td{
                text-align: center;
            }
            th{
                text-align: left;
                font-size: 13px;
                padding-left: 5px;
            }
            img{
                width: 100%;
                height: 280mm;
            }
        </style>
        @endif
    </head>
    <body>
        <h3 style="text-align: center">{{__('Affiliation order')}}</h3>
        <hr style="margin-top: 1px;margin-bottom:1px;">
        <p style="font-size:13px;">{{__('Order No.:')}}
        <br>{{__('Order Date:')}}<br>
        {{__('Please accept my affiliation with the Syndicate of Financial and Accounting Professions')}}<br>
            {{__('I declare that all the information, data and attached documents required for affiliation that I have submitted are correct and on my responsibility, and I pledge to abide by the duties of the affiliated members specified in the bylaws of the union, and the relevant decisions and instructions.')}}</p>
        <table class="table table-bordered">
            <tr>
                <th scope="col" colspan="6" >{{__('Personal data')}}</th>
            </tr>
            <tr>
                <th scope="col">{{__('FullName/English')}}</th>
                <td scope="row" colspan="5">{{ $order->english_firstname }} {{ $order->english_father_name }} {{ $order->english_lastname }}</td>
            </tr>
            <tr>
              <th scope="col">{{__('Name and Nickname')}}</th>
              <td scope="row">{{ $order->firstname }} {{ $order->lastname}}</td>
              <th scope="col">{{__('Father name')}}</th>
              <td scope="row">{{ $order->father_name }}</td>
              <th scope="col">{{__('Grandfather name')}}</th>
              <td scope="row">{{ $order->grandfather_name }}</td>
            </tr>
            <tr>
              <th scope="col">{{__('Mother name')}}</th>
              <td scope="row">{{ $order->mother_name }}</td>
              <th scope="col">{{__('Gender')}}</th>
              <td scope="row">{{ $order->gender }}</td>
              <th scope="col">{{__('Nationality')}}</th>
              <td scope="row">{{$order->Nationality}}</td>
            </tr>
            <tr>
              <th scope="col">{{__('Place and Date of birth')}}</th>
              <td scope="row">{{ $order->place_of_birth}} {{ $order->date_of_birth}}</td>
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
              <th scope="col">{{__('work side')}}</th>
              <td scope="row" colspan="2">{{ $order->side_work}}</td>
            </tr>
        {{-- </table> --}}
        {{-- <br> --}}
    {{-- <h5>{{__('contact information')}}</h5> --}}
        {{-- <table class="table table-bordered"> --}}
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
            <tr>
                <th scope="col" colspan="6">{{__('Qualifications')}}</th>
            </tr>
            <tr>
                <th scope="col">{{__('Qualification')}}</th>
                <th scope="col">{{__('Specialization')}}</th>
                <th scope="col">{{__('Side')}}</th>
                <th scope="col">{{__('Country')}}</th>
                <th scope="col">{{__('Finish Year')}}</th>
                <th scope="col">{{__('Rate')}}</th>
            </tr>
        @for($i = 0; $i < sizeof($order->qualifications); $i++)
            <tr class="cloning_row" id="0">
                <td scope="row">{{ $order->qualifications[$i]->qualification}}</td>
                <td scope="row">{{ $order->qualifications[$i]->Specialization }}</td>
                <td scope="row">{{ $order->qualifications[$i]->side }}</td>
                <td scope="row">{{ $order->qualifications[$i]->country}}</td>
                <td scope="row">{{ $order->qualifications[$i]->finishyear }}</td>
                <td scope="row">{{ $order->qualifications[$i]->rate }}</td>

            </tr>
        @endfor
            <tr>
                <th scope="row" colspan="6">{{__('Attached to the order')}}</th>
            </tr>
            <tr>
                <td scope="row" colspan="3">{{__('Document of no conviction')}}</td>
                <td scope="row" colspan="3">{{__('A certified copy of the university degree applied for affiliation with')}}</td>
            </tr>
            <tr>
                <td scope="row" colspan="6">{{__('ID photo A4 size + 3 personal photos')}}</td>
            </tr>
            <tr style="border: none;">
                <td scope="row" rowspan="2" colspan="4">{{__('the employee in charge')}}</td>
                <td scope="row" colspan="2">{{__('order presenter')}}</td>
            </tr>
            <tr style="border: none;">
                <td scope="row" colspan="2">{{__('Signature')}}</td>
            </tr>
            <tr style="border: none;">
                <th scope="col" colspan="4">{{__('How to pay the affiliation fee')}}</th>
                <td scope="row" colspan="2" >{{__('Managing Director:')}}</td>
            </tr>
            <tr style="border: none;">
                <td scope="row" colspan="6">{{__('Pay by receipt /bank notice No./         / date')}}</td>
            </tr>
            <tr style="border: none;">
                <td scope="row"  colspan="4" style="border: none;">{{__('cashier:')}}</td>
                <td scope="row"  colspan="2" style="border: none;">{{__('Signature')}}</td>
            </tr>
            <tr style="border: none;">
                <td scope="row" colspan="2" style="border: none;">{{__('Signature')}}</td>
                <td colspan="4" style="border: none;">{{__('The seal')}}</td>
            </tr>
            <tr style="border: none;">
                <td scope="row" colspan="6" ></td>
            </tr>
            <tr style="border: none;">
                <td scope="row" colspan="6" ></td>
            </tr>
            <tr>
                <th scope="row" colspan="6">{{__('Board of directors decision')}}</th>
            </tr>
            <tr>
                <td scope="row" colspan="6">{{__('decision of the Board of Directors in its session No. /      / date   / / 20')}}</td>
            </tr>
            <tr>
                <td scope="row" colspan="2">{{__('Approval')}}</td>
                <td scope="row" colspan="4">{{__('Membership No')}}</td>
            </tr>
            <tr>
                <td scope="row" colspan="3">{{__('order is not approved')}}</td>
                <td scope="row" colspan="3">{{__('Reasons for disapproval')}}</td>
            </tr>
        </table>
        <p style="font-size: 11px;width:45%;float:right;display:inline-block">{{__('Secret keeper')}}</p>
        <p style="font-size: 11px;width:45%;">{{__('Chairman of Board of Directors')}}</p>
        </p>

        <img src ="{{asset("storage/identity-images/$order->identity_image")}}">
        <img src ="{{asset("storage/personal-images/$order->personal_image")}}">
        <img src ="{{asset("storage/certification-images/$order->certification_image")}}">
        <img src ="{{asset("storage/no_conviction-images/$order->no_conviction_image")}}">
    </body>

</html>

















