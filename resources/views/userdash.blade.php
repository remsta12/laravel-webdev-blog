
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
   <li class="nav-item">
     <a class="nav-link" href="charts.html">
       <i class="fas fa-fw fa-chart-area"></i>
       <span>Charts</span></a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="tables.html">
       <i class="fas fa-fw fa-table"></i>
       <span>Tables</span></a>
   </li>
 </ul>


<div id="content-wrapper">
 <div class="container-fluid">

   <!-- Breadcrumbs-->
   <ol class="breadcrumb">
     <li class="breadcrumb-item">
       <a href="#">Dashboard</a>
     </li>
     <li class="breadcrumb-item active">Overview</li>
   </ol>

<div class="container-fluid">
  <button id="newUserButton" type="button" class="btn btn-info" data-toggle="modal" data-whichform="Add New User" data-target="#addUserModalForm">Make new user account</button></div>

<div id="record-editor" class="table-responsive">
  @if (count($users) > 0)
  <table class="table">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Email Verified Time</th>
      <th>Password</th>
      <th>Remember token</th>
      <th>Created At</th>
      <th>Updated At</th>
      <th>Edit</th>
      <th>Remove</th>
    </tr>
    @foreach($users as $id=>$user)

    <tr>
      <td>{{$id + 1}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->email_verified_at}}</td>
      <td>{{$user->password}}</td>
      <td>{{$user->remember_token}}</td>
      <td>{{$user->created_at}}</td>
      <td>{{$user->updated_at}}</td>
      <td><a data-js="btn-edit"><button id="{{$user->id}}" type="button" class="btn btn-warning" data-toggle="modal" data-target='#edituserModalForm{{$user->id}}'>Edit</button></a></td>
      <td><a data-js="btn-remove"><button id="{{$user->id}}" type="button" class="btn btn-danger" data-toggle="modal" data-target='#deleteUserModalForm{{$user->id}}'>Delete</span></a></td>
    </tr>

        <!--Delete Modal -->
    <div class="modal fade" id="deleteUserModalForm{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete this user?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="userDeleteForm" method="post" action="{{route('admin.deleteuser', $user->id)}}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
          <div class="modal-body">
            This user record will now be permanently removed from the database. Would you still like to delete?
            <input type="hidden" name="userDeleteForm_id" value="{{$user->id}}">
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-deep-orange">Yes</button>
          </form>
          </div>
        </div>
      </div>
    </div>


    <!-- The Edit Modal  (MAY WANT TO PUJT INTO SEPERATE MODULE FILE)-->
    <div class="modal fade" id="edituserModalForm{{$user->id}}">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Edit Current User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <form id="userForm" method="post" action="{{route('admin.edituser', $user->id)}}">
          {{csrf_field()}}
          {{method_field('PUT')}}
          <div class="modal-body mx-3">
           <div class="md-form mb-5">
             <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
             <input type="text" name="editForm-username" class="form-control validate" value="{{$user->name}}">
           </div>
           <div class="md-form mb-5">
             <label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
             <input type="text" name="editForm-email" class="form-control validate" value="{{$user->email}}">
           </div>
           <div class="md-form mb-4">
             <label data-error="wrong" data-success="right" for="orangeForm-pass">Password</label>
             <input type="text" name="editForm-pass" class="form-control validate">
           </div>

           <div class="md-form mb-4">
             <label data-error="wrong" data-success="right" for="orangeForm-pass">Remember Token</label>
             <input type="text" name="editForm-remtoken" class="form-control validate" value="{{$user->remember_token}}">
           </div>
         </div>
         <div class="modal-footer d-flex justify-content-center">
           <input type="hidden" name="editForm_id" name="user_id" value="{{$user->id}}">
           <input type="hidden" id="editForm_updatedAt" name="updated_time" value="0">
           <button id="confirmBtn" class="btn btn-deep-orange" type="submit">
  Confirm Edit</button>
        </form>
         </div>

        </div>
      </div>
    </div>


    <!-- The Modal  (MAY WANT TO PUJT INTO SEPERATE MODULE FILE)-->
    <div class="modal fade" id="addUserModalForm">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Add New User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <form id="addUserForm" method="post" action="{{route('admin.adduser', $user->id)}}">
          {{csrf_field()}}
          {{method_field('PUT')}}
          <div class="modal-body mx-3">
           <div class="md-form mb-5">
             <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
             <input type="text" name="useraddForm-username" class="form-control validate">
           </div>
           <div class="md-form mb-5">
             <label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
             <input type="text" name="useraddForm-email" class="form-control validate">
           </div>
           <div class="md-form mb-4">
             <label data-error="wrong" data-success="right" for="orangeForm-pass">Password</label>
             <input type="text" name="useraddForm-pass" class="form-control validate">
           </div>

           <div class="md-form mb-4">
             <label data-error="wrong" data-success="right" for="orangeForm-pass">Remember Token</label>
             <input type="text" name="useraddForm-remtoken" class="form-control validate">
           </div>
         </div>
         <div class="modal-footer d-flex justify-content-center">
           <input type="hidden" name="adduserForm_id" name="user_id" value="{{$user->id}}">
           <input type="hidden" id="adduserForm_updatedAt" name="updated_time" value="0">
           <button id="confirmBtn" class="btn btn-deep-orange" type="submit">
  Confirm User</button>
        </form>
         </div>

        </div>
      </div>
    </div>

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
