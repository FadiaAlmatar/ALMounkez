<x-layouts.app>
    <h1 style="text-align: center;font-weight:bold;text-decoration:underline;margin-top:5px;">{{__('Membership transfer form from one branch to another')}}</h1><br>
    <div class="container"style="margin-top:7px;">
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
                <input style="width:150px"type="text" class="input @error('fullname')is-danger @enderror" id="fullname" name="fullname" value="{{ old('fullname') }}"class="form-control" placeholder="Enter FullName"/>
                @error('fullname')
                  <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <br><hr><br>
            <p>{{__('hope transfer my branch from')}}
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
                {{__('to branch')}}
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
            <p>{{__('For below reasons: ')}}</p>
            <textarea></textarea>
    </div>

</x-layouts.app>

{{-- {{Auth::User()->name}} --}}

