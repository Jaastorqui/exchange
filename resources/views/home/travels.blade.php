@extends('home.nav')

@section('contentHome')


    <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Mis viajes</div>

                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Dia</th>
                                <th>Ciudad origen</th>
                                <th>Ciudad destino</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data['travels'] as $travel)
                            <tr>
                                <td>{{ $travel->day }}</td>
                                <td>{{ $travel->cityDeparture }}</td>
                                <td>{{ $travel->cityArrived }}</td>
                                <td>{{ $travel->price }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection