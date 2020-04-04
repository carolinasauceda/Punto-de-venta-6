

<html lang="es">
	<head>
        <?php include_once '../../../common/commonHeaders.php'?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
		<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
		<script>
			$(document).ready(function(){
				$('#mitabla').DataTable({
					"order": [[1, "asc"]],
					"language":{
					"lengthMenu": "Mostrar _MENU_ registros por pagina",
					"info": "Mostrando pagina _PAGE_ de _PAGES_",
						"infoEmpty": "No hay registros disponibles",
						"infoFiltered": "(filtrada de _MAX_ registros)",
						"loadingRecords": "Cargando...",
						"processing":     "Procesando",
						"search": "Buscar:",
						"zeroRecords":    "No se encontraron registros coincidentes",
						"paginate": {
							"next":       "Siguiente",
							"previous":   "Anterior"
						},					
					},
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "server_process.php"
				});	
			});
			
		</script>
	</head>
	
	<body>
		
		<div class="container">
			<div class="row">
				<h2 style="text-align:center">Productos disponibles</h2>
				<h4 style="padding-left:800px">
				</h4>
			</div>
			
			<div class="row d-flex ">
				<div class="col-md-2">
				<a href="form.php" class="btn btn-primary">Nuevo Producto</a>
				</div>
				<div class="col-md-2">
				<a href="nuevo.php" class="btn btn-primary">Reporte</a>
				</div>
			</div>

			<div class="row table-responsive">
				<table  id="mitabla" class="table display">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nombre</th>
							<th scope="col">Proveedor</th>
							<th scope="col">Categoria</th>
							<th scope="col">Precio Unitario</th>
							<th scope="col">Existencia</th>
							<th scope="col">Estado</th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
					</thead>
					
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	<!--	Ojo con los modales
		 Modal
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Eliminar</a>
					</div>
				</div>
			</div>
		</div>
		 Modal
		<div class="modal fade" id="Modificar_Gancho" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Modificar</h4>
					</div>
					<form action="modificargancho.php" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="nombre" class="col-sm-2 control-label">Gancho $</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="preciogang" name="preciogang" placeholder="Precio" value="<?php /*echo $row['PrecioG'];*/ ?>" required>
							</div>
							<br>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>
    -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

		<?php include_once '../../../common/commonJS.php'?>

	</body>
</html>	