<x-layouts.app>
    <h1 style="text-align: center;font-weight:bold;text-decoration:underline;margin-top:5px;">{{__('Request a local membership document')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <form action="{{ route('fullorders.store') }}" method="POST" >
            @csrf
        <input name="type" value="local" hidden>
        <strong style="font-size:13px;">{{__('(Implementation of the decision of the Board of Directors in its session No. 41 held on the date 17/07/2016 containing the determination of the amount 200 SYP of the value of a membership document)')}}</strong><br><br>
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
        <p style="text-align:center;">{{__('Your request will be considered within a maximum period of two days. Please contact us')}}</p>
        <hr><br>
{{-- admin only --}}
{{-- بيان الدارة المالية --}}
    @if(Auth::User()->role == "user")
        <p style="font-weight: bold;">{{__('Financial Management Statement:')}}</p><hr>
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
         <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}<input style="width:150px;"type="text" class="input @error('money_debt')is-danger @enderror"id="money_debt" name="money_debt"value="{{ old('money_debt') }}"class="form-control" placeholder="{{__('Enter debt money')}}" disabled/>{{__(' SYP')}}</p><br>
{{--  بيان أمين الصندوق--}}
        <hr><br>
        <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p><hr><br>
        <p>{{__('Amount has been received ')}}<input style="width:150px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" disabled/>{{__(' SYP')}}</p><br><br>
{{-- قرار رئيس مجلس الإدارة --}}
        <hr><br>
        <p style="font-weight: bold;">{{__("Chairman's decision: ")}}</p><br>
        {{-- <textarea class="form-control" id="reasons" rows="3" disabled></textarea><hr><br><br> --}}
        <div>
            <label style="display:inline;width:70%;"class="form-label" for="approval">{{__('Approval')}}</label>
            <select style="width:10%"class="input @error('approval')is-danger @enderror"name="approval"id="approval"class="form-select form-select-sm" aria-label=".form-select-sm example" disabled>
                <option></option>
                <option value="1" @if (old('approval') == "1") {{ 'selected' }} @endif>{{__('Approval')}}</option>
                <option value="0" @if (old('approval') == "0") {{ 'selected' }} @endif>{{__('Disapproval')}} </option>
             </select>
             @error('displayData')
               <p class="help is-danger">{{ $message }}</p>
             @enderror
             <div class="form-group">
                <label for="reasons">{{__('reasons :(If not approved)')}}</label>
                <textarea class="form-control" id="reasons" rows="2" disabled></textarea><br>
            </div>
        </div>
        @endif
    </div>
</x-layouts.app>


   {{-- <tbody>
            <tr>
                <td style="width:24%"><input type="text" class="input"id="" name=""value=""class="form-control" placeholder="" readonly/></p></td>
                <td style="width:24%"><input type="text" class="input"id="" name=""value=""class="form-control" placeholder="" readonly/></td>
                <td style="width:24%"><input type="text" class="input"id="" name=""value=""class="form-control" placeholder="" readonly /></td>
                {{-- <td style="width:24%">{{__('')}}</td> --}}
            {{-- </tr>
        </tbody>  --}}
                {{-- style="width:100%;border: 1px solid black;border-collapse: collapse;border-spacing: 0;" --}}
        {{-- style=" border-left: 1px solid #000; border-right: 1px solid #000;" --}}

                        {{-- <th scope="col">{{__('User Signature')}}</th> --}}

                           {{-- <select style="width:150px;display:inline-block"name="debt"id="debt"class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option></option>
            <option value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</option>
            <option value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</option>
        </select> --}}

        {{-- <input style="width:150px;"type="text" class="input @error('')is-danger @enderror"id="" name=""value="" class="form-control form-control-sm" placeholder="" /> --}}

