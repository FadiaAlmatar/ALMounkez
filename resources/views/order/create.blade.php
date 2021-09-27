<x-layouts.app>
    {{-- <form style="width:50%;margin:auto">
        <div class="form-group">
          <label for="exampleInputEmail1">{{__('Username')}}</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('username')}}">
          <small id="emailHelp" class="form-text text-muted">{{__('Username is the name used to enter the site to submit the affiliation request,It must not contain spaces')}}<br>
            {{__('Username must be in English If the number of letters is between 3 and 20 letters')}}</small>
        </div>
        <br><div class="form-group">
          <label for="exampleInputPassword1">{{__('Password')}}</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{__('password')}}">
          <small id="emailHelp" class="form-text text-muted">{{__('password must be at least 8 characters (and a maximum of 20 characters), and contain at least one number and one character.')}}</small>
        </div>
       <br> <div class="form-group">
            <label for="exampleInputPassword1">{{__('Confirm Password')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{__('confirm password')}}">
            <small id="emailHelp" class="form-text text-muted">{{__('password must be at least 8 characters (and a maximum of 20 characters), and contain at least one number and one character.')}}</small>
          </div>
          <br><div class="form-group">
            <label for="exampleInputPassword1">{{__('Name')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{__('name')}}">
            <small id="emailHelp" class="form-text text-muted">{{__('name is what appears on the site after logging in')}}</small>
          </div>
          <br><div class="form-group">
            <label for="exampleInputPassword1">{{__('Nickname')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{__('nickname')}}">
            <small id="emailHelp" class="form-text text-muted">{{__('nickname must be at least 3 characters')}}</small>
          </div>
          <p>{{__('To complete the registration process, you must enter your email')}}</p>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('E-mail')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{__('e-mail')}}">
            <small id="emailHelp" class="form-text text-muted">{{__('Please put an effective email so that you can use it later in the account activation process')}}</small>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form> --}}

      <ul class="nav nav-tabs" id="myTab" role="tablist" style="width:70%;margin:auto;">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="Personal-tab" data-bs-toggle="tab" data-bs-target="#Personal" type="button" role="tab" aria-controls="Personal" aria-selected="true">{{__('Personal data')}}</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">{{__('contact information')}}</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="Qualifications-tab" data-bs-toggle="tab" data-bs-target="#Qualifications" type="button" role="tab" aria-controls="Qualifications" aria-selected="false">{{__('Qualifications')}}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pay-tab" data-bs-toggle="tab" data-bs-target="#pay" type="button" role="tab" aria-controls="pay" aria-selected="false">{{__('How to pay the affiliation fee')}}</button>
          </li>
      </ul>
      <form action="{{ route('orders.store') }}" method="POST">
        @csrf
      <div class="tab-content" id="myTabContent" style="margin-bottom: 5px;">
      {{-- البيانات الشخصية --}}
      <div id="Personal" style="width:70%;margin:auto;margin-top:5px;" class="tab-pane fade show active" role="tabpanel" aria-labelledby="Personal-tab">
      {{-- <form> --}}
        <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="name">{{__('name*')}}</label>
                <input type="text" class="input @error('name')is-danger @enderror" id="name" name="name" value="{{ old('name') }}"class="form-control" />
                @error('name')
                  <p class="help is-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="nickname">{{__('nickname*')}}</label>
                <input type="text" class="input @error('nickname')is-danger @enderror" id="nickname" name="nickname"value="{{ old('nickname') }}"class="form-control" />
                @error('nickname')
                  <p class="help is-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="father name">{{__('father name*')}}</label>
                <input type="text" class="input @error('fathername')is-danger @enderror" id="fathername" name="fathername"value="{{ old('fathername') }}"class="form-control" />
                @error('fathername')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="grandfather name">{{__('grandfather name*')}}</label>
                <input type="text" class="input @error('grandfathername')is-danger @enderror" id="grandfather name" name="grandfathername"value="{{ old('grandfathername') }}"class="form-control" />
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
                <input type="text" class="input @error('mothername')is-danger @enderror" id="mother name" name="mothername"value="{{ old('mothername') }}"class="form-control" />
                @error('mothername')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Gender">{{__('Gender')}}</label>
                <select name="gender"id="Gender"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    {{-- value="{{ old('category_id') }}" --}}
                    <option selected value="male">{{__('Male')}}</option>
                    <option value="female">{{__('Female')}}</option>
              </select>
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="fathername/english">{{__('fname/english*')}}</label>
                <input type="text" class="input @error('fnameenglish')is-danger @enderror"id="fathername/english" name="fnameenglish"value="{{ old('fnameenglish') }}"class="form-control" />
                @error('fnameenglish')
                <p class="help is-danger">{{ $message }}</p>
               @enderror
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="mothername/english">{{__('lname/english*')}}</label>
                <input type="text" class="input @error('lnameenglish')is-danger @enderror" id="mothername/english" name="lnameenglish"value="{{ old('lnameenglish') }}"class="form-control" />
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
                <input type="text" class="input @error('fathernameenglish')is-danger @enderror"id="fathername/english" name="fathernameenglish"value="{{ old('fathernameenglish') }}"class="form-control" />
                @error('fathernameenglish')
                <p class="help is-danger">{{ $message }}</p>
               @enderror
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="mothername/english">{{__('mothername/english*')}}</label>
                <input type="text" class="input @error('mothernameenglish')is-danger @enderror"id="mothername/english" name="mothernameenglish"value="{{ old('mothernameenglish') }}"class="form-control" />
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
                    <option selected value="Syrian">{{__('Syrian')}}</option>
                    <option value="Palestinian">{{__('Palestinian')}}</option>
                  </select>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Martial status">{{__('Martial status')}}</label>
                <select name="martialStatus"id="Martial status"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected value="Unmarried">{{__('Unmarried')}}</option>
                    <option value="Married">{{__('Married')}}</option>
                    <option value="Divorced">{{__('Divorced')}}</option>
                    <option value="Widower">{{__('Widower')}}</option>
                 </select>
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Place of birth">{{__('Place of birth*')}}</label>
                <input type="text" class="input @error('placeBirth')is-danger @enderror"name="placeBirth"value="{{ old('placeBirth') }}"id="Place of birth" class="form-control" />
                @error('placeBirth')
                <p class="help is-danger">{{ $message }}</p>
               @enderror
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Date of birth">{{__('Date of birth*')}}</label>
                <input type="date" class="input @error('dateBirth')is-danger @enderror"name="dateBirth"value="{{ old('dateBirth') }}"id="Date of birth" class="form-control" />
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
                <input type="text" class="input @error('nationalID')is-danger @enderror"name="nationalID"value="{{ old('nationalID') }}"id="National ID" class="form-control" />
                @error('nationalID')
                  <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Civil Registry">{{__('Civil Registry*')}}</label>
                <input type="text" class="input @error('civilRegistry')is-danger @enderror"name="civilRegistry" value="{{ old('civilRegistry') }}"id="Civil Registry" class="form-control" />
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
                <input type="text" class="input @error('personalIdentificationNumber')is-danger @enderror"name="personalIdentificationNumber"value="{{ old('personalIdentificationNumber') }}"id="Personal Identification Number" class="form-control" />
                @error('personalIdentificationNumber')
                <p class="help is-danger">{{ $message }}</p>
               @enderror
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Identity Grant Date">{{__('Identity Grant Date*')}}</label>
                <input type="date" class="input @error('identityGrantDate')is-danger @enderror"name="identityGrantDate"value="{{ old('identityGrantDate') }}"id="Identity Grant Date" class="form-control" />
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
            <input type="text" class="input @error('constraint')is-danger @enderror"name="constraint"value="{{ old('constraint') }}"id="Constraint" class="form-control" />
            @error('constraint')
            <p class="help is-danger">{{ $message }}</p>
           @enderror
        </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="Military">{{__('Military')}}</label>
            <select name="military"id="Military"class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected value="Finished">{{__('Finished')}}</option>
                <option value="Delayed">{{__('Delayed')}}</option>
                <option value="Exempt">{{__('Exempt')}}</option>
             </select>
          </div>
        </div>
      </div>
       <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="Public Record Number">{{__('Public Record Number')}}</label>
            <input type="text" name="publicRecordNumber"value="{{ old('publicRecordNumber') }}"id="Public Record Number" class="form-control" />
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="Health Status">{{__('Health Status')}}</label>
            <select name="healthStatus"id="Health Status"class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected value="Good">{{__('Good')}}</option>
                <option value="Sick">{{__('Sick')}}</option>
             </select>
          </div>
        </div>
      </div>
      {{-- </form> --}}
    </div>
      {{-- معلومات الاتصال --}}
      <div style="width:70%;margin:auto;margin-top:5px" class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      {{-- <form > --}}
        <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="country you wish to join">{{__('country you wish to join*')}}</label>
                <select class="input @error('countryJoin')is-danger @enderror"name="countryJoin" id="country you wish to join"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected value="Damascus">               {{__('Damascus')}}</option>
                    <option value="Damascus Rural"> {{__('Damascus Rural')}}</option>
                    <option value="Suwayda">        {{__('Suwayda')}}</option>
                    <option value="Daraa">          {{__('Daraa')}}</option>
                    <option value="Quneitra">       {{__('Quneitra')}}</option>
                    <option value="Homs">           {{__('Homs')}}</option>
                    <option value="Hama">           {{__('Hama')}}</option>
                    <option value="Latakia">        {{__('Latakia')}}</option>
                    <option value="Tartous">        {{__('Tartous')}}</option>
                    <option value="Idlib">          {{__('Idlib')}}</option>
                    <option value="Aleppo">         {{__('Aleppo')}}</option>
                    <option value="Al-Rakka">       {{__('Al-Rakka')}}</option>
                    <option value="Deer Al Zour">   {{__('Deer Al Zour')}}</option>
                    <option value="Al-Hasakah">     {{__('Al-Hasakah')}}</option>
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
                <input class="input @error('address')is-danger @enderror"type="text" name="address"value="{{ old('address') }}"id="Address" class="form-control" />
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
                <input type="text" name="housePhone"value="{{ old('housePhone') }}"id="House Phone" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Work Phone">{{__('Work Phone')}}</label>
                <input type="text" name="workPhone"value="{{ old('workPhone') }}"id="Work Phone" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Mobile">{{__('Mobile')}}</label>
                <input type="text" name="mobile"value="{{ old('mobile') }}"id="Mobile" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="E-mail">{{__('E-mail')}}</label>
                <input type="email" name="email"value="{{ old('email') }}"id="E-mail" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Fax">{{__('Fax')}}</label>
                <input type="text" name="fax"value="{{ old('fax') }}"id="Fax" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Site">{{__('Site')}}</label>
                <input type="text" name="site"value="{{ old('site') }}"id="Site" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="work at government">{{__('work at government')}}</label>
                <select name="workGovernment"id="work at government"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected value="1">{{__('Worker at government')}}</option>
                    <option value="0">{{__('not Worker at government')}}</option>
                 </select>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="work side">{{__('work side')}}</label>
                <input type="text" name="workSide"value="{{ old('workSide') }}"id="work side" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Insurance number">{{__('Insurance number')}}</label>
                <input type="text" name="insurance"value="{{ old('insurance') }}"id="Insurance number" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="display your data">{{__('Do you want to display your data on the site (contact information only) after approving the affiliation request?*')}}</label>
                <select class="input @error('displayData')is-danger @enderror"name="displayData"id="display your data"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected value="1">{{__('Yes')}}</option>
                    <option value="0">         {{__('No')}}</option>
                 </select>
                 @error('displayData')
                   <p class="help is-danger">{{ $message }}</p>
                 @enderror
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">{{__('Send')}}</button>
      {{-- </form> --}}
      <div style="background:#e0c2c2;margin-top:5px">
       <ul style="list-style-type:disc;list-style-position: inside;padding-left:15px">
          <li>{{__('Name field is required')}}</li>
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
          <li>{{__('Desire to display data on the site field is required')}}</li>
      </ul></div>
    </div>
      {{-- المؤهلات العلمية --}}
      <div class="tab-pane fade" style="width:70%;margin:auto;margin-top:5px;"id="Qualifications" role="tabpanel" aria-labelledby="Qualifications-tab">
         {{-- <br>
          <button id="btnShow"class="btn btn-primary" onclick="newqualification()"><i class="fas fa-plus" aria-hidden="true"></i> {{__('Add qualification')}}</button>
          {{-- <div class="card-body"> --}}
            <form action="" method="post" class="form">
                @csrf
                <div class="table-responsive">
                    <table class="table" id="invoice_details">
                        <thead>
                        <tr>
                            <th>{{__('Qualification')}}</th>
                            <th>{{__('University')}}</th>
                            <th>{{__('Country')}}</th>
                            <th>{{__('Graduation Year')}}</th>
                            <td>{{__('Graduation Rate')}}</td>
                            <th>{{__('Specialization')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="cloning_row" id="0">
                            <td>
                                <div class="form-group">
                                  <label for="University">{{__('Qualification')}}</label>
                                  <input type="text" name="qualification"value="{{ old('qualification') }}"class="form-control" id="Qualification" placeholder="">
                                </div>
                            </td>
                            <td>
                              <div class="form-group">
                              <label for="University">{{__('University')}}</label>
                              <input type="text" name="university"value="{{ old('university') }}"class="form-control" id="University" placeholder="">
                            </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <label for="Country">{{__('Country')}}</label>
                                <input type="text" name="country"value="{{ old('country') }}"class="form-control" id="Country" placeholder="">
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <label for="Graduation Year">{{__('Graduation Year')}}</label>
                                <input name="graduationYear"value="{{ old('graduationYear') }}"type="date" class="form-control" id="Graduation Year" placeholder="">
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <label for="Graduation Rate">{{__('Graduation Rate')}}</label>
                                <input name="graduationRate"value="{{ old('graduationRate') }}"type="text" class="form-control" id="Graduation Rate" placeholder="">
                              </div>
                          </td>
                          <td>
                            <div class="form-group">
                              <label for="Specialization">{{__('Specialization')}}</label>
                              <input type="text" name="specialization"value="{{ old('specialization') }}"class="form-control" id="Specialization" placeholder="">
                            </div>
                        </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6">
                                {{-- <button type="button" class="btn_add btn btn-primary">{{ __('add_another_product') }}</button> --}}
                                <button id="btnShow"class="btn btn-primary" onclick="newqualification()"><i class="fas fa-plus" aria-hidden="true"></i> {{__('Add qualification')}}</button>

                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="text-right pt-3">
                    <button type="submit" name="save" class="btn btn-primary">{{ __('save') }}</button>
                </div>
            </form>
    </div>
    {{-- two --}}
    <div id="dialog"class="tab-pane fade" style="width:70%;margin:auto;margin-top:5px;position:fixed;display:none;"role="tabpanel" aria-labelledby="Qualifications-tab">
         <p>{{__('Add a new qualification')}}</p>
             <div class="form-group">
              <label for="Qualification">{{__('Qualification')}}</label>
              <select name="qualification"id="Qualification"class="form-select form-select-sm" aria-label=".form-select-sm example">
                  <option selected value="Doctorate">{{__('Doctorate')}}</option>
                  <option value="Master">{{__('Master')}}</option>
                  <option value="Diploma">{{__('Diploma')}}</option>
                  <option value="Certificate">{{__('Certificate')}}</option>
                  <option value="Other">{{__('Other')}}</option>
              </select>
            </div>
          <br><div class="form-group">
            <label for="University">{{__('University')}}</label>
            <input type="text" name="university"value="{{ old('university') }}"class="form-control" id="University" placeholder="">
          </div>
            <br><div class="form-group">
              <label for="Country">{{__('Country')}}</label>
              <input type="text" name="country"value="{{ old('country') }}"class="form-control" id="Country" placeholder="">
            </div>
            <br><div class="form-group">
              <label for="Graduation Year">{{__('Graduation Year')}}</label>
              <input name="graduationYear"value="{{ old('graduationYear') }}"type="date" class="form-control" id="Graduation Year" placeholder="">
            </div>
            <br><div class="form-group">
              <label for="Graduation Rate">{{__('Graduation Rate')}}</label>
              <input name="graduationRate"value="{{ old('graduationRate') }}"type="text" class="form-control" id="Graduation Rate" placeholder="">
            </div>
            <br><div class="form-group">
              <label for="Specialization">{{__('Specialization')}}</label>
              <input type="text" name="specialization"value="{{ old('specialization') }}"class="form-control" id="Specialization" placeholder="">
            </div><br>
            <button type="submit" class="btn btn-primary">{{__('Add')}}</button>
            <button type="submit" class="btn btn-light">{{__('Close')}}</button>
      </div>
  {{--end two  --}}

      <div style="width:70%;margin:auto;" id="pay" class="tab-pane fade"  role="tabpanel" aria-labelledby="pay-tab">
        <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Payment method">{{__('Payment method')}}</label>
                <select name="payment"id="Payment method"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected value="cash">{{__('Cash to the Central Syndicate Fund in Damascus')}}</option>
                    <option value="real estate bank">{{__('Syndicate account with the real estate bank number 11011418 in all countries')}}</option>
                    <option value="Francbank">{{__('Syndicate account with Francbank Bank number 0004204801 in Damascus,Aleppo,Tartous and Latakia')}}</option>
                 </select>
              </div>
            </div>
          </div>
    <button type="submit" class="btn btn-primary">{{__('Send')}}</button>
      <div style="background:#e0c2c2;">
        <ul style="list-style-type:disc;list-style-position: inside;padding-left:15px">
          <li>{{__('Name field is required')}}</li>
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
          <li>{{__('Desire to display data on the site field is required')}}</li>
      </ul>
    </div>
    </div>
</form>
</x-layouts.app>



    {{-- onclick="newqualification()" --}}



   {{-- <div class="form-group">
            <label for="Qualification">{{__('Qualification')}}</label>
            <select name="qualification"id="Qualification"class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected value="Doctorate">{{__('Doctorate')}}</option>
                <option value="Master">{{__('Master')}}</option>
                <option value="Diploma">{{__('Diploma')}}</option>
                <option value="Certificate">{{__('Certificate')}}</option>
                <option value="Other">{{__('Other')}}</option>
            </select>
          </div> --}}
        {{-- <br><div class="form-group">
          <label for="University">{{__('University')}}</label>
          <input type="text" name="university"value="{{ old('university') }}"class="form-control" id="University" placeholder="">
        </div> --}}
          {{-- <br><div class="form-group">
            <label for="Country">{{__('Country')}}</label>
            <input type="text" name="country"value="{{ old('country') }}"class="form-control" id="Country" placeholder="">
          </div>
          <br><div class="form-group">
            <label for="Graduation Year">{{__('Graduation Year')}}</label>
            <input name="graduationYear"value="{{ old('graduationYear') }}"type="date" class="form-control" id="Graduation Year" placeholder="">
          </div>
          <br><div class="form-group">
            <label for="Graduation Rate">{{__('Graduation Rate')}}</label>
            <input name="graduationRate"value="{{ old('graduationRate') }}"type="text" class="form-control" id="Graduation Rate" placeholder="">
          </div>
          <br><div class="form-group">
            <label for="Specialization">{{__('Specialization')}}</label>
            <input type="text" name="specialization"value="{{ old('specialization') }}"class="form-control" id="Specialization" placeholder="">
          </div><br> --}}
