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
                            <h2>{{ $workload }}h</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="div-cards col">
                <div class="card-hour-t">
                    <h3>{{ $sumTimeWorked }}h</h3>
                    <p>Horas Trabalhadas</p>
                </div>
                <div class="card-hour-e">
                    <h3>{{ $totalOverTime }}h</h3>
                    <p>Horas Extras</p>
                </div>
                <div class="card-falta">
                    <h3>{{ $fouls }}</h3>
                    <p>Faltas</p>
                </div>
            </div>
            <div class=" col-6">
                <div class="table-col">
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
                            @php
                            use Carbon\Carbon;
                            @endphp
                            @foreach ($getMonth->reverse()->take(9) as $item)
                            <tr>
                                <th scope="row">{{ Carbon::parse($item->dia)->format('d') }}</th>
                                <td>{{ $item->entrada }}</td>
                                <td>{{ $item->saidaAlmoco }}</td>
                                <td>{{ $item->retornoAlmoco }}</td>
                                <td>{{ $item->saida }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Ver todos os Registros</a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tabela de Horários</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class=" table-wrapper">
                                        <table class="table-Users table table-hover">
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
                                                @foreach ($getAll->reverse() as $item)
                                                <tr>
                                                    <th scope="row">{{ Carbon::parse($item->dia)->format('d/m/Y') }}</th>
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
                                <div class="modal-footer">
                                    <button type="button" class="btn-modal btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection