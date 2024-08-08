@extends('layout.plantilla')

@section('content')
    <div class="card mt-5">
        <header class="card-header">
            <p class="card-header-title">
                Piezas - {{ $user->name }}
            </p>
        </header>
        <div class="card-content">
            <div class="columns is-multiline is-mobile">
                <div class="column buttons">
                    <a href="{{ route('home') }}" class="button is-danger" style="background-color: #ff3860; color: white; border-color: #ff3860;">
                        <i class="fa-solid fa-arrow-left" style="color: white;"></i> Regresar
                    </a>

                    <button class="button is-info js-modal-trigger" data-target="modal-nvo-pieza"
                        style="background-color: rgb(36, 85, 198); color: white; border-color: aqua;">
                        <i class="fa-solid fa-plus" style="color: white;"></i> Nueva pieza
                    </button>
                </div>
                <div class="column">
                    <form method="GET" action="{{ route('PiezaVistaFechaEstado',Auth::user()->id) }}">
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
            @if (session('Correcto'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('Correcto') }}
                </div>
            @endif
            @if (session('Error'))
                <div class="notification is-danger">
                    <button class="delete"></button>
                    {{ session('Error') }}
                </div>
            @endif
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th>NUMERO SERIAL</th>
                        <th>FECHA REGISTRO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($piezas as $pieza)
                        <tr>
                            <td>{{ $pieza->serial_number }}</td>
                            <td>{{ $pieza->created_at }}</td>
                            <td>
            <div class="actions buttons">
                <button class="button is-info js-modal-trigger" data-target="modal-{{ $pieza->serial_number }}">
                    <span class="icon">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </span>
                    <span>Editar</span>
                </button>

                <form method="POST" action="{{ route('print.qr') }}">
                    @csrf
                    <input type="hidden" name="serial_number" value="{{ $pieza->serial_number }}">
                    <button class="button is-info" type="submit">
                        <span class="icon">
                            <i class="fa-solid fa-print"></i>
                        </span>
                        <span>Imprimir</span>
                    </button>
                </form>

                <form action="{{ route('PiezaEliminar', $pieza->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button is-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta PIEZA?')">
                        <span class="icon">
                            <i class="fa-solid fa-trash-can"></i>
                        </span>
                        <span>Eliminar</span>
                    </button>
                </form>
            </div>

                                <div id="modal-{{ $pieza->serial_number }}" class="modal">
                                    <div class="modal-background"></div>
                                    <div class="modal-content">
                                        <div class="box">
                                            <p class="title is-5 has-text-centered">Modificar Pieza</p>
                                            <form method="POST" action="{{ route('PiezaEditar', $pieza->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <div class="field">
                                                    <label class="label">Numero Serial</label>
                                                    <div class="control">
                                                        <input class="input" value="{{ $pieza->serial_number }}" name="UpSerialNumber" id="UpSerialNumber-{{ $pieza->serial_number }}">
                                                    </div>
                                                </div>
                                                <div class="has-text-centered">
                                                    <button class="button is-primary" type="submit">Modificar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <button class="modal-close is-large" aria-label="close"></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $piezas->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <div id="modal-nvo-pieza" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="box">
                <p class="title is-5 has-text-centered">Nueva Pieza</p>
                <form method="POST" action="{{ route('PiezaActualizar', $user->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="field">
                        <label class="label">Numero Serial</label>
                        <div class="control">
                            <input class="input" type="text" name="txtSerialNumber" id="txtSerialNumber" required>
                        </div>
                    </div>
                    <div class="has-text-centered">
                        <button class="button is-primary" type="submit">Actualizar</button>
                    </div>
                </form>

            </div>
        </div>
        <button class="modal-close is-large" aria-label="close"></button>
    </div>
@endsection
