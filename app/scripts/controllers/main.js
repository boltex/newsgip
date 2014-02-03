/* //global $:false */
'use strict';

angular.module('newsgipApp')
    .controller('mainCtrl', ['$scope', '$location', function ($scope, $location) {

        $scope.isActive = function(path) {
            if ($location.path().substr(0, path.length) === path) {
              return true;
            } else {
              return false;
            }
          };


      }]);
    
    
