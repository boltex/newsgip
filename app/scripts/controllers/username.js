/*global $:false */
'use strict';

angular.module('newsgipApp')
    .controller('usernameCtrl', ['$scope', '$http', '$location', function ($scope, $http, $location) {

        // create a blank object to hold our form information
	    // $scope will allow this to pass between controller and view
        $scope.formData = {};


        $scope.processLogin = function() {
            $scope.errorName = null;
            $http({
                method: 'POST',
                url: 'api/username.php',
                data: $.param($scope.formData),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
              }).
            success(function (data) {
                if (!data.success) {
                  // Responded DOES NOT EXIST
                  $scope.errorName = data.errors.username;
                } else {
                  // SUCCESS !!
                  $scope.message = data.message;
                  
                  $location.path('/password');
                }

              }).
            error(function (data) {
                //console.log('wtf error');
                $scope.error = data.errors || 'Server is unreachable';
              });
          };


      }]);


