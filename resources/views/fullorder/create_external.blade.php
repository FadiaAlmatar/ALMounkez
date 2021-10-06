<x-layouts.app>
    <h1 style="text-align: center;font-weight:bold;text-decoration:underline;margin-top:5px;">{{__('Request an external membership document')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <form action="{{ route('fullorders.store') }}" method="POST" >
            @csrf
            <input name="type" value="external" hidden>
            <strong style="font-size:13px;">{{__('(Implementation of the decision of the Board of Directors in its session No. /4/ held on the date 28/01/2016 containing the determination of the amount 1000 SYP of the value of a membership document)')}}</strong><br><br>
            <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership document stating that I am a registered member of the Syndicate')}}<br><br>{{__('to submit it to')}}
             <input style="width:150px;"type="text" class="input @error('side')is-danger @enderror"id="side" name="side"value="{{ old('side') }}"class="form-control" placeholder="{{__('Enter side name')}}" /></p><br>
{{-- membership only --}}
            <table class="table table-bordered">
            <thead>
                 <tr>
                    <th scope="col">{{__('User ID')}}</th>
                    <th scope="col" >{{__('Membership ID')}}</th>
                    <th scope="col">{{__('Request Date')}}</th>
                </tr>
            </thead>
            </table> <button type="submit" class="btn btn-primary">{{__('Send')}}</button><br><br>
        </form>
        <p style="text-align:center;">{{__('Your request will be studied and notified when it is completed')}}</p>
        <hr><br>
{{-- admin only --}}
{{--  بيان الدارة الماليةللفرع --}}
@if(Auth::User()->role == "user")
        <p style="font-weight: bold;">{{__('Branch financial management statement:')}}</p><hr>
        <p style="display:inline">{{__('Mr.')}} <span style="font-weight: bold">{{Auth::User()->name}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
            {{__('We inform you that he is registered in the Syndicate in year ...... and : ')}}</p>&nbsp;
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="option1" disabled>
            <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="option2" disabled>
            <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
        </div><br><br>
        <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}<input style="width:150px;"type="text" class="input @error('money_debt')is-danger @enderror"id="money_debt" name="money_debt"value="{{ old('money_debt') }}"class="form-control" placeholder="{{__('Enter debt money')}}" disabled/>{{__('SYP')}}</p><br>
{{--  بيان أمين الصندوق الفرع--}}
        <hr><br>
        <p style="font-weight: bold;">{{__('Branch Treasurer Statement: ')}}<span style="font-size:13px">{{__('(Note: Only the unpaid subscription fee is received, but the document fee is paid to the central administration)')}}</span></p><hr>
        <br><p>{{__('Amount has been received ')}}<input style="width:150px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" disabled/>{{__(' SYP')}}</p><br>

{{-- بيان أمين الصندوق  /المركزية --}}
        <hr><br>
        <p style="font-weight: bold;">{{__('Treasurer Statement/central: ')}}<span style="font-size:13px">{{__('Only the document amount is received')}}</span></p><hr>
        <br><p>{{__('Amount has been received ')}}<input style="width:150px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" disabled/>{{__(' SYP')}}</p><br>
{{-- قرار رئيس مجلس الإدارة --}}
        <hr><br>
        <p style="font-weight: bold;">{{__("Chairman's decision: ")}}</p><hr><br>
        <textarea class="form-control" id="reasons" rows="3" disabled></textarea><hr><br><br>

        @endif
    </div>
</x-layouts.app>

{{-- {{Auth::User()->name}} --}}
