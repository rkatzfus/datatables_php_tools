<?php
namespace App;
define("UNSELECT", "0");
define("VIEW", "1");
define("EDIT", "2");
//------------------
define('TEXT_FIELD', '0');
define('CHECKBOX', '1');
define('DROPDOWN_FIELD', '2');
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
            <footer>
                <script type="text/javascript">
                    $(document).ready(function() {
                        function fetch_data_<?= $this->tbl_ID; ?>() {
                            var table = $("#<?= $this->tbl_ID; ?>").DataTable({
                                language: {                    
                                    "emptyTable": "Keine Daten in der Tabelle vorhanden",
                                    "info": "_START_ bis _END_ von _TOTAL_ Einträgen",
                                    "infoEmpty": "Keine Daten vorhanden",
                                    "infoFiltered": "(gefiltert von _MAX_ Einträgen)",
                                    "infoThousands": ".",
                                    "loadingRecords": "Wird geladen ..",
                                    "processing": "Bitte warten ..",
                                    "paginate": {
                                        "first": "Erste",
                                        "previous": "Zurück",
                                        "next": "Nächste",
                                        "last": "Letzte"
                                    },
                                    "aria": {
                                        "sortAscending": ": aktivieren, um Spalte aufsteigend zu sortieren",
                                        "sortDescending": ": aktivieren, um Spalte absteigend zu sortieren"
                                    },
                                    "select": {
                                        "rows": {
                                            "_": "%d Zeilen ausgewählt",
                                            "1": "1 Zeile ausgewählt"
                                        },
                                        "cells": {
                                            "1": "1 Zelle ausgewählt",
                                            "_": "%d Zellen ausgewählt"
                                        },
                                        "columns": {
                                            "1": "1 Spalte ausgewählt",
                                            "_": "%d Spalten ausgewählt"
                                        }
                                    },
                                    "buttons": {
                                        "print": "Drucken",
                                        "copy": "Kopieren",
                                        "copyTitle": "In Zwischenablage kopieren",
                                        "copySuccess": {
                                            "_": "%d Zeilen kopiert",
                                            "1": "1 Zeile kopiert"
                                        },
                                        "collection": "Aktionen <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                                        "colvis": "Spaltensichtbarkeit",
                                        "colvisRestore": "Sichtbarkeit wiederherstellen",
                                        "copyKeys": "Drücken Sie die Taste <i>ctrl<\/i> oder <i>⌘<\/i> + <i>C<\/i> um die Tabelle<br \/>in den Zwischenspeicher zu kopieren.<br \/><br \/>Um den Vorgang abzubrechen, klicken Sie die Nachricht an oder drücken Sie auf Escape.",
                                        "csv": "CSV",
                                        "excel": "Excel",
                                        "pageLength": {
                                            "-1": "Alle Zeilen anzeigen",
                                            "_": "%d Zeilen anzeigen"
                                        },
                                        "pdf": "PDF"
                                    },
                                    "autoFill": {
                                        "cancel": "Abbrechen",
                                        "fill": "Alle Zellen mit <i>%d<i> füllen<\/i><\/i>",
                                        "fillHorizontal": "Alle horizontalen Zellen füllen",
                                        "fillVertical": "Alle vertikalen Zellen füllen"
                                    },
                                    "decimal": ",",
                                    "search": "Suche:",
                                    "searchBuilder": {
                                        "add": "Bedingung hinzufügen",
                                        "button": {
                                            "0": "Such-Baukasten",
                                            "_": "Such-Baukasten (%d)"
                                        },
                                        "condition": "Bedingung",
                                        "conditions": {
                                            "date": {
                                                "after": "Nach",
                                                "before": "Vor",
                                                "between": "Zwischen",
                                                "empty": "Leer",
                                                "not": "Nicht",
                                                "notBetween": "Nicht zwischen",
                                                "notEmpty": "Nicht leer",
                                                "equals": "Gleich"
                                            },
                                            "number": {
                                                "between": "Zwischen",
                                                "empty": "Leer",
                                                "equals": "Entspricht",
                                                "gt": "Größer als",
                                                "gte": "Größer als oder gleich",
                                                "lt": "Kleiner als",
                                                "lte": "Kleiner als oder gleich",
                                                "not": "Nicht",
                                                "notBetween": "Nicht zwischen",
                                                "notEmpty": "Nicht leer"
                                            },
                                            "string": {
                                                "contains": "Beinhaltet",
                                                "empty": "Leer",
                                                "endsWith": "Endet mit",
                                                "equals": "Entspricht",
                                                "not": "Nicht",
                                                "notEmpty": "Nicht leer",
                                                "startsWith": "Startet mit",
                                                "notContains": "enthält nicht",
                                                "notStarts": "startet nicht mit",
                                                "notEnds": "endet nicht mit"
                                            },
                                            "array": {
                                                "equals": "ist gleich",
                                                "empty": "ist leer",
                                                "contains": "enthält",
                                                "not": "ist ungleich",
                                                "notEmpty": "ist nicht leer",
                                                "without": "aber nicht"
                                            }
                                        },
                                        "data": "Daten",
                                        "deleteTitle": "Filterregel entfernen",
                                        "leftTitle": "Äußere Kriterien",
                                        "logicAnd": "UND",
                                        "logicOr": "ODER",
                                        "rightTitle": "Innere Kriterien",
                                        "title": {
                                            "0": "Such-Baukasten",
                                            "_": "Such-Baukasten (%d)"
                                        },
                                        "value": "Wert",
                                        "clearAll": "Alle löschen"
                                    },
                                    "searchPanes": {
                                        "clearMessage": "Leeren",
                                        "collapse": {
                                            "0": "Suchmasken",
                                            "_": "Suchmasken (%d)"
                                        },
                                        "countFiltered": "{shown} ({total})",
                                        "emptyPanes": "Keine Suchmasken",
                                        "loadMessage": "Lade Suchmasken..",
                                        "title": "Aktive Filter: %d",
                                        "showMessage": "zeige Alle",
                                        "collapseMessage": "Alle einklappen",
                                        "count": "{total}"
                                    },
                                    "thousands": ".",
                                    "zeroRecords": "Keine passenden Einträge gefunden",
                                    "lengthMenu": "_MENU_ Zeilen anzeigen",
                                    "datetime": {
                                        "previous": "Vorher",
                                        "next": "Nachher",
                                        "hours": "Stunden",
                                        "minutes": "Minuten",
                                        "seconds": "Sekunden",
                                        "unknown": "Unbekannt",
                                        "weekdays": [
                                            "Sonntag",
                                            "Montag",
                                            "Dienstag",
                                            "Mittwoch",
                                            "Donnerstag",
                                            "Freitag",
                                            "Samstag"
                                        ],
                                        "months": [
                                            "Januar",
                                            "Februar",
                                            "März",
                                            "April",
                                            "Mai",
                                            "Juni",
                                            "Juli",
                                            "August",
                                            "September",
                                            "Oktober",
                                            "November",
                                            "Dezember"
                                        ]
                                    },
                                },
                                stateSave: true,
                                processing: true,
                                cache: false,
                                searchDelay: 1000, // default null = 400ms
                                serverSide: true,
                                columnDefs: [
                                    <?php
                                        $aryColumndef= array();
                                        foreach ($this->columns as $columns_key => $columns_value) {
                                            ($columns_value['ACTION'] == 2 && isset($this->ajax_update_url))?$classname[] = "contenteditable":"";
                                            switch ($columns_value["TYP"]) {
                                                case 1: // CHECKBOX
                                                    $classname[] = "text-center";
                                                    break;
                                                default:
                                                    // code
                                                    break;
                                            }
                                            $aryColumndef[]=array(
                                                "targets: ".$columns_key
                                                , ($columns_value["ORDERABLE"] == 1)?"orderable: true":"orderable: false"
                                                , ($columns_value["SEARCHABLE"] == 1)?"searchable: true":"searchable: false"
                                                , (isset($classname))?"className: '".implode(" ",$classname)."'":""
                                            ); 
                                        }
                                        foreach ($aryColumndef as $row) {
                                            echo "{".implode(", ", $row)."},";
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
                                            echo "{";
                                            echo "name: \"" . $column["SQLNAME"] . "\", ";
                                            echo "data: \"" . $column["NAME"] . "\", ";
                                            echo "celltype: \"" . $column["TYP"] . "\", ";
                                            switch ($column['TYP']) {
                                                case 1: // CHECKBOX
                                                    ?> render: function(data) {
                                                            is_checked = (data == true) ? 'checked' : '';
                                                            return '<div class="form-switch"><input class="form-check-input" type="checkbox" ' + is_checked + '></div>';
                                                        },
                                                    <?php
                                                    break;  
                                                default:
                                                    # code...
                                                    break;
                                            }
                                            // isset($column["DT_CONFIG"])?$column["DT_CONFIG"]:"";
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
            </footer>
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
        $orderable=isset($arySetting["ORDERABLE"])?$arySetting["ORDERABLE"]:true;
        $searchable=isset($arySetting["SEARCHABLE"])?$arySetting["SEARCHABLE"]:true;
        $dtconfig=isset($arySetting["DT_CONFIG"])?$arySetting["DT_CONFIG"]:"";
        $required=isset($arySetting["REQUIRED"])?$arySetting["REQUIRED"]:"";
        $default=isset($arySetting["DEFAULT"])?$arySetting["DEFAULT"]:"";
        $this->columns[] = array( //default4all
            "SQLNAME" => $SqlName
            , "NAME" => $Name
            , "DISPLAYNAME" => $Displayname
            , "ACTION" => $Action
            , "TYP" => $Typ
            , "ORDERABLE" => $orderable
            , "SEARCHABLE" => $searchable
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