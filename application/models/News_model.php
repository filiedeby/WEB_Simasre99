<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

    public function get_news($bahasa, $limit, $start) {
        $this->db->where('status', 'active');
        $this->db->where('bahasa', $bahasa);
        $this->db->limit($limit, $start);
        $query = $this->db->get('news_activity');
        return $query->result();
    }

    public function get_news_count($bahasa) {
        $this->db->where('status', 'active');
        $this->db->where('bahasa', $bahasa);
        return $this->db->count_all_results('news_activity');
    }
}
