<x-layouts.app>
    <h1 style="text-align: center;font-weight:bold;text-decoration:underline;margin-top:5px;">{{__('Membership transfer form from one branch to another')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <form action="{{ route('fullorders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <input name="type" value="transfer" hidden>
        <p>{{__('Mr. Chairman of the Syndicate Branch Council in the province')}}
            <select style="width:150px"class="input @error('countryfrom')is-danger @enderror"name="countryfrom" id="countryfrom"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                <option value="{{$fullorder->country_before}}" selected readonly>{{$fullorder->country_before}}</option>
            </select>
            @error('countryfrom')
                <p class="help is-danger">{{ $message }}</p>
            @enderror</p>
            <br><hr><br>
            <div class="form-outline">
                <label class="form-label" for="fullname">{{__('fullname* : ')}}</label>
                <input style="width:150px"type="text" class="input @error('fullname')is-danger @enderror" id="fullname" name="fullname" value="{{ old('fullname') }}"class="form-control" placeholder="{{__('Enter FullName')}}" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif/>
                @error('fullname')
                  <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <br><hr><br>
            <p>{{__('I kindly request you to transfer my membership from your branch of the Syndicate branch in the country: ')}}
                <select style="width:150px"class="input @error('countryfrom')is-danger @enderror"name="countryfrom" id="countryfrom"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                    <option value="{{$fullorder->country_before}}" selected readonly>{{$fullorder->country_before}}</option>
                </select>
                @error('countryfrom')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
                <br>{{__('To the syndicate branch in the country: ')}}
                <select style="width:150px"class="input @error('tocountry')is-danger @enderror"name="tocountry" id="tocountry"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                    <option value="{{$fullorder->country_after}}" selected readonly>{{$fullorder->country_after}}</option>
                </select>
            </p>
            <br><hr>
            <div class="form-group">
                <label for="reasons">{{__('That is for the following reasons :')}}</label>
                <textarea name="transportation_reasons"class="form-control" id="reasons" rows="3" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif readonly>{{$fullorder->transportation_reasons}}</textarea>
            </div>
            <p>{{__('Evidences attached')}}</p>
            <div class="mb-3" >
                <label for="formFile" class="form-label" style="font-size: 13px;">{{__('change home image')}}
                <input class="form-control" type="file" accept="image/*" id="change_home" name="change_home" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                @error('change_home')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </label>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label" style="font-size: 13px;">{{__('change work image')}}
                <input class="form-control" type="file" accept="image/*"id="change_work" name="change_work" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                @error('change_work')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </label>
            </div>
            <p>{{__('Request date: ')}} {{ date("Y-m-d h:i A", strtotime($fullorder->created_at))}}</p><hr><br>
            @if(Auth::User()->role == "user")<button type="submit" class="btn btn-primary">{{__('Send')}}</button><br><br>@endif
        </form>
{{-- بيان الدارة المالية --}}
        <form action="{{ route('fullorders.store_order',$fullorder->id) }}" method="POST" >
            @csrf
            <input name="type" value="local" hidden>
            <p style="font-weight: bold;display:inline-block;width:40%">{{__('Financial Management Statement:')}}</p>
            <select name="status"style="display:inline-block;float:right;width:15%;"class="form-select" aria-label="Default select example">
                <option selected>Order Status</option>
                <option value="under consideration">    {{__('under consideration')}}    </option>
                <option value="Payment required">       {{__('Payment required')}}       </option>
                <option value="Please pick up">         {{__('Please pick up')}}         </option>
                <option value="not confirmed">          {{__('not confirmed')}}          </option>
                <option value="Need to complete papers">{{__('Need to complete papers')}}</option>
            </select><br><br>
            <hr>
            <p style="display:inline">{{__('The fellow')}} <span style="font-weight: bold">{{Auth::User()->name}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
                {{__('And registered in the Syndicate in year')}}........</p><br>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="{{0}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
                <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="{{1}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
                <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
                {{__('equal ')}}<input style="width:150px;"type="text" class="input @error('money_debt')is-danger @enderror"id="money_debt" name="money_debt"value="{{ old('money_debt') }}"class="form-control" placeholder="{{__('Enter debt money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}}<br>

            </div><br><br>
{{-- قرار مجلس إدارة الفرع المسجل به --}}
            <hr><br>
            <p style="font-weight: bold;">{{__('Decision of the board of directors of the branch in which it is registered')}}</p><hr><br>
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
                    <textarea name="registered_branch_disapproval_reasons"class="form-control" id="reasons" rows="3" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif></textarea>
                </div>
            </div>
{{--قرار مجلس إدارة الفرع الراغب بالانتقال إليه --}}
            <hr><br>
            <p style="font-weight: bold;">{{__('The decision of the board of directors of the branch wishing to move to it: ')}}</p><hr><br>
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
                    <textarea name="transferred_branch_disapproval_reasons"class="form-control" id="reasons" rows="3" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif></textarea>
                </div>
            </div>
{{--  بيان أمين الصندوق--}}
        <hr><br>
        <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p><hr><br>
        <p>{{__('Amount has been received ')}}<input style="width:170px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}} {{__('For a membership card fee')}}</p><br>
        <hr><br><p style="font-weight: bold;">{{__('The new membership number in the event that both parties agree to transfer the affiliate')}}
            <input style="width:200px;"type="text" class="input @error('newmembership_number')is-danger @enderror"id="newmembership_number" name="newmembership_number"value="{{ old('newmembership_number') }}"class="form-control" placeholder="{{__('Enter new membership number')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/></p><br>
            @if(Auth::User()->role == "admin")<button type="submit" class="btn btn-primary">{{__('Send')}}</button><br><br>@endif
        </form>
    </div>

</x-layouts.app>

{{-- {{Auth::User()->name}} --}}

