@extends('layout.template')

@section('title', 'Help')


@section('content')
<div class="div-content">
    <div class="div-container-funcionarios"> <!-- Button trigger modal --> <button type="button" class="btn-cad
    btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Cadastrar Funcionário </button> <!-- Modal
    -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            Cadastrar usuario</h1>
                        <!-- <button type="button" class=" btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('create_user') }}" method="POST"> @csrf <div class="container">
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
                                                <option value="Secretário de Educação">Secretário de Educação</option>
                                                <option value="Sub-Secretário de Educação">Sub-Secretário de Educação</option>
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
                                </div>
                                <div class="row">
                                    <!-- <input type="file" id="image" name="image" class="from-control-file"> -->
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Escolher foto de perfil</label>
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                    <div class="row" style="display: flex; justify-content: flex-end;">
                                        <button type="button" class="btn-modal btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn-modal btn-primary">Cadastrar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table-Users table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Tipo de Usuário</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
        </table>
        <div class="table-wrapper">
            <table class="table-Users table table-hover">
                <!-- <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Tipo de Usuário</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead> -->
                <tbody>
                    @foreach($queryUsers->sortBy('nome') as $item)
                    <tr>
                        <td scope="row">{{ $item->nome }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->cargo }}</td>
                        <td>Administrador</td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#ModalEdit{{$item->id}}" class="fav-icon-edit"><ion-icon name="create"></ion-icon></a>

                            <!-- Modal -->
                            <div class="modal fade" id="ModalEdit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuário</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('update-user', ['id'=>$item->id])}} " method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Nome</label>
                                                            <input type="text" name="nome" class="form-control" value="{{$item->nome}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">E-mail</label>
                                                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$item->email}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Cargo</label>
                                                            <select class="form-control" id="selectStatus" name="cargo">
                                                                <option value="Secretário de Educação">Secretário de Educação</option>
                                                                <option value="Sub-Secretário de Educação">Sub-Secretário de Educação</option>
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
                                                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{$item->password}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- <input type="file" id="image" name="image" class="from-control-file"> -->
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Escolher foto de perfil</label>
                                                        <input class="form-control" type="file" id="image" name="image">
                                                    </div>
                                                    <div class="row" style="display: flex; justify-content: flex-end;">
                                                        <button type="button" class="btn-modal btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="btn-modal btn-primary">Cadastrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
        </div>

        <a data-bs-toggle="modal" data-bs-target="#ModalDelet{{$item->id}}" class="fav-icon-delet"><ion-icon name="trash"></ion-icon></a>
        <!-- Modal -->
        <div class="modal fade" id="ModalDelet{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="header-delet modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Desejar Excluir o Usuário?</h1>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-delet modal-body">
                        <img src="{{asset('img/png_delet.png')}}" alt="">
                    </div>
                    <div class="footer-delet modal-footer">
                        <form action="{{route('user-destroy', ['id'=>$item->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn-delet btn-secondary" data-bs-dismiss="modal">Voltar</button>
                            <button type="submit" class="btn-delet btn-primary">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>

</div>
</div>
@endsection