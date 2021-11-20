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
            img{
                width: 210mm;
                height: 297mm;
                margin: 0;
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
            img{
                width: 210mm;
                height: 297mm;
                margin: 0;
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
        <h1>{{__('Membership transfer form from one branch to another')}}</h1>
        {{-- <p class="status"> {{__('Order Status: ')}} {{$fullorder->status}}</p> --}}
        <span style="direction: rtl">{{__('Mr. Chairman of the Syndicate Branch Council in the province')}}</span>
        <span>{{__($fullorder->country_before)}}</span><br>
        <span>{{__('User:')}}</span><br>
        <span style="text-transform: capitalize;">{{__('fullname : ')}}<span style="text-transform: capitalize;">{{$fullorder->fullname}}</span>
        <hr style="margin-bottom:0;margin-top:0">
        <span style="margin-top:0">{{__('I kindly request you to transfer my membership from your branch of the Syndicate branch in the country: ')}}{{__($fullorder->country_before)}}
        <br>{{__('To the syndicate branch in the country: ')}}{{__($fullorder->country_after)}}</span>
        <hr style="margin-bottom:0;margin-top:0">
        <span>{{__('That is for the following reasons :')}}</span>
        <span>{{$fullorder->transportation_reasons}}</span><br>
        <span>{{__('(Attached are the supporting documents. Change: place of residence - place of work)')}}</span><br>
        {{-- <span>{{__('Request date: ')}} {{ date("Y-m-d h:i A", strtotime($fullorder->created_at))}}</span> --}}
        <div>
            <table style="width:100%;border:none;">
                <tr style="border:none;">
                    <th style="border:none;width:20%">{{__('Request date: ')}}</th>
                    <td style="border:none;;width:2%">{{ date("Y-m-d h:i A", strtotime($fullorder->created_at))}}</td>
                    <th style="border:none;;width:15%"></th>
                    <td style="border:none;width:10%"></td>
                    <th style="border:none;width:30%">{{__('Name and Signature:')}}</th>
                    <td style="border:none;width:20%"></td>
                </tr>
            </table>
           </div>
        <hr style="margin-bottom:0;margin-top:4px">
{{-- بيان الادارة المالية --}}
            <span style="font-weight: bold;margin-top:0">{{__('Financial Management Statement:')}}</span>
            <hr style="margin-bottom:0;margin-top:0">
            {{__('The fellow')}} {{Auth::User()->name}}{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
            {{__('And registered in the Syndicate in year ')}}20{{$fullorder->user->order->created_at->format('y')}}<br>

            @if($fullorder->not_debtor == 0)
                <span>{{__('Financially innocent')}}</span>
            @else
                <span>{{__('It has a previous financial liability')}}{{__('equal ')}}{{ $fullorder->money_debt}}{{__(' SYP')}}</span>
            @endif
            <div>
                <table @if (app()->getLocale() == 'ar') style="width:60%;margin-left:0;border:none;"@else style="width:60%;margin-right:0;border:none;"  @endif>
                    <tr style="border:none;">
                        <th style="border:none;"><pre>{{__(' date:')}}   /    / 201</pre></th>
                        <td style="border:none;"></td>
                    </tr>
                    <tr style="border:none;">
                       <th style="border:none;">{{__("Accountant's name and signature")}}</th>
                       <td style="border:none;"></td>
                    </tr>
                </table>
               </div><br>
{{-- قرار مجلس إدارة الفرع المسجل به --}}
            <hr style="margin-bottom:0;margin-top:0">
            <span style="font-weight: bold;margin-top:0">{{__('Decision of the board of directors of the branch in which it is registered')}}</span>
            <hr style="margin-bottom:0;margin-top:0">
            {{-- {{__('Approval:')}} --}}
            @if($fullorder->registered_branch_decision == 1)
                {{__('Approval')}}
            @else
                {{__('Disapproval')}}
            @endif

            @if($fullorder->registered_branch_decision == 0)
            <p>{{__('reasons :(If not approved)')}}</p>
            <p>{{ $fullorder->registered_branch_disapproval_reasons }}</p>
            @endif
            <div>
                <table  @if (app()->getLocale() == 'ar') style="width:60%;margin-left:0;border:none;"@else style="width:60%;margin-right:0;border:none;" @endif>
                    <tr style="border:none;">
                        <th style="border:none;"><pre>{{__(' date:')}}   /    / 201</pre></th>
                        <td style="border:none;"></td>
                    </tr>
                    <tr style="border:none;">
                       <th style="border:none;">{{__('signature of branch board Chairman')}}</th>
                       <td style="border:none;"></td>
                    </tr>
                </table>
               </div><br>
{{--قرار مجلس إدارة الفرع الراغب بالانتقال إليه --}}
<hr style="margin-bottom:0;margin-top:0">
            <span style="font-weight: bold;margin-top:0">{{__('The decision of the board of directors of the branch wishing to move to it: ')}}</span>
            <hr style="margin-bottom:0;margin-top:0">
            {{-- {{__('Approval:')}} --}}
            @if($fullorder->Chairman_decision == 1)
                {{__('Approval')}}
            @else
                {{__('Disapproval')}}
            @endif

            @if($fullorder->transferred_branch_decision == 0)
                <p for="reasons">{{__('reasons :(If not approved)')}}<br>{{ $fullorder->transferred_branch_disapproval_reasons }}</p>
            @endif
            <div>
                <table  @if (app()->getLocale() == 'ar') style="width:60%;margin-left:0;border:none;" @else style="width:60%;margin-right:0;border:none;"@endif>
                    <tr style="border:none;">
                        <th style="border:none;"><pre>{{__(' date:')}}   /    / 201</pre></th>
                        <td style="border:none;"></td>
                    </tr>
                    <tr style="border:none;">
                       <th style="border:none;">{{__('signature of branch board Chairman')}}</th>
                       <td style="border:none;"></td>
                    </tr>
                </table>
               </div><br>
{{--  بيان أمين الصندوق--}}
            <hr style="margin-bottom:0;margin-top:0">
            <span style="font-weight: bold;margin-top:0">{{__('Treasurer statement: ')}}</span>
            <hr style="margin-bottom:0;margin-top:0">
            <pre>{{__('Amount has been received ')}}{{$fullorder->money_order}}{{__('SYP')}}{{__('(Just ')}}{{$fullorder->money_order}}{{__(' Nothing else)')}}{{__('Receipt No')}}/         /{{__(' date:')}}  /   / 201 {{__('For a membership card fee')}}</pre>
            <div>
                <table style="width:100%;border:none;">
                    <tr style="border:none;">
                        <th style="border:none;width:20%"><pre>{{__(' date:')}}   /    / 201</pre></th>
                        {{-- <td style="border:none;;width:2%"></td> --}}
                        <th style="border:none;;width:15%">{{__('the seal')}}</th>
                        {{-- <td style="border:none;width:10%"></td> --}}
                        <th style="border:none;width:30%">{{__('Name and signature of the treasurer')}}</th>
                        {{-- <td style="border:none;width:20%"></td> --}}
                    </tr>
                </table>
               </div><br>
               <hr style="margin-bottom:0;margin-top:0">
            <p style="font-weight: bold;margin-top:0">{{__('The new membership number in the event that both parties agree to transfer the affiliate')}}
             {{$fullorder->newmembership_number}}</p>
             <p style="text-align: center;font-weight:bold;margin-top:0;font-size: 9px;">{{__('(A copy is kept in the branch to which it is transferred and a copy is sent to the central administration and a copy to the branch it is transferred from)')}}</p>

             @if($fullorder->home_change <> null)
            <pagebreak>
            <div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
                <img src ="{{asset("storage/home_changes/$fullorder->home_change")}}">
            </div>
             @endif
             @if($fullorder->work_change <> null)
             <pagebreak>
            <div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
                <img src ="{{asset("storage/work_changes/$fullorder->work_change")}}">
            </div>
             @endif
    </body>
</html>

