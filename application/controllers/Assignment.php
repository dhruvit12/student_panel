<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignment extends CI_Controller {
	function __construct() {
        parent::__construct();
		if (!isset($_SESSION['ftip69_uid'])) {
			redirect('login');
			exit;
		}
	}
	function index()
	{
		$this->load->view('one_sidebar');
		$this->load->view('course_header');
		$this->load->view('assignment');
	}
}

?>