<!-- resources/views/default.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NXMRCXH8BG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NXMRCXH8BG');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torrange</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/ico.png') }}"/>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/ico.png') }}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/ico.png') }}"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        img.logo, img.download{
            display: block;
            margin: 0 auto;
            width: 25%;
        }

        #load_gif{
            display: block;
            margin: 0 auto;
            width: 25%;
        }
        
        img.cove{
            display: block;
            margin: 0 auto;
        }

        #logo_triste {
            display: none;
        }
    </style>
    <style>
    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu .dropdown-menu {
      display: none;
      position: absolute;
      left: 100%;
      top: 0;
    }

    .dropdown-submenu .dropdown-menu.show {
      display: block;
    }
  </style>
    @yield('head')
</head>

<body style="background-color: #0C0E1F;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Torrange</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="navbar-nav me-auto">
      <a class="nav-item nav-link active" href="{{route('web.index')}}">Buscar <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="{{route('web.destaque')}}">Destaque</a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categoria
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><hr class="dropdown-divider"></li>
            <li class="dropdown-submenu">
              <a class="dropdown-item dropdown-toggle">Filmes</a>
              <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1])}}">Todas</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'acao'])}}">Ação</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'animacao'])}}">Animação</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'aventura'])}}">Aventura</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'biografia'])}}">Biografia</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'comedia'])}}">Comédia</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'romance,comedia'])}}">Comédia Romântica</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'drama'])}}">Drama</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'curta'])}}">Curtas</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'documentario'])}}">Documentário</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'esporte'])}}">Esporte</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'familia'])}}">Família</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'fantasia'])}}">Fantasia</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'faroeste'])}}">Faroeste</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'ficcao_cientifica'])}}">Ficção Científica</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'film_noir'])}}">Film Noir</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'guerra'])}}">Guerra</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'historia'])}}">História</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'misterio'])}}">Mistério</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'musica'])}}">Música</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'musical'])}}">Musical</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'policial'])}}">Policial</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'romance'])}}">Romance</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'suspense'])}}">Suspense</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 1, 'subCategoria' => 'terror'])}}">Terror</a></li>
              </ul>
            </li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 14])}}">Animes</a></li>
          <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 12])}}">HQs</a></li>
          <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 16])}}">Desenhos Animados</a></li>
          <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 5])}}">Mangás</a></li>
          <li><hr class="dropdown-divider"></li>
            <li class="dropdown-submenu">
              <a class="dropdown-item dropdown-toggle">Seriados</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2])}}">Todas</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'acao'])}}">Ação</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'animacao'])}}">Animação</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'aventura'])}}">Aventura</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'biografia'])}}">Biografia</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'comedia'])}}">Comédia</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'romance,comedia'])}}">Comédia Romântica</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'drama'])}}">Drama</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'curta'])}}">Curtas</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'documentario'])}}">Documentário</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'esporte'])}}">Esporte</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'familia'])}}">Família</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'fantasia'])}}">Fantasia</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'faroeste'])}}">Faroeste</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'ficcao_cientifica'])}}">Ficção Científica</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'guerra'])}}">Guerra</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'historia'])}}">História</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'misterio'])}}">Mistério</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'musica'])}}">Música</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'musical'])}}">Musical</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'policial'])}}">Policial</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'romance'])}}">Romance</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'suspense'])}}">Suspense</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 2, 'subCategoria' => 'terror'])}}">Terror</a></li>
              </ul>
            </li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 18])}}">Cursos</a></li>
          <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 11])}}">Audiobook</a></li>
          <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 10])}}">E-Books</a></li>
          <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 7])}}">Outros</a></li>
          <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 8])}}">Esportes</a></li>
          <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 9])}}">Revistas</a></li>
          <li><hr class="dropdown-divider"></li>
            <li class="dropdown-submenu">
              <a class="dropdown-item dropdown-toggle" href="#">Adultos</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 19])}}">Filmes Adultos</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 15])}}">Fotos Adultas</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 22])}}">Animes Adultos</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 21])}}">Mangás Adultos</a></li>
                <li><a class="dropdown-item" href="{{route('web.categoria', ['categoria' => 23])}}">HQs Adultas</a></li>
              </ul>
            </li>
          <li><hr class="dropdown-divider"></li>
        </ul>
      </li>
    </div>
    
    <div class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchInput">
      <button class="btn btn-outline-success" type="submit" id="searchButton">Search</button>
    </div>
  </div>
</nav>
    <div class="container text-center mt-5">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          var submenus = document.querySelectorAll('.dropdown-submenu a.dropdown-toggle');

          submenus.forEach(function(submenu) {
            submenu.addEventListener('click', function(e) {
              e.preventDefault();
              e.stopPropagation();
              var dropdownMenu = this.nextElementSibling;
              dropdownMenu.classList.toggle('show');
            });
          });
        });
      </script>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
          function serch() {
              var searchValue = document.getElementById('searchInput').value;
              if (searchValue == '') {
                  return;
              }
              var apiUrl = "{{ route('web.serch', ['search' => '__termo__']) }}";
              var searchUrl = apiUrl.replace('__termo__', encodeURIComponent(searchValue));
              window.location.href = searchUrl;
          }

          document.getElementById('searchButton').addEventListener('click', function() {
              serch();
          });
        });
      </script>
    @yield('script')
</body>

</html>