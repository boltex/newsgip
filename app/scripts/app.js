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
  }])
  .service('sharedProperties', function () {
    var property = { data: 'temp' };
    return {
        getProperty: function () {
            return property;
          },
        setProperty: function(value) {
            property = value;
          }
      };
  });

