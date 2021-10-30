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
                width:75%;
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
                width:75%;
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
        <br>
        <h1>{{__('Request a local membership document')}}</h1>
        <span class="status"> {{__('Order Status: ')}} {{$fullorder->status}} </span><br>
        <strong style="font-size:13px;">{{__('(Implementation of the decision of the Board of Directors in its session No. 41 held on the date 17/07/2016 containing the determination of the amount 200 SYP of the value of a membership document)')}}</strong><br>
        <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership document stating that I am a registered member of the Syndicate')}}<br>{{__('to submit it to')}}
        {{ $fullorder->side }}</p>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">{{__('User ID')}}</th>
                <th scope="col" >{{__('Membership ID')}}</th>
                <th scope="col">{{__('Request Date')}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width:24%">{{ Auth::User()->id}}</td>
                <td style="width:24%">{{$fullorder->membership_id}}</td>
                <td style="width:24%">{{ date("Y-m-d h:i A", strtotime($fullorder->created_at))}}</td>
            </tr>
        </tbody>
        </table>
        <p class="p-fullorder">{{__('Your request will be considered within a maximum period of two days. Please contact us')}}</p>
        <hr>
        <p><span style="font-weight: bold;">{{__('Financial Management Statement:')}}</span><br>
        {{__('Mr.')}}{{$fullorder->fullname}}{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}
        {{__('We inform you that he is registered in the Syndicate in year 20')}}{{$fullorder->user->order->created_at->format('y')}} {{__('and : ')}}</p>&nbsp;

        </p>
        @if($fullorder->not_debtor == 0)
            <p>{{__('Financially innocent')}}</p>
        @else
           <p>{{__('It has a previous financial liability')}}{{__('equal ')}}{{ $fullorder->money_debt}} {{__(' SYP')}}</p>
        @endif
        <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}{{ $fullorder->money_order}}{{__(' SYP')}}</p>
        <hr><p><span style="font-weight: bold;">{{__('Treasurer statement: ')}}</span><br>
        {{__('Amount has been received ')}}{{ $fullorder->money_order}}{{__(' SYP')}}</p>
        <hr>
        <p><span style="font-weight: bold;">{{__("Chairman's decision")}}{{__(':')}}</span><br>
        {{__('Approval:')}}
        @if($fullorder->Chairman_decision == 1)
            {{__('Approval')}}
        @else
            {{__('Disapproval')}}
        @endif
        </p>
        @if($fullorder->Chairman_decision == 0)
            <p>{{__('reasons :(If not approved)')}}</p><p>{{ $fullorder->Chairman_disapproval_reasons }}</p>
        @endif
    </div>
    </body>
</html>



