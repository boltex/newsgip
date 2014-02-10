/*global $:false */
'use strict';

angular.module('newsgipApp')
    .controller('logoutCtrl', ['$scope', '$http', '$location', function ($scope, $http, $location) {

        $http({
            method: 'POST',
            url: './api/logout.php',
            data: $.param(''),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
          }).
        success(function (data) {
            if (!data.success) {
              $scope.errorPassword = data.errors.username;
              //$location.path('/');
            } else {
              //console.log(data);
              $scope.message = data.message;
              $location.path('/');
            }

          }).
        error(function (data) {
            $scope.error = data.description || 'Server is unreachable';
          });
      
      }]);
