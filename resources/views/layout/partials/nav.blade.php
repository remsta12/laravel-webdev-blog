<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="/">Remy's Blog Site</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{route('blog')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('blog.about')}}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('blog.random')}}">Random Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('blog.contact')}}">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
