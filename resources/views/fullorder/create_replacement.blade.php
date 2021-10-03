<x-layouts.app>
    <h1 style="text-align: center;font-weight:bold;text-decoration:underline;margin-top:5px;">{{__('Request for a replacement membership card')}}</h1><br>
    <div class="container"style="margin-top:7px;">
        <strong style="font-size:13px;">{{__('Based on decision of the Board of Directors in its session No. 36 held on the date 27/04/2016 containing the determination of the amount 1000 SYP of the value of a membership card:(Consists-Lost)')}}</strong><br><br>
        <hr><h1 style="text-align: center;font-weight:bold;">{{__('Filled out by the affiliate')}}</h1><hr>
        <form action="{{ route('fullorders.store') }}" method="POST" >
            @csrf
        <p>{{__('Gentlemen of the Financial and Accounting Professions Syndicate, please give me a membership card instead: ')}}
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="Lost">
                <label class="form-check-label" for="Lost">
                  {{__('Lost')}}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="Consists" checked>
                <label class="form-check-label" for="Consists">
                  {{__('Consists')}}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="Transfer" checked>
                <label class="form-check-label" for="Transfer">
                    {{__('Transfer from branch to branch')}}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="error" checked>
                <label class="form-check-label" for="error">
                    {{__('Card incoming error')}}
                </label>
            </div>
        </p>

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

{{--  بيان أمين الصندوق--}}
        <hr><br>
        <p style="font-weight: bold;">{{__('Treasurer statement: ')}}</p><hr>
        <p>{{__('Amount has been received')}}/......../{{__('SYP')}}</p><br><br>
{{-- قرار رئيس مجلس الإدارة --}}
        <hr><br>
        <p style="font-weight: bold;">{{__("Chairman's decision")}}</p><hr><br><br>

    </div>
</x-layouts.app>
