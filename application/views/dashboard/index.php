<?php View::render('layout/header'); ?>
<?php View::render('layout/sidebar'); ?>

<!-- Contenido principal -->
<div class="col-sm-9 col-lg-10 main">
	<div class="row"> <!-- Navbar -->
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<div class="logo-text">CONTACTA<span class="logo-blue">ME</span></div>
				</div>
			</div><!-- /.container-fluid -->
		</nav>
	</div>	
	<div class="row users">
		<div class="row fill">
      <div id="babylongrid">
        
      </div>
    </div>
</div>
<div class="row center">
	<div class="col-xs-12 button" data-toggle="modal" data-target="#modalCrear" rel="tooltip" data-original-title="Agregar usuario"> + </div>
</div>
<div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
				<h4 class="modal-title" id="myModalLabel">Crear usuario</h4>
			</div>
			<div class="modal-body">					
				<?php View::render('contactos/crear'); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="guardarContacto" type="button" class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalPerfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<?php View::render('contactos/perfil'); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></button>
				<button id="perfil-comentario" type="button" class="btn btn-default"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></button>
				<button id="perfil-email" type="button" class="btn btn-default"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span></button>
				<button id="perfil-editar" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
				<button id="perfil-eliminar" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
			</div>
		</div>
	</div>
</div>
<?php View::render('layout/footer'); ?>