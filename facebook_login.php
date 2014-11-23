<?php
// start session
session_start();

require "vendor/facebook/php-sdk-v4/autoload.php";

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;

$session = FacebookSession::setDefaultApplication('225836800874912', '3789aa92507bc07715212a3e6070765a');

$helper = new FacebookRedirectLoginHelper('http://'.$_SERVER['SERVER_NAME'].'/dev/420/pesquisa/pesquisa420delivery/facebook_login.php');

try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
 
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
   
  // print data
  echo  print_r( $graphObject, 1 );
  
} else {
  // show login url
  echo '<a href="' . $helper->getLoginUrl() . '">df</a>';
}
?>
