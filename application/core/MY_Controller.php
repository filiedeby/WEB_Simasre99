<?php
class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Set Referrer-Policy header
		header("Referrer-Policy: no-referrer-when-downgrade");
	}
}
