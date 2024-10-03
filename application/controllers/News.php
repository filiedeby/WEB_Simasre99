<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url', 'file'));
		date_default_timezone_set("Asia/Jakarta");
		$this->load->helper('bbcode');

		$this->load->model('M_images');
		$this->load->model("M_main");
		$this->load->library('session');
		$this->load->model('News_model');
        $this->load->library('pagination');
        $this->load->helper('cookie');
		
	}


//    ---------------------

    public function index() {
        // Get filter bahasa dari cookie 'lang_is'
        $lang_is = get_cookie('lang_is');

		// var_dump($lang_is);
        $bahasa = ($lang_is === 'en') ? 'ENG' : 'IDN';
		// var_dump($bahasa);


        // Pagination Configuration
        $config['base_url'] = site_url('news/index');
        $config['total_rows'] = $this->News_model->get_news_count($bahasa);

        $config['per_page'] = 1; // Jumlah data per halaman
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);

        $page = $this->input->get('per_page');
        $start = ($page && $page > 1) ? ($page - 1) * $config['per_page'] : 0;

        // Get news data
        $data['news'] = $this->News_model->get_news($bahasa, $config['per_page'], $start);
		// var_dump($data['news']);
        $data['pagination'] = $this->pagination->create_links();
   
		 
//    ----------------------

		$data['c_disclaimer'] = $this->M_main->get_disclaimer();
		$data['c_contact'] = $this->M_main->get_contact();
		$data['c_sosmed'] = $this->M_main->get_sosmed();
		$data['c_gallery'] = $this->M_main->get_gallery();

        $this->load->view('frontend/news_view', $data);
    }
}
