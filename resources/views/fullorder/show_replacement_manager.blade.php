<x-layouts.app>
    <br>
    <h1 class="h1-fullorder">{{__('Request for a replacement membership card')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <strong style="font-size:13px;">{{__('Based on decision of the Board of Directors in its session No. 36 held on the date 27/04/2016 containing the determination of the amount 1000 SYP of the value of a membership card:(Consists-Lost)')}}</strong><br><br>
        <h1 style="text-align: center;font-weight:bold;background-color:rgb(199, 198, 198);font-size:18px;">{{__('Filled out by the affiliate')}}</h1>
        <form action="{{ route('fullorders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="type" value="replacement" hidden>
            <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership card instead: ')}}
                @if(Auth::User()->role == "admin")
                <a href="{{route('fullorders.print',$fullorder->id)}}" id="print"class="btn btn-danger btn-md active" role="button" aria-pressed="true">PDF</a>
               @endif</p>
                <div class="form-check">
                    @if($fullorder->replace_reasons == "lost")
                    <input class="form-check-input" type="radio" value="Lost" id="Lost" name="replace_reason" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif checked>
                    <label class="form-check-label" for="Lost">
                      {{__('Lost (police decision attached)')}}
                    @if ($fullorder->police_image <> null)
                    <a target="_blank" href="{{asset("storage/police_images/$fullorder->police_image")}}">{{__('Click here to show police image')}}</a>
                    @endif
                </label>
                </div>
                @elseif($fullorder->replace_reasons == "Modification")
                <div class="form-check">
                    <label class="form-check-label" for="Consists">
                      {{__('Consists (damaged card attached) reason: ')}}
                      @if ($fullorder->damaged_card_image <> null)
                      <a target="_blank" href="{{asset("storage/damaged_card_images/$fullorder->damaged_card_image")}}">{{__('Click here to show damaged card image')}}</a>
                      @endif
                    </label>
                </div>
                <div style="margin-left:20px;"  @if (app()->getLocale() == 'ar') style="margin-right:20px;" @endif>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Modification" id="Modification" name="replace_reason" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif checked>
                        <label id="labelmodification"class="form-check-label" for="Modification">
                            {{__('Modification of personal data')}}</label><br>
                          @if ($fullorder->judgment_decision_image <> null)
                           <label for="formFile" class="form-label" style="font-size: 13px;">{{__('Judgment decision attached')}}</label>

                           <a target="_blank" href="{{asset("storage/judgment_decision_images/$fullorder->judgment_decision_image")}}">{{__('Click here to show judgment decision image')}}</a><br>
                            @endif
                            @if ($fullorder->passport_image <> null)
                            <label for="formFile" class="form-label"style="font-size: 13px;" >{{__('Passport image')}}</label>

                            <a target="_blank" href="{{asset("storage/passport_images/$fullorder->passport_image")}}">{{__('Click here to show passport image')}}</a><br>
                            @endif
                            @if ($fullorder->personal_identification_image <> null)
                            <label for="formFile" class="form-label"style="font-size: 13px;" >{{__('Personal identification image')}}</label>

                            <a target="_blank" href="{{asset("storage/personal_identification_images/$fullorder->personal_identification_image")}}">{{__('Click here to show personal identification image')}}</a>
                            @endif
                    </div></div>
                    @elseif($fullorder->replace_reasons == "personal")
                    <div class="form-check">
                        <label class="form-check-label" for="Consists">
                          {{__('Consists (damaged card attached) reason: ')}}
                          @if ($fullorder->damaged_card_image <> null)
                          <a target="_blank" href="{{asset("storage/damaged_card_images/$fullorder->damaged_card_image")}}">{{__('Click here to show damaged card image')}}</a>
                          @endif
                        </label>
                    </div>

                    <div class="form-check" style="margin-left:20px;"  @if (app()->getLocale() == 'ar') style="margin-right:20px;" @endif>
                        <input class="form-check-input" type="radio" value="personal" id="personal" name="replace_reason" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif checked>
                        <label id="labelpersonal"class="form-check-label" for="personal">
                          {{__('personal image')}}<br>
                        </label>
                        @if ($fullorder->personal_image <> null)
                        <a target="_blank" href="{{asset("storage/personal_images/$fullorder->personal_image")}}">{{__('Click here to show personal image')}}</a>
                        @endif
                    </div>
                @elseif($fullorder->replace_reasons == "transfer")
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Transfer" id="Transfer" name="replace_reason" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif checked>
                    <label class="form-check-label" for="Transfer">
                        {{__('Transfer from branch to branch')}}
                    </label>
                </div>
                @else
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="error" id="error"name="replace_reason" @if(Auth::User()->role == "admin"){{ 'disabled' }} @endif checked>
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
                      @if ($fullorder->personal_image <> null)
                    <a target="_blank" href="{{asset("storage/personal_images/$fullorder->personal_image")}}">{{__('Click here to show personal image')}}</a>
                    @endif
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
        <hr style="width:50%;margin:auto">
{{-- manager only --}}
{{--  بيان الدارة الماليةللفرع --}}
    <input name="type" value="replacement" hidden>
    <p style="font-weight: bold;display:inline-block;width:40%">{{__('Branch financial management statement:')}}</p>
    <div class="status" style="width:30%;">
        <p style="color:red"value="{{$fullorder->status}}">{{__('Order Status')}}: {{__($fullorder->status)}} </p>
    </div>
       <br>
    <p style="display:inline">{{__('Mr.')}} <span style="font-weight: bold">{{$fullorder->fullname}}</span>{{__(' is affiliated with the Syndicate with a membership number ')}}{{Auth::User()->id}}<br>
        {{__('We inform you that he is registered in the Syndicate in year 20')}}{{$fullorder->user->order->created_at->format('y')}} {{__('and : ')}}</p>&nbsp;
        @if($fullorder->not_debtor == 0 )
        <div class="form-check">
            <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="{{$fullorder->not_debtor}}" disabled checked>
            <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
        </div>
        @else
        <div class="form-check"><br>
            <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="{{$fullorder->not_debtor}}" disabled checked>
            <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
            {{__('equal ')}}
            <input type="text" class="input input-fullorder"id="money_debt" name="money_debt"  value="{{ $fullorder->money_debt}}"  class="form-control" placeholder="{{__('Enter debt money')}}" disabled />{{__(' SYP')}}<br>
        </div><br>
        @endif
    <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}
        <input type="text" class="input @error('money_order')is-danger @enderror input-fullorder"id="money_order" name="money_order"value="{{ $fullorder->money_order}}"class="form-control" placeholder="{{__('Enter order money')}}" disabled/>{{__(' SYP')}}</p>
{{--  بيان أمين الصندوق--}}
            <hr>
            <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p>
            <p>{{__('Amount has been received ')}}
                <input type="text" class="input @error('money_order')is-danger @enderror input-fullorder"id="money_order" name="money_order"value="{{ $fullorder->money_order }}"class="form-control" placeholder="{{__('Enter order money')}}" disabled/>{{__(' SYP')}}</p>
{{-- قرار رئيس مجلس الإدارة --}}
            <hr>
        <p style="font-weight: bold;">{{__("Chairman's decision: ")}}</p>
        <div>
            <label style="display:inline;width:70%;"class="form-label" for="approval">{{__('Approval')}}</label>
            <select style="width:10%"class="input @error('Chairman_decision')is-danger @enderror"name="Chairman_decision"id="Chairman_decision"class="form-select form-select-sm" aria-label=".form-select-sm example" disabled>
                @if($fullorder->Chairman_decision == 1)
                    <option value="{{ $fullorder->Chairman_decision}}">{{__('Approval')}}</option>
                    @else
                    <option value="{{ $fullorder->Chairman_decision}}">{{__('Disapproval')}}</option>
                    @endif
             </select>
             @if($fullorder->Chairman_decision == 0)
             <div class="form-group">
                <label for="reasons">{{__('reasons :(If not approved)')}}</label>
                <textarea name="Chairman_disapproval_reasons"class="form-control" id="reasons" rows="2" disabled>{{ $fullorder->Chairman_disapproval_reasons }}</textarea><br>
            </div>
            @endif
        </div><br>
    </div>
</x-layouts.app>
