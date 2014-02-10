'use strict';

angular.module('newsgipApp', [
  'ngCookies',
  'ngResource',
  'ngSanitize',
  'ngRoute'
])
  .config(['$routeProvider', function ($routeProvider) {
    $routeProvider
      .when('/', {
        redirectTo: '/login'
      })
      .when('/login', {
        templateUrl: 'views/username.html',
        controller: 'usernameCtrl'
      })
      .when('/password', {
        templateUrl: 'views/password.html',
        controller: 'passwordCtrl'
      })
      .when('/monitor', {
        templateUrl: 'views/monitor.html',
        controller: 'monitorCtrl'
      })
      .when('/manage', {
        templateUrl: 'views/manage.html',
        controller: 'manageCtrl'
      })
      .when('/logout', {
        templateUrl: 'views/logout.html',
        controller: 'logoutCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
  }]).controller('mainCtrl', ['$scope', '$location', function ($scope, $location) {

        $scope.isActive = function(path) {
            if ($location.path().substr(0, path.length) === path) {
              return true;
            } else {
              return false;
            }
          };


      }]);

