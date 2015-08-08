<?php
  $database_path = 'D:\xampp\htdocs\mpsot\dbaccess\Requests.mdb';
  if (!file_exists($database_path)) {
    die("No se encuentra la base de datos");
}
  $dbconex = [
    'access1'=> ['dbname'=>$database_path,
                  'user'=>'',
                  'password'=>'',
                  'location'=>''],
  ];
