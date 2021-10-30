<x-layouts.app>
    <br>
    <h1 class="h1-fullorder">{{__('Membership transfer form from one branch to another')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <form action="{{ route('fullorders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <input name="type" value="transfer" hidden>
        <p>{{__('Mr. Chairman of the Syndicate Branch Council in the province')}}
            <select style="width:150px"class="input @error('countryfrom')is-danger @enderror"name="countryfrom" id="countryfrom"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                <option value="{{$fullorder->country_before}}" selected readonly>{{$fullorder->country_before}}</option>
            </select>
            @if(Auth::User()->role == "admin")
            <a href="{{route('fullorders.print',$fullorder->id)}}" id="print"class="btn btn-danger btn-md active" role="button" aria-pressed="true">PDF</a>
           @endif</p>
        </p>
            <div class="form-outline">
                <label class="form-label" for="fullname">{{__('fullname* : ')}}</label>
                <input type="text" class="input @error('fullname')is-danger @enderror input-fullorder" id="fullname" name="fullname" value="{{$fullorder->fullname}}"class="form-control" placeholder="{{__('Enter FullName')}}" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif/>
            </div>
            <hr>
            <p>{{__('I kindly request you to transfer my membership from your branch of the Syndicate branch in the country: ')}}
                <select style="width:150px"class="input @error('countryfrom')is-danger @enderror"name="countryfrom" id="countryfrom"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                    <option value="{{$fullorder->country_before}}" selected readonly>{{$fullorder->country_before}}</option>
                </select>
                <br>{{__('To the syndicate branch in the country: ')}}
                <select style="width:150px"class="input @error('tocountry')is-danger @enderror"name="tocountry" id="tocountry"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                    <option value="{{$fullorder->country_after}}" selected readonly>{{$fullorder->country_after}}</option>
                </select>
            </p>
            <hr>
            <div class="form-group">
                <label for="reasons">{{__('That is for the following reasons :')}}</label>
                <textarea name="transportation_reasons"class="form-control" id="reasons" rows="3" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif readonly>{{$fullorder->transportation_reasons}}</textarea>
            </div>
            {{-- <p>{{__('Evidences attached')}}</p>
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
            </div> --}}
            <p>{{__('Request date: ')}} {{ date("Y-m-d h:i A", strtotime($fullorder->created_at))}}</p><hr>
        </form>
{{-- بيان الدارة المالية --}}
            <input name="type" value="transfer" hidden>
            <p style="font-weight: bold;display:inline-block;width:20%;">{{__('Financial Management Statement:')}}</p>
                <div class="status" style="width:30%;">
                    <p style="color:red;"value="{{$fullorder->status}}">{{__('Order Status')}}: {{$fullorder->status}} </p>
                </div>
               <br>
            <p style="display:inline">{{__('The fellow')}} <span style="font-weight: bold">{{Auth::User()->name}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
                {{__('And registered in the Syndicate in year 20')}}{{Auth::User()->order->created_at->format('y')}}</p><br>
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
                </div>@endif
{{-- قرار مجلس إدارة الفرع المسجل به --}}
            <hr>
            <p style="font-weight: bold;">{{__('Decision of the board of directors of the branch in which it is registered')}}</p>
            <div>
                <label style="display:inline;width:70%;"class="form-label" for="approval">{{__('Approval')}}</label>
                <select style="width:10%"class="input @error('registered_branch_decision')is-danger @enderror"name="registered_branch_decision"id="registered_branch_decision"class="form-select form-select-sm" aria-label=".form-select-sm example" disabled>
                    @if($fullorder->registered_branch_decision == 1)
                    <option value="{{ $fullorder->registered_branch_decision}}">{{__('Approval')}}</option>
                    @else
                    <option value="{{ $fullorder->registered_branch_decision}}">{{__('Disapproval')}}</option>
                    @endif
                </select>
                 @if($fullorder->registered_branch_decision == 0)
                <div class="form-group">
                   <label for="reasons">{{__('reasons :(If not approved)')}}</label>
                   <textarea name="registered_branch_disapproval_reasons"class="form-control" id="reasons" rows="2" disabled>{{ $fullorder->registered_branch_disapproval_reasons }}</textarea><br>
               </div>
                    @endif
            </div>
{{--قرار مجلس إدارة الفرع الراغب بالانتقال إليه --}}
            <hr>
            <p style="font-weight: bold;">{{__('The decision of the board of directors of the branch wishing to move to it: ')}}</p>
            <div>
                <label style="display:inline;width:70%;"class="form-label" for="approval">{{__('Approval')}}</label>
                <select style="width:10%"class="input @error('transferred_branch_decision')is-danger @enderror"name="transferred_branch_decision"id="transferred_branch_decision"class="form-select form-select-sm" aria-label=".form-select-sm example" disabled>
                    @if($fullorder->Chairman_decision == 1)
                    <option value="{{ $fullorder->transferred_branch_decision}}">{{__('Approval')}}</option>
                    @else
                    <option value="{{ $fullorder->transferred_branch_decision}}">{{__('Disapproval')}}</option>
                    @endif
                </select>
                @if($fullorder->transferred_branch_decision == 0)
                <div class="form-group">
                   <label for="reasons">{{__('reasons :(If not approved)')}}</label>
                   <textarea name="transferred_branch_disapproval_reasons"class="form-control" id="reasons" rows="2" disabled>{{ $fullorder->transferred_branch_disapproval_reasons }}</textarea><br>
               </div>
                    @endif
            </div>
{{--  بيان أمين الصندوق--}}
            <hr>
            <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p>
            <p>{{__('Amount has been received ')}}<input type="text" class="input @error('money_order')is-danger @enderror input-fullorder"id="money_order" name="money_order"value="{{ $fullorder->money_order}}"class="form-control" placeholder="{{__('Enter order money')}}" disabled/>{{__(' SYP')}} {{__('For a membership card fee')}}</p>
            <hr><p style="font-weight: bold;">{{__('The new membership number in the event that both parties agree to transfer the affiliate')}}
                <input type="text" class="input @error('newmembership_number')is-danger @enderror input-fullorder"id="newmembership_number" name="newmembership_number"value="{{$fullorder->newmembership_number}}"class="form-control" placeholder="{{__('Enter new membership number')}}" disabled/></p>
    </div>

</x-layouts.app>

{{-- {{Auth::User()->name}} --}}

