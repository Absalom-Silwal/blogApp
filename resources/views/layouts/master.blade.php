<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content=""> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Clear blog</title>
    <link rel="stylesheet" href="/blog/css/app.css">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar-example" data-bs-offset="82">
      @php
      $isLogedIn =auth()->check() ? true:false;
      @endphp
      <header id="home">
        <nav id="#navbar" class="navbar dark dark navbar-expand-lg position-fixed top-0 w-100 pb-2">
        <input type="hidden" id="isUser" value="{{$isLogedIn?'true':'false'}}">
          <div class="container">
            <a class="navbar-brand" href="index.html"><img src="./img/logo-blog.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ms-auto">
                <a class="nav-link" href="/">home</a>
              </div>
            </div>
            @if($isLogedIn)
            @php
              $user = auth()->user();
            @endphp
            <button type="button" class="btn btn-outline-info" id="logout" data-route="">Logout</button>
            @else
              <button type="button" class="btn btn-outline-info show-modal" data-route="/login">Sign In</button>
              <button type="button" class="btn btn-outline-info show-modal" data-route="/register">Register</button>
            @endif
         
          </div>
        </nav>
      </header>
      <main>
        @yield('content')  
      </main>
      <footer class="text-center text-uppercase py-5"> 
        <div class="footer-icons ">
          <a href=""><img src="./img/facebook-footer.svg" alt=""></a>
          <a href=""><img src="./img/instagramm-footer.svg" alt=""></a>
          <a href=""><img src="./img/pinterest-footer.svg" alt=""></a>
        </div>
        <div class="copyright pt-4 text-muted text-center">
          <p>&copy; 2022 YOUR-DOMAIN | Created by <a href="https://firmbee.com/solutions/free-invoicing-app-billing-software/" title="Firmbee - Free Invoicing App" target="_blank">Firmbee.com</a> </p>
          <!--
          This template is licenced under Attribution 3.0 (CC BY 3.0 PL),
          You are free to: Share and Adapt. You must give appropriate credit, you may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.
          --> 
      </div>
      </footer>
      
      <!-- Button trigger modal -->
      
        <!-- Modal -->
        <div class="modal fade" id="bs-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 600px;">
            <div class="modal-content p-5" id="bs-modal-content">
              
            </div>
          </div>
        </div>

      <div class="fb2022-copy">Fbee 2022 copyright</div>
      
      <script src="/blog/js/app.js"></script>

</body>
</html>

