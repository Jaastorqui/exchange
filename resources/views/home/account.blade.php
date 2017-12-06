@extends('home.nav')

@section('contentHome')


    <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Mi cuenta</div>

                <div class="panel-body">

                        
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $data['name'] }}" disabled>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $data['email'] }}" disabled>
                        </div>
                    </div>

                    <div class="container">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('home.accountDelete') }}" >
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">BORRAR CUENTA</label>

                                <div class="col-md-6">
                                    <input type="submit" class="form-control btn btn-danger" value="Si, borrar">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

@endsection