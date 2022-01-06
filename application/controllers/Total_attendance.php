<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Total_attendance extends CI_Controller {
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
        
        $this->db->where('id',$_SESSION['ftip69_uid']);
		$data=$this->db->get('user2')->result();
        // echo "<pre>";print_r($data);exit;
		$ftip69_acc_student = $data[0]->acc_student;
        if ($ftip69_acc_student==1) {
        $user_id = $_SESSION['ftip69_uid'];
          

        $this->db->where('id',$user_id);
		$data=$this->db->get('user2')->result();
        $student_id = $data[0]->student_id;
        $this->db->where('student_id',$student_id);
        
		$data['attendance']=$this->db->get('attendance')->result();
        


        }
        else{
        ?>
        <script>
        window.history.back()
        window.location = 'https://fingertips.co.in/en/auth/login.php';
        </script>
        <?php
        }  
        $this->load->view('total_attendance',$data);
	}
}

?>