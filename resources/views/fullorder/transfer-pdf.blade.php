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
    <h1 class="h1-fullorder">{{__('Membership transfer form from one branch to another')}}</h1>
    <p class="status"style="color:red"value="{{$fullorder->status}}"> {{$fullorder->status}} </p>
        <p>{{__('Mr. Chairman of the Syndicate Branch Council in the province')}}{{$fullorder->country_before}}</p>
        <span>{{__('fullname* : ')}}</span><span>{{ old('fullname') }}</span>
            <br><hr><br>
            <p>{{__('I kindly request you to transfer my membership from your branch of the Syndicate branch in the country: ')}}{{$fullorder->country_before}}</p>
            <p>{{__('To the syndicate branch in the country: ')}}{{$fullorder->country_after}}</p>
            </p>
            <hr>
            <div class="form-group">
                <label for="reasons">{{__('That is for the following reasons :')}}</label>
                {{$fullorder->transportation_reasons}}
            </div>
            <p>{{__('Evidences attached')}}</p>
            <div class="mb-3" >
                <label for="formFile" class="form-label" style="font-size: 13px;">{{__('change home image')}}
                <input class="form-control" type="file" accept="image/*" id="change_home" name="change_home" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
            </label>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label" style="font-size: 13px;">{{__('change work image')}}
                <input class="form-control" type="file" accept="image/*"id="change_work" name="change_work" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
            </label>
            </div>
            <p>{{__('Request date: ')}} {{ date("Y-m-d h:i A", strtotime($fullorder->created_at))}}</p><hr><br>
{{-- بيان الدارة المالية --}}
            <p style="font-weight: bold">{{__('Financial Management Statement:')}}</p>
            <p style="display:inline">{{__('The fellow')}} <span style="font-weight: bold">{{Auth::User()->name}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
                {{__('And registered in the Syndicate in year')}}........</p><br>
                @if($fullorder->not_debtor == 0)
                    <span>{{__('Financially innocent')}}</span>
                @else
                    <span>{{__('It has a previous financial liability')}}
                    {{__('equal ')}}{{ $fullorder->money_debt}}{{__(' SYP')}}</span>
                @endif
{{-- قرار مجلس إدارة الفرع المسجل به --}}
            <hr>
            <p style="font-weight: bold;">{{__('Decision of the board of directors of the branch in which it is registered')}}</p>
                <span>{{__('Approval')}}</span>
                    @if($fullorder->registered_branch_decision == 1)
                    <span>{{__('Approval')}}</span>
                    @else
                    <span>{{__('Disapproval')}}</span>
                    @endif
                 @if($fullorder->registered_branch_decision == 0)
                   <p>{{__('reasons :(If not approved)')}}</p>
                   <p>{{ $fullorder->registered_branch_disapproval_reasons }}</p>
                    @endif
{{--قرار مجلس إدارة الفرع الراغب بالانتقال إليه --}}
            <hr>
            <p style="font-weight: bold;">{{__('The decision of the board of directors of the branch wishing to move to it: ')}}</p>
            <p>{{__('Approval')}}</p>
                @if($fullorder->Chairman_decision == 1)
                    <span>{{__('Approval')}}</span>
                @else
                    <span>{{__('Disapproval')}}</span>
                @endif
                @if($fullorder->transferred_branch_decision == 0)
                   <p for="reasons">{{__('reasons :(If not approved)')}}</p>
                   <p>{{ $fullorder->transferred_branch_disapproval_reasons }}</p>
                @endif
{{--  بيان أمين الصندوق--}}
            <hr>
            <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p>
            <p>{{__('Amount has been received ')}}{{ $fullorder->money_order}}{{__(' SYP')}} {{__('For a membership card fee')}}</p>
            <hr>
            <p style="font-weight: bold;">{{__('The new membership number in the event that both parties agree to transfer the affiliate')}}
             {{$fullorder->newmembership_number}}</p>
    </body>
</html>

