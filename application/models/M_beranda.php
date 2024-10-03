<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Artikel extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}

		function get_artikel(){
			$this->db->select("*");
			$this->db->from("artikel");
			if(get_cookie('lang_is') === 'en'){$this->db->where('bahasa','ENG');}else{$this->db->where('bahasa','IDN');}
			$query = $this->db->get();

			return $query->result();
		}
	}
?>