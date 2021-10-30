<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        @if (app()->getLocale() == 'ar')
        <style>
            p,.span{
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
                /* border:1px solid red; */
                width: fit-content;
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
                /* border:1px solid red; */
                width: fit-content;
            }
        </style>
        @endif
    </head>
    <body>
        <br>
        <h1>{{__('Membership transfer form from one branch to another')}}</h1>
        <p class="status"> {{__('Order Status: ')}} {{$fullorder->status}}</p>
        <br><span style="direction: rtl">{{__('Mr. Chairman of the Syndicate Branch Council in the province')}}</span>
        <span>{{$fullorder->country_before}}</span>
        <p>{{__('fullname* : ')}}{{$fullorder->fullname}}</p>
        <p>{{__('I kindly request you to transfer my membership from your branch of the Syndicate branch in the country: ')}}{{$fullorder->country_before}}</p>
        <p>{{__('To the syndicate branch in the country: ')}}{{$fullorder->country_after}}</p>
        <hr>
        <p>{{__('That is for the following reasons :')}}</p>
        <p>{{$fullorder->transportation_reasons}}</p>
            {{-- <p>{{__('Evidences attached')}}</p>
            <div class="mb-3" >
                <label for="formFile" class="form-label" style="font-size: 13px;">{{__('change home image')}}
                <input class="form-control" type="file" accept="image/*" id="change_home" name="change_home" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
            </label>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label" style="font-size: 13px;">{{__('change work image')}}
                <input class="form-control" type="file" accept="image/*"id="change_work" name="change_work" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
            </label>
            </div> --}}
            <p>{{__('Request date: ')}} {{ date("Y-m-d h:i A", strtotime($fullorder->created_at))}}</p>
            <hr>
{{-- بيان الدارة المالية --}}
            <p><span style="font-weight: bold;">{{__('Financial Management Statement:')}}</span><br>
            {{__('The fellow')}} {{Auth::User()->name}}{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}
            {{__('And registered in the Syndicate in year 20')}}{{Auth::User()->order->created_at->format('y')}}</p>

            @if($fullorder->not_debtor == 0)
                <span>{{__('Financially innocent')}}</span>
            @else
                <span>{{__('It has a previous financial liability')}}{{__('equal ')}}{{ $fullorder->money_debt}}{{__(' SYP')}}</span>
            @endif
{{-- قرار مجلس إدارة الفرع المسجل به --}}
            <hr>
            <p><span style="font-weight: bold;">{{__('Decision of the board of directors of the branch in which it is registered')}}</span><br>
            {{__('Approval:')}}
            @if($fullorder->registered_branch_decision == 1)
                {{__('Approval')}}
            @else
                {{__('Disapproval')}}
            @endif
            </p>
            @if($fullorder->registered_branch_decision == 0)
            <p>{{__('reasons :(If not approved)')}}</p>
            <p>{{ $fullorder->registered_branch_disapproval_reasons }}</p>
            @endif
{{--قرار مجلس إدارة الفرع الراغب بالانتقال إليه --}}
            <hr>
            <p><span style="font-weight: bold;">{{__('The decision of the board of directors of the branch wishing to move to it: ')}}</span><br>
            {{__('Approval:')}}
            @if($fullorder->Chairman_decision == 1)
                {{__('Approval')}}
            @else
                {{__('Disapproval')}}
            @endif
            </p>
            @if($fullorder->transferred_branch_decision == 0)
                <p for="reasons">{{__('reasons :(If not approved)')}}</p>
                <p>{{ $fullorder->transferred_branch_disapproval_reasons }}</p>
            @endif
{{--  بيان أمين الصندوق--}}
            <hr>
            <p><span style="font-weight: bold;">{{__('Treasurer statement: ')}}</span><br>
            {{__('Amount has been received ')}}{{ $fullorder->money_order}}{{__(' SYP')}} {{__('For a membership card fee')}}</p>
            <hr>
            <p style="font-weight: bold;">{{__('The new membership number in the event that both parties agree to transfer the affiliate')}}
             {{$fullorder->newmembership_number}}</p>
    </body>
</html>

