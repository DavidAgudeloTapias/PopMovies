@extends('layouts.app')

@section('title', $viewData["title"])

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <img src="{{ asset('/img/Logo_PopMovies.png') }}" class="img-fluid rounded mx-auto d-block" alt="Logo PopMovies">
            <div class="mt-4">
                <p class="lead">PopMovies es un e-commerce innovador enfocado en la venta de películas físicas, creado especialmente 
                    para amantes del cine, coleccionistas, y quienes valoran la experiencia de una película en formato tangible. 
                    Nuestra misión es construir una comunidad apasionada por el cine, ofreciendo un catálogo amplio y diverso y 
                    secciones informativas sobre el mundo cinematográfico. PopMovies se dedica a proporcionar una experiencia única y 
                    completa, desde la búsqueda de una película favorita hasta su entrega física, creando un vínculo especial entre el 
                    cine y su audiencia.</p>
            </div>
        </div>
    </div>
</div>
@endsection