 @extends('layout.mainlayout')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      <div class="post">
          <h2 class="post-title">
            {{$post->title}}
          </h2>
          <p class="post-content">
            {{$post->body}}
          </p>
        <p class="post-meta">Posted by
          <a href="#">{{$post->author->name}}
          </a>
          on {{$post->created_at}}</p>
      </div>
      <hr>
      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
      </div>
    </div>
  </div>
</div>

@endsection
