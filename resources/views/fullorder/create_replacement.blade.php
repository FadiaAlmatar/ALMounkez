<x-layouts.app>
    <h1 style="text-align: center;font-weight:bold;text-decoration:underline;margin-top:5px;">{{__('Request for a replacement membership card')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <strong style="font-size:13px;">{{__('Based on decision of the Board of Directors in its session No. 36 held on the date 27/04/2016 containing the determination of the amount 1000 SYP of the value of a membership card:(Consists-Lost)')}}</strong><br>
        <hr><h1 style="text-align: center;font-weight:bold;font-size:18px">{{__('Filled out by the affiliate')}}</h1><hr>
        <form action="{!! !empty($fullorder) ? route('fullorders.update', $fullorder) : route('fullorders.store') !!}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (!empty($fullorder))
                @method('PUT')
            @endif
            <input name="type" value="replacement" hidden>
        <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership card instead: ')}}
            <div class="form-check">
                {{-- @if (!empty($fullorder) && old('replace_reason', $fullorder->replace_reasons))
                  <input value="{{ $fullorder->replace_reasons }}" checked>
                @endif --}}
                @if (!empty($fullorder) && ( $fullorder->replace_reasons == "lost"))
                <input class="form-check-input" type="radio" value="{{ $fullorder->replace_reasons }}" checked>
                <label class="form-check-label" for="Lost">
                    {{__('Lost (police decision attached)')}}
                  <input class="form-control" type="file" accept="image/*"id="police_image" name="police_image">
                      @error('police_image')
                      <p class="help is-danger">{{ $message }}</p>
                      @enderror
                  </label>
                @else
                <input class="form-check-input" type="radio" value="lost" {{ old('replace_reason') !== null && old('replace_reason') == "lost" ? 'checked' : '' }} id="Lost" name="replace_reason" >
                <label class="form-check-label" for="Lost">
                  {{__('Lost (police decision attached)')}}
                <input class="form-control" type="file" accept="image/*"id="police_image" name="police_image">
                    @error('police_image')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </label>
                @endif
            </div>
            <div class="form-check">
                <input  class="form-check-input" type="radio" value="consists" {{ old('replace_reason') !== null && old('replace_reason') == "consists" ? 'checked' : '' }} id="Consists" name="replace_reason"  disabled>
                <label class="form-check-label" for="Consists">
                  {{__('Consists (damaged card attached) reason: ')}}</label>
                  <input class="form-control" style="width:25%"type="file" accept="image/*"id="damaged_card_image" name="damaged_card_image" >
                  @error('damaged_card_image')
                  <p class="help is-danger">{{ $message }}</p>
                  @enderror
            </div>
            <div class="form-check">
                @if (!empty($fullorder) && ($fullorder->replace_reasons == "Modification"))
                <input class="form-check-input" type="radio" value="{{ $fullorder->replace_reasons }}" checked>
                <label id="labelmodification"class="form-check-label" for="Modification">
                    {{__('Modification of personal data')}}<br>
                       <label for="formFile" class="form-label" style="font-size: 13px;">{{__('Judgment decision attached')}}</label>
                       <input class="form-control" type="file" accept="image/*"id="judgment_decision_image" name="judgment_decision_image" >
                       @error('judgment_decision_image')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                        <label for="formFile" class="form-label"style="font-size: 13px;" >{{__('Passport image')}}</label>
                        <input class="form-control" type="file" accept="image/*"id="passport_image" name="passport_image" >
                        @error('passport_image')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                        <label for="formFile" class="form-label"style="font-size: 13px;" >{{__('Personal identification image')}}</label>
                        <input class="form-control" type="file" accept="image/*"id="personal_identification_image" name="personal_identification_image" >
                        @error('personal_identification_image')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </label>
                    @else
                <input  class="form-check-input" type="radio"  value="Modification" {{ old('replace_reason') !== null && old('replace_reason') == "Modification" ? 'checked' : '' }} id="Modification" name="replace_reason" >
                <label id="labelmodification"class="form-check-label" for="Modification">
                    {{__('Modification of personal data')}}<br>
                       <label for="formFile" class="form-label" style="font-size: 13px;">{{__('Judgment decision attached')}}</label>
                       <input class="form-control" type="file" accept="image/*"id="judgment_decision_image" name="judgment_decision_image" >
                       @error('judgment_decision_image')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                        <label for="formFile" class="form-label"style="font-size: 13px;" >{{__('Passport image')}}</label>
                        <input class="form-control" type="file" accept="image/*"id="passport_image" name="passport_image" >
                        @error('passport_image')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                        <label for="formFile" class="form-label"style="font-size: 13px;" >{{__('Personal identification image')}}</label>
                        <input class="form-control" type="file" accept="image/*"id="personal_identification_image" name="personal_identification_image" >
                        @error('personal_identification_image')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </label>
                    @endif
                </div>
                <div class="form-check">
                    @if (!empty($fullorder) && ($fullorder->replace_reasons == "personal"))
                    <input class="form-check-input" type="radio" value="{{ $fullorder->replace_reasons }}" checked>
                    <label id="labelpersonal"class="form-check-label" for="personal">
                        {{__('personal image')}}<br>
                      </label>
                    @else
                    <input  class="form-check-input" type="radio"  value="personal" {{ old('replace_reason') !== null && old('replace_reason') == "personal" ? 'checked' : '' }} id="personal" name="replace_reason" >
                    <label id="labelpersonal"class="form-check-label" for="personal">
                      {{__('personal image')}}<br>
                    </label>
                    @endif
                </div>
            {{-- </div> --}}
            <div class="form-check">
                @if (!empty($fullorder) && ($fullorder->replace_reasons == "Transfer"))
                <input class="form-check-input" type="radio" value="{{ $fullorder->replace_reasons }}" checked>
                <label class="form-check-label" for="Transfer">
                    {{__('Transfer from branch to branch')}}
                </label>
                @else
                <input class="form-check-input" type="radio"  value="transfer" {{ old('replace_reason') !== null && old('replace_reason') == "transfer" ? 'checked' : '' }} id="Transfer" name="replace_reason" @>
                <label class="form-check-label" for="Transfer">
                    {{__('Transfer from branch to branch')}}
                </label>
                @endif
            </div>
            <div class="form-check">
                @if (!empty($fullorder) && ($fullorder->replace_reasons == "error"))
                <input class="form-check-input" type="radio" value="{{ $fullorder->replace_reasons }}" checked>
                <label class="form-check-label" for="error">
                    {{__('Card incoming error')}}<span>{{__('(caused by the member)')}}</span>
                </label>
                 @else
                <input class="form-check-input" type="radio"  value="error" {{ old('replace_reason') !== null && old('replace_reason') == "error" ? 'checked' : '' }} id="error" name="replace_reason" >
                <label class="form-check-label" for="error">
                    {{__('Card incoming error')}}<span>{{__('(caused by the member)')}}</span>
                </label>
                @endif
            </div>
            {{-- @error('replace_reason')
            <p class="help is-danger">{{ $message }}</p>
            @enderror --}}
        </p>
        {{-- التعديلات المطلوب وضعها على بطاقة العضوية الجديدة --}}
        <hr>
        <p style="font-weight: bold;text-align: center;">{{__('Required modifications to be made on the new membership card')}}</p>
        <hr>
        <table class="table table-bordered">
              <tr>
                <th scope="col" style="width:30%">{{__('FullName/Arabic')}}</th>
                <td ><input type="text" class="input @error('FullName_Arabic')is-danger @enderror"id="FullName/Arabic" name="FullName_Arabic" value= "@if(!empty($fullorder)) {{$fullorder->fullname_arabic}} @else {{ old('FullName_Arabic') }} @endif"class="form-control" placeholder="{{__('Enter FullName/Arabic')}}" />
                    @error('FullName_Arabic')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </td>
              </tr>
              <tr>
                <th scope="col">{{__('FullName/English to be placed on the new card')}}</th>
                <td ><input type="text" class="input @error('FullName_English')is-danger @enderror"id="FullName/English" name="FullName_English" value= "@if(!empty($fullorder)) {{$fullorder->fullname_english}} @else {{ old('FullName_English') }} @endif" class="form-control" placeholder="{{__('Enter FullName/English')}}" />
                @error('FullName_English')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
                </td>
            </tr>
              <tr>
                <th scope="col">{{__('Change personal image')}}</th>
                <td> <div class="mb-3">
                      <input class="form-control" type="file" accept="image/*"id="personal_image" name="personal_image" >
                      @error('personal_image')
                          <p class="help is-danger">{{ $message }}</p>
                      @enderror
                  </div></td>
              </tr>
              <tr>
                <th scope="col">{{__('The new membership number')}} <br>{{__('when transferring from one branch to another')}}</th>
                <td ><input type="text" class="input @error('newMembershipNumber')is-danger @enderror" id="newMembershipNumber" name="newMembershipNumber" value="@if(!empty($fullorder)) {{$fullorder->newmembership_number}} @else {{ old('newMembershipNumber') }} @endif" class="form-control" placeholder="{{__('Enter new Membership Number')}}" /></td>
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
        </table>
        @if (!empty($fullorder))
             <button type="submit" class="btn btn-primary">{{__('Edit')}}</button><br>
        @else
             <button type="submit" class="btn btn-primary">{{__('Create')}}</button><br>
        @endif
        </form>
        <p style="text-align:center;font-size:13px;font-weight:bold;">{{__('Your request will be considered within a maximum period of two days. Please contact us')}}</p>
        <hr style="width:40%;margin:auto"><br>
{{-- manager only --}}
{{--  بيان الدارة الماليةللفرع --}}
    <p style="font-weight: bold;">{{__('Branch financial management statement:')}}</p><hr>
    <p style="display:inline">{{__('Mr.')}} <span style="font-weight: bold">{{Auth::User()->name}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
        {{__('We inform you that he is registered in the Syndicate in year 20')}}{{Auth::User()->order->created_at->format('y')}} {{__('and : ')}}</p>&nbsp;
    <div class="form-check">
        <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="option1" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
        <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="option2" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif>
        <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
        {{__('equal ')}}<input style="width:150px;"type="text" class="input @error('money_debt')is-danger @enderror"id="money_debt" name="money_debt"value="{{ old('money_debt') }}"class="form-control" placeholder="{{__('Enter debt money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}}<br>
    </div><br>
    <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}
        <input style="width:150px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter debt order')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}}</p>
{{--  بيان أمين الصندوق--}}
            <hr>
            <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p>
            <p>{{__('Amount has been received ')}}
                <input style="width:170px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" @if(Auth::User()->role == "user"){{ 'disabled' }} @endif/>{{__(' SYP')}}</p>
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
        {{-- @if(Auth::User()->role == "admin")<button type="submit" class="btn btn-primary">{{__('Send')}}</button><br><br>@endif --}}
    </div>
</x-layouts.app>
