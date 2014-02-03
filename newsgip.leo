<?xml version="1.0" encoding="utf-8"?>
<!-- Created by Leo (http://leoeditor.com/leo_toc.html) -->
<?xml-stylesheet ekr_test?>
<leo_file xmlns:leo="http://www.leo-editor.org/2011/leo" >
<leo_header file_format="2" tnodes="0" max_tnode_index="0" clone_windows="0"/>
<globals body_outline_ratio="0.5" body_secondary_ratio="0.5">
	<global_window_position top="50" left="50" height="500" width="700"/>
	<global_log_window_position top="0" left="0" height="0" width="0"/>
</globals>
<preferences/>
<find_panel_settings/>
<vnodes>
<v t="fil.20140130164225" a="E"><vh>AngularJS Reporting Software</vh>
<v t="fil.20140130164910"><vh>Documentation</vh>
<v t="fil.20140130185341"><vh>Tests and Backups</vh>
<v t="fil.20140130164951"><vh>@nosent app/test.php</vh></v>
<v t="fil.20140130182105"><vh>@nosent app/index.bak.html</vh>
<v t="fil.20140130182315.1"><vh>Head</vh></v>
<v t="fil.20140130182315.2"><vh>Body</vh></v>
</v>
<v t="fil.20140130182742"><vh>@nosent app/views/main.html</vh></v>
</v>
</v>
<v t="fil.20140201161000.1996"><vh>Snippets</vh></v>
<v t="fil.20140130191413" a="E"><vh>@nosent app/index.html</vh>
<v t="fil.20140130191413.1"><vh>Head</vh></v>
<v t="fil.20140130191413.2"><vh>Body</vh></v>
</v>
<v t="fil.20140201161000.1992" a="E"><vh>templates</vh>
<v t="fil.20140201161000.1993"><vh>@nosent app/templates/nav.html</vh></v>
<v t="fil.20140201161000.1995"><vh>@nosent app/templates/footer.html</vh></v>
</v>
<v t="fil.20140131183952.1676" a="E"><vh>views</vh>
<v t="fil.20140130234745"><vh>@nosent app/views/username.html</vh></v>
<v t="fil.20140130233414"><vh>@nosent app/views/password.html</vh></v>
<v t="fil.20140201161000.1979"><vh>@nosent app/views/monitor.html</vh></v>
<v t="fil.20140201161000.1976"><vh>@nosent app/views/manage.html</vh></v>
<v t="fil.20140201161000.1982"><vh>@nosent app/views/logout.html</vh></v>
</v>
<v t="fil.20140131014254"><vh>@nosent app/scripts/app.js</vh></v>
<v t="fil.20140131183952.1677" a="E"><vh>Controlers</vh>
<v t="fil.20140201161000.1991"><vh>@nosent app/scripts/controllers/main.js</vh></v>
<v t="fil.20140130234827"><vh>@nosent app/scripts/controllers/username.js</vh></v>
<v t="fil.20140130234827.1"><vh>@nosent app/scripts/controllers/password.js</vh></v>
<v t="fil.20140201161000.1980"><vh>@nosent app/scripts/controllers/monitor.js</vh></v>
<v t="fil.20140201161000.1986"><vh>@nosent app/scripts/controllers/manage.js</vh></v>
<v t="fil.20140201161000.1984"><vh>@nosent app/scripts/controllers/logout.js</vh></v>
</v>
<v t="fil.20140131183952.1678"><vh>PHP Backend</vh>
<v t="fil.20140130234753"><vh>@nosent app/api/username.php</vh></v>
<v t="fil.20140130234759"><vh>@nosent app/api/password.php</vh></v>
<v t="fil.20140201161000.1977"><vh>@nosent app/api/monitor.php</vh></v>
<v t="fil.20140201161000.1990"><vh>@nosent app/api/manage.php</vh></v>
<v t="fil.20140201161000.1988" a="O"><vh>@nosent app/api/logout.php</vh></v>
</v>
<v t="fil.20140131183952.1675"><vh>@nosent app/styles/main.scss</vh></v>
</v>
</vnodes>
<tnodes>
<t tx="fil.20140130164225"></t>
<t tx="fil.20140130164910">Using Angular-php

test</t>
<t tx="fil.20140130164951">@language php
&lt;?php
phpinfo();
?&gt;
</t>
<t tx="fil.20140130182105">@language html
&lt;!doctype html&gt;
&lt;!--[if lt IE 7]&gt;      &lt;html class="no-js lt-ie9 lt-ie8 lt-ie7"&gt; &lt;![endif]--&gt;
&lt;!--[if IE 7]&gt;         &lt;html class="no-js lt-ie9 lt-ie8"&gt; &lt;![endif]--&gt;
&lt;!--[if IE 8]&gt;         &lt;html class="no-js lt-ie9"&gt; &lt;![endif]--&gt;
&lt;!--[if gt IE 8]&gt;&lt;!--&gt; &lt;html class="no-js"&gt; &lt;!--&lt;![endif]--&gt;
@others

  
  
&lt;/html&gt;
</t>
<t tx="fil.20140130182315.1">&lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;meta http-equiv="X-UA-Compatible" content="IE=edge"&gt;
    &lt;title&gt;&lt;/title&gt;
    &lt;meta name="description" content=""&gt;
    &lt;meta name="viewport" content="width=device-width"&gt;
    &lt;!-- Place favicon.ico and apple-touch-icon.png in the root directory --&gt;

        &lt;!-- build:css({.tmp,app}) styles/main.css --&gt;
        &lt;link rel="stylesheet" href="styles/main.css"&gt;
        &lt;!-- endbuild --&gt;
&lt;/head&gt;
</t>
<t tx="fil.20140130182315.2">&lt;body ng-app="newsgipApp"&gt;
    &lt;!--[if lt IE 7]&gt;
      &lt;p class="browsehappy"&gt;You are using an &lt;strong&gt;outdated&lt;/strong&gt; browser. Please &lt;a href="http://browsehappy.com/"&gt;upgrade your browser&lt;/a&gt; to improve your experience.&lt;/p&gt;
    &lt;![endif]--&gt;

    &lt;!--[if lt IE 9]&gt;
      &lt;script src="bower_components/es5-shim/es5-shim.js"&gt;&lt;/script&gt;
      &lt;script src="bower_components/json3/lib/json3.min.js"&gt;&lt;/script&gt;
    &lt;![endif]--&gt;

    &lt;!-- Add your site or application content here --&gt;
    &lt;div class="container" ng-view=""&gt;&lt;/div&gt;

    &lt;!-- Google Analytics: change UA-XXXXX-X to be your site's ID --&gt;
     &lt;script&gt;
       (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
       (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
       m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
       })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

       ga('create', 'UA-XXXXX-X');
       ga('send', 'pageview');
    &lt;/script&gt;

    &lt;script src="bower_components/jquery/jquery.js"&gt;&lt;/script&gt;
    &lt;script src="bower_components/angular/angular.js"&gt;&lt;/script&gt;

        &lt;!-- build:js scripts/plugins.js --&gt;
        &lt;script src="bower_components/sass-bootstrap/js/affix.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/alert.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/button.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/carousel.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/transition.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/collapse.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/dropdown.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/modal.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/scrollspy.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/tab.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/tooltip.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/popover.js"&gt;&lt;/script&gt;
        &lt;!-- endbuild --&gt;

        &lt;!-- build:js scripts/modules.js --&gt;
        &lt;script src="bower_components/angular-resource/angular-resource.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/angular-cookies/angular-cookies.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/angular-sanitize/angular-sanitize.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/angular-route/angular-route.js"&gt;&lt;/script&gt;
        &lt;!-- endbuild --&gt;

        &lt;!-- build:js({.tmp,app}) scripts/scripts.js --&gt;
        &lt;script src="scripts/app.js"&gt;&lt;/script&gt;
        &lt;script src="scripts/controllers/main.js"&gt;&lt;/script&gt;
        &lt;!-- endbuild --&gt;
&lt;/body&gt;</t>
<t tx="fil.20140130182742">@language html
&lt;div class="header"&gt;
  &lt;ul class="nav nav-pills pull-right"&gt;
    &lt;li class="active"&gt;&lt;a ng-href="#"&gt;Home&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a ng-href="#"&gt;About&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a ng-href="#"&gt;Contact&lt;/a&gt;&lt;/li&gt;
  &lt;/ul&gt;
  &lt;h3 class="text-muted"&gt;newsgip&lt;/h3&gt;
&lt;/div&gt;

&lt;div class="jumbotron"&gt;
  &lt;h1&gt;'Allo, 'ttest!&lt;/h1&gt;
  &lt;p class="lead"&gt;
    &lt;img src="images/sgiplogo.png" alt="I'm Yeoman"&gt;&lt;br&gt;
    Always a pleasure scaffolding your apps.
  &lt;/p&gt;
  &lt;p&gt;&lt;a class="btn btn-lg btn-success" ng-href="#"&gt;Splendid!&lt;/a&gt;&lt;/p&gt;
&lt;/div&gt;

&lt;div class="row marketing"&gt;
  &lt;p ng-if="loading"&gt;Loading...&lt;/p&gt;
  &lt;div ng-repeat="thing in awesomeThings"&gt;
    &lt;h4&gt;{{thing.name}}&lt;/h4&gt;
    &lt;p ng-if="thing.description"&gt;{{thing.description}}&lt;/p&gt;
    &lt;p ng-if="thing.loading"&gt;Loading...&lt;/p&gt;
    &lt;p ng-if="thing.error" class="alert alert-danger" ng-if="error"&gt;{{thing.error}}&lt;/p&gt;
  &lt;/div&gt;
  &lt;p class="alert alert-danger" ng-if="error"&gt;{{error}}&lt;/p&gt;
&lt;/div&gt;

&lt;div class="footer"&gt;
  &lt;p&gt;© SGIP 2014&lt;/p&gt;
&lt;/div&gt;
</t>
<t tx="fil.20140130185341"></t>
<t tx="fil.20140130191413">@language html
&lt;!doctype html&gt;
&lt;!--[if lt IE 7]&gt;      &lt;html class="no-js lt-ie9 lt-ie8 lt-ie7"&gt; &lt;![endif]--&gt;
&lt;!--[if IE 7]&gt;         &lt;html class="no-js lt-ie9 lt-ie8"&gt; &lt;![endif]--&gt;
&lt;!--[if IE 8]&gt;         &lt;html class="no-js lt-ie9"&gt; &lt;![endif]--&gt;
&lt;!--[if gt IE 8]&gt;&lt;!--&gt; &lt;html class="no-js"&gt; &lt;!--&lt;![endif]--&gt;
@others
&lt;/html&gt;</t>
<t tx="fil.20140130191413.1">&lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;meta http-equiv="X-UA-Compatible" content="IE=edge"&gt;
    &lt;title&gt;&lt;/title&gt;
    &lt;meta name="description" content=""&gt;
    &lt;meta name="viewport" content="width=device-width"&gt;
    &lt;!-- Place favicon.ico and apple-touch-icon.png in the root directory --&gt;

        &lt;!-- build:css({.tmp,app}) styles/main.css --&gt;
        &lt;link rel="stylesheet" href="styles/main.css"&gt;
        &lt;!-- endbuild --&gt;
&lt;/head&gt;</t>
<t tx="fil.20140130191413.2">&lt;body ng-app="newsgipApp" &gt;
    &lt;!--[if lt IE 7]&gt;
      &lt;p class="browsehappy"&gt;You are using an &lt;strong&gt;outdated&lt;/strong&gt; browser. Please &lt;a href="http://browsehappy.com/"&gt;upgrade your browser&lt;/a&gt; to improve your experience.&lt;/p&gt;
    &lt;![endif]--&gt;

    &lt;!--[if lt IE 9]&gt;
      &lt;script src="bower_components/es5-shim/es5-shim.js"&gt;&lt;/script&gt;
      &lt;script src="bower_components/json3/lib/json3.min.js"&gt;&lt;/script&gt;
    &lt;![endif]--&gt;

    &lt;!-- Add your site or application content here --&gt;
    &lt;div id="wrap"  &gt;
    &lt;header ng-include="'templates/nav.html'" class="navbar navbar-default navbar-static-top" role="navigation"&gt;&lt;/header&gt;
    &lt;div class="container" ng-view=""&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;footer class="footer" ng-include="'templates/footer.html'"&gt;&lt;/footer&gt;

    &lt;!-- Google Analytics: change UA-XXXXX-X to be your site's ID --&gt;
     &lt;script&gt;
       (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
       (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
       m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
       })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

       ga('create', 'UA-XXXXX-X');
       ga('send', 'pageview');
    &lt;/script&gt;

    &lt;script src="bower_components/jquery/jquery.js"&gt;&lt;/script&gt;
    &lt;script src="scripts/vendor/jquery.md5.js"&gt;&lt;/script&gt;
    &lt;script src="bower_components/angular/angular.js"&gt;&lt;/script&gt;

        &lt;!-- build:js scripts/plugins.js --&gt;
        &lt;script src="bower_components/sass-bootstrap/js/affix.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/alert.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/button.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/carousel.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/transition.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/collapse.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/dropdown.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/modal.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/scrollspy.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/tab.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/tooltip.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/sass-bootstrap/js/popover.js"&gt;&lt;/script&gt;
        &lt;!-- endbuild --&gt;

        &lt;!-- build:js scripts/modules.js --&gt;
        &lt;script src="bower_components/angular-resource/angular-resource.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/angular-cookies/angular-cookies.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/angular-sanitize/angular-sanitize.js"&gt;&lt;/script&gt;
        &lt;script src="bower_components/angular-route/angular-route.js"&gt;&lt;/script&gt;
        &lt;!-- endbuild --&gt;

        &lt;!-- build:js({.tmp,app}) scripts/scripts.js --&gt;
        &lt;script src="scripts/app.js"&gt;&lt;/script&gt;
        &lt;script src="scripts/controllers/main.js"&gt;&lt;/script&gt;
        &lt;script src="scripts/controllers/username.js"&gt;&lt;/script&gt;
        &lt;script src="scripts/controllers/password.js"&gt;&lt;/script&gt;
        &lt;script src="scripts/controllers/monitor.js"&gt;&lt;/script&gt;
        &lt;script src="scripts/controllers/manage.js"&gt;&lt;/script&gt;
        &lt;script src="scripts/controllers/logout.js"&gt;&lt;/script&gt;
        &lt;!-- endbuild --&gt;
&lt;/body&gt;</t>
<t tx="fil.20140130233414">@language html
&lt;div class="jumbotron"&gt;
  &lt;h1&gt;SGIP &lt;span class="glyphicon glyphicon-eye-open"&gt;&lt;/span&gt;&lt;/h1&gt;
  &lt;p&gt;Reporting software for visual site monitoring&lt;/p&gt;
&lt;/div&gt;

&lt;!-- SHOW ERROR/SUCCESS MESSAGES --&gt;

&lt;form name="signupPassword" novalidate  role="form" ng-submit="processPassword()"&gt;

  &lt;div class="form-group" ng-class="{ 'has-error' : errorPassword }"&gt;
    &lt;label for="InputPassword"&gt;Password {{ message }}&lt;/label&gt;
    &lt;input type="password" required autofocus
        ng-minlength=5 
        ng-maxlength=20 
        class="form-control" 
        name="inputPassword" 
        placeholder="Password" 
        ng-model="formData.password" /&gt;
    

  &lt;/div&gt;
  
  &lt;button type="submit" ng-disabled="signupPassword.$invalid" class="btn btn-success btn-lg btn-block"&gt;
	&lt;span class="glyphicon glyphicon-flash"&gt;&lt;/span&gt; Log In
  &lt;/button&gt;

 &lt;div class="form-group" ng-class="{ 'has-error' : errorPassword }"&gt;
 &lt;span class="help-block" ng-show="errorPassword"&gt;{{ errorPassword }}&lt;/span&gt;

 &lt;span class="help-block span-inline" 
        ng-show="signupPassword.inputPassword.$dirty &amp;&amp; signupPassword.inputPassword.$invalid"&gt;
    &lt;span class="help-block span-inline" 
        ng-show="signupPassword.inputPassword.$error.required"&gt;
        User password is required.
    &lt;/span&gt;
    &lt;span class="help-block span-inline"
            ng-show="signupPassword.inputPassword.$error.minlength"&gt;
            Your password is required to be at least 3 characters
    &lt;/span&gt;
    &lt;span class="help-block span-inline"
            ng-show="signupPassword.inputPassword.$error.maxlength"&gt;
            Your password cannot be longer than 20 characters
    &lt;/span&gt;
&lt;/span&gt;
&lt;/div&gt;


&lt;/form&gt;

</t>
<t tx="fil.20140130234745">@language html
&lt;div class="jumbotron"&gt;
  &lt;h1&gt;SGIP &lt;span class="glyphicon glyphicon-eye-open"&gt;&lt;/span&gt;&lt;/h1&gt;
  &lt;p&gt;Reporting software for visual site monitoring&lt;/p&gt;
&lt;/div&gt;

&lt;form name="signupUsername" novalidate  role="form" ng-submit="signupUsername.$valid &amp;&amp; processLogin()"&gt;

  &lt;div class="form-group" ng-class="{ 'has-error' : errorName || (signupUsername.inputUsername.$invalid &amp;&amp; signupUsername.inputUsername.$dirty)}"&gt;
    &lt;label for="InputUser"&gt;User {{ message }}&lt;/label&gt;
    &lt;input type="text" required autofocus
        ng-minlength=5
        ng-maxlength=20  
        class="form-control" 
        name="inputUsername" 
        placeholder="username" 
        ng-model="formData.username" /&gt;
  &lt;/div&gt;
  
  &lt;button ng-disabled="signupUsername.$invalid" type="submit" class="btn btn-success btn-lg btn-block"&gt;
	&lt;span class="glyphicon glyphicon-flash"&gt;&lt;/span&gt; Enter User Name
  &lt;/button&gt;


&lt;div class="form-group" ng-class="{ 'has-error' : errorName || (signupUsername.inputUsername.$invalid &amp;&amp; signupUsername.inputUsername.$dirty)}"&gt;
 
 &lt;span class="help-block span-inline" ng-show="errorName"&gt;{{ errorName }}&lt;/span&gt;

 &lt;span class="help-block span-inline" 
        ng-show="signupUsername.inputUsername.$dirty &amp;&amp; signupUsername.inputUsername.$invalid"&gt;
    &lt;span class="help-block span-inline"
        ng-show="signupUsername.inputUsername.$error.required"&gt;
        User name is required.
    &lt;/span&gt;
    &lt;span class="help-block span-inline" 
            ng-show="signupUsername.inputUsername.$error.minlength"&gt;
            Your name is required to be at least 5 characters
    &lt;/span&gt;
    &lt;span class="help-block span-inline"
            ng-show="signupUsername.inputUsername.$error.maxlength"&gt;
            Your name cannot be longer than 20 characters
    &lt;/span&gt;
&lt;/span&gt;
&lt;/div&gt;
&lt;/form&gt;
</t>
<t tx="fil.20140130234753">@language php
&lt;?php
require('_includes/sgipdata.php');
//require("_includes/functions.php");
session_cache_expire(60);
session_start();
$lastsessionid = session_id();
session_regenerate_id();

$errors = array();  	// array to hold validation errors
$data 		= array(); 		// array to pass back data

if (empty($_POST['username'])){
    $errors['username'] = 'Name is required.';
}else{    
    $username = $_POST[username];
    // verify username
    // if ok get password key 
    
    try{
        $dblink = @mysql_connect("localhost", $db_user, $db_password ) ;
        if (!$dblink) {
            $_SESSION = array(); 
            session_destroy();
            $errors['mysql'] = 'No mysql_connect link established.';
        }
        mysql_select_db($db_database,$dblink); // same name : sgipuser
    } catch(Exception $e) {
        $_SESSION = array(); 
        session_destroy();
        $errors['mysql'] = 'Error mysql_select_db';
    }

    $opexists=mysql_query("SELECT OperatorIndex, OperatorPasswordKey FROM OperatorTable WHERE OperatorName='$username' and enabled='1'");

    if(mysql_num_rows($opexists)==0){  
        // does NOT EXISTS 
        $_SESSION = array(); 
        session_destroy();
        $errors['username'] = "$username is not recognised";
    }else{
        // EXISTS !!!
        $_SESSION["username"]=$_POST[username];
        $_SESSION["islogged"]="0";
        $tableau = mysql_fetch_array($opexists);
        $oppasskey = $tableau['OperatorPasswordKey'];
        $_SESSION["userindex"]= $tableau['OperatorIndex'];
    }
}

// return a response : if success give $oppasskey  ============================
	// response if there are errors
	if ( ! empty($errors)) {
        //$data['mainmessage'] = $_POST;
		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
		// if there are no errors, return a message
		$data['success'] = true;
		$data['message'] = 'exists';
          $data['passkey'] = $oppasskey;
        
	}
	// return all our data to an AJAX call
	echo json_encode($data);
?&gt;</t>
<t tx="fil.20140130234759">@language php
&lt;?php
require('_includes/sgipdata.php');
//require("_includes/functions.php");
session_cache_expire(60);
session_start();
$lastsessionid = session_id();
session_regenerate_id();

$errors = array();  	// array to hold validation errors
$data 		= array(); 		// array to pass back data

    if (empty($_POST['password']))
        $errors['password'] = 'password is required.';

    if (empty($_POST['jskey']) || !is_numeric($_POST['jskey']) )
	   $errors['jskey'] = 'jskey is required.';

    if (!isset($_SESSION['username']))
        $errors['username'] = 'Cookies must be enabled.';

// if no errors so far ... 
if ( empty($errors)) {
    // get password from db, also get OperatorLastSalt
    $username = $_SESSION["username"] ;
    $password = $_POST["password"] ;
    $jskey = $_POST["jskey"] ;

    try{
        $dblink = @mysql_connect("localhost", $db_user, $db_password ) ;
        if (!$dblink) {
            $_SESSION = array(); 
            session_destroy();
            $errors['mysql'] = 'Error mysql_connect';
        }else{
        mysql_select_db($db_database,$dblink); // same name : sgipuser
        }
    } catch(Exception $e) {
        $_SESSION = array(); 
        session_destroy();
        $errors['mysql'] = 'Error mysql_select_db';
    }
}

if ( empty($errors)) {
    $opexists=mysql_query("SELECT OperatorIndex, OperatorPassword, OperatorPasswordKey, OperatorLastSalt, OperatorIsAdmin FROM OperatorTable WHERE OperatorName='$username'");
    if(mysql_num_rows($opexists)==0){   
        $_SESSION = array(); 
        session_destroy();
        $errors['username'] = "$username is not recognised";
    }else{
        $tableau = mysql_fetch_array($opexists);
        $oppass = $tableau['OperatorPassword'];
        $oppasskey = $tableau['OperatorPasswordKey'];
        $oplastsalt = $tableau['OperatorLastSalt'];
        $opisadmin = $tableau['OperatorIsAdmin'];
        if( ((int)$jskey &lt; (int)$oplastsalt) || (int)$jskey==0 ){
            $_SESSION = array(); 
            session_destroy();
            $errors['username'] = "Please check your computer clock";
        }
    }
}
// do md5( password+jskey) 
$ourmd5 = md5( $oppass.$jskey  );
$ourmd5= substr($ourmd5, 0,20);
$password=substr($password, 0,20);
if($ourmd5 != $password){
        $_SESSION = array(); 
        session_destroy();
        $errors['username'] = "$ourmd5 $password Wrong password for $username";
}

if ( empty($errors)) {
        // if success save jskey as OperatorLastSalt , set sessions etc..
        $updatesuccess=mysql_query("UPDATE OperatorTable SET OperatorLastSalt='$jskey' WHERE OperatorName='$username'");
        $_SESSION["islogged"]="1";
        $_SESSION["isadmin"]=$opisadmin ;
        $_SESSION['tablepastpage']=1;
        $_SESSION['managingsite']=0;
}
	// response if there are errors
	if ( ! empty($errors)) {
        //$data['mainmessage'] = $_POST;
        // if there are items in our errors array, return those errors
        $errors['testmd5'] = md5('abc');
        $data['success'] = false;
        $data['errors']  = $errors;
	} else {
        // if there are no errors, return a message
        $data['success'] = true;
        $data['message'] = 'Logged In';
	}
	// return all our data to an AJAX call
	echo json_encode($data);
?&gt;</t>
<t tx="fil.20140130234827">@language javascript
/*global $:false */
'use strict';

angular.module('newsgipApp')
    .controller('usernameCtrl', ['$scope', '$http', '$location', 'sharedProperties', function ($scope, $http, $location, sharedProperties) {

        // create a blank object to hold our form information
	    // $scope will allow this to pass between controller and view
        $scope.formData = {};

        $scope.objectValue = sharedProperties.getProperty();

        $scope.processLogin = function() {
            $scope.errorName = null;
            $http({
                method: 'POST',
                url: '/api/username.php',
                data: $.param($scope.formData),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
              }).
            success(function (data) {
                if (!data.success) {
                  // Responded DOES NOT EXIST
                  $scope.errorName = data.errors.username;
                } else {
                  // SUCCESS !!
                  $scope.message = data.message;
                  $scope.objectValue.datapasskey = data.passkey;
                  $location.path('/password');
                }

              }).
            error(function (data) {
                //console.log('wtf error');
                $scope.error = data.errors || 'Server is unreachable';
              });
          };


      }]);


</t>
<t tx="fil.20140130234827.1">@language javascript
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



</t>
<t tx="fil.20140131014254">@language javascript
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

</t>
<t tx="fil.20140131183952.1675">@language css
$icon-font-path: "/bower_components/sass-bootstrap/fonts/";

@import 'sass-bootstrap/lib/bootstrap';

.browsehappy {
    margin: 0.2em 0;
    background: #ccc;
    color: #000;
    padding: 0.2em 0;
}

html,
body {
  height: 100%;
  /* The html and body elements cannot have any padding or margin. */
}

/* Wrapper for page content to push down footer */
#wrap {
  min-height: 100%;
  height: auto;
  /* Negative indent footer by its height */
  margin: 0 auto -60px;
  /* Pad bottom by footer height */
  padding: 0 0 60px;
}

