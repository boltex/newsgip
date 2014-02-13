/*global $:false */
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
        /*
        $http.jsonp('http://filltext.com/?rows=30&fname={firstName}&lname={lastName}&city={city}&callback=JSON_CALLBACK')
        .success(function(data){
            $scope.users=data;
          });
        */
        $http({
            method: 'POST',
            url: 'api/premonitor.php',
            data: {},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
          })
        .success(function(data){
            if (!data.success) {
              // Responded ERROR
              $scope.message = data.errors;
              
            } else {
              // SUCCESS !!
              $scope.sites=data.sites;
            }

            
          });
       
        $scope.clicksite = function(param){
            $scope.currentsite = param.SiteName;
            $http({
                method: 'POST',
                url: 'api/monitor.php',
                data: $.param(param),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
              })
            .success(function(data){
                console.log(data);
                if (!data.success) {
                  // Responded ERROR
                  $scope.message = data.errors;
                
                } else {
                  // SUCCESS !!
                  $scope.sitedata=data.sitedata;
                  $scope.tablepast=data.tablepast;
                }
              });

/*  DOCUMENTATION FROM PHP
$tablepastquery="
SELECT `EventIndex` , `EventStart` , `EventEntered`, `EventLicense` , `Desc` , `Action` , `CameraName`
FROM `EventTable` , `DescTable` , `ActionTable` , `CameraTable`
WHERE `EventTable`.`EventDescription` = `DescTable`.`DescIndex`
AND `EventTable`.`EventAction` = `ActionTable`.`ActionIndex`
AND `EventTable`.`EventCamera` = `CameraTable`.`CameraIndex`
AND `EventSite` = '$currentsite' ORDER BY `EventStart` DESC 
LIMIT $startingpage , $GLOBALS[rowsperpage]
"; 
 */




          };
        //$scope.sites = ['site1', 'site2', 'site3' , 'site4'];

        //$scope.loggedAsUser = $scope.objectValue.loggedAsUser;
        $scope.datetime =formatAMPM();
        setInterval( function(){$scope.datetime =formatAMPM(); } , 60000);

      }]);
