<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_server extends CI_Model {

    public function getServerInfo() {
        $info = [];

        // Operating System
        $info['os'] = php_uname();

        // Server Name
        $info['server_name'] = $_SERVER['SERVER_NAME'];

        // Server IP
        $info['server_ip'] = $_SERVER['SERVER_ADDR'];

        // Processor
        $info['cpu'] = shell_exec('lscpu');

        // Memory / RAM
        $info['memory'] = shell_exec('free -m');

        // Hard Drive
        $info['disk'] = shell_exec('df -h');

        // Network Interfaces
        $info['network'] = shell_exec('ifconfig');

        // File Systems
        $info['file_systems'] = shell_exec('df -T');


        return $info;
    }
}
