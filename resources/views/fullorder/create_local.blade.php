<x-layouts.app>
    <h1 style="text-align: center;font-weight:bold;text-decoration:underline;margin-top:5px;">{{__('Request a local membership document')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <form action="{{ route('fullorders.store') }}" method="POST" >
            @csrf
        <strong style="font-size:13px;">{{__('(Implementation of the decision of the Board of Directors in its session No. 41 held on the date 17/07/2016 containing the determination of the amount 200 SYP of the value of a membership document)')}}</strong><br><br>
        <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership document stating that I am a registered member of the Syndicate')}}<br><br>{{__('to submit it to')}}
        <input style="width:150px;"type="text" class="input @error('side')is-danger @enderror"id="side" name="side"value="{{ old('side') }}"class="form-control" placeholder="{{__('Enter side name')}}" /></p><br>
{{-- membership only --}}
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">{{__('User ID')}}</th>
                <th scope="col" >{{__('Membership ID')}}</th>
                <th scope="col">{{__('Request Date')}}</th>
            </tr>
        </thead>
        </table> <button type="submit" class="btn btn-primary">{{__('Send')}}</button><br><br>
        </form>
        <p style="text-align:center;">{{__('Your request will be considered within a maximum period of two days. Please contact us')}}</p>
        <hr><br>
{{-- manager only --}}
{{-- بيان الدارة المالية --}}
        <p style="font-weight: bold;">{{__('Financial Management Statement:')}}</p><hr>
        <p style="display:inline">{{__('Mr.')}} <span style="font-weight: bold">.......</span>{{__(' is affiliated with the Syndicate with a membership number ')}}/......./<br>
            {{__('We inform you that he is registered in the Syndicate in year ...... and : ')}}</p>&nbsp;
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="debt" id="financially_innocent" value="option1">
            <label for="financially_innocent" class="form-check-label" value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="debt" id="financial_liability" value="option2">
            <label for="financial_liability" class="form-check-label" value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</label>
           </div><br><br>
         <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount ')}}/......../{{__('SYP')}}</p>
{{--  بيان أمين الصندوق--}}
        <hr><br>
        <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p><hr>
        <p>{{__('Amount has been received')}}/......../{{__('SYP')}}</p><br><br>
{{-- قرار رئيس مجلس الإدارة --}}
        <hr><br>
        <p style="font-weight: bold;">{{__("Chairman's decision")}}</p><hr><br><br>

    </div>
</x-layouts.app>


   {{-- <tbody>
            <tr>
                <td style="width:24%"><input type="text" class="input"id="" name=""value=""class="form-control" placeholder="" readonly/></p></td>
                <td style="width:24%"><input type="text" class="input"id="" name=""value=""class="form-control" placeholder="" readonly/></td>
                <td style="width:24%"><input type="text" class="input"id="" name=""value=""class="form-control" placeholder="" readonly /></td>
                {{-- <td style="width:24%">{{__('')}}</td> --}}
            {{-- </tr>
        </tbody>  --}}
                {{-- style="width:100%;border: 1px solid black;border-collapse: collapse;border-spacing: 0;" --}}
        {{-- style=" border-left: 1px solid #000; border-right: 1px solid #000;" --}}

                        {{-- <th scope="col">{{__('User Signature')}}</th> --}}

                           {{-- <select style="width:150px;display:inline-block"name="debt"id="debt"class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option></option>
            <option value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</option>
            <option value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</option>
        </select> --}}

        {{-- <input style="width:150px;"type="text" class="input @error('')is-danger @enderror"id="" name=""value="" class="form-control form-control-sm" placeholder="" /> --}}

