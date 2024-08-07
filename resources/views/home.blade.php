@extends('layout.plantilla')
@section('content')
<div class="card mt-5">
    <header class="card-header">
        <p class="card-header-title">
            Home
        </p>
    </header>
    <div class="card-content">
        <div class="content has-text-centered">
            <div class="columns is-centered is-multiline is-mobile mt-4">
                {{--@hasrole('dock')--}}
                <div class="column is-4-desktop is-6-tablet is-12-mobile">
                    <div class="box">
                        <h1 class="title is-6"><i class="fa-solid fa-address-card"></i> PIEZAS</h1>
                        <p>Ver, crear, editar Piezas</p><br>
                        <a href="{{route('PiezaVista', Auth::user()->id)}}" class="button is-danger">Acceder</a>
                    </div>
                </div>
                {{--@endhasrole--}}
                {{--@hasrole('sospechoso')--}}
                <div class="column is-4-desktop is-6-tablet is-12-mobile">
                    <div class="box">
                        <h1 class="title is-6"><i class="fa-solid fa-address-card"></i> PIEZAS</h1>
                        <p>Ver, crear, editar Piezas</p><br>
                        <a href="{{route('PiezaVista', Auth::user()->id)}}" class="button is-danger">Acceder</a>
                    </div>
                </div>
                {{--@endhasrole--}}
                {{--@hasrole('cuarentena')--}}
                <div class="column is-4-desktop is-6-tablet is-12-mobile">
                    <div class="box">
                        <h1 class="title is-6"><i class="fa-solid fa-address-card"></i> PIEZAS</h1>
                        <p>Ver, crear, editar Piezas</p><br>
                        <a href="{{route('PiezaVista', Auth::user()->id)}}" class="button is-danger">Acceder</a>
                    </div>
                </div>
                {{--@endhasrole--}}
                {{--@hasrole('visualizacion')--}}
                <div class="column is-4-desktop is-6-tablet is-12-mobile">
                    <div class="box">
                        <h1 class="title is-6"><i class="fa-solid fa-address-card"></i> PIEZAS</h1>
                        <p>Ver Piezas</p><br>
                        <a href="{{route('PiezaVistaVizualizador')}}" class="button is-danger">Acceder</a>
                    </div>
                </div>
                {{--@endhasrole--}}
            </div>
        </div>
    </div>
    <figure class="image is-128x128" style="margin: 0 auto;">
        <img src="/img/logo.png" alt="Descripción de la imagen">
    </figure>
</div>
@endsection
