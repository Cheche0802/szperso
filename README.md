# NOMINA UCAB (SZPERSO)
Nómina Ucab, es un sistema web cuya principal función es extraer de picasso la nómina de la Universidad Católica Andrés Bello, asi como también mantener esta nómina lo mas actualizada posible, es mejor conocida por su viejo nombre SZPERSO,  en honor a su tabla principal de BD la cual tiene el mismo nombre.
### CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

CakePHP es un framework o marco de trabajo que facilita el desarrollo de aplicaciones web, utilizando el patrón de diseño MVC(Modelo Vista Controlador). Es de código abierto y se distribuye bajo licencia MIT. [CakePHP](http://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Dependencias Externas
##### [CakeDC CakePHP 3 Driver for Oracle Database](http://https://github.com/CakeDC/cakephp-oracle-driver) 

## Requerimientos para instalación
1. Servidor Apache con PHP 5.6+
2. PHP drivers para Oracle 12g (OCI8), debe ser instalado con el driver de Oracle y no como objeto PDO.
3. Habilitar la libreria INTL de PHP (para mayor informacion consultar la pagina de CakePHP)
4. MSSQL Drivers para PHP con soporte para MSSQL 2008 (SQLSRV32.EXE), para mayor informacion consulte la pagina de Microsoft. [Microsoft Drivers for PHP for SQL Server](http://https://www.microsoft.com/en-us/download/details.aspx?id=20098)


## Instalación
1.- Ejecutar el script de base de datos `DB_SCRIPTS/szperso.sql` (Banner8)
2. Copiar todos los archivos del repositorio en la carpeta destino del servidor web.

## Configuración
El archivo de configuracion para las conexiones de Base dedatos es: `config/app.php`.
se deben modificar los parametros de conexion para los ambientes correspondientes de las conexiones "default" y "picasso"

Conexión de default    
    
``` PHP
'default' => [
    'className' => 'CakeDC\OracleDriver\Database\OracleConnection',
    'driver' => 'CakeDC\OracleDriver\Database\Driver\OracleOCI', # For OCI8
    #'driver' => 'CakeDC\\OracleDriver\\Database\\Driver\\OraclePDO', # For PDO_OCI
    'host' => 'X.X.X.X',          # Database host name or IP address
    //'port' => 'nonstandard_port', # Database port number (default: 1521)
    'username' => 'PEDIR_DATA_A_UNIDAD_DE_BASE_DE_DATOS',          # Database username
    'password' => 'PEDIR_DATA_A_UNIDAD_DE_BASE_DE_DATOS',       # Database password
    'database' => 'PEDIR_DATA_A_UNIDAD_DE_BASE_DE_DATOS',             # Database name (maps to Oracle's `SERVICE_NAME`)
    'sid' => '',                    # Database System ID (maps to Oracle's `SID`)
    'instance' => '',               # Database instance name (maps to Oracle's `INSTANCE_NAME`)
    'pooled' => ''                 # Database pooling (maps to Oracle's `SERVER=POOLED`)
],
```

Conexión de Picasso (nómina) 

``` PHP
<?php

return  ["PICASSO_CONN"=>
                ["DEFAULT"=>"TEST",
                    "DEBUG_MODE"=>true,
                    "TEST" =>[ 'SERVER' => "X.X.X.X\\TEST",
                        'DATABASE' => "PEDIR_DATA_A_UNIDAD_DE_BASE_DE_DATOS",
                        'USER'=>"PEDIR_DATA_A_UNIDAD_DE_BASE_DE_DATOS",
                        'PASSWORD'=>"PEDIR_DATA_A_UNIDAD_DE_BASE_DE_DATOS"
                    ],
                    'PROD' =>[  'SERVER' => "X.X.X.X\\PRODUCCION",
                        'DATABASE' => "PEDIR_DATA_A_UNIDAD_DE_BASE_DE_DATOS",
                        'USER'=>"PEDIR_DATA_A_UNIDAD_DE_BASE_DE_DATOS",
                        'PASSWORD'=>"PEDIR_DATA_A_UNIDAD_DE_BASE_DE_DATOS"
                        ]
                ]
        ];
```

UBICACIÓN DEL CRONJOB 

En el webhost04 (200.2.15.39)

Linea en el cron:

``` PHP
00 5    * * 1   root    curl -k https://szperso.ucab.edu.ve > /var/log/szperso/log.html
```