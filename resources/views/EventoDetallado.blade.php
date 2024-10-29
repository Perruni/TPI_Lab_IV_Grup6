@extends('layouts.index')
@section('title', 'Detalles del Evento')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid py-5" style="background-color: #f5f5f5; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-4">
                <h1 class="mb-4">{{ $evento->nombreEvento }}</h1>
                <p><strong>Descripción:</strong> {{ $evento->descripcion }}</p>
                <p><strong>Fecha Inicio:</strong> {{ $evento->fechaInicio }} {{ $evento->horaInicio }}</p>
                <p><strong>Fecha Fin:</strong> {{ $evento->fechaFin }} {{ $evento->horaFin }}</p>
                
                <a href="{{ route('mostrareventos') }}" class="btn btn-secondary mt-3">Volver a Eventos</a>
            </div>
        </div>
    </div>
</div>
@endsection
