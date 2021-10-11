<x-layouts.app>
    <br>
    <h1 class="h1-fullorder">{{__('Request a local membership document')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <strong style="font-size:13px;">{{__('(Implementation of the decision of the Board of Directors in its session No. 41 held on the date 17/07/2016 containing the determination of the amount 200 SYP of the value of a membership document)')}}</strong><br><br>
        <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership document stating that I am a registered member of the Syndicate')}}<br><br>{{__('to submit it to')}}
        <input type="text" class="input @error('side')is-danger @enderror input-fullorder"id="side" name="side"value="{{ $fullorder->side }}"class="form-control" placeholder="enter side name" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif readonly/></p><br>
       {{-- membership only --}}
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
        <p class="p-fullorder">{{__('Your request will be considered within a maximum period of two days. Please contact us')}}</p>
        <hr><br>
       {{-- بيان الدارة المالية --}}
        <form action="{{ route('fullorders.store_order',$fullorder->id) }}" method="POST" >
            @csrf
            <input name="type" value="local" hidden>
            <p style="font-weight: bold;display:inline-block;width:40%">{{__('Financial Management Statement:')}}</p>
            <div class="status">
            <select name="status"class="input @error('status')is-danger @enderror" class="form-select" aria-label="Default select example">
                <option selected></option>
                <option value="under consideration">    {{__('under consideration')}}    </option>
                <option value="Payment required">       {{__('Payment required')}}       </option>
                <option value="Please pick up">         {{__('Please pick up')}}         </option>
                <option value="not confirmed">          {{__('not confirmed')}}          </option>
                <option value="Need to complete papers">{{__('Need to complete papers')}}</option>
            </select>
            @error('status')
             <p class="help is-danger">{{ $message }}</p>
            @enderror
            </div>
           <br><br>
            <hr style="width:75%">
            <p style="display:inline">{{__('Mr.')}} <span style="font-weight: bold">{{Auth::User()->name}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
                {{__('We inform you that he is registered in the Syndicate in year ...... and : ')}}</p>&nbsp;
            <div class="form-check">
                <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="{{0}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
                <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="{{1}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
                <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
                {{__('equal ')}}<input type="text" class="input @error('money_debt')is-danger @enderror input-fullorder"id="money_debt" name="money_debt" @if(Auth::User()->role == "admin") value="{{ $fullorder->money_debt}}" @endif class="form-control" placeholder="{{__('Enter debt money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}}<br>
            </div><br>
            <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}<input type="text" class="input @error('money_order')is-danger @enderror input-fullorder"id="money_order" name="money_order" @if(Auth::User()->role == "admin") value="{{ $fullorder->money_order}}" @endif class="form-control" placeholder="{{__('Enter debt order')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}}</p><br>
    {{--  بيان أمين الصندوق--}}
            <hr><br>
            <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p><hr><br>
            <p>{{__('Amount has been received ')}}
                <input type="text" class="input @error('money_order')is-danger @enderror input-fullorder"id="money_order" name="money_order" @if(Auth::User()->role == "admin") value="{{ $fullorder->money_order}}" @endif class="form-control" placeholder="{{__('Enter order money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif />{{__(' SYP')}}</p><br><br>
    {{-- قرار رئيس مجلس الإدارة --}}
            <hr><br>
            <p style="font-weight: bold;">{{__("Chairman's decision: ")}}</p><br>
            <div>
                <label style="display:inline;width:70%;"class="form-label" for="approval">{{__('Approval')}}</label>
                <select style="width:10%"class="input @error('Chairman_decision')is-danger @enderror"name="Chairman_decision"id="Chairman_decision"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
                    <option></option>
                    <option value="1" @if (old('Chairman_decision') == "1") {{ 'selected' }} @endif>{{__('Approval')}}</option>
                    <option value="0" @if (old('Chairman_decision') == "0") {{ 'selected' }} @endif>{{__('Disapproval')}} </option>
                    @if(Auth::User()->role == "admin")
                    <option value="{{ $fullorder->Chairman_decision}}" @if (old('Chairman_decision') == "1") {{ 'selected' }} @endif>{{__('Approval')}}</option>
                 @endif
                </select>
                @error('Chairman_decision')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <label for="reasons">{{__('reasons :(If not approved)')}}</label>
                    <textarea name="Chairman_disapproval_reasons"class="form-control" id="reasons" rows="2" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>@if(Auth::User()->role == "admin"){{ $fullorder->Chairman_disapproval_reasons }} @endif</textarea><br>
                </div>
            </div>
                @if(Auth::User()->role == "admin")<button type="submit" class="btn btn-primary">{{__('Send')}}</button><br><br>@endif
        </form>
    </div>
</x-layouts.app>



