<x-layouts.app>
    <br>
    <h1 class="h1-fullorder">{{__('Membership transfer form from one branch to another')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        {{-- <form action="{{ route('fullorders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf --}}
        <input name="type" value="transfer" hidden>
        <p>{{__('Mr. Chairman of the Syndicate Branch Council in the province')}}
            <select style="width:150px"class="input @error('countryfrom')is-danger @enderror"name="countryfrom" id="countryfrom"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                <option value="{{__($fullorder->country_before)}}" selected readonly>{{__($fullorder->country_before)}}</option>
            </select>
            @error('countryfrom')
                <p class="help is-danger">{{ $message }}</p>
            @enderror</p>
            <div class="form-outline">
                <label class="form-label" for="fullname">{{__('fullname* : ')}}</label>
                <input type="text" class="input @error('fullname')is-danger @enderror input-fullorder" id="fullname" name="fullname" value="{{$fullorder->fullname}}"class="form-control" placeholder="{{__('Enter FullName')}}" disabled />
                @error('fullname')
                  <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <hr>
            <p>{{__('I kindly request you to transfer my membership from your branch of the Syndicate branch in the country: ')}}
                <select style="width:150px"class="input @error('countryfrom')is-danger @enderror"name="countryfrom" id="countryfrom"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                    <option value="{{$fullorder->country_before}}" selected readonly>{{__($fullorder->country_before)}}</option>
                </select>
                @error('countryfrom')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
                <br>{{__('To the syndicate branch in the country: ')}}
                <select style="width:150px"class="input @error('tocountry')is-danger @enderror"name="tocountry" id="tocountry"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                    <option value="{{$fullorder->country_after}}" selected readonly>{{__($fullorder->country_after)}}</option>
                </select>
            </p>
            <hr>
            <div class="form-group">
                <label for="reasons">{{__('That is for the following reasons :')}}</label>
                <textarea name="transportation_reasons"class="form-control" id="reasons" rows="3" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif readonly>{{$fullorder->transportation_reasons}}</textarea>
            </div>
            @if($fullorder->home_change <> null || $fullorder->home_change <> null)
             <p>{{__('Evidences attached')}}</p>
             @if($fullorder->home_change <> null)
            <div class="mb-3" >
                <label for="formFile" class="form-label" style="font-size: 13px;">{{__('change home image')}}
                <a target="_blank" href="{{asset("storage/home_changes/$fullorder->home_change")}}">{{__('Click here to show home change image')}}</a>
                </label>
            </div>
            @endif
            @if($fullorder->work_change <> null)
            <div class="mb-3">
                <label for="formFile" class="form-label" style="font-size: 13px;">{{__('change work image')}}
                <a target="_blank" href="{{asset("storage/work_changes/$fullorder->work_change")}}">{{__('Click here to show work change image')}}</a>
                </label>
            </div>
            @endif
            @endif
            <p>{{__('Request date: ')}} {{ date("Y-m-d h:i A", strtotime($fullorder->created_at))}}</p><hr>
        {{-- </form> --}}
{{-- بيان الدارة المالية --}}
        <form action="{{ route('fullorders.store_order',$fullorder->id) }}" method="POST" >
            @csrf
            <input name="type" value="transfer" hidden>
            <p style="font-weight: bold;display:inline-block;width:40%">{{__('Financial Management Statement:')}}</p>
            <div class="status">
                <label>{{__('order status')}}</label>
                <select name="status"class="input @error('status')is-danger @enderror" class="form-select" aria-label="Default select example" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
                    <option selected></option>
                    <option value="{{__('Payment required')}}" >{{__('Payment required')}} </option>
                    <option  value="{{__('Please pick up')}}">    {{__('Please pick up')}}   </option>
                    <option  value="{{__('not confirmed')}}">      {{__('not confirmed')}}    </option>
                    <option  value="{{__('Need to complete papers')}}" >{{__('Need to complete papers')}}</option>
                    <option  value="{{__('Finished')}}">               {{__('Finished')}}</option>
                    </select>
                @error('status')
                 <p class="help is-danger">{{ $message }}</p>
                @enderror
                </div>
               <br>
            <p style="display:inline">{{__('The fellow')}} <span style="font-weight: bold">{{$fullorder->fullname}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
                {{__('And registered in the Syndicate in year 20')}}{{$fullorder->user->order->created_at->format('y')}}</p><br>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="{{0}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
                <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="{{1}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
                <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
                {{__('equal ')}}<input type="text" class="input @error('money_debt')is-danger @enderror input-fullorder"id="money_debt" name="money_debt"value="{{ old('money_debt') }}"class="form-control" placeholder="{{__('Enter debt money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}}<br>

            </div>
{{-- قرار مجلس إدارة الفرع المسجل به --}}
            <hr>
            <p style="font-weight: bold;">{{__('Decision of the board of directors of the branch in which it is registered')}}</p>
            <div>
                <label style="display:inline;width:70%;"class="form-label" for="approval">{{__('Approval')}}</label>
                <select style="width:10%"class="input @error('registered_branch_decision')is-danger @enderror"name="registered_branch_decision"id="registered_branch_decision"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
                    <option></option>
                    <option value="1" @if (old('registered_branch_decision') == "1") {{ 'selected' }} @endif>{{__('Approval')}}</option>
                    <option value="0" @if (old('registered_branch_decision') == "0") {{ 'selected' }} @endif>{{__('Disapproval')}} </option>
                 </select>
                 @error('registered_branch_decision')
                   <p class="help is-danger">{{ $message }}</p>
                 @enderror
                 <div class="form-group">
                    <label for="reasons">{{__('reasons :(If not approved)')}}</label>
                    <textarea name="registered_branch_disapproval_reasons"class="form-control" id="reasons" rows="3" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>{{ old('registered_branch_disapproval_reasons')}}</textarea>
                </div>
            </div>
{{--قرار مجلس إدارة الفرع الراغب بالانتقال إليه --}}
            <hr>
            <p style="font-weight: bold;">{{__('The decision of the board of directors of the branch wishing to move to it: ')}}</p>
            <div>
                <label style="display:inline;width:70%;"class="form-label" for="approval">{{__('Approval')}}</label>
                <select style="width:10%"class="input @error('transferred_branch_decision')is-danger @enderror"name="transferred_branch_decision"id="transferred_branch_decision"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
                    <option></option>
                    <option value="1" @if (old('transferred_branch_decision') == "1") {{ 'selected' }} @endif>{{__('Approval')}}</option>
                    <option value="0" @if (old('transferred_branch_decision') == "0") {{ 'selected' }} @endif>{{__('Disapproval')}} </option>
                </select>
                 @error('transferred_branch_decision')
                   <p class="help is-danger">{{ $message }}</p>
                 @enderror
                 <div class="form-group">
                    <label for="reasons">{{__('reasons :(If not approved)')}}</label>
                    <textarea name="transferred_branch_disapproval_reasons"  class="form-control" id="reasons" rows="3" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>{{ old('transferred_branch_disapproval_reasons')}}</textarea>
                </div>
            </div>
{{--  بيان أمين الصندوق--}}
        <hr>
        <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p>
        <p>{{__('Amount has been received ')}}<input type="text" class="input @error('money_order')is-danger @enderror input-fullorder"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}} {{__('For a membership card fee')}}</p>
        <hr><p style="font-weight: bold;">{{__('The new membership number in the event that both parties agree to transfer the affiliate')}}
            <input type="text" class="input @error('newmembership_number')is-danger @enderror input-fullorder"id="newmembership_number" name="newmembership_number"value="{{ old('newmembership_number') }}"class="form-control" placeholder="{{__('Enter new membership number')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/></p><br>
            @if(Auth::User()->role == "admin")<button type="submit" class="btn btn-primary">{{__('Send')}}</button><br><br>@endif
        </form>
    </div>
</x-layouts.app>

