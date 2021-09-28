<!-- <?php

// use Mpdf\Mpdf;
use Mpdf\HTMLParserMode;
use phpDocumentor\Reflection\PseudoTypes\True_;

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [290,100]]);
$mpdf->autoScriptToLang = True;
$mpdf->autoLangToFont = True;
$mpdf->AddPage("P");
$stylesheet = file_get_contents('style.css');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
// $mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output("myPDF.pdf","D");
?> -->

{{-- @if(\Carbon\Carbon::now()->diffInSeconds($comment->created_at) <= 60)
                      {{\Carbon\Carbon::now()->diffInSeconds($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;">{{__('s')}}</span>
                    @else
                      @if(\Carbon\Carbon::now()->diffInMonths($comment->created_at) > 12)
                      {{\Carbon\Carbon::now()->diffInYears($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;">{{__('y')}}</span>
                      @elseif(\Carbon\Carbon::now()->diffInDays($comment->created_at) > 30)
                      {{\Carbon\Carbon::now()->diffInMonths($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;">{{__('mo')}}</span>
                      @elseif(\Carbon\Carbon::now()->diffInHours($comment->created_at) > 24)
                      {{\Carbon\Carbon::now()->diffInDays($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;"> {{__('d')}}</span>
                      @elseif(\Carbon\Carbon::now()->diffInMinutes($comment->created_at) > 60)
                      {{\Carbon\Carbon::now()->diffInHours($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;"> {{__('h')}}</span>
                      @elseif(\Carbon\Carbon::now()->diffInSeconds($comment->created_at) > 60)
                      {{\Carbon\Carbon::now()->diffInMinutes($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;">{{__('m')}}</span>
                     @endif
                     @endif --}}


                     .chat-search-box {
    -webkit-border-radius: 3px 0 0 0;
    -moz-border-radius: 3px 0 0 0;
    border-radius: 3px 0 0 0;
    padding: .75rem 1rem;
}

.chat-search-box .input-group .form-control {
    -webkit-border-radius: 2px 0 0 2px;
    -moz-border-radius: 2px 0 0 2px;
    border-radius: 2px 0 0 2px;
    border-right: 0;
}

.chat-search-box .input-group .form-control:focus {
    border-right: 0;
}

.chat-search-box .input-group .input-group-btn .btn {
    -webkit-border-radius: 0 2px 2px 0;
    -moz-border-radius: 0 2px 2px 0;
    border-radius: 0 2px 2px 0;
    margin: 0;
}

.chat-search-box .input-group .input-group-btn .btn i {
    font-size: 1.2rem;
    line-height: 100%;
    vertical-align: middle;
}

@media (max-width: 767px) {
    .chat-search-box {
        display: none;
    }
}


/************************************************
	************************************************
									Users Container
	************************************************
************************************************/

.users-container {
    position: relative;
    padding: 1rem 0;
    border-right: 1px solid #e6ecf3;
    height: 100%;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
}


/************************************************
	************************************************
											Users
	************************************************
************************************************/

.users {
    padding: 0;
}

.users .person {
    position: relative;
    width: 100%;
    padding: 10px 1rem;
    cursor: pointer;
    border-bottom: 1px solid #f0f4f8;
}

.users .person:hover {
    background-color: #ffffff;
    /* Fallback Color */
    background-image: -webkit-gradient(linear, left top, left bottom, from(#e9eff5), to(#ffffff));
    /* Saf4+, Chrome */
    background-image: -webkit-linear-gradient(right, #e9eff5, #ffffff);
    /* Chrome 10+, Saf5.1+, iOS 5+ */
    background-image: -moz-linear-gradient(right, #e9eff5, #ffffff);
    /* FF3.6 */
    background-image: -ms-linear-gradient(right, #e9eff5, #ffffff);
    /* IE10 */
    background-image: -o-linear-gradient(right, #e9eff5, #ffffff);
    /* Opera 11.10+ */
    background-image: linear-gradient(right, #e9eff5, #ffffff);
}

.users .person.active-user {
    background-color: #ffffff;
    /* Fallback Color */
    background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f9fb), to(#ffffff));
    /* Saf4+, Chrome */
    background-image: -webkit-linear-gradient(right, #f7f9fb, #ffffff);
    /* Chrome 10+, Saf5.1+, iOS 5+ */
    background-image: -moz-linear-gradient(right, #f7f9fb, #ffffff);
    /* FF3.6 */
    background-image: -ms-linear-gradient(right, #f7f9fb, #ffffff);
    /* IE10 */
    background-image: -o-linear-gradient(right, #f7f9fb, #ffffff);
    /* Opera 11.10+ */
    background-image: linear-gradient(right, #f7f9fb, #ffffff);
}

.users .person:last-child {
    border-bottom: 0;
}

.users .person .user {
    display: inline-block;
    position: relative;
    margin-right: 10px;
}

.users .person .user img {
    width: 48px;
    height: 48px;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
}

.users .person .user .status {
    width: 10px;
    height: 10px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
    background: #e6ecf3;
    position: absolute;
    top: 0;
    right: 0;
}

.users .person .user .status.online {
    background: #9ec94a;
}

.users .person .user .status.offline {
    background: #c4d2e2;
}

.users .person .user .status.away {
    background: #f9be52;
}

.users .person .user .status.busy {
    background: #fd7274;
}

.users .person p.name-time {
    font-weight: 600;
    font-size: .85rem;
    display: inline-block;
}

.users .person p.name-time .time {
    font-weight: 400;
    font-size: .7rem;
    text-align: right;
    color: #8796af;
}

@media (max-width: 767px) {
    .users .person .user img {
        width: 30px;
        height: 30px;
    }
    .users .person p.name-time {
        display: none;
    }
    .users .person p.name-time .time {
        display: none;
    }
}


/************************************************
	************************************************
									Chat right side
	************************************************
************************************************/

.selected-user {
    width: 100%;
    padding: 0 15px;
    min-height: 64px;
    line-height: 64px;
    border-bottom: 1px solid #e6ecf3;
    -webkit-border-radius: 0 3px 0 0;
    -moz-border-radius: 0 3px 0 0;
    border-radius: 0 3px 0 0;
}

.selected-user span {
    line-height: 100%;
}

.selected-user span.name {
    font-weight: 700;
}

.chat-container {
    position: relative;
    padding: 1rem;
}

.chat-container li.chat-left,
.chat-container li.chat-right {
    display: flex;
    flex: 1;
    flex-direction: row;
    margin-bottom: 10px;
}

.chat-container li img {
    width: 48px;
    height: 48px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;
}

.chat-container li .chat-avatar {
    margin-right: 20px;
}

.chat-container li.chat-right {
    justify-content: flex-end;
}

.chat-container li.chat-right > .chat-avatar {
    margin-left: 20px;
    margin-right: 0;
}

.chat-container li .chat-name {
    font-size: .75rem;
    color: #3d0ee9;
    /* color: #999999; */
    text-align: center;
}

.chat-container li .chat-text {
    padding: .4rem 1rem;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    background: #ffffff;
    font-weight: 300;
    line-height: 150%;
    position: relative;
}

.chat-container li .chat-text:before {
    content: '';
    position: absolute;
    width: 0;
    height: 0;
    top: 10px;
    left: -20px;
    border: 10px solid;
    border-color: transparent #ffffff transparent transparent;
}

.chat-container li.chat-right > .chat-text {
    text-align: right;
}

.chat-container li.chat-right > .chat-text:before {
    right: -20px;
    border-color: transparent transparent transparent #ffffff;
    left: inherit;
}

.chat-container li .chat-hour {
    padding: 0;
    margin-bottom: 10px;
    font-size: .75rem;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    margin: 0 0 0 15px;
}

.chat-container li .chat-hour > span {
    font-size: 16px;
    color: #9ec94a;
}

.chat-container li.chat-right > .chat-hour {
    margin: 0 15px 0 0;
}

@media (max-width: 767px) {
    .chat-container li.chat-left,
    .chat-container li.chat-right {
        flex-direction: column;
        margin-bottom: 30px;
    }
    .chat-container li img {
        width: 32px;
        height: 32px;
    }
    .chat-container li.chat-left .chat-avatar {
        margin: 0 0 5px 0;
        display: flex;
        align-items: center;
    }
    .chat-container li.chat-left .chat-hour {
        justify-content: flex-end;
    }
    .chat-container li.chat-left .chat-name {
        margin-left: 5px;
    }
    .chat-container li.chat-right .chat-avatar {
        order: -1;
        margin: 0 0 5px 0;
        align-items: center;
        display: flex;
        justify-content: right;
        flex-direction: row-reverse;
    }
    .chat-container li.chat-right .chat-hour {
        justify-content: flex-start;
        order: 2;
    }
    .chat-container li.chat-right .chat-name {
        margin-right: 5px;
    }
    .chat-container li .chat-text {
        font-size: .8rem;
    }
}

.chat-form {
    padding: 15px;
    width: 100%;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ffffff;
    border-top: 1px solid white;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.card {
    border: 0;
    background: #f4f5fb;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    margin-bottom: 2rem;
    box-shadow: none;
}

// $messages = $message->groupBy(function($date) {
        //     return Carbon::parse($date->created_at)->format('Y-m-d'); });
            // $messages = $message->groupBy('created_at');
            // ->groupBy(function($date) {
                // return Carbon::parse($date->created_at)->format('Y-m-d'); });




    {{-- onclick="newqualification()" --}}

{{-- two --}}
{{-- <div id="dialog"class="tab-pane fade" style="width:70%;margin:auto;margin-top:5px;position:fixed;display:none;"role="tabpanel" aria-labelledby="Qualifications-tab">
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
</div> --}}
{{--end two  --}}

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
