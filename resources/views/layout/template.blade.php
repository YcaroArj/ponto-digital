<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponto Digital - @yield('title')</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
</head>

<body>
    <main>

        <nav class="nav navbar navbar-expand-lg">
            <div class="container-fluid">
                <span>Ponto Digital</span>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('bater_ponto') }}">Bater ponto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('relatorio') }}">Relatório</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('help') }}">Help</a>
                        </li>

                        @if(auth()->check() && auth()->user()->TipoUsuario === 'Administrador')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('funcionario') }}">Funcionários</a>
                        </li>
                        @endif

                    </ul>
                </div>
            </div>
            <div class="perfil">
                <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" type="button" style="background: transparent; border: none;" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->nome }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        <li><a class="dropdown-item" href="{{ route ('perfil') }}">Perfil</a></li>
                        <li><a class="dropdown-item" href="{{ route ('configuracao') }}">Configuração</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="{{ asset('js/clock-timer/clock.js') }}"></script>
    <script src="{{ asset('js/chartCollum.js') }}"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

</body>

</html>