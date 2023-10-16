@extends('layout.template')

@section('title', 'Help')


@section('content')
<div class="div-content">
    <div class="div-container">
        <!-- Button trigger modal -->
        <button type="button" class="btn-help btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Perguntas frequentes
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Perguntas frequentes</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quam quaerat ex aliquam natus,
                        facilis error dolores sed odit voluptates harum officia vero nesciunt eos. Aperiam libero ab id! Reiciendis?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection