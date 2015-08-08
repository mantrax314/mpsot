<?php
include('config.php');
include('database.php');
ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("createrequest.wsdl");
$server->AddFunction("create");
$server->handle();
?>
