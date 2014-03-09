'use strict';

angular.module('newsgipApp', [
  'ngCookies',
  'ngResource',
  'ngSanitize',
  'ngRoute',
  'ui.keypress'
])
  .config(['$routeProvider', function ($routeProvider) {
    $routeProvider
      .when('/', {
        redirectTo: '/login'
      })
      .when('/login', {
        templateUrl: 'views/login.html',
        controller: 'loginCtrl'
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
  }]);
  
