<span class="btn btn-success fileinput-button">
<i class="glyphicon glyphicon-plus"></i>
<span>Subir foto de perfil...</span>
<input id="fileupload" type="file" name="files[]" multiple>
</span>
<br>
<br>
<div id="progress" class="progress">
<div class="progress-bar progress-bar-success"></div>
</div>

<form id="crearContacto" role="form" class="form-horizontal">
	<div class="form-group">
		<label for="nombre" class="col-sm-4 control-label">Nombre</label>
		<div class="col-sm-6">
			<input type="text" name="nombre" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label for="apellidos" class="col-sm-4 control-label">Apellidos</label>
		<div class="col-sm-6">
			<input type="text" name="apellidos" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label for="telefono" class="col-sm-4 control-label">Teléfono</label>
		<div class="col-sm-6">
			<input type="text" name="telefono" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label for="email" class="col-sm-4 control-label">Email</label>
		<div class="col-sm-6">
			<input type="text" name="email" class="form-control">
		</div>
	</div>

	<select id="grupo_id" name="grupo_id" class="form-control">

	</select>

	<input type="hidden" id="urlAvatar" name="avatar" value="/vendor/fileupload/files/default.png">
	<input type="hidden" name="usuario_id" value="1">
</form>