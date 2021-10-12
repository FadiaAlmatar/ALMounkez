<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
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
        <hr><p style="font-weight: bold;display:inline-block;width:40%">{{__('Financial Management Statement:')}}</p>
        <p style="display:inline">{{__('Mr.')}}
            <span style="font-weight: bold">{{Auth::User()->name}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}
                {{__('We inform you that he is registered in the Syndicate in year ...... and : ')}}
        </p>&nbsp;
        @if($fullorder->not_debtor == 0)
            {{__('Financially innocent')}}
        @else
           {{__('It has a previous financial liability')}}{{__('equal ')}}{{ $fullorder->money_debt}} {{__(' SYP')}}
        @endif
        <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}{{ $fullorder->money_order}}{{__(' SYP')}}</p>
        <hr><p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p>
        <p>{{__('Amount has been received ')}}{{ $fullorder->money_order}}{{__(' SYP')}}</p>
        <hr><p style="font-weight: bold;">{{__("Chairman's decision: ")}}</p>
        <label style="display:inline;width:70%;"class="form-label" for="approval">{{__('Approval:')}}</label>
        @if($fullorder->Chairman_decision == 1)
            {{__('Approval')}}
        @else
            {{__('Disapproval')}}
        @endif
        <p>
        @if($fullorder->Chairman_decision == 0)
            {{__('reasons :(If not approved)')}}&nbsp;{{ $fullorder->Chairman_disapproval_reasons }}
        @endif
        </p>
    </div>
    </body>
</html>



