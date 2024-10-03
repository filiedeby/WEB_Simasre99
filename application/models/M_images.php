<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_images extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

	//support cedant
    public function get_images_scedant() {
        $query = $this->db->get('support_cedant');
        return $query->result_array();
    }

    public function get_image_scedant() {
		$id = $this->uri->segment('3');
        $query = $this->db->get_where('support_cedant', array('id' => $id));
        return $query->row_array();
    }
	
    public function create_image_scedant($data) {
        return $this->db->insert('support_cedant', $data);
    }

    public function update_image_scedant($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('support_cedant', $data);
    }

    public function delete_image_scedant($id) {
		$id = $this->uri->segment(3);
		if($this->get_image_scedant($id) !== null){
			
		}else{	
				$image = $this->get_image_scedant($id);
				if ($image) {
					$this->db->delete('support_cedant', array('id' => $id));
					if (file_exists('./assets/gbrupload/' . $image['upload_cedant'])) {
						unlink('./assets/gbrupload/' . $image['upload_cedant']);
					}
					return true;
				}else{
					$where = array('id' => $id);
					$hapus = $this->M_admin->hapus_datacedant($where,'support_cedant');
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
		}
		return false;		
    }
	
	//support reinsurance
    public function get_images_sreins() {
        $query = $this->db->get('support_reins');
        return $query->result_array();
    }

    public function get_image_sreins() {
        $query = $this->db->get_where('support_reins', array('id' => $id));
        return $query->row_array();
    }
	
    public function create_image_sreins($data) {
        return $this->db->insert('support_reins', $data);
    }

    public function update_image_sreins($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('support_reins', $data);
    }

    public function delete_image_sreins($id) {
        $image = $this->get_image($id);
        if ($image) {
            $this->db->delete('support_reins', array('id' => $id));
            if (file_exists('./assets/gbrupload/' . $image['upload_reins'])) {
                unlink('./assets/gbrupload/' . $image['upload_reins']);
            }
            return true;
        }
        return false;
    }
	
	
}
?>