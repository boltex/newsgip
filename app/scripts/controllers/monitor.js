/*global $:false */
'use strict';

angular.module('newsgipApp')
    .controller('monitorCtrl', ['$scope', '$http', '$location', 'sharedProperties', function ($scope, $http, $location, sharedProperties) {

        $scope.objectValue = sharedProperties.getProperty();

      }]);
