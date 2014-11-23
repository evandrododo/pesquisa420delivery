<?php
require "vendor/facebook/php-sdk-v4/autoload.php";

use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;

// start session
session_start();
$session = FacebookSession::setDefaultApplication('225836800874912', '3789aa92507bc07715212a3e6070765a');

$helper = new FacebookRedirectLoginHelper('http://'.$_SERVER['SERVER_NAME'].'/facebook_login.php?submitted=1 ');
$loginUrl = $helper->getLoginUrl();
// Use the login url on a link or button to redirect to Facebook for a

if($_GET['submitted'])
{
    $helper = new FacebookRedirectLoginHelper();
    try {
      $session = $helper->getSessionFromRedirect();
    } catch(FacebookRequestException $ex) {
      // When Facebook returns an error
    } catch(\Exception $ex) {
      // When validation fails or other local issues
    }
    if ($session) {
      // Logged in
    }
}
?>
<a href="<?=$loginUrl?>">Login</a>
