<div class="pro_cover"> 
	<span class="name">Perfil</span>
	
	<section class="tabs">
		<div class="content">
		<img src="public/assets/img/avatar.jpg" class="pro_dp" /> 
			<div class="content-1 perfil-activo tab">
				
			</div>
			<div class="content-2 tab">
				<div id="comentarios"></div>
				<form id="comentariosContacto" role="form">
					<input type="text" id="comentario" name="comentario" class="form-control">
					<input type="hidden" id="id_usuario" name="usuario_id" value="1">
					<input type="hidden" id="id_contacto" name="contacto_id">					
				</form>
				<button id="enviar-comentario" class="btn btn-success"><span class="glyphicon glyphicon-send" aria-hidden="true"></span></button>
				
			</div>
			<div class="content-3 tab">
			
			</div>
			<div class="content-4 tab">
				<?php View::render('contactos/editar'); ?>
			</div>
			<div class="content-5 tab">
				<?php View::render('contactos/eliminar'); ?>
			</div>
		</div>
		<div class="clear-shadow"></div>        
	</section>
</div>