/* Everything but the jumbotron gets side spacing for mobile first views */
.header,
.marketing,
.footer {
    padding-left: 15px;
    padding-right: 15px;
}

/* Custom page header */
.header {
    border-bottom: 1px solid #e5e5e5;
}

/* Make the masthead heading the same height as the navigation */
.header h3 {
    margin-top: 0;
    margin-bottom: 0;
    line-height: 40px;
    padding-bottom: 19px;
}

/* Custom page footer */
.footer {
    /*border-top: 1px solid #e5e5e5;*/
    height: 60px;
    background-color: #f5f5f5;
}


.container-narrow &gt; hr {
    margin: 30px 0;
}

/* Main marketing message and sign up button */
.jumbotron {
    text-align: center;
    border-bottom: 1px solid #e5e5e5;
}

.jumbotron .btn {
    font-size: 21px;
    padding: 14px 24px;
}

/* Supporting marketing content */
.marketing {
    margin: 40px 0;
}

.marketing p + h4 {
    margin-top: 28px;
}

.span-inline{
display:inline;
margin-right:40px;
}

.container .text-muted {
  margin: 20px 0;
}

.footer &gt; .container {
  padding-left: 15px;
  padding-right: 15px;
}
</t>
<t tx="fil.20140131183952.1676"></t>
<t tx="fil.20140131183952.1677"></t>
<t tx="fil.20140131183952.1678"></t>
<t tx="fil.20140201161000.1976">manage html file content</t>
<t tx="fil.20140201161000.1977">@language php
&lt;?php

