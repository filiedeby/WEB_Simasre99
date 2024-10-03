<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServerInfo extends CI_Controller {

 public function index() {
        // Ambil data dari phpSysInfo XML API
        $url = base_url('phpsysinfo/xml.php?plugin=complete');
        $xml_data = simplexml_load_file($url);

        // Konversi XML menjadi JSON
        $json_data = json_encode($xml_data);
        $data['server_info'] = json_decode($json_data, true);

        // Load view
        $this->load->view('infserver/server_info', $data);
    }
}
