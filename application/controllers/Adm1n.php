<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class adm1n extends CI_Controller {

		function __construct() {
			parent::__construct();

			$this->load->model("M_admin");
			$this->load->model("M_images");
			$this->load->helper(array('form', 'url', 'file'));
			date_default_timezone_set("Asia/Jakarta");
			$this->load->helper('bbcode');
		}

		public function index(){
			$this->load->view('admin/adm-login');
		}
		
		function aksi_login(){

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				//level head harus di custom manual untuk cek namanya dan status nya
				if ($username == 'headhrd') {
					$user_level = "hed";
				}
				else{
				$user_level = "adm";
				}

				$key = "gdfgv345gfdfgdfgdfye56etergdydrery45ty45t456";
				// var_dump($key);
					function enkripPassword($password, $key) {
						// Menggunakan algoritma SHA-256 untuk hashing dengan HMAC
						$password = md5($password);
						$hashedPassword = hash_hmac('sha256', $password, $key);
						$hashedPassword = base64_encode($key . $hashedPassword);
						return $hashedPassword;
					}

					function validasiKatasandi($password, $passDb, $key) {
						// Hash ulang password yang diinputkan dengan key yang sama
						$newHash = enkripPassword($password, $key);
						
						if ($newHash === $passDb) {
							// Password benar
							return true;
						} else {
							// Password salah
							return false;
						}
					}

				// --------------------------------------------------------- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
				$inisiasidtUser = $this->M_admin->ambil_user($username);

				$passUsr 	= $inisiasidtUser->username;
				$passDb 	= $inisiasidtUser->password;
				$passLv 	= $inisiasidtUser->user_level;
				$passSt 	= $inisiasidtUser->stat;
				// var_dump($inisiasidtUser);

				// var_dump($username);	
				// var_dump($password);	
				// var_dump($key);	

				$encPassword = enkripPassword($password, $key);
				$cek = validasiKatasandi($encPassword, $passDb, $key);

				// Cek apakah user ditemukan dan user_level serta status sesuai
				if ($inisiasidtUser && $passLv == 'adm' && $passSt == 'y') {
					// Verifikasi password

					if (validasiKatasandi($password, $passDb, $key)) {
						// Password sesuai, set session
						$this->session->set_userdata('username', $passUsr);
						$this->session->set_userdata('user_level', $passLv);
						if ($user_level=='hed'){
							$level = 'Head';	
							}else {
								$level = 'Administrator';
							}
								$data_session = array(
								'username' => $username,
								'welcome' => "Selamat Datang",
								'status' => "log-In",
								'level'=> $level
								);				
						
						// echo "saya berhasil login - saya ke beranda";
						$this->session->set_userdata('data_seslogin', $data_session);
						redirect(base_url("admin/beranda"));
					} else {
						// Password tidak sesuai
						// echo "Password tidak valid";
						$this->session->set_flashdata('userinvalid','Username / Password Salah !!!');
						redirect(base_url("admin"));
					}
				} else {
					// User tidak ditemukan atau user_level/status tidak sesuai
					$this->session->set_flashdata('userinvalid', 'Username atau password salah, atau akun tidak memiliki hak akses.');
					redirect(base_url("admin"));
					echo "Username atau password salah, atau akun tidak memiliki hak akses";
				}

				// --------------------------------------------------------- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
			
		}
			
		
		function logout(){
			$this->session->sess_destroy();
			$this->session->set_flashdata('logout', 'Anda Berhasil Log Out.');
			redirect(base_url('adm1n/index'));
		}
		
		function beranda(){
				if(isset($this->session->userdata['data_seslogin'])){
				$this->load->view('admin/adm-index');
				}
				else{
				redirect(base_url("admin/index"));
				}

		}

		///////////MENU HOME - INFO ///////////
	
		function mn1a(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Data history";
				$data['c_history'] = $this->M_admin->get_history();
				$this->load->view('admin/adm-head', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function edithistory(){
			$id = $this->uri->segment(3);
			// var_dump($id);
			
			// die();
			$data["title"] = "Edit Data History";
			
			
			
			$where = array('id_history' => $id);
			$data['historyedit'] = $this->M_admin->edit_datahistory($where,'history')->result();
			
			$this->load->view('admin/adm-edithistory',$data);
		}	
		
		function tambah(){
		$this->load->view('v_input');
		}

		function updatehistory(){
			$id = $this->input->post('id');
			$judul = $this->input->post('judul');
			$kontak = $this->input->post('kontak');
			$bhs = $this->input->post('bhs');
		 
			$data = array(
				'title' => $judul,
				'isi' => $kontak,
				'bahasa' => $bhs
			);
		 
			$where = array(
				'id_history' => $id
			);
		 
			$this->M_admin->update_datahistory($where,$data,'history');
			
			$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center hide-it" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
			<p class="mb-0 flex-1">Data Berhasil di simpan!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/mn1a');
		}
		


		function hapus($id){
		$where = array('id_info' => $id);
		$this->M_admin->hapus_data($where,'infoheader');
		redirect('admin/mn1a');
		}
		
///////////MENU HOME - flow claim ///////////
		
		function flmn1c(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Data Flow Claims";
				$data['c_clm'] = $this->M_admin->get_flowclmjudul();
				$this->load->view('admin/adm-flowclm', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		public function cek_uploadclm(){
		$data['c_clm'] = $this->M_admin->get_flowclmjudul();	
		$this->load->view('admin/adm-uploadclm', array('error' => ' ' ));
		}
	
	function editclm(){
			$id = $this->uri->segment(3);
			//die();
			$data["title"] = "Edit Data Flow Claims";
			
			
			
			$where = array('id_claim' => $id);
			$data['infoedit'] = $this->M_admin->edit_datainfo($where,'flow_claim')->result();		  
			$this->load->view('admin/adm-uploadclm',$data);
	}	
		
	public function aksi_insertfrmclm()
	{
			
		$id 			= $this->input->post('id');
		$judul   		= $this->input->post('judul');
		$point   		= $this->input->post('point');
		$bhs 			= $this->input->post('bhs');
		$isi  			= $this->input->post('isi');
		$data_upload   	= $this->input->post('berkas');
		$st  	= 'akt';
		
		
		

		$today = date("Y-m-d_H-i-s");
		$e_nama = str_replace(' ', '_', $point);
		$config['upload_path']          = 'assets/images/klaim/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 1000000;
		$config['max_width']            = 102400;
		$config['max_height']           = 76800;
		$config['file_name'] 			= $today.'_'.$e_nama;
		

		

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

			// if (!$this->upload->do_upload('berkas')){
			// $error = array('error' => $this->upload->display_errors());
			// //var_dump('data gagal');
			// }else{
			// $data = array('upload_data' => $this->upload->data());
			// //var_dump('data terkirim');
			// }
		
										
					if ($this->upload->do_upload('berkas')) {								
						$data = array(
							 
							 'judul'	=>  $judul,
							 'point'	=>  $point,
							 'isi_kontak'=>  $isi,
							 'image'  => $this->upload->data('file_name'),
							 'bahasa'=>  $bhs,
							 'status'  => $st,
						 );

		 
						$where = array(
							'id_claim'	=> $id
						);
		 
						$this->M_admin->update_dataclm($where,$data,'flow_claim');
							 

					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn1c');
					}else {
						
					$error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data gagal di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn1c');	
					}

		//header ("Connection: close");	
		

	}
	
		///////////MENU HOME - sliderx ///////////
		
		function mn1b(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Data Slide Show";
				$data['c_sliderx'] = $this->M_admin->get_sliderx();
				$this->load->view('admin/adm-sliderx', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function tambahsliderx(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Tambah Data Slide Show";
				$this->load->view('admin/adm-tambahsliderx', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function edit_statussliderx(){
			$id = $this->uri->segment(3);	
			$stat = $this->uri->segment(4);	
			$date = date('d F Y, h:i:s A');
			// var_dump($id);
			// var_dump($stat);
			// die();
					
		 
			$data = array(
				'status' 	=> $stat,
				'date'		=> $date
			);
		 
			$where = array(
				'id_slider' => $id
			);
		 
			$updatestatus = $this->M_admin->update_statussliderx($where,$data,'slider');
			
				if (!isset($updatestatus)){
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn1b');
						}else {
						// $error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				
						redirect('admin/mn1b');		
				}
		}

		
		public function simpansliderx(){
			
			$date = date('d F Y, h:i:s A');
			$isi1  			= $this->input->post('isi1');
			$isi2  			= $this->input->post('isi2');
			$bhs 			= $this->input->post('bhs');
			$data_upload   	= $this->input->post('berkasdata');
			$st  			= 'akt';
			
			
			
			$today = date("Y-m-d_H-i-s");
			$e_nama = str_replace(' ', '_', $bhs);
			$config['upload_path']          = './assets/images/header/';
			$config['allowed_types']        = 'jpeg|jpg|png';
			$config['max_size']             = 1000000;
			$config['max_width']            = 102400;
			$config['max_height']           = 76800;
			$config['file_name'] 			= $today.'_'.$e_nama;

				// var_dump($date);
				// var_dump($linkurl);
				// var_dump($bhs);
				// var_dump($config['file_name']);
				// var_dump($st);
				// die();
				
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			
			if ($this->upload->do_upload('berkasdata')) {								
						$data = array(
							 
							 'images'  	=> $this->upload->data('file_name'),
							 'content1'	=> $isi1,
							 'content2'	=> $isi2,
							 'bahasa'	=> $bhs,
							 'status'  	=> $st,
							 'date'  	=> $date
						);
				
				$this->M_admin->insert_sliderx($data,'slider');
				
				$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
				<p class="mb-0 flex-1">Data BERHASIL di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn1b');
			}else {
					
				$error = array('error' => $this->upload->display_errors());	
				$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
				<p class="mb-0 flex-1">Data gagal di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn1b');	
			}
				
			

		}
		
		
		public function cek_uploadsliderx(){
		$data['c_sliderx'] = $this->M_admin->get_sliderx2();	
		$this->load->view('admin/adm-uploadsliderx', array('error' => ' ' ));
		}
	
		public function editsliderx(){
				$id = $this->uri->segment(3);
				//die();
				$data["title"] = "Edit Data Flow slider";
				
				
				
				$where = array('id_slider' => $id);
				$data['c_sliderx'] = $this->M_admin->edit_sliderx($where,'slider')->result();		  
				$this->load->view('admin/adm-uploadsliderx',$data);
		}	
			
		public function aksi_insertsliderx()
		{
				
			$id 			= $this->input->post('id');
			$isi1  			= $this->input->post('isi1');
			$isi2  			= $this->input->post('isi2');
			$bhs 			= $this->input->post('bhs');
			$data_upload   	= $this->input->post('berkasdata');
			$st  			= 'akt';
			
	
			$today = date("Y-m-d_H-i-s");
			$e_nama = str_replace(' ', '_', $bhs);
			$config['upload_path']          = './assets/images/header/';
			$config['allowed_types']        = 'jpeg|jpg|png';
			$config['max_size']             = 1000000;
			$config['max_width']            = 102400;
			$config['max_height']           = 76800;
			$config['file_name'] 			= $today.'-'.$e_nama;
			

			
		
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

											
						if ($this->upload->do_upload('berkasdata')) {								
							$data = array(

								 'images'  	=> $this->upload->data('file_name'),
								 'content1'	=> $isi1,
								 'content2'	=> $isi2,
								 'bahasa'	=> $bhs,
								 'status'  	=> $st,
							 );

			 
							$where = array(
								'id_slider'	=> $id
							);
			 
							$this->M_admin->update_datasliderx($where,$data,'slider');
								 

						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data BERHASIL di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn1b');
						}else {
							
						$error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data gagal di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn1b');	
						}


		}

		function hapussliderx(){
			$id = $this->uri->segment(3);
			$where = array('id_slider' => $id);
			$hapus = $this->M_admin->hapus_datasliderx($where,'slider');
			
			if (!isset($hapus)){
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di DIHAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn1b');
					}else {
					// $error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data GAGAL di HAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			
			redirect('admin/mn1b');	
			}
		}
		

///////////MENU HOME - iconpro ///////////
		
		function mn1c(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Data Icon Product";
				$data['c_iconpro'] = $this->M_admin->get_iconpro();
				$this->load->view('admin/adm-iconpro', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function tambahiconpro(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Tambah Data Icon Product";
				$this->load->view('admin/adm-tambahiconpro', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function edit_statusiconpro(){
			$id = $this->uri->segment(3);	
			$stat = $this->uri->segment(4);	
			$date = date('d F Y, h:i:s A');
			// var_dump($id);
			// var_dump($stat);
			// die();
					
		 
			$data = array(
				'status' 	=> $stat,
				'date'		=> $date
			);
		 
			$where = array(
				'id' => $id
			);
		 
			$updatestatus = $this->M_admin->update_statusiconpro($where,$data,'icon_product');
			
				if (!isset($updatestatus)){
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn1c');
						}else {
						// $error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				
						redirect('admin/mn1c');		
				}
		}

		
		public function simpaniconpro(){
			
			$date = date('d F Y, h:i:s A');
			$isi1  			= $this->input->post('isi1');
			$isi2  			= $this->input->post('isi2');
			$bhs 			= $this->input->post('bhs');
			$data_upload   	= $this->input->post('berkasdata');
			$st  			= 'akt';
			
			
			
			$today = date("Y-m-d_H-i-s");
			$e_nama = str_replace(' ', '_', $bhs);
			$config['upload_path']          = './assets/images/header/';
			$config['allowed_types']        = 'jpeg|jpg|png';
			$config['max_size']             = 1000000;
			$config['max_width']            = 102400;
			$config['max_height']           = 76800;
			$config['file_name'] 			= $today.'_'.$e_nama;

				// var_dump($date);
				// var_dump($linkurl);
				// var_dump($bhs);
				// var_dump($config['file_name']);
				// var_dump($st);
				// die();
				
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			
			if ($this->upload->do_upload('berkasdata')) {								
						$data = array(
							 
							 'images'  	=> $this->upload->data('file_name'),
							 'content1'	=> $isi1,
							 'content2'	=> $isi2,
							 'bahasa'	=> $bhs,
							 'status'  	=> $st,
							 'date'  	=> $date
						);
				
				$this->M_admin->insert_iconpro($data,'icon_product');
				
				$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
				<p class="mb-0 flex-1">Data BERHASIL di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn1c');
			}else {
					
				$error = array('error' => $this->upload->display_errors());	
				$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
				<p class="mb-0 flex-1">Data gagal di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn1c');	
			}
				
			

		}
		
		
		public function cek_uploadiconpro(){
		$data['c_iconpro'] = $this->M_admin->get_iconpro2();	
		$this->load->view('admin/adm-uploadiconpro', array('error' => ' ' ));
		}
	
		public function editiconpro(){
				$id = $this->uri->segment(3);
				//die();
				$data["title"] = "Edit Data Icon Product";
				
				
				
				$where = array('id' => $id);
				$data['c_iconpro'] = $this->M_admin->edit_iconpro($where,'icon_product')->result();		  
				$this->load->view('admin/adm-uploadiconpro',$data);
		}	
			
		public function aksi_inserticonpro()
		{
				
			$id 			= $this->input->post('id');
			$title  		= $this->input->post('title');
			$ico  			= $this->input->post('codeico');
			$isi  			= $this->input->post('isi');
			$url  			= $this->input->post('urlicon');
			$bhs 			= $this->input->post('bhs');
			$st  			= 'akt';
			$today 			= date("Y-m-d_H-i-s");
			

		


											
											
							$data = array(

								 'icon'		=> $ico,
								 'title'	=> $title,
								 'isi'		=> $isi,
								 'url'		=> $url,
								 'bahasa'	=> $bhs,
								 'status'  	=> $st,
								 'date'  	=> $today
							 );

			 
							$where = array(
								'id'	=> $id
							);
						
						$simpandt = $this->M_admin->update_dataiconpro($where,$data,'icon_product');
						if(!isset($simpandt)){
						
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data BERHASIL di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn1c');
						}else {
							
						$error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data gagal di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn1c');	
						}


		}

		function hapusiconpro(){
			$id = $this->uri->segment(3);
			$where = array('id' => $id);
			$hapus = $this->M_admin->hapus_dataiconpro($where,'icon_product');
			
			if (!isset($hapus)){
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di DIHAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn1c');
					}else {
					// $error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data GAGAL di HAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			
			redirect('admin/mn1c');	
			}
		}




///////////MENU - cob ///////////
		
		function mn3a(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Data COB";
				$data['c_cob'] = $this->M_admin->get_cob();
				$this->load->view('admin/adm-cob', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function tambahcob(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Tambah Data COB";
				$this->load->view('admin/adm-tambahcob', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function edit_statuscob(){
			$id = $this->uri->segment(3);	
			$stat = $this->uri->segment(4);	
			$date = date('d F Y, h:i:s A');
			// var_dump($id);
			// var_dump($stat);
			// die();
					
		 
			$data = array(
				'status' 	=> $stat,
				'date'		=> $date
			);
		 
			$where = array(
				'id_cob' => $id
			);
		 
			$updatestatus = $this->M_admin->update_statuscob($where,$data,'cob');
			
			// var_dump($updatestatus);
			// die();
			
				if (!isset($updatestatus)){
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn3a');
						}else {
						// $error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				
						redirect('admin/mn3a');		
				}
		}

		
		
		
		
		public function cek_uploadcob(){
		$data['c_cob'] = $this->M_admin->get_cob2();	
		$this->load->view('admin/adm-uploadcob', array('error' => ' ' ));
		}
	
		public function editcob(){
				$id = $this->uri->segment(3);
				//die();
				$data["title"] = "Edit Data COB";
				
				
				
				$where = array('id_cob' => $id);
				$data['c_cob'] = $this->M_admin->edit_cob($where,'cob')->result();		  
				$this->load->view('admin/adm-uploadcob',$data);
		}	
			
		public function aksi_insertcob()
		{
				
			$id 			= $this->input->post('id');
			$produk  		= $this->input->post('title');
			$detail  		= $this->input->post('isi');
			$url  			= $this->input->post('url');
			$bhs 			= $this->input->post('bhs');
			$st  			= 'akt';
			$today 			= date("Y-m-d_H-i-s");
			
			
			
	
							$data = array(

								 'produk'	=> $produk,
								 'detail'	=> $detail,
								 'url'		=> $url,
								 'bahasa'	=> $bhs,
								 'status'  	=> $st,
								 'date'  	=> $today
							 );

			 
							$where = array(	
							'id_cob' => $id	
							);
		 
			$updatecob = $this->M_admin->update_statuscob($where,$data,'cob');
	
			
				if (!isset($updatecob)){

						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data BERHASIL di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn3a');
						}else {
							
						$error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data gagal di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn3a');	
						}


		}

		function hapuscob(){
			$id = $this->uri->segment(3);
			$where = array('id' => $id);
			$hapus = $this->M_admin->hapus_datacob($where,'cob');
			
			if (!isset($hapus)){
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di DIHAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn3a');
					}else {
					// $error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data GAGAL di HAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			
			redirect('admin/mn3a');	
			}
		}



///////////MENU - cedant ///////////
		
		function mn3b(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$db = 'support_cedant';
				$data["title"] = "Data Supported Cedant";
				$data['c_cedant'] = $this->M_admin->get_cedant();
				$data['images'] = $this->M_images->get_images_scedant();
				$this->load->view('admin/adm-cedant', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		// ------------------------------------------------------start --- gbr --------------------------------
		
		
		public function do_upload_cdn() {

        $config['upload_path']          = './assets/gbrupload/';
        $config['allowed_types']        = 'jpeg|jpg|png|webm';
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);


        if ( ! $this->upload->do_upload('logo')) {
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('upload_form', $error);
			$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
			<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('admin/mn3b');		

        } else {

            $data = array('upload_data' => $this->upload->data());

            // Insert data into database
            $this->db->insert('support_cedant', array(
				'bahasa'			=> $this->input->post('bhs'),
				'status'  			=> 'akt',
				'date'  			=> date('d F Y, h:i:s A'),
                'asuransi' 			=> $this->input->post('insurance'),
                'link_perusahaan' 	=> $this->input->post('url'),
                'upload_cedant' 	=> $data['upload_data']['file_name']

            ));


            // $this->load->view('upload_success', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
			<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/mn3b');


        }

    }


    public function update_upload_cdn() {

        $config['upload_path']          = './assets/gbrupload/';
        $config['allowed_types']        = 'jpeg|jpg|png|webm';
        $config['max_size']             = 1024;


        $this->load->library('upload', $config);


        if ( ! $this->upload->do_upload('logo')) {
            $error = array('error' => $this->upload->display_errors());
			// $this->load->view('upload_form', $error);
				$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
				<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn3b');			
			
        } else {
            $data = array('upload_data' => $this->upload->data());
            // Update database with new upload data
            $this->db->update('support_cedant', array(
				'bahasa'			=> $this->input->post('bhs'),
				'status'  			=> 'akt',
				'date'  			=> date('d F Y, h:i:s A'),
                'asuransi' 			=> $this->input->post('insurance'),
                'link_perusahaan' 	=> $this->input->post('url'),
                'upload_cedant' 	=> $data['upload_data']['file_name']

            ), array('id' => $this->input->post('id')));


            // $this->load->view('upload_success', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
			<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/mn3b');

        }

    }
	// =============================================ceedqant baru ============================================
	
		// public function upload_supportc() {
        // $this->load->library('upload');

			// if ($this->input->post('submit')) {
				// $config['upload_path'] = '.assets/gbrupload/';
				// $config['allowed_types'] = 'jpg|jpeg|png';
				// $config['max_size'] = 2048;

				// $this->upload->initialize($config);

				// if (!$this->upload->do_upload('image')) {
					// $data['error'] = $this->upload->display_errors();
					// $this->load->view('image/form', $data);
				// } else {
					// $upload_data = $this->upload->data();
					// $data = array(
						// 'filename' => $upload_data['file_name']
					// );

					// $this->image_model->create_image($data);
					// redirect('admin/mn3b');
				// }
			// } else {
				// // $this->load->view('image/form');
				// // $this->load->view('image/form');
					// redirect('admin/tambahcedant');

			// }
		// }

		public function delete_supportc($id) {
			if ($this->M_images->delete_image_scedant($id)) {
				redirect('admin/mn3b');
			} else {
				// show_error('Failed to delete image');
				redirect('admin/mn3b');
			}
		}
		
		// ------------------------------------------------------end --- gbr --------------------------------
		
		
		
		// ------------------------------------------------------ reinsurance --------------------------------
		function tambahreins(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Tambah Data Reinsurance";
				$data['c_reins'] = $this->M_admin->get_country();
				$this->load->view('admin/adm-tambahreins', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		
		public function simpan_reins() {

        $config['upload_path']          = './assets/gbrupload/';
        $config['allowed_types']        = 'jpeg|jpg|png|webm|svg';
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);


        if ( ! $this->upload->do_upload('logo')) {
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('upload_form', $error);
			$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
			<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('admin/mn3c');		

        } else {

            $data = array('upload_data' => $this->upload->data());

            // Insert data into database
            $this->db->insert('support_reins_ins', array(
				'stat'  			=> 'akt',
				'date'  			=> date('d F Y, h:i:s A'),
                'id_country' 		=> $this->input->post('negara'),
                'insurance' 		=> $this->input->post('insurance'),
                'upload_ins' 	=> $data['upload_data']['file_name']

            ));


            // $this->load->view('upload_success', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
			<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/mn3c');


        }

    }
	
	public function edit_reins(){
		if(isset($this->session->userdata['data_seslogin'])){
			$id = $this->uri->segment(3);
			$data["title"] = "Edit Data Reinsurance";
			$data['c_reins'] = $this->M_admin->get_country();
			$data['c_ins'] = $this->M_admin->get_edit_reas($id);	
			$this->load->view('admin/adm-editedreins', $data);
		}
		else{
		redirect(base_url("admin/index"));
		}
	
	}	

		
		
		
		// ------------------------------------------------------ cedant --------------------------------
		
		
		function tambahcedant(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Tambah Data Supported Cedant";
				$this->load->view('admin/adm-tambahcedant', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function edit_statuscedant(){
			$id = $this->uri->segment(3);	
			$stat = $this->uri->segment(4);	
			$date = date('d F Y, h:i:s A');
			// var_dump($id);
			// var_dump($stat);
			// die();
					
		 
			$data = array(
				'status' 	=> $stat,
				'date'		=> $date
			);
		 
			$where = array(
				'id' => $id
			);
		 
			$updatestatus = $this->M_admin->update_statuscedant($where,$data,'support_cedant');
			
				if (!isset($updatestatus)){
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn3b');
						}else {
						// $error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				
						redirect('admin/mn3b');		
				}
		}
		
		

		
		// public function simpancedant(){
			
			// $date 			= date('d F Y, h:i:s A');
			// $ins  			= $this->input->post('insurance');
			// $link  			= $this->input->post('url');
			// $bhs 			= $this->input->post('bhs');
			// $st  			= 'akt';
			
			// // var_dump($date);
			// // var_dump($ins);
			// // var_dump($link);
			// // var_dump($bhs);
			// // var_dump($st);

			// // die();


			
						// $data = array(
							 
							 // 'asuransi'			=> $ins,
							 // 'link_perusahaan'	=> $link,
							 // 'bahasa'			=> $bhs,
							 // 'status'  			=> $st,
							 // 'date'  			=> $date
						// );
				
				// $updatecedant = $this->M_admin->insert_cedant($data,'support_cedant');
				
			// if(!isset($updatecedant)){
				// $this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
				// <p class="mb-0 flex-1">Data BERHASIL di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				// </div>');
				// redirect('admin/mn3b');
			// }else {
					
				// $error = array('error' => $this->upload->display_errors());	
				// $this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
				// <p class="mb-0 flex-1">Data gagal di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				// </div>');
				// redirect('admin/mn3b');	
			// }
				
			

		// }
		
		
		// public function cek_uploadcedant(){
		// $data['c_cedant'] = $this->M_admin->get_cedant2();	
		// $this->load->view('admin/adm-uploadcedant', array('error' => ' ' ));
		// }
	
		public function editcedant(){
				$id = $this->uri->segment(3);
				//die();
				$data["title"] = "Edit Data Supported Cedant";
				
				
				
				$where = array('id' => $id);
				$data['c_cedant'] = $this->M_admin->edit_cedant($where,'support_cedant')->result();		  
				$this->load->view('admin/adm-uploadcedant',$data);
		}	
			
		// public function aksi_insertcedant()
		// {
				
			// $id 			= $this->input->post('id');
			// $date 			= date('d F Y, h:i:s A');
			// $ins  			= $this->input->post('insurance');
			// $link  			= $this->input->post('url');
			// $bhs 			= $this->input->post('bhs');
			// $img 			= $this->input->post('logo');
			// $st  			= 'akt';
			
			// $getid = $this->uri->segment(3);
			
			
			// if ($this->input->post('id') == $getid) {
            // $config['upload_path'] = './assets/gbrupload/';
            // $config['allowed_types'] = 'jpeg|jpg|png';
            // $config['max_size'] = 2048;

            // $this->upload->initialize($config);
			
			// var_dump($this->upload->initialize($config));
			// die();
			

					// if (!$this->upload->do_upload('logo')) {		
						// $error = array('error' => $this->upload->display_errors());	
						// $this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						// <p class="mb-0 flex-1">Data gagal di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						// </div>');
						// redirect('admin/mn3b');	
						
					// } else {
						// $upload_data = $this->upload->data();
						// $data = array(
							// 'filename' => $upload_data['file_name']
						// );

						// // $this->image_model->create_image($data);
						// // redirect('image');
						// $data = array(
							 
							// 'asuransi'			=> $ins,
							// 'link_perusahaan'	=> $link,
							// 'bahasa'			=> $bhs,
							// 'status'  			=> $st,
							// 'date'  			=> $date,
							// 'upload_cedant' => $upload_data['file_name']
						// );
						
						// $where = array(
							// 'id'				=> $id
						// );

						// $simpandt = $this->M_admin->update_datacedant($where,$data,'support_cedant');
						// $this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
								// <p class="mb-0 flex-1">Data BERHASIL di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
								// </div>');
								// redirect('admin/mn3b');
					// }
			
			// } else {
				// // $this->load->view('image/form');
				// redirect('admin/mn3b');
			// }
			
			// // var_dump($id);
			// // var_dump($date);
			// // var_dump($ins);
			// // var_dump($link);
			// // var_dump($bhs);
			// // die();


													
						// // $data = array(
							 
							 // // 'asuransi'			=> $ins,
							 // // 'link_perusahaan'	=> $link,
							 // // 'bahasa'			=> $bhs,
							 // // 'status'  			=> $st,
							 // // 'date'  			=> $date,
							 // // 'upload_cedant' => $upload_data['file_name']
						// // );

			 
							// // $where = array(
								// // 'id'	=> $id
							// // );
						
						// // $simpandt = $this->M_admin->update_datacedant($where,$data,'support_cedant');
						// // if(!isset($simpandt)){
						
						// // $this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						// // <p class="mb-0 flex-1">Data BERHASIL di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						// // </div>');
						// // redirect('admin/mn3b');
						// // }else {
							
						// // $error = array('error' => $this->upload->display_errors());	
						// // $this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						// // <p class="mb-0 flex-1">Data gagal di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						// // </div>');
						// // redirect('admin/mn3b');	
						// // }


		// }

		function hapuscedant(){
			$id = $this->uri->segment(3);
			$where = array('id' => $id);
			$hapus = $this->M_admin->hapus_datacedant($where,'support_cedant');
			if ($hapus) {
					if (file_exists('./assets/gbrupload/' . $image['upload_cedant'])) {
						unlink('./assets/gbrupload/' . $image['upload_cedant']);
					}else{
						return false;
					}
				}
			
			if (!isset($hapus)){
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di DIHAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn3b');
					}else {
					// $error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data GAGAL di HAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			
			redirect('admin/mn3b');	
			}
		}






/////////////////////////////////////////////////////////////SIMASRE END//////////////////////////////////////////////////////////////////////
		
///////////MENU - reinsurance ///////////
		
		function mn3c(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Data Supporting Reinsurance";
				// $data['c_reinsurance'] = $this->M_admin->get_reinsurance();
				$data['c_reinsurance'] = $this->M_admin->get_reas();
				$this->load->view('admin/adm-reinsurance', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function tambahreinsurance(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Tambah Data Supporting Reinsurance";
				$this->load->view('admin/adm-tambahreinsurance', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function edit_statusreinsurance(){
			$id = $this->uri->segment(3);	
			$stat = $this->uri->segment(4);	
			$date = date('d F Y, h:i:s A');
			// var_dump($id);
			// var_dump($stat);
			// die();
					
		 
			$data = array(
				'status' 	=> $stat,
				'date'		=> $date
			);
		 
			$where = array(
				'id' => $id
			);
		 
			$updatestatus = $this->M_admin->update_statusreinsurance($where,$data,'support_reinsurance');
			
				if (!isset($updatestatus)){
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn3c');
						}else {
						// $error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				
						redirect('admin/mn3c');		
				}
		}

		
		public function simpanreinsurance(){
			
			$date 			= date('d F Y, h:i:s A');
			$ins  			= $this->input->post('insurance');
			$link  			= $this->input->post('url');
			$bhs 			= $this->input->post('bhs');
			$st  			= 'akt';
			
			// var_dump($date);
			// var_dump($ins);
			// var_dump($link);
			// var_dump($bhs);
			// var_dump($st);

			// die();


			
						$data = array(
							 
							 'asuransi'			=> $ins,
							 'link_perusahaan'	=> $link,
							 'bahasa'			=> $bhs,
							 'status'  			=> $st,
							 'date'  			=> $date
						);
				
				$updatereinsurance = $this->M_admin->insert_reinsurance($data,'support_reinsurance');
				
			if(!isset($updatereinsurance)){
				$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
				<p class="mb-0 flex-1">Data BERHASIL di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn3c');
			}else {
					
				$error = array('error' => $this->upload->display_errors());	
				$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
				<p class="mb-0 flex-1">Data gagal di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn3c');	
			}
				
			

		}
		
		
		public function cek_uploadreinsurance(){
		$data['c_reinsurance'] = $this->M_admin->get_reinsurance2();	
		$this->load->view('admin/adm-uploadreinsurance', array('error' => ' ' ));
		}
	
		public function editreinsurance(){
				$id = $this->uri->segment(3);
				//die();
				$data["title"] = "Edit Data Supporting Reinsurance";
				
				
				
				$where = array('id' => $id);
				$data['c_reinsurance'] = $this->M_admin->edit_reinsurance($where,'support_reinsurance')->result();		  
				$this->load->view('admin/adm-uploadreinsurance',$data);
		}	
			
		public function aksi_insertreinsurance()
		{
				
			$id 			= $this->input->post('id');
			$date 			= date('d F Y, h:i:s A');
			$negara  		= $this->input->post('negara');
			$reins  		= $this->input->post('reinsurance');
			$gbr 			= $this->input->post('gbr');
			$flags  		= $this->input->post('flags');
			$st  			= 'akt';
			
			// var_dump($id);
			// var_dump($date);
			// var_dump($ins);
			// var_dump($link);
			// var_dump($bhs);
			// die();


													
						$data = array(
							 
							 'negara'		=> $negara,
							 'reinsurance'		=> $reins,
							 'gbr'				=> $gbr,
							 'flags'			=> $flags,
							 'status'  			=> $st,
							 'date'  			=> $date
						);

			 
							$where = array(
								'id'	=> $id
							);
						
						$simpandt = $this->M_admin->update_datareinsurance($where,$data,'support_reinsurance');
						if(!isset($simpandt)){
						
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data BERHASIL di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn3c');
						}else {
							
						$error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data gagal di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn3c');	
						}


		}

		// function hapusreinsurance(){
			// $id = $this->uri->segment(3);
			// $where = array('id' => $id);
			// $hapus = $this->M_admin->hapus_datareinsurance($where,'support_reinsurance');
			
			// if (!isset($hapus)){
					// $this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					// <p class="mb-0 flex-1">Data BERHASIL di DIHAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					// </div>');
					// redirect('admin/mn3c');
					// }else {
					// // $error = array('error' => $this->upload->display_errors());	
					// $this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
					// <p class="mb-0 flex-1">Data GAGAL di HAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					// </div>');
			
			// redirect('admin/mn3c');	
			// }
		// }
		
		
		function hapusreinsurance(){
			$id = $this->uri->segment(3);
			$where = array('id' => $id);
			$hapus = $this->M_admin->hapus_datareinsurance($where,'support_reins_ins');
			if ($hapus) {
					if (file_exists('./assets/gbrupload/' . $image['upload_ins'])) {
						unlink('./assets/gbrupload/' . $image['upload_ins']);
					}else{
						return false;
					}
				}
			
			if (!isset($hapus)){
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di DIHAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn3c');
			}else {
					// $error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data GAGAL di HAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn3c');
			}
		}
		
		
		///////////MENU - visimisi ///////////
		
		function mn4a(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Data visimisi";
				$data['c_visimisi'] = $this->M_admin->get_visimisi();
				$this->load->view('admin/adm-visimisi', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function tambahvisimisi(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Tambah Data visimisi";
				$this->load->view('admin/adm-tambahvisimisi', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function edit_statusvisimisi(){
			$id = $this->uri->segment(3);	
			$stat = $this->uri->segment(4);	
			$date = date('d F Y, h:i:s A');
			// var_dump($id);
			// var_dump($stat);
			// die();
					
		 
			$data = array(
				'status' 	=> $stat,
				'date'		=> $date
			);
		 
			$where = array(
				'id' => $id
			);
		 
			$updatestatus = $this->M_admin->update_statusvisimisi($where,$data,'visimisi');
			
			// var_dump($updatestatus);
			// die();
			
				if (!isset($updatestatus)){
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn4a');
						}else {
						// $error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				
						redirect('admin/mn4a');		
				}
		}

		
		
		
		
		public function cek_uploadvisimisi(){
		$data['c_visimisi'] = $this->M_admin->get_visimisi2();	
		$this->load->view('admin/adm-uploadvisimisi', array('error' => ' ' ));
		}
	
		public function editvisimisi(){
				$id = $this->uri->segment(3);
				//die();
				$data["title"] = "Edit Data visimisi";
				
				
				
				$where = array('id' => $id);
				$data['c_visimisi'] = $this->M_admin->edit_visimisi($where,'visimisi')->result();		  
				$this->load->view('admin/adm-uploadvisimisi',$data);
		}	
			
		public function aksi_insertvisimisi()
		{
				
			$id 			= $this->input->post('id');
			$icon 			= $this->input->post('icon');
			$title  		= $this->input->post('title');
			$detail  		= $this->input->post('isi');
			$bhs 			= $this->input->post('bhs');
			$st  			= 'akt';
			$today 			= date("Y-m-d_H-i-s");
			
			
			
	
							$data = array(

								 'icon'		=> $icon,
								 'title'	=> $title,
								 'isi'		=> $detail,
								 'bahasa'	=> $bhs,
								 'status'  	=> $st,
								 'date'  	=> $today
							 );

			 
							$where = array(	
							'id' => $id	
							);
		 
			$updatevisimisi = $this->M_admin->update_statusvisimisi($where,$data,'visimisi');
	
			
				if (!isset($updatevisimisi)){

						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data BERHASIL di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn4a');
						}else {
							
						$error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data gagal di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn4a');	
						}


		}

		function hapusvisimisi(){
			$id = $this->uri->segment(3);
			$where = array('id' => $id);
			$hapus = $this->M_admin->hapus_datavisimisi($where,'visimisi');
			
			if (!isset($hapus)){
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di DIHAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn4a');
					}else {
					// $error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data GAGAL di HAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			
			redirect('admin/mn4a');	
			}
		}

		///////////MENU - bod ///////////
		
		function mn4b(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Data BOD & Team Lead";
				$data['c_bod'] = $this->M_admin->get_bod();
				$this->load->view('admin/adm-bod', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function tambahbod(){
		
		if(isset($this->session->userdata['data_seslogin'])){
				
			$data["title"] = "Tambah Data BOD & Team Lead";
			$this->load->view('admin/adm-tambahbod', $data);
			}
			else{
			redirect(base_url("admin/index"));
			}
			
		}
		
		public function simpanbod(){
			
		$bhs 			= $this->input->post('bahasa');
		$title  		= $this->input->post('title');
		
		if($title == 'President Commisioner' || $title == 'Commisioner' || $title == 'Presiden Komisaris' || $title == 'Komisaris Utama' || $title == 'Komisaris'){
			$typeky = 'cms';
		}
		else if($title == 'President Director' || $title == 'Director' || $title == 'Associate Director' || $title == 'Direktur Utama' || $title == 'Direktur' || $title == 'Direktur Muda'){
			$typeky = 'bod';
		}		
		else if($title == 'General Manager' || $title == 'Manager' || $title == 'Associate Manager' || $title == 'Manajer Umum' || $title == 'Manajer' || $title == 'Manajer Muda'){
			$typeky = 'lead';
		}
		
		else {
			$typeky = 'staff';
		}
		
		
		
		$key  = $typeky;
		
		if($key == 'cms' && $bhs == 'IDN'){
			$grouptp = 'Jajaran Komisaris';
		} 
		else if($key == 'cms' && $bhs == 'ENG'){
			$grouptp = 'Board of Commisioner';
		} 		
		
		else if($key == 'bod' && $bhs == 'IDN'){
			$grouptp = 'Jajaran Direksi';
		}
		
		else if($key == 'bod' && $bhs == 'ENG'){
			$grouptp = 'Board of Director';
		}
			
		else if($key == 'lead' && $bhs == 'IDN'){
			$grouptp = 'Team Leader';
		}
		
		else if($key == 'lead' && $bhs == 'ENG'){
			$grouptp = 'Lead Team';
		}
		
		else{
			$grouptp = 'SVP/Staff';
		}
		
		
		
		
		$group   		= $grouptp;
		$name  			= $this->input->post('nama');
		
		$det_title  	= $this->input->post('dettitle');
		$data_upload   	= $this->input->post('berkasdata');
		$st  			= 'akt';
		
		
		
		$today = date("Y-m-d_H-i-s");
		$date 							= date('d F Y, h:i:s A');
		// $e_nama 						= str_replace(' ', '_', $name);
		// $config['upload_path']          = 'assets/img/bod/';
		// $config['allowed_types']        = 'jpeg|jpg|png';
		// $config['max_size']             = 1000000;
		// $config['max_width']            = 102400;
		// $config['max_height']           = 76800;
		// $config['file_name'] 			= $today.'_'.$e_nama;

		// $this->load->library('upload', $config);
		// $this->upload->initialize($config);
		
			
			// if ($this->upload->do_upload('berkasdata')) {								
						// $data = array(
							 // 'poto'  		=> $this->upload->data('file_name'),							 
							 // 'typekey'		=> $key,
							 // 'type_group'	=> $grouptp,
							 // 'name'			=> $name,
							 // 'title'		=> $title,
							 // 'det_title'	=> $det_title,
							 // 'bahasa'		=> $bhs,
							 // 'status'  		=> $st,
							 // 'date'  		=> $date
						// );
				
				
				// // var_dump($data);
				// // die();
				
			// // }
			
			
			$data = array(						 
				 'typekey'		=> $key,
				 'type_group'	=> $grouptp,
				 'name'			=> $name,
				 'title'		=> $title,
				 'det_title'	=> $det_title,
				 'bahasa'		=> $bhs,
				 'status'  		=> $st,
				 'date'  		=> $date
			);
			
			// var_dump($data);die();
			
			
			
			
			$simpan = $this->M_admin->insert_bod($data,'team');
			if ($simpan > 0){
				$this->sessiosn->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
				<p class="mb-0 flex-1">Data BERHASIL di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn4b');
			}else {
					
				// $error = array('error' => $this->upload->display_errors());	
				$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
				<p class="mb-0 flex-1">Data gagal di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn4b');	
			}
				
			

		}
		
		function edit_statusbod(){
			$id = $this->uri->segment(3);	
			$stat = $this->uri->segment(4);	
			$date = date('d F Y, h:i:s A');
			// var_dump($id);
			// var_dump($stat);
			// die();
					
		 
			$data = array(
				'status' 	=> $stat,
				'date'		=> $date
			);
		 
			$where = array(
				'id' => $id
			);
		 
			$updatestatus = $this->M_admin->update_statusbod($where,$data,'team');
			
			// var_dump($updatestatus);
			// die();
			
				if (!isset($updatestatus)){
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn4b');
						}else {
						// $error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				
						redirect('admin/mn4b');		
				}
		}

		
		
		
		
		public function cek_uploadbod(){
		$data['c_bod'] = $this->M_admin->get_bod2();	
		$this->load->view('admin/adm-uploadbod', array('error' => ' ' ));
		}
	
		public function editbod(){
				$id = $this->uri->segment(3);
				//die();
				$data["title"] = "Edit Data Commisioner, BOD & Team Lead";
				
				
				
				$where = array('id' => $id);
				$data['c_bod'] = $this->M_admin->edit_bod($where,'team')->result();		  
				$this->load->view('admin/adm-uploadbod',$data);
		}	
			
		
		public function aksi_insertbod()
	{
			
		$id 			= $this->input->post('id');
		$bhs 			= $this->input->post('bahasa');
		$key   			= $this->input->post('keytype');
		// $group   		= $this->input->post('grouptype');

		$name  			= $this->input->post('nama');
		$title  		= $this->input->post('title');
		$dettitle  		= $this->input->post('detgelar');
		$data_upload   	= $this->input->post('berkasdata');
		$st  			= 'akt';
		
		
		
		if($title == 'President Commisioner' || $title == 'Commisioner' || $title == 'Presiden Komisaris' || $title == 'Komisaris Utama' || $title == 'Komisaris'){
			$typeky = 'cms';
		}
		else if($title == 'President Director' || $title == 'Director' || $title == 'Associate Director' || $title == 'Direktur Utama' || $title == 'Direktur' || $title == 'Direktur Muda'){
			$typeky = 'bod';
		}		
		else if($title == 'General Manager' || $title == 'Manager' || $title == 'Associate Manager' || $title == 'Manajer Umum' || $title == 'Manajer' || $title == 'Manajer Muda'){
			$typeky = 'lead';
		}
		
		else {
			$typeky = 'staff';
		}
		
		
		
		$key  = $typeky;
		
		if($key == 'cms' && $bhs == 'IDN'){
			$grouptp = 'Jajaran Komisaris';
		} 
		else if($key == 'cms' && $bhs == 'ENG'){
			$grouptp = 'Board of Commisioner';
		} 		
		
		else if($key == 'bod' && $bhs == 'IDN'){
			$grouptp = 'Jajaran Direksi';
		}
		
		else if($key == 'bod' && $bhs == 'ENG'){
			$grouptp = 'Board of Director';
		}
			
		else if($key == 'lead' && $bhs == 'IDN'){
			$grouptp = 'Team Leader';
		}
		
		else if($key == 'lead' && $bhs == 'ENG'){
			$grouptp = 'Lead Team';
		}
		
		else{
			$grouptp = 'SVP/Staff';
		}
		
		
		
		
		$group   		= $grouptp;
		
		
		// var_dump($group);
		// die();
		

		$today 							= date("Y-m-d_H-i-s");
		// $e_nama 						= str_replace(' ', '_', $name);
		// $config['upload_path']          = 'assets/img/bod/';
		// $config['allowed_types']        = 'jpeg|jpg|png';
		// $config['max_size']             = 1000000;
		// $config['max_width']            = 102400;
		// $config['max_height']           = 76800;
		// $config['file_name'] 			= $today.'_'.$e_nama;
		

		

		// $this->load->library('upload', $config);
		// $this->upload->initialize($config);
		
		// var_dump($this->upload->data('file_name'));
		// var_dump($bhs);
		// var_dump($key);
		// var_dump($group);
		// var_dump($name);
		// var_dump($title);
		// var_dump($dettitle);
		// var_dump($data_upload);

		// var_dump($this->upload->do_upload('berkasdata'));
		// die();
		
										
					// if ($this->upload->do_upload('berkasdata')) {								
													
						$data = array(
							 
							 'typekey'		=>  $key,
							 'type_group'	=>  $group,
							 'name'			=>  $name,
							 'title'		=>  $title,
							 'det_title'	=>  $dettitle,
							 // 'poto' 	 	=> 	$this->upload->data('file_name'),
							 'bahasa'		=>  $bhs,
							 'status'  		=> 	$st
						 );

		 
						$where = array(
							'id'	=> $id
						);
						
					if ($data > 0) {
		 
					$this->M_admin->update_dataclm($where,$data,'team');
							 

					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn4b');
					}else {
						
					$error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data gagal di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn4b');	
					}

		//header ("Connection: close");	
		

	}

		function hapusbod(){
			$id = $this->uri->segment(3);
			$where = array('id' => $id);
			$hapus = $this->M_admin->hapus_databod($where,'team');
			
			if (!isset($hapus)){
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di DIHAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn4b');
					}else {
					// $error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data GAGAL di HAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			
			redirect('admin/mn4b');	
			}
		}
		
		
		
		///////////MENU - map ///////////
		
		function mn4f(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Data Map";
				$data['c_map'] = $this->M_admin->get_map();
				$this->load->view('admin/adm-map', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function tambahmap(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Tambah Data Map";
				$this->load->view('admin/adm-tambahmap', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function edit_statusmap(){
			$id = $this->uri->segment(3);	
			$stat = $this->uri->segment(4);	
			$date = date('d F Y, h:i:s A');
			// var_dump($id);
			// var_dump($stat);
			// die();
					
		 
			$data = array(
				'status' 	=> $stat,
				'date'		=> $date
			);
		 
			$where = array(
				'id' => $id
			);
		 
			$updatestatus = $this->M_admin->update_statusmap($where,$data,'map');
			
				if (!isset($updatestatus)){
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn4f');
						}else {
						// $error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				
						redirect('admin/mn4f');		
				}
		}

		
		public function simpanmap(){
			
			$date 			= date('d F Y, h:i:s A');
			$titlemap  		= $this->input->post('title');
			$embed  		= $this->input->post('embed');
			$bhs 			= $this->input->post('bhs');
			$st  			= 'akt';
			
			// var_dump($date);
			// var_dump($ins);
			// var_dump($link);
			// var_dump($bhs);
			// var_dump($st);

			// die();


			
						$data = array(
							 
							 'titlemap'			=> $titlemap,
							 'embed_map'		=> $embed,
							 'bahasa'			=> $bhs,
							 'status'  			=> $st,
							 'date'  			=> $date
						);
				
				$updatemap = $this->M_admin->insert_map($data,'map');
				
			if(!isset($updatemap)){
				$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
				<p class="mb-0 flex-1">Data BERHASIL di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn4f');
			}else {
					
				$error = array('error' => $this->upload->display_errors());	
				$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
				<p class="mb-0 flex-1">Data gagal di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn4f');	
			}
				
			

		}
		
		
		public function cek_uploadmap(){
		$data['c_map'] = $this->M_admin->get_map();	
		$this->load->view('admin/adm-uploadmap', array('error' => ' ' ));
		}
	
		public function editmap(){
				$id = $this->uri->segment(3);
				//die();
				$data["title"] = "Edit Data Map";
				
				
				
				$where = array('id' => $id);
				$data['c_map'] = $this->M_admin->edit_map($where,'map')->result();		  
				$this->load->view('admin/adm-uploadmap',$data);
		}	
			
		public function aksi_insertmap()
		{
				
			$id 			= $this->input->post('id');
			
			$date 			= date('d F Y, h:i:s A');
			$titlemap  		= $this->input->post('title');
			$embed  		= $this->input->post('embed');
			$bhs 			= $this->input->post('bhs');
			$st  			= 'akt';
			
			// var_dump($id);
			// var_dump($date);
			// var_dump($ins);
			// var_dump($link);
			// var_dump($bhs);
			// die();


													
						$data = array(
							 
							 'titlemap'			=> $titlemap,
							 'embed_map'		=> $embed,
							 'bahasa'			=> $bhs,
							 'status'  			=> $st,
							 'date'  			=> $date
						);

			 
							$where = array(
								'id'	=> $id
							);
						
						$simpandt = $this->M_admin->update_datamap($where,$data,'map');
						if(!isset($simpandt)){
						
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data BERHASIL di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn4f');
						}else {
							
						$error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data gagal di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn4f');	
						}


		}

		function hapusmap(){
			$id = $this->uri->segment(3);
			$where = array('id' => $id);
			$hapus = $this->M_admin->hapus_datamap($where,'map');
			
			if (!isset($hapus)){
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di DIHAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn4f');
					}else {
					// $error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data GAGAL di HAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			
			redirect('admin/mn4f');	
			}
		}


		///////////MENU - activity ///////////
		
		function mn4c(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Data info Activity";
				$data['c_activity'] = $this->M_admin->get_activity();
				$this->load->view('admin/adm-activity', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function tambahactivity(){
		
		if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Tambah Data Activity";
				$this->load->view('admin/adm-tambahactivity', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		public function simpanactivity(){
			if(isset($this->session->userdata['data_seslogin'])){	
				
				$date 			= date('d F Y, h:i:s A');
				$title  		= $this->input->post('title');
				$activity  		= $this->input->post('activity');
				$sumber  		= $this->input->post('sumber');
				$bhs 			= $this->input->post('bhs');
				$st  			= 'active';
				
				
							$data = array(
								
								'title'			=> $title,
								'activity'		=> $activity,
								'write_from'	=> $sumber,
								'bahasa'		=> $bhs,
								'status'  		=> $st,
								'recdate'  		=> $date
							);
					
					$updatecontactinfo = $this->M_admin->insert_contactinfo($data,'news_activity');
					
				if(!isset($updatecontactinfo)){
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn4c');
				}else {
						
					$error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data gagal di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn4c');	
				}
					
			}
			else{
			redirect(base_url("admin/index"));
			}	

		}
		
		function hapusactivity(){
			$id = $this->uri->segment(3);
			$where = array('id' => $id);
			$hapus = $this->M_admin->hapus_activity($where,'news_activity');
			
			if (!isset($hapus)){
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di DIHAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn4c');
					}else {
					// $error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data GAGAL di HAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			
			redirect('admin/mn4c');	
			}
		}
		
		function edit_activity(){
			$id = $this->uri->segment(3);	
			$stat = $this->uri->segment(4);	
			$date = date('d F Y, h:i:s A');
			// var_dump($id);
			// var_dump($stat);
			// die();
					
		 
			$data = array(
				'status' 	=> $stat,
				'recdate'	=> $date
			);
		 
			$where = array(
				'id' => $id
			);
		 
			$updatestatus = $this->M_admin->update_statusactivity($where,$data,'news_activity');
			
			// var_dump($updatestatus);
			// die();
			
				if (!isset($updatestatus)){
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn4c');
						}else {
						// $error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				
						redirect('admin/mn4c');		
				}
		}
		
		
		public function editactivity(){
				$id = $this->uri->segment(3);
				//die();
				$data["title"] = "Edit Data Activity";
				
				
				
				$where = array('id' => $id);
				$data['c_activity'] = $this->M_admin->edit_activity($where,'news_activity')->result();		  
				$this->load->view('admin/adm-uploadactivity',$data);
		}	
		
		function edit_dataactivity(){
			$id = $this->uri->segment(3);	
			$stat = $this->uri->segment(4);	
			$date = date('d F Y, h:i:s A');
			// var_dump($id);
			// var_dump($stat);
			// die();
					
		 
			$data = array(
				'status' 	=> $stat,
				'date'		=> $date
			);
		 
			$where = array(
				'id' => $id
			);
		 
			$updatestatus = $this->M_admin->update_statusactivity($where,$data,'news_activity');
			
				if (!isset($updatestatus)){
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn4c');
						}else {
						// $error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				
						redirect('admin/mn4c');		
				}
		}
		
		public function aksi_insertactivity()
		{
				
			$id 			= $this->input->post('id');
			
			$date 			= date('d F Y, h:i:s A');
			$title  		= $this->input->post('title');
			$activity  		= $this->input->post('activity');
			$bhs 			= $this->input->post('bhs');
			$st  			= 'akt';
			
			// var_dump($id);
			// var_dump($date);
			// var_dump($ins);
			// var_dump($link);
			// var_dump($bhs);
			// die();


													
						$data = array(
							 
							 'title'		=> $title,
							 'activity'		=> $activity,
							 'bahasa'		=> $bhs,
							 'status'  		=> $st,
							 'recdate'  	=> $date
						);

			 
							$where = array(
								'id'	=> $id
							);
						
						$simpandt = $this->M_admin->update_activity($where,$data,'news_activity');
						if(!isset($simpandt)){
						
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data BERHASIL di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn4c');
						}else {
							
						$error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data gagal di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn4c');	
						}


		}



		
		///////////MENU - contactinfo ///////////
		
		function mn4g(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Data contact info";
				$data['c_contactinfo'] = $this->M_admin->get_contactinfo();
				$this->load->view('admin/adm-contactinfo', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function tambahcontactinfo(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Tambah Data contact info";
				$this->load->view('admin/adm-tambahcontactinfo', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function edit_statuscontactinfo(){
			$id = $this->uri->segment(3);	
			$stat = $this->uri->segment(4);	
			$date = date('d F Y, h:i:s A');
			// var_dump($id);
			// var_dump($stat);
			// die();
					
		 
			$data = array(
				'status' 	=> $stat,
				'date'		=> $date
			);
		 
			$where = array(
				'id' => $id
			);
		 
			$updatestatus = $this->M_admin->update_statuscontactinfo($where,$data,'contact_info');
			
				if (!isset($updatestatus)){
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn4g');
						}else {
						// $error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				
						redirect('admin/mn4g');		
				}
		}

		
		public function simpancontactinfo(){
			
			$date 			= date('d F Y, h:i:s A');
			$title  		= $this->input->post('title');
			$address  		= $this->input->post('address');
			$bhs 			= $this->input->post('bhs');
			$st  			= 'akt';
			
			// var_dump($date);
			// var_dump($ins);
			// var_dump($link);
			// var_dump($bhs);
			// var_dump($st);

			// die();


			
						$data = array(
							 
							 'title'			=> $title,
							 'address'			=> $address,
							 'bahasa'			=> $bhs,
							 'status'  			=> $st,
							 'date'  			=> $date
						);
				
				$updatecontactinfo = $this->M_admin->insert_contactinfo($data,'contact_info');
				
			if(!isset($updatecontactinfo)){
				$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
				<p class="mb-0 flex-1">Data BERHASIL di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn4g');
			}else {
					
				$error = array('error' => $this->upload->display_errors());	
				$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
				<p class="mb-0 flex-1">Data gagal di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn4g');	
			}
				
			

		}
		
		
		public function cek_uploadcontactinfo(){
		$data['c_contactinfo'] = $this->M_admin->get_contactinfo();	
		$this->load->view('admin/adm-uploadcontactinfo', array('error' => ' ' ));
		}
	
		public function editcontactinfo(){
				$id = $this->uri->segment(3);
				//die();
				$data["title"] = "Edit Data contactinfo";
				
				
				
				$where = array('id' => $id);
				$data['c_contactinfo'] = $this->M_admin->edit_contactinfo($where,'contact_info')->result();		  
				$this->load->view('admin/adm-uploadcontactinfo',$data);
		}	
			
		public function aksi_insertcontactinfo()
		{
				
			$id 			= $this->input->post('id');
			
			$date 			= date('d F Y, h:i:s A');
			$title  		= $this->input->post('title');
			$address  		= $this->input->post('address');
			$bhs 			= $this->input->post('bhs');
			$st  			= 'akt';
			
			// var_dump($id);
			// var_dump($date);
			// var_dump($ins);
			// var_dump($link);
			// var_dump($bhs);
			// die();


													
						$data = array(
							 
							 'title'		=> $title,
							 'address'		=> $address,
							 'bahasa'		=> $bhs,
							 'status'  		=> $st,
							 'recdate'  	=> $date
						);

			 
							$where = array(
								'id'	=> $id
							);
						
						$simpandt = $this->M_admin->update_datacontactinfo($where,$data,'contact_info');
						if(!isset($simpandt)){
						
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data BERHASIL di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn4g');
						}else {
							
						$error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">Data gagal di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn4g');	
						}


		}

		function hapuscontactinfo(){
			$id = $this->uri->segment(3);
			$where = array('id' => $id);
			$hapus = $this->M_admin->hapus_datacontactinfo($where,'contact_info');
			
			if (!isset($hapus)){
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di DIHAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn4g');
					}else {
					// $error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data GAGAL di HAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			
			redirect('admin/mn4g');	
			}
		}
		
		
		///////////MENU - gallery ///////////
		
		function mn5a(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Data Event Photo";
				$data['c_gallery'] = $this->M_admin->get_gallery();
				$this->load->view('admin/adm-gallery', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		function tambahgallery(){
		
				if(isset($this->session->userdata['data_seslogin'])){
				
				$data["title"] = "Tambah Data Event Photo";
				$this->load->view('admin/adm-tambahgallery', $data);
				}
				else{
				redirect(base_url("admin/index"));
				}
		}
		
		public function simpangallery(){
		
		$title  		= $this->input->post('title');
		$data_upload   	= $this->input->post('berkasdata');
		$st  			= 'akt';
		
		
		
		$today = date("Y-m-d_H-i-s");
		$date 							= date('d F Y, h:i:s A');
		$e_nama 						= str_replace(' ', '_', $title);
		$config['upload_path']          = 'assets/images/galery/big/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 1000000;
		$config['max_width']            = 102400;
		$config['max_height']           = 76800;
		$config['file_name'] 			= $today.'_'.$e_nama;
		
		
		


				
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			
			if ($this->upload->do_upload('berkasdata')) {								
						$data = array(
							 'title'		=>  $title,
							 'gbr' 	 		=> 	$this->upload->data('file_name'),
							 'status'  		=> 	$st,
							 'date'  		=> 	$date
						);
				
				
				// var_dump($data);
				// die();
				
			// }
			
			
			$this->M_admin->insert_gallery($data,'gallery');
				
				$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
				<p class="mb-0 flex-1">Data BERHASIL di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn5a');
			}else {
					
				$error = array('error' => $this->upload->display_errors());	
				$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
				<p class="mb-0 flex-1">Data gagal di TAMBAHKAN !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('admin/mn5a');	
			}
				
			

		}
		
		function edit_statusgallery(){
			$id = $this->uri->segment(3);	
			$stat = $this->uri->segment(4);	
			$date = date('d F Y, h:i:s A');
			// var_dump($id);
			// var_dump($stat);
			// die();
					
		 
			$data = array(
				'status' 	=> $stat,
				'date'		=> $date
			);
		 
			$where = array(
				'id' => $id
			);
		 
			$updatestatus = $this->M_admin->update_statusgallery($where,$data,'gallery');
			
			// var_dump($updatestatus);
			// die();
			
				if (!isset($updatestatus)){
						$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS BERHASIL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
						redirect('admin/mn5a');
						}else {
						// $error = array('error' => $this->upload->display_errors());	
						$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
						<p class="mb-0 flex-1">STATUS GAGAL di Update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				
						redirect('admin/mn5a');		
				}
		}

		
		
		
		
		public function cek_uploadgallery(){
		$data['c_gallery'] = $this->M_admin->get_gallery2();	
		$this->load->view('admin/adm-uploadgallery', array('error' => ' ' ));
		}
	
		public function editgallery(){
				$id = $this->uri->segment(3);
				//die();
				$data["title"] = "Edit Data Event Photo";
				
				
				
				$where = array('id' => $id);
				$data['c_gallery'] = $this->M_admin->edit_gallery($where,'gallery')->result();		  
				$this->load->view('admin/adm-uploadgallery',$data);
		}	
			
		
		public function aksi_insertgallery()
	{
			
		$id 			= $this->input->post('id');
		$title  		= $this->input->post('title');
		$data_upload   	= $this->input->post('berkasdata');
		$st  			= 'akt';
		$date 			= date('d F Y, h:i:s A');
		
		
		

		$today 							= date("Y-m-d_H-i-s");
		$e_nama 						= str_replace(' ', '_', $title);
		$config['upload_path']          = 'assets/images/galery/big/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 1000000;
		$config['max_width']            = 102400;
		$config['max_height']           = 76800;
		$config['file_name'] 			= $today.'_'.$e_nama;
		

		

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		// var_dump($this->upload->data('file_name'));
		// var_dump($bhs);
		// var_dump($key);
		// var_dump($group);
		// var_dump($name);
		// var_dump($title);
		// var_dump($dettitle);
		// var_dump($data_upload);

		// var_dump($this->upload->do_upload('berkasdata'));
		// die();
		
										
					if ($this->upload->do_upload('berkasdata')) {								
						$data = array(
							 
							 'title'		=>  $title,
							 'gbr' 	 	=> 	$this->upload->data('file_name'),
							 'status'  		=> 	$st,
							 'date'  		=> 	$date
						 );

		 
						$where = array(
							'id'	=> $id
						);
		 
					$this->M_admin->update_dataclm($where,$data,'gallery');
							 

					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn5a');
					}else {
						
					$error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data gagal di update !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn5a');	
					}

		//header ("Connection: close");	
		

	}

		function hapusgallery(){
			$id = $this->uri->segment(3);
			$where = array('id' => $id);
			$hapus = $this->M_admin->hapus_datagallery($where,'gallery');
			
			if (!isset($hapus)){
					$this->session->set_flashdata('message', '<div class="alert alert-success border-2 d-flex align-items-center" role="alert"><div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data BERHASIL di DIHAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('admin/mn5a');
					}else {
					// $error = array('error' => $this->upload->display_errors());	
					$this->session->set_flashdata('message', '<div class="alert alert-danger border-2 d-flex align-items-center" role="alert"><div class="bg-danger me-3 icon-item"><span class="fas fa-exclamation text-white fs-3"></span></div>
					<p class="mb-0 flex-1">Data GAGAL di HAPUS !!!</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			
			redirect('admin/mn5a');	
			}
		}
		
		public function infohw() {
			
			if(isset($this->session->userdata['data_seslogin'])){
				
				// Ambil data dari phpSysInfo XML API
				$url = base_url('phpsysinfo/xml.php?plugin=complete');
				$xml_data = simplexml_load_file($url);

				// Konversi XML menjadi JSON
				$json_data = json_encode($xml_data);
				$data['server_info'] = json_decode($json_data, true);

				// Load view
				$this->load->view('infserver/server_info', $data);			
				
			}else{
				redirect(base_url("admin/index"));
			}

		}



		
}
