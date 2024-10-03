<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends CI_Controller {

		function __construct() {
			parent::__construct();

			$this->load->model('M_images');
			$this->load->model("M_main");
			$this->load->helper(array('form', 'url', 'file', 'captcha'));
			date_default_timezone_set("Asia/Jakarta");
			$this->load->helper('bbcode');
			$this->load->library('pagination');
			$this->load->library('session');


			



			function postData($urlx, $data) {
				// Inisialisasi sesi cURL
				$ch = curl_init();
				$headers = [
							'Content-Type: application/x-www-form-urlencoded',
							'Access-Control-Allow-Origin: *'
						];

				$data = array($data);
				// Atur opsi cURL
				curl_setopt($ch, CURLOPT_URL, $urlx); // URL tujuan
				curl_setopt($ch, CURLOPT_POST, 1); // Metode request POST
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); //http_build_query($data)); // Data yang akan dikirim
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Agar hasil response dikembalikan sebagai string
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			
				// Eksekusi request dan ambil hasilnya
				$response = curl_exec($ch);
			
				// Cek jika terjadi error
				if (curl_errno($ch)) {
					echo 'cURL Error: ' . curl_error($ch);
				}
			
				// Tutup sesi cURL
				curl_close($ch);
			
				// Kembalikan response dari server
				return $response;
			}
			
			// --------------------------- fuction curl post end --------------------------------
			// --------------------------- fungsi untuk encrypt data --------------------------------

			$key = '43dghgii#$S1masR3$f@$^*54';  // Ensure this key is kept secret and secure
			$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')); // Generate an initialization vector

				// Function to encrypt
				function encrypt($data, $key, $iv) {
					$encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
					return base64_encode($encrypted . '::' . $iv);
				}

				function decrypt($data, $key) {
					list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
					return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
				}
				
			function filter_nama($input) {
				// Define the allowed characters
				$allowedChars = '/[^a-zA-Z0-9 ]/';

				// Replace any character not in the allowed set with an empty string
				$filteredInput = preg_replace($allowedChars, '', $input);

				return $filteredInput;
			}
			function filter_textarea($input) {
				// Define the allowed characters
				$allowedChars = '/[^a-zA-Z0-9. ?]/';

				// Replace any character not in the allowed set with an empty string
				$filteredInput = preg_replace($allowedChars, '', $input);

				return $filteredInput;
			}


			function filter_email($input) {
				// Define the allowed characters
				$allowedChars = '/[^a-zA-Z0-9.@_-]/';

				// Replace any character not in the allowed set with an empty string
				$filteredInput = preg_replace($allowedChars, '', $input);

				return $filteredInput;
			}
			
			function filter_phone_number($input) {
				// Define the allowed characters
				$allowedChars = '/[^0-9+]/';

				// Replace any character not in the allowed set with an empty string
				$filteredInput = preg_replace($allowedChars, '', $input);

				return $filteredInput;
			}

			//fucntion untuk cek browser
			function getDeviceType() {
				$userAgent = $_SERVER['HTTP_USER_AGENT'];
				
				// Ubah User-Agent menjadi array string berdasarkan spasi atau titik koma sebagai pemisah
				$userAgentArray = preg_split('/[;\s]+/', strtolower($userAgent));
			
				$deviceType = 'Desktop'; // Default device type
			
				// Definisikan pola pencarian untuk berbagai perangkat
				$patterns = [
					'android' => 'Android',
					'iphone' => 'iPhone',
					'ipad' => 'iPad',
					'ipod' => 'iPod',
					'windows phone' => 'Windows Phone',
					'mobile' => 'Mobile',
					'tablet' => 'Tablet'
				];
			
				// Lakukan pencocokan dengan menggunakan preg_match pada array
				foreach ($patterns as $pattern => $type) {
					foreach ($userAgentArray as $value) {
						if (preg_match("/$pattern/i", $value)) {
							$deviceType = $type;
							break 2; // Keluar dari kedua loop setelah mencocokkan perangkat
						}
					}
				}
			
				return $deviceType;
			}

			

			
		}

		public function index() {
			$data['c_history'] = $this->M_main->get_sejarah();
			$data['c_slider'] = $this->M_main->get_slide();
			$data['c_icoproduct'] = $this->M_main->get_icoproduct();
			$data['c_disclaimer'] = $this->M_main->get_disclaimer();
			$data['c_contact'] = $this->M_main->get_contact();
			$data['c_sosmed'] = $this->M_main->get_sosmed();
			$data['c_gallery'] = $this->M_main->get_gallery();
			// $data['c_mndet'] = $this->M_main->get_menudetail();
			// $data['c_kkon'] = $this->M_main->get_kontakkonten();
			// $data['c_lks'] = $this->M_main->get_lokasi();
			// $this->load->view('home', $data);
			$this->load->view('frontend/index', $data);
		}
		
		
		public function cob() {
			$data['c_cob'] = $this->M_main->get_cob();
			
			$cob1 = 'propert';
			$cob2 = 'engine';
			$cob3 = 'marine';
			$cob4 = 'casual';
			$cob5 = 'bond';
			
			$data['c_cob1'] = $this->M_main->get_cob1($cob1);
			$data['c_cob2'] = $this->M_main->get_cob2($cob2);
			$data['c_cob3'] = $this->M_main->get_cob3($cob3);
			$data['c_cob4'] = $this->M_main->get_cob4($cob4);
			$data['c_cob5'] = $this->M_main->get_cob5($cob5);


			$data['c_disclaimer'] = $this->M_main->get_disclaimer();
			$data['c_contact'] = $this->M_main->get_contact();
			$data['c_sosmed'] = $this->M_main->get_sosmed();
			$data['c_gallery'] = $this->M_main->get_gallery();

			$this->load->view('frontend/cob', $data);
		}
		
		public function supportc() {
			$data['c_cedant'] = $this->M_main->get_cedant();

			$data['c_disclaimer'] = $this->M_main->get_disclaimer();
			$data['c_contact'] = $this->M_main->get_contact();
			$data['c_sosmed'] = $this->M_main->get_sosmed();
			$data['c_gallery'] = $this->M_main->get_gallery();
			$data['images'] = $this->M_images->get_images_scedant();

			$this->load->view('frontend/supportc', $data);
		}
		
		// --------------------------------------------------------- gbr --------------------------------
		public function upload_supportc() {
        $this->load->library('upload');

			if ($this->input->post('submit')) {
				$config['upload_path'] = '.assets/gbrupload/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2048;

				$this->upload->initialize($config);

				if (!$this->upload->do_upload('image')) {
					$data['error'] = $this->upload->display_errors();
					$this->load->view('image/form', $data);
				} else {
					$upload_data = $this->upload->data();
					$data = array(
						'filename' => $upload_data['file_name']
					);

					$this->image_model->create_image($data);
					redirect('image');
				}
			} else {
				$this->load->view('image/form');
			}
		}

		public function delete_supportc($id) {
			if ($this->image_model->delete_image($id)) {
				redirect('image');
			} else {
				show_error('Failed to delete image');
			}
		}
		
		
		public function supportre() {
			$indo = 'indonesia';
			$sgp = 'singapura';
			$mly = 'malaysia';
			$hkg = 'hongkong';
			$kor = 'korea';

			$data['c_reas'] = $this->M_main->get_reas();
			$data['c_indo'] = $this->M_main->get_posisireindo($indo);
			$data['c_sgp'] = $this->M_main->get_posisiresgp($sgp);
			$data['c_mly'] = $this->M_main->get_posisiremly($mly);
			$data['c_hkg'] = $this->M_main->get_posisirehkg($hkg);
			$data['c_kor'] = $this->M_main->get_posisirekor($kor);
			$data['c_inter'] = $this->M_main->get_posisireinter();

			$data['c_disclaimer'] = $this->M_main->get_disclaimer();
			$data['c_contact'] = $this->M_main->get_contact();
			$data['c_sosmed'] = $this->M_main->get_sosmed();
			$data['c_gallery'] = $this->M_main->get_gallery();

			$this->load->view('frontend/supportre', $data);
		}
		
		public function visimisi() {


			$data['c_visimisi'] = $this->M_main->get_visimisi();


			$data['c_disclaimer'] = $this->M_main->get_disclaimer();
			$data['c_contact'] = $this->M_main->get_contact();
			$data['c_sosmed'] = $this->M_main->get_sosmed();
			$data['c_gallery'] = $this->M_main->get_gallery();

			$this->load->view('frontend/visimisi', $data);
		}
		
		public function team() {


			$data['c_team'] = $this->M_main->get_team();
			$data['c_teambod'] = $this->M_main->get_teambod();
			$data['c_teamcms'] = $this->M_main->get_teamcms();
			$data['c_teamlead'] = $this->M_main->get_teamlead();


			$data['c_disclaimer'] = $this->M_main->get_disclaimer();
			$data['c_contact'] = $this->M_main->get_contact();
			$data['c_sosmed'] = $this->M_main->get_sosmed();
			$data['c_gallery'] = $this->M_main->get_gallery();

			$this->load->view('frontend/team', $data);
		}
		
		// public function activity() {


			// $data['c_activity'] = $this->M_main->get_act();

			// $data['c_disclaimer'] = $this->M_main->get_disclaimer();
			// $data['c_contact'] = $this->M_main->get_contact();
			// $data['c_sosmed'] = $this->M_main->get_sosmed();
			// $data['c_gallery'] = $this->M_main->get_gallery();

			// $this->load->view('frontend/myactivity', $data);
		// }
		
		
		public function activity() {
		$languagepost = get_cookie('lang_is');
		if($languagepost == 'in'){
			$language = 'IDN';
		}else{
			$language = 'ENG';
		}
		// var_dump($language);
		// die();
        $config = array();
        $config['base_url'] = site_url('Main/activity/'.$language);
		
		$config['total_rows'] = $this->M_main->get_news_count($language);
        $config['per_page'] = 1;
        $config['uri_segment'] = 4;

        // Customizing pagination
        // $config['full_tag_open'] = '<div class="pagination-links">';
        // $config['full_tag_close'] = '</div>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';


        // $config['cur_tag_open'] = '<span class="current">';
        // $config['cur_tag_close'] = '</span>';
        // $config['num_tag_open'] = '<span>';
        // $config['num_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		// var_dump($page);
        $data['news'] = $this->M_main->get_news($language, $config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
		$data['c_activity'] = $this->M_main->get_act();
		
		$data['c_disclaimer'] = $this->M_main->get_disclaimer();
		$data['c_contact'] = $this->M_main->get_contact();
		$data['c_sosmed'] = $this->M_main->get_sosmed();
		$data['c_gallery'] = $this->M_main->get_gallery();

        $this->load->view('frontend/myactivity', $data);
    }
	
	
public function generate_captcha()
{
    // Load helper captcha
    $this->load->helper('captcha');

    // Konfigurasi captcha
    $config = array(
        'img_path'      => './captcha_images/',
        'img_url'       => base_url('captcha_images/'),
        'font_path'     => FCPATH . 'system/fonts/texb.ttf',  // Sesuaikan dengan lokasi font di server Anda
        'img_width'     => '150',
        'img_height'    => 50,
        'word_length'   => 6,
        'font_size'     => 16,
        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'expiration'    => 7200,
        'colors'        => array(
            'background' => array(255, 255, 255),
            'border' => array(204, 204, 204),
            'text' => array(0, 0, 0),
            'grid' => array(204, 204, 204)
        )
    );

    // Membuat captcha
    $captcha = create_captcha($config);

    // Simpan captcha ke session
    $this->session->set_userdata('captchaWord', $captcha['word']);

    // Kirim captcha ke view
    $data['captcha_image'] = $captcha['image'];

    // Load view dengan captcha
    $this->load->view('captcha_view', $data);
}

public function contact() {

	// Load helper captcha
    $this->load->helper('captcha');

    // Konfigurasi captcha
    $config = array(
		'img_path'      => './captcha_images/',
		'img_url'       => base_url('captcha_images/'),
		'font_path'     => FCPATH . 'system/fonts/texb.ttf',  // Sesuaikan dengan lokasi font di server Anda
		'img_width'     => (int) 150,  // Pastikan tipe data integer
		'img_height'    => (int) 50,   // Pastikan tipe data integer
		'word_length'   => (int) 6,    // Pastikan tipe data integer
		'font_size'     => (int) 16,   // Pastikan tipe data integer
		'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
		'expiration'    => (int) 7200, // Pastikan tipe data integer
		'colors'        => array(
			'background' => array(255, 255, 255),
			'border' => array(204, 204, 204),
			'text' => array(0, 0, 0),
			'grid' => array(204, 204, 204)
		)
	);
	

	// Membuat captcha
    $captcha = create_captcha($config);

    // Simpan captcha ke session
    $this->session->set_userdata('captchaWord', $captcha['word']);
	
	// Kirim captcha ke view
    $data['captcha'] = $captcha['image'];
	$data['c_contact'] = $this->M_main->get_kontaaak();
	$data['c_map'] = $this->M_main->get_map();

	$data['c_disclaimer'] = $this->M_main->get_disclaimer();
	$data['c_contact'] = $this->M_main->get_contact();
	$data['c_sosmed'] = $this->M_main->get_sosmed();
	$data['c_gallery'] = $this->M_main->get_gallery();

	// $this->load->view('frontend/contactus', ['recaptcha' => $data]);
	$this->load->view('frontend/contactus', $data);
	}




		
		// public function contact() {

		// 	// $this->load->library('recaptcha');
			
		// 	// /*
		//  // Create the reCAPTCHA box.
		//  // You can pass an array of attributes to this method.
		//  // Check the "Creating the reCAPTCHA box" section for more details
		// // */
		// // $data['recaptcha'] = $this->recaptcha->create_box();

		// // // Check if the form is submitted
		
		// 		//'font_path'     => './path/to/fonts/texb.ttf',
		
		// 	$vals = array(
		// 		'img_path'      => './captcha/',
		// 		'img_url'       => base_url('captcha/'),
		// 		'font_path'     => base_url('assets/fonts/Arial.ttf'),
		// 		'img_height'    => 50,
		// 		'expiration'    => 7200,
		// 		'word_length'   => 6,
		// 		'font_size'     => 20,
		// 		'img_id'        => 'captcha_img',
		// 		'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

		// 		'colors'        => array(
		// 			'background' => array(255, 255, 255),
		// 			'border' => array(0, 0, 0),
		// 			'text' => array(0, 0, 0),
		// 			'grid' => array(255, 240, 240)
		// 		)
		// 	);

		// 	$cap = create_captcha($vals);
		// 	$this->session->set_userdata('captchaWord', $cap['word']);

		// 	$data['captcha'] = $cap['image'];
		
		// 	$data['c_contact'] = $this->M_main->get_kontaaak();
		// 	$data['c_map'] = $this->M_main->get_map();


		// 	$data['c_disclaimer'] = $this->M_main->get_disclaimer();
		// 	$data['c_contact'] = $this->M_main->get_contact();
		// 	$data['c_sosmed'] = $this->M_main->get_sosmed();
		// 	$data['c_gallery'] = $this->M_main->get_gallery();

		// 	// $this->load->view('frontend/contactus', ['recaptcha' => $data]);
		// 	$this->load->view('frontend/contactus', $data);
		// }
		
		public function quest() {


					$this->load->library('iptracker');

					$ambilPublikip 	= getPublicIP();
					$ambilUserip	= getUserIP();
					$captchaWord = $this->session->userdata('captchaWord');
					$captchaInput = $this->input->post('captcha');

					if ($captchaInput === $captchaWord) {
						// Process the form submission
						
						
						$usr 	  		= $this->input->post('nama');
						$company   		= $this->input->post('company');
						$emel   		= $this->input->post('mail');
						$telepon   		= $this->input->post('ph');
						$isi   			= $this->input->post('isi');
						$input = strtolower($isi);
						// var_dump($input);

						function filterKata($input, $kataTerlarang) {
							// Mengubah semua kata terlarang dan input menjadi huruf kecil
							$kataTerlarang = array_map('strtolower', $kataTerlarang);
						
							// Memeriksa apakah ada kata-kata terlarang dalam input
							foreach ($kataTerlarang as $kata) {
								if (strpos($input, $kata) !== false) {
									return "ituspamer";
								}
							}
						
							// Jika tidak ada kata-kata terlarang ditemukan
							return "amankoq";
						}

						$kataTerlarang = [ 
							"porn", "#1", "100% more", "100% free", "100% satisfied", "Additional income", "Be your own boss", "price", 
							"Big bucks", "Billion", "Cash bonus", "Cents on the dollar", "Consolidate debt", "Double your cash", "income", 
							"Earn extra cash", "Earn money", "Eliminate bad credit", "Extra cash", "Extra income", "Expect to earn", 
							"Fast cash", "Financial freedom", "Free access", "Free consultation", "Free gift", "Free hosting", "Free info", 
							"Free investment", "Free membership", "Free money", "Free preview", "Free quote", "Free trial", "Full refund", 
							"Get out of debt", "Get paid", "Giveaway", "Guaranteed", "Increase sales", "Increase traffic", "Incredible deal", 
							"Lower rates", "Lowest price", "Make money", "Million dollars", "Miracle", "Money back", "Once in a lifetime", 
							"One time", "Pennies a day", "Potential earnings", "Prize", "Promise", "Pure profit", "Risk-free", "guaranteed", 
							"big money", "Special promotion", "Act", "Become", "Call now", "Click below", "Click here", "Get it", "Do it", 
							"delete", "Exclusive deal", "Get started", "Information you requested", "Instant", "Limited time", "Order now", 
							"See for yourself", "Sign up free", "Take action", "Urgent", "What are you waiting for?", 
							"While supplies last", "Will not believe your eyes", "Winner", "Winning", "You are a winner", "Bulk email", "Buy", 
							"Check or money order", "money", "Congratulations", "Confidentiality", "Cures", "friend", "Direct email", 
							"Direct marketing", "Hidden charges", "Human growth hormone", "marketing", "Lose weight", "Mass email", "Meet singles", 
							"Multi-level marketing", "No catch", "No cost", "No credit check", "No fees", "No gimmick", "No hidden costs", 
							"No hidden fees", "No interest", "No investment", "No obligation", "No purchase necessary", "No questions asked", 
							"No strings attached", "Not junk", "Notspam", "Obligation", "Passwords", "Requires initial investment", 
							"Social security number", "scam", "junk", "spam", "Undisclosed", "Unsecured credit", 
							"Unsecured debt", "Unsolicited", "Valium", "Viagra", "Vicodin", "hate", "Weight loss", "Xanax", 
							"Accept credit cards", "Ad", "All new", "As seen on", "Bargain", "Beneficiary", "Billing", "Bonus", "Cards accepted", 
							"Cash", "Cheap", "Clearance", "Compare rates", "Credit card offers", "Deal", "Debt", "Discount", "Fantastic", 
							"In accordance with laws", "Income", "Investment", "Join millions", "Lifetime", "Loans", "Luxury", 
							"Marketing solution", "Message contains", "Mortgage rates", "Name brand", "Offer", "Online marketing", "Opt in", 
							"Pre-approved", "Quote", "Rates", "Refinance", "Removal", "Reserves the right", "Score", "Search engine", 
							"Sent in compliance", "Subject to…", "Terms and conditions", "Trial", "Unlimited", "Warranty", "Web traffic", 
							"Work from home", "MTRONIK", "mtronik", "promo", "promosi", "gratis", "sex", "blogspot", "Tkrtmbh", "infomtronik", 
							"Download", "mandiri", "e-cash", "nsp", "NSP", "hobimu", "hadiah", "viagra", "cialis", "kuliner", "sadis", "free", 
							"porn", "Pornhub", "hack", "hacking", ".co", ".id", ".com", "@", "hotmail", "crack", "cracking", "game", "games", 
							"casino", "bitcoin", "Herbamojo", "Herbapoten", "Biosan", "X-Gra", "Sutra", "Perkasa","He-Man", 
							"Herbapoten", "Sidomuncul", "Libido", "gila", "Berbasis rumah", "Penghasilan tambahan", "Murah", "Terjangkau", 
							"Penawaran eksklusif", "Bertindak cepat!", "Klik", "Klik tautan ini", "Informasi penting mengenai", "Uang tunai", 
							"Kredit", "Sahabat terkasih", "Penghasilan Anda", "Utang", "Mengumpulkan", "Hemat besar", "Formulir berikut ini", 
							"Anda tidak akan percaya ini", "100%/Seratus persen", "Hanya untuk pelanggan baru", "Menghasilkan uang", 
							"Bisnis online", "Peluang", "Jadilah bos Anda sendiri", "Pendapatan", "Pendapatan pasif", "Bekerja dari rumah", 
							"Tanpa biaya", "Hemat besar", "Tidak perlu kartu kredit", "Hutang kartu kredit", "Hilangkan hutang", "Kemasan", 
							"Nomor jaminan sosial", "Seumur hidup", "Penawaran percobaan", "Penurunan berat badan", "Prioritas", "Kamu menang!", 
							"Sampel gratis", "Waktu terbatas", "Bonus", "+++", "Keajaiban", "Solusi ajaib", "klik disini", "Daftar email", 
							"Meningkatkan penjualan", "Email massal", "Email sampah", "Link", "Luar biasa", "Bonus tunai", "Bandingkan tarif", 
							"Konfirmasi pesanan", "Pesanan sudah dikirim", "Iklan", "Memilih ikut serta", "Bebas risiko", "Skor dengan", 
							"Pernyataan saham", "Tidak akan percaya matamu", "Kargo terbuka", "Penawaran terbaik", "Menginvestasikan", 
							"Informasi basis pelanggan", "Perselingkuhan", "Resep", "Jangan hapus", "Kesempatan terakhir", "Tidak ada tipu muslihat", 
							"Tidak ada ikatan apa pun", "Tidak ada kewajiban", "Pengembalian dana", "Obat", "Janji", "Kuat", "Meminjamkan", 
							"Anda telah dipilih", "Uang tunai gratis", "Uang gratis", "Jangan ragu-ragu", "Akses instan", "syarat dan Ketentuan", 
							"PERTANYAAN SINGKAT", "PENAWARAN SUPER", "Kata sandi", "%", "[", "]", "{", "}", ";", "<", ">", "$", "#", "~" , "`", "=="
						];


						$input = $isi ?? '';

						$hasilkata = filterKata($input, $kataTerlarang);
						
						//  var_dump($isi);
						//  var_dump($hasilkata);
						// die();

						if ($hasilkata == "ituspamer"){
							$this->session->set_flashdata('message', '				
													<div class="col-md-12 col-sm-12 col-xs-12 alert alert-danger d-flex align-items-left" role="alert">
														<div class="col-md-2 col-sm-3 col-xs-3">
															<i class="fa fa-ban" style="font-size:50px; color : #a94442;"></i>
														</div>
														<div class="col-md-10 col-sm-9 col-xs-9">
															<span style="font-size:18px;"><strong>Message contains Spam Word!!!</strong> <br/>Please input a good and civilized messages !!!</span>
														</div>
													</div>							
							');
							redirect('Main/contact');
							// echo "message contain spam word";
							// die();
						}else{
							$filterisi = $input;
							// echo "message allow : ". $filterisi;
						}

						// die();
									  $ip = getenv('HTTP_CLIENT_IP')?:
											getenv('HTTP_X_FORWARDED_FOR')?:
											getenv('HTTP_X_FORWARDED')?:
											getenv('HTTP_FORWARDED_FOR')?:
											getenv('HTTP_FORWARDED')?:
											getenv('REMOTE_ADDR');
											
											$mac='UNKNOWN';
											foreach(explode("\n",str_replace(' ','',trim(`getmac`,"\n"))) as $i)
											if(strpos($i,'Tcpip')>-1){$mac=substr($i,0,17);break;}
											
											$localIP = getHostByName(getHostName()); 
											$device = getDeviceType();

											$date = $date = date('d F Y, h:i:s A');
									
											$fusr = filter_nama($usr);
											
											$fcompany = filter_textarea($company);
											$fisi = filter_textarea($filterisi);
											$femel = filter_email($emel);
											$ftelepon = filter_phone_number($telepon);

								
											// var_dump($ambilPublikip['ip']);
											// var_dump($ambilUserip);

											$filter_ip_pengguna 	= $ambilUserip;
											$filter_ip_publik 		= $ambilPublikip['ip'];
											$filter_host 			= $ambilPublikip['hostname'];
											$filter_cty 			= $ambilPublikip['city'];
											$filter_reg 			= $ambilPublikip['region'];
											$filter_cnt 			= $ambilPublikip['country'];

											$filter_loc 			= $ambilPublikip['loc'];
											$filter_org 			= $ambilPublikip['org'];
											$filter_timezone 		= $ambilPublikip['timezone'];

											$dataPb = array(
												"ip_pengguna" => $filter_ip_pengguna,
												"ip_publik_pengguna" => $filter_ip_publik,
												"host" => $filter_host,
												"address" => array(
													"city" => $filter_cty,
													"region" => $filter_reg,
													"country" => $filter_cnt
												),
												"zone" => array(
													array(
														"time_zone" => $filter_timezone,
														"location" => $filter_loc,
														"organization" => $filter_org
													)
												)
											);
											
											// Mengonversi array ke format JSON
											$json_dataPb = json_encode($dataPb, JSON_PRETTY_PRINT);
											
											if($fcompany == "" or $fcompany == null){
												$cmpn = "-";
											}else{
												$cmpn = $fcompany;
											}
											
											$data = array(
												 'name'			=> $fusr,
												 'company'		=> $cmpn,
												 'email'		=> $femel,
												 'phone'  		=> $ftelepon,
												 'logmessage'	=> $fisi,
												 'ip'	  		=> $ip,
												 'local_ip'		=> $localIP,
												 'mac'	  		=> $mac,
												 'device' 		=> $device,
												 'dt_visit'		=> $json_dataPb,
												 'date'  		=> $date
											);
											
						
											
											if($fusr == null or $femel == null or $ftelepon == null or $fisi == null){
												// echo 'CAPTCHA is incorrect. Please try again .';
												$this->session->set_flashdata('message', '	
													<div class="col-md-12 col-sm-12 col-xs-12 alert alert-danger d-flex align-items-left" role="alert">
														<div class="col-md-2 col-sm-3 col-xs-3">
															<i class="fa fa-ban" style="font-size:50px; color : #a94442;"></i>
														</div>
														<div class="col-md-10 col-sm-9 col-xs-9">
															<span style="font-size:18px;"><strong>We Sorry </strong><br/>
															<b>FAILED send message!</b> please input again!!
															</span>
														</div>
													</div>													
												
												');
												// redirect('Main/contact');
											}else{	
												$this->M_main->insert_quest($data,'questions');
													//send email ========================================================================			
														// curl
														$nmcontent = 'Contact Form Simasre';
														$subjekml = "Mail From Web Simasre - Contact Form";
														$urlx = 'https://api.kbru.co.id/eclaim/ci/sendmail_contact_simasre.php';

														$data = json_encode([
														'name'		=> $fusr,
														'company'	=> $cmpn,
														'email'		=> $femel,
														'phone'  	=> $ftelepon,
														'message'	=> $fisi
														]);

														// var_dump("<br/><br/>");
														// var_dump($data);
														// var_dump("<br/><br/>");

														$key = '43dghgii#$S1masR3$f@$^*54';   // Ensure this key is kept secret and secure
														$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')); // Generate an initialization vector			
														$encrypted_data = encrypt($data, $key, $iv);
														// var_dump($encrypted_data);	

														$postData = base64_encode($encrypted_data);
														// $data = array($postData);
														// var_dump($postData);
														// ----------------------------------- untuk cek decode
														// $decodepostData = base64_decode($encrypted_data);
														// var_dump($decodepostData);
														// ----------------------------------- untuk cek decode end

														
														$response = postData($urlx, $postData);

														// $response = makePostRequest($urlx, $postData);
														// $response = makePostRequest('#', $postData);
														// echo $respose;
														// die();
															echo 'Submitted successfull.';

															$this->session->set_flashdata('message', '																	
																<div class="col-md-12 col-sm-12 col-xs-12 alert alert-success d-flex align-items-left" role="alert">
																	<div class="col-md-2 col-sm-3 col-xs-3">
																		<i class="fa fa-check-square-o" style="font-size:50px; color : #009f11;"></i>
																	</div>
																	<div class="col-md-10 col-sm-9 col-xs-9">
																		<span style="font-size:18px;">SUCCESS send message.</b>, Thankyou for your participation.</span>
																	</div>
																</div>	
															');	

															redirect('Main/contact');
														die();

														//send email end =======================================================================
											
											}
											
											 // die();	

					
					} else {
						echo 'CAPTCHA is incorrect. Please try again.';
						$this->session->set_flashdata('message', '						
							<div class="col-md-12 col-sm-12 col-xs-12 alert alert-danger d-flex align-items-left" role="alert">
								<div class="col-md-2 col-sm-3 col-xs-3">
									<i class="fa fa-warning" style="font-size:50px; color : #a94442;"></i>
								</div>
								<div class="col-md-10 col-sm-9 col-xs-9">
									<span style="font-size:18px;">Your message failed send!<br/><b> CAPTCHA is incorrect! </b> Please try input again!!</span>
								</div>
							</div>	
						');
					redirect('Main/contact');
					}								

					
					
				


			
			
			
			
			
			


			
			
		}
		
		
				
	}


?>
