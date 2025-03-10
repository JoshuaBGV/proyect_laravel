@extends('layouts.app')
@section('content')
    <div class="mt-2 mb-4">
        <h1 class="title1 ">Agregar nuevo administrador</h1>
    </div>
    <x-admin.alert />
    <div class="mb-5 row">
        <div class="col-lg-8 offset-lg-2 card p-3  shadow">
            <form method="POST" action="{{ url('admin/dashboard/saveadmin') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <h4 class="">Nombre</h4>
                    <div>
                        <input id="name" type="text" class="form-control  " name="fname" value="{{ old('fname') }}"
                            required>
                        @if ($errors->has('fname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('l_name') ? ' has-error' : '' }}">
                    <h4 class="">Apellido</h4>
                    <div>
                        <input id="name" type="text" class="form-control  " name="l_name"
                            value="{{ old('l_name') }}" required>
                        @if ($errors->has('l_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('l_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <h4 class="">Dirección de correo electrónico</h4>

                    <div>
                        <input id="email" type="email" class="form-control  " name="email"
                            value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <h4 class="">Número de teléfono</h4>
                    <div>
                        <input id="phone" type="number" class="form-control  " name="phone"
                            value="{{ old('phone') }}" required>

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <h4 class="">Tipo</h4>
                    <select class="form-control  " onchange="ponerRolAdmin()" id="elRol">
                        <option>Super Admin</option>
                        <option>Central</option>
                        <option>Comercio</option>
                    </select><br>
                </div>

                <input type="hidden" name="type" id="typeRol" value="Super Admin">

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                    <h4 class="">Contraseña</h4>
                    <div>
                        <input id="password" type="password" class="form-control  " name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <h4 class="">Confirmar Conttraseña</h4>
                    <div>
                        <input id="password-confirm" type="password" class="form-control  " name="password_confirmation"
                            required>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" class="px-3 btn btn-primary btn-lg">
                            <i class="fa fa-plus"></i> Guardar usuario
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        async function ponerRolAdmin(){

            let elRol = document.getElementById('elRol').value;

            if(elRol == 'Super Admin'){

                document.getElementById('typeRol').value = 'Super Admin';
            }else if(elRol == 'Central'){

                document.getElementById('typeRol').value = 'Admin';
            }else if(elRol == 'Comercio'){

                document.getElementById('typeRol').value = 'Conversion Agent';
            }
        }
    </script>


@endsection
