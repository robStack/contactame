<?php
	class Grupo extends Controller{

		public function index(){
			$contactos = $this->model->getGrupos();
			View::jsonencode($contactos);
		}
	}