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
                    <a href="{{ route('home') }}" class="button is-danger"
                        style="background-color: #ff3860; color: white; border-color: #ff3860;">
                        <i class="fa-solid fa-arrow-left" style="color: white;"></i> Regresar
                    </a>

                    <button class="button is-info js-modal-trigger" data-target="modal-nvo-pieza"
                        style="background-color: rgb(36, 85, 198); color: white; border-color: aqua;">
                        <i class="fa-solid fa-plus" style="color: white;"></i> Nueva pieza
                    </button>

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
                                <div class="actions">
                                    <button class="button is-info js-modal-trigger"
                                        data-target="modal-{{ $pieza->serial_number }}"
                                        style="background-color: rgb(36, 85, 198); color: white; border-color: aqua;">
                                        <i class="fa-solid fa-pen-to-square" style="color: white;"></i>
                                    </button>

                                    <form action="{{ route('PiezaEliminar', $pieza->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button is-danger"
                                            onclick="return confirm('¿Estás seguro de que quieres eliminar esta PIEZA?')"
                                            style="background-color: #ff3860; color: white; border-color: #ff3860;">
                                            <i class="fa-solid fa-trash-can" style="color: white;"></i>
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

            

            <div class="pagination">
                {{ $piezas->links('vendor.pagination.bulma') }}
            </div>

            <!-- Modal crear -->
            <div id="modal-nvo-pieza" class="modal">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <div class="box">
                        <p class="title is-5 has-text-centered">Agregar Pieza</p>
                        <form method="POST" action="{{ route('PiezaCrear', ['id' => $user->id]) }}">
                            @csrf
                            <div class="field">
                                <label class="label">Numero Serial</label>
                                <div class="control has-icons-left">
                                    <input id="serialNumber" class="input" type="text" name="txtSerialNumber"
                                        value="{{ old('txtSerialNumber') }}">
                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-key"></i>
                                    </span>
                                </div>
                                @error('txtSerialNumber')
                                    <p class="help is-danger">Ingresa el numero serial</p>
                                @enderror
                            </div>
                            <div class="has-text-centered">
                                <button class="button is-primary" type="submit"
                                    style="background-color: rgb(36, 85, 198); color: white; border-color: #007bff;">
                                    <i class="fa-solid fa-floppy-disk" style="color: white;"></i> Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="modal-close is-large" aria-label="close"></button>
            </div>
            <figure class="image is-128x128" style="margin: 0 auto;">
                <img src="/img/logo.png" alt="Descripción de la imagen">
            </figure>
        </div>
    </div>

    @if ($errors->has('txtSerialNumber'))
        <script>
            document.getElementById('modal-nvo-pieza').classList.add('is-active');
        </script>
    @endif
    </script>
@endsection
