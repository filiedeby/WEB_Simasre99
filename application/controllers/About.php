<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class About extends CI_Controller {

		function __construct() {
			parent::__construct();
			
			
		$this->load->model("M_main");
		$this->load->library('email');
		}

		
		public function index() {
			$data['c_info'] = $this->M_main->get_infoheader();
			$data['c_claimjdl'] = $this->M_main->get_flowclmjudul();
			$data['c_mn'] = $this->M_main->get_menu();
			$data['c_mndet'] = $this->M_main->get_menudetail();
			$data['c_visimisi'] = $this->M_main->get_visimisi();
			$data['c_judulbod'] = $this->M_main->get_judulbod();
			$data['c_bod'] = $this->M_main->get_bod();
			$data['c_csrjdl'] = $this->M_main->get_csrjdl();
			$data['c_csr'] = $this->M_main->get_csr();
			$data['c_logo'] = $this->M_main->get_logo();
			$data['c_value'] = $this->M_main->get_nilai();
			$data['c_kkon'] = $this->M_main->get_kontakkonten();
			$data['c_lks'] = $this->M_main->get_lokasi();
			$this->load->view('about', $data);
		}
		
		public function sendmail() {
			
			$user = $_POST['name'];
			$mail = $_POST['email'];
			$telp = $_POST['phone'];
			$pesan = $_POST['message'];
			
			date_default_timezone_set('Asia/Jakarta');
			// $smtp_host="ssl://smtp.gmail.com";
			// $email_pengirim = 'filiedeborah@gmail.com';
			// $config = Array(
			// 'protocol' => 'smtp',
			// 'smtp_host' => $smtp_host,
			// 'smtp_port' => 465,
			// 'smtp_user' => $email_pengirim,
			// 'smtp_pass' => 'Poiuyt_123!',
			// 'mailtype'  => 'html', 
			// 'charset'   => 'iso-8859-1',
			// 'smtp_timeout' => 300,
			// 'wordwrap' => TRUE,
			// 'validation' => TRUE,
			// );
			
			
			$smtp_host="ssl://smtp.gmail.com";
			$fromEmail 	= 'noreply@daidan.co.id';
			$email_pass = '';
			$fromName 	= 'Anda mendapat email dari Web Kontak DAIDAN';


			$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => $smtp_host,
			'smtp_port' => 465,
			'smtp_user' => $fromEmail,
			'smtp_pass' => $email_pass,
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'wordwrap' => TRUE,
			'validation' => TRUE,
			);

			
				$this->load->library('email', $config);
				$this->load->library('user_agent');
				$this->email->initialize($config);

				// Email dan nama pengirim
				$this->email->from('noreply@daidan.co.id', 'Daidan Mail');

				// Email penerima
				$this->email->to($mail); // Ganti dengan email tujuan

				// Subject email
				$this->email->subject($fromName);

				// Isi email
				$this->email->message("Nama : ".$user."<br/>No Telp :".$telp."<br/>pesan : ".$pesan."");

				// Tampilkan pesan sukses atau error
				if ($this->email->send()) {
				// echo 'Sukses! email berhasil dikirim.';
				$cekdata = "sukses";
				$this->session->set_flashdata('msg_nya', 'Email Success Sending!');
				
				} else {
				// echo 'Error! email tidak dapat dikirim.';
				$cekdata = "error";
				$this->session->set_flashdata('msg_nya', 'Email Failed Sending!');
				// echo $this->email->print_debugger();
				}
				
				redirect(base_url('about#location'));
		}
		
		
		
	}
