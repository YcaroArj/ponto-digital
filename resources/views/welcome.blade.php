<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/pages/login/login.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Ponto digital</title>
</head>

<body>
    <section class="side">
        <img src="" alt="">
    </section>

    <section class="main">
        <div class="login-container">
            <p class="title">Bem vindo</p>
            <div class="separator"></div>
            <p class="welcome-message">Por favor, entre com suas credenciais para acessar nossos serviços
            </p>
            @if (session('danger'))
            <div class="alert alert-danger" role="alert" id="liveAlertPlaceholder" style="display: flex; justify-content: space-between;">
                {{ session('danger') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            <form class="login-form" method="GET" action="{{ route('auth.user') }}">
                @csrf
                <div class="form-control" style="border: none;">
                    <input id="email" class="block mt-1 w-full" placeholder="E-mail" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-control" style="border: none;">
                    <input id="password" class="block mt-1 w-full" placeholder="Senha" type="password" name="password" required autocomplete="current-password" />
                    <i class="fas fa-lock"></i>
                </div>
                <button type="submit" class="btn-home">Entrar</button>
            </form>
            <div class="ap-cad">
                <p>Não possui conta ?
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastre-se</a>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar usuario</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('create.user') }}" method="POST">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nome</label>
                                                    <input type="text" name="nome" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">E-mail</label>
                                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Cargo</label>
                                                    <select class="form-control" id="selectStatus" name="cargo">
                                                        <option value="" disabled selected hidden> </option>
                                                        <option value="Secretário de Educação">Secretário de Educação</option>
                                                        <option value="Sub-Secretário de Educação">Sub-Secretário de Educação
                                                        </option>
                                                        <option value="Assessor l">Assessor l</option>
                                                        <option value="Assessor ll">Assessor ll</option>
                                                        <option value="Assessor lll">Assessor lll</option>
                                                        <option value="Estágiario">Estágiario</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tipo de Contrato</label>
                                                    <select class="form-control" id="selectStatus" name="TipoContrato">
                                                        <option value="" disabled selected hidden></option>
                                                        <option value="Concursado">Concursado</option>
                                                        <option value="Contratado">Contradado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tipo de Usuário</label>
                                                    <select class="form-control" id="selectStatus" name="TipoUsuario">
                                                        <option value="" disabled selected hidden></option>
                                                        <option value="Padrão">Padrão</option>
                                                        <option value="Administrador">Administrador</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div style="display: flex; justify-content: space-evenly;">
                                                <button type="button" class="btnFec" data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btnCad">Cadastrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </p>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>