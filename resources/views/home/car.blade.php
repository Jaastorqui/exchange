@extends('home.nav')

@section('contentHome')


    <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Mi Coche</div>

                <div class="panel-body">

                <form class="form-horizontal" role="form" method="POST" action="{{ route('home.carUpdate') }}" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                        
                    <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                        <label for="brand" class="col-md-4 control-label">Marca</label>

                        <div class="col-md-6">
                            <input id="brand" type="text" class="form-control" name="brand" value="{{ $data['brand'] }}" required>
                        </div>
                        @if ($errors->has('brand'))
                            <span class="help-block">
                                <strong>{{ $errors->first('brand') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                        <label for="model" class="col-md-4 control-label">Modelo</label>

                        <div class="col-md-6">
                            <input id="model" type="text" class="form-control" name="model" value="{{ $data['model'] }}" required>
                        </div>
                        @if ($errors->has('model'))
                            <span class="help-block">
                                <strong>{{ $errors->first('model') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('seats') ? ' has-error' : '' }}">
                        <label for="seats" class="col-md-4 control-label">Asientos</label>

                        <div class="col-md-6">
                            <input id="seats" type="number" min="0" max="4" class="form-control" name="seats" value="{{ $data['seats'] }}" required>
                        </div>
                        @if ($errors->has('seats'))
                            <span class="help-block">
                                <strong>{{ $errors->first('seats') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                        <label for="photo" class="col-md-4 control-label">Foto</label>

                        <div class="col-md-6">
                            <input id="photo" type="file" accept="image/*" class="form-control" name="photo" value="{{ public_path('Cars/') . $data['photo'] }}" capture="camera">
                        
                            @if ($errors->has('photo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                            @endif

                            @if ($data['photo'])
                                <div class="imgCar">
                                    <img class="imgCar" src="{{ asset('Cars/' . $data['photo']) }}" alt="photo">
                                </div>
                            @endif

                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active imageProgress" id="imageProgress" role="progressbar" style="width:0%">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <div class="col-md-6">
                            <input type="submit" class="form-control btn btn-primary" value="Actualizar datos">
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>

@endsection