@extends('home.nav')

@section('contentHome')


    <div class="col-md-8 col-md-offset-2">

            



            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('home.dashboardUpdate') }}" enctype="multipart/form-data">
                     {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $data['profile']['name'] }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $data['profile']['email'] }}" required disabled>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="photo" class="col-md-4 control-label">Photo</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" accept="image/*" class="form-control" name="photo" value="{{ public_path('imgUsers/') . $data['profile']['photo'] }}" capture="camera">

                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif

                                @if ($data['profile']['photo'])
                                    <div class="imgCar">
                                        <img class="imgCar" src="{{ asset('Users/' . $data['profile']['photo']) }}" alt="photo">
                                    </div>
                                @endif

                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped active imageProgress" id="imageProgress" role="progressbar" style="width:0%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="surname1" class="col-md-4 control-label">Apellido 1</label>

                            <div class="col-md-6">
                                <input id="surname1" type="text" class="form-control" name="surname1" value="{{ $data['profile']['surname1'] }}" required placeholder="Apellido 1">

                                @if ($errors->has('surname1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="surname2" class="col-md-4 control-label">Apellido 2</label>

                            <div class="col-md-6">
                                <input id="surname2" type="text" class="form-control" name="surname2" value="{{ $data['profile']['surname2'] }}" required placeholder="Apellido 2">

                                @if ($errors->has('surname2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="datebirthday" class="col-md-4 control-label">Fecha de nacimiento</label>

                            <div class="col-md-6">
                                <input id="datebirthday" type="date" class="form-control" name="datebirthday" value="{{ $data['profile']['datebirthday'] }}" required>

                                @if ($errors->has('datebirthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datebirthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">Ciudad residencia</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ $data['profile']['city'] }}" placeholder="Introducce tu ciudad">

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar datos
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection