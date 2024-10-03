<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_main extends CI_Model {
		
		
		public function get_sejarah(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  history.id_history,
				  history.title,
				  history.isi,
				  history.bahasa,
				  history.status
				  
				FROM
				  history
				  where bahasa = '".$bhs."' and status='akt'
				  group by title
			")->result_array();
			return $data;
		}
		
		public function get_slide(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  slider.id_slider,
				  slider.content1,
				  slider.content2,
				  slider.images,
				  slider.bahasa,
				  slider.status
				  
				FROM
				  slider
				  where bahasa = '".$bhs."' and status='akt'
				  group by id_slider
				  order by id_slider asc
			")->result_array();
			return $data;
		}
		
		public function get_icoproduct(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  icon_product.id,
				  icon_product.icon,
				  icon_product.title,
				  icon_product.isi,
				  icon_product.url,
				  icon_product.bahasa,
				  icon_product.status
				  
				FROM
				  icon_product
				  where bahasa = '".$bhs."' and status='akt'
				  group by id 
				  order by id asc
			")->result_array();
			return $data;
		}
		
		
		public function get_disclaimer(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  disclaimer.id,
				  disclaimer.type,
				  disclaimer.isi,
				  disclaimer.bahasa,
				  disclaimer.status
				  
				FROM
				  disclaimer
				  where bahasa = '".$bhs."' and status='akt'
				  group by id
				  order by id asc
			")->result_array();
			return $data;
		}
		
		public function get_contact(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  contact_info.id,
				  contact_info.title,
				  contact_info.address,
				  contact_info.status
				  
				FROM
				  contact_info
				  where bahasa = '".$bhs."' and status='akt'
				  group by id
				  order by id asc 
			")->result_array();
			return $data;
		}
		
		
		public function get_sosmed(){

			$data=$this->db->query("
				SELECT
				  sosmed.id,
				  sosmed.icon,
				  sosmed.type_sosmed,
				  sosmed.link,

				  sosmed.status
				  
				FROM
				  sosmed
				where status='akt'  

			")->result_array();
			return $data;
		}
		
		public function get_gallery(){

			$data=$this->db->query("
				SELECT
				  gallery.id,
				  gallery.title,
				  gallery.gbr,
				  gallery.status
				  
				FROM
				  gallery
				  where status = 'akt'
				 order by id desc
				 limit 12

			")->result_array();
			return $data;
		}
		
		public function get_cob(){
		if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}	

			$data=$this->db->query("
				SELECT
				  cob.id_cob,
				  cob.produk,
				  cob.detail,
				  cob.url,
				  cob.status
				  
				FROM
				  cob
				  where bahasa = '".$bhs."' and status='akt'
				  group by id_cob 
				  order by id_cob asc 

			")->result_array();
			return $data;
		}
		
		public function get_cob1($cob1){
		if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}	

			$data=$this->db->query("
				SELECT
				  cob.id_cob,
				  cob.produk,
				  cob.detail,
				  cob.status
				  
				FROM
				  cob
				  where bahasa = '".$bhs."' and url LIKE '".$cob1."'  and status='akt'
				  group by id_cob 
				  order by id_cob asc 

			")->result_array();
			return $data;
		}
		
		public function get_cob2($cob2){
		if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}	

			$data=$this->db->query("
				SELECT
				  cob.id_cob,
				  cob.produk,
				  cob.detail,
				  cob.status
				  
				FROM
				  cob
				  where bahasa = '".$bhs."' and url LIKE '".$cob2."'  and status='akt'
				  group by id_cob 
				  order by id_cob asc 

			")->result_array();
			return $data;
		}
		public function get_cob3($cob3){
		if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}	

			$data=$this->db->query("
				SELECT
				  cob.id_cob,
				  cob.produk,
				  cob.detail,
				  cob.status
				  
				FROM
				  cob
				  where bahasa = '".$bhs."' and url LIKE '".$cob3."'  and status='akt'
				  group by id_cob
				  order by id_cob asc 

			")->result_array();
			return $data;
		}
		public function get_cob4($cob4){
		if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}	

			$data=$this->db->query("
				SELECT
				  cob.id_cob,
				  cob.produk,
				  cob.detail,
				  cob.status
				  
				FROM
				  cob
				  where bahasa = '".$bhs."' and url LIKE '".$cob4."'  and status='akt'
				  group by id_cob 
				  order by id_cob asc

			")->result_array();
			return $data;
		}
		public function get_cob5($cob5){
		if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}	

			$data=$this->db->query("
				SELECT
				  cob.id_cob,
				  cob.produk,
				  cob.detail,
				  cob.status
				  
				FROM
				  cob
				  where bahasa = '".$bhs."' and url LIKE '".$cob5."'  and status='akt'
				  group by id_cob
				  order by id_cob asc 

			")->result_array();
			return $data;
		}
		
		
		public function get_cedant(){
		if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}	

			$data=$this->db->query("
				SELECT
				  support_cedant.id,
				  support_cedant.asuransi,
				  support_cedant.link_perusahaan,
				  support_cedant.upload_cedant,
				  support_cedant.status
				  
				FROM
				  support_cedant
				  where bahasa = '".$bhs."' and status='akt'
				  group by id 
				  order by id asc

			")->result_array();
			return $data;
		}
		
		public function get_reas(){
		if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}	

				
			$data=$this->db->query("	
			SELECT
			  a.id,
			  a.id_country,
			  b.negara,
			  b.gbr,
			  b.flags,
			  a.insurance,
			  a.upload_ins,
			  a.stat
			FROM
			  support_reins_ins a
			  INNER JOIN support_reins_country b ON a.id_country =
				b.id_country
			where a.stat = 'akt'
			and b.status = 'akt'
				   

			")->result_array();
			return $data;
		}
		
		public function get_detailreas(){
		if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}	

			$data=$this->db->query("
				SELECT
				  support_reinsurance.id,
				  support_reinsurance.negara,
				  support_reinsurance.reinsurance,
				  support_reinsurance.gbr,
				  support_reinsurance.flags,
				  support_reinsurance.status
				  
				FROM
				  support_reinsurance
				where  status='akt'  
				  group by id
				  order by id asc 

			")->result_array();
			return $data;
		}
		
	public function get_posisireindo($indo)
	{
		
		$data=$this->db->query("
		SELECT
		  a.id,
		  a.id_country,
		  b.negara,
		  b.gbr,
		  a.insurance,
		  a.upload_ins,
		  a.stat
		FROM
		  support_reins_ins a
		  INNER JOIN support_reins_country b ON a.id_country =
			b.id_country
		where  b.negara like '%".$indo."%' and a.stat  = 'akt'
		
		")->result_array();
		return $data;
	}
		
	public function get_posisiresgp($sgp)
	{
		
		$data=$this->db->query("
		SELECT
		  a.id,
		  a.id_country,
		  b.negara,
		  b.gbr,
		  a.insurance,
		  a.upload_ins,
		  a.stat
		FROM
		  support_reins_ins a
		  INNER JOIN support_reins_country b ON a.id_country =
			b.id_country
		where  b.negara like '%".$sgp."%' and a.stat  = 'akt'
		
		")->result_array();
		return $data;
	}
		
	public function get_posisiremly($mly)
	{
		
		$data=$this->db->query("
		SELECT
		  a.id,
		  a.id_country,
		  b.negara,
		  b.gbr,
		  a.insurance,
		  a.upload_ins,
		  a.stat
		FROM
		  support_reins_ins a
		  INNER JOIN support_reins_country b ON a.id_country =
			b.id_country
		where  b.negara like '%".$mly."%' and a.stat  = 'akt'
		
		")->result_array();
		return $data;
	}
		
	public function get_posisirehkg($hkg)
	{
		
		$data=$this->db->query("
		SELECT
		  a.id,
		  a.id_country,
		  b.negara,
		  b.gbr,
		  a.insurance,
		  a.upload_ins,
		  a.stat
		FROM
		  support_reins_ins a
		  INNER JOIN support_reins_country b ON a.id_country =
			b.id_country
		where  b.negara like '%".$hkg."%' and a.stat  = 'akt'
		
		")->result_array();
		return $data;
	}
		
	public function get_posisirekor($kor)
	{
		
		$data=$this->db->query("
		SELECT
		  a.id,
		  a.id_country,
		  b.negara,
		  b.gbr,
		  a.insurance,
		  a.upload_ins,
		  a.stat
		FROM
		  support_reins_ins a
		  INNER JOIN support_reins_country b ON a.id_country =
			b.id_country
		where  b.negara like '%".$kor."%' and a.stat  = 'akt'
		
		")->result_array();
		return $data;
	}
	
	public function get_posisireinter()
	{
		
		$data=$this->db->query("
		SELECT
			a.id,
			a.id_country,
			b.negara,
			b.gbr,
			a.insurance,
			a.upload_ins,
			a.stat
		FROM
			support_reins_ins a
		INNER JOIN support_reins_country b 
			ON a.id_country = b.id_country
		where  
			b.negara not like '%indo%'
			and a.stat  = 'akt'
			and b.status  = 'akt'		
		")->result_array();
		return $data;
	}
		
		
		
		

		
		public function get_flowclmjudul(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  flow_claim.judul,
				  flow_claim.bahasa
				FROM
				  flow_claim
				  where bahasa = '".$bhs."' and status='akt'
				  group by judul
			")->result_array();
			return $data;
		}
		public function get_flowclm(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  flow_claim.judul,
				  flow_claim.point,
				  flow_claim.image,
				  flow_claim.isi_kontak,
				  flow_claim.bahasa
				FROM
				  flow_claim
				  where bahasa = '".$bhs."' and status='akt'
			")->result_array();
			return $data;
		}
		
		public function get_insta(){
			$data=$this->db->query("
				SELECT
				  instagram.judul,
				  instagram.embed
				FROM
				  instagram
			")->result_array();
			return $data;
		}
		
		public function get_insta2(){
			$data=$this->db->query("
				SELECT
				  instagram2.gbr,
				  instagram2.url,
				  instagram2.bahasa
				FROM
				  instagram2
			")->result_array();
			return $data;
		}
		
		public function get_buletin(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  buletin.gbr,
				  buletin.url,
				  buletin.bahasa
				FROM
				  buletin
				  where bahasa = '".$bhs."' and status='akt'
			")->result_array();
			return $data;
		}
		
		public function get_menu(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			// $data=$this->db->query("
				// SELECT
				  // menu.menuid,
				  // menu.menu,
				  // menu.submenu,
				  // menu.url,
				  // menu.bahasa
				// FROM
				  // menu
				  // where bahasa = '".$bhs."'
				  // group by menu
			// ")->result_array();
			$data=$this->db->query("
					SELECT
					`menu`.`menuid`,
					`menu`.`menu`,
					`menu_det`.`submenu`,
					`menu`.`url`,
					`menu`.`bahasa`
					FROM
					`menu`
					inner JOIN `menu_det` ON `menu_det`.`menuid` = `menu`.`menuid`
					 where stat = 'y' and menu.bahasa = '".$bhs."' and status='akt'
					group by menu.menuid
					order by menu.menuid asc 
			")->result_array();
			
			
			
			return $data;
		}
		
		public function get_menudetail(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  menu_det.menuid,
				  menu_det.menu,
				  menu_det.submenu,
				  menu_det.url,
				  menu_det.bahasa
				FROM
				  menu_det
				  where bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}
		
		public function get_produk(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  produk.id,
				  produk.idproduk,
				  produk.produk,
				  produk.judul,
				  produk.gbr,
				  produk.isi,
				  produk.code,
				  produk.bahasa
				FROM
				  produk
				  where bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}
		
		public function get_komitmen(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  komitmen.idkomit,
				  komitmen.judul,
				  komitmen.isi,
				  komitmen.gbr,
				  komitmen.bahasa
				FROM
				  komitmen
				  where bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}

		public function get_testi(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  testi.judul,
				  testi.url,
				  testi.gbr,
				  testi.bahasa
				FROM
				  testi
				  where bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}
		
		public function get_visimisi(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  visimisi.icon,
				  visimisi.title,
				  visimisi.isi,
				  visimisi.bahasa
				FROM
				  visimisi
				  where bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}
		
		public function get_team(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  team.id,
				  team.typekey,
				  team.type_group,
				  team.name,
				  team.title,
				  team.det_title
				FROM
				  team
				  where bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}
		
		public function get_act(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  a.id,
				  a.title,
				  a.activity,
				  a.bahasa,
				  a.status
				FROM
				  news_activity a
				  where a.bahasa = '".$bhs."' and a.status = 'akt'
			")->result_array();
			return $data;
		}
		
		
		public function get_news($language, $limit, $start) {
			$this->db->where('bahasa', $language);
			$this->db->order_by('recdate', 'DESC');
			$this->db->limit($limit, $start);
			$query = $this->db->get('news_activity');
			return $query->result_array();
		}

		public function get_news_count($language) {
			$this->db->where('bahasa', $language);
			return $this->db->count_all_results('news_activity');
		}
		
		
		
		
		
		
		public function get_teamcms(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'IDN';
			}else{
				$bhs = 'ENG';
			}
			$data=$this->db->query("
				SELECT
				  team.id,
				  team.type_group,
				  team.poto,
				  team.name,
				  team.title,
				  team.det_title
				FROM
				  team
				  where typekey = 'cms' and bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}
		
		public function get_teambod(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'IDN';
			}else{
				$bhs = 'ENG';
			}
			$data=$this->db->query("
				SELECT
				  team.id,
				  team.type_group,
				  team.poto,
				  team.name,
				  team.title,
				  team.det_title
				FROM
				  team
				  where typekey = 'bod' and bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}
		
		public function get_teamlead(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  team.id,
				  team.type_group,
				  team.poto,
				  team.name,
				  team.title,
				  team.det_title
				FROM
				  team
				  where typekey = 'lead' and bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}
		
		public function get_kontaaak(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  contact_info.id,
				  contact_info.title,
				  contact_info.address
				FROM
				  contact_info
				  where bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}
		
		public function get_map(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  map.id,
				  map.titlemap,
				  map.embed_map
				FROM
				  map
				  where bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}
		
		
		
		
		public function get_judulbod(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  bod.direksi,
				  bod.bahasa
				FROM
				  bod
				  where bahasa = '".$bhs."' and status = 'akt'
				  group by direksi
			")->result_array();
			return $data;
		}
		
		public function get_bod(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  bod.gelar,
				  bod.gbr,
				  bod.nama,
				  bod.bahasa
				FROM
				  bod
				  where bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}
		public function get_csrjdl(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  csr.csrid,
				  csr.judul,
				  csr.isi,
				  csr.bahasa
				FROM
				  csr
				  where bahasa = '".$bhs."' and status = 'akt'
				  group by csrid
			")->result_array();
			return $data;
		}
		
		public function get_csr(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  csr_gbr.gbr,
				  csr_gbr.bahasa
				FROM
				  csr_gbr
				  where bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}
		
		public function get_logo(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  logo.judul,
				  logo.isi,
				  logo.bahasa
				FROM
				  logo
				  where bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}
		
		public function get_nilai(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  value.judul,
				  value.konten,
				  value.gbr,
				  value.bahasa
				FROM
				  value
				  where bahasa = '".$bhs."' and status = 'akt'
			")->result_array();
			return $data;
		}
		
		public function get_kontakkonten(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  kontak_konten.judul,
				  kontak_konten.nama,
				  kontak_konten.email,
				  kontak_konten.hp,
				  kontak_konten.pesan,
				  kontak_konten.tombol,
				  kontak_konten.bahasa
				FROM
				  kontak_konten
				  where bahasa = '".$bhs."' and status='akt'
			")->result_array();
			return $data;
		}
		
		public function get_lokasi(){
			if(get_cookie('lang_is') === 'en'){
				$bhs = 'ENG';
			}else{
				$bhs = 'IDN';
			}
			$data=$this->db->query("
				SELECT
				  lokasi.judul,
				  lokasi.gedung,
				  lokasi.alamat,
				  lokasi.bahasa
				FROM
				  lokasi
				  where bahasa = '".$bhs."' and status='akt'
			")->result_array();
			return $data;
		}
		
		function insert_quest($data,$table){
		$this->db->insert($table,$data);
		}
		
		
		
	}
?>
