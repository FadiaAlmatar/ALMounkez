<x-layouts.app>
    <h1 style="text-align: center;font-weight:bold;text-decoration:underline;margin-top:5px;">{{__('Request an external membership document')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <form action="{{ route('fullorders.store') }}" method="POST" >
            @csrf
            <input name="type" value="external" hidden>
            <strong style="font-size:13px;">{{__('(Implementation of the decision of the Board of Directors in its session No. /4/ held on the date 28/01/2016 containing the determination of the amount 1000 SYP of the value of a membership document)')}}</strong><br><br>
            <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership document stating that I am a registered member of the Syndicate')}}<br><br>{{__('to submit it to')}}
            @if(Auth::User()->role == "user")
            <input style="width:150px;"type="text" class="input @error('side')is-danger @enderror"id="side" name="side"value="{{ old('side') }}"class="form-control" placeholder="{{__('Enter side name')}}" /></p><br>
            @else
            <input style="width:150px;"type="text" class="input @error('side')is-danger @enderror"id="side" name="side"value="{{ old('side') }}"class="form-control" placeholder="{{__('Enter side name')}}" disabled/></p><br>
            @endif
{{-- membership only --}}
            <table class="table table-bordered">
            <thead>
                 <tr>
                    <th scope="col">{{__('User ID')}}</th>
                    <th scope="col" >{{__('Membership ID')}}</th>
                    <th scope="col">{{__('Request Date')}}</th>
                </tr>
            </thead>
            </table> @if(Auth::User()->role == "user")<button type="submit" class="btn btn-primary">{{__('Send')}}</button><br><br>@endif
        </form>
        <p style="text-align:center;">{{__('Your request will be studied and notified when it is completed')}}</p>
        <hr><br>
{{-- admin only --}}
{{--  بيان الدارة الماليةللفرع --}}
        <p style="font-weight: bold;">{{__('Branch financial management statement:')}}</p><hr>
        <p style="display:inline">{{__('Mr.')}} <span style="font-weight: bold">{{Auth::User()->name}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
            {{__('We inform you that he is registered in the Syndicate in year ...... and : ')}}</p>&nbsp;
        <div class="form-check form-check-inline">
            @if(Auth::User()->role == "user")
            <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="option1" disabled>
            @else
            <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="option1" >
            @endif
            <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
        </div>
        <div class="form-check form-check-inline">
            @if(Auth::User()->role == "user")
            <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="option2" disabled>
            @else
            <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="option2" >
            @endif
            <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
        </div><br><br>
        <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}
            @if(Auth::User()->role == "user")
            <input style="width:150px;"type="text" class="input @error('money_debt')is-danger @enderror"id="money_debt" name="money_debt"value="{{ old('money_debt') }}"class="form-control" placeholder="{{__('Enter debt money')}}" disabled/>{{__('SYP')}}</p><br>
           @else
           <input style="width:150px;"type="text" class="input @error('money_debt')is-danger @enderror"id="money_debt" name="money_debt"value="{{ old('money_debt') }}"class="form-control" placeholder="{{__('Enter debt money')}}"/>{{__('SYP')}}</p><br>
           @endif
{{--  بيان أمين الصندوق الفرع--}}
        <hr><br>
        <p style="font-weight: bold;">{{__('Branch Treasurer Statement: ')}}<span style="font-size:13px">{{__('(Note: Only the unpaid subscription fee is received, but the document fee is paid to the central administration)')}}</span></p><hr>
        <br><p>{{__('Amount has been received ')}}
            @if(Auth::User()->role == "user")
            <input style="width:150px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" disabled/>{{__(' SYP')}}</p><br>
            @else
            <input style="width:150px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}"/>{{__(' SYP')}}</p><br>
            @endif
{{-- بيان أمين الصندوق  /المركزية --}}
        <hr><br>
        <p style="font-weight: bold;">{{__('Treasurer Statement/central: ')}}<span style="font-size:13px">{{__('Only the document amount is received')}}</span></p><hr>
        <br><p>{{__('Amount has been received ')}}
            @if(Auth::User()->role == "user")
            <input style="width:150px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" disabled/>{{__(' SYP')}}</p><br>
            @else
            <input style="width:150px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}"/>{{__(' SYP')}}</p><br>
            @endif
{{-- قرار رئيس مجلس الإدارة --}}
        <hr><br>
        <p style="font-weight: bold;">{{__("Chairman's decision: ")}}</p><hr><br>
        <div>
            <label style="display:inline;width:70%;"class="form-label" for="approval">{{__('Approval')}}</label>
            @if(Auth::User()->role == "user")
            <select style="width:10%"class="input @error('approval')is-danger @enderror"name="approval"id="approval"class="form-select form-select-sm" aria-label=".form-select-sm example" disabled>
                <option></option>
                <option value="1" @if (old('approval') == "1") {{ 'selected' }} @endif>{{__('Approval')}}</option>
                <option value="0" @if (old('approval') == "0") {{ 'selected' }} @endif>{{__('Disapproval')}} </option>
             </select>
             @else
             <select style="width:10%"class="input @error('approval')is-danger @enderror"name="approval"id="approval"class="form-select form-select-sm" aria-label=".form-select-sm example" >
                <option></option>
                <option value="1" @if (old('approval') == "1") {{ 'selected' }} @endif>{{__('Approval')}}</option>
                <option value="0" @if (old('approval') == "0") {{ 'selected' }} @endif>{{__('Disapproval')}} </option>
             </select>
             @endif
             @error('approval')
               <p class="help is-danger">{{ $message }}</p>
             @enderror
             <div class="form-group">
                <label for="reasons">{{__('reasons :(If not approved)')}}</label>
                @if(Auth::User()->role == "user")
                <textarea class="form-control" id="reasons" rows="2" disabled></textarea><br>
                @else
                <textarea class="form-control" id="reasons" rows="2"></textarea><br>
                @endif
            </div>
        </div>
        @if(Auth::User()->role == "admin")<button type="submit" class="btn btn-primary">{{__('Send')}}</button><br><br>@endif
    </div>
</x-layouts.app>

{{-- {{Auth::User()->name}} --}}