// if no site return site list only




?&gt;</t>
<t tx="fil.20140201161000.1979">
&lt;ul class="nav nav-pills"&gt;

  &lt;li class="dropdown"&gt;
    &lt;a class="dropdown-toggle" data-toggle="dropdown" href="#"&gt;
      Choose Site: &lt;span class="caret"&gt;&lt;/span&gt;
    &lt;/a&gt;
    &lt;ul class="dropdown-menu"&gt;
        &lt;li ng-repeat="site in sites"&gt;&lt;a&gt;{{ site }}&lt;/a&gt;&lt;/li&gt;

    &lt;/ul&gt;
  &lt;/li&gt;

&lt;/ul&gt;</t>
<t tx="fil.20140201161000.1980">@language javascript
/* //global $:false */
'use strict';

angular.module('newsgipApp')
    .controller('monitorCtrl', ['$scope', '$http', '$location', 'sharedProperties', function ($scope, $http, $location, sharedProperties) {

        $scope.objectValue = sharedProperties.getProperty();

      }]);</t>
<t tx="fil.20140201161000.1982">

&lt;div class="jumbotron"&gt;
  &lt;h1&gt;SGIP&lt;/h1&gt;
  &lt;p class="lead"&gt;
   Logging out
  &lt;/p&gt;
