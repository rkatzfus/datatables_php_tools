<?php
require __DIR__ . '/vendor/autoload.php';
use App\webutility;

?>

    <link rel="stylesheet" type="text/css" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css"/>    
    <link rel="stylesheet" type="text/css" href="/vendor/datatables/datatables/media/css/dataTables.bootstrap.min.css"/>
   
    <script type="text/javascript" src="/vendor/components/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>

    <div class="container-fluid">
        <?php
            $pkfield_xxxTESTxxx = "root.ID";
            $array_AJAX_xxxTESTxxx = array();
            $array_AJAX_xxxTESTxxx["fetch"] = array(
                "url" => "/vendor/datatableswebutility/dwuty/read.php"
                , "datasource" => "MYSQL_DATABASE.root_table root"
            );
            $obj_webutility = new webutility("dte_xxxTESTxxx", $array_AJAX_xxxTESTxxx, $pkfield_xxxTESTxxx);
            $strsqlWhere_xxxTESTxxx = "root.DEL <> 1";
            $obj_webutility->set_where($strsqlWhere_xxxTESTxxx);
			$arySetting_CHECKBOX = array(
				"ORDERABLE" => false
				, "SEARCHABLE" => false
			);
            $obj_webutility->new_column("root.TEXT_FIELD", "TEXT_FIELD", "column: TEXT_FIELD", VIEW, TEXT_FIELD);
            $obj_webutility->new_column("root.CHECKBOX", "CHECKBOX", "column: CHECKBOX", VIEW, CHECKBOX, $arySetting_CHECKBOX);
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


