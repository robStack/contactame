<?php
	class Comment extends Controller{

		public function index(){
			$data = array('contacto_id' => $_POST['contacto_id'], 'usuario_id' => $_POST['usuario_id'], 'comentario' => $_POST['comentario']);
			$comments = $this->model->createComment($data);
			View::jsonencode($comments);
		}

		public function contacto(){
			$contacto_id = $_GET['contacto_id'];
			$usuario_id = $_GET['usuario_id'];
			$comments = $this->model->getComments($contacto_id, $usuario_id);
			View::jsonencode($comments);
		}
	}