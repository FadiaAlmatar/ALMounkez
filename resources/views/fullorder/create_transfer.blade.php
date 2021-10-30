<x-layouts.app>
    <h1 style="text-align: center;font-weight:bold;text-decoration:underline;margin-top:5px;">{{__('Membership transfer form from one branch to another')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <form action="{!! !empty($fullorder) ? route('fullorders.update', $fullorder) : route('fullorders.store') !!}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (!empty($fullorder))
                @method('PUT')
            @endif
        <input name="type" value="transfer" hidden>
        <p>{{__('Mr. Chairman of the Syndicate Branch Council in the province')}}
            <select style="width:150px"class="input @error('from_country')is-danger @enderror"name="from_country" id="from_country"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                    @if (!empty($fullorder) && old('from_country', $fullorder->country_before))
                        <option value="{{ $fullorder->country_before }}" selected> {{ $fullorder->country_before }}</option>
                    @endif
                <option></option>
                <option value="Damascus"       @if (old('from_country') == "Damascus") {{ 'selected' }} @endif>       {{__('Damascus')}}      </option>
                <option value="Damascus Rural" @if (old('from_country') == "Damascus Rural") {{ 'selected' }} @endif> {{__('Damascus Rural')}}</option>
                <option value="Suwayda"        @if (old('from_country') == "Suwayda") {{ 'selected' }} @endif>        {{__('Suwayda')}}       </option>
                <option value="Daraa"          @if (old('from_country') == "Daraa") {{ 'selected' }} @endif>          {{__('Daraa')}}         </option>
                <option value="Quneitra"       @if (old('from_country') == "Quneitra") {{ 'selected' }} @endif>       {{__('Quneitra')}}      </option>
                <option value="Homs"           @if (old('from_country') == "Homs") {{ 'selected' }} @endif>           {{__('Homs')}}          </option>
                <option value="Hama"           @if (old('from_country') == "Hama") {{ 'selected' }} @endif>           {{__('Hama')}}          </option>
                <option value="Latakia"        @if (old('from_country') == "Latakia") {{ 'selected' }} @endif>        {{__('Latakia')}}       </option>
                <option value="Tartous"        @if (old('from_country') == "Tartous") {{ 'selected' }} @endif>        {{__('Tartous')}}       </option>
                <option value="Idlib"          @if (old('from_country') == "Idlib") {{ 'selected' }} @endif>          {{__('Idlib')}}         </option>
                <option value="Aleppo"         @if (old('from_country') == "Aleppo") {{ 'selected' }} @endif>         {{__('Aleppo')}}        </option>
                <option value="Al-Rakka"       @if (old('from_country') == "Al-Rakka") {{ 'selected' }} @endif>       {{__('Al-Rakka')}}      </option>
                <option value="Deer Al Zour"   @if (old('from_country') == "Deer Al Zour") {{ 'selected' }} @endif>   {{__('Deer Al Zour')}}  </option>
                <option value="Al-Hasakah"     @if (old('from_country') == "Al-Hasakah") {{ 'selected' }} @endif>     {{__('Al-Hasakah')}}    </option>
             </select>
            @error('from_country')
                <p class="help is-danger">{{ $message }}</p>
            @enderror</p>
            <hr>
            <div class="form-outline">
                <label class="form-label" for="fullname">{{__('fullname* : ')}}</label>
                <input style="width:200px"type="text" class="input" id="fullname" name="fullname" value="{{Auth::User()->order->firstname}} {{Auth::User()->order->lastname}}"class="form-control"  @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif/>
                {{-- @error('fullname')
                  <p class="help is-danger">{{ $message }}</p>
                @enderror --}}
            </div>
            <hr>
            <p>{{__('I kindly request you to transfer my membership from your branch of the Syndicate branch in the country: ')}}
                <select style="width:150px"class="input @error('from_country')is-danger @enderror"name="from_country" id="from_country"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                    @if (!empty($fullorder) && old('from_country', $fullorder->country_before))
                       <option value="{{ $fullorder->country_before }}" selected> {{ $fullorder->country_before }}</option>
                    @endif
                    <option></option>
                    <option  value="Damascus"      @if (old('from_country') == "Damascus") {{ 'selected' }} @endif>       {{__('Damascus')}}      </option>
                    <option value="Damascus Rural" @if (old('from_country') == "Damascus Rural") {{ 'selected' }} @endif> {{__('Damascus Rural')}}</option>
                    <option value="Suwayda"        @if (old('from_country') == "Suwayda") {{ 'selected' }} @endif>        {{__('Suwayda')}}       </option>
                    <option value="Daraa"          @if (old('from_country') == "Daraa") {{ 'selected' }} @endif>          {{__('Daraa')}}         </option>
                    <option value="Quneitra"       @if (old('from_country') == "Quneitra") {{ 'selected' }} @endif>       {{__('Quneitra')}}      </option>
                    <option value="Homs"           @if (old('from_country') == "Homs") {{ 'selected' }} @endif>           {{__('Homs')}}          </option>
                    <option value="Hama"           @if (old('from_country') == "Hama") {{ 'selected' }} @endif>           {{__('Hama')}}          </option>
                    <option value="Latakia"        @if (old('from_country') == "Latakia") {{ 'selected' }} @endif>        {{__('Latakia')}}       </option>
                    <option value="Tartous"        @if (old('from_country') == "Tartous") {{ 'selected' }} @endif>        {{__('Tartous')}}       </option>
                    <option value="Idlib"          @if (old('from_country') == "Idlib") {{ 'selected' }} @endif>          {{__('Idlib')}}         </option>
                    <option value="Aleppo"         @if (old('from_country') == "Aleppo") {{ 'selected' }} @endif>         {{__('Aleppo')}}        </option>
                    <option value="Al-Rakka"       @if (old('from_country') == "Al-Rakka") {{ 'selected' }} @endif>       {{__('Al-Rakka')}}      </option>
                    <option value="Deer Al Zour"   @if (old('from_country') == "Deer Al Zour") {{ 'selected' }} @endif>   {{__('Deer Al Zour')}}  </option>
                    <option value="Al-Hasakah"     @if (old('from_country') == "Al-Hasakah") {{ 'selected' }} @endif>     {{__('Al-Hasakah')}}    </option>
                </select>
                @error('from_country')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror</p>
                <p>{{__('To the syndicate branch in the country: ')}}
                <select style="width:150px"class="input @error('to_country')is-danger @enderror"name="to_country" id="to_country"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                    @if (!empty($fullorder) && old('to_country', $fullorder->country_after))
                      <option value="{{ $fullorder->country_after }}" selected> {{ $fullorder->country_after }}</option>
                    @endif
                    <option></option>
                    <option value="Damascus"      @if (old('to_country') == "Damascus") {{ 'selected' }} @endif>       {{__('Damascus')}}      </option>
                    <option value="Damascus Rural" @if (old('to_country') == "Damascus Rural") {{ 'selected' }} @endif> {{__('Damascus Rural')}}</option>
                    <option value="Suwayda"        @if (old('to_country') == "Suwayda") {{ 'selected' }} @endif>        {{__('Suwayda')}}       </option>
                    <option value="Daraa"          @if (old('to_country') == "Daraa") {{ 'selected' }} @endif>          {{__('Daraa')}}         </option>
                    <option value="Quneitra"       @if (old('to_country') == "Quneitra") {{ 'selected' }} @endif>       {{__('Quneitra')}}      </option>
                    <option value="Homs"           @if (old('to_country') == "Homs") {{ 'selected' }} @endif>           {{__('Homs')}}          </option>
                    <option value="Hama"           @if (old('to_country') == "Hama") {{ 'selected' }} @endif>           {{__('Hama')}}          </option>
                    <option value="Latakia"        @if (old('to_country') == "Latakia") {{ 'selected' }} @endif>        {{__('Latakia')}}       </option>
                    <option value="Tartous"        @if (old('to_country') == "Tartous") {{ 'selected' }} @endif>        {{__('Tartous')}}       </option>
                    <option value="Idlib"          @if (old('to_country') == "Idlib") {{ 'selected' }} @endif>          {{__('Idlib')}}         </option>
                    <option value="Aleppo"         @if (old('to_country') == "Aleppo") {{ 'selected' }} @endif>         {{__('Aleppo')}}        </option>
                    <option value="Al-Rakka"       @if (old('to_country') == "Al-Rakka") {{ 'selected' }} @endif>       {{__('Al-Rakka')}}      </option>
                    <option value="Deer Al Zour"   @if (old('to_country') == "Deer Al Zour") {{ 'selected' }} @endif>   {{__('Deer Al Zour')}}  </option>
                    <option value="Al-Hasakah"     @if (old('to_country') == "Al-Hasakah") {{ 'selected' }} @endif>     {{__('Al-Hasakah')}}    </option>
                </select>
                @error('to_country')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </p>
            <hr>
            <div class="form-group">
                <label for="reasons">{{__('That is for the following reasons :')}}</label>
                <textarea name="transportation_reasons"class="form-control" id="reasons" rows="3" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>@if(!empty($fullorder)) {{$fullorder->transportation_reasons}} @else {{old('transportation_reasons')}}@endif</textarea>
                @error('transportation_reasons')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
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
            <p>{{__('Request date: ')}}</p>
            @if (!empty($fullorder))
               @if(Auth::User()->role == "user")<button type="submit" class="btn btn-primary">{{__('Edit')}}</button><br>@endif
            @else
               @if(Auth::User()->role == "user")<button type="submit" class="btn btn-primary">{{__('Create')}}</button><br>@endif
            @endif
        </form>
{{-- بيان الدارة المالية --}}
            <hr><p style="font-weight: bold;">{{__('Financial Management Statement:')}}</p><hr>
            <p style="display:inline">{{__('The fellow')}} <span style="font-weight: bold">{{Auth::User()->name}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
                {{__('And registered in the Syndicate in year 20')}}{{Auth::User()->order->created_at->format('y')}}</p><br>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="option1" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
                <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="option2" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
                <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
                {{__('equal ')}}<input style="width:150px;"type="text" class="input @error('money_debt')is-danger @enderror"id="money_debt" name="money_debt"value="{{ old('money_debt') }}"class="form-control" placeholder="{{__('Enter debt money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}}<br>
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
                    <textarea name="registered_branch_disapproval_reasons"class="form-control" id="reasons" rows="3" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif></textarea>
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
                    <textarea name="transferred_branch_disapproval_reasons"class="form-control" id="reasons" rows="3" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif></textarea>
                </div>
            </div>
{{--  بيان أمين الصندوق--}}
        <hr>
        <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p>
        <p>{{__('Amount has been received ')}}<input style="width:170px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}} {{__('For a membership card fee')}}</p>
        <hr><p style="font-weight: bold;">{{__('The new membership number in the event that both parties agree to transfer the affiliate')}}
            <input style="width:200px;"type="text" class="input @error('newmembership_number')is-danger @enderror"id="newmembership_number" name="newmembership_number"value="{{ old('newmembership_number') }}"class="form-control" placeholder="{{__('Enter new membership number')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/></p><br>
            @if(Auth::User()->role == "admin")<button type="submit" class="btn btn-primary">{{__('Send')}}</button><br><br>@endif
    </div>
</x-layouts.app>

