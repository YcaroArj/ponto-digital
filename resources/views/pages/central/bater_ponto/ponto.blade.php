@extends('layout.template')

@section('title', 'Bater Ponto')


@section('content')

    <div class="div-content">
        <div class="div-container">
            <div class="container text-center">
                <div class="row">
                    <div class="col-9">
                        <form method="POST" action="{{ route('Cad.hora') }}">
                            <div class="row">
                                <div class="col">
                                    <button class="btn-entrada" type="submit">Registrar Entrada</button>
                                </div>
                                <div class="col">
                                    <button class="btn-saida-al" type="submit">Registrar Saida para Almoço</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button class="btn-retorno-al" type="submit">Registrar Retorno do Almoço</button>
                                </div>
                                <div class="col">
                                    <button class="btn-saida" type="submit">Registrar Saida</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-3">
                        <div class="data-e-hora">
                            <p id="data-atual"></p>
                            <div class="clock">
                                <span id="hora">00</span>
                                <span>:</span>
                                <span id="minutos">00</span>
                                <span>:</span>
                                <span id="segundos">00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>
    </div>
@endsection
