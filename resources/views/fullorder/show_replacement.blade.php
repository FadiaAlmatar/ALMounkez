<x-layouts.app>
    <br>
    <h1 class="h1-fullorder">{{__('Request for a replacement membership card')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <strong style="font-size:13px;">{{__('Based on decision of the Board of Directors in its session No. 36 held on the date 27/04/2016 containing the determination of the amount 1000 SYP of the value of a membership card:(Consists-Lost)')}}</strong>
        <br><br><h1 style="text-align: center;font-weight:bold;background-color:rgb(199, 198, 198);font-size:18px;">{{__('Filled out by the affiliate')}}</h1>
        <form action="{{ route('fullorders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="type" value="replacement" hidden>
        <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership card instead: ')}}
            <div class="form-check">
                @if($fullorder->replace_reasons == "lost")
                <input class="form-check-input" type="checkbox" value="" id="Lost" name="replace_reason" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif checked>
                <label class="form-check-label" for="Lost">
                  {{__('Lost (police decision attached)')}}
                {{-- <input class="form-control" type="file" accept="image/*"id="police_image" name="police_image" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                    @error('police_image')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror --}}
                </label>
            </div>
            @elseif($fullorder->replace_reasons == "consists")
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="Consists" name="replace_reason" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif checked>
                <label class="form-check-label" for="Consists">
                  {{__('Consists (damaged card attached) reason: ')}}
                  {{-- <input class="form-control" type="file" accept="image/*"id="damaged_card_image" name="damaged_card_image" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                  @error('damaged_card_image')
                  <p class="help is-danger">{{ $message }}</p>
                  @enderror --}}
                </label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="Modification" name="Consists" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                    <label id="labelmodification"class="form-check-label" for="Lost">
                      {{__('Modification of personal data')}}<br>
                       <label for="formFile" class="form-label" style="font-size: 13px;">{{__('Judgment decision attached')}}</label>
                       {{-- <input class="form-control" type="file" accept="image/*"id="judgment_decision_image" name="judgment_decision_image" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                       @error('judgment_decision_image')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror --}}
                        <label for="formFile" class="form-label"style="font-size: 13px;" >{{__('Passport image')}}</label>
                        {{-- <input class="form-control" type="file" accept="image/*"id="passport_image" name="passport_image" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                        @error('passport_image')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror --}}
                        <label for="formFile" class="form-label"style="font-size: 13px;" >{{__('Personal identification image')}}</label>
                        {{-- <input class="form-control" type="file" accept="image/*"id="personal_identification_image" name="personal_identification_image" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                        @error('personal_identification_image')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror --}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="personal" name="Consists" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif>
                    <label id="labelpersonal"class="form-check-label" for="Consists">
                      {{__('personal image')}}<br>
                    </label>
                </div>
            </div>
            @elseif($fullorder->replace_reasons == "transfer")
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="Transfer" name="replace_reason" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif checked>
                <label class="form-check-label" for="Transfer">
                    {{__('Transfer from branch to branch')}}
                </label>
            </div>
            @else
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="error"name="replace_reason" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif checked>
                <label class="form-check-label" for="error">
                    {{__('Card incoming error')}}<span>{{__('(caused by the member)')}}</span>
                </label>
            </div>
            @endif
        </p>
        {{-- التعديلات المطلوب وضعها على بطاقة العضوية الجديدة --}}
        <hr>
        <p style="font-weight: bold;text-align: center;">{{__('Required modifications to be made on the new membership card')}}</p>
        <hr>
        <table class="table table-bordered">
              <tr>
                <th scope="col" style="width:30%">{{__('FullName/Arabic')}}</th>
                <td ><input type="text" class="input @error('FullName_Arabic')is-danger @enderror"id="FullName/Arabic" name="FullName_Arabic"value="{{$fullorder->fullname_arabic}}"class="form-control" placeholder="{{__('Enter FullName/Arabic')}}" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif readonly/></td>
              </tr>
              <tr>
                <th scope="col">{{__('FullName/English to be placed on the new card')}}</th>
                <td ><input type="text" class="input @error('FullName_English')is-danger @enderror"id="FullName/English" name="FullName_English"value="{{$fullorder->fullname_english }}"class="form-control" placeholder="{{__('Enter FullName/English')}}" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif readonly/></td>
              </tr>
              <tr>
                <th scope="col">{{__('Change personal image')}}</th>
                <td> <div class="mb-3">
                      <input class="form-control" type="file" accept="image/*"id="personal_image" name="personal_image" disabled>
                      @error('personal_image')
                          <p class="help is-danger">{{ $message }}</p>
                      @enderror
                  </div></td>
              </tr>
              <tr>
                <th scope="col">{{__('The new membership number')}} <br>{{__('when transferring from one branch to another')}}</th>
                <td ><input type="text" class="input @error('newMembershipNumber')is-danger @enderror"id="newMembershipNumber" name="newMembershipNumber"value="{{ $fullorder->newmembership_number }}"class="form-control" placeholder="{{__('Enter new Membership Number')}}" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif readonly/></td>
              </tr>
          </table>
{{-- membership only --}}
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">{{__('User ID')}}</th>
                <th scope="col" >{{__('Membership ID')}}</th>
                <th scope="col">{{__('Request Date')}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width:24%"><input type="text" class="input"id="" name=""value="{{ Auth::User()->id}}"class="form-control" placeholder="" readonly/></p></td>
                <td style="width:24%"><input type="text" class="input"id="" name=""value="{{$fullorder->membership_id}}"class="form-control" placeholder="" readonly/></td>
                <td style="width:24%"><input type="text" class="input"id="" name=""value="{{ date("Y-m-d h:i A", strtotime($fullorder->created_at))}}"class="form-control" placeholder="" readonly /></td>
            </tr>
        </tbody>
        </table>
        </form>
        <p style="text-align:center;font-size:13px;font-weight:bold;">{{__('Your request will be considered within a maximum period of two days. Please contact us')}}</p>
        <hr style="width:40%;margin:auto">
{{-- manager only --}}
{{--  بيان الدارة الماليةللفرع --}}
<form action="{{ route('fullorders.store_order',$fullorder->id) }}" method="POST" >
    @csrf
    <input name="type" value="replacement" hidden>
    <p style="font-weight: bold;display:inline-block;width:40%">{{__('Branch financial management statement:')}}</p>
    <div class="status">
        {{-- @if (app()->getLocale() == 'ar')
        <select name="status"class="input @error('status')is-danger @enderror" class="form-select" aria-label="Default select example" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
            <option selected></option>
            {{-- <option value="under consideration">    {{__('under consideration')}}    </option> --}}
            {{-- <option value="مطلوب تسديد القيمة">
                      {{__('مطلوب تسديد القيمة')}}</option>
            <option value="يرجى الاستلام">
                 {{__('يرجى الاستلام')}}</option>
            <option value="لم تتم الموافقة">
                {{__('لم تتم الموافقة')}}</option>
            <option value="بحاجة لاستكمال الأوراق">
                 {{__('بحاجة لاستكمال الأوراق')}}</option>
        </select>
        @else --}}
        <label>{{__('order status')}}</label>
        <select name="status"class="input @error('status')is-danger @enderror" class="form-select" aria-label="Default select example" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
            <option selected></option>
            {{-- <option value="under consideration">    {{__('under consideration')}}    </option> --}}
            <option @if(app()->getLocale() == 'ar') value="{{__('Payment required')}}" @else value="Payment required" @endif>{{__('Payment required')}} </option>
            <option @if(app()->getLocale() == 'ar') value="{{__('Please pick up')}}" @else value="Please pick up" @endif>    {{__('Please pick up')}}   </option>
            <option @if(app()->getLocale() == 'ar') value="{{__('not confirmed')}}" @else value="not confirmed" @endif>      {{__('not confirmed')}}    </option>
            <option @if(app()->getLocale() == 'ar') value="{{__('Need to complete papers')}}" @else value="Need to complete papers" @endif>{{__('Need to complete papers')}}</option>
            <option @if(app()->getLocale() == 'ar') value="{{__('Finished')}}" @else value="Finished" @endif>               {{__('Finished')}}</option>
    </select>
        {{-- @endif --}}
        @error('status')
         <p class="help is-danger">{{ $message }}</p>
        @enderror
        </div>
       <br>
        {{-- <hr style="width:75%"> --}}
    <p style="display:inline">{{__('Mr.')}} <span style="font-weight: bold">{{Auth::User()->name}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
        {{__('We inform you that he is registered in the Syndicate in year ...... and : ')}}</p>&nbsp;
    <div class="form-check">
        <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="{{0}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
        <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="{{1}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
        <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
        {{__('equal ')}}<input type="text" class="input @error('money_debt')is-danger @enderror input-fullorder"id="money_debt" name="money_debt"value="{{ old('money_debt') }}"class="form-control" placeholder="{{__('Enter debt money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}}<br>
    </div><br>
    <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}
        <input type="text" class="input @error('money_order')is-danger @enderror input-fullorder"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}}</p>
{{--  بيان أمين الصندوق--}}
            <hr>
            <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p>
            <p>{{__('Amount has been received ')}}
                <input type="text" class="input @error('money_order')is-danger @enderror input-fullorder"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}}</p>
{{-- قرار رئيس مجلس الإدارة --}}
            <hr>
        <p style="font-weight: bold;">{{__("Chairman's decision: ")}}</p>
        <div>
            <label style="display:inline;width:70%;"class="form-label" for="approval">{{__('Approval')}}</label>
            <select style="width:10%"class="input @error('Chairman_decision')is-danger @enderror"name="Chairman_decision"id="Chairman_decision"class="form-select form-select-sm" aria-label=".form-select-sm example" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
                <option></option>
                <option value="1" @if (old('Chairman_decision') == "1") {{ 'selected' }} @endif>{{__('Approval')}}</option>
                <option value="0" @if (old('Chairman_decision') == "0") {{ 'selected' }} @endif>{{__('Disapproval')}} </option>
             </select>
             @error('approval')
               <p class="help is-danger">{{ $message }}</p>
             @enderror
             <div class="form-group">
                <label for="reasons">{{__('reasons :(If not approved)')}}</label>
                <textarea name="Chairman_disapproval_reasons"class="form-control" id="reasons" rows="2" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif></textarea><br>
            </div>
        </div>
        @if(Auth::User()->role == "admin")<button type="submit" class="btn btn-primary">{{__('Send')}}</button><br><br>@endif
</form>
    </div>
</x-layouts.app>
