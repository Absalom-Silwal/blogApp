<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content=""> 
    <title>Clear blog</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> -->
   
    <link rel="stylesheet" href="/blog/css/app.css">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar-example" data-bs-offset="82">
      <header id="home">
        <nav id="#navbar" class="navbar dark dark navbar-expand-lg position-fixed top-0 w-100 pb-2">
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
          <div class="modal-dialog" role="document">
            <div class="modal-content" id="bs-modal-content">
              
            </div>
          </div>
        </div>

      <div class="fb2022-copy">Fbee 2022 copyright</div>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script src="/blog/js/app.js"></script>

</body>
</html>

