<?php
	class Auth extends Controller{
		public function __construct(){
			session_start();
		}

		public function index(){
			echo $_SESSION['user'];
		}
		public function twitter(){
			header('Location: http://contactame.cloudapp.net/vendor/hybridauth/login.php?provider=twitter');
		}

		public function facebook(){
			header('Location: http://contactame.cloudapp.net/vendor/hybridauth/login.php?provider=facebook');
		}

		public function google(){
			header('Location: http://contactame.cloudapp.net/vendor/hybridauth/login.php?provider=google');
		}

		public function logout(){
			session_destroy();
			header('Location: http://contactame.cloudapp.net/');
		}
	}