<!-- private function setup_environment($data)
		{
			$req_env = explode(',', str_replace(' ', '', $data));
			$ary_environment = array();
			$ary_css = array();
			$ary_js_top = array();
			$ary_js_bottom = array();
			$this->ary_css_final = array();
			$this->ary_js_top_final = array();
			$this->ary_js_bottom_final = array();
			// bootstrap (always loaded)
			$env = 'bootstrap';
			$ary_css['css'][] = '\node_modules\bootstrap\dist\css\bootstrap.min.css';
			$ary_css['css'][] = '\node_modules\bootstrap-select\dist\css\bootstrap-select.min.css';
			$ary_css['css'][] = '\node_modules\bootstrap-icons\font\bootstrap-icons.css';
			$ary_css['css'][] = '\node_modules\select2\dist\css\select2.min.css';
			$ary_css['css'][] = '\node_modules\select2-bootstrap-5-theme\dist\select2-bootstrap-5-theme.min.css';
			$ary_css['css'][] = '\node_modules\bootstrap-daterangepicker\daterangepicker.css';
			$ary_js_top['js_top'][] = '';
			$ary_js_bottom['js_bottom'][] = '\node_modules\jquery\dist\jquery.min.js';
			$ary_js_bottom['js_bottom'][] = '\node_modules\bootstrap\dist\js\bootstrap.bundle.min.js';
			$ary_js_bottom['js_bottom'][] = '\node_modules\bootstrap-select\dist\js\bootstrap-select.min.js';
			$ary_js_bottom['js_bottom'][] = '\node_modules\bootstrap-select\dist\js\i18n\defaults-de_DE.min.js';
			$ary_js_bottom['js_bottom'][] = '\node_modules\select2\dist\js\select2.min.js';
			$ary_js_bottom['js_bottom'][] = '\node_modules\moment\min\moment-with-locales.min.js';
			$ary_js_bottom['js_bottom'][] = '\node_modules\moment\locale\de.js';
			$ary_js_bottom['js_bottom'][] = '\node_modules\bootstrap-daterangepicker\daterangepicker.js';
			$ary_environment[$env] = $ary_css + $ary_js_top + $ary_js_bottom;
			unset($ary_css);
			unset($ary_js_top);
			unset($ary_js_bottom);

			// datatables
			// https://cdn.datatables.net/
			$env = 'datatables';
			if (in_array($env, $req_env) == true) {
				// datatables core (css)
				$ary_css['css'][] = '\node_modules\datatables.net-bs5\css\dataTables.bootstrap5.min.css';
				// select2
				$ary_css['css'][] = '\node_modules\select2\dist\css\select2.min.css';
				$ary_css['css'][] = '\node_modules\select2-bootstrap-theme\dist\select2-bootstrap.min.css';
				// AutoFill
				$ary_css['css'][] = '\node_modules\datatables.net-autofill-bs5\css\autoFill.bootstrap5.min.css';
				// Buttons
				$ary_css['css'][] = '\node_modules\datatables.net-buttons-bs5\css\buttons.bootstrap5.min.css';
				// ColReorder
				$ary_css['css'][] = '\node_modules\datatables.net-colreorder-bs5\css\colReorder.bootstrap5.min.css';
				// FixedColumns
				$ary_css['css'][] = '\node_modules\datatables.net-fixedcolumns-bs5\css\fixedColumns.bootstrap5.min.css';
				// FixedHeader
				$ary_css['css'][] = '\node_modules\datatables.net-fixedheader-bs5\css\fixedHeader.bootstrap5.min.css';
				// KeyTable
				$ary_css['css'][] = '\node_modules\datatables.net-keytable-bs5\css\keyTable.bootstrap5.min.css';
				// // Responsive
				// 	$ary_css['css'][] = '\node_modules\datatables.net-responsive-bs5\css\responsive.bootstrap5.min.css';
				// RowGroup
				$ary_css['css'][] = '\node_modules\datatables.net-rowgroup-bs5\css\rowGroup.bootstrap5.min.css';
				// RowReorder
				$ary_css['css'][] = '\node_modules\datatables.net-rowreorder-bs5\css\rowReorder.bootstrap5.min.css';
				// Scroller
				$ary_css['css'][] = '\node_modules\datatables.net-scroller-bs5\css\scroller.bootstrap5.min.css';
				// SearchBuilder
				$ary_css['css'][] = '\node_modules\datatables.net-searchbuilder-bs5\css\searchBuilder.bootstrap5.min.css';
				// SearchPanes
				$ary_css['css'][] = '\node_modules\datatables.net-searchpanes-bs5\css\searchPanes.bootstrap5.min.css';
				// Select
				$ary_css['css'][] = '\node_modules\datatables.net-select-bs5\css\select.bootstrap5.min.css';

				// datatables core (js)
				$ary_js_top['js_top'][] = '';
				$ary_js_bottom['js_bottom'][] = '\node_modules\jquery\dist\jquery.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net\js\jquery.dataTables.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-bs5\js\dataTables.bootstrap5.min.js';
				// select2
				$ary_js_bottom['js_bottom'][] = '\node_modules\select2\dist\js\select2.full.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\select2\dist\js\i18n\de.js';
				// AutoFill
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-autofill\js\dataTables.autoFill.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-autofill-bs5\js\autoFill.bootstrap5.min.js';
				// Buttons
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-buttons\js\dataTables.buttons.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-buttons-bs5\js\buttons.bootstrap5.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-buttons\js\buttons.colVis.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-buttons\js\buttons.print.min.js';
				// ColReorder
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-colreorder\js\dataTables.colReorder.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-colreorder-bs5\js\colReorder.bootstrap5.min.js';
				// DateTime
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-datetime\dist\dataTables.dateTime.min.js';
				// FixedColumns
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-fixedcolumns\js\dataTables.fixedColumns.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-fixedcolumns-bs5\js\fixedColumns.bootstrap5.min.js';
				// FixedHeader
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-fixedheader\js\dataTables.fixedHeader.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-fixedheader-bs5\js\fixedHeader.bootstrap5.min.js';
				// KeyTable
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-keytable\js\dataTables.keyTable.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-keytable-bs5\js\keyTable.bootstrap5.min.js';
				// // Responsive
				// 	$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-responsive-bs5\js\responsive.bootstrap5.min.js';
				// RowGroup
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-rowgroup\js\dataTables.rowGroup.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-rowgroup-bs5\js\rowGroup.bootstrap5.min.js';
				// RowReorder
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-rowreorder\js\dataTables.rowReorder.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-rowreorder-bs5\js\rowReorder.bootstrap5.min.js';
				// Scroller
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-scroller\js\dataTables.scroller.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-scroller-bs5\js\scroller.bootstrap5.min.js';
				// SearchBuilder
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-searchbuilder\js\dataTables.searchBuilder.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-searchbuilder-bs5\js\searchBuilder.bootstrap5.min.js';
				// SearchPanes
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-searchpanes\js\dataTables.searchPanes.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-searchpanes-bs5\js\searchPanes.bootstrap5.min.js';
				// Select
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-select\js\dataTables.select.min.js';
				$ary_js_bottom['js_bottom'][] = '\node_modules\datatables.net-select-bs5\js\select.bootstrap5.min.js';

				$ary_environment[$env] = $ary_css + $ary_js_top + $ary_js_bottom;
				unset($ary_css);
				unset($ary_js_top);
				unset($ary_js_bottom);
			}

			// Google Charts 
			// https://developers-dot-devsite-v2-prod.appspot.com/chart
			$env = 'google_charts';
			$ary_css['css'][] = '';
			$ary_js_top['js_top'][] = 'https://www.gstatic.com/charts/loader.js';
			$ary_js_bottom['js_bottom'][] = '\node_modules\jquery\dist\jquery.min.js';
			$ary_environment[$env] = $ary_css + $ary_js_top + $ary_js_bottom;
			unset($ary_css);
			unset($ary_js_top);
			unset($ary_js_bottom);

			// summernote
			// https://summernote.org/
			$env = 'summernote';
			$ary_css['css'][] = '\node_modules\summernote\dist\summernote-bs5.min.css';
			$ary_js_top['js_top'][] = '';
			$ary_js_bottom['js_bottom'][] = '\node_modules\summernote\dist\summernote-bs5.min.js';
			$ary_js_bottom['js_bottom'][] = '\node_modules\summernote\dist\lang\summernote-de-DE.js';
			$ary_environment[$env] = $ary_css + $ary_js_top + $ary_js_bottom;
			unset($ary_css);
			unset($ary_js_top);
			unset($ary_js_bottom);

			// generate environment
			foreach ($ary_environment as $env_value) {
				// generate css
				foreach ($env_value['css'] as $css) {
					in_array($css, $this->ary_css_final) == false ? array_push($this->ary_css_final, $css) : ''; // check 4 multiple values
				}
				// generate js top
				foreach ($env_value['js_top'] as $js_top) {
					in_array($js_top, $this->ary_js_top_final) == false ? array_push($this->ary_js_top_final, $js_top) : ''; // check 4 multiple values
				}
				// generate js bottom
				foreach ($env_value['js_bottom'] as $js_bottom) {
					in_array($js_bottom, $this->ary_js_bottom_final) == false ? array_push($this->ary_js_bottom_final, $js_bottom) : ''; // check 4 multiple values
				}
			}
		} -->


