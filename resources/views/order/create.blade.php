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

      <ul class="nav nav-tabs"style="width:70%;margin:auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#Personal data" data-bs-target="#Personal">{{__('Personal data')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact information">{{__('contact information')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Qualifications">{{__('Qualifications')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#How to pay the affiliation fee" tabindex="-1" aria-disabled="true">{{__('How to pay the affiliation fee')}}</a>
        </li>
      </ul>
      {{-- البيانات الشخصية --}}
      <form id="Personal data"style="width:70%;margin:auto">
        {{-- <div class="form-group">
          <label for="exampleInputEmail1">{{__('name')}}</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        </div>
        <br><div class="form-group">
          <label for="exampleInputPassword1">{{__('nickname')}}</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
        </div> --}}
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
      </form>
      {{-- معلومات الاتصال --}}
      <form id="contact information"style="width:70%;margin:auto">
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
                <input type="email" id="Site" class="form-control" />
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="">{{__('')}}</label>
                <input type="text" id="" class="form-control" />
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="">{{__('')}}</label>
                <input type="email" id="" class="form-control" />
              </div>
            </div>
          </div>
      </form>

</x-layouts.app>
