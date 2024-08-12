<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '')</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<body>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid" id="div-">
          <a class="navbar-brand" href="/">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              @auth
              <li class="nav-item">
                  <a class="nav-link" href="/form">Criar Evento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/dashboard">Meus Eventos</a>
                  </li>
                  <li class="nav-item">
                      <form action="/logout" method="POST">
                          @csrf
                      <a href="/logout" onclick="event.preventDefault();this.closest('form').submit();" class="nav-link active" aria-current="page" >Sair</a></form>
                      
                    </li>
              @endauth
        
              @guest
              <li class="nav-item">
                  <a class="nav-link" href="/login">Entrar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/register">Cadastre-se</a>
                </li>
              @endguest
              
            
            </ul>
            @if(!empty($search))
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        @endif
        
          </div>
        </div>
      </nav>
      @yield('content')
    
</body>
</html>