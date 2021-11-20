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
            <span>{{__('order No:')}}</span><br>
            <span>{{__('order date:')}}&nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;/ 20</span>
        </div>
        <h1>{{__('Request for a replacement membership card')}}</h1>
        <p style="font-size:11px;font-weight:bold;text-align:center">{{__('Based on decision of the Board of Directors in its session No. 36 held on the date 27/04/2016 containing the determination of the amount 1000 SYP of the value of a membership card:(Consists-Lost)')}}</p>
        <h1 style="font-size:13px;text-align: center;font-weight:bold;background-color:rgb(199, 198, 198);text-decoration:none;">{{__('Filled out by the affiliate')}}</h1>
        <p>
        {{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership card instead: ')}}</p>
            @if($fullorder->replace_reasons == "lost")
                <span>{{__('Lost (police decision attached)')}} </span>
            @elseif($fullorder->replace_reasons == "Modification")
                <span>{{__('Consists (damaged card attached) reason: ')}}</span><br>
                <label id="labelmodification"class="form-check-label" for="Lost">
                      {{__('Modification of personal data')}}</label><br>
                @if($fullorder->judgment_decision_image <> null)<label for="formFile" class="form-label" style="font-size: 13px;">{{__('Judgment decision attached')}}</label>@endif
                @if($fullorder->passport_image <> null)<label for="formFile" class="form-label"style="font-size: 13px;" >{{__('Passport image')}}</label>@endif
                @if($fullorder->personal_identification_image <> null)<label for="formFile" class="form-label"style="font-size: 13px;" >{{__('Personal identification image')}}</label>@endif
            @elseif($fullorder->replace_reasons == "personal")
                <span>{{__('Consists (damaged card attached) reason: ')}}</span><br>
                <label id="labelpersonal"class="form-check-label" for="Consists">{{__('personal image')}}</label>
            @elseif($fullorder->replace_reasons == "transfer")
                <span>{{__('Transfer from branch to branch')}}</span>
            @else
                <span>{{__('Card incoming error')}}{{__('(caused by the member)')}}</span>
            @endif
            <hr style="margin-top:0;margin-bottom:0">
        <p style="font-weight: bold;text-align: center;margin-bottom:0;margin-top:0">{{__('Required modifications to be made on the new membership card')}}</p>
        <table class="table table-bordered">
              <tr>
                <th scope="col" style="width:30%;">{{__('FullName/Arabic')}}</th>
                <td>{{$fullorder->fullname_arabic}}</td>
              </tr>
              <tr>
                <th scope="col">{{__('FullName/English to be placed on the new card')}}</th>
                <td>{{$fullorder->fullname_english }}</td>
              </tr>
              <tr>
                <th scope="col">{{__('Change personal image')}}</th>
              </tr>
              <tr>
                <th scope="col">{{__('The new membership number')}} {{__('when transferring from one branch to another')}}</th>
                <td>{{ $fullorder->newmembership_number }}</td>
              </tr>
          </table>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th scope="col">{{__('User')}}</th>
                <td>{{ Auth::User()->id}}</td>
                <th scope="col" >{{__('Membership ID')}}</th>
                <td>{{$fullorder->membership_id}}</td>
            </tr>
        </tbody>
        </table>
{{--  بيان الدارة الماليةللفرع --}}
    <span style="font-weight: bold;margin-top:0">{{__('Branch financial management statement:')}}</span><hr style="margin-bottom:0;margin-top:0">
    {{__('Mr.')}}{{$fullorder->fullname}}{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}
    {{__('We inform you that he is registered in the Syndicate in year 20')}}{{$fullorder->user->order->created_at->format('y')}}<br> {{__('and : ')}}
    @if($fullorder->not_debtor == 0)
           {{__('Financially innocent')}}
        @else
       {{__('It has a previous financial liability')}}
            {{__('equal ')}}
             {{ $fullorder->money_debt}}{{__(' SYP')}}
        @endif
        @if($fullorder->money_debt <> null && $fullorder->not_debtor == null )
        <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
        {{__('equal ')}}
         {{ $fullorder->money_debt}}{{__(' SYP')}}
      @endif
    <p>{{__('Mr.: The branch treasurer, please collect the amount due from him ')}}{{ $fullorder->money_order}}{{__(' SYP')}}
    <br>{{__('In addition to the membership card replacement fee, the amount of 1000 SP')}}
    </p>
       <div>
        <table  @if (app()->getLocale() == 'ar') style="width:60%;margin-left:0;border:none;"@else style="width:60%;margin-right:0;border:none;"  @endif>
            <tr style="border:none;">
                <th style="border:none;">{{__('Name and signature of the responsible employee')}}</th>
                <td style="border:none;"></td>
            </tr>
        </table>
        </div><br>
        <hr style="margin-top:0;margin-bottom:0">
            <span style="font-weight: bold;margin-top:0">{{__('Treasurer statement: ')}}</span><hr style="margin-bottom:0;margin-top:0">
            <pre>{{__('Amount has been received ')}}{{$fullorder->money_order}}{{__('SYP')}}{{__('(Just ')}}{{$fullorder->money_order}}{{__(' Nothing else)')}}{{__('Receipt No')}}/         /{{__(' date:')}}  /   / 201</pre><br>
            <div>
                <table  style="width:100%;border:none;">
                    <tr style="border:none;">
                        <th style="border:none;width:20%"><pre>{{__(' date:')}}   /    / 201</pre></th>
                        <th style="border:none;;width:15%">{{__('the seal')}}</th>
                        <th style="border:none;width:30%">{{__('Name and signature of the responsible employee')}}</th>
                    </tr>
                </table>
               </div>
               <hr style="margin-top:3;margin-bottom:0">
            <span style="font-weight: bold;margin-top:0">{{__("Chairman's decision")}}{{__(':')}}</span>
                <hr style="margin-bottom:0;margin-top:0">
                @if($fullorder->Chairman_decision == 1)
                    {{__('Approval')}}
                    @else
                    {{__('Disapproval')}}
                @endif

                @if($fullorder->Chairman_decision == 0)
                    <p>{{__('reasons :(If not approved)')}}<br>{{ $fullorder->Chairman_disapproval_reasons }}</p>
                @endif
                <div>
                    <table style="width:100%;border:none;">
                        <tr style="border:none;">
                            <th style="border:none;"><pre>{{__(' date:')}}   /    / 201</pre></th>
                            <td style="border:none;"></td>
                            <th style="border:none;">{{__('Signature')}}</th>
                            <td style="border:none;"></td>
                        </tr>
                    </table>
                   </div>
                   <hr style="margin-bottom:0">
                <p style="font-weight:bold;margin-bottom:0;font-size: 11px;margin-top:0;text-align:center">{{__('Confirmation of the Affiliate Member of Receipt of the Membership card:')}}</p>
                <table class="table table-bordered;border:none;">
                        <tr>
                            <th scope="col">{{__('Card issue date')}}</th>
                            <td style="width:24%"></td>
                            <th scope="col">{{__('issuance of the document date:')}}</th>
                            <td style="width:24%"></td>
                        </tr>
                    <tbody>
                        <tr>
                            <th scope="col" >{{__('Employee name(received from him)')}}</th>
                            <td style="width:24%"></td>
                            <th scope="col" >{{__("Affiliate's signature:")}}</th>
                            <td style="width:24%"></td>
                        </tr>
                    </tbody>
                    </table>
                <p style="text-align: center;font-weight:bold;margin-top:0;font-size: 11px;">{{__('The original is kept in a register of the membership cards replacement at the branch sequentially for each year after receiving it from the central administration, attached to the new membership card')}}</p>

    </div>
    @if($fullorder->police_image <> null)
    <pagebreak>
        <div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
           <img src ="{{asset("storage/police_images/$fullorder->police_image")}}">
        </div>
    @endif
    @if($fullorder->damaged_card_image <> null)
    <pagebreak>
        <div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
            <img src ="{{asset("storage/damaged_card_images/$fullorder->damaged_card_image")}}">
        </div>
    @endif
    @if($fullorder->judgment_decision_image <> null)
    <pagebreak>
        <div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
            <img src ="{{asset("storage/judgment_decision_images/$fullorder->judgment_decision_image")}}">
        </div>
    @endif
    @if($fullorder->passport_image <> null)
    <pagebreak>
        <div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
           <img src ="{{asset("storage/passport_images/$fullorder->passport_image")}}">
        </div>
    @endif
    @if($fullorder->personal_identification_image <> null)
    <pagebreak>
        <div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
           <img src ="{{asset("storage/personal_identification_images/$fullorder->personal_identification_image")}}">
        </div>
    @endif
    @if($fullorder->personal_image <> null)
    <pagebreak>
        <div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
          <img src ="{{asset("storage/personal_images/$fullorder->personal_image")}}">
        </div>
    @endif
    </body>
</html>
