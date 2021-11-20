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
            font-size: 12px;
           }
           h1 {
            text-align: center;
            text-decoration: underline;
            font-size: 18px;
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
                text-align: right;
                font-size: 11px;
                padding-right:5px;
            }

            strong{
                text-align: center;
            }

        </style>
        @else
        <style>
           body {
            font-family: 'XBRiyaz', sans-serif;
            font-size: 12px;
           }
           h1 {
            text-align: center;
            text-decoration: underline;
            font-size: 18px;
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
                font-size: 11px;
                text-align: left;
                padding-left:5px;
            }
            strong{
                text-align: center;
            }
        </style>
        @endif
    </head>
    <body>
       <div>
        {{__('Syndicate of Financial and Accounting Professions')}}<br>
        {{__('In the Syrian Arab Republic')}}<br>
        <span>{{__('branch:')}}</span><br>
        <span>{{__('order No:')}}</span>
        </div>
        <h1>{{__('Request a local membership document')}}</h1>
        {{-- <table style="border:1px solid black; height:100%"> --}}
        {{-- <span class="status"> {{__('Order Status: ')}} {{$fullorder->status}} </span><br> --}}
        <strong style="font-size:11px;">{{__('(Implementation of the decision of the Board of Directors in its session No. 41 held on the date 17/07/2016 containing the determination of the amount 200 SYP of the value of a membership document)')}}</strong><br>
        <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership document stating that I am a registered member of the Syndicate')}}<br>{{__('to submit it to')}}
        {{ $fullorder->side }}</p>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">{{__('User')}}</th>
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
        {{__('Mr.')}}{{$fullorder->fullname}}{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
        {{__('We inform you that he is registered in the Syndicate in year 20')}}{{$fullorder->user->order->created_at->format('y')}} {{__('and : ')}}
        @if($fullorder->not_debtor == 0)
            {{__('Financially innocent')}}
        @else
           {{__('It has a previous financial liability')}}{{__('equal ')}}{{ $fullorder->money_debt}} {{__(' SYP')}}
        @endif
        <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}{{ $fullorder->money_order}}{{__(' SYP')}}</p>
        <div>
        <table   @if (app()->getLocale() == 'ar') style="width:60%;margin-left:0;border:none;" @else style="width:60%;margin-right:0;border:none;"@endif>
            <tr style="border:none;">
                <th style="border:none;">{{__('Name and signature of the treasurer')}}</th>
                <td style="border:none;"></td>
            </tr>
            <tr style="border:none;">
               <td style="border:none;"></td>
               <td style="border:none;"></td>
            </tr>
            <tr style="border:none;">
               <th style="border:none;"><pre>{{__(' date:')}}   /    / 201</pre></th>
               <td style="border:none;"></td>
            </tr>
        </table>
        </div>
        <hr style="margin-top:0">
            <hr style="margin-bottom:0;margin-top:0">
        <span style="font-weight: bold;margin-top:0">{{__('Treasurer statement: ')}}</span>
        <hr style="margin-bottom:0;margin-top:0">
        <br>
        <pre>{{__('Amount has been received ')}}{{$fullorder->money_order}}{{__('SYP')}}{{__('(Just ')}}{{$fullorder->money_order}}{{__(' Nothing else)')}}{{__('Receipt No')}}/         /{{__(' date:')}}  /   / 201</pre>
        <div>
         <table  @if (app()->getLocale() == 'ar') style="width:67%;margin-left:0;border:none;" @else style="width:67%;margin-right:0;border:none;" @endif>
             <tr style="border:none;">
                 <td style="border:none;"></td>
                 <td style="border:none;"></td>
                 <th style="border:none;">{{__('Name and signature of the treasurer')}}</th>
                 {{-- <td style="border:none;"></td> --}}
             </tr>
             <tr style="border:none;">
                <th style="border:none;">{{__('the seal')}}</th>
                <td style="border:none;"></td>
                <td style="border:none;"></td>
                {{-- <td style="border:none;"></td> --}}
             </tr>
             <tr style="border:none;">
                <td style="border:none;"></td>
                <td style="border:none;"></td>
                <th style="border:none;"><pre>{{__(' date:')}}   /    / 201</pre></th>
                {{-- <td style="border:none;"></td> --}}
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
            <table  @if (app()->getLocale() == 'ar') style="width:25%;margin-left:0;border:none;" @else style="width:20%;margin-right:0;border:none"  @endif>
                <tr style="border:none;">
                    <th style="border:none;">{{__('signature:')}}</th>
                </tr>
                <tr style="border:none;"><td style="border:none;"></td></tr>
                <tr style="border:none;">
                    <th style="border:none;"><pre>{{__(' date:')}}   /    / 201</pre></th>
                </tr>
            </table>
        </div>
        <hr style="margin-bottom:0;">
        <p style="font-weight:bold;margin-bottom:0;font-size: 11px;">{{__('Confirmation of the Affiliate Member of Receipt of the Membership Document:')}}</p>
        <table class="table table-bordered;border:none;">
            <tbody>
            <tr>
                <th scope="col">{{__('Document No:')}}</th>
                <td style="width:24%"></td>
                <th scope="col">{{__('issuance of the document date:')}}</th>
                <td style="width:24%"></td>
            </tr>
            <tr>
                <th scope="col" >{{__("received from him(employee's name and signature)")}}</th>
                <td style="width:24%"></td>
                <th scope="col" >{{__('receipt of the document date:')}}</th>
                <td style="width:24%"></td>
            </tr>
            </tbody>
        </table>
        <p style="text-align: center;font-weight:bold;margin-top:0;font-size: 11px;">{{__('saved with a copy of the document issued in the Membership Documents Register')}}</p>
    </body>
</html>



