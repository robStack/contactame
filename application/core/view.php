<?php
	class View {
		public $template;
		public static function render($template){
			require APP .'views/'.$template.'.php';
		}

		public static function jsonencode($data){
			echo json_encode($data);
		}
	}