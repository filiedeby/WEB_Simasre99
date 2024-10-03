<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Robots extends CI_Controller {

    public function index() {
        $allowed_user_agents = array('Googlebot', 'Bingbot', 'Yandex', 'Baidu');

        $user_agent = $this->input->user_agent();

        // Cek apakah agen pengguna diizinkan
        foreach ($allowed_user_agents as $allowed_user_agent) {
            if (stripos($user_agent, $allowed_user_agent) !== false) {
                $this->output->set_content_type('text/plain')
                             ->set_output(file_get_contents(FCPATH . 'robots.txt'));
                return;
            }
        }

        // Jika tidak diizinkan, tampilkan 403 Forbidden
        show_error('Access forbidden', 403);
    }
}
