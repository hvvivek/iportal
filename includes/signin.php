<?php
session_start();
require 'oauth_config.php';
require 'oauth.php';

$oauth = new OAuth();
$oauth->init();

if($_SESSION['access_token'])
{

$_SESSION['authcode'] = $oauth->authCode;
$_SESSION['username']=$oauth->user["username"];


}

?>