<?php
	class Dashboard extends Controller{
		public function __construct(){
			session_start();
		}

		public function index(){
			View::render('dashboard/index');
		}
	}