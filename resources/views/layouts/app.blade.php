<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app1.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    @if (app()->getLocale() == 'ar')
    <style>
    body{
            direction: rtl;
        }
    li,label,.dropdown-item{
        text-align: right;
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
     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{ $styles ?? '' }}
</head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

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
         $(document).on('click', '.btn_add', function () {
         let trCount = $('#Qualification').find('tr.cloning_row:last').length;
         let numberIncr = trCount > 0 ? parseInt($('#Qualification').find('tr.cloning_row:last').attr('id')) + 1 : 0;
         let i = 1921;
         var today = new Date();

         $('#Qualification').find('tbody').append($('' +
             '<tr class="cloning_row" id="' + numberIncr + '">' +
             '<td><button type="button" class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button></td>' +
             '<td><select name="qualification[' + numberIncr + ']" class="form-select form-control"><option></option><option value="Doctorate">{{__('Doctorate')}}</option><option value="Master">{{__('Master')}}</option><option value="Diploma">{{__('Diploma')}}</option><option value="Certificate">{{__('Certificate')}}</option><option value="Language">{{__('Language')}}</option><option value="Soft skills">{{__('Soft skills')}}</option><option value="Hard skills">{{__('Hard skills')}}</option><option value="Other">{{__('Other')}}</option></select></td>' +
             '<td><input class="input"type="text" name="specialization['+ numberIncr + ']" class=" form-control"></td>' +
             '<td><input class="input"type="text" name="side[' + numberIncr + ']" class="form-control"></td>' +
             '<td><input class="input"type="text" name="country[' + numberIncr + ']" class="form-control"></td>' +
             '<td><input class="input"type="text" name="finishYear[' + numberIncr + ']" class=" form-control"></td>' +
             '<td><input class="input"type="text" name="Rate['+ numberIncr + ']" class=" form-control"></td>' +
             '</tr>'));
     });

     $(document).on('click', '.delegated-btn', function (e) {
         e.preventDefault();
         $(this).parent().parent().remove();
     });
 });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
{{ $scripts ?? '' }}
</html>
