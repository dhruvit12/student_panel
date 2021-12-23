<?php
 require '../../../dbcon.php';
 $user_id = $_SESSION['ftip69_uid'];
 $query10 = "SELECT `user_img` FROM `user2` WHERE is_deleted = 0 AND id = $user_id;";
    $runfetch10 = mysqli_query($con, $query10);
    $noofrow10 = mysqli_num_rows($runfetch10);
    if ($noofrow10 > 0 && $runfetch10 == TRUE) { 
        while ($data10 = mysqli_fetch_assoc($runfetch10)) { 
                $user_img =  $data10['user_img'];
    
        }
    }
?>

<div class="page-sidebar" style="position:fixed; ">
  <div class="main-header-left d-none d-lg-block">
    <div class="logo-wrapper text-center">
      <a href="" class="text-center" style="width:100%;"
        ><img
          src="../../../assets/images/logo/compact-logo-1.png"
          alt=""
          class="img-60 "
          
      /></a>
    </div>
  </div>
  <div class="sidebar custom-scrollbar">
    <div class="sidebar-user text-center">
      <div>
        <img
          class="img-50 rounded-circle"
          src="../../uploads/user/user-img/<?php echo $user_img; ?>"
          alt="#"
        />
        <div class="profile-edit">
          <a href="../../auth/edit-profile.php" target="_blank"
            ><i data-feather="edit"></i
          ></a>
        </div>
      </div>
      <h6 class="mt-3 f-14"><?php echo $_SESSION['ftip69_name'];?></h6>
      <p><?php echo $_SESSION['ftip69_role'];?></p>
    </div>
    <ul class="sidebar-menu">
    
    <li class="mb-3">
        <a class="sidebar-header mt-0 pt-0 mb-0 pb-0" data-toggle="tooltip" title="Refresh sidebar!" >
          <span class="text-light text-right" onclick="refreshSideBar();" style="cursor: pointer;"><small><i data-feather="refresh-cw" style="height:12px;"></i></small>
          
          </span>
        </a>
      </li>
    <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor' 
          || $_SESSION['ftip69_role'] == 'caller') {
        ?>
      <!-- <li class="mb-3">
        <a href="sidebar-header".php>
          <span class="text-light">CRM</span>
        </a>
      </li> -->

      <li  onmouseover="changePosition(1);" onmouseout="changePosition2(1); " id="ul-menu1" >
        <a class="sidebar-header"  href="#" id="leads"
          ><i data-feather="database"></i><span>CRM</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu1" style="left:10px !important; z-index:10000000; max-height:300px; height:auto; overflow-y:auto;!important; transition: all 0.2s;" >
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <!-- <li>
            <a href="../../leads/add-lead".php 
              ><i class="fa fa-circle"></i><span>Add Lead</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor' 
          || $_SESSION['ftip69_role'] == 'caller') {
        ?>

          <li>
            <a href="../../leads/dashboard.php"
              ><i class="fa fa-circle"></i><span>Dashboard</span></a
            >
          </li>
          
          <li>
            <a href="../../leads/lead-list.php"
              ><i class="fa fa-circle"></i><span>Lead List</span></a
            >
          </li>
          <li>
            <a href="../../leads/call-log.php"
              ><i class="fa fa-circle"></i><span>Call Log</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <!-- <li>
            <a href="../../leads/upload-csv.php"
              ><i class="fa fa-circle"></i><span>Upload CSV</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor' 
          || $_SESSION['ftip69_role'] == 'caller') {
        ?>
          <!-- <li>
            <a href="../../leads/assign-to-me.php"
              ><i class="fa fa-circle"></i><span>Assign To Me</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor' 
          || $_SESSION['ftip69_role'] == 'caller') {
        ?>
          <li>
            <a href="../../leads/followup-list.php"
              ><i class="fa fa-circle"></i><span>Followup List</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor' 
          || $_SESSION['ftip69_role'] == 'caller') {
        ?>
          <!-- <li>
            <a href="../../leads/my-followups.php"
              ><i class="fa fa-circle"></i><span>My Followups</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor' 
          || $_SESSION['ftip69_role'] == 'caller') {
        ?>
          <!-- <li>
            <a href="../../leads/all-overdue-followups.php"
              ><i class="fa fa-circle"></i><span>All Overdue Followups</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor' 
          || $_SESSION['ftip69_role'] == 'caller') {
        ?>
          <!-- <li>
            <a href="../../leads/my-overdue-followups.php"
              ><i class="fa fa-circle"></i><span>My Overdue Followups</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor' 
          || $_SESSION['ftip69_role'] == 'caller') {
        ?>
          <li>
            <a href="../../leads/walk-in-list.php"
              ><i class="fa fa-circle"></i><span>Walk In List</span></a
            >
          </li>
          <li>
            <a href="../leads/qr-walk-in.php"
              ><i class="fa fa-circle"></i><span>QR Walk In List</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor' 
          || $_SESSION['ftip69_role'] == 'caller') {
        ?>
          <li>
            <a href="../../leads/demo-list.php"
              ><i class="fa fa-circle"></i><span>Demo List</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor' 
          || $_SESSION['ftip69_role'] == 'caller') {
        ?>
          <li>
            <a href="../../leads/completed-leads.php"
              ><i class="fa fa-circle"></i><span>Completed Leads</span></a
            >
          </li>
          <li>
            <a href="../../leads/completed-followup.php"
              ><i class="fa fa-circle"></i><span>Completed Followups</span></a
            >
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../leads/deleted-leads.php"
              ><i class="fa fa-circle"></i><span>Deleted Leads</span></a
            >
          </li>
          <li>
            <a href="../../leads/deleted-followup.php"
              ><i class="fa fa-circle"></i><span>Deleted Followup</span></a
            >
          </li>
        <?php            
          }
        ?>
        
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor' 
          || $_SESSION['ftip69_role'] == 'caller') {
        ?>
          
          <li>
            <a href="../../leads/walk-in-form.php"
              ><i class="fa fa-circle"></i><span>Walk In Form</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor' 
          || $_SESSION['ftip69_role'] == 'caller') {
        ?>
          
          <li>
            <a href="../../leads/registration-form.php"
              ><i class="fa fa-circle"></i><span>Registration Form</span></a
            >
          </li>
        <?php            
          }
        ?>
        
        </ul>
      </li>
      
      <?php
          }
      ?>
      <!-- <li>
        <a class="sidebar-header" href="#" id="enquiry.php"
          ><i data-feather="phone-call"></i><span>Enquiry</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <ul class="sidebar-submenu">
          
        <li>
            <a href="../../enquiry/add-enquiry.php"
              ><i class="fa fa-circle"></i><span>Add Enquiry</span></a
            >
          </li>
          <li>
            <a href="../../enquiry/all-enquiry.php"
              ><i class="fa fa-circle"></i><span>All Enquiry</span></a
            >
          </li>
          <li>
            <a href="../../enquiry/all-scheduled-enquiry.php"
              ><i class="fa fa-circle"></i><span>All Scheduled Enquiry</span></a
            >
          </li>
          <li>
            <a href="../../enquiry/my-scheduled-enquiry.php"
              ><i class="fa fa-circle"></i><span>My Scheduled Enquiry</span></a
            >
          </li>
          <li>
            <a href="../../enquiry/all-followups.php"
              ><i class="fa fa-circle"></i><span>All Followups</span></a
            >
          </li>
          <li>
            <a href="../../enquiry/my-followups.php"
              ><i class="fa fa-circle"></i><span>My Followups</span></a
            >
          </li>
          <li>
            <a href="../../enquiry/all-overdue-followups.php"
              ><i class="fa fa-circle"></i><span>All Overdue Followups</span></a
            >
          </li>
          <li>
            <a href="../../enquiry/overdue-followups.php"
              ><i class="fa fa-circle"></i><span>Overdue Followups</span></a
            >
          </li>
          <li>
            <a href="../../enquiry/demo-sent.php"
              ><i class="fa fa-circle"></i><span>Demo Sent</span></a
            >
          </li>
          <li>
            <a href="../../enquiry/completed-enquiry.php"
              ><i class="fa fa-circle"></i><span>Completed Enquiry</span></a
            >
          </li>
          <li>
            <a href="../../enquiry/rejected-enquiry.php"
              ><i class="fa fa-circle"></i><span>Rejected Enquiry</span></a
            >
          </li>
          <li>
            <a href="../../enquiry/admission-booked.php"
              ><i class="fa fa-circle"></i><span>Admission Booked</span></a
            >
          </li>
        </ul>
      </li> -->
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor'
          || $_SESSION['ftip69_role'] == 'faculty'
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
      <!-- <br /><br />
      <li class="mb-3">
        <a href="sidebar-header".php>
          <span class="text-light">ERP</span>
        </a>
      </li> -->

      <li  onmouseover="changePosition(2);" onmouseout="changePosition2(2); " id="ul-menu2" >
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="user-plus"></i><span>Admission</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>
         <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu2" style="left:10px !important; z-index:10000000; max-height:300px; height:auto; overflow-y:auto;!important; transition: all 0.2s" >         
       
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
          <li>
            <a href="../../admission/quick-enrollment.php"
              ><i class="fa fa-circle"></i><span>Quick Enrollment</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
        
          <!-- <li>
            <a href="../../admission/admission-list.php"
              ><i class="fa fa-circle"></i><span>Admission List</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
          <!-- <li>
            <a href="../../admission/assign-to-me.php"
              ><i class="fa fa-circle"></i><span>Assign To Me</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
          <!-- <li>
            <a href="../../admission/my-admission.php"
              ><i class="fa fa-circle"></i><span>My Admission</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
          <li>
            <a href="../../admission/student-list.php"
              ><i class="fa fa-circle"></i><span>Student List</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
          <li>
            <a href="../../admission/manage-students.php"
              ><i class="fa fa-circle"></i><span>Manage Students</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
          <!-- <li>
            <a href="../../admission/student-form-response.php"
              ><i class="fa fa-circle"></i><span>Student Form Response</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        </ul>
      </li>
      <?php
          }
      ?>

      <li  onmouseover="changePosition(3);" onmouseout="changePosition2(3); " id="ul-menu3" >

      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'faculty') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="heart"></i><span>Faculty</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>

        <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu3" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
        
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || $_SESSION['ftip69_role'] == 'faculty'  ) {
        ?>
          <li>
            <a href="../../faculty/dashboard.php"
              ><i class="fa fa-circle"></i><span>Dashboard</span></a
            >
          </li>
        <?php            
          }
        ?>
        
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' ) {
        ?>
          <li>
            <a href="../../faculty/add-faculty.php"
              ><i class="fa fa-circle"></i><span>Add Faculty</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
       

          <li>
            <a href="../../faculty/faculty-list.php"
              ><i class="fa fa-circle"></i><span>Faculty List</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'faculty') {
        ?>

          <!-- <li>
            <a href="../../faculty/my-profile.php"
              ><i class="fa fa-circle"></i><span>My Profile</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'faculty') {
        ?>

          <!-- <li>
            <a href="../../faculty/scheduled-classes.php"
              ><i class="fa fa-circle"></i><span>Scheduled Classes</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'faculty') {
        ?>

          <!-- <li>
            <a href="../../faculty/start-my-class.php"
              ><i class="fa fa-circle"></i><span>Start My Class</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'faculty') {
        ?>

          <!-- <li>
            <a href="../../faculty/ppt.php"
              ><i class="fa fa-circle"></i><span>PPT</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <!-- <li>
            <a href="../../faculty/assignments.php"
              ><i class="fa fa-circle"></i><span>Assignments</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        </ul>
      </li>

      <li  onmouseover="changePosition(4);" onmouseout="changePosition2(4); " id="ul-menu4" > 
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
      
        <a class="sidebar-header" href="#"
          ><i data-feather="sunrise"></i><span>Student</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>
        <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu4" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
      
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
         
          <li>
            <a href="../../student/dashboard.php"
              ><i class="fa fa-circle"></i><span>Dashboard</span></a
            >
          </li>
        <?php            
          }
        ?>
        
        </ul>
      </li>
      <!-- link add -->
      <li  onmouseover="changePosition(5);" onmouseout="changePosition2(5); " id="ul-menu5" > 
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="target"></i><span>Placement</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>
        <!-- <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu5" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
 
        <?php
         if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href=""><i class="fa fa-circle"></i><span>Add Vacancy</span></a>
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href=""><i class="fa fa-circle"></i><span>Vacancy List</span></a>
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href=".php"
              ><i class="fa fa-circle"></i><span>Scheduled Interviews</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href=""><i class="fa fa-circle"></i><span>My Interview</span></a>
          </li>
          
        <?php            
          }
        ?>
        </ul>
      </li> -->

      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor'||
          $_SESSION['ftip69_role'] == 'student' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?> 
        <!-- <br /><br />
      <li class="mb-3">
        <a href="sidebar-header".php>
          <span class="text-light">LMS</span>
        </a>
      </li> -->
      <?php
          }
      ?>

