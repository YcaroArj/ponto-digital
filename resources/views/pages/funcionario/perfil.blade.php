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
                <div class="coluna-perfil col">
                    @foreach($data as $item)
                    <div class="profile-icon">
                        @if ($item->image)
                        <img src="{{ asset('img/' . $item->image) }}" class="img img-responsive">
                        @else
                        <img src="{{ asset('img/user.jpg') }}" class="img img-responsive">
                        @endif
                    </div>
                    @endforeach
                    <!-- <form action="{{ route('up.icon') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="imagem">Imagem de Perfil: </label>
                        <input type="file" id="image" name="image" class="from-control-file">
                        <button type="submit">Salvar</button>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</div>


@endsection