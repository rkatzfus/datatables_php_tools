<!DOCTYPE html>
<html>
	<?php
		require __DIR__ . '/vendor/autoload.php';
		use App\webutility;
	?>
	<head>
		<link rel="stylesheet" type="text/css" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css"/>    
		<link rel="stylesheet" type="text/css" href="/vendor/datatables/datatables/media/css/dataTables.bootstrap.min.css"/>
	
		<script type="text/javascript" src="/vendor/components/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="/vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
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
	</body>
</html>

