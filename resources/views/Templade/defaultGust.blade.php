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
    @yield('script')
</body>

</html>