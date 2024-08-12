<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventos GJM &copy;</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
   
  
  </head>

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
          <form class="d-flex" role="search" method="GET" action="/">
            @csrf
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
            
          </form>
        </div>
      </div>
    </nav>
    

    <div class="main">
      <h2>Principal página de Eventos</h2>
    </div>
    <main class="main-eventos">
        @foreach($banco as $banco)
        <div  class="container">
            <img class="img-evento" src="/images/{{ $banco->image }}" alt="">
            <h3> {{ $banco->title }}</h3>
            <p>{{ $banco->city }}</p>
            <p>{{ $banco->describe }}</p>
            <td>{{ \Carbon\Carbon::parse($banco->data)->format('d/m/Y') }}</td>
            <a href="/view/{{ $banco->id }}" class="btn-evento">Ver</a>
         </div>
        @endforeach
    </main>
    <footer>
      <h1>Eventos GJM &copy; </h1>
     <h3><a style="color: #111; margin-left:20px" href="https://www.linkedin.com/in/get%C3%BAlio-machado-a08076202/">💼 Linkedin do Desenvolvedor</a></h3>
      
    </footer>
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>