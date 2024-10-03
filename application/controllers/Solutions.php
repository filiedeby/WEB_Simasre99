<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Solutions extends CI_Controller {

		function __construct() {
			parent::__construct();
			
			
		$this->load->model("M_main");
		}

		
		public function index() {
			$data['c_info'] = $this->M_main->get_infoheader();
			$data['c_claimjdl'] = $this->M_main->get_flowclmjudul();
			$data['c_mn'] = $this->M_main->get_menu();
			$data['c_mndet'] = $this->M_main->get_menudetail();
			$data['c_komitmen'] = $this->M_main->get_komitmen();
			$data['c_testi'] = $this->M_main->get_testi();
			$data['c_kkon'] = $this->M_main->get_kontakkonten();
			$data['c_lks'] = $this->M_main->get_lokasi();
			$this->load->view('solution', $data);
		}
		
	}
