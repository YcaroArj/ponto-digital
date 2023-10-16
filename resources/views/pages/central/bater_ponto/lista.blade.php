@extends('layout.template')

@section('title', 'Bater Ponto')


@section('content')

<div class="div-content">
    <div class="div-container">
        <div class="container text-center">
            <div class="container">
                <div class="row">
                    <div class="col-clock col-sm">
                        <section class="clock container">
                            <div class="clock__container grid">
                                <div class="clock__content grid">
                                    <div class="clock__circle">
                                        <span class="clock__twelve"></span>
                                        <span class="clock__three"></span>
                                        <span class="clock__six"></span>
                                        <span class="clock__nine"></span>
                                        <div class="clock__rounder"></div>
                                        <div class="clock__hour" id="clock-hour"></div>
                                        <div class="clock__minutes" id="clock-minutes"></div>
                                        <div class="clock__seconds" id="clock-seconds"></div>
                                    </div>

                                    <div>
                                        <div class="clock__text">
                                            <div class="container-clock">
                                                <div class="clock__text-hour" id="text-hour"></div>
                                                <div class="clock__text-minutes" id="text-minutes"></div>
                                                <div class="clock__text-seconds" id="text-seconds"></div>
                                            </div>
                                            <div class="clock__text-ampm" id="text-ampm"></div>
                                        </div>

                                        <div class="clock__date">
                                            <!-- <span id="date-day-week"></span> -->
                                            <span id="date-day"></span>
                                            <span id="date-month"></span>
                                            <span id="date-year"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class=" col-sm">
                        <div class="col-ponto">
                            <form method="POST" action="{{ route('Entrada') }}">
                                @csrf
                                <button class="btn-ponto" type="submit">Registrar Entrada - Turno 1</button>
                            </form>
                        </div>
                        <div class="col-ponto">
                            <form method="POST" action="{{ route('RetornoAlmoco') }}">
                                @csrf
                                <button class="btn-ponto" type="submit">Registrar Entrada - Turno 2</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="col-ponto">
                            <form method="POST" action="{{ route('SaidaAlmoco') }}">
                                @csrf
                                <button class="btn-ponto" type="submit">Registrar Saida - Turno 1</button>
                            </form>
                        </div>
                        <div class="col-ponto">
                            <form method="POST" action="{{ route('Saida') }}">
                                @csrf
                                <button class="btn-ponto" type="submit">Registrar Saida - Turno 2</button>
                            </form>
                        </div>
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