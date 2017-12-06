var app = angular.module("app", [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
var numFilters = 0;

app.filter('machFilter', function () {


      return function(items, filters) { 

        items = items.filter(function(item){
            var filtered = false;

            if (item.price < filters.price || item.squares < filters.squares || item.departure > filters.departure)
                return false;
            return true;
            // return item.price >= filters.price ;
        });

        numFilters = items.length;
        return items;
    };


});



app.controller("search", function($scope, $http, $timeout) {
    $scope.showLoading = true;

    $scope.results = false;
    $scope.filters = {};
    $scope.filters.price = 20;
    $scope.filters.squares = 1;
    $scope.filters.departure = 0;
    
    $scope.results = [];
    angular.element(document).ready(function () {
        $scope.findResults();
    });


    $scope.findResults = function () {
    

        $http.get("/getTravels")
        .then(function(response) {
            $scope.results = response.data;
            numFilters = response.data.length;
        });

    }

});

/*
app.filter('machFilter', function($filter) {
    return function( items, scope) {
      
      var filtered = [];
      angular.forEach(items, function(item) {
        if( param >= item.minAccess ) {
          filtered.push(item);
        }
      });
      if (filtered.length == 0)
        return scope.results;
    
      return filtered;
    };
});


*/