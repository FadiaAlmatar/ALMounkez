<!DOCTYPE html>
<html dir="{{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'rtl' : 'ltr' }}"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app1.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    @if (app()->getLocale() == 'ar')
    <style>
    li{
        text-align: right;
        float:right;
    }
    #Lost,#Consists,#Modification,#personal,#Transfer,#error,#financially_innocent,#financial_liability{
        float:right;
    }
    .form-check-label{
        margin-right: 20px;
    }
    #Modification,#personal{
        margin-right: 20px;
    }
    #labelmodification,#labelpersonal{
        margin-right: 40px;
    }
    .status{
        float:left;
    }
    #print{
        float:left;
    }
    </style>
    @endif
  </head>
  <body>
   <x-navbar />
    {{ $slot }}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
   <script src="/js/app.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    {{-- <script src="{{ asset('frontend/js/form_validation/jquery.form.js') }}"></script>
    <script src="{{ asset('frontend/js/form_validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/form_validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('frontend/js/pickadate/picker.js') }}"></script>
    <script src="{{ asset('frontend/js/pickadate/picker.date.js') }}"></script>
    @if(config('app.locale') == 'ar')
        <script src="{{ asset('frontend/js/form_validation/messages_ar.js') }}"></script>
        <script src="{{ asset('frontend/js/pickadate/ar.js') }}"></script>
    @endif
    <script src="{{ asset('frontend/js/custom.js') }}"></script> --}}
   <script>
        function myFunction(value) {
            $(".reply-"+value).toggle();
            $(".replybtn-"+value).toggle();
        }
        function group() {
            $(".group").toggle();
        }
        function addsubscribe(){
           $(".subscribe").toggle();
        }

        $(document).ready(function(){
            // localStorage["check"] = 1;
        $(document).on('click', '.btn_add', function () {
        let trCount = $('#Qualification').find('tr.cloning_row:last').length;
        let numberIncr = trCount > 0 ? parseInt($('#Qualification').find('tr.cloning_row:last').attr('id')) + 1 : 0;

        $('#Qualification').find('tbody').append($('' +
            '<tr class="cloning_row" id="' + numberIncr + '">' +
            '<td><button type="button" class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button></td>' +
            '<td><select name="qualification[' + numberIncr + ']" class="form-select form-control"><option></option><option value="Doctorate">{{__('Doctorate')}}</option><option value="Master">{{__('Master')}}</option><option value="Diploma">{{__('Diploma')}}</option><option value="Certificate">{{__('Certificate')}}</option><option value="Other">{{__('Other')}}</option></select></td>' +
            '<td><input class="input"type="text" name="university[' + numberIncr + ']" class="form-control"></td>' +
            '<td><input class="input"type="text" name="country[' + numberIncr + ']" class="form-control"></td>' +
            '<td><input class="input"type="text" name="graduationYear[' + numberIncr + ']" class=" form-control"></td>' +
            '<td><input class="input"type="text" name="graduationRate['+ numberIncr + ']" class=" form-control"></td>' +
            '<td><input class="input"type="text" name="specialization['+ numberIncr + ']" class=" form-control"></td>' +
            '</tr>'));
    });

    $(document).on('click', '.delegated-btn', function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();

    });
    // {{Session::get('order.qualifications') }}
});
    </script>
  </body>
</html>
