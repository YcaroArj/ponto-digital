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

                                        <!-- Dark/light button -->
                                        <div class="clock__theme">
                                            <i class='bx bxs-moon' id="theme-button"></i>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="clock__text">
                                            <div class="clock__text-hour" id="text-hour"></div>
                                            <div class="clock__text-minutes" id="text-minutes"></div>
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
                </div>
            </div>
            <div>
            </div>
        </div>
    </div>
@endsection
