<x-app-layout>
    <h1 style="text-align: center;font-weight:bold;text-decoration:underline;margin-top:5px;">{{__('Request a local membership document')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <form action="{!! !empty($fullorder) ? route('fullorders.update', $fullorder) : route('fullorders.store') !!}" method="POST" >
            @csrf
            @if (!empty($fullorder))
                @method('PUT')
            @endif
        <input name="type" value="local" hidden>
        <strong style="font-size:13px;">{{__('(Implementation of the decision of the Board of Directors in its session No. 41 held on the date 17/07/2016 containing the determination of the amount 200 SYP of the value of a membership document)')}}</strong><br><br>
        <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership document stating that I am a registered member of the Syndicate')}}<br><br>{{__('to submit it to')}}
        <input style="width:150px;"type="text" class="input @error('side')is-danger @enderror"id="side" name="side" value= "@if(!empty($fullorder)) {{$fullorder->side}} @else {{ old('side') }} @endif" class="form-control" placeholder="{{__('Enter side name')}}" />
        @error('side')
        <p class="help is-danger">{{ $message }}</p>
        @enderror</p><br>
{{-- membership only --}}
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">{{__('User ID')}}</th>
                <th scope="col" >{{__('Membership ID')}}</th>
                <th scope="col">{{__('Request Date')}}</th>
            </tr>
        </thead>
        </table>
        @if (!empty($fullorder))
            <button type="submit" class="btn btn-primary">{{__('Edit')}}</button><br>
        @else
            <button type="submit" class="btn btn-primary">{{__('Create')}}</button><br>
        @endif
        </form>
        <p style="text-align:center;font-size:13px;font-weight:bold;">{{__('Your request will be considered within a maximum period of two days. Please contact us')}}</p>
        <hr style="width:50%;margin:auto"><br>
{{-- admin only --}}
{{-- ???????? ?????????????? ?????????????? --}}
        <p style="font-weight: bold;">{{__('Financial Management Statement:')}}</p><hr>
        <p style="display:inline">{{__('Mr.')}} <span style="font-weight: bold">{{Auth::User()->name}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
            {{__('We inform you that he is registered in the Syndicate in year 20')}}{{Auth::User()->order->created_at->format('y')}} {{__('and : ')}}</p>&nbsp;
        <div class="form-check">
            <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="option1" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
            <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="option2" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
            <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}} </label>
                {{__('equal ')}}<input style="width:150px;"type="text" class="input @error('money_debt')is-danger @enderror"id="money_debt" name="money_debt"value="{{ old('money_debt') }}"class="form-control" placeholder="{{__('Enter debt money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}}<br>
           </div><br>
         <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}
               <input style="width:150px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}}</p>
{{--  ???????? ???????? ??????????????--}}
        <hr>
        <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p>
           <p>{{__('Amount has been received ')}}<input style="width:150px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}}</p>
{{-- ???????? ???????? ???????? ?????????????? --}}
        <hr>
        <p style="font-weight: bold;">{{__("Chairman's decision: ")}}</p>
        <div>
            <label style="display:inline;width:70%;"class="form-label" for="approval">{{__('Approval')}}</label>
            <select style="width:10%"class="input @error('Chairman_decision')is-danger @enderror"name="Chairman_decision"id="Chairman_decision"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
                <option></option>
                <option value="1" @if (old('Chairman_decision') == "1") {{ 'selected' }} @endif>{{__('Approval')}}</option>
                <option value="0" @if (old('Chairman_decision') == "0") {{ 'selected' }} @endif>{{__('Disapproval')}} </option>
             </select>
             @error('Chairman_decision')
               <p class="help is-danger">{{ $message }}</p>
             @enderror
             <div class="form-group">
                <label for="reasons">{{__('reasons :(If not approved)')}}</label>
                <textarea name="Chairman_disapproval_reasons"class="form-control" id="reasons" rows="2" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif></textarea><br>
            </div>
        </div>
    </div>
</x-app-layout>



