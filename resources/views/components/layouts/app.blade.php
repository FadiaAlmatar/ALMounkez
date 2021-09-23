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
   <script>
        function myFunction(value) {
            $(".reply-"+value).toggle();
            $(".replybtn-"+value).toggle();
        }
        function group() {
            $(".group").toggle();
        }
        // function mychat() {
        //     $(".chat-section").show("fast");
        // }
        function addsubscribe(){
           $(".subscribe").toggle();
        }
        function newqualification(){
            $("#Qualifications").fadeOut(200);
        }
    //     $(document).ready(function(){
    // $("#but1").click(function(){
    //         $("#popdiv").fadeTo(200,1);
    //     });
    // $("#but2").click(function(){
    //         $("#popdiv").fadeOut(200);
    //     });
});
    </script>
  </body>
</html>
