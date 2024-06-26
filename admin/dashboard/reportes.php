<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<link rel="stylesheet" href="../sw/dist/sweetalert2.min.css">
	<script src="../sw/dist/sweetalert2.min.js"></script>
	<meta name="author" content="">

	<title>Dollpins Dashboard</title>

	<!-- Custom fonts for this template-->
	<link href="./assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="./assets/fontawesome-free" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="icon" href="./img/icon_admin.ico">

</head>

<body>
	<?php
	include_once './database/conexion.php';

	$obj = new Conexion();
	$link = $obj->conectar();

	$consulta = "SELECT * FROM productos";
	$resultado = $link->prepare($consulta);
	$resultado->execute();
	$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

	?>
	<h1>Reporte de Productos</h1>
	<table id="tablaProductos" class="table table-striped table-bordered table-condensed" style="width:100%">
		<thead class="text-center">
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Valor</th>
				<th>Categoria</th>
				<th>Existencias</th>
				<th>Estado</th>

			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $datos) { ?>
				<tr>
					<td><?php echo $datos['id'] ?></td>
					<td><?php echo $datos['nombre'] ?></td>
					<td><?php echo $datos['descripcion'] ?></td>
					<td><?php echo $datos['valor'] ?></td>
					<td><?php echo $datos['id_categoria'] ?></td>
					<td><?php echo $datos['existencias'] ?></td>
					<td><?php echo $datos['estado'] ?></td>
				</tr>
		</tbody>
	<?php }; ?>
	</table>
</body>

</html>
<?php

$html = ob_get_clean();

require_once '../dashboard/assets/dompdf_1-0-2/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$domPdf = new Dompdf();
$options = $domPdf->getOptions();
$options->set(array('isRemoteEnable' => true));
$domPdf->setOptions($options);
$domPdf->loadHtml($html);
$domPdf->setPaper('letter');

$domPdf->render();
$domPdf->stream("reporteProductos.pdf", array("Attachment" => false));

?>