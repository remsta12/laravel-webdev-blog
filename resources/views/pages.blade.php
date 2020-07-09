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
     <li class="breadcrumb-item active">Page Editor</li>
   </ol>

<div id="page-editor" class="responsive">
  <div class="first" contenteditable>
    stuff goes Here
  </div>
  <iframe class="second"></iframe>
   <!-- The  Modal  (For something or other, just been copied over, will see if there's use for it here)-->
   <div class="modal fade" id="postAddModalForm">
     <div class="modal-dialog" role="document">
       <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header text-center">
           <h4 class="modal-title w-100 font-weight-bold">Add New Post</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <form id="postaddForm" method="post" action="{{route('admin.addpost', $post->id)}}">
         {{csrf_field()}}
         {{method_field('PUT')}}
         <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
            <select name="postaddForm-name" class="form-control validate">
              @foreach($users as $user)
               <option value="{{$user->name}}">{{$user->name}}</option>
               @endforeach
             </select>
             <input type="hidden" name="postaddForm_authorid" name="postAuthor_id" value="{{$user->id}}">
          </div>
          <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="orangeForm-email">HTML Slug</label>
            <input type="text" name="postaddForm-slug" class="form-control validate">
          </div>

          <div class="md-form mb-4">
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Post title</label>
            <input type="text" name="postaddForm-title" class="form-control validate">
          </div>

          <div class="md-form mb-4">
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Post excerpt</label>
            <input type="text" name="postaddForm-excerpt" class="form-control validate">
          </div>

          <div class="md-form mb-4">
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Post body</label>
            <input type="text" name="postaddForm-body" class="form-control validate">
          </div>

          <div class="md-form mb-4">
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Post image</label>
            <input type="text" name="postaddForm-image" class="form-control validate">
          </div>

        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button id="confirmBtn" class="btn btn-deep-orange" type="submit">
Confirm Edit</button>
       </form>
        </div>

       </div>
     </div>
   </div>
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