&lt;/div&gt;</t>
<t tx="fil.20140201161000.1984">@language javascript
/*global $:false */
'use strict';

angular.module('newsgipApp')
    .controller('logoutCtrl', ['$scope', '$http', '$location', 'sharedProperties', function ($scope, $http, $location, sharedProperties) {

        $http({
            method: 'POST',
            url: '/api/logout.php',
            data: $.param(''),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
          }).
        success(function (data) {
            if (!data.success) {
              $scope.errorPassword = data.errors.username;
              //$location.path('/');
            } else {
              //console.log(data);
              $scope.message = data.message;
              $location.path('/');
            }

          }).
        error(function (data) {
            $scope.error = data.description || 'Server is unreachable';
          });
        


        $scope.objectValue = sharedProperties.getProperty();

      }]);</t>
<t tx="fil.20140201161000.1986">@language javascript
/* //global $:false */
'use strict';

angular.module('newsgipApp')
    .controller('manageCtrl', ['$scope', '$http', '$location', 'sharedProperties', function ($scope, $http, $location, sharedProperties) {

        $scope.objectValue = sharedProperties.getProperty();

      }]);</t>
<t tx="fil.20140201161000.1988">@language php
&lt;?php

$_SESSION = array(); // LE GARS A CLIQUER LOGOUT !!! BABYE !
session_destroy();

