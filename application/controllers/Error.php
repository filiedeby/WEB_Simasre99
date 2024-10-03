<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Error extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->helper(array('form', 'url', 'file'));
			date_default_timezone_set("Asia/Jakarta");
			$this->load->helper('bbcode');
		}

		public function index(){
			$this->load->view('404');
			die;
		}
	}	
