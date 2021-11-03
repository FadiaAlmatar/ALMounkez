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
            <div class="tab-content" id="nav-tabContent" style="margin-bottom:5px;">
    {{-- البيانات الشخصية --}}
          <div id="Personal"  class="tab-pane fade show active" role="tabpanel" aria-labelledby="Personal-tab">
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="name">{{__('name*')}}</label>
                    <input type="text" class="input" id="name" name="name" value="{{ $order->firstname }}"class="form-control" readonly/>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="nickname">{{__('nickname*')}}</label>
                    <input type="text" class="input" id="nickname" name="nickname"value="{{ $order->lastname  }}"class="form-control" readonly/>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="fathername">{{__('father name*')}}</label>
                    <input type="text" class="input" id="fathername" name="fathername"value="{{ $order->father_name }}"class="form-control" readonly/>
                </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="grandfather name">{{__('grandfather name*')}}</label>
                    <input type="text" class="input" id="grandfather name" name="grandfathername"value="{{ $order->grandfather_name }}"class="form-control" readonly/>
                </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="mother name">{{__('mother name*')}}</label>
                    <input type="text" class="input" name="mothername"value="{{ $order->mother_name }}"class="form-control" readonly/>
                </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Gender">{{__('Gender')}}</label>
                        <input type="text" class="input" value="{{__($order->gender)}}" class="form-control" readonly/>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="fname/english">{{__('fname/english*')}}</label>
                    <input type="text" class="input"id="fname/english" name="fnameenglish"value="{{ $order->english_firstname }}"class="form-control" readonly/>
                </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="lname/english">{{__('lname/english*')}}</label>
                    <input type="text" class="input" id="lname/english" name="lnameenglish"value="{{ $order->english_lastname }}"class="form-control" readonly/>
                </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="fathername/english">{{__('fathername/english*')}}</label>
                    <input type="text" class="input"id="fathername/english" name="fathernameenglish"value="{{ $order->english_father_name }}"class="form-control" readonly/>
                </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="mothername/english">{{__('mothername/english*')}}</label>
                    <input type="text" class="input"id="mothername/english" name="mothernameenglish"value="{{ $order->english_mother_name }}"class="form-control" readonly/>
                </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Nationality">{{__('Nationality')}}</label>
                        <input type="text" class="input" value="{{__($order->Nationality)}}"class="form-control" readonly/>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Martial status">{{__('Martial status')}}</label>
                        <input type="text" class="input" value="{{__($order->Marital_status)}}"class="form-control" readonly/>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Place of birth">{{__('Place of birth*')}}</label>
                    <input type="text" class="input"name="placeBirth"value="{{ $order->place_of_birth}}"id="Place of birth" class="form-control" readonly/>
                </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Date of birth">{{__('Date of birth*')}}</label>
                    <input type="date" class="input"name="dateBirth"value="{{ $order->date_of_birth}}"id="Date of birth" class="form-control" readonly/>
                </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="National ID">{{__('National ID*')}}</label>
                    <input type="text" class="input"name="nationalID"value="{{ $order->national_id }}"id="National ID" class="form-control" readonly/>
                </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Civil Registry">{{__('Civil Registry*')}}</label>
                    <input type="text" class="input"name="civilRegistry" value="{{$order->civil_registry_secretariat}}"id="Civil Registry" class="form-control" readonly/>
                </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Personal Identification Number">{{__('Personal Identification Number*')}}</label>
                    <input type="text" class="input"name="personalIdentificationNumber"value="{{ $order->personal_identification_number }}"id="Personal Identification Number" class="form-control" readonly/>
                </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Identity Grant Date">{{__('Identity Grant Date*')}}</label>
                    <input type="date" class="input"name="identityGrantDate"value="{{ $order->Identity_grant_date }}"id="Identity Grant Date" class="form-control" readonly/>
                </div>
                </div>
              </div>
           <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Constraint">{{__('Constraint*')}}</label>
                <input type="text" class="input"name="constraint"value="{{ $order->constraint}}"id="Constraint" class="form-control" readonly/>
            </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Military">{{__('Military')}}</label>
                    <input type="text" class="input" value="{{__($order->military)}}"class="form-control" readonly/>
              </div>
            </div>
          </div>
           <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Public Record Number">{{__('Public Record Number')}}</label>
                <input type="text" class="input"name="publicRecordNumber"value="{{$order->public_record_number }}"id="Public Record Number" class="form-control" readonly/>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <label class="form-label" for="Health Status">{{__('Health Status')}}</label>
                    <input type="text" class="input" value="{{__($order->Health_status)}}"class="form-control" readonly/>
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
                        <input type="text"class="input" value="{{__($order->Affiliation_country)}}"class="form-control" readonly/>
                  </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Address">{{__('Address*')}}</label>
                    <input class="input"type="text" name="address"value="{{ $order->address }}"id="Address" class="form-control" readonly />
                </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="House Phone">{{__('House Phone')}}</label>
                    <input type="text" class="input"name="housePhone"value="{{$order->house_phone}}"id="House Phone" class="form-control" readonly/>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Work Phone">{{__('Work Phone')}}</label>
                    <input type="text" class="input"name="workPhone"value="{{ $order->work_phone }}"id="Work Phone" class="form-control" readonly/>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Mobile">{{__('Mobile')}}</label>
                    <input type="text" class="input"name="mobile"value="{{ $order->mobile }}"id="Mobile" class="form-control" readonly/>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="E-mail">{{__('E-mail')}}</label>
                    <input type="email" class="input"name="email"value="{{ $order->email}}"id="E-mail" class="form-control" readonly/>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Fax">{{__('Fax')}}</label>
                    <input type="text" class="input"name="fax"value="{{$order->fax }}"id="Fax" class="form-control" readonly />
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Site">{{__('Site')}}</label>
                    <input type="text" class="input"name="site"value="{{ $order->site }}"id="Site" class="form-control" readonly/>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="work at government">{{__('work at government')}}</label>
                        @if ($order->work_in_government == 1)
                        <input type="text"class="input" value="{{__('Worker at government')}}"class="form-control" readonly/>
                        @else
                        <input type="text" class="input" value="{{__('not Worker at government')}}"class="form-control" readonly/>
                        @endif
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="work side">{{__('work side')}}</label>
                    <input type="text"class="input" name="workSide"value="{{ $order->side_work}}"id="work side" class="form-control" readonly/>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Insurance number">{{__('Insurance number')}}</label>
                    <input type="text" class="input"name="insurance"value="{{ $order->insurance_number }}"id="Insurance number" class="form-control" readonly/>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label style="display:inline;width:70%;"class="form-label" for="display your data">{{__('Do you want to display your data on the site (contact information only) after approving the affiliation request?*')}}</label>
                        @if($order->displayData == 1)
                        <input type="text" style="width:10%"class="input" value="{{__('Yes')}}"class="form-control" readonly/>
                        @else
                        <input type="text" style="width:10%"class="input" value="{{__('No')}}"class="form-control" readonly/>
                        @endif
                  </div>
                </div>
              </div>
              <div class="mb-3" >
                <label for="formFile" class="form-label">{{__('Identity image')}}</label>
                <img src ="{{asset("storage/identity-images/$order->identity_image")}}">
              </div>
              <div class="mb-3">
                 <label for="formFile" class="form-label">{{__('Personal image')}}</label>
                <img src ="{{asset("storage/personal-images/$order->personal_image")}}">
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">{{__('Certification image')}}</label>
                <img src ="{{asset("storage/certification-images/$order->certification_image")}}">
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">{{__('No Conviction image')}}</label>
                <img src ="{{asset("storage/no_conviction-images/$order->no_conviction_image")}}">
              </div>
          <div style="background:#ccc9da;margin-top:5px">
           <ul style="list-style-type:disc;list-style-position: inside;padding-left:15px">
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
                            @for ($i = 0; $i < sizeof($order->qualifications); $i++)
                                <tr class="cloning_row" id="0">
                                    <td></td>
                                    <td><input class="input"type="text" name="qualification[0]"value="{{ $order->qualifications[$i]->qualification}}"class="form-control" id="Qualification" placeholder="" readonly></td>
                                    <td><input class="input"type="text" name="specialization[0]"value="{{ $order->qualifications[$i]->Specialization }}"class="form-control" id="Specialization" placeholder="" readonly></td>
                                    <td><input class="input"type="text" name="side[0]"value="{{ $order->qualifications[$i]->side }}"class="form-control" id="Side" placeholder="" readonly></td>
                                    <td><input class="input"type="text" name="country[0]"value="{{ $order->qualifications[$i]->country}}"class="form-control" id="Country" placeholder="" readonly></td>
                                    <td><input class="input"name="finishYear[0]"value="{{ $order->qualifications[$i]->finishyear }}" type="text" class="form-control" id="Year" placeholder="" readonly></td>
                                    <td><input class="input"name="Rate[0]"value="{{ $order->qualifications[$i]->rate }}"type="text" class="form-control" id="Rate" placeholder="" readonly></td>
                                </tr>
                            @endfor
                            </tbody>
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
                     @if($order->pay_affiliation_fee == "cash")
                     <input type="text" class="input" value="{{__('Cash to the Central Syndicate Fund in Damascus')}}" class="form-control" readonly/>
                  @elseif($order->pay_affiliation_fee == "real estate bank")
                  <input type="text" class="input" value="{{__('Syndicate account with the real estate bank number 11011418 in all countries')}}" class="form-control" readonly/>
                  @else
                  <input type="text" class="input" value="{{__('Syndicate account with Francbank Bank number 0004204801 in Damascus,Aleppo,Tartous and Latakia')}}" class="form-control" readonly/>
                  @endif

                  </div>
                </div>
              </div>
        <a href="{{route('orders.printorder',$order->id)}}" id="printorder"class="btn btn-danger btn-md active" role="button" aria-pressed="true">PDF</a><br><br>
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
    </x-layouts.app>



















