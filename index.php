<?php
require __DIR__ . '/vendor/autoload.php';

use Autoloading\database_tools;

$obj_mysqli = new database_tools();
$sql = "
    select
        ID
        , DEL
        , NAME
    from
        MYSQL_DATABASE.test_table;
";
echo "<b>sql2array</b>";
var_dump($obj_mysqli->sql2array($sql));
echo "<hr>";
echo "<b>sql2array_pk</b>";
var_dump($obj_mysqli->sql2array_pk($sql,"NAME"));
echo "<hr>";
?>

