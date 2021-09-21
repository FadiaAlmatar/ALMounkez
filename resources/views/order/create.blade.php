<x-layouts.app>
    <form style="width:50%;margin:auto">
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
            <small id="emailHelp" class="form-text text-muted">{{__('nickname must be at least 3 characters ')}}</small>
          </div>
          <p>{{__('To complete the registration process, you must enter your email')}}</p>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('E-mail')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{__('e-mail')}}">
            <small id="emailHelp" class="form-text text-muted">{{__('Please put an effective email so that you can use it later in the account activation process')}}</small>
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      {{-- البيانات الشخصية --}}
      <form style="width:50%;margin:auto">
        <div class="form-group">
          <label for="exampleInputEmail1">{{__('name')}}</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        </div>
        <br><div class="form-group">
          <label for="exampleInputPassword1">{{__('nickname')}}</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
        </div>
       <br> <div class="form-group">
            <label for="exampleInputPassword1">{{__('father name')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <br><div class="form-group">
            <label for="exampleInputPassword1">{{__('grandfather name')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <br><div class="form-group">
            <label for="exampleInputPassword1">{{__('mother name')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('gender')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('fathername/english')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('mothername/english')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('Nationality')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('Marital status')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('Place of birth')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('Date of birth')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('National ID')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('Civil Registry')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('Personal Identification Number')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('Identity Grant Date')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('Constraint')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('Military')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('Public Record Number')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{__('Health Status')}}</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</x-layouts.app>
