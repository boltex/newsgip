/*global $:false */
'use strict';

angular.module('newsgipApp')
    .controller('loginCtrl', ['$scope', '$http', '$location', function ($scope, $http, $location) {

        // create a blank object to hold our form information
        // $scope will allow this to pass between controller and view
        $scope.formData = {};
        $scope.sendPass = {};
        $scope.submittinglogin = null;

        $scope.enterusername = function() {
          $('#inputPassword').focus().select();
        };

        $scope.processLogin = function() {
            $scope.submittinglogin = true;
            $('#inputUsername').prop('disabled', true);
            $('#inputPassword').prop('disabled', true);
            $scope.errorName = null;
            $scope.formData.action = 'username' ;
            $http({
                method: 'POST',
                url: 'api/login.php',
                data: $.param($scope.formData),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
              }).
            success(function (data) {
                if (!data.success) {
                  // Responded USER DOES NOT EXIST
                  $scope.errorName = data.errors.message;
                  $scope.message = data.message;
                  $('#inputUsername').focus().select();
                  $scope.submittinglogin = null;
                  $('#inputUsername').prop('disabled', false);
                  $('#inputPassword').prop('disabled', false);
                } else {
                  // SUCCESS !!
                  $scope.message = data.message;
                  $scope.sendPass.action = 'password' ;
                  //------------------------------------------MAKE PASSWORD HASH
                  var wholething = $scope.passData.password ;

                  var thekey =     data.passkey; // from PREPASSWORD.PHP

                  var currentTime = new Date();
                  var jskey = currentTime.getTime();
                  wholething += thekey;
                  var tempkey = $.md5(wholething );
         
                  $scope.sendPass.jskey = jskey.toString() ;
                  $scope.sendPass.password = $.md5( tempkey+jskey.toString() );
                  //------------------------------------------------------------
                  $http({
                    method: 'POST',
                    url: 'api/login.php',
                    data: $.param($scope.sendPass),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                  }).
                success(function (data) {
                    if (!data.success) {
                      // WRONG PASSWORD 
                      $scope.errorPassword = data.errors.message;
                      $('#inputPassword').focus().select();
                      $scope.submittinglogin = null;
                      $('#inputUsername').prop('disabled', false);
                      $('#inputPassword').prop('disabled', false);
                    } else {
                      //console.log(data);
                      $scope.message = data.message;
                      $location.path('/monitor');
                    }

                  }).
                error(function (data) {
                    $scope.message = data.description || 'Server is unreachable';
                  });

                }

              }).
            error(function (data) {
                //console.log('wtf error');
                $scope.message = data.errors || 'Server is unreachable';
              });
          };


      }]);


