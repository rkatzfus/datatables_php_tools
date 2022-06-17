<!DOCTYPE html>
<html>
	<?php
		require_once __DIR__ . '/vendor/autoload.php';
		use App\webutility;
		use App\crud\read
	?>
	<head>
		<link rel="stylesheet" type="text/css" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css"/>    
		<link rel="stylesheet" type="text/css" href="/vendor/datatables.net/datatables.net-bs5/css/dataTables.bootstrap5.min.css"/>
		<link rel="stylesheet" type="text/css" href="/vendor/datatables.net/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css"/>
		<link rel="stylesheet" type="text/css" href="/vendor/select2/select2/dist/css/select2.min.css"/>
	
		<script type="text/javascript" src="/vendor/components/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="/vendor/datatables.net/datatables.net/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="/vendor/datatables.net/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
		<script type="text/javascript" src="/vendor/datatables.net/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
		<script type="text/javascript" src="/vendor/select2/select2/dist/js/select2.min.js"></script>
		<script type="text/javascript" src="/vendor/select2/select2/dist/js/i18n/de.js"></script>
	</head>
	<body>
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
				$arySetting_DROPDOWN_FIELD = array(
					"AJAX" => "/vendor/datatableswebutility/dwuty/read_select2.php"
					, "SELECT2" => array(
						"columns" => array(
						  "id" => "dropdown.ID"
						  , "text" => "dropdown.TEXT"
						)
						, "from" => "MYSQL_DATABASE.dropdown_table dropdown"
					)
				);
				$obj_webutility->new_column("root.TEXT_FIELD", "TEXT_FIELD", "column: TEXT_FIELD", VIEW, TEXT_FIELD);
				$obj_webutility->new_column("root.CHECKBOX", "CHECKBOX", "column: CHECKBOX", VIEW, CHECKBOX, $arySetting_CHECKBOX);
				$obj_webutility->new_column("root.REF_DROPDOWN", "DROPDOWN_FIELD", "column: DROPDOWN_FIELD", VIEW, DROPDOWN_FIELD, $arySetting_DROPDOWN_FIELD);
				$obj_webutility->new_column("root.LINK", "LINK", "column: LINK", VIEW, LINK);
				$obj_webutility->new_column("root.LINK_BUTTON", "LINK_BUTTON", "column: LINK_BUTTON", VIEW, LINK_BUTTON);
				$obj_webutility->new_column("root.DATE_FIELD", "DATE_FIELD", "column: DATE_FIELD", VIEW, DATE_FIELD);
				$defOrderby_xxxTESTxxx = 0;
				$obj_webutility->table_header();
			?>
		</div>
		<?php
			$obj_webutility->config(
				$defOrderby_xxxTESTxxx,
				"asc"
				, fixedHeader: true
			);
		?>
	</body>
</html>