<li  onmouseover="changePosition(6);" onmouseout="changePosition2(6); " id="ul-menu6" > 
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="airplay"></i><span>Batch</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>

<ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu6" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
        
        
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
          <li>
            <a href="../../batch/add-batch.php"
              ><i class="fa fa-circle"></i><span>Add Batch</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
          <li>
            <a href="../../batch/batch-list.php"
              ><i class="fa fa-circle"></i><span>Batch List</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
          <!-- <li>
            <a href="../../batch/ongoing-batch-list.php"
              ><i class="fa fa-circle"></i><span>Ongoing Batch List</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
          <!-- <li>
            <a href="../../batch/upcoming-batch-list.php"
              ><i class="fa fa-circle"></i><span>Upcoming Batch List</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        </ul>
      </li>

      

      <li  onmouseover="changePosition(7);" onmouseout="changePosition2(7); " id="ul-menu7" > 
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'student' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="airplay"></i><span>Classes</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>
        <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu7" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../classes/add-class.php"
              ><i class="fa fa-circle"></i><span>Add Class</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'student' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <!-- <li>
            <a href="../../classes/upcoming-classes.php"
              ><i class="fa fa-circle"></i><span>Upcoming Classes</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'student' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../classes/class-list.php"
              ><i class="fa fa-circle"></i><span>Class List</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../classes/video-list.php"
              ><i class="fa fa-circle"></i><span>Video List</span></a
            >
          </li>
        <?php            
          }
        ?>
        </ul>
      </li>

      <li  onmouseover="changePosition(8);" onmouseout="changePosition2(8); " id="ul-menu8" > 
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="clipboard"></i><span>Assignments</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>
        <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu8" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../assignments/add-assignment.php"
              ><i class="fa fa-circle"></i><span>Add Assignment</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../assignments/assignments-list.php"
              ><i class="fa fa-circle"></i><span>Assignments List</span></a
            >
          </li>
        <?php            
          }
        ?>
        </ul>
      </li>

      <li  onmouseover="changePosition(9);" onmouseout="changePosition2(9); " id="ul-menu9" > 
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="play"></i><span>PPT</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>
        <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu9" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../ppt/add-ppt.php"
              ><i class="fa fa-circle"></i><span>Add PPT</span></a
            >
          </li>
          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../ppt/all-ppt.php"
              ><i class="fa fa-circle"></i><span>All PPT</span></a
            >
          </li>
          
        <?php            
          }
        ?>
        </ul>
      </li>


      
      <li  onmouseover="changePosition(17);" onmouseout="changePosition2(17); " id="ul-menu17" > 
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="book-open"></i><span>Material</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>
        <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu17" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../material/upload-files.php"
              ><i class="fa fa-circle"></i><span>Upload Files</span></a
            >
          </li>
          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../material/all-files.php"
              ><i class="fa fa-circle"></i><span>All Files</span></a
            >
          </li>
          
        <?php            
          }
        ?>

