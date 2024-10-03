<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_admin extends CI_Model {
		
		
		private $_batchImport;

		//get - just for view
		function cek_login($table, $where){		
		return $this->db->get_where($table, $where);
		}

		public function ambil_user($username) {
			// Mendapatkan user berdasarkan username
			return $this->db->get_where('m_user', ['username' => $username])->row();
		}
		

		function get_infoheader(){
			$this->db->select("*");
			$this->db->from("history");
			$this->db->where('status','akt');
			$query = $this->db->get();

			return $query->result();
		}
		
		function get_history(){
			$this->db->select("*");
			$this->db->from("history");
			$this->db->where('status','akt');
			$query = $this->db->get();

			return $query->result();
		}
		
		public function get_flowclmjudul(){
			$data=$this->db->query("
				SELECT
				  flow_claim.id_claim,
				  flow_claim.judul,
				  flow_claim.point,
				  flow_claim.image,
				  flow_claim.isi_kontak,
				  flow_claim.bahasa,
				  flow_claim.status
				FROM
				  flow_claim
				  where status = 'akt'
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
				  where bahasa = '".$bhs."'
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
				  where bahasa = '".$bhs."'
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
					 where menu.bahasa = '".$bhs."'
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
				  where bahasa = '".$bhs."'
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
				  where bahasa = '".$bhs."'
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
				  where bahasa = '".$bhs."'
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
				  where bahasa = '".$bhs."'
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
				  where bahasa = '".$bhs."'
				  group by direksi
			")->result_array();
			return $data;
		}
		
		public function get_bodx(){
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
				  where bahasa = '".$bhs."'
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
				  where bahasa = '".$bhs."'
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
				  where bahasa = '".$bhs."'
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
				  where bahasa = '".$bhs."'
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
				  where bahasa = '".$bhs."'
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
				  where bahasa = '".$bhs."'
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
				  where bahasa = '".$bhs."'
			")->result_array();
			return $data;
		}
		
		
		//crud
	public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_info" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from mahasiswa where IdMhsw='$id'
    }
	
	public function getByIdhistory($id)
    {
        return $this->db->get_where($this->table, ["id_history" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from mahasiswa where IdMhsw='$id'
    }
	
	function edit_datahistory($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
	function update_datahistory($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}	
	
	function hapus_datahistory($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	/////////////////home flow clm //////////////////
	
	function update_dataclm($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}	
	
	/////////////////home slider //////////////////
	
	public function get_sliderx(){
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
		")->result_array();
		return $data;
	}
	
	
	function insert_sliderx($data,$table){
		$this->db->insert($table,$data);
	}
	
	function edit_sliderx($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
		
	function update_datasliderx($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}
	
	function hapus_datasliderx($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function update_statussliderx($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	/////////////////home ICON PRODUK //////////////////
	
	public function get_iconpro(){
		$data=$this->db->query("
			SELECT
			  icon_product.id,
			  icon_product.icon,
			  icon_product.title,
			  icon_product.isi,
			  icon_product.bahasa,
			  icon_product.status
			FROM
			  icon_product
		")->result_array();
		return $data;
	}
	
	
	function insert_iconpro($data,$table){
		$this->db->insert($table,$data);
	}
	
	function edit_iconpro($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
		
	function update_dataiconpro($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}
	
	function hapus_dataiconpro($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function update_statusiconpro($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	
	
	/////////////////home COB //////////////////
	
	public function get_cob(){
		$data=$this->db->query("
			SELECT
			  a.id_cob,
			  a.produk,
			  a.detail,
			  a.url,
			  a.bahasa,
			  a.status
			FROM
			  cob a
		")->result_array();
		return $data;
	}
	
	
	function insert_cob($data,$table){
		$this->db->insert($table,$data);
	}
	
	function edit_cob($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
		
	function update_datacob($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}
	
	function hapus_datacob($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function update_statuscob($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	///////////////// cedant //////////////////
	
	public function get_cedant(){
		$data=$this->db->query("
			SELECT
			  a.id,
			  a.asuransi,
			  a.link_perusahaan,
			  a.bahasa,
			  a.status
			FROM
			  support_cedant a
		")->result_array();
		return $data;
	}
	
	
	function insert_cedant($data,$table){
		$this->db->insert($table,$data);
	}
	
	function edit_cedant($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
		
	function update_datacedant($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}
	
	function hapus_datacedant($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function update_statuscedant($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	///////////////// reinsurance //////////////////
	
	public function get_reinsurance(){
		$data=$this->db->query("
			SELECT
			  a.id,
			  a.negara,
			  a.reinsurance,
			  a.gbr,
			  a.flags,
			  a.status
			FROM
			  support_reinsurance a
		")->result_array();
		return $data;
	}
	
	
	public function get_reas(){
		$data=$this->db->query("
			SELECT
			  a.id,
			  a.id_country,
			  b.negara,
			  b.flags,
			  a.insurance,
			  a.upload_ins,
			  a.stat
			FROM
			  support_reins_ins a
			  INNER JOIN support_reins_country b ON a.id_country =
				b.id_country
			where a.stat = 'akt'
			 and  b.status = 'akt'	
		")->result_array();
		return $data;
	}
	
	public function get_edit_reas($id){
		$data=$this->db->query("
			SELECT
			  support_reins_ins.id,
			  support_reins_ins.id_country,
			  support_reins_country.negara,
			  support_reins_country.flags,
			  support_reins_ins.insurance,
			  support_reins_ins.upload_ins,
			  support_reins_ins.stat
			FROM
			  support_reins_ins
			  INNER JOIN support_reins_country ON support_reins_ins.id_country =
				support_reins_country.id_country
			where support_reins_ins.stat = 'akt' 
			and support_reins_country.status = 'akt'
			and support_reins_ins.id =	'".$id."'
			
		")->result_array();
		return $data;
	}
	

	
	
	function insert_reinsurance($data,$table){
		$this->db->insert($table,$data);
	}
	
	function edit_reinsurance($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
		
	function update_datareinsurance($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}
	
	function hapus_datareinsurance($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function update_statusreinsurance($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	///////////////// visimisi //////////////////
	
	public function get_visimisi(){
		$data=$this->db->query("
			SELECT
			  a.id,
			  a.icon,
			  a.title,
			  a.isi,
			  a.bahasa,
			  a.status
			FROM
			  visimisi a
		")->result_array();
		return $data;
	}
	
	
	function insert_visimisi($data,$table){
		$this->db->insert($table,$data);
	}
	
	function edit_visimisi($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
		
	function update_datavisimisi($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}
	
	function hapus_datavisimisi($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function update_statusvisimisi($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	
	//////////////// bod //////////////////
	
	public function get_bod(){
		$data=$this->db->query("
			SELECT
			  a.id,
			  a.typekey,
			  a.type_group,
			  a.poto,
			  a.name,
			  a.title,
			  a.det_title,
			  a.bahasa,
			  a.status
			FROM
			  team a
		")->result_array();
		return $data;
	}
	
	
	function insert_bod($data,$table){
		$this->db->insert($table,$data);
	}
	
	function edit_bod($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
		
	function update_databod($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}
	
	function hapus_databod($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function update_statusbod($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	
	//////////////// map //////////////////
	
	public function get_map(){
		$data=$this->db->query("
			SELECT
			  a.id,
			  a.titlemap,
			  a.embed_map,
			  a.bahasa,
			  a.status
			FROM
			  map a
		")->result_array();
		return $data;
	}
	
	
	function insert_map($data,$table){
		$this->db->insert($table,$data);
	}
	
	function edit_map($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
		
	function update_datamap($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}
	
	function hapus_datamap($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function update_statusmap($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	
	//////////////// activity //////////////////
	
	public function get_activity(){
		$data=$this->db->query("
			SELECT
			  a.id,
			  a.title,
			  a.activity,
			  a.bahasa,
			  a.status
			FROM
			  news_activity a
		")->result_array();
		return $data;
	}
	
	
	function insert_activity($data,$table){
		$this->db->insert($table,$data);
	}
	
	function edit_activity($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
		
	function update_activity($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}
	
	function hapus_activity($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function update_statusactivity($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	//////////////// contactinfo //////////////////
	
	public function get_contactinfo(){
		$data=$this->db->query("
			SELECT
			  a.id,
			  a.title,
			  a.address,
			  a.bahasa,
			  a.status
			FROM
			  contact_info a
		")->result_array();
		return $data;
	}
	
	
	function insert_contactinfo($data,$table){
		$this->db->insert($table,$data);
	}
	
	function edit_contactinfo($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
		
	function update_datacontactinfo($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}
	
	function hapus_datacontactinfo($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function update_statuscontactinfo($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	
	//////////////// gallery //////////////////
	
	public function get_gallery(){
		$data=$this->db->query("
			SELECT
			  a.id,
			  a.title,
			  a.gbr,
			  a.status
			FROM
			  gallery a
		")->result_array();
		return $data;
	}
	
	
	function insert_gallery($data,$table){
		$this->db->insert($table,$data);
	}
	
	function edit_gallery($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
		
	function update_datagallery($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}
	
	function hapus_datagallery($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function update_statusgallery($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	public function get_country(){
			$data=$this->db->query("
				SELECT
				  a.id_country,
				  a.negara,
				  a.status
				FROM
				  support_reins_country a
				  where status = 'akt'
			")->result_array();
			return $data;
		}
	
	
	
}
?>
