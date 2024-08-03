<header id="home">
    @php
      $isLogedIn =auth()->check() ? true:false;
      @endphp
    <nav id="#navbar" class="navbar dark dark navbar-expand-lg position-fixed top-0 w-100 pb-2">
    <input type="hidden" id="isUser" value="{{$isLogedIn?'true':'false'}}">
      <div class="container">
        <a class="navbar-brand" href="index.html"><img src="./img/logo-blog.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto" style="margin-right: 30px;">
            <a class="nav-link" href="/">home</a>
          </div>
        </div>
        <div>
          @if($isLogedIn)
          @php
            $user = auth()->user();
          @endphp
          <button type="button" class="btn btn-outline-info" id="logout" data-route="">Logout</button>
          @else
            <button type="button" class="btn btn-outline-info show-modal text-white" data-route="/login">Sign In</button>
            <button type="button" class="btn btn-outline-info show-modal text-white" data-route="/register">Register</button>
          @endif
        </div>
        
     
      </div>
    </nav>
  </header>