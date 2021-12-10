<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
	function __construct() {
        parent::__construct();
		if (!isset($_SESSION['ftip69_uid'])) {
			redirect('login');
			exit;
		}
	}
	public function index()
	{
			$this->load->view('header_sidebar');
	    	$this->load->view('quiz');
	}
}
?>