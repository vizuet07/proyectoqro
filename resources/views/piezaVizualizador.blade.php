@extends('layout.plantilla')
@section('content')
<div class="card mt-5">
    <header class="card-header">
        <p class="card-header-title">
            Piezas
        </p>
    </header>
    <div class="card-content">
        <div class="columns is-multiline is-mobile">
            <div class="column buttons ">
                <a href="{{ route('home') }}" class="button is-danger"><i class="fa-solid fa-arrow-left"></i>Regresar</a>
            </div>
            <div class="column">
                <form method="GET" action="{{ route('PiezaVistaFecha') }}">
                    <div class="field has-addons">
                        <div class="control">
                            <input class="input" type="date" name="selected_date" value="{{ request()->input('selected_date') }}">
                        </div>
                        <div class="control">
                            <button type="submit" class="button" style="background-color: rgb(36, 85, 198); color: white;">Filtrar por fecha</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                    <th>NUMERO SERIAL</th>
                    <th>FECHA REGISTRO</th>
                    <th>ESTADO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($piezas as $pieza)
                <tr>
                    <td>{{ $pieza->Modelo }}</td>
                    <td>{{ $pieza->FechaCreacion }}</td>
                    <td>
                        @if($pieza->Estatus == 1)
                            Dock
                        @elseif($pieza->Estatus == 2)
                            Sospechoso
                        @elseif($pieza->Estatus == 3)
                            Cuarentena
                        @elseif($pieza->Estatus == 4)
                            Finalizado
                        @elseif($pieza->Estatus == 5)
                            Finalizado2
                        @else
                            Error
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $piezas->links('vendor.pagination.bulma') }}
        </div>
    </div>
@endsection