<?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../material/reading-material.php"
              ><i class="fa fa-circle"></i><span>Reading Material</span></a
            >
          </li>
          
        <?php            
          }
        ?>

<?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../material/resource.php"
              ><i class="fa fa-circle"></i><span>Resource</span></a
            >
          </li>
          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../material/assignment-resource.php"
              ><i class="fa fa-circle"></i><span>Assignment Resource</span></a
            >
          </li>
          
        <?php            
          }
        ?>
        </ul>
      </li>

      <li  onmouseover="changePosition(10);" onmouseout="changePosition2(10); " id="ul-menu10" > 
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="sliders"></i><span>Test</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>
        <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu10" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
        
        
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../test/add-test.php"
              ><i class="fa fa-circle"></i><span>Add Test</span></a
            >
          </li>
          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../test/mcq-test-list.php"
              ><i class="fa fa-circle"></i><span>Test List(MCQ)</span></a
            >
          </li>
          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <!-- <li>
            <a href="../../test/upcoming-tests.php"
              ><i class="fa fa-circle"></i><span>Upcoming Tests</span></a
            >
          </li> -->
          
        <?php            
          }
        ?>
        </ul>
      </li>

      <li  onmouseover="changePosition(11);" onmouseout="changePosition2(11); " id="ul-menu11" > 
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'faculty' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="book"></i><span>Course</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>
        <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu11" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../course/add-course.php"
              ><i class="fa fa-circle"></i><span>Add Course</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../course/add-course-category.php"
              ><i class="fa fa-circle"></i><span>Add Course Category</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <!-- <li>
            <a href="../../course/create-course-package.php"
              ><i class="fa fa-circle"></i><span>Create Course Package</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'faculty' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
        <!-- <li>
            <a href="../../course/add-online-course.php"
              ><i class="fa fa-circle"></i><span>Add Online Course</span></a
            >
          </li> -->
        <!-- <li>
            <a href="../../course/all-online-courses.php"
              ><i class="fa fa-circle"></i><span>All Online Courses</span></a
            >
          </li> -->
          <li>
            <a href="../../course/all-courses.php"
              ><i class="fa fa-circle"></i><span>All Courses</span></a
            >
          </li>
        <?php            
          }
        ?>
        </ul>
      </li>
      <!-- <li  onmouseover="changePosition(12);" onmouseout="changePosition2(12); " id="ul-menu12" > 
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'student' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="disc"></i><span>Events</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>

        <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu12" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../events/add-event.php"
              ><i class="fa fa-circle"></i><span>Add Event</span></a
            >
          </li>
        <?php            
          }
        ?>
        
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'student' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../events/upcoming-events.php"
              ><i class="fa fa-circle"></i><span>Upcoming Events</span></a
            >
          </li>
        <?php            
          }
        ?>
        
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'student' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../events/previous-events.php"
              ><i class="fa fa-circle"></i><span>Previous Events</span></a
            >
          </li>
        <?php            
          }
        ?>
        </ul>
      </li> -->

      
      <li class="mb-3">
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
        <!-- <br /><br />
        <a href="sidebar-header".php>
          <span class="text-light">ADMIN</span>
        </a> -->
        <?php
          }
        ?>
      </li>

      <li  onmouseover="changePosition(13);" onmouseout="changePosition2(13); " id="ul-menu13" > 
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="settings"></i><span>Settings</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>
        <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu13" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../settings/manage-user.php"
              ><i class="fa fa-circle"></i><span>Manage User</span></a
            >
          </li> 
          <li>
            <a href="../../settings/lead-category.php"
              ><i class="fa fa-circle"></i><span>Lead Category</span></a
            >
          </li> 
          <li>
            <a href="../../settings/interest-level.php"
              ><i class="fa fa-circle"></i><span>Intrest Level</span></a
            >
          </li>      
          <li>
            <a href="../../settings/followup-action.php"
              ><i class="fa fa-circle"></i><span>Followup Action</span></a
            >
          </li> 
           
          <li>
            <a href="../../settings/discount-offer.php"
              ><i class="fa fa-circle"></i><span>Discount Offer</span></a
            >
          </li>
          <li>
            <a href="../../settings/offline-fees-payment-method.php"
              ><i class="fa fa-circle"></i><span>Payment Method Offline</span></a
            >
          </li>
         
          <li>
            <a href="../../settings/batch-type.php"
              ><i class="fa fa-circle"></i><span>Batch Type</span></a
            >
          </li>
          <li>
            <a href="../../settings/branch.php"
              ><i class="fa fa-circle"></i><span>Branch</span></a
            >
          </li>  
          
         
           
          <li>
            <a href="../../settings/degree.php"
              ><i class="fa fa-circle"></i><span>Degree</span></a
            >
          </li>
          <li>
            <a href="../../settings/course-delivery-mode.php"
              ><i class="fa fa-circle"></i><span>Course Delivery Mode</span></a
            >
          </li>
          <li>
            <a href="../../settings/support-category.php"
              ><i class="fa fa-circle"></i><span>Support Category</span></a
            >
          </li>  
          <li>
            <a href="../../settings/upload-interview-question.php"
              ><i class="fa fa-circle"></i><span>Interview Qeustions</span></a
            >
          </li>   
        <?php            
          }
        ?>
        </ul>
      </li>



      <li  onmouseover="changePosition(14);" onmouseout="changePosition2(14); " id="ul-menu14" > 
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="layout"></i><span>Accounts</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>
        <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu14" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
          <li>
            <a href="../../accounts/offline-fees.php"
              ><i class="fa fa-circle"></i><span>Offline Fees</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
          <!-- <li>
            <a href="../../accounts/student-fees.php"
              ><i class="fa fa-circle"></i><span>Student Fees</span></a
            >
          </li>           -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <!-- <li>
            <a href="../../accounts/student/course-fees.php"
              ><i class="fa fa-circle"></i><span>Course Fees</span></a
            >
          </li>           -->
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <!-- <li>
            <a href="../../accounts/staff-salary.php"
              ><i class="fa fa-circle"></i><span>Staff Salary</span></a
            >
          </li>           -->
        <?php            
          }
        ?>
       <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <!-- <li>
            <a href="../../accounts/class-expenses.php"
              ><i class="fa fa-circle"></i><span>Class Expenses</span></a
            >
          </li>           -->
        <?php            
          }
        ?>
        </ul>
      </li>

      <li  onmouseover="changePosition(15);" onmouseout="changePosition2(15); " id="ul-menu15" > 
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="pie-chart"></i><span>Reports</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>
        <!-- <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu15" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
        
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../reports/activity-timeline.php"
              ><i class="fa fa-circle"></i><span>Activity Timeline</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../reports/cold-calling.php"
              ><i class="fa fa-circle"></i><span>Cold Calling</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../reports/enquiry.php"
              ><i class="fa fa-circle"></i><span>Enquiry</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../reports/classes.php"
              ><i class="fa fa-circle"></i><span>Classes</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../reports/batch.php"
              ><i class="fa fa-circle"></i><span>Batch</span></a
            >
          </li>          
        <?php            
          }
        ?><?php
        if ($_SESSION['ftip69_role'] == 'superadmin') {
      ?>
          <li>
            <a href="../../reports/student.php"
              ><i class="fa fa-circle"></i><span>Student</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../reports/student-profile.php"
              ><i class="fa fa-circle"></i><span>Student Profile</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../reports/income-and-expense.php"
              ><i class="fa fa-circle"></i><span>Income & Expense</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../reports/admission.php"
              ><i class="fa fa-circle"></i><span>Admission</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../reports/online-course.php"
              ><i class="fa fa-circle"></i><span>Online Course</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../reports/student-review.php"
              ><i class="fa fa-circle"></i><span>Student Review</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../reports/active-user.php"
              ><i class="fa fa-circle"></i><span>Active User</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../reports/placement.php"
              ><i class="fa fa-circle"></i><span>Placement</span></a
            >
          </li>          
        <?php            
          }
        ?>
        </ul> -->
        <li>
        <li  onmouseover="changePosition(16);" onmouseout="changePosition2(16); " id="ul-menu16" > 
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="headphones"></i><span>Support</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>
        <ul class="sidebar-submenu sidebar custom-scrollbar"  id="menu16" style="left:10px !important; z-index:10000000; max-height:300px; height:auto;overflow-y:auto;!important; transition: all 0.2s" >         
        
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin'|| 
          $_SESSION['ftip69_role'] == 'caller' || 
          $_SESSION['ftip69_role'] == 'counselor' || 
          $_SESSION['ftip69_role'] == 'student' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../../support/generate-ticket.php"
              ><i class="fa fa-circle"></i><span>Generate Ticket</span></a
            >
          </li>          
        <?php            
          }
        ?>
        
        
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../../support/manage-ticket.php"
              ><i class="fa fa-circle"></i><span>Manage Ticket</span></a
            >
          </li>          
        <?php            
          }
        ?>
        
        
        </ul>
        <li>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        </li>
      </li>
    </ul>
  </div>
</div>
<script>

function changePosition(n){
  elementOffset = $('#ul-menu'+n).offset().top,
  document.getElementById('menu'+n).style.position = "fixed";
  document.getElementById('menu'+n).style.top = elementOffset+"px";
  console.log(elementOffset);
}


// function changePosition2(n){
//   document.getElementById('menu'+n).style.position = "relative";

//   console.log('changeposition2 function called');
// }
// function showOffset(){
//   elementOffset = document.getElementById('ul-menu'+1).offset().top,  
//   console.log(elementOffset);
// }
</script>

<!-- <script>
function changePosition(n){
  elementOffset = $('#ul-menu'+n).offset().top,
  document.getElementById('menu'+n).style.position = "fixed";
  document.getElementById('menu'+n).style.top = elementOffset+"px";
  console.log(elementOffset);
}

</script> -->


<script>
function refreshSideBar(){

  document.getElementsByTagName('body')[0].requestFullscreen();
  // document.exitFullscreen();

  // document.getElementsByTagName('body')[0].style.height = '0px';
  setTimeout(() => {
    // document.getElementsByTagName('body')[0].height = 'auto';
  document.exitFullscreen();

  
  }, 500);
  

}
</script>
