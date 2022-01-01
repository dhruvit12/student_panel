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
		$this->load->view('one_sidebar');
		$this->load->view('course_header');
		$this->load->view('quiz');
		
	}
	public function mcq_test()
	{
		$this->load->view('one_sidebar');
		$this->load->view('course_header');
		$data['id']=$this->uri->segment(2);
	    $this->load->view('test/mcq-test-view',$data);
	 }
	 public function mcq_test_result()
	 {
		$this->load->view('one_sidebar');
		$this->load->view('course_header');
		$data['id']=$this->uri->segment(2);
	    $this->load->view('test/mcq-test-result',$data);
	 
	 }
}
?>