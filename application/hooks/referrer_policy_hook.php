<?php
function add_referrer_policy_header() {
    $CI =& get_instance();
    header("Referrer-Policy: " . $CI->config->item('referrer_policy'));
}
