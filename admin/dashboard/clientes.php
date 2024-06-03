<?php require "./header.php"; ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons">library_add</i></button>
			<a target="_blank" href="./reportesClientes.php"><button id="btnReportes" type="button" class="btn btn-secondary"><i class="material-icons"><span class="material-symbols-outlined">
							picture_as_pdf
						</span></i></button> </a>
		</div>
	</div>
</div>
<br>

<div class="container caja">
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table id="tablaClientes" class="table table-striped table-bordered table-condensed" style="width:100%">
					<thead class="text-center">
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Usuario</th>
							<th>Correo</th>
							<th>Contraseña</th>
							<th>Telefono</th>
							<th>Direccion</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="formClientes">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="" class="col-form-label">Id</label>
								<input type="text" class="form-control" id="id">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="" class="col-form-label">User Name:</label>
								<input type="text" class="form-control" id="username">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="" class="col-form-label">Nombre</label>
								<input type="text" class="form-control" id="nombre">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="" class="col-form-label">Correo</label>
								<input type="email" class="form-control" id="correo">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-9">
							<div class="form-group">
								<label for="" class="col-form-label">Contraseña</label>
								<input type="password" class="form-control" id="password">
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label for="" class="col-form-label">Telefono</label>
								<input type="number" class="form-control" id="telefono">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-9">
							<div class="form-group">
								<label for="" class="col-form-label">Direccion</label>
								<input type="text" class="form-control" id="direccion">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
					<button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Fin Modal -->
</div>
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Dollpins 2024</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesión</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">¿Está seguro que desea cerrar su sesión?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../logout.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>
<script src="./assets/jquery/jquery.min.js"></script>
<script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./assets/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="./assets/chart.js/Chart.min.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script type="text/javascript" src="./assets/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="./js/clientes.js"></script>
</body>
</html>