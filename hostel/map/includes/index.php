<?php
@session_start();

require 'oauth_config.php';
require 'oauth.php';

$oauth = new OAuth();
$oauth->init();
if($oauth->authCode){
$_SESSION['authcode'] = $oauth->authCode;
}
if($oauth->user['loggedIn']){
  print_r($oauth->user);
  echo "<a href='signout.php'>Sign Out</a> " ;
}
else {
  echo "<a href='$oauth->signinURL'>Sign In</a> "  ;
}
