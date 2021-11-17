<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        @if (app()->getLocale() == 'ar')
        <style>
            p,span{
                text-align: right;
                float:right;
            }
            .status{
               float:right;
           }
           body {
            font-family: 'XBRiyaz', sans-serif;
            direction: rtl;
           }
           h1 {
            text-align: center;
            text-decoration: underline;
            font-size: 20px;
            }
            table{
                width:100%;
                border: 1px solid black;
                border-collapse: collapse;
                margin:auto;
            }
            td,th{
                border: 1px solid black;
                width:24%;
            }
            td{
                text-align: center;
            }
            th,strong{
                text-align: center;
            }
            .p-fullorder{
                text-align: center;
            }
            .status{
                color: red;
                border:1px solid red;
            }
        </style>
        @else
        <style>
           .status{
               float:left;
           }
           body {
            font-family: 'XBRiyaz', sans-serif;
           }
           h1 {
            text-align: center;
            text-decoration: underline;
            font-size: 20px;
            }
            table{
                width:100%;
                border: 1px solid black;
                border-collapse: collapse;
                margin:auto;
            }
            td,th{
                border: 1px solid black;
                width:24%;
            }
            td{
                text-align: center;
            }
            th,strong{
                text-align: center;
            }
            .p-fullorder{
                text-align: center;
            }
            .status{
                color: red;
                border:1px solid red;
            }

        </style>
        @endif
    </head>
    <body>
       <div>
        {{__('Syndicate of Financial and Accounting Professions')}}<br>
        {{__('In the Syrian Arab Republic')}}<br>
        <span>{{__('branch:')}}</span><br>
        <span>{{__('order number:')}}</span>
        </div>
        <h1>{{__('Request a local membership document')}}</h1>
        {{-- <div style="border:1px solid black; height:100%"> --}}
        {{-- <span class="status"> {{__('Order Status: ')}} {{$fullorder->status}} </span><br> --}}
        <strong style="font-size:13px;">{{__('(Implementation of the decision of the Board of Directors in its session No. 41 held on the date 17/07/2016 containing the determination of the amount 200 SYP of the value of a membership document)')}}</strong><br>
        <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership document stating that I am a registered member of the Syndicate')}}<br>{{__('to submit it to')}}
        {{ $fullorder->side }}</p>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">{{__('User ID')}}</th>
                <td style="width:24%">{{ Auth::User()->id}}</td>
                <th scope="col">{{__('Request Date')}}</th>
                <td style="width:24%">{{ date("Y-m-d h:i A", strtotime($fullorder->created_at))}}</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="col" >{{__('Membership ID')}}</th>
                <td style="width:24%">{{$fullorder->membership_id}}</td>
                <th scope="col" >{{__('User Signature')}}</th>
                <td style="width:24%"></td>
            </tr>
        </tbody>
        </table>
        <p style="text-align:center;font-size:11px;font-weight:bold;margin-top:0;margin-bottom:0">{{__('Your request will be considered within a maximum period of two days. Please contact us')}}</p>
        <hr style="margin-bottom:0;margin-top:0">
        <hr style="margin-bottom:0;">
        <span style="font-weight: bold;margin-top:0">{{__('Financial Management Statement:')}}</span>
            <hr style="margin-bottom:0;margin-top:0">
            <br>
        {{__('Mr.')}}{{$fullorder->fullname}}{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}
        {{__('We inform you that he is registered in the Syndicate in year 20')}}{{$fullorder->user->order->created_at->format('y')}} {{__('and : ')}}
        @if($fullorder->not_debtor == 0)
            <p>{{__('Financially innocent')}}</p>
        @else
           <p>{{__('It has a previous financial liability')}}{{__('equal ')}}{{ $fullorder->money_debt}} {{__(' SYP')}}</p>
        @endif
        <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}{{ $fullorder->money_order}}{{__(' SYP')}}</p>
        <div>
        <table style="width:60%;margin-right:0;border:none;"  @if (app()->getLocale() == 'ar') style="width:60%;margin-left:0;border:none;" @endif>
            <tr style="border:none;">
                <td style="border:none;">{{__('Name and signature of the treasurer')}}</td>
                <td style="border:none;"></td>
            </tr>
            <tr style="border:none;">
               <td style="border:none;"></td>
               <td style="border:none;"></td>
            </tr>
            <tr style="border:none;">
               <td style="border:none;">{{__('date:    /      /201  ')}}</td>
               <td style="border:none;"></td>
            </tr>
        </table>
        </div>
        <hr style="margin-top:0">
            <hr style="margin-bottom:0;margin-top:0">
        <span style="font-weight: bold;margin-top:0">{{__('Treasurer statement: ')}}</span>
        <hr style="margin-bottom:0;margin-top:0">
        <br>
        {{__('Amount has been received ')}}{{ $fullorder->money_order}}{{__(' SYP')}}<br><br>
        <div>
         <table style="width:60%;margin-right:0;border:none;" @if (app()->getLocale() == 'ar') style="width:60%;margin-left:0;border:none;" @endif>
             <tr style="border:none;">
                 <td style="border:none;"></td>
                 <td style="border:none;"></td>
                 <th style="border:none;">{{__('Name and signature of the treasurer')}}</th>
                 <td style="border:none;"></td>
             </tr>
             <tr style="border:none;">
                <th style="border:none;">{{__('the seal')}}</th>
                <td style="border:none;"></td>
                <td style="border:none;"></td>
                <td style="border:none;"></td>
             </tr>
             <tr style="border:none;">
                <td style="border:none;"></td>
                <td style="border:none;"></td>
                <th style="border:none;">{{__('date:    /      /201  ')}}</th>
                <td style="border:none;"></td>
             </tr>
         </table>
        </div>

        <hr style="margin-top:0">
        <hr style="margin-bottom:0;margin-top:0">
            <span style="font-weight: bold;margin-bottom:0;">{{__("Chairman's decision")}}{{__(':')}}</span>
            <hr style="margin-bottom:0;margin-top:0">
        @if($fullorder->Chairman_decision == 1)
            {{__('Approval')}}
        @else
            {{__('Disapproval')}}
        @endif
        <br>
        @if($fullorder->Chairman_decision == 0)
            <p>{{__('reasons :(If not approved)')}}<br>{{ $fullorder->Chairman_disapproval_reasons }}</p><br>
        @endif
        <br>
        <div>
            <table style="width:40%;;margin-right:0;border:none;"  @if (app()->getLocale() == 'ar') style="width:40%;margin-left:0;border:none;" @endif>
                <tr style="border:none;">
                    <td style="border:none;">{{__('signature:')}}</td>
                </tr>
                <tr style="border:none;"><td style="border:none;"></td></tr>
                <tr style="border:none;">
                   <td style="border:none;">{{__('date:    /      /201  ')}}</td>
                </tr>
            </table>
            </div>
        <hr style="margin-bottom:0;">
        <p style="font-weight:bold;margin-bottom:0">{{__('Confirmation of the Affiliate Member of Receipt of the Membership Document:')}}</p>
        <table class="table table-bordered;border:none;">
            {{-- <thead> --}}
                <tr>
                    <th scope="col">{{__('Document number')}}</th>
                    <td style="width:24%"></td>
                    <th scope="col">{{__('issuance of the document date:')}}</th>
                    <td style="width:24%"></td>
                </tr>
            {{-- </thead> --}}
            <tbody>
                <tr>
                    <th scope="col" >{{__("received from him(employee's name and signature)")}}</th>
                    <td style="width:24%"></td>
                    <th scope="col" >{{__('receipt of the document date:')}}</th>
                    <td style="width:24%"></td>
                </tr>
            </tbody>
            </table>
    {{-- </div> --}}
        <p style="text-align: center;font-weight:bold;">{{__('saved with a copy of the document issued in the Membership Documents Register')}}</p>
    </body>
</html>



