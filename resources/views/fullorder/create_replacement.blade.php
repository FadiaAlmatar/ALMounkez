<x-layouts.app>
    <h1 style="text-align: center;font-weight:bold;text-decoration:underline;margin-top:5px;">{{__('Request for a replacement membership card')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <strong style="font-size:13px;">{{__('Based on decision of the Board of Directors in its session No. 36 held on the date 27/04/2016 containing the determination of the amount 1000 SYP of the value of a membership card:(Consists-Lost)')}}</strong><br><br>
        <hr><h1 style="text-align: center;font-weight:bold;">{{__('Filled out by the affiliate')}}</h1><hr>
        <form action="{{ route('fullorders.store') }}" method="POST" >
            @csrf
            <input name="type" value="replacement" hidden>
        <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership card instead: ')}}
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="Lost" name="replace_reason">
                <label class="form-check-label" for="Lost">
                  {{__('Lost (police decision attached)')}}
                </label>
                <input class="form-control" type="file" accept="image/*"id="police_image" name="police_image">
                    @error('police_image')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="Consists" name="replace_reason">
                <label class="form-check-label" for="Consists">
                  {{__('Consists (damaged card attached) reason: ')}}
                  <input class="form-control" type="file" accept="image/*"id="damaged_card_image" name="damaged_card_image">
                  @error('damaged_card_image')
                  <p class="help is-danger">{{ $message }}</p>
                  @enderror
                </label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="Modification" name="Consists">
                    <label id="labelmodification"class="form-check-label" for="Lost">
                      {{__('Modification of personal data')}}<br>
                       <label for="formFile" class="form-label" style="font-size: 13px;">{{__('Judgment decision attached')}}</label>
                       <input class="form-control" type="file" accept="image/*"id="judgment_decision_image" name="judgment_decision_image">
                       @error('judgment_decision_image')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                        <label for="formFile" class="form-label"style="font-size: 13px;" >{{__('Passport image')}}</label>
                        <input class="form-control" type="file" accept="image/*"id="passport_image" name="passport_image">
                        @error('passport_image')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                        <label for="formFile" class="form-label"style="font-size: 13px;" >{{__('Personal identification image')}}</label>
                        <input class="form-control" type="file" accept="image/*"id="personal_identification_image" name="personal_identification_image">
                        @error('personal_identification_image')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="personal" name="Consists">
                    <label id="labelpersonal"class="form-check-label" for="Consists">
                      {{__('personal image')}}<br>
                    </label>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="Transfer" name="replace_reason">
                <label class="form-check-label" for="Transfer">
                    {{__('Transfer from branch to branch')}}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="error"name="replace_reason">
                <label class="form-check-label" for="error">
                    {{__('Card incoming error')}}<span>{{__('(caused by the member)')}}</span>
                </label>
            </div>
        </p>
        {{-- التعديلات المطلوب وضعها على بطاقة العضوية الجديدة --}}
        <hr><br>
        <p style="font-weight: bold;text-align: center;">{{__('Required modifications to be made on the new membership card')}}</p>
        <hr>
        <table class="table table-bordered">
              <tr>
                <th scope="col" style="width:30%">{{__('FullName/Arabic')}}</th>
                <td ><input type="text" class="input @error('FullName/Arabic')is-danger @enderror"id="FullName/Arabic" name="FullName/Arabic"value="{{ old('FullName/Arabic') }}"class="form-control" placeholder="{{__('Enter FullName/Arabic')}}" /></td>
              </tr>
              <tr>
                <th scope="col">{{__('FullName/English to be placed on the new card')}}</th>
                <td ><input type="text" class="input @error('FullName/English')is-danger @enderror"id="FullName/English" name="FullName/English"value="{{ old('FullName/English') }}"class="form-control" placeholder="{{__('Enter FullName/English')}}" /></td>
              </tr>
              <tr>
                <th scope="col">{{__('Change personal image')}}</th>
                <td> <div class="mb-3">
                      <input class="form-control" type="file" accept="image/*"id="personal_image" name="personal_image">
                      @error('personal_image')
                          <p class="help is-danger">{{ $message }}</p>
                      @enderror
                  </div></td>
              </tr>
              <tr>
                <th scope="col">{{__('The new membership number')}} <br>{{__('when transferring from one branch to another')}}</th>
                <td ><input type="text" class="input @error('newMembershipNumber')is-danger @enderror"id="newMembershipNumber" name="newMembershipNumber"value="{{ old('newMembershipNumber') }}"class="form-control" placeholder="{{__('Enter new Membership Number')}}" /></td>
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
        </table> <button type="submit" class="btn btn-primary">{{__('Send')}}</button><br>
        </form>
        <p style="text-align:center;">{{__('Your request will be considered within a maximum period of two days. Please contact us')}}</p>
        <hr><br>
{{-- manager only --}}
{{--  بيان الدارة الماليةللفرع --}}
@if(Auth::User()->role == "user")
    <p style="font-weight: bold;">{{__('Branch financial management statement:')}}</p><hr>
    <p style="display:inline">{{__('Mr.')}} <span style="font-weight: bold">{{Auth::User()->name}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
        {{__('We inform you that he is registered in the Syndicate in year ...... and : ')}}</p>&nbsp;
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="option1" disabled>
        <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="option2" disabled>
        <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
    </div><br><br>
    <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}<input style="width:150px;"type="text" class="input @error('money_debt')is-danger @enderror"id="money_debt" name="money_debt"value="{{ old('money_debt') }}"class="form-control" placeholder="{{__('Enter debt money')}}" disabled/>{{__(' SYP')}}</p><br>

    {{--  بيان أمين الصندوق--}}
            <hr><br>
            <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p><hr>
            <br><p>{{__('Amount has been received ')}}<input style="width:170px;"type="text" class="input @error('money_order')is-danger @enderror"id="money_order" name="money_order"value="{{ old('money_order') }}"class="form-control" placeholder="{{__('Enter order money')}}" disabled/>{{__(' SYP')}}</p><br>
    {{-- قرار رئيس مجلس الإدارة --}}
            <hr><br>
        <p style="font-weight: bold;">{{__("Chairman's decision: ")}}</p><hr><br>
        {{-- <textarea class="form-control" id="reasons" rows="3" disabled></textarea><hr><br><br> --}}
        <div>
            <label style="display:inline;width:70%;"class="form-label" for="approval">{{__('Approval')}}</label>
            <select style="width:10%"class="input @error('approval')is-danger @enderror"name="approval"id="approval"class="form-select form-select-sm" aria-label=".form-select-sm example" disabled>
                <option></option>
                <option value="1" @if (old('approval') == "1") {{ 'selected' }} @endif>{{__('Yes')}}</option>
                <option value="0" @if (old('approval') == "0") {{ 'selected' }} @endif>{{__('No')}} </option>
             </select>
             @error('displayData')
               <p class="help is-danger">{{ $message }}</p>
             @enderror
             <div class="form-group">
                <label for="reasons">{{__('reasons :(If not approved)')}}</label>
                <textarea class="form-control" id="reasons" rows="2" disabled></textarea><br>
            </div>
        </div>
@endif
    </div>
</x-layouts.app>
