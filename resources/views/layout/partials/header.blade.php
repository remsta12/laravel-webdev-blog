@if(!empty($post->image))
  <header class="masthead" style="background-image: url('{{$post->image}}')">
@else
  <header class="masthead" style="background-image: url('./../../../img/home-bg.jpg')">
@endif
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>WELCOME</h1>
          <span class="subheading">A Portfolio/Blog practice site to work on</span>
        </div>
      </div>
    </div>
  </div>
</header>
