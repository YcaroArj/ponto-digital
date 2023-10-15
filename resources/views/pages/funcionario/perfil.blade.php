@extends('layout.template')

@section('title', 'perfil')

@section('content')

    <div class="div-content">
        <div class="div-container">
            <div class="container">
                <div class="row">
                    <div class="coluna-dados col">
                        <div class="info">
                            <h1>Alterar Dados</h1>
                        </div>
                        <input class="input-perfil" type="text" placeholder="Nome">
                        <input class="input-perfil" type="text" placeholder="E-mail">
                        <div class="btn-perfil">
                            <button>Salvar</button>
                        </div>
                        <hr>
                        <div class="info">
                            <h1>Alterar Senha</h1>
                        </div>
                        <input class="input-perfil" type="text" placeholder="Digite sua senha">
                        <input class="input-perfil" type="text" placeholder="Digite sua nova senha">
                        <input class="input-perfil" type="text" placeholder="Confirme sua nova senha">
                        <div class="btn-perfil">
                            <button>Salvar</button>
                        </div>
                    </div>
                    <div class="coluna-dados col">
                        <div class="profile-icon">
                            <img src="{{ asset('img/user.jpg') }}" alt="Foto de Perfil Padrão">
                        </div>
                        <form action="{{ route('perfil') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="foto_de_perfil" id="foto_de_perfil">
                            <button type="submit">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
