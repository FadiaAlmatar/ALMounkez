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
    {{-- <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
   rel = "stylesheet"> --}}
    @if (app()->getLocale() == 'ar')
    <style>
    /* span{
        text-align: left;
        float:left;
    } */
    </style>
    @endif
  </head>
  <body>
   <x-navbar />
    {{ $slot }}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
   <script src="/js/app.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

{{-- <script src = "https://code.jquery.com/jquery-1.10.2.js"></script> --}}
{{-- <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> --}}
{{-- @section('script') --}}
    <script src="{{ asset('frontend/js/form_validation/jquery.form.js') }}"></script>
    <script src="{{ asset('frontend/js/form_validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/form_validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('frontend/js/pickadate/picker.js') }}"></script>
    <script src="{{ asset('frontend/js/pickadate/picker.date.js') }}"></script>
    @if(config('app.locale') == 'ar')
        <script src="{{ asset('frontend/js/form_validation/messages_ar.js') }}"></script>
        <script src="{{ asset('frontend/js/pickadate/ar.js') }}"></script>
    @endif
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
{{-- @endsection --}}

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
        function newqualification(){
            // $("#Qualifications").fadeTo(200, 1);
            // $("#q").fadeOut(200);
            $("#dialog").toggle();
        }

    //  $(function() {
    //     // alert("hello new");
    //         // $( "#dialog" ).dialog({
    //         // autoOpen: false
    //         // });


    //         $( "#opener" ).click(function() {
    //         $( "#dialog" ).dialog( "open" );
    //         });
    //     });

    // function dialogopen() {
    // // alert("hello new");
    // $( "#dialog" ).toggle();$(function () {
        // $(function() {
  // this initializes the dialog (and uses some common options that I do)
//   $(document).ready(function () {
//             $('#dialog').dialog({
//                 autoOpen: false,
//                 title: 'Basic Dialog'
//             });
//             $('#btnShow').click(function () {
//                 $('#dialog').dialog('open');
//             });
//         });

// };
    //     $(document).ready(function(){
    // $("#but1").click(function(){
    //         $("#popdiv").fadeTo(200,1);
    //     });
    // $("#but2").click(function(){
    //         $("#popdiv").fadeOut(200);
    //     });
// });
    </script>
  </body>
</html>
