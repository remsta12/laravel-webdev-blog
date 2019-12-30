<!DOCTYPE html>
<html lang="en">

 <head>
   @include('layout.partials.head')
 </head>

 <body>

@include('layout.partials.nav')
@if(\Request::is('about'))
  @include('layout.partials.aboutheader')
@elseif(\Request::is('contact'))
  @include('layout.partials.contactheader')
  <!--do nothing-->
@else
  @include('layout.partials.header')
@endif
@yield('content')
@include('layout.partials.footer')
@include('layout.partials.footer-scripts')

 </body>
</html>
