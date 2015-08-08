<?php
try{
  $urlservice = 'http://prueba/mpsot/app/createrequest.wsdl';
  $soapclient = new SoapClient($urlservice);
  $soapclient->create('TestClient','12/01/2015 14:05:00','TestComments' );
} catch(SoapFault $e){
 var_dump($e);
}
?>
