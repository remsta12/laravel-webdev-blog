 @extends('layout.mainlayout')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      @foreach($posts as $post)

      <div class="post-preview">
        <a href="{{route('blog.show', $post->id)}}">
          <h3 class="post-subtitle">
            {{$post->excerpt}}
          </h3>
        </a>
        <p class="post-meta">Posted by
          <a href="#">{{$post->author->name}}
          </a>
          on {{$post->created_at}}</p>
      </div>
      <hr>
      @endforeach
      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
      </div>
    </div>
  </div>
</div>

@endsection