$data 		= array(); 		// array to pass back data

$data['success'] = true;
$data['message'] = 'Logged out';

// return all our data to an AJAX call
echo json_encode($data);

?&gt;</t>
<t tx="fil.20140201161000.1990">@language php
&lt;?php



?&gt;</t>
<t tx="fil.20140201161000.1991">@language javascript
/* //global $:false */
'use strict';

angular.module('newsgipApp')
    .controller('mainCtrl', ['$scope', '$location', function ($scope, $location) {

        $scope.isActive = function(path) {
            if ($location.path().substr(0, path.length) === path) {
              return true;
            } else {
              return false;
            }
          };


      }]);
    
    
</t>
<t tx="fil.20140201161000.1992"></t>
<t tx="fil.20140201161000.1993">

&lt;div class="container-fluid" ng-controller="mainCtrl"&gt;

&lt;div class="navbar-header"&gt;
      &lt;button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sgip-collapse"&gt;
        &lt;span class="sr-only"&gt;Toggle navigation&lt;/span&gt;
        &lt;span class="icon-bar"&gt;&lt;/span&gt;
        &lt;span class="icon-bar"&gt;&lt;/span&gt;
        &lt;span class="icon-bar"&gt;&lt;/span&gt;
      &lt;/button&gt;
      &lt;a class="navbar-brand"&gt;SGIP&lt;/a&gt;
