<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = '10.107.154.9';
$db['default']['username'] = 'agus';
$db['default']['password'] = 'agusjuga.';
$db['default']['database'] = 'pdpt_agus';
$db['default']['dbdriver'] = 'mssql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = FALSE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

// $db['default']['hostname'] = '10.107.154.9';
// $db['default']['username'] = 'agus';
// $db['default']['password'] = 'agusjuga.';
// $db['default']['database'] = 'pdpt';
// $db['default']['dbdriver'] = 'mysql';
// $db['default']['dbprefix'] = '';
// $db['default']['pconnect'] = TRUE;
// $db['default']['db_debug'] = FALSE;
// $db['default']['cache_on'] = FALSE;
// $db['default']['cachedir'] = '';
// $db['default']['char_set'] = 'utf8';
// $db['default']['dbcollat'] = 'utf8_general_ci';
// $db['default']['swap_pre'] = '';
// $db['default']['autoinit'] = TRUE;
// $db['default']['stricton'] = FALSE;
// $db['pemutakhiran']['hostname'] = '10.107.154.9';
// $db['pemutakhiran']['username'] = 'agus';
// $db['pemutakhiran']['password'] = 'agusjuga.';
// $db['pemutakhiran']['database'] = 'pemutakhiran_pns';
// $db['pemutakhiran']['dbdriver'] = 'mssql';
// $db['pemutakhiran']['dbprefix'] = '';
// $db['pemutakhiran']['pconnect'] = TRUE;
// $db['pemutakhiran']['db_debug'] = TRUE;
// $db['pemutakhiran']['cache_on'] = FALSE;
// $db['pemutakhiran']['cachedir'] = '';
// $db['pemutakhiran']['char_set'] = 'utf8';
// $db['pemutakhiran']['dbcollat'] = 'utf8_general_ci';
// $db['pemutakhiran']['swap_pre'] = '';
// $db['pemutakhiran']['autoinit'] = TRUE;
// $db['pemutakhiran']['stricton'] = FALSE;

// $db['personal']['hostname'] = '10.107.154.9';
// $db['personal']['username'] = 'agus';
// $db['personal']['password'] = 'agusjuga.';
// $db['personal']['database'] = 'personaldos';
// $db['personal']['dbdriver'] = 'mssql';
// $db['personal']['dbprefix'] = '';
// $db['personal']['pconnect'] = TRUE;
// $db['personal']['db_debug'] = TRUE;
// $db['personal']['cache_on'] = FALSE;
// $db['personal']['cachedir'] = '';
// $db['personal']['char_set'] = 'utf8';
// $db['personal']['dbcollat'] = 'utf8_general_ci';
// $db['personal']['swap_pre'] = '';
// $db['personal']['autoinit'] = TRUE;
// $db['personal']['stricton'] = FALSE;
////
//$db['personal']['hostname'] = 'INSPIRON';
//$db['personal']['username'] = 'Inspiron\Ahmad Ibrahim';
//$db['personal']['password'] = '';
//$db['personal']['database'] = 'peg';
//$db['personal']['dbdriver'] = 'mssql';
//$db['personal']['dbprefix'] = '';
//$db['personal']['pconnect'] = TRUE;
//$db['personal']['db_debug'] = TRUE;
//$db['personal']['cache_on'] = FALSE;
//$db['personal']['cachedir'] = '';
//$db['personal']['char_set'] = 'utf8';
//$db['personal']['dbcollat'] = 'utf8_general_ci';
//$db['personal']['swap_pre'] = '';
//$db['personal']['autoinit'] = TRUE;
//$db['personal']['stricton'] = FALSE;

//$db['personal']['hostname'] = 'localhost';
//$db['personal']['username'] = 'root';
//$db['personal']['password'] = '';
//$db['personal']['database'] = 'db_mppl';
//$db['personal']['dbdriver'] = 'mysql';
//$db['personal']['dbprefix'] = '';
//$db['personal']['pconnect'] = FALSE;
//$db['personal']['db_debug'] = FALSE;
//$db['personal']['cache_on'] = FALSE;
//$db['personal']['cachedir'] = '';
//$db['personal']['char_set'] = 'utf8';
//$db['personal']['dbcollat'] = 'utf8_general_ci';
//$db['personal']['swap_pre'] = '';
//$db['personal']['autoinit'] = TRUE;
//$db['personal']['stricton'] = FALSE;

/* End of file database.php */
/* Location: ./application/config/database.php */
 ?>