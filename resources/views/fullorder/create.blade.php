<x-layouts.app>
    <h1 style="text-align: center;font-weight:bold;text-decoration:underline;margin-top:5px;">{{__('Request a local membership document')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <strong style="font-size:13px;">{{__('(Implementation of the decision of the Board of Directors in its session No. 41 held on the date 17/07/2016 containing the determination of the amount 200 SYP of the value of a membership document)')}}</strong><br><br>
        <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership document stating that I am a registered member of the Syndicate')}}<br><br>{{__('to submit it to')}}
        <input style="width:150px;"type="text" class="input @error('side')is-danger @enderror"id="side" name="side"value="{{ old('side') }}"class="form-control" placeholder="enter side name" /></p><br>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">{{__('User Name')}}</th>
                <th scope="col" >{{__('Membership ID')}}</th>
                <th scope="col">{{__('Request Date')}}</th>
                <th scope="col">{{__('User Signature')}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width:24%"><input type="text" class="input @error('name')is-danger @enderror"id="name" name="name"value="{{ old('name') }}"class="form-control" placeholder="enter your name" /></p></td>
                <td style="width:24%">{{__('')}}</td>
                <td style="width:24%">{{__('')}}</td>
                <td style="width:24%">{{__('')}}</td>
            </tr>
        </tbody>
        </table>
        {{-- style="width:100%;border: 1px solid black;border-collapse: collapse;border-spacing: 0;" --}}
        {{-- style=" border-left: 1px solid #000; border-right: 1px solid #000;" --}}
        <p style="text-align:center;">{{__('Your request will be considered within a maximum period of two days. Please contact us')}}</p>
        <hr><br>
        <p style="font-weight: bold;">{{__('Financial Management Statement:')}}</p><hr>
        <p style="display:inline">{{__('Mr.')}} <span style="font-weight: bold">{{Auth::User()->name}}</span>{{__(' is affiliated with the union with a membership number ')}}{{1111}}<br>
        {{__('We inform you that he is registered in the union in year and : ')}}</p>
        <select style="width:150px;display:inline-block"name="debt"id="debt"class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option></option>
            <option value="financially_innocent" @if (old('debt') == "financially_innocent") {{ 'selected' }} @endif>{{__('Financially innocent')}}</option>
            <option value="financial_liability" @if (old('debt') == "financial_liability") {{ 'selected' }} @endif>{{__('It has a previous financial liability')}}</option>
        </select>
        <p>{{__('Mr.: The cashier in the branch, please receive an amount and its amount')}}<input style="width:150px;"type="text" class="input @error('')is-danger @enderror"id="" name=""value="" class="form-control form-control-sm" placeholder="" />{{__('SYP')}}</p>
        <hr><br>
        <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p><hr>
        <p>{{__('Amount has been received')}} {{__('SYP')}}</p>
        <hr><br>
        <p style="font-weight: bold;">{{__("Chairman's decision")}}</p><br><br>

    </div>
</x-layouts.app>
