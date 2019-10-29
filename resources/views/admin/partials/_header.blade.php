<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  @yield('css')
  <link rel="stylesheet" href="{{ asset('assets/toast/toast.min.css')}}">
  <link href="{{ asset('assets/css/sb-admin.css')}}" rel="stylesheet">
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">
</head>
<body id="page-top">
<div id="overlay" style="display:none;">
    <div class="spinner"></div>
    <br/>
    Loading...
</div>  
