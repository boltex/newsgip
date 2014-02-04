/*global $:false */
'use strict';

angular.module('newsgipApp')
    .controller('usernameCtrl', ['$scope', '$http', '$location', 'sharedProperties', function ($scope, $http, $location, sharedProperties) {

        // create a blank object to hold our form information
	    // $scope will allow this to pass between controller and view
        $scope.formData = {};

        $scope.objectValue = sharedProperties.getProperty();

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
                  $scope.objectValue.datapasskey = data.passkey;
                  $location.path('/password');
                }

              }).
            error(function (data) {
                //console.log('wtf error');
                $scope.error = data.errors || 'Server is unreachable';
              });
          };


      }]);


