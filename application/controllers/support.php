<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller {
	function __construct() {
        parent::__construct();
		if (!isset($_SESSION['ftip69_uid'])) {
			redirect('login');
			exit;
		}
	}
	function index()
	{
		$this->load->view('header');
		$this->load->view('support');
	}
}

?>