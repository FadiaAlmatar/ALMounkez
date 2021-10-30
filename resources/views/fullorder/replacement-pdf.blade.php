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
                direction: rtl;
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
        <h1>{{__('Request for a replacement membership card')}}</h1>
        <p style="font-size:13px;">{{__('Based on decision of the Board of Directors in its session No. 36 held on the date 27/04/2016 containing the determination of the amount 1000 SYP of the value of a membership card:(Consists-Lost)')}}</p>
        <h1 style="text-align: center;font-weight:bold;background-color:rgb(199, 198, 198);text-decoration:none;">{{__('Filled out by the affiliate')}}</h1>
        <p><span style="color:red"> {{__('Order Status: ')}}  {{$fullorder->status}} </span><br>
        {{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership card instead: ')}}</p>
               @if($fullorder->replace_reasons == "lost")
               <input  type="checkbox"  checked="checked">
               <span>{{__('Lost (police decision attached)')}}
                <input class="form-control" type="file" accept="image/*"id="police_image" name="police_image" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
               </span>
            @elseif($fullorder->replace_reasons == "consists")
                   <input  type="checkbox"  checked="checked">
                    <span>{{__('Consists (damaged card attached) reason: ')}}
                  <input class="form-control" type="file" accept="image/*"id="damaged_card_image" name="damaged_card_image" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                </span>
                <input  type="checkbox"  checked="checked">                    <label id="labelmodification"class="form-check-label" for="Lost">
                      {{__('Modification of personal data')}}
                       <label for="formFile" class="form-label" style="font-size: 13px;">{{__('Judgment decision attached')}}</label>
                       <input class="form-control" type="file" accept="image/*"id="judgment_decision_image" name="judgment_decision_image" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                        <label for="formFile" class="form-label"style="font-size: 13px;" >{{__('Passport image')}}</label>
                        <input class="form-control" type="file" accept="image/*"id="passport_image" name="passport_image" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                        <label for="formFile" class="form-label"style="font-size: 13px;" >{{__('Personal identification image')}}</label>
                        <input class="form-control" type="file" accept="image/*"id="personal_identification_image" name="personal_identification_image" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                    <input type="checkbox" value="" id="personal" name="Consists" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                    <label id="labelpersonal"class="form-check-label" for="Consists">
                      {{__('personal image')}}
                </div>
            </div>
            @elseif($fullorder->replace_reasons == "transfer")
                <input  type="checkbox"  checked="checked">
                <span>{{__('Transfer from branch to branch')}}</span>
            @else
                <input type="checkbox"  checked="checked">
                <span>{{__('Card incoming error')}}{{__('(caused by the member)')}}</span>
                </label>
            @endif
        {{-- التعديلات المطلوب وضعها على بطاقة العضوية الجديدة --}}
        <p style="font-weight: bold;text-align: center;">{{__('Required modifications to be made on the new membership card')}}</p>
        <table class="table table-bordered">
              <tr>
                <th scope="col" style="width:30%">{{__('FullName/Arabic')}}</th>
                <td>{{$fullorder->fullname_arabic}}</td>
              </tr>
              <tr>
                <th scope="col">{{__('FullName/English to be placed on the new card')}}</th>
                <td>{{$fullorder->fullname_english }}</td>
              </tr>
              <tr>
                <th scope="col">{{__('Change personal image')}}</th>
                <td>
                    {{-- <div class="mb-3">
                      <input class="form-control" type="file" accept="image/*"id="personal_image" name="personal_image" disabled>
                  </div> --}}
                </td>
              </tr>
              <tr>
                <th scope="col">{{__('The new membership number')}} {{__('when transferring from one branch to another')}}</th>
                <td>{{ $fullorder->newmembership_number }}</td>
              </tr>
          </table>
          <br>
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
{{--  بيان الدارة الماليةللفرع --}}
    <p><span style="font-weight: bold">{{__('Branch financial management statement:')}}</span><br>
    {{__('Mr.')}}{{Auth::User()->name}}{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}
    {{__('We inform you that he is registered in the Syndicate in year 20')}}{{Auth::User()->order->created_at->format('y')}} {{__('and : ')}}</p>
        @if($fullorder->not_debtor == 0)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="{{$fullorder->not_debtor}}" disabled checked>
            <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
        </div>
        @else
            <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="{{$fullorder->not_debtor}}" disabled checked>
            <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
            {{__('equal ')}}
             {{ $fullorder->money_debt}}{{__(' SYP')}}
        </div>@endif
    <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}
       {{ $fullorder->money_order}}{{__(' SYP')}}</p>
{{--  بيان أمين الصندوق--}}
            <hr>
            <p><span style="font-weight: bold;">{{__('Treasurer statement: ')}}</span><br>
            {{__('Amount has been received ')}}{{ $fullorder->money_order }}{{__(' SYP')}}</p>
{{-- قرار رئيس مجلس الإدارة --}}
            <hr>
            <p><span style="font-weight: bold;">{{__("Chairman's decision")}}{{__(':')}}</span><br>
            {{__('Approval')}}
                @if($fullorder->Chairman_decision == 1)
                    {{__('Approval')}}
                    @else
                    {{__('Disapproval')}}
                @endif
            </p>
                @if($fullorder->Chairman_decision == 0)
                    <p>{{__('reasons :(If not approved)')}}</p>
                    <p>{{ $fullorder->Chairman_disapproval_reasons }}</p>
                @endif
    </div>
    </body>
</html>
