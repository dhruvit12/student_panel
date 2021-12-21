<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
	function __construct() {
        parent::__construct();
		if (!isset($_SESSION['ftip69_uid'])) {
			redirect('login');
			exit;
		}
	}
	public function dashboard()
	{
			$this->load->view('one_sidebar');
	    	$this->load->view('dashboard');
	}
	// public function course()
	// {
	// 	$this->load->view('one_sidebar');
	// 	$this->load->view('header_sidebar');
	// 	$this->load->view('course');
	// }
	public function read()
	{
		$this->load->view('header');
		$this->load->view('reading_material');
	}
	public function live_course()
	{
		$this->load->view('one_sidebar');
		$this->load->view('live_course');

	}
	public function self_course()
	{
		$this->load->view('one_sidebar');
		$this->load->view('self_learning_course');
	}
	public function record()
	{
		$this->load->view('header');
		$this->load->view('recording');
	}
	public function forgot_password()
	{
		$this->load->view('forgot_password');
	}
    public function edit_profile()
    {
    	$this->load->view('one_sidebar');
    	$this->load->view('profile');
    }	
 	public function logout()
	{
		session_unset();
		redirect('Login');
	}
}
