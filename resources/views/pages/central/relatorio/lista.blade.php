@extends('layout.template')
@section('title', 'Relatório')

@section('content')
<div class="div-content">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card-user">
                    <div class="div-info">
                        @foreach($img as $item)
                        <div class="profile-icon">
                            @if ($item->image)
                            <img src="{{ asset('img/' . $item->image) }}" class="img img-responsive">
                            @else
                            <img src="{{ asset('img/user.jpg') }}" class="img img-responsive">
                            @endif
                        </div>
                        @endforeach
                        <div class="info-user">
                            <h1>{{ Auth::user()->nome }}</h1>
                            <h2>{{ Auth::user()->cargo }}</h2>
                            <h3>{{ Auth::user()->TipoContrato }}</h3>
                        </div>
                        <div class="info-carga-h">
                            <h1>Carga Horária</h1>
                            <h2>{{ $cargaHoraria }}h</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="div-cards col">
                <div class="card-hour-t">
                    <h3>{{ $soma }}h</h3>
                    <p>Horas Trabalhadas</p>
                </div>
                <div class="card-hour-e">
                    <h3>{{ $totalHorasExtras }}h</h3>
                    <p>Horas Extras</p>
                </div>
                <div class="card-falta">
                    <h3>{{ $faltas }}</h3>
                    <p>Faltas</p>
                </div>
            </div>
            <div class="col-6">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Dia</th>
                            <th scope="col">Entrada</th>
                            <th scope="col">Saida para Almoco</th>
                            <th scope="col">Retorno do Almoco</th>
                            <th scope="col">Saida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mes as $item)
                        <tr>
                            <th scope="row">{{ $item->dia }}</th>
                            <td>{{ $item->entrada }}</td>
                            <td>{{ $item->saidaAlmoco }}</td>
                            <td>{{ $item->retornoAlmoco }}</td>
                            <td>{{ $item->saida }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection