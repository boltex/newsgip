/*global $:false */
'use strict';

angular.module('newsgipApp')
    .controller('manageCtrl', ['$scope', '$http', '$location', 'sharedProperties', function ($scope, $http, $location, sharedProperties) {

        $scope.objectValue = sharedProperties.getProperty();

      }]);
