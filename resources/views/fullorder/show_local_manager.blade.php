<x-app-layout>
    <br>
    <h1 class="h1-fullorder">{{__('Request a local membership document')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <strong style="font-size:13px;">{{__('(Implementation of the decision of the Board of Directors in its session No. 41 held on the date 17/07/2016 containing the determination of the amount 200 SYP of the value of a membership document)')}}</strong><br><br>
        <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership document stating that I am a registered member of the Syndicate')}}<br><br>{{__('to submit it to')}}
        <input type="text" class="input input-fullorder"id="side" name="side"value="{{ $fullorder->side }}"class="form-control" placeholder="enter side name" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif readonly/>
        @if(Auth::User()->role == "admin")
        <a href="{{route('fullorders.print',$fullorder->id)}}" id="print"class="btn btn-danger btn-md active" role="button" aria-pressed="true">PDF</a>
        @endif</p>
        <table style="width:75%;"class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">{{__('User ID')}}</th>
                <th scope="col" >{{__('Membership ID')}}</th>
                <th scope="col">{{__('Request Date')}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width:24%"><input type="text" class="input input-fullorder"id="" name=""value="{{ Auth::User()->id}}"class="form-control" placeholder="" readonly/></p></td>
                <td style="width:24%"><input type="text" class="input input-fullorder"id="" name=""value="{{$fullorder->membership_id}}"class="form-control" placeholder="" readonly/></td>
                <td style="width:24%"><input type="text" class="input input-fullorder"id="" name=""value="{{ date("Y-m-d h:i A", strtotime($fullorder->created_at))}}"class="form-control" placeholder="" readonly /></td>
            </tr>
        </tbody>
        </table>
        <p style="text-align:center;font-size:13px;font-weight:bold;">{{__('Your request will be considered within a maximum period of two days. Please contact us')}}</p>
        <hr style="width:50%;margin:auto">
       {{-- ???????? ???????????? ?????????????? --}}
            <input name="type" value="local" hidden>
            <p style="font-weight: bold;display:inline-block;width:20%">{{__('Financial Management Statement:')}}</p>
            <div class="status" style="width:30%;">
                <p style="color:red"value="{{$fullorder->status}}">{{__('Order Status')}}: {{__($fullorder->status)}} </p>
            </div>
           <br>
            <p style="display:inline">{{__('Mr.')}} <span style="font-weight: bold">{{$fullorder->fullname}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
                {{__('We inform you that he is registered in the Syndicate in year 20')}}{{$fullorder->user->order->created_at->format('y')}} {{__('and : ')}}</p>&nbsp;
            @if($fullorder->not_debtor == 0)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="{{$fullorder->not_debtor}}" disabled checked>
                <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
            </div>
            @else
            <div class="form-check"><br>
                <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="{{$fullorder->not_debtor}}" disabled checked>
                <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
                {{__('equal ')}}
                <input type="text" class="input input-fullorder"id="money_debt" name="money_debt"  value="{{ $fullorder->money_debt}}"  class="form-control" placeholder="{{__('Enter debt money')}}" disabled />{{__(' SYP')}}<br>
            </div>@endif<br>
            <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}<input type="text" class="input input-fullorder"id="money_order" name="money_order"  value="{{ $fullorder->money_order}}"  class="form-control" placeholder="{{__('Enter order money')}}" disabled/>{{__(' SYP')}}</p>
    {{--  ???????? ???????? ??????????????--}}
            <hr>
            <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p>
            <p>{{__('Amount has been received ')}}
                <input type="text" class="input input-fullorder"id="money_order" name="money_order"  value="{{ $fullorder->money_order}}"  class="form-control" placeholder="{{__('Enter order money')}}" disabled/>{{__(' SYP')}}</p>
    {{-- ???????? ???????? ???????? ?????????????? --}}
            <hr>
            <p style="font-weight: bold;">{{__("Chairman's decision")}}{{__(':')}}</p>
            <div>
                <label style="display:inline;width:70%;"class="form-label" for="approval">{{__('Approval')}}</label>
                <select style="width:10%"class="input"name="Chairman_decision"id="Chairman_decision"class="form-select form-select-sm" aria-label=".form-select-sm example"  disabled >
                    @if($fullorder->Chairman_decision == 1)
                    <option value="{{ $fullorder->Chairman_decision}}">{{__('Approval')}}</option>
                    @else
                    <option value="{{ $fullorder->Chairman_decision}}">{{__('Disapproval')}}</option>
                    @endif
                </select>
                @if($fullorder->Chairman_decision == 0)
             <div class="form-group">
                <label for="reasons">{{__('reasons :(If not approved)')}}</label>
                <textarea name="Chairman_disapproval_reasons"class="form-control" id="reasons" rows="2" disabled>{{ $fullorder->Chairman_disapproval_reasons }}</textarea><br>
            </div>
                 @endif
                 <br><br>
            </div>
    </div>
</x-app-layout>



