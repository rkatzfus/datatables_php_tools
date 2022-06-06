<?php
namespace App;
define('UNSELECT', '0');
define('VIEW', '1');
define('EDIT', '2');
//------------------
define('TEXT_FIELD', '0');
class webutility
{
    private $columns = array();
    private $tbl_ID;
    function __construct(
        $tbl_ID = "",
        $ajax  = array(),
        $pkfield  = ""
    ) {
       $this->obj_mysqli = new database_tools();
       $this->obj_ssp = new webutility_ssp($debug = false);
       $this->ajax_fetch_where = "";
       $this->tbl_ID = $tbl_ID;
       $this->pkfield = $pkfield;
       if (isset($ajax)) {
            $fetch = false;
            $this->button_column = false; 
            foreach ($ajax as $key => $value) {
                switch ($key) {
                    case 'fetch':
                        $this->ajax_fetch_url = $value['url']; 
                        $this->ajax_fetch_datasource = $value['datasource']; 
                        $fetch = true;
                        break;
                    case 'insert':
                        $this->ajax_insert_url = $value['url'];
                        $this->ajax_insert_datasource = $value['datasource'];
                        (isset($value['fade_out'])) ? $this->ajax_insert_fade_out = json_encode($value['fade_out']) : "";
                        (isset($value['dropdown_multi'])) ? $this->ajax_insert_dropdown_multi = json_encode($value['dropdown_multi']) : "";
                        (isset($value['check'])) ? $this->ajax_insert_check = json_encode($value['check']) : $this->ajax_insert_check = 'false';
                        $this->button_column = true;
                        break;
                    case 'update':
                        $this->ajax_update_url =  $value['url'];
                        $this->ajax_update_datasource = $value['datasource'];
                        (isset($value['dropdown_multi'])) ? $this->ajax_update_dropdown_multi = json_encode($value['dropdown_multi']) : "";
                        break;
                    case 'delete':
                        $this->ajax_delete_url = $value['url'];
                        $this->ajax_delete_datasource = $value['datasource'];
                        $this->button_column = true; 
                        break;
                    default:
                        throw new \Exception('Es ist ein AJAX ERROR aufgetreten!');
                        exit();
                }
            }
            if ($fetch != true) {
                throw new \Exception('Es wurde keine AJAX Quelle eingetragen');
            }
        }
    } 
    public function table_header()
    {
        ?>
            <table id="<?= $this->tbl_ID; ?>" class="table table-striped table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <?php
                            foreach ($this->columns as $column) {
                                echo "<th>" . $column['DISPLAYNAME'] . "</th>"; 
                            }
                            if ($this->button_column == true) {
                                echo "<th>";
                                if (isset($this->ajax_insert_url)) { 
                                    ?>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-outline-primary btn-sm" title="Datensatz anlegen" name="add_<?= $this->tbl_ID; ?>" id="add_<?= $this->tbl_ID; ?>" style="box-shadow: none;width: 80px;" data-ajaxdefault="">
                                                <b>anlegen</b>
                                            </button>
                                        </div>
                                    <?php
                                }
                                echo "</th>";
                            }
                        ?>
                    </tr>
                </thead>
            </table>
        <?php
    }
    public function config(
        $default_order = "",
        $default_order_dir = "asc"
    ) {
        foreach ($this->columns as $columns_key => $columns_value) {
            if ($columns_value["TYP"] != 11) { // MODAL_BUTTON
                if ($columns_value["TYP"] == 8) { // DROPDOWN_MULTI_FIELD
                    $columns_value["SQLNAME"] = $columns_value["SQLNAMETABLE"];
                    unset($columns_value["SQLNAMETABLE"]);
                    $columnsdata[$columns_key] = $columns_value;
                } else {
                    $columnsdata[$columns_key] = $columns_value;
                }
            }
        }
        ?>
        <script type="text/javascript" src="/vendor/components/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                function fetch_data_<?= $this->tbl_ID; ?>() {
                    var table = $("#<?= $this->tbl_ID; ?>").DataTable({
                        stateSave: true,
                        processing: true,
                        cache: false,
                        searchDelay: 1000, // default null = 400ms
                        // language: {
                        //     url: "/localisation/dataTables.german.json"
                        // },
                        serverSide: true,
                        columnDefs: [
                            <?php
                                $column_edit_i = 0;
                                $column_edit_array = array();
                                foreach ($this->columns as $column) {
                                    if ($column['ACTION'] == 2) {
                                        $column_edit_array += array($column_edit_i => $column_edit_i);
                                    }
                                    $column_edit_i++;
                                }
                                if (trim(implode(", ", $column_edit_array)) != "") {
                                    if (isset($this->ajax_update_url)) {
                                        ?> {
                                                targets: [<?= trim(implode(", ", $column_edit_array)); ?>],
                                                createdCell: function(td, cellData, rowData, row, col) {
                                                    $(td).attr("contenteditable", true);
                                                }
                                            }
                                        <?php
                                    }
                                }
                            ?>
                        ],
                        ajax: {
                            url: "<?= $this->ajax_fetch_url; ?>",
                            type: "POST",
                            data: {
                                pkfield: "<?= $this->pkfield; ?>",
                                datasource: "<?= $this->ajax_fetch_datasource; ?>",
                                where: "<?= $this->ajax_fetch_where; ?>",
                                columnsdata: '<?= json_encode($columnsdata, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); ?>'}
                        },
                        rowId: "DT_RowId",
                        order: [
                            [
                                "<?= intval($default_order); ?>",
                                "<?= $default_order_dir; ?>"
                            ]
                        ],
                        columns: [
                            <?php
                                foreach ($this->columns as $column) {
                                    $aryclassName = array();
                                    echo "{";
                                    echo "name: \"" . $column["SQLNAME"] . "\", ";
                                    echo "data: \"" . $column["NAME"] . "\", ";
                                    echo "celltype: \"" . $column["TYP"] . "\", ";
                                    ($column["ACTION"] == 2)? $aryclassName[] = "update_" . $this->tbl_ID:"";
                                    echo "className: \"" . implode(" ", $aryclassName) . " align-middle\", ";
                                    isset($column["DT_CONFIG"])?$column["DT_CONFIG"]:"";
                                    echo "},";
                                }
                            if (isset($this->ajax_delete_url)) {
                                ?> {
                                        orderable: false,
                                        searchable: false,
                                        className: "align-middle",
                                        // render: delete_button_
                                    }
                                <?php
                            }
                            ?>
                        ],
                    });
                }
                fetch_data_<?= $this->tbl_ID; ?>();
            });
        </script>
        <?php
    }
    public function new_column(
        $SqlName="",
        $Name="",
        $Displayname="",
        $Action=0,
        $Typ=0,
        $arySetting = array()
    ) {
        if ($Typ == 2 || $Typ == 8) {
            $Action = 0;
        }
        $dtconfig=isset($arySetting["DT_CONFIG"])?$arySetting["DT_CONFIG"]:"";
        $required=isset($arySetting["REQUIRED"])?$arySetting["REQUIRED"]:"";
        $default=isset($arySetting["DEFAULT"])?$arySetting["DEFAULT"]:"";
        $this->columns[] = array( //default4all
            "SQLNAME" => $SqlName
            , "NAME" => $Name
            , "DISPLAYNAME" => $Displayname
            , "ACTION" => $Action
            , "TYP" => $Typ
            , "DT_CONFIG" => $dtconfig
            , "REQUIRED" => $required
            , "DEFAULT" => $default
        );
        foreach ($this->columns as $column_key => $column_value) {
            if ($this->columns[$column_key]["NAME"] == $Name && !empty($arySetting)) {
            foreach ($arySetting as $arySetting_key => $arySetting_value) {
                switch ($arySetting_key) {
                case "MODAL":
                    $this->columns[$column_key]["SQLNAME"] = "concat('" . json_encode($arySetting["MODAL"], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) . "')";
                    $this->columns[$column_key]["MODAL"] = json_encode($arySetting["MODAL"], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
                    break;
                case "SELECT2": 
                    switch ($Typ) {
                    case 2:
                        $aryColumns = $arySetting["SELECT2"]["columns"];
                        $this->obj_ssp->set_length(-1); 
                        $this->obj_ssp->set_Select($aryColumns);
                        $this->obj_ssp->set_From($arySetting["SELECT2"]["from"]);
                        (isset($arySetting["SELECT2"]["where"]))?$this->obj_ssp->set_Where($arySetting["SELECT2"]["where"]):$this->obj_ssp->set_Where();
                        $sql = $this->obj_ssp->set_data_sql();
                    //   $ary_Select2Initial = $this->objMSSQL->exec_sql_pk_value($sql, "id", "text");
                    //   $this->columns[$column_key]["JSON"] =  $ary_Select2Initial;
                        break;
                    case 8: // DT_EDIT_DROPDOWN_MULTI_v2
                        $this->columns[$column_key]["SQLNAME"] = "substring((select ',' + cast(" . $arySetting["SELECT2"]["columns"]["text"] . " as varchar) from " . $arySetting["SELECT2"]["from"] . " where " . $this->pkfield . " = " . $arySetting["SELECT2"]["columns"]["id"] . " and " . $arySetting["SELECT2"]["where"] . " for xml path('')), 2, 1000000)";
                        $this->columns[$column_key]["SQLNAMETABLE"] = $SqlName;
                        $aryColumns = $arySetting["SUBSELECT2"]["columns"];
                        $this->obj_ssp->set_length(-1); 
                        $this->obj_ssp->set_Select($aryColumns);
                        $this->obj_ssp->set_From($arySetting["SUBSELECT2"]["from"]);
                        (isset($arySetting["SUBSELECT2"]["where"]))?$this->obj_ssp->set_Where($arySetting["SUBSELECT2"]["where"]):$this->obj_ssp->set_Where();
                        $sql = $this->obj_ssp->set_data_sql();
                    //   $ary_Select2Initial = $this->objMSSQL->exec_sql_pk_value($sql, "id", "text");
                    //   $this->columns[$column_key]["JSON"] =  $ary_Select2Initial;
                    //   $this->columns[$column_key]["SUBSELECT2"] = $arySetting["SUBSELECT2"];
                        break;
                    default:
                        # code...
                        break;
                    }
                    $this->columns[$column_key]["AJAX"] = $arySetting["AJAX"];
                    $this->columns[$column_key]["SELECT2"] = $arySetting["SELECT2"];
                    break;
                default:
                    # code...
                    break;
                }
            }
            }
        }
    }
    public function set_where(
        $strsqlwhere = ""
    ) {
        $this->ajax_fetch_where = $strsqlwhere;
    }
}
?>