<?php

try{
  $db['access_01'] = new PDO('odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ='.$dbconex['access1']['dbname'].'; Uid=; Pwd=;');
}
catch(PDOException $e)
{
	$error = explode("(", $e->getMessage());
	die("ERROR ADM-0001. ".$error[0]);
}
/*
  Get next id_request value from Request table
*/
function nextIdRequest($db){
  $sql = "SELECT Max(Id_Request)+1  AS Id  FROM Request";
  $statement = $db->prepare($sql);
  $statement->execute();
  $results=$statement->fetchAll(PDO::FETCH_ASSOC);
  return $results[0]['Id'];
}
/*
  Get next Id_Req_Status value from Request_Status table
*/
function nextIdRequestStatus($db){
  $sql = "SELECT Max(Id_Req_Status)+1 AS Id FROM Request_Status";
  $statement = $db->prepare($sql);
  $statement->execute();
  $results=$statement->fetchAll(PDO::FETCH_ASSOC);
  return $results[0]['Id'];
}
/*
  insert row in Request table
*/
function insertRequest($db,$idRequest, $idRequestStatus, $description){
    $sql = "INSERT INTO Request (Id_Request,Id_Req_Status, Description, Id_User,Urgent)
            VALUES ($idRequest,$idRequestStatus, '$description', 1, false) ";
    if(!$db->query($sql)){
      $db_err = $db->errorInfo();
      print_r($db_err);
      die();
    }
}
/*
  insert row in Request_status table
*/
function insertRequestStatus($db,$idRequestStatus,$idRequest,$statusDT,$comments  ){
  $sql = "INSERT INTO Request_status (Id_Req_Status, Id_Request,Id_Status, Status_dt,Comments,Id_UserStatus,UserNameMP,StatusType)
          VALUES($idRequestStatus,$idRequest,1, '$statusDT','$comments',1,'',1 )";
  if(!$db->query($sql)){
    $db_err = $db->errorInfo();
    print_r($db_err);
    die();
  }
}
/*
  Create entire request records
*/
function create($description,$statusDT,$comments ){
  global $db;
  $description = substr($description,0,255);
  $comments = substr($comments,0,255);
  $idRequest=nextIdRequest($db['access_01']);
  $idRequestStatus = nextIdRequestStatus($db['access_01']);
  insertRequest($db['access_01'],$idRequest,$idRequestStatus,$description);
  insertRequestStatus($db['access_01'],$idRequestStatus,$idRequest,$statusDT,$comments);

}
