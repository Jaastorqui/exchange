

@extends('layouts.app')


@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
 <script src="{{ asset('js/appAngular.js') }}"></script>
            <div class="row">
                <div class="col-sm-12">
                    <div class="resumen hidden-sm hidden-xs" >
		            <div class="res">
			            <div class="top">
				            <span>Dia</span>
			            </div>
			            <div class="bottom">
				            {{ $data->day }}
			            </div>
		            </div>
		            <div class="res">
			            <div class="top">
				            <span>Ciudad salida</span>
			            </div>
			            <div class="bottom">
				            {{ $data->cityDeparture }}
			            </div>
		            </div>
		            <div class="res">
			            <div class="top">
                            <span>Ciudad llegada</span>
			            </div>
			            <div class="bottom">
				            {{ $data->cityArrived }}
			            </div>
		            </div>
	            </div>
                </div>
            </div>
            <div ng-app="app" ng-controller="search" class="container-fluid">
                <div class="row">

                    <!-- Filters -->

                    <section class="col-lg-3 container">
                    <div class="container">

                        <!-- price -->
                        <div class="form-control">
                            
                            <label class="label" for="range">De 0 a : <% filters.price %>€</label>
                            <input type="range" name="range" id="range" ng-model="filters.price" min="0"  max="100" ng-value="30" >
                            
                        </div>


                        <!-- squares -->
                        <div class="form-control">
                            
                            <label class="label" for="squares">Asientos</label>
                            <input type="number" name="squares" id="squares" ng-model="filters.squares" min="1"  max="4" ng-value="1" >
                            
                        </div>

                        <!-- time departure -->
                        <!--
                        <div class="form-control">
                            
                            <label class="label" for="filterDeparture">Hora salida: <% filters.departure %>H </label>
                            <input type="range" name="filterDeparture" id="filterDeparture" ng-model="filters.departure" min="0"  max="24" ng-value="1" >
                            
                        </div>
                        -->
                    </div>
                          
                    </section>

                    <!-- Dispo -->
                    <section class="container searchContainer col-lg-9">
                    <div data-ng-repeat="x in results | machFilter:filters" >
                    

                        <article class="row">

                            <!-- User -->
                            <div class="col-xs-12 col-md-4 col-md-push-9">
                                <img ng-src="x.foto" class="pull-left height100" ng-if="x.foto"></img>
                                <span ng-if="!x.foto" class="pull-left height100"><i class="fa fa-user fa-5x" aria-hidden="true"></i></span>
                                <p class="lead" class="pull-right"><% x.name %></p>
                            </div>

                            <!-- Resume -->
                            <div class="col-xs-12 col-md-4 col-md-push-9">
                                <p class="lead"><strong><% x.day %></strong> </p>
                                <p><% x.cityDeparture %> <i class="fa fa-long-arrow-right" aria-hidden="true"></i>  <% x.cityArrived %> </p>

                            </div>

                            <div class="col-xs-12 col-md-4 col-md-push-9 text-left">
                                <a href="#" class="btn btn-lg btn-success" > <% x.price | currency:'€' %>  </a>
                                <p  >Plazas disponibles: <strong><% x.squares %></strong> </p>
                            </div>

                        </article>
                    </div>
                    </section>

                </div>
                


            </div>
        </div>
    </body>
</html>

@endsection