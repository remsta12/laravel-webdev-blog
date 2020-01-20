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
      <li class="breadcrumb-item active">Overview</li>
    </ol>

  <div class="container-fluid">
    <button id="newPostButton" type="button" class="btn btn-info" data-toggle="modal" data-whichform="Add New Post" data-target="#postAddModalForm">Make new post</button>
  </div>

<div id="record-editor" class="table-responsive">
  @if(count($posts) > 0)
  <table class="table">
    <tr>
      <th>ID</th>
      <th>Author ID</th>
      <th>Name</th>
      <th>Slug</th>
      <th>Title</th>
      <th>Excerpt</th>
      <th>Body</th>
      <th>Image</th>
      <th>Created At</th>
      <th>Updated At</th>
      <th>Edit</th>
      <th>Remove</th>
    </tr>
  @foreach($posts as $id=>$post)

    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->author_id}}</td>
      <td>{{$post->name}}</td>
      <td>{{$post->slug}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->excerpt}}</td>
      <td>{{$post->body}}</td>
      <td>{{$post->image}}</td>
      <td>{{$post->created_at}}</td>
      <td>{{$post->updated_at}}</td>
      <td><a data-js="btn-edit"><button id="{{$post->id}}" value=<?php echo $id;?> type="button" class="btn btn-warning" data-toggle="modal" data-whichform="Edit Current Post" data-target='#postEditModalForm<?php echo $id;?>'>Edit</button></a></td>
      <td><a data-js="btn-remove"><button id="{{$post->id}}" type="button" class="btn btn-danger" data-toggle="modal" data-target='#deleteModalForm{{$post->id}}'>Delete</span></a></td>
    </tr>


    <!--Delete Modal -->
<div class="modal fade" id="deleteModalForm{{$post->id}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete this post?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="postDeleteForm" method="post" action="{{route('admin.deletepost', $post->id)}}">
        {{csrf_field()}}
        {{method_field('DELETE')}}
      <div class="modal-body">
        The contents of the this post record cannot be accessed again after deletion. Would you still like to delete?
        <input type="hidden" name="postDeleteForm_id" value="{{$post->id}}">
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-deep-orange">Yes</button>
      </form>
      </div>
    </div>
  </div>
</div>

    <!-- The edit Modal  (MAY WANT TO PUT INTO SEPERATE MODULE FILE)-->
    <div class="modal fade" id="postEditModalForm<?php echo $id;?>">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Edit Current Post</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <form id="postForm" method="post" action="{{route('admin.editpost', $post->id)}}">
          {{csrf_field()}}
          {{method_field('PUT')}}
          <div class="modal-body mx-3">
           <div class="md-form mb-5">
             <label data-error="wrong" data-success="right">Name</label>
             <select name="postForm-name" class="form-control validate">
               @foreach($users as $user)
                <option value="{{$user->name}}">{{$user->name}}</option>
                @endforeach
              </select>
           </div>
           <div class="md-form mb-5">
             <label data-error="wrong" data-success="right">HTML Slug</label>
             <input type="text" name="postForm-slug" class="form-control validate" value="{{$post->slug}}"></input>
           </div>

           <div class="md-form mb-4">
             <label data-error="wrong" data-success="right">Post title</label>
             <input type="text" name="postForm-title" class="form-control validate" value="{{$post->title}}">
           </div>

           <div class="md-form mb-4">
             <label data-error="wrong" data-success="right">Post excerpt</label>
             <input type="text" name="postForm-excerpt" class="form-control validate" value="{{$post->excerpt}}">
           </div>

           <div class="md-form mb-4">
             <label data-error="wrong" data-success="right">Post body</label>
             <input type="text" name="postForm-body" class="form-control validate" value="{{$post->body}}">
           </div>

           <div class="md-form mb-4">
             <label data-error="wrong" data-success="right">Post image</label>
             <input type="text" name="postForm-image" class="form-control validate" value="{{$post->image}}">
           </div>

         </div>
         <div class="modal-footer d-flex justify-content-center">
           <input type="hidden" name="postForm_id" value="{{$post->id}}">
           <button id="confirmBtn" class="btn btn-deep-orange" type="submit">
Confirm Edit</button>
        </form>
         </div>

        </div>
      </div>
    </div>


    <!-- The add Modal  (MAY WANT TO PUT INTO SEPERATE MODULE FILE)-->
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

    @endforeach
  </table>
  <!--SOME CONTAINER SAYING WE AINT GOT SHIT-->
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
