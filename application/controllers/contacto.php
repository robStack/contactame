<?php
	class Contacto extends Controller{

		public function index(){
			session_start();
			$session = json_decode($_SESSION['user'], true);
			$provider = $_SESSION['provider'];
			$this->model->createUsuario($session, $provider);
			$contactos = $this->model->getContactos();
			View::jsonencode($contactos);
		}

		public function read($id){
			$contactos = $this->model->getContacto($id);
			View::jsonencode($contactos);
		}

		public function create(){
			if(isset($_POST['usuario_id'])) {
				$data = array('nombre' => $_POST['nombre'], 
							'apellidos' => $_POST['apellidos'], 
							'telefono' => $_POST['telefono'], 
							'email' => $_POST['email'], 
							'grupo_id' => $_POST['grupo_id'], 
							'avatar' => $_POST['avatar'], 
							'favorito' => '0', 
							'usuario_id' => $_POST['usuario_id']);
				$contactos = $this->model->createContacto($data);
			}
			else{
				$contactos = array('3' => 'Debe ingresar la información del contacto');
			}
			View::jsonencode($contactos);
		}

		public function update(){
			if(isset($_POST['contacto_id'])) {
				$data = array('nombre' => $_POST['nombre'], 
							'apellidos' => $_POST['apellidos'], 
							'telefono' => $_POST['telefono'], 
							'email' => $_POST['email'], 
							'grupo_id' => $_POST['grupo_id'], 
							'avatar' => $_POST['avatar'],
							'contacto_id' => $_POST['contacto_id']);
				$contactos = $this->model->updateContacto($data);
			}
			else{
				$contactos = array('3' => 'Debe ingresar la información del contacto');
			}		
			View::jsonencode($contactos);
		}

		public function delete($id){
			$contactos = $this->model->deleteContacto($id);
			View::jsonencode($contactos);
		}


	}