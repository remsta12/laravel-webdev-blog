
@extends('dashlayout.maindashlayout')

@section('dashcontent')
<div id="wrapper">
 <!-- Sidebar -->
 <ul class="sidebar navbar-nav">
   <li class="nav-item active">
     <a class="nav-link dropdown-toggle" href="#" id="tablesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="fas fa-fw fa-tachometer-alt"></i>
       <span>Dashboard</span>
     </a>
     <div class="dropdown-menu" aria-labelledby="tablesDropdown">
       <h6 class="dropdown-header">Database Tables:</h6>
       <a class="dropdown-item" href="{{route('admin')}}">Posts</a>
       <a class="dropdown-item" href="{{route('admin.user')}}">Users</a>
       <a class="dropdown-item" href="{{route('admin.role')}}">Roles</a>

     </div>
   </li>
   <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="fas fa-fw fa-folder"></i>
       <span>Pages</span>
     </a>
     <div class="dropdown-menu" aria-labelledby="pagesDropdown">
       <h6 class="dropdown-header">Login Screens:</h6>
       <a class="dropdown-item" href="login.html">Login</a>
       <a class="dropdown-item" href="register.html">Register</a>
       <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
       <div class="dropdown-divider"></div>
       <h6 class="dropdown-header">Other Pages:</h6>
       <a class="dropdown-item" href="404.html">404 Page</a>
       <a class="dropdown-item" href="blank.html">Blank Page</a>
     </div>
   </li>
 </ul>


<div id="content-wrapper">
 <div class="container-fluid">
   <!-- Breadcrumbs-->
   <ol class="breadcrumb">
     <li class="breadcrumb-item">
       <a href="#">Dashboard</a>
     </li>
     <li class="breadcrumb-item active">Roles</li>
   </ol>

<div class="container-fluid">
<div id="record-editor" class="table-responsive">
  @if (count($roles) > 0)
  <table class="table">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Created At</th>
      <th>Updated At</th>
    </tr>
    @foreach($roles as $id=>$role)

    <tr>
      <td>{{$id + 1}}</td>
      <td>{{$role->name}}</td>
      <td>{{$role->description}}</td>
      <td>{{$role->created_at}}</td>
      <td>{{$role->updated_at}}</td>
    </tr>

    @endforeach
  </table>
  @endif
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
 <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
       <button class="close" type="button" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
       </button>
     </div>
     <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
     <div class="modal-footer">
       <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
       <a class="btn btn-primary" href="login.html">Logout</a>
     </div>
   </div>
 </div>
</div>
</div>
</div>
</div>
@endsection
