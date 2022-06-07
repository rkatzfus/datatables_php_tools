<?php
require __DIR__ . '/vendor/autoload.php';

use App\database_tools;
// use App\webutility;
// use App\webutility_ssp;

$obj_mysqli = new database_tools();
$sql = "
    select
        ID
        , DEL
        , NAME
    from
        MYSQL_DATABASE.root_table;
";
echo "<b>sql2array</b>";
var_dump($obj_mysqli->sql2array($sql));
echo "<hr>";
echo "<b>sql2array_pk</b>";
var_dump($obj_mysqli->sql2array_pk($sql,"NAME"));
echo "<hr>";
$sql = "
    select
        distinct count(*) 
    from 
        MYSQL_DATABASE.root_table; 
";
echo "<b>sql_getfield</b>";
var_dump($obj_mysqli->sql_getfield($sql));
echo "<hr>";

?>

