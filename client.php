<?php
try{
  $urlservice = 'http://prueba/mpsot/app/createrequest.wsdl';
  $soapclient = new SoapClient($urlservice);
  $date = new DateTime();
  $soapclient->create('TestClient',$date->format('m/d/Y H:i:s'),'TestComments' );
} catch(SoapFault $e){
 var_dump($e);
}
?>
