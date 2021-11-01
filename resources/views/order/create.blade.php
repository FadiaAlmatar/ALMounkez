<x-layouts.app>
{{-- start tabs --}}
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" >
            <a class="nav-link active" id="Personal-tab" data-bs-toggle="tab" data-bs-target="#Personal" type="button" role="tab" aria-controls="Personal" aria-selected="true">{{__('Personal data')}}</a>
        </li>
        <li class="nav-item" >
            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">{{__('contact information')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="Qualifications-tab" data-bs-toggle="tab" data-bs-target="#Qualifications" type="button" role="tab" aria-controls="Qualifications" aria-selected="false">{{__('Qualifications')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pay-tab" data-bs-toggle="tab" data-bs-target="#pay" type="button" role="tab" aria-controls="pay" aria-selected="false">{{__('How to pay the affiliation fee')}}</a>
        </li>
    </ul>
{{-- end tabs --}}
{{-- start big form --}}
<form action="{!! !empty($order) ? route('orders.update', $order) :  route('orders.store')  !!}" method="POST" enctype="multipart/form-data" >
    @csrf
    @if (!empty($order))
        @method('PUT')
    @endif
        <div class="tab-content" id="nav-tabContent" style="margin-bottom:5px;">
{{-- البيانات الشخصية --}}
      <div id="Personal"  class="tab-pane fade show active" role="tabpanel" aria-labelledby="Personal-tab">
        <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="name">{{__('name*')}}</label>
                <input type="text" class="input @error('name')is-danger @enderror" id="name" name="name" value="@if(!empty($order)) {{$order->firstname}} @else {{ old('name') }} @endif" class="form-control" />
                @error('name')
                  <p class="help is-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="nickname">{{__('nickname*')}}</label>
                <input type="text" class="input @error('nickname')is-danger @enderror" id="nickname" name="nickname" value= "@if(!empty($order)) {{$order->lastname}} @else {{ old('nickname') }} @endif" class="form-control" />
                @error('nickname')
                  <p class="help is-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="fathername">{{__('father name*')}}</label>
                <input type="text" class="input @error('fathername')is-danger @enderror" id="fathername" name="fathername"value= "@if(!empty($order)) {{$order->father_name}} @else {{ old('fathername') }} @endif" class="form-control" />
                @error('fathername')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="grandfather name">{{__('grandfather name*')}}</label>
                <input type="text" class="input @error('grandfathername')is-danger @enderror" id="grandfather name" name="grandfathername" value= "@if(!empty($order)) {{$order->grandfather_name}} @else {{ old('grandfathername') }} @endif" class="form-control" />
                @error('grandfathername')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="mother name">{{__('mother name*')}}</label>
                <input type="text" class="input @error('mothername')is-danger @enderror" id="mother name" name="mothername"value= "@if(!empty($order)) {{$order->mother_name}} @else {{ old('mothername') }} @endif"class="form-control" />
                @error('mothername')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Gender">{{__('Gender')}}</label>
                <select name="gender"id="Gender"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @if (!empty($order) && old('gender', $order->gender))
                        <option value="{{ $order->gender }}" selected> {{ $order->gender }}</option>
                    @endif
                    <option></option>
                    <option value="male" @if (old('gender') == "male") {{ 'selected' }} @endif>  {{__('Male')}}  </option>
                    <option value="female" @if (old('gender') == "female") {{ 'selected' }} @endif>{{__('Female')}}</option>
              </select>
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="fname/english">{{__('fname/english*')}}</label>
                <input type="text" class="input @error('fnameenglish')is-danger @enderror"id="fname/english" name="fnameenglish" value= "@if(!empty($order)) {{$order->english_firstname}} @else {{ old('fnameenglish') }} @endif" class="form-control" />
                @error('fnameenglish')
                <p class="help is-danger">{{ $message }}</p>
               @enderror
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="lname/english">{{__('lname/english*')}}</label>
                <input type="text" class="input @error('lnameenglish')is-danger @enderror" id="lname/english" name="lnameenglish"value= "@if(!empty($order)) {{$order->english_lastname}} @else {{ old('lnameenglish') }} @endif"class="form-control" />
                @error('lnameenglish')
                <p class="help is-danger">{{ $message }}</p>
               @enderror
            </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="fathername/english">{{__('fathername/english*')}}</label>
                <input type="text" class="input @error('fathernameenglish')is-danger @enderror"id="fathername/english" name="fathernameenglish" value= "@if(!empty($order)) {{$order->english_father_name}} @else {{ old('fathernameenglish') }} @endif" class="form-control" />
                @error('fathernameenglish')
                <p class="help is-danger">{{ $message }}</p>
               @enderror
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="mothername/english">{{__('mothername/english*')}}</label>
                <input type="text" class="input @error('mothernameenglish')is-danger @enderror"id="mothername/english" name="mothernameenglish"value= "@if(!empty($order)) {{$order->english_mother_name}} @else {{ old('mothernameenglish') }} @endif"class="form-control" />
                @error('mothernameenglish')
                <p class="help is-danger">{{ $message }}</p>
               @enderror
            </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Nationality">{{__('Nationality')}}</label>
                <select name="Nationality"id="Nationality"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @if (!empty($order) && old('Nationality', $order->Nationality))
                         <option value="{{ $order->Nationality}}" selected> {{ $order->Nationality }}</option>
                    @endif
                    <option></option>
                    <option value="Syrian" @if (old('Nationality') == "Syrian") {{ 'selected' }} @endif>{{__('Syrian')}}</option>
                    <option value="Palestinian" @if (old('Nationality') == "Palestinian") {{ 'selected' }} @endif>{{__('Palestinian')}}</option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Martial status">{{__('Martial status')}}</label>
                <select name="martialStatus"id="Martial status"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @if (!empty($order) && old('martialStatus', $order->Marital_status))
                         <option value="{{ $order->Marital_status }}" selected> {{ $order->Marital_status }}</option>
                    @endif
                    <option></option>
                    <option value="Unmarried" @if (old('martialStatus') == "Unmarried") {{ 'selected' }} @endif>{{__('Unmarried')}}</option>
                    <option value="Married" @if (old('martialStatus') == "Married") {{ 'selected' }} @endif>{{__('Married')}}</option>
                    <option value="Divorced" @if (old('martialStatus') == "Divorced") {{ 'selected' }} @endif>{{__('Divorced')}}</option>
                    <option value="Widower" @if (old('martialStatus') == "Widower") {{ 'selected' }} @endif>{{__('Widower')}}</option>
                 </select>
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Place of birth">{{__('Place of birth*')}}</label>
                <input type="text" class="input @error('placeBirth')is-danger @enderror"name="placeBirth" value= "@if(!empty($order)) {{$order->place_of_birth}} @else {{ old('placeBirth') }} @endif" id="Place of birth" class="form-control" />
                @error('placeBirth')
                <p class="help is-danger">{{ $message }}</p>
               @enderror
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Date of birth">{{__('Date of birth*')}}</label>
                <input type="date" class="input @error('dateBirth')is-danger @enderror"name="dateBirth" value="@if(!empty($order)) {{$order->date_of_birth}} @else{{ old('dateBirth') }}@endif" id="Date of birth" class="form-control" />
                @error('dateBirth')
                <p class="help is-danger">{{ $message }}</p>
               @enderror
            </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="National ID">{{__('National ID*')}}</label>
                <input type="text" class="input @error('nationalID')is-danger @enderror"name="nationalID" value= "@if(!empty($order)) {{$order->national_id}} @else {{ old('nationalID') }} @endif" id="National ID" class="form-control" />
                @error('nationalID')
                  <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Civil Registry">{{__('Civil Registry*')}}</label>
                <input type="text" class="input @error('civilRegistry')is-danger @enderror"name="civilRegistry"  value= "@if(!empty($order)) {{$order->civil_registry_secretariat}} @else {{ old('civilRegistry') }} @endif"  id="Civil Registry" class="form-control" />
                @error('civilRegistry')
                <p class="help is-danger">{{ $message }}</p>
               @enderror
            </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Personal Identification Number">{{__('Personal Identification Number*')}}</label>
                <input type="text" class="input @error('personalIdentificationNumber')is-danger @enderror"name="personalIdentificationNumber" value= "@if(!empty($order)) {{$order->personal_identification_number}} @else {{ old('personalIdentificationNumber') }} @endif" id="Personal Identification Number" class="form-control" />
                @error('personalIdentificationNumber')
                <p class="help is-danger">{{ $message }}</p>
               @enderror
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Identity Grant Date">{{__('Identity Grant Date*')}}</label>
                <input type="date" class="input @error('identityGrantDate')is-danger @enderror"name="identityGrantDate"value="@if(!empty($order)) {{$order->Identity_grant_date}} @else{{ old('identityGrantDate') }}@endif"id="Identity Grant Date" class="form-control" />
                @error('identityGrantDate')
                <p class="help is-danger">{{ $message }}</p>
               @enderror
            </div>
            </div>
          </div>
       <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="Constraint">{{__('Constraint*')}}</label>
            <input type="text" class="input @error('constraint')is-danger @enderror"name="constraint" value= "@if(!empty($order)) {{$order->constraint}} @else {{ old('constraint') }} @endif" id="Constraint" class="form-control" />
            @error('constraint')
            <p class="help is-danger">{{ $message }}</p>
           @enderror
        </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="Military">{{__('Military')}}</label>
            <select name="military"id="Military"class="form-select form-select-sm" aria-label=".form-select-sm example">
                @if (!empty($order) && old('military', $order->military))
                         <option value="{{ $order->military }}" selected> {{ $order->military }}</option>
                    @endif
                <option></option>
                <option value="Finished" @if (old('military') == "Finished") {{ 'selected' }} @endif>{{__('Finished')}}</option>
                <option value="Delayed" @if (old('military') == "Delayed") {{ 'selected' }} @endif>{{__('Delayed')}}</option>
                <option value="Exempt" @if (old('military') == "Exempt") {{ 'selected' }} @endif>{{__('Exempt')}}</option>
             </select>
          </div>
        </div>
      </div>
       <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="Public Record Number">{{__('Public Record Number')}}</label>
            <input type="text" class="input"name="publicRecordNumber" value= "@if(!empty($order)) {{$order->public_record_number}} @else {{ old('publicRecordNumber') }} @endif" id="Public Record Number" class="form-control" />
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="Health Status">{{__('Health Status')}}</label>
            <select name="healthStatus"id="Health Status"class="form-select form-select-sm" aria-label=".form-select-sm example">
                @if (!empty($order) && old('healthStatus', $order->Health_status))
                         <option value="{{ $order->Health_status }}" selected> {{ $order->Health_status }}</option>
                    @endif
                <option></option>
                <option value="Good" @if (old('healthStatus') == "Good") {{ 'selected' }} @endif>{{__('Good')}}</option>
                <option value="Sick" @if (old('healthStatus') == "Sick") {{ 'selected' }} @endif>{{__('Sick')}}</option>
             </select>
          </div>
        </div>
      </div>
    </div>
{{-- نهاية البيانات الشخصية --}}
{{-- معلومات الاتصال --}}
      <div  class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="country you wish to join">{{__('country you wish to join*')}}</label>
                <select class="input @error('countryJoin')is-danger @enderror"name="countryJoin" id="country you wish to join"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @if (!empty($order) && old('countryJoin', $order->Affiliation_country))
                      <option value="{{ $order->Affiliation_country }}" selected> {{ $order->Affiliation_country}}</option>
                    @endif
                    <option></option>
                    <option  value="Damascus"    @if (old('countryJoin') == "Damascus") {{ 'selected' }} @endif>       {{__('Damascus')}}      </option>
                    <option  value="Damascus Rural"  @if (old('countryJoin') == "Damascus Rural") {{ 'selected' }} @endif> {{__('Damascus Rural')}}</option>
                    <option  value="Suwayda"        @if (old('countryJoin') == "Suwayda") {{ 'selected' }} @endif>        {{__('Suwayda')}}       </option>
                    <option  value="Daraa"         @if (old('countryJoin') == "Daraa") {{ 'selected' }} @endif>          {{__('Daraa')}}         </option>
                    <option  value="Quneitra"      @if (old('countryJoin') == "Quneitra") {{ 'selected' }} @endif>       {{__('Quneitra')}}      </option>
                    <option  value="Homs"          @if (old('countryJoin') == "Homs") {{ 'selected' }} @endif>           {{__('Homs')}}          </option>
                    <option  value="Hama"         @if (old('countryJoin') == "Hama") {{ 'selected' }} @endif>           {{__('Hama')}}          </option>
                    <option  value="Latakia"       @if (old('countryJoin') == "Latakia") {{ 'selected' }} @endif>        {{__('Latakia')}}       </option>
                    <option  value="Tartous"       @if (old('countryJoin') == "Tartous") {{ 'selected' }} @endif>        {{__('Tartous')}}       </option>
                    <option  value="Idlib"         @if (old('countryJoin') == "Idlib") {{ 'selected' }} @endif>          {{__('Idlib')}}         </option>
                    <option value="Aleppo"         @if (old('countryJoin') == "Aleppo") {{ 'selected' }} @endif>         {{__('Aleppo')}}        </option>
                    <option  value="Al-Rakka"       @if (old('countryJoin') == "Al-Rakka") {{ 'selected' }} @endif>       {{__('Al-Rakka')}}      </option>
                    <option  value="Deer Al Zour"   @if (old('countryJoin') == "Deer Al Zour") {{ 'selected' }} @endif>   {{__('Deer Al Zour')}}  </option>
                    <option  value="Al-Hasakah"     @if (old('countryJoin') == "Al-Hasakah") {{ 'selected' }} @endif>     {{__('Al-Hasakah')}}    </option>
                 </select>
                @error('countryJoin')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Address">{{__('Address*')}}</label>
                <input class="input @error('address')is-danger @enderror"type="text" name="address" value= "@if(!empty($order)) {{$order->address}} @else {{ old('address') }} @endif"id="Address" class="form-control" />
                @error('address')
                   <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="House Phone">{{__('House Phone')}}</label>
                <input type="text" class="input"name="housePhone" value= "@if(!empty($order)) {{$order->house_phone}} @else {{ old('housePhone') }} @endif" id="House Phone" class="form-control" />
                @error('housePhone')
                 <p class="help is-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Work Phone">{{__('Work Phone')}}</label>
                <input type="text" class="input"name="workPhone" value= "@if(!empty($order)) {{$order->work_phone}} @else {{ old('workPhone') }} @endif" id="Work Phone" class="form-control" />
                @error('workPhone')
                 <p class="help is-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Mobile">{{__('Mobile')}}</label>
                <input type="text" class="input"name="mobile" value= "@if(!empty($order)) {{$order->mobile}} @else {{ old('mobile') }} @endif"id="Mobile" class="form-control" />
                @error('mobile')
                 <p class="help is-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="E-mail">{{__('E-mail')}}</label>
                <input type="email" class="input"name="email" value= "@if(!empty($order)) {{$order->email}} @else {{ old('email') }} @endif" id="E-mail" class="form-control" />
                @error('email')
                 <p class="help is-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Fax">{{__('Fax')}}</label>
                <input type="text" class="input"name="fax" value= "@if(!empty($order)) {{$order->fax}} @else {{ old('fax') }} @endif" id="Fax" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Site">{{__('Site')}}</label>
                <input type="text" class="input"name="site" value= "@if(!empty($order)) {{$order->site}} @else {{ old('site') }} @endif" id="Site" class="form-control" />
                @error('site')
                <p class="help is-danger">{{ $message }}</p>
               @enderror
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="work at government">{{__('work at government')}}</label>
                <select name="workGovernment"id="work at government"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @if (!empty($order))
                      @if($order->work_in_government == 1)
                     <option value="{{ $order->work_in_government }}" selected>{{__('Worker at government')}}</option>
                     @else
                     <option value="{{ $order->work_in_government }}" selected>{{__('not Worker at government')}}</option>
                     @endif
                    @endif
                    <option></option>
                    <option value="1"@if (old('workGovernment') == "1") {{ 'selected' }} @endif>{{__('Worker at government')}}    </option>
                    <option value="0"@if (old('workGovernment') == "0") {{ 'selected' }} @endif>{{__('not Worker at government')}}</option>
                 </select>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="work side">{{__('work side')}}</label>
                <input type="text"class="input" name="workSide"value= "@if(!empty($order)) {{$order->side_work}} @else {{ old('workSide') }} @endif" id="work side" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Insurance number">{{__('Insurance number')}}</label>
                <input type="text" class="input"name="insurance" value= "@if(!empty($order)) {{$order->insurance_number}} @else {{ old('insurance') }} @endif" id="Insurance number" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label style="display:inline;width:70%;"class="form-label" for="display your data">{{__('Do you want to display your data on the site (contact information only) after approving the affiliation request?*')}}</label>
                <select style="width:10%"class="input @error('displayData')is-danger @enderror"name="displayData"id="display your data"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @if (!empty($order))
                      @if($order->displayData == 1)
                      <option value="{{ $order->displayData }}" selected>{{__('Yes')}}</option>
                      @else
                      <option value="{{ $order->displayData }}" selected>{{__('No')}}</option>
                      @endif
                    @endif
                    <option></option>
                    <option value="1" @if (old('displayData') == "1") {{ 'selected' }} @endif>{{__('Yes')}}</option>
                    <option value="0" @if (old('displayData') == "0") {{ 'selected' }} @endif>{{__('No')}} </option>
                 </select>
                 @error('displayData')
                   <p class="help is-danger">{{ $message }}</p>
                 @enderror
              </div>
            </div>
          </div>
          <div class="mb-3" >
            <label for="formFile" class="form-label">{{__('Identity image*')}}</label>
            <input class="form-control" type="file" accept="image/*" id="identity_image" name="identity_image" >
            @error('identity_image')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">{{__('Personal image*')}}</label>
            <input class="form-control" type="file" accept="image/*"id="personal_image" name="personal_image" >
            @error('personal_image')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">{{__('Certification image*')}}</label>
            <input class="form-control" type="file" accept="image/*"id="certification_image" name="certification_image" >
            @error('certification_image')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">{{__('No Conviction image*')}}</label>
            <input class="form-control" type="file" accept="image/*"id="formFile" name="no_conviction_image">
            @error('no_conviction_image')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
          </div>
          @if (!empty($order))
          <button type="submit" class="btn btn-primary">{{__('Edit')}}</button><br>
          @else
          <button type="submit" class="btn btn-primary">{{__('Send')}}</button><br>
          @endif
      <div style="background:#ccc9da;margin-top:5px">
       <ul class="ul-order">
          <br><li>{{__('Name field is required')}}</li>
          <li>{{__('Nickname field is required')}}</li>
          <li>{{__('Name/English field is required-Please write the name as it is in the passport, if any')}}</li>
          <li>{{__('Nickname/English field is required-Please write the name as it is in the passport, if any')}}</li>
          <li>{{__('Fathername field is required')}}</li>
          <li>{{__('FatherName/English field is required-Please write the name as it is in the passport, if any')}}</li>
          <li>{{__('MotherName/English field is required-Please write the name as it is in the passport, if any')}}</li>
          <li>{{__('GrandFathername/Father field is required')}}</li>
          <li>{{__('Mothername field is required')}}</li>
          <li>{{__('Place of birth field is required')}}</li>
          <li>{{__('Date of birth is required')}}</li>
          <li>{{__('National ID field is required')}}</li>
          <li>{{__('Civil Registry field is required')}}</li>
          <li>{{__('Personal Identification Number field is required')}}</li>
          <li>{{__('Identity Grant Date field is required')}}</li>
          <li>{{__('Constraint field is required')}}</li>
          <li>{{__('country you wish to join field is required')}}</li>
          <li>{{__('Address field is required')}}</li>
          <li>{{__('Desire to display data on the site field is required')}}</li><br>
      </ul></div>
    </div>
{{-- نهاية معلومات الاتصال --}}
{{-- المؤهلات العلمية --}}
      <div class="tab-pane fade" id="Qualifications" role="tabpanel" aria-labelledby="Qualifications-tab">
          {{-- <button id="btnShow"class="btn btn-primary" onclick="newqualification()"><i class="fas fa-plus" aria-hidden="true"></i> {{__('Add qualification')}}</button> --}}
                <div class="table-responsive">
                    <table class="table" id="Qualification">
                        <thead>
                        <tr>
                            <th></th>
                            <th>{{__('Qualification')}}</th>
                            <th>{{__('Specialization')}}</th>
                            <th>{{__('Side')}}</th>
                            <th>{{__('Country')}}</th>
                            <th>{{__('Finish Year')}}</th>
                            <th>{{__('Rate')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="cloning_row" id="0">
                            <td> </td>
                            <td>
                                <div class="form-group">
                                    <select name="qualification[0]" id="Qualification" class="form-select  form-control">
                                        @if (!empty($order) && old('qualification[0]', $order->qualifications[0]->qualification))
                                        <option value="{{ $order->qualifications[0]->qualification }}" selected>{{__($order->qualifications[0]->qualification)}}</option>
                                        @endif
                                        <option></option>
                                        <option value="Doctorate"{{ (collect(old('qualification')[0] ?? "")->contains("Doctorate")) ? 'selected':'' }}>    {{__('Doctorate')}}  </option>
                                        <option value="Master"{{ (collect(old('qualification')[0] ?? "")->contains("Master")) ? 'selected':'' }}>          {{__('Master')}}     </option>
                                        <option value="Diploma"{{ (collect(old('qualification')[0] ?? "")->contains("Diploma")) ? 'selected':'' }}>        {{__('Diploma')}}    </option>
                                        <option value="Certificate"{{ (collect(old('qualification')[0] ?? "")->contains("Certificate")) ? 'selected':'' }}>{{__('Certificate')}}</option>
                                        <option value="Language"{{ (collect(old('qualification')[0] ?? "")->contains("Language")) ? 'selected':'' }}>      {{__('Language')}}   </option>
                                        <option value="Soft skills"{{ (collect(old('qualification')[0] ?? "")->contains("Soft skills")) ? 'selected':'' }}>{{__('Soft skills')}}</option>
                                        <option value="Hard skills"{{ (collect(old('qualification')[0] ?? "")->contains("Hard skills")) ? 'selected':'' }}>{{__('Hard skills')}}</option>
                                        <option value="Other"{{ (collect(old('qualification')[0] ?? "")->contains("Other")) ? 'selected':'' }}>            {{__('Other')}}      </option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    {{-- value="{{ old('specialization')[0] ?? "" }}" --}}
                                  <input class="input"type="text" name="specialization[0]" value= "@if(!empty($order)) {{$order->qualifications[0]->Specialization}} @else {{ old('specialization')[0] ?? ""}} @endif"  class="form-control" id="Specialization" placeholder="">
                                    @if ($errors->has('specialization.0'))
                                        @foreach($errors->get('specialization.0') as $error)
                                        <p class="help is-danger">{{ $error }}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </td>
                            <td>
                              <div class="form-group">
                                {{-- value="{{ old('side')[0] ?? "" }}" --}}
                              <input class="input"type="text" name="side[0]" value= "@if(!empty($order)) {{$order->qualifications[0]->side}} @else {{ old('side')[0] ?? ""}} @endif" class="form-control" id="Side" placeholder="">
                                @if ($errors->has('side.0'))
                                    @foreach($errors->get('side.0') as $error)
                                    {{-- @foreach($errors as $error) --}}
                                    <p class="help is-danger">{{ $error }}</p>
                                    {{-- @endforeach  --}}
                                    @endforeach
                                @endif
                            </div>
                            </td>
                            <td>
                              <div class="form-group">
                                {{-- value="{{ old('country')[0] ?? "" }}" --}}
                                <input class="input"type="text" name="country[0]" value= "@if(!empty($order)) {{$order->qualifications[0]->country}} @else {{ old('country')[0] ?? ""}} @endif" class="form-control" id="Country" placeholder="">
                                @if ($errors->has('country.0'))
                                    @foreach($errors->get('country.0') as $error)
                                    <p class="help is-danger">{{ $error }}</p>
                                    @endforeach
                                @endif
                            </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <input class="input" name="finishYear[0]"  type="text" value= "@if(!empty($order)) {{$order->qualifications[0]->finishyear}} @else {{ old('finishYear')[0] ?? ""}} @endif" class="form-control" id="Year" placeholder="">
                                @if ($errors->has('finishYear.0'))
                                    @foreach($errors->get('finishYear.0') as $error)
                                    <p class="help is-danger">{{ $error }}</p>
                                    @endforeach
                                @endif
                            </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <input class="input" name="Rate[0]" type="text" value= "@if(!empty($order)) {{$order->qualifications[0]->rate}} @else {{ old('Rate')[0] ?? ""}} @endif" class="form-control" id="Rate" placeholder="">
                                @if ($errors->has('Rate.0'))
                                    @foreach($errors->get('Rate.0') as $error)
                                    <p class="help is-danger">{{ $error }}</p>
                                    @endforeach
                                @endif
                            </div>
                          </td>

                        </tr>
                        @if (!empty($order))
                        @for ($i = 1; $i < sizeof($order->qualifications); $i++)
                        <tr class="cloning_row" id="0">
                            <td><button type="button" class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button></td>
                            <td>
                                {{-- <input class="input"type="text" name="qualification[0]"value="{{ $order->qualifications[$i]->qualification}}"class="form-control" id="Qualification" placeholder="" > --}}
                                <select name="qualification[0]" id="Qualification" class="form-select  form-control">
                                    @if (!empty($order) && old('qualification[0]', $order->qualifications[$i]->qualification))
                                    <option value="{{ $order->qualifications[$i]->qualification}}" selected>{{ $order->qualifications[$i]->qualification}}</option>
                                    @endif
                                    <option></option>
                                    <option value="Doctorate"{{ (collect(old('qualification'))->contains("Doctorate")) ? 'selected':'' }}>    {{__('Doctorate')}}  </option>
                                    <option value="Master"{{ (collect(old('qualification'))->contains("Master")) ? 'selected':'' }}>          {{__('Master')}}     </option>
                                    <option value="Diploma"{{ (collect(old('qualification'))->contains("Diploma")) ? 'selected':'' }}>        {{__('Diploma')}}    </option>
                                    <option value="Certificate"{{ (collect(old('qualification'))->contains("Certificate")) ? 'selected':'' }}>{{__('Certificate')}}</option>
                                    <option value="Language"{{ (collect(old('qualification'))->contains("Language")) ? 'selected':'' }}>      {{__('Language')}}   </option>
                                    <option value="Soft skills"{{ (collect(old('qualification'))->contains("Soft skills")) ? 'selected':'' }}>{{__('Soft skills')}}</option>
                                    <option value="Hard skills"{{ (collect(old('qualification'))->contains("Hard skills")) ? 'selected':'' }}>{{__('Hard skills')}}</option>
                                    <option value="Other"{{ (collect(old('qualification'))->contains("Other")) ? 'selected':'' }}>            {{__('Other')}}      </option>
                                </select></td>
                            <td><input class="input"type="text" name="specialization[0]"value="{{ $order->qualifications[$i]->Specialization }}"class="form-control" id="Specialization" placeholder="" ></td>
                            <td><input class="input"type="text" name="side[0]"value="{{ $order->qualifications[$i]->side }}"class="form-control" id="Side" placeholder="" ></td>
                            <td><input class="input"type="text" name="country[0]"value="{{ $order->qualifications[$i]->country}}"class="form-control" id="Country" placeholder="" ></td>
                            <td><input class="input"name="Year[0]"value="{{ $order->qualifications[$i]->finishyear }}" type="text" class="form-control" id="Year" placeholder=""></td>
                            <td><input class="input"name="Rate[0]"value="{{ $order->qualifications[$i]->rate }}"type="text" class="form-control" id="Rate" placeholder="" ></td>
                        </tr>
                    @endfor
                    @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6">
                                <button type="button" class="btn_add btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> {{ __('Add qualification') }}</button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
    </div>
{{-- نهاية المؤهلات العلمية --}}
{{-- طريقة الدفع --}}
      <div id="pay" class="tab-pane fade"  role="tabpanel" aria-labelledby="pay-tab">
        <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Payment method">{{__('Payment method')}}</label>
                <select name="payment"id="Payment method"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @if (!empty($order) && old('payment', $order->pay_affiliation_fee))
                    @if($order->pay_affiliation_fee == "cash")
                       <option value="{{ $order->pay_affiliation_fee }}" selected>{{__('Cash to the Central Syndicate Fund in Damascus')}}</option>
                    @elseif($order->pay_affiliation_fee == "real estate bank")
                       <option value="{{ $order->pay_affiliation_fee }}" selected>{{__('Syndicate account with the real estate bank number 11011418 in all countries')}}</option>
                    @else
                       <option value="{{ $order->pay_affiliation_fee }}" selected>{{__('Syndicate account with Francbank Bank number 0004204801 in Damascus,Aleppo,Tartous and Latakia')}}</option>
                    @endif
                    @endif
                    <option></option>
                    <option value="cash" @if (old('payment') == "cash") {{ 'selected' }} @endif>{{__('Cash to the Central Syndicate Fund in Damascus')}}</option>
                    <option value="real estate bank" @if (old('payment') == "real estate bank") {{ 'selected' }} @endif>{{__('Syndicate account with the real estate bank number 11011418 in all countries')}}</option>
                    <option value="Francbank" @if (old('payment') == "Francbank") {{ 'selected' }} @endif>{{__('Syndicate account with Francbank Bank number 0004204801 in Damascus,Aleppo,Tartous and Latakia')}}</option>
                </select>
              </div>
            </div>
          </div>
    {{-- <button type="submit" class="btn btn-primary">{{__('Send')}}</button><br><br> --}}
            @if (!empty($order))
            <button type="submit" class="btn btn-primary">{{__('Edit')}}</button><br>
            @else
            <button type="submit" class="btn btn-primary">{{__('Send')}}</button><br>
            @endif
    {{-- <a href="{{route('orders.printorder')}}"><i class="fas fa-file-pdf fa-2x" style="color:red"></i></a><br><br> --}}
      <div style="background:#ccc9da;">
        <ul class="ul-order">
          <br><li>{{__('Name field is required')}}</li>
          <li>{{__('Nickname field is required')}}</li>
          <li>{{__('Name/English field is required-Please write the name as it is in the passport, if any')}}</li>
          <li>{{__('Nickname/English field is required-Please write the name as it is in the passport, if any')}}</li>
          <li>{{__('Fathername field is required')}}</li>
          <li>{{__('FatherName/English field is required-Please write the name as it is in the passport, if any')}}</li>
          <li>{{__('MotherName/English field is required-Please write the name as it is in the passport, if any')}}</li>
          <li>{{__('GrandFathername/Father field is required')}}</li>
          <li>{{__('Mothername field is required')}}</li>
          <li>{{__('Place of birth field is required')}}</li>
          <li>{{__('Date of birth is required')}}</li>
          <li>{{__('National ID field is required')}}</li>
          <li>{{__('Civil Registry field is required')}}</li>
          <li>{{__('Personal Identification Number field is required')}}</li>
          <li>{{__('Identity Grant Date field is required')}}</li>
          <li>{{__('Constraint field is required')}}</li>
          <li>{{__('country you wish to join field is required')}}</li>
          <li>{{__('Address field is required')}}</li>
          <li>{{__('Desire to display data on the site field is required')}}</li><br>
      </ul>
    </div>
    </div>
    {{-- نهايةطريقة الدفع --}}
</div>
</form>
</x-layouts.app>



















