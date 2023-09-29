@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Fecha actual</h1>
        <p>Día: {{ $dia }}</p>
        <p>Mes: {{ $mes }}</p>
        <p>Año: {{ $ano }}</p>
    </div>
</div>
@endsection


