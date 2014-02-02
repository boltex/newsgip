/*global $:false */
'use strict';

angular.module('newsgipApp')
    .controller('passwordCtrl', ['$scope', '$http', '$location', 'sharedProperties', function ($scope, $http, $location, sharedProperties) {

        // create a blank object to hold our form information
	    // $scope will allow this to pass between controller and view
        $scope.sendPass = {};

        $scope.objectValue = sharedProperties.getProperty();


        $scope.processPassword = function() {
            
            //------------------------------------------MAKE PASSWORD HASH
            var wholething = $scope.formData.password ;

            var thekey =     $scope.objectValue.datapasskey;

            var currentTime = new Date();
            var jskey = currentTime.getTime();
            wholething += thekey;
            var tempkey = $.md5(wholething );
   
            $scope.sendPass.jskey = jskey.toString() ;
            $scope.sendPass.password = $.md5( tempkey+jskey.toString() );
            //------------------------------------------------------------

            $scope.errorPassword = null;

            $http({
                method: 'POST',
                url: '/api/password.php',
                data: $.param($scope.sendPass),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
              }).
            success(function (data) {
                if (!data.success) {
                  $scope.errorPassword = data.errors.username;
                  $location.path('/');
                } else {
                  //console.log(data);
                  $scope.message = data.message;
                  $location.path('/monitor');
                }

              }).
            error(function (data) {
                $scope.error = data.description || 'Server is unreachable';
              });
          };


      }]);



