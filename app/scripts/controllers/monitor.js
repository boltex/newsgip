/* //global $:false */
'use strict';

function formatAMPM() {
	var d = new Date(),
	    minutes = d.getMinutes().toString().length === 1 ? '0'+d.getMinutes() : d.getMinutes(),
	    hours = d.getHours().toString().length === 1 ? '0'+d.getHours() : d.getHours(),
	    ampm = d.getHours() >= 12 ? 'pm' : 'am',
	    months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
	    days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
	return days[d.getDay()]+' '+months[d.getMonth()]+' '+d.getDate()+' '+d.getFullYear()+' '+hours+':'+minutes+ampm;
}

angular.module('newsgipApp')
    .controller('monitorCtrl', ['$scope', '$http', '$location',  function ($scope, $http, $location ) {

        //$scope.objectValue = sharedProperties.getProperty();

        $http.jsonp('http://filltext.com/?rows=30&fname={firstName}&lname={lastName}&city={city}&callback=JSON_CALLBACK')
        .success(function(data){
            $scope.users=data;
          });

        $scope.sites = ['site1', 'site2', 'site3' , 'site4'];

        //$scope.loggedAsUser = $scope.objectValue.loggedAsUser;
        $scope.datetime =formatAMPM();
        setInterval( function(){$scope.datetime =formatAMPM(); } , 60000);

      }]);
