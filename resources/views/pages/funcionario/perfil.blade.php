@extends('layout.template')

@section('title', 'perfil')

@section('content')

<div class="div-content-perfil">
    <div class="div-container-perfil">
        <div class="container">
            <div class="row">
                <div class="coluna-perfil">
                    @foreach($data as $item)
                    <div class="profile-icon">
                        @if ($item->image)
                        <img src="{{ asset('img/' . $item->image) }}" class="img img-responsive">
                        @else
                        <img src="{{ asset('img/user.jpg') }}" class="img img-responsive">
                        @endif
                    </div>
                    @endforeach
                </div>
                <div class="coluna-dados col">
                    <input class="input-perfil" type="text" name="nome" id="nome" placeholder="Nome" value="{{Auth::user()->nome}}" disabled="">
                    <input class="input-perfil" type="text" name="email" id="email" placeholder="E-mail" value="{{Auth::user()->email}}" disabled="">

                    <hr>
                    <div class="info">
                        <h1>Alterar Senha</h1>
                    </div>
                    <input class="input-perfil" type="password" placeholder="Digite sua senha">
                    <input class="input-perfil" type="password" placeholder="Digite sua nova senha">
                    <input class="input-perfil" type="password" placeholder="Confirme sua nova senha">
                    <div class="btn-perfil">
                        <button>Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection