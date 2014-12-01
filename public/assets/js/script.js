$(function(){	
	cargarPerfil();
	cargarContactos();
	reloadGrupos();

	$('#guardarContacto').click(function(){
		var data = $('#crearContacto').serialize();
		$.ajax({
			type: "POST",
			url: "contacto/create",
			data: data,
			success: function(response){
				console.log(response);	
			},
			error: function(jq,status,message) {
		        console.log('Error al procesar la solicitud. Status: ' + status + ' - Message: ' + message);
		    }
		});
	});

	$('#modalCrear').on('shown.bs.modal', function() {
	    $('#crearContacto').bootstrapValidator('resetForm', true);
	});

	$('#modalPerfil').on('show.bs.modal', function(e) {
		var id = $(e.relatedTarget).data('id');
		$.ajax({
			type: "GET",
			url: "contacto/read/"+id,
			success: function(response){
				var data = $.parseJSON(response);
				$('.pro_dp ').attr('src', data[0].avatar);
				$('.content-1').html('<h3 style="text-align:center;">Perfil</h3><p><i class="fa fa-user"></i> '+data[0].nombre+' '+data[0].apellidos+'</p><p><i class="fa fa-phone"></i> '+data[0].telefono+'</p><p><i class="fa fa-inbox"></i> '+data[0].email+'</p><p><i class="fa fa-users"></i> '+data[0].grupo+'</p>');
			},
			error: function(jq,status,message) {
		        console.log('Error al procesar la solicitud. Status: ' + status + ' - Message: ' + message);
		    }
		});
		$('#comentarios').html('');
		$.ajax({
			type: "GET",
			url: "comment/contacto/",
			data: "contacto_id="+id+"&usuario_id=1",
			success: function(response){
				data = $.parseJSON(response);
				console.log(data);
				$.each(data, function(index,item) {
					$('#comentarios').append('<p class="bubble">'+item['comentario']+'</p>');
				});
			},
			error: function(jq,status,message) {
		        console.log('Error al procesar la solicitud. Status: ' + status + ' - Message: ' + message);
		    }
		});
	});

	$('#modalPerfil').on('show.bs.modal', function(e) {
		var id = $(e.relatedTarget).data('id');
		$('#eliminarContacto').attr('data-id', id);
		$('#perfil-editar').attr('data-id', id);
		$('#editarContacto').attr('data-id', id);
		$('#id_contacto').val(id);
	});

	$('#eliminarContacto').click(function(){
		var id = $(this).attr('data-id');
		$.ajax({
		    url: 'contacto/delete/'+id,
		    type: 'GET',
		    success: function(response) {
		    	$('#modalPerfil').modal('toggle');
		        $('#mensajesUsuario').html(response.message);
		    }
		});
	});

	$('#perfil-editar').click(function(){
		tabs('.content-4');
		var id = $(this).attr('data-id');
		$.ajax({
			type: "POST",
			url: "contacto/read/"+id,
			success: function(response){
				var data = $.parseJSON(response);
				$('#nombre').val(data[0].nombre);
				$('#apellidos').val(data[0].apellidos);
				$('#telefono').val(data[0].telefono);
				$('#email').val(data[0].email);
				$('#grupo_id').val(data[0].grupo_id);
				$('#avatar').val(data[0].avatar);
				$('#contacto_id').val(data[0].contacto_id);
			},
			error: function(jq,status,message) {
		        console.log('Error al procesar la solicitud. Status: ' + status + ' - Message: ' + message);
		    }
		});
	});

	$('#editarContacto').click(function(){
		var id = $(this).attr('data-id');
		var data = $('#editarContacto').serialize();
		$.ajax({
			type: "POST",
			url: "contacto/update/"+id,
			data: data,
			success: function(response){
				console.log(response);
			},
			error: function(jq,status,message) {
		        console.log('Error al procesar la solicitud. Status: ' + status + ' - Message: ' + message);
		    }
		});
	});

	function cargarContactos(){
		$.ajax({
			type: "GET",
			url: "contacto",
			success: function(response){
				var article, style;
				data = $.parseJSON(response);
				$.each(data, function(index,item) {
					if(item['avatar'] != 'default.jpg')
						style = "width: 99%;height: 145px;background:url('"+item['avatar']+"') no-repeat center center;background-size:cover;position:absolute;z-index: -1;";
					article = '<article class="contacto" data-id="'+item['contacto_id']+'" data-toggle="modal" data-target="#modalPerfil" ><figure class="contacto-bg" style="'+style+'"></figure><h3>'+item['nombre']+'</h3><p>'+item['grupo']+'</p></article>';
					$('#babylongrid').append(article);
				});
				$('#babylongrid').trigger('babylongrid:load');
				$('.contacto-bg').foggy();
			},
			error: function(jq,status,message) {
		        console.log('Error al procesar la solicitud. Status: ' + status + ' - Message: ' + message);
		    }
		});
	}	

	function cargarPerfil(){
		$.ajax({
			url: "auth",
			success: function(response){
				twitter = $.parseJSON(response);
				$('#session').html('<img src="'+twitter['photoURL']+'" class="avatar-session"><p>'+twitter['displayName']+'</p><p><a href="auth/logout">Cerrar sesión</a></p>');
			},
			error: function(jq,status,message) {
		        console.log('Error al procesar la solicitud. Status: ' + status + ' - Message: ' + message);
		    }
		});
	}
	
	$('#perfil-comentario').click(function(){
		tabs('.content-2');
		$('#comentarios p').css('visibility', 'visible');
	});

	$('#perfil-email').click(function(){
		tabs('.content-3');
	});
		
	$('#perfil-eliminar').click(function(){
		tabs('.content-5');
	});

	function tabs(selected){
		$('.tab').removeClass('perfil-activo');
		$(selected).addClass('perfil-activo');
	}

	function reloadGrupos(){
		$.ajax({
			url: "grupo",
			success: function(response){
				data = $.parseJSON(response);
				$.each(data, function(index,item) {
					$('#grupo_id').append('<option value="'+item['grupo_id']+'">'+item['nombre']+'</option>');
				});
			},
			error: function(jq,status,message) {
		        console.log('Error al procesar la solicitud. Status: ' + status + ' - Message: ' + message);
		    }
		});
	}

	$('#fileupload').fileupload({
        url: '/vendor/fileupload/',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('#urlAvatar').val('/vendor/fileupload/files/'+file.name);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    });

    $('#enviar-comentario').click(function(e){
    	var data = $('#comentariosContacto').serialize();
    	var id = $('#id_contacto').val();
    	$.ajax({
			url: "comment",
			method: "POST",
			data: data,
			success: function(response){
				$('#comentario').val('');
				$('#comentarios').html('');
				$('#comentarios').css('visibility', 'visible');
				$.ajax({
					type: "GET",
					url: "comment/contacto/",
					data: "contacto_id="+id+"&usuario_id=1",
					success: function(response){
						data = $.parseJSON(response);
						console.log(data);
						$.each(data, function(index,item) {
							$('#comentarios').append('<p class="bubble">'+item['comentario']+'</p>');
						});
					},
					error: function(jq,status,message) {
				        console.log('Error al procesar la solicitud. Status: ' + status + ' - Message: ' + message);
				    }
				});
			},
			error: function(jq,status,message) {
		        console.log('Error al procesar la solicitud. Status: ' + status + ' - Message: ' + message);
		    }
		});
    });

	$('#crearContacto').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                    },
                    stringLength: {
                        min: 3,
                        max: 30
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'Solamente se permiten letras'
                    }
                }
            },
            apellidos: {
                validators: {
                    notEmpty: {
                    },
                    stringLength: {
                        min: 5,
                        max: 30
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'Solamente se permiten letras'
                    }
                }
            },
            telefono: {
                validators: {
                    notEmpty: {
                    },
                    stringLength: {
                        min: 12,
                        max: 12
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                    },
                    emailAddress: {
                    }
                }
            }
        }
    });

	$('#babylongrid').babylongrid({
		scheme: [
           {
               minWidth: 960,
               columns: 3
           },
           {
               minWidth: 400,
               columns: 2
           },
           {
               minWidth: 0,
               columns: 1
           }
       ]
	});
});