&lt;/div&gt;


&lt;div class="collapse navbar-collapse" id="sgip-collapse"&gt;

&lt;ul class="nav navbar-nav"&gt;
       
        &lt;li class="dropdown"&gt;
          &lt;a href="" class="dropdown-toggle" data-toggle="dropdown"&gt;Dropdown &lt;b class="caret"&gt;&lt;/b&gt;&lt;/a&gt;
          &lt;ul class="dropdown-menu"&gt;
            &lt;li&gt;&lt;a href=""&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=""&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=""&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li class="divider"&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=""&gt;Separated link&lt;/a&gt;&lt;/li&gt;
            &lt;li class="divider"&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=""&gt;One more separated link&lt;/a&gt;&lt;/li&gt;
          &lt;/ul&gt;
        &lt;/li&gt;
      &lt;/ul&gt;


  &lt;ul class="nav navbar-nav pull-right"&gt;
  
    &lt;li ng-Class="{active: isActive('/login'), disabled: isActive('/monitor')||isActive('/manage')}"&gt;
    &lt;a ng-hide="isActive('/monitor')||isActive('/manage')"&gt;Login&lt;/a&gt;
    &lt;a ng-show="isActive('/monitor')||isActive('/manage')"&gt;Login&lt;/a&gt;
    &lt;/li&gt;
    &lt;li ng-Class="{active: isActive('/monitor'), disabled: !isActive('/monitor')&amp;&amp;!isActive('/manage') }" &gt;
    &lt;a ng-hide="!isActive('/monitor')&amp;&amp;!isActive('/manage')" ng-href="/#/monitor" &gt;Monitor&lt;/a&gt;
    &lt;a ng-show="!isActive('/monitor')&amp;&amp;!isActive('/manage')"&gt;Monitor&lt;/a&gt;
    &lt;/li&gt;
    &lt;li ng-Class="{active: isActive('/manage'), disabled: !isActive('/monitor')&amp;&amp;!isActive('/manage')}"&gt;
    &lt;a ng-hide=" !isActive('/monitor')&amp;&amp;!isActive('/manage')" ng-href="/#/manage" &gt;Manage&lt;/a&gt;
    &lt;a ng-show=" !isActive('/monitor')&amp;&amp;!isActive('/manage')"&gt;Manage&lt;/a&gt;
    &lt;/li&gt;
    &lt;li ng-Class="{disabled: !isActive('/monitor')&amp;&amp;!isActive('/manage')}" &gt;
    &lt;a ng-hide="!isActive('/monitor')&amp;&amp;!isActive('/manage')" ng-href="/#/logout" &gt;Logout&lt;/a&gt;
    &lt;a ng-show="!isActive('/monitor')&amp;&amp;!isActive('/manage')" &gt;Logout&lt;/a&gt;
    &lt;/li&gt;
    
  &lt;/ul&gt;
&lt;/div&gt;
  
  
 
&lt;/div&gt;
</t>
<t tx="fil.20140201161000.1995">      &lt;div class="container"&gt;
        &lt;p class="text-muted"&gt;Felix Workshop 2014&lt;/p&gt;
      &lt;/div&gt;</t>
<t tx="fil.20140201161000.1996">@language css

REMOVED FROM MAIN.CSS

/* Responsive: Portrait tablets and up */
@media screen and (min-width: 768px) {
    .container {
        max-width: 730px;
    }

    /* Remove the padding we set earlier */
    .header,
    .marketing,
    .footer {
        padding-left: 0;
        padding-right: 0;
    }
    /* Space out the masthead */
    .header {
        margin-bottom: 30px;
    }
    /* Remove the bottom border on the jumbotron for visual effect */
    .jumbotron {
        border-bottom: 0;
    }
}

@language html

</t>
</tnodes>
</leo_file>
