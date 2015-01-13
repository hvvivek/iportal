<?php

require 'oauth_config.php';
$delimiter= $_SERVER[REQUEST_URI];
$array=explode("/includes", $delimiter);
print_r($array);
$redirect_uri = "http://$_SERVER[HTTP_HOST]/$array[0]";

@session_start();
session_destroy();
echo $redirect_uri;
$signoutURL = AUTH_SERVER . CMD_SIGNOUT . "?response_type=". RESPONSE_TYPE ."&client_id=" . CLIENT_ID . "&redirect_uri=" . $redirect_uri . "&scope=". SCOPE . "&state=" . STATE;
header('Location:'.$signoutURL);
?>