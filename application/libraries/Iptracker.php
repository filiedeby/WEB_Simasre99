<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*********************************************************************
 * Description: Tracks the number of website visits everyday. 
 * Version: 1.0.0
 * Date Created: January 09, 2015
 * Author: Glenn Tan Gevero
 * Website: http://app-arsenal.com
 * File: IP Tracker Library File
**********************************************************************/

class Iptracker{
		
	private $sys = null;
	
	public function __construct(){
		$this->sys	=& get_instance();
        $this->sys->load->library('user_agent');

	}

	private static function get_ip_address(){		
		$ip = getenv('HTTP_CLIENT_IP')?:
			getenv('HTTP_X_FORWARDED_FOR')?:
			getenv('HTTP_X_FORWARDED')?:
			getenv('HTTP_FORWARDED_FOR')?:
			getenv('HTTP_FORWARDED')?:
			getenv('REMOTE_ADDR');		
		return $ip;
	}
	
	private function get_page_visit(){
		return current_url();
	}
    
    private function get_user_agent(){        
        if ($this->sys->agent->is_browser()){
            $agent = $this->sys->agent->browser().' '.$this->sys->agent->version();
        }
        elseif ($this->sys->agent->is_robot()){
            $agent = $this->sys->agent->robot();
        }
        elseif ($this->sys->agent->is_mobile()){
            $agent = $this->sys->agent->mobile();
        }
        else{
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
	
	public function save_site_visit(){

		//bru -------------------------------------------------------------
		// Fungsi untuk mendapatkan IP publik
			function getPublicIP() {
				$url = "https://ipinfo.io/json";   

				$ch = curl_init();
				$headers = [
					'Content-Type: application/x-www-form-urlencoded',
					'Access-Control-Allow-Origin: *'
				];
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Agar hasil response dikembalikan sebagai string
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

					$response = curl_exec($ch);
					curl_close($ch);
					$data = json_decode($response, true);
				return $data;
			}

		// Mendapatkan IP pengguna
			function getUserIP() {
					if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
						$ip = $_SERVER['HTTP_CLIENT_IP'];
					} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
						$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
					} else {
						$ip = $_SERVER['REMOTE_ADDR'];
					}

					return $ip;
				}

		//bru -------------------------------------------------------------

		function filter_ip($ip) {
			// Define the allowed characters
			$allowedChars = '/[^0-9.]/';

			// Replace any character not in the allowed set with an empty string
			$filteredInput = preg_replace($allowedChars, '', $ip);

			return $filteredInput;
		}

		function filterHurufAngkaDanKarakterKhusus($input) {
			// Menghapus semua karakter selain huruf, angka, "/", ":", dan "."
			return preg_replace("/[^a-zA-Z0-9\/:\.\-\s]/", "", $input);
		}

		$ip 	= self::get_ip_address();
		$filterip = filter_ip($ip);
		$page	= self::get_page_visit();
        $agent  = self::get_user_agent();
		$seg    = explode("-", $page);

		// Mendapatkan IP publik
		$publicIP = getPublicIP();

		// Mendapatkan IP pengguna
		$userIP = getUserIP();

		$filter_ip_pengguna 	= filter_ip($userIP);
		$filter_ip_publik 		= filter_ip($publicIP['ip']);
		$filter_host 			= filterHurufAngkaDanKarakterKhusus(gethostname());
		$filter_add 			= filterHurufAngkaDanKarakterKhusus($publicIP['city'] . " / ". $publicIP['region'] . " / ". $publicIP['country'] );
		$filter_loc 			= filterHurufAngkaDanKarakterKhusus($publicIP['loc']);
		$filter_org 			= filterHurufAngkaDanKarakterKhusus($publicIP['org']);
		$filter_timezone 		= filterHurufAngkaDanKarakterKhusus($publicIP['timezone']);

		$filter_ag 				= filterHurufAngkaDanKarakterKhusus($agent);
		$filter_seg 			= filterHurufAngkaDanKarakterKhusus($seg);

		if (is_array($filter_seg)) {
			$filter_seg = implode(", ", $filter_seg); // Ubah array menjadi string
		}
		
		date_default_timezone_set("Asia/Jakarta");
		$filter_date			= date("Y-m-d H:i:s");

		
		// ------------------------- log traking txt --------------------------------------
		
		// Memformat data untuk disimpan ke file
		$dateTime = date('Y-m-d H:i:s');
		$logData = "Timestamp: $dateTime\n";
		$logData .= "Page URL: $filter_seg\n";
		$logData .= "Tools : $filter_ag\n";
		$logData .= "IP Address: " . $filter_ip_publik . "\n";
		$logData .= "City: " . $publicIP['city'] . "\n";
		$logData .= "Region: " . $publicIP['region'] . "\n";
		$logData .= "Country: " . $publicIP['country'] . "\n";
		$logData .= "Location: " . $publicIP['loc'] . "\n";
		$logData .= "-------------------------------------\n";
	
		// Membuat atau memperbarui file log berdasarkan tanggal saat ini
		$fileName = "trace_" . date('d-m-y') . ".txt";
		$filePath = "/var/log/tracking/" . $fileName; //linux
		// $filePath = "c:/var/log/tracking/" . $fileName; //windows
	
		// Menyimpan data log ke dalam file
		file_put_contents($filePath, $logData, FILE_APPEND); 

		// ------------------------- log end txt -----------------------------------------

		
        //Uncomment the IF Statement if you do not want your own admin pages to be tracked. Change the value of the needle ('admin) to the segments (URI) found in your admin pages.
		//if(!in_array('admin', $seg)){			
			$data = array(
				'ip'            	=> $ip,
				'ip_lc_pengguna'    => $filter_ip_pengguna,
				'ip_pb'			    => $filter_ip_publik,
				'host_pb'			=> $filter_host,
				'host_add'			=> $filter_add,
				'host_loc'			=> $filter_loc,
				'host_org'			=> $filter_org,
				'host_tm_zone'		=> $filter_timezone,
				'page_view'     	=> $page,
                'user_agent'    	=> $agent,
				'date'          	=> $filter_date
			);
			
			$this->sys->db->insert('site_visits', $data);			
		//}
	}
}

$tracker = new Iptracker();
$tracker->save_site_visit();
