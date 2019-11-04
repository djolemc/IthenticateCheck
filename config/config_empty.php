<?php
/*
 * Config file for iThenticate Checker
 * fill in your parameters
 */


ini_set('max_execution_time', 300);

// MySQL  DB Params

define("DB_HOST", "");
define("DB_USER", "");
define("DB_PASS", "");
define("DB_NAME", "");
define("DRIVER", "mysql:host");

//MSSQL DB params

if ($_SERVER['SERVER_NAME'] == 'localhost') {

    $mssqldriver = '{SQL Server}';
    define("DB_HOST_2", "");
    define("DB_USER_2", "");
    define("DB_PASS_2", "");
    define("DB_NAME_2", " ");
    define("DRIVER_2", "odbc:Driver=$mssqldriver;Server");

}  else {

//CONFIG za produkciju
//
$mssqldriver = '{SQL Server}';
define("DB_HOST_2", "");
define("DB_USER_2", "");
define("DB_PASS_2", "");
define("DB_NAME_2", " ");
define("DRIVER_2", "sqlsrv:server");
}

/*Login info
*
 * Array with allowed username
 * Password with password_hash()
 */

define('USERNAMES', []);
define("PASSWORD", "");
//define("USERNAME", "djole");

//Ithenticate Login

define ('ITHUSER', '');
define ('ITHPASS', '');

/*Mail
 * Parametri za mail server
 *
 */

define ('MAIL_USER', '');
define ('MAIL_PASS', '');