/*global $:false */
'use strict';

function formatAMPM() {
	var d = new Date(),
	    minutes = d.getMinutes().toString().length === 1 ? '0'+d.getMinutes() : d.getMinutes(),
	    hours = d.getHours().toString().length === 1 ? '0'+d.getHours() : d.getHours(),
	    //ampm = d.getHours() >= 12 ? 'pm' : 'am',
	    months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
	    days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
	return days[d.getDay()]+' '+months[d.getMonth()]+' '+d.getDate()+' '+d.getFullYear()+' '+hours+':'+minutes;
}

function columnConform(){
  var newheight=$('#birdseye-img').height();
  $('#procedure-well').height(newheight-18);

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
        var datasend = {} ;
        datasend.action= 'premonitor';
        $http({
            method: 'POST',
            url: 'api/resource.php',
            data: $.param( datasend ),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
          })
        .success(function(data){
            if (!data.success) {
              // Responded ERROR
              if (data.errors.message==='Not logged.'){
                $location.path('/login');
              }
              $scope.message = data.errors;
            } else {
              // SUCCESS !!
              $scope.sites=data.sites;
              $scope.loggedAsUser = data.user.username;
              $scope.isadmin = data.isadmin;
              $scope.rowsperpage = data.rowsperpage;

              if (typeof data.tablepast === 'undefined') {
              // variable is undefined NO DATA
              }else{
                // fill in array
                $scope.sitedata=data.sitedata;
                $scope.tablepast=data.tablepast;
                $scope.currentsite=$scope.sitedata.SiteName;
                $scope.tablepastpage = data.tablepastpage;
                $scope.tablelastpage = data.tablelastpage;
                $('#birdseye-img').load( columnConform );
                //columnConform();
              }
              //console.log(data);
            }

            
          });
       
        $scope.clicksite = function(param){
            $scope.currentsite = param.SiteName;
            param.action =  'selectsite';
            $http({
                method: 'POST',
                url: 'api/resource.php',
                data: $.param(param),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
              })
            .success(function(data){
                //console.log(data);
                if (!data.success) {
                  // Responded ERROR
                  $scope.message = data.errors;
                
                } else {
                  // SUCCESS !!
                  $scope.sitedata=data.sitedata;
                  $scope.tablepast=data.tablepast;
                  $scope.tablepastpage = data.tablepastpage;
                  $scope.tablelastpage = data.tablelastpage;
                  //$scope.loggedAsUser = data.user;
                  //console.log(data);
                  //if (data.isadmin===1) { $scope.isAdmin=1; }
                  $('#birdseye-img').load( columnConform );
                  
                }
              });


          };

        $scope.changerowsperpage = function(param){
          if(param === Number($scope.rowsperpage)){
            return;
          }
          var datasend = {} ;
          datasend.action= 'rowsperpage';
          datasend.rowsperpage = param;
          $http({
              method: 'POST',
              url: 'api/resource.php',
              data: $.param(datasend),
              headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
          .success(function(data){
              //console.log(data);
              if (!data.success) {
                // Responded ERROR
                $scope.message = data.errors;
              
              } else {
                // SUCCESS !!
                $scope.rowsperpage=data.rowsperpage;
                $scope.sitedata=data.sitedata;
                $scope.tablepast=data.tablepast;
                $scope.tablepastpage = data.tablepastpage;
                $scope.tablelastpage = data.tablelastpage;
              }
            }).error(function(data){
              console.log('Error man... :'+data);
            });
        };

        $scope.showpage = function(param){
          var datasend = {} ;
          datasend.action= 'changepage';
          datasend.page = param;
          if(param==='goto'){datasend.thegoto=$scope.thegoto; }
          console.log(datasend);
          $http({
            method: 'POST',
            url: 'api/resource.php',
            data: $.param( datasend ),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
          })
          .success(function(data){
            $scope.sitedata=data.sitedata;
            $scope.tablepast=data.tablepast;
            $scope.tablepastpage = data.tablepastpage;
            $scope.tablelastpage = data.tablelastpage;
          })
          .error(function(data){
            console.log('Error man... :'+data);
          });
        };

        $scope.rowsperpagelist = [5,10,25,50] ;

        $scope.datetime =formatAMPM();
        setInterval( function(){ $scope.datetime = formatAMPM(); $scope.$apply(); } , 60000);

        $(window).resize(function() {
          columnConform();
        });



      }]);
