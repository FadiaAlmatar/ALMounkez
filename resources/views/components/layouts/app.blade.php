<!DOCTYPE html>
<html dir="{{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'rtl' : 'ltr' }}"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app1.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    @if (app()->getLocale() == 'ar')
    <style>
    body{
            direction: rtl;
        }
    li,label{
        text-align: right;
        /* float:right; */
    }
    .ul-order li{
        text-align: right;
        list-style-position: inside;padding-right:15px;
    }
    option{
        text-align: center;
    }
    #Lost,#Consists,#Modification,#personal,#Transfer,#error,#financially_innocent,#financial_liability,#printorder{
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
    {{ $styles ?? '' }}
  </head>
  <body>
   <x-navbar />
    {{ $slot }}

    {{-- <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script> --}}

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
   {{-- <script src="/js/app.js"></script> --}}
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


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
        let i = 1921;
        // var arr = [];
        var today = new Date();
        // for (i = 1921; i<=today.getFullYear(); i++){
        //     arr.push(i)
        //     }
        // for (var j = 0; j<=arr.length; j++) {
    //   $('<option>'+ value +'</option>').appendTo('.try');
    //   html += '<option>' + value + '</option>';
        // $('#Year').append($('<option>'+ arr[i] +'</option>'));
        //  };
        // var myselect2 = $('<select>');
        $('#Qualification').find('tbody').append($('' +
            '<tr class="cloning_row" id="' + numberIncr + '">' +
            '<td><button type="button" class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button></td>' +
            '<td><select name="qualification[' + numberIncr + ']" class="form-select form-control"><option></option><option value="Doctorate">{{__('Doctorate')}}</option><option value="Master">{{__('Master')}}</option><option value="Diploma">{{__('Diploma')}}</option><option value="Certificate">{{__('Certificate')}}</option><option value="Language">{{__('Language')}}</option><option value="Soft skills">{{__('Soft skills')}}</option><option value="Hard skills">{{__('Hard skills')}}</option><option value="Other">{{__('Other')}}</option></select></td>' +
            '<td><input class="input"type="text" name="specialization['+ numberIncr + ']" class=" form-control"></td>' +
            '<td><input class="input"type="text" name="side[' + numberIncr + ']" class="form-control"></td>' +
            '<td><input class="input"type="text" name="country[' + numberIncr + ']" class="form-control"></td>' +
            '<td><input class="input"type="text" name="finishYear[' + numberIncr + ']" class=" form-control"></td>' +
            // '<td><select id="Year"name="finishYear[' + numberIncr + ']" class="form-select form-control">'+ trythis() +'</select></td>' +
            '<td><input class="input"type="text" name="Rate['+ numberIncr + ']" class=" form-control"></td>' +
            '</tr>'));

            // myselect2.append($('<option disabled selected value ></option >').val("").html(""));
                // function trythis() {
                //     // var arr = [];
                //      var returnHTM = for (var i = 1921; i<=today.getFullYear(); i++) {
                //         // arr.push(i);
                //         $('#Year').append($('<option ></option>').val(i).html(i)) ;
                //         // html(i);
                //     }
                //     return returnHTM;
                // }
    });

    $(document).on('click', '.delegated-btn', function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
    });
    // {{Session::get('order.qualifications') }}
});

    </script>
    {{ $scripts ?? '' }}
  </body>
</html>



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
