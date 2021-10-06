<x-layouts.app>
    <h1 style="text-align: center;font-weight:bold;text-decoration:underline;margin-top:5px;">{{__('Membership transfer form from one branch to another')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <form action="{{ route('fullorders.store') }}" method="POST" >
            @csrf
        <input name="type" value="transfer" hidden>
        <p>{{__('Mr. Chairman of the Syndicate Branch Council in the province')}}
            <select style="width:150px"class="input @error('country')is-danger @enderror"name="country" id="country"class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option></option>
                <option  value="Damascus"      @if (old('country') == "Damascus") {{ 'selected' }} @endif>       {{__('Damascus')}}      </option>
                <option value="Damascus Rural" @if (old('country') == "Damascus Rural") {{ 'selected' }} @endif> {{__('Damascus Rural')}}</option>
                <option value="Suwayda"        @if (old('country') == "Suwayda") {{ 'selected' }} @endif>        {{__('Suwayda')}}       </option>
                <option value="Daraa"          @if (old('country') == "Daraa") {{ 'selected' }} @endif>          {{__('Daraa')}}         </option>
                <option value="Quneitra"       @if (old('country') == "Quneitra") {{ 'selected' }} @endif>       {{__('Quneitra')}}      </option>
                <option value="Homs"           @if (old('country') == "Homs") {{ 'selected' }} @endif>           {{__('Homs')}}          </option>
                <option value="Hama"           @if (old('country') == "Hama") {{ 'selected' }} @endif>           {{__('Hama')}}          </option>
                <option value="Latakia"        @if (old('country') == "Latakia") {{ 'selected' }} @endif>        {{__('Latakia')}}       </option>
                <option value="Tartous"        @if (old('country') == "Tartous") {{ 'selected' }} @endif>        {{__('Tartous')}}       </option>
                <option value="Idlib"          @if (old('country') == "Idlib") {{ 'selected' }} @endif>          {{__('Idlib')}}         </option>
                <option value="Aleppo"         @if (old('country') == "Aleppo") {{ 'selected' }} @endif>         {{__('Aleppo')}}        </option>
                <option value="Al-Rakka"       @if (old('country') == "Al-Rakka") {{ 'selected' }} @endif>       {{__('Al-Rakka')}}      </option>
                <option value="Deer Al Zour"   @if (old('country') == "Deer Al Zour") {{ 'selected' }} @endif>   {{__('Deer Al Zour')}}  </option>
                <option value="Al-Hasakah"     @if (old('country') == "Al-Hasakah") {{ 'selected' }} @endif>     {{__('Al-Hasakah')}}    </option>
             </select>
            @error('country')
                <p class="help is-danger">{{ $message }}</p>
            @enderror</p>
            <br><hr><br>
            <div class="form-outline">
                <label class="form-label" for="fullname">{{__('fullname* : ')}}</label>
                <input style="width:150px"type="text" class="input @error('fullname')is-danger @enderror" id="fullname" name="fullname" value="{{ old('fullname') }}"class="form-control" placeholder="{{__('Enter FullName')}}"/>
                @error('fullname')
                  <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <br><hr><br>
            <p>{{__('I kindly request you to transfer my membership from your branch of the Syndicate branch in the country: ')}}
                <select style="width:150px"class="input @error('country')is-danger @enderror"name="country" id="country"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option></option>
                    <option  value="Damascus"      @if (old('country') == "Damascus") {{ 'selected' }} @endif>       {{__('Damascus')}}      </option>
                    <option value="Damascus Rural" @if (old('country') == "Damascus Rural") {{ 'selected' }} @endif> {{__('Damascus Rural')}}</option>
                    <option value="Suwayda"        @if (old('country') == "Suwayda") {{ 'selected' }} @endif>        {{__('Suwayda')}}       </option>
                    <option value="Daraa"          @if (old('country') == "Daraa") {{ 'selected' }} @endif>          {{__('Daraa')}}         </option>
                    <option value="Quneitra"       @if (old('country') == "Quneitra") {{ 'selected' }} @endif>       {{__('Quneitra')}}      </option>
                    <option value="Homs"           @if (old('country') == "Homs") {{ 'selected' }} @endif>           {{__('Homs')}}          </option>
                    <option value="Hama"           @if (old('country') == "Hama") {{ 'selected' }} @endif>           {{__('Hama')}}          </option>
                    <option value="Latakia"        @if (old('country') == "Latakia") {{ 'selected' }} @endif>        {{__('Latakia')}}       </option>
                    <option value="Tartous"        @if (old('country') == "Tartous") {{ 'selected' }} @endif>        {{__('Tartous')}}       </option>
                    <option value="Idlib"          @if (old('country') == "Idlib") {{ 'selected' }} @endif>          {{__('Idlib')}}         </option>
                    <option value="Aleppo"         @if (old('country') == "Aleppo") {{ 'selected' }} @endif>         {{__('Aleppo')}}        </option>
                    <option value="Al-Rakka"       @if (old('country') == "Al-Rakka") {{ 'selected' }} @endif>       {{__('Al-Rakka')}}      </option>
                    <option value="Deer Al Zour"   @if (old('country') == "Deer Al Zour") {{ 'selected' }} @endif>   {{__('Deer Al Zour')}}  </option>
                    <option value="Al-Hasakah"     @if (old('country') == "Al-Hasakah") {{ 'selected' }} @endif>     {{__('Al-Hasakah')}}    </option>
                </select>
                @error('country')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
                <br>{{__('To the syndicate branch in the country: ')}}
                <select style="width:150px"class="input @error('country')is-danger @enderror"name="country" id="country"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option></option>
                    <option  value="Damascus"      @if (old('country') == "Damascus") {{ 'selected' }} @endif>       {{__('Damascus')}}      </option>
                    <option value="Damascus Rural" @if (old('country') == "Damascus Rural") {{ 'selected' }} @endif> {{__('Damascus Rural')}}</option>
                    <option value="Suwayda"        @if (old('country') == "Suwayda") {{ 'selected' }} @endif>        {{__('Suwayda')}}       </option>
                    <option value="Daraa"          @if (old('country') == "Daraa") {{ 'selected' }} @endif>          {{__('Daraa')}}         </option>
                    <option value="Quneitra"       @if (old('country') == "Quneitra") {{ 'selected' }} @endif>       {{__('Quneitra')}}      </option>
                    <option value="Homs"           @if (old('country') == "Homs") {{ 'selected' }} @endif>           {{__('Homs')}}          </option>
                    <option value="Hama"           @if (old('country') == "Hama") {{ 'selected' }} @endif>           {{__('Hama')}}          </option>
                    <option value="Latakia"        @if (old('country') == "Latakia") {{ 'selected' }} @endif>        {{__('Latakia')}}       </option>
                    <option value="Tartous"        @if (old('country') == "Tartous") {{ 'selected' }} @endif>        {{__('Tartous')}}       </option>
                    <option value="Idlib"          @if (old('country') == "Idlib") {{ 'selected' }} @endif>          {{__('Idlib')}}         </option>
                    <option value="Aleppo"         @if (old('country') == "Aleppo") {{ 'selected' }} @endif>         {{__('Aleppo')}}        </option>
                    <option value="Al-Rakka"       @if (old('country') == "Al-Rakka") {{ 'selected' }} @endif>       {{__('Al-Rakka')}}      </option>
                    <option value="Deer Al Zour"   @if (old('country') == "Deer Al Zour") {{ 'selected' }} @endif>   {{__('Deer Al Zour')}}  </option>
                    <option value="Al-Hasakah"     @if (old('country') == "Al-Hasakah") {{ 'selected' }} @endif>     {{__('Al-Hasakah')}}    </option>
                </select>
            </p>
            <br><hr>
            <div class="form-group">
                <label for="reasons">{{__('That is for the following reasons :')}}</label>
                <textarea class="form-control" id="reasons" rows="3"></textarea>
            </div>
            <p>{{__('Evidences attached')}}</p>
            <div class="mb-3" >
                <label for="formFile" class="form-label">{{__('change home image')}}</label>
                <input class="form-control" type="file" accept="image/*" id="change_home" name="change_home">
                @error('change_home')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">{{__('change work image')}}</label>
                <input class="form-control" type="file" accept="image/*"id="change_work" name="change_work">
                @error('change_work')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <p>{{__('Request date: ')}}</p><hr><br>
            </table> <button type="submit" class="btn btn-primary">{{__('Send')}}</button><br><br>
        </form>

{{-- بيان الدارة المالية --}}
@if(Auth::User()->role == "user")
            <p style="font-weight: bold;">{{__('Financial Management Statement:')}}</p><hr>
            <p style="display:inline">{{__('The fellow')}} <span style="font-weight: bold">{{Auth::User()->name}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
                {{__('And registered in the Syndicate in year')}}........</p><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="option1" disabled>
                <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="option2" disabled>
                <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
            </div><br><br>
{{-- قرار مجلس إدارة الفرع المسجل به --}}
            <hr><br>
            <p style="font-weight: bold;">{{__('Decision of the board of directors of the branch in which it is registered')}}</p><hr><br>
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
                    <textarea class="form-control" id="reasons" rows="3" disabled></textarea>
                </div>
            </div>
{{--قرار مجلس إدارة الفرع الراغب بالانتقال إليه --}}
            <hr><br>
            <p style="font-weight: bold;">{{__('The decision of the board of directors of the branch wishing to move to it: ')}}</p><hr><br>
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
                    <textarea class="form-control" id="reasons" rows="3" disabled></textarea>
                </div>
            </div>
{{--  بيان أمين الصندوق--}}
        <hr><br>
        <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p><hr><br>
        <p>{{__('Amount has been received ')}}<input style="width:170px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" disabled/>{{__(' SYP')}} {{__('For a membership card fee')}}</p><br>
        <hr><br><p style="font-weight: bold;">{{__('The new membership number in the event that both parties agree to transfer the affiliate')}} <input style="width:200px;"type="text" class="input @error('newmembership_number')is-danger @enderror"id="newmembership_number" name="newmembership_number"value="{{ old('newmembership_number') }}"class="form-control" placeholder="{{__('Enter new membership number')}}" disabled/></p><br>
    @endif
    </div>

</x-layouts.app>

{{-- {{Auth::User()->name}} --}}

