<?php

function add_csp_header() {
    $CI =& get_instance();
    $CI->output->set_header("Content-Security-Policy: default-src 'self'; script-src 'self'");
}

?>