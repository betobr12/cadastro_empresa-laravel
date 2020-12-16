<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
</head>
  <title>Cadastro de Empresas</title>
</head>
<body>
  
<!--navbar -->
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">EmpCad</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ (Route::current()->getName() === 'site.home' ? 'active' : '') }}"><a class="nav-link" href="{{route('index')}}">Home</a></li>
        <li class="nav-item {{ (Route::current()->getName() === 'site.courses' ? 'active' : '') }}"><a class="nav-link" href="{{route('company.list')}}">Empresas</a></li>
          <li class="nav-item {{ (Route::current()->getName() === 'site.contact' ? 'active' : '') }}"><a class="nav-link" href="">Unidades</a></li>

        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
        </form>
      </div>
    </nav>
  </header>
  

    <!--main -->
    <main role="main">
      
        @yield('content')
      
      
        <!-- FOOTER -->
        <footer class="container">
              <p class="float-right"><a href="#">Voltar</a></p>
              <p>&copy; {{ date('Y')}} Company, Inc. &middot; <a href="#">Privacidade</a> &middot; <a href="#">Terms</a></p>
        </footer>
    </main>
    

    
  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  <script>
      $(document).ready( function () {
         $('#table_company').DataTable();
         $('.dataTables_length').addClass('bs-select');
      } );
  </script>
</body>
</html>