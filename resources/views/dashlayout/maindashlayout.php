<!DOCTYPE html>
<html lang="en">

 <head>
   @include('dashlayout.partials.dashhead')
 </head>

 <body>

@include('dashlayout.partials.dashnav')
@include('dashlayout.partials.dashheader')
@yield('content')
@include('dashlayout.partials.dashfooter')
@include('dashlayout.partials.dashfooter-scripts')

 </body>
</html>
