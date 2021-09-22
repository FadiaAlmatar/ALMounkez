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
      <div class="tab-content" id="myTabContent" style="margin-bottom: 5px;">
      {{-- البيانات الشخصية --}}
      <div id="Personal" style="width:70%;margin:auto;margin-top:5px;" class="tab-pane fade show active" role="tabpanel" aria-labelledby="Personal-tab">
      <form>
        <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="name">{{__('name')}}</label>
                <input type="text" id="name" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="nickname">{{__('nickname')}}</label>
                <input type="text" id="nickname" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="father name">{{__('father name')}}</label>
                <input type="text" id="father name" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="grandfather name">{{__('grandfather name')}}</label>
                <input type="text" id="grandfather name" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="mother name">{{__('mother name')}}</label>
                <input type="text" id="mother name" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Gender">{{__('Gender')}}</label>
                <select id="Gender"class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>{{__('Male')}}</option>
                <option value="1">{{__('Female')}}</option>
              </select>
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="fathername/english">{{__('fathername/english')}}</label>
                <input type="text" id="fathername/english" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="mothername/english">{{__('mothername/english')}}</label>
                <input type="text" id="mothername/english" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Nationality">{{__('Nationality')}}</label>
                <select id="Nationality"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>{{__('Syrian')}}</option>
                    <option value="1">{{__('Palestinian')}}</option>
                  </select>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Martial status">{{__('Martial status')}}</label>
                <select id="Martial status"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>{{__('Unmarried')}}</option>
                    <option value="1">{{__('Married')}}</option>
                    <option value="2">{{__('Divorced')}}</option>
                    <option value="2">{{__('Widower')}}</option>
                 </select>
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Place of birth">{{__('Place of birth')}}</label>
                <input type="text" id="Place of birth" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Date of birth">{{__('Date of birth')}}</label>
                <input type="text" id="Date of birth" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="National ID">{{__('National ID')}}</label>
                <input type="text" id="National ID" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Civil Registry">{{__('Civil Registry')}}</label>
                <input type="text" id="Civil Registry" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Personal Identification Number">{{__('Personal Identification Number')}}</label>
                <input type="text" id="Personal Identification Number" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Identity Grant Date">{{__('Identity Grant Date')}}</label>
                <input type="text" id="Identity Grant Date" class="form-control" />
              </div>
            </div>
          </div>
       <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="Constraint">{{__('Constraint')}}</label>
            <input type="text" id="Constraint" class="form-control" />
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="Military">{{__('Military')}}</label>
            <select id="Military"class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>{{__('Finished')}}</option>
                <option value="1">{{__('Delayed')}}</option>
                <option value="2">{{__('Exempt')}}</option>
             </select>
          </div>
        </div>
      </div>
       <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="Public Record Number">{{__('Public Record Number')}}</label>
            <input type="text" id="Public Record Number" class="form-control" />
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="Health Status">{{__('Health Status')}}</label>
            <select id="Health Status"class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>{{__('Good')}}</option>
                <option value="1">{{__('Sick')}}</option>
             </select>
          </div>
        </div>
      </div>
      </form></div>
      {{-- معلومات الاتصال --}}
      <div style="width:70%;margin:auto;margin-top:5px" class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      <form >
        <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="country you wish to join">{{__('country you wish to join')}}</label>
                <select id="country you wish to join"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>{{__('Damascus')}}</option>
                    <option value="1">{{__('Damascus Rural')}}</option>
                    <option value="1">{{__('Suwayda')}}</option>
                    <option value="1">{{__('Daraa')}}</option>
                    <option value="1">{{__('Quneitra')}}</option>
                    <option value="1">{{__('Homs')}}</option>
                    <option value="1">{{__('Hama')}}</option>
                    <option value="1">{{__('Latakia')}}</option>
                    <option value="1">{{__('Tartous')}}</option>
                    <option value="1">{{__('Idlib')}}</option>
                    <option value="1">{{__('Aleppo')}}</option>
                    <option value="1">{{__('Al-Rakka')}}</option>
                    <option value="1">{{__('Deer Al Zour')}}</option>
                    <option value="1">{{__('Al-Hasakah')}}</option>
                 </select>
              </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Address">{{__('Address')}}</label>
                <input type="text" id="Address" class="form-control" />
              </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="House Phone">{{__('House Phone')}}</label>
                <input type="text" id="House Phone" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Work Phone">{{__('Work Phone')}}</label>
                <input type="text" id="Work Phone" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Mobile">{{__('Mobile')}}</label>
                <input type="text" id="Mobile" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="E-mail">{{__('E-mail')}}</label>
                <input type="email" id="E-mail" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Fax">{{__('Fax')}}</label>
                <input type="text" id="Fax" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Site">{{__('Site')}}</label>
                <input type="text" id="Site" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="work at government">{{__('work at government')}}</label>
                <select id="work at government"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>{{__('Worker at government')}}</option>
                    <option value="1">{{__('not Worker at government')}}</option>
                 </select>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="work side">{{__('work side')}}</label>
                <input type="text" id="work side" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Insurance number">{{__('Insurance number')}}</label>
                <input type="text" id="Insurance number" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="display your data">{{__('Do you want to display your data on the site (contact information only) after approving the affiliation request?')}}</label>
                <select id="display your data"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>{{__('Yes')}}</option>
                    <option value="1">{{__('No')}}</option>
                 </select>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">{{__('Send')}}</button>
      </form>
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
      <div class="tab-pane fade" style="width:70%;margin:auto;margin-top:5px"id="Qualifications" role="tabpanel" aria-labelledby="Qualifications-tab">
      <form>
        <p>{{__('Add a new qualification')}}</p>
           <div class="form-group">
            <label for="Qualification">{{__('Qualification')}}</label>
            <select id="Qualification"class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>{{__('Doctorate')}}</option>
                <option value="1">{{__('Master')}}</option>
                <option value="2">{{__('Diploma')}}</option>
                <option value="2">{{__('Certificate')}}</option>
                <option value="2">{{__('Other')}}</option>
            </select>
          </div>
        <br><div class="form-group">
          <label for="University">{{__('University')}}</label>
          <input type="text" class="form-control" id="University" placeholder="">
        </div>
          <br><div class="form-group">
            <label for="Country">{{__('Country')}}</label>
            <input type="text" class="form-control" id="Country" placeholder="">
          </div>
          <br><div class="form-group">
            <label for="Graduation Year">{{__('Graduation Year')}}</label>
            <input type="text" class="form-control" id="Graduation Year" placeholder="">
          </div>
          <br><div class="form-group">
            <label for="Graduation Rate">{{__('Graduation Rate')}}</label>
            <input type="text" class="form-control" id="Graduation Rate" placeholder="">
          </div>
          <br><div class="form-group">
            <label for="Specialization">{{__('Specialization')}}</label>
            <input type="text" class="form-control" id="Specialization" placeholder="">
          </div><br>
          <button type="submit" class="btn btn-primary">{{__('Add')}}</button>
          <button type="submit" class="btn btn-light">{{__('Close')}}</button>
      </form></div>
      <div style="width:70%;margin:auto;" id="pay" class="tab-pane fade"  role="tabpanel" aria-labelledby="pay-tab">
      <form>
        <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Payment method">{{__('Payment method')}}</label>
                <select id="Payment method"class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>{{__('Cash to the Central Syndicate Fund in Damascus')}}</option>
                    <option value="1">{{__('Syndicate account with the real estate bank number 11011418 in all countries')}}</option>
                    <option value="1">{{__('Syndicate account with Francbank Bank number 0004204801 in Damascus,Aleppo,Tartous and Latakia')}}</option>
                 </select>
              </div>
            </div>
          </div>
      </form>
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
</x-layouts.app>
