<?php
require __DIR__ . '/vendor/autoload.php';

use Autoloading\webutility;
?>
    <div class="container-fluid">
        <?php
            $pkfield_xxxTESTxxx = "test.ID";
            $array_AJAX_xxxTESTxxx = array();
            $array_AJAX_xxxTESTxxx["fetch"] = array(
                "url" => "/vendor/datatableswebutility/dwuty/src/crud/read.php"
                , "datasource" => "MYSQL_DATABASE.test_table test"
            );
            $obj_webutility = new webutility("dte_xxxTESTxxx", $array_AJAX_xxxTESTxxx, $pkfield_xxxTESTxxx);
            $strsqlWhere_xxxTESTxxx = "test.DEL <> 1";
            $obj_webutility->set_where($strsqlWhere_xxxTESTxxx);
            $obj_webutility->new_column("test.NAME", "NAME", "Anzeigename", VIEW, TEXT_FIELD);
            $defOrderby_xxxTESTxxx = 0;
            $obj_webutility->table_header();
        ?>
    </div>
<?php
$obj_webutility->config(
    $defOrderby_xxxTESTxxx,
    "asc"
);
?>


