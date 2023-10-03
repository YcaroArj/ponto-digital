@extends('layout.template')

@section('title', 'Relatório')

@section('content')
<div class="div-content">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card-user">
                    <div class="div-info">
                        <img src="{{ asset('img/user.jpg') }}" alt="">

                        <div class="info-user">
                            <h1>{{ Auth::user()->nome }}</h1>
                            <h2>{{ Auth::user()->cargo }}</h2>
                            <h3>{{ Auth::user()->TipoContrato }}</h3>
                        </div>
                        <div class="info-carga-h">
                            <h1>Carga Horária</h1>
                            <h2>96 Horas</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="div-cards col-3">
                <div class="card-hour-t">
                    <h3>{{$soma}}h</h3>
                    <p>Horas Trabalhadas</p>
                </div>
                <div class="card-hour-e">
                    <h3>3h</h3>
                    <p>Horas Extras</p>
                </div>
                <div class="card-falta">
                    <h3>0</h3>
                    <p>Faltas</p>
                </div>
            </div>
            <div class="col-6">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Dia</th>
                            <th scope="col">Entrada>
                            <th scope="col">Saida para Almoco</th>
                            <th scope="col">Retorno do Almoco</th>
                            <th scope="col">Saida</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>08:00:00</td>
                            <td>11:00:00</td>
                            <td>11:20:00</td>
                            <td>14:00:00</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection