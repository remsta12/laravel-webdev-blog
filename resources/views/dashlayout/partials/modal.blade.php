@extends('dashboard')
<!-- The edit Modal  (MAY WANT TO PUT INTO SEPERATE MODULE FILE)-->
<div class="modal fade" id="editModalForm{{$post->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Edit Current Post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form method="post" action="{{route('admin.editpost', $post->id)}}">
      {{csrf_field()}}
      {{method_field('PUT')}}
      <div class="modal-body mx-3">
       <div class="md-form mb-5">
         <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
         <select name="editForm-name" class="form-control validate" value="{{$post->name}}">
           @foreach($posts as $id => $post)
            <option value="{{$id}}">{{$post->name}}</option>
            @endforeach
          </select>
       </div>
       <div class="md-form mb-5">
         <label data-error="wrong" data-success="right" for="orangeForm-email">HTML Slug</label>
         <input type="text" name="editForm-slug" class="form-control validate" value="{{$post->slug}}">
       </div>

       <div class="md-form mb-4">
         <label data-error="wrong" data-success="right" for="orangeForm-pass">Post title</label>
         <input type="text" name="editForm-title" class="form-control validate" value="{{$post->title}}">
       </div>

       <div class="md-form mb-4">
         <label data-error="wrong" data-success="right" for="orangeForm-pass">Post excerpt</label>
         <input type="text" name="editForm-excerpt" class="form-control validate" value="{{$post->excerpt}}">
       </div>

       <div class="md-form mb-4">
         <label data-error="wrong" data-success="right" for="orangeForm-pass">Post body</label>
         <input type="text" name="editForm-body" class="form-control validate" value="{{$post->body}}">
       </div>

       <div class="md-form mb-4">
         <label data-error="wrong" data-success="right" for="orangeForm-pass">Post image</label>
         <input type="text" name="editForm-image" class="form-control validate" value="{{$post->image}}">
       </div>

     </div>
     <div class="modal-footer d-flex justify-content-center">
       <input type="hidden" name="editForm_id" name="post_id" value="{{$post->id}}">
       <input type="hidden" id="editForm_updatedAt" name="updated_time" value="0">
       <button id="confirmBtn" class="btn btn-deep-orange" type="submit">
Confirm Edit</button>
    </form>
     </div>

    </div>
  </div>
</div>
