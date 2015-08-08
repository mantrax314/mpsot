Web Service de Integración MP-SOT
============================

## Versión de PHP utilizada
* [PHP 5.4 para Windows XP](http://php.net/downloads.php#v5.4.43)
* Puede servir en cualquier servidor web que soporte php (Apache, IIs, Nginx)

## Configuraciones

### php.ini

+ Activar la extensión **extension=php_pdo_odbc.dll**
+ Configurar la ruta de las extensiones ejemplo: `extension_dir = "C:\php\ext"`

### config.php
+ Configurar la variable `$database_path` con la ruta correspondiente al archivo **.mdb**  de **config.php** ejemplo: `$database_path = 'D:\xampp\htdocs\mpsot\dbaccess\Requests.mdb';`

### createrequest.wsdl

+ Configurar la ruta correspondiente al webservice. Ejemplo:
`<soap:address location="http://prueba/mpsot/app/createreqws.php" />`

## Objetos PDO
+ **$db['access_01']:** Es el correspondiente al acceso a la DB Access.

## createreqws.php

Es el archivo al cual se conectará a consumirse las peticiones de **webservice**. Depende de `config.php` donde se encuentran las configuraciones para la conexión a la base de datos y `database.php` donde se encuentran las funciones para la conexión a la base de datos

## database.php

Contiene todas las funciones para la operación en la base de datos.

### nextIdRequest($db)

Esta función genera el próximo `Id_Request` a utilizar en la tabla `Request` Se le pasa por parámetro un objeto **PDO**.

### nextIdRequestStatus($db)

Esta función genera el próximo `Id_Req_Status` a utilizar en la tabla `Request_Status` Se le pasa por parámetro un objeto **PDO**.

### create($description,$statusDT,$comments )

Esta es la función implementada como webservice y realizará la integración de datos al sistema **MP**.

`$description` Campo de tipo **string** de hasta 255 caracteres.

`$statusDT` Fecha y hora de reporte. en formato mm/dd/yyyy hh24:mm:ss.

`$comments` Campo de tipo **string** de hasta 800 caracteres.

### client.php

Este archivo contiene una implementación para consumir el web service definido en **createrequest.wsdl** debe configurarse la variable `$urlservice` con la ruta en la cual se puede conectar con el web service. Ejemplo:

`$urlservice = 'http://prueba/mpsot/app/createrequest.wsdl';`
