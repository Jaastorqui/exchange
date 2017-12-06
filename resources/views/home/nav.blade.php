@extends('layouts.app')

@section('content')

<script src="{{ asset('js/file.js') }}"></script>



<div class="container-fluid menu-nav">
    <div class="row">

        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home.dashboard') }}" >Dashboard </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home.travels') }}">Mis viajes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home.car') }}">Mi coche</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home.account') }}" >Mi cuenta</a>
            </li>
          </ul>

        </nav>

    @yield('contentHome')
</div>
@endsection


