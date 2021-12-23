<div class="page-sidebar">
  <div class="main-header-left d-none d-lg-block">
    <div class="logo-wrapper text-center">
      <a href=""
        ><img
          src="../../assets/images/logo/fingertip-logo0.png"
          alt=""
          style="width: 220px"
      /></a>
    </div>
  </div>
  <div class="sidebar custom-scrollbar">
    <div class="sidebar-user text-center">
      <div>
        <img
          class="img-60 rounded-circle"
          src="../../assets/images/user/1.jpg"
          alt="#"
        />
        <div class="profile-edit">
          <a href="edit-profile.html" target="_blank"
            ><i data-feather="edit"></i
          ></a>
        </div>
      </div>
      <h6 class="mt-3 f-14"><?php echo $_SESSION['ftip69_name'];?></h6>
      <p><?php echo $_SESSION['ftip69_role'];?></p>
    </div>
    <ul class="sidebar-menu">
    <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor' 
          || $_SESSION['ftip69_role'] == 'caller') {
        ?>
      <li class="mb-3">
        <a href="sidebar-header">
          <span class="text-light">CRM</span>
        </a>
      </li>

      <li>
        <a class="sidebar-header"  href="#" id="leads"
          ><i data-feather="database"></i><span>Leads</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <ul class="sidebar-submenu"  >
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../leads/add-lead.php" 
              ><i class="fa fa-circle"></i><span>Add Lead</span></a
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
            <a href="../leads/all-lead.php"
              ><i class="fa fa-circle"></i><span>All Lead</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../leads/upload-csv.php"
              ><i class="fa fa-circle"></i><span>Upload CSV</span></a
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
            <a href="../leads/assign-to-me.php"
              ><i class="fa fa-circle"></i><span>Assign To Me</span></a
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
            <a href="../leads/all-followups.php"
              ><i class="fa fa-circle"></i><span>All Followups</span></a
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
            <a href="../leads/my-followups.php"
              ><i class="fa fa-circle"></i><span>My Followups</span></a
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
            <a href="../leads/all-overdue-followups.php"
              ><i class="fa fa-circle"></i><span>All Overdue Followups</span></a
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
            <a href="../leads/my-overdue-followups.php"
              ><i class="fa fa-circle"></i><span>My Overdue Followups</span></a
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
            <a href="../leads/completed-leads.php"
              ><i class="fa fa-circle"></i><span>Completed Leads</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../leads/rejected-leads.php"
              ><i class="fa fa-circle"></i><span>Rejected Leads</span></a
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
            <a href="../leads/scheduled-walk-in.php"
              ><i class="fa fa-circle"></i><span>Schedule Walk In</span></a
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
            <a href="../leads/scheduled-demo.php"
              ><i class="fa fa-circle"></i><span>Schedule Demo</span></a
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
            <a href="../leads/walk-in-form.php"
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
            <a href="../leads/registration-form.php"
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
        <a class="sidebar-header" href="#" id="enquiry"
          ><i data-feather="phone-call"></i><span>Enquiry</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <ul class="sidebar-submenu">
          
        <li>
            <a href="../enquiry/add-enquiry.php"
              ><i class="fa fa-circle"></i><span>Add Enquiry</span></a
            >
          </li>
          <li>
            <a href="../enquiry/all-enquiry.php"
              ><i class="fa fa-circle"></i><span>All Enquiry</span></a
            >
          </li>
          <li>
            <a href="../enquiry/all-scheduled-enquiry.php"
              ><i class="fa fa-circle"></i><span>All Scheduled Enquiry</span></a
            >
          </li>
          <li>
            <a href="../enquiry/my-scheduled-enquiry.php"
              ><i class="fa fa-circle"></i><span>My Scheduled Enquiry</span></a
            >
          </li>
          <li>
            <a href="../enquiry/all-followups.php"
              ><i class="fa fa-circle"></i><span>All Followups</span></a
            >
          </li>
          <li>
            <a href="../enquiry/my-followups.php"
              ><i class="fa fa-circle"></i><span>My Followups</span></a
            >
          </li>
          <li>
            <a href="../enquiry/all-overdue-followups.php"
              ><i class="fa fa-circle"></i><span>All Overdue Followups</span></a
            >
          </li>
          <li>
            <a href="../enquiry/overdue-followups.php"
              ><i class="fa fa-circle"></i><span>Overdue Followups</span></a
            >
          </li>
          <li>
            <a href="../enquiry/demo-sent.php"
              ><i class="fa fa-circle"></i><span>Demo Sent</span></a
            >
          </li>
          <li>
            <a href="../enquiry/completed-enquiry.php"
              ><i class="fa fa-circle"></i><span>Completed Enquiry</span></a
            >
          </li>
          <li>
            <a href="../enquiry/rejected-enquiry.php"
              ><i class="fa fa-circle"></i><span>Rejected Enquiry</span></a
            >
          </li>
          <li>
            <a href="../enquiry/admission-booked.php"
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
      <br /><br />
      <li class="mb-3">
        <a href="sidebar-header">
          <span class="text-light">ERP</span>
        </a>
      </li>

      <li>
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
        <ul class="sidebar-submenu">
        
       
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
          <li>
            <a href="../admission/quick-enrollment.php"
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
            <a href="../admission/admission-list.php"
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
            <a href="../admission/assign-to-me.php"
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
            <a href="../admission/my-admission.php"
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
            <a href="../admission/student-list.php"
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
            <a href="../admission/alumni-students.php"
              ><i class="fa fa-circle"></i><span>Alumni Students</span></a
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
            <a href="../admission/student-form-response.php"
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

      <li>
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

        <ul class="sidebar-submenu">
        
        
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' ) {
        ?>
          <li>
            <a href="../faculty/add-faculty.php"
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
            <a href="../faculty/faculty-list.php"
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

          <li>
            <a href="../faculty/my-profile.php"
              ><i class="fa fa-circle"></i><span>My Profile</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'faculty') {
        ?>

          <li>
            <a href="../faculty/scheduled-classes.php"
              ><i class="fa fa-circle"></i><span>Scheduled Classes</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'faculty') {
        ?>

          <li>
            <a href="../faculty/start-my-class.php"
              ><i class="fa fa-circle"></i><span>Start My Class</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'faculty') {
        ?>

          <li>
            <a href="../faculty/ppt.php"
              ><i class="fa fa-circle"></i><span>PPT</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../faculty/assignments.php"
              ><i class="fa fa-circle"></i><span>Assignments</span></a
            >
          </li>
        <?php            
          }
        ?>
        </ul>
      </li>

      <li>
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
        <ul class="sidebar-submenu">
      
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
          <li>
            <a href="../student/my-profile.php"
              ><i class="fa fa-circle"></i><span>My Profile</span></a
            >
          </li>
          <li>
            <a href="../student/student-dashboard.php"
              ><i class="fa fa-circle"></i><span>Dashboard</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
          <li>
            <a href="../student/course-progress.php"
              ><i class="fa fa-circle"></i><span>Course Progress</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
          <li>
            <a href="../student/attendance.php"
              ><i class="fa fa-circle"></i><span>Attendance</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
          <li>
            <a href="../student/assignments.php"
              ><i class="fa fa-circle"></i><span>Assignments</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
          <li>
            <a href="../student/tests.php"
              ><i class="fa fa-circle"></i><span>Tests</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
          <li>
            <a href="../student/fees.php"
              ><i class="fa fa-circle"></i><span>Fees</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
          <li>
            <a href="../student/certificate.php"
              ><i class="fa fa-circle"></i><span>Certificates</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
          <li>
            <a href="../student/my-resume.php"
              ><i class="fa fa-circle"></i><span>My Resume</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
          <li>
            <a href="../student/feedbacks.php"
              ><i class="fa fa-circle"></i><span>Feedbacks</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
          <li>
            <a href="../student/placement.php"
              ><i class="fa fa-circle"></i><span>Placement</span></a
            >
          </li>
        <?php            
          }
        ?>
        </ul>
      </li>
      <!-- link add -->
      <li>
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
        <ul class="sidebar-submenu">
 
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
            <a href=""
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
      </li>

      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'counselor'||
          $_SESSION['ftip69_role'] == 'student' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?> <br /><br />
      <li class="mb-3">
        <a href="sidebar-header">
          <span class="text-light">LMS</span>
        </a>
      </li>
      <?php
          }
      ?>

      <li>
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="airplay"></i><span>Batch</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>

        <ul class="sidebar-submenu">
        
        
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || $_SESSION['ftip69_role'] == 'counselor') {
        ?>
          <li>
            <a href="../batch/add-batch.php"
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
            <a href="../batch/batch-list.php"
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
            <a href="../batch/ongoing-batch-list.php"
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
            <a href="../batch/upcoming-batch-list.php"
              ><i class="fa fa-circle"></i><span>Upcoming Batch List</span></a
            >
          </li> -->
        <?php            
          }
        ?>
        </ul>
      </li>

      

      <li>
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
        <ul class="sidebar-submenu">
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../classes/add-class.php"
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
            <a href="../classes/upcoming-classes.php"
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
            <a href="../classes/class-list.php"
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
            <a href="../classes/video-list.php"
              ><i class="fa fa-circle"></i><span>Video List</span></a
            >
          </li>
        <?php            
          }
        ?>
        </ul>
      </li>

      <li>
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
        <ul class="sidebar-submenu">
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../assignments/add-assignment.php"
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
            <a href="../assignments/all-assignments.php"
              ><i class="fa fa-circle"></i><span>All Assignments</span></a
            >
          </li>
        <?php            
          }
        ?>
        </ul>
      </li>

      <li>
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
        <ul class="sidebar-submenu">
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../ppt/add-ppt.php"
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
            <a href="../ppt/all-ppt.php"
              ><i class="fa fa-circle"></i><span>All PPT</span></a
            >
          </li>
          
        <?php            
          }
        ?>
        </ul>
      </li>

      <li>
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
        <ul class="sidebar-submenu">
        
        >
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' || 
          $_SESSION['ftip69_role'] == 'faculty') {
        ?>
          <li>
            <a href="../test/add-test.php"
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
            <a href="../test/all-test.php"
              ><i class="fa fa-circle"></i><span>All Test </span></a
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
            <a href="../test/upcoming-tests.php"
              ><i class="fa fa-circle"></i><span>Upcoming Tests</span></a
            >
          </li>
          
        <?php            
          }
        ?>
        </ul>
      </li>

      <li>
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
        <ul class="sidebar-submenu">
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../course/add-course.php"
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
            <a href="../course/add-course-category.php"
              ><i class="fa fa-circle"></i><span>Add Course Category</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../course/create-course-package.php"
              ><i class="fa fa-circle"></i><span>Create Course Package</span></a
            >
          </li>
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin' 
          || $_SESSION['ftip69_role'] == 'faculty' 
          || $_SESSION['ftip69_role'] == 'student') {
        ?>
        <li>
            <a href="../course/add-online-course.php"
              ><i class="fa fa-circle"></i><span>Add Online Course</span></a
            >
          </li>
        <li>
            <a href="../course/all-online-courses.php"
              ><i class="fa fa-circle"></i><span>All Online Courses</span></a
            >
          </li>
          <li>
            <a href="../course/all-courses.php"
              ><i class="fa fa-circle"></i><span>All Courses</span></a
            >
          </li>
        <?php            
          }
        ?>
        </ul>
      </li>
      <li>
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

        <ul class="sidebar-submenu">
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../events/add-event.php"
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
            <a href="../events/upcoming-events.php"
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
            <a href="../events/previous-events.php"
              ><i class="fa fa-circle"></i><span>Previous Events</span></a
            >
          </li>
        <?php            
          }
        ?>
        </ul>
      </li>

      
      <li class="mb-3">
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
        <br /><br />
        <a href="sidebar-header">
          <span class="text-light">ADMIN</span>
        </a>
        <?php
          }
        ?>
      </li>

      <li>
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
        <ul class="sidebar-submenu">
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../settings/manage-user.php"
              ><i class="fa fa-circle"></i><span>Manage User</span></a
            >
          </li> 
          <li>
            <a href="../settings/lead-category.php"
              ><i class="fa fa-circle"></i><span>Lead Category</span></a
            >
          </li> 
          <li>
            <a href="../settings/interest-level.php"
              ><i class="fa fa-circle"></i><span>Intrest Level</span></a
            >
          </li>      
          <li>
            <a href="../settings/followup-action.php"
              ><i class="fa fa-circle"></i><span>Followup Action</span></a
            >
          </li> 
          <li>
            <a href="../settings/discount-offer.php"
              ><i class="fa fa-circle"></i><span>Discount Offer</span></a
            >
          </li>
          <li>
            <a href="../settings/course-delivery-mode.php"
              ><i class="fa fa-circle"></i><span>Course Delivery Mode</span></a
            >
          </li>
          <li>
            <a href="../settings/batch-type.php"
              ><i class="fa fa-circle"></i><span>Batch Type</span></a
            >
          </li>
          <li>
            <a href="../settings/branch.php"
              ><i class="fa fa-circle"></i><span>Branch</span></a
            >
          </li>  
          
         
           
          <li>
            <a href="../settings/degree.php"
              ><i class="fa fa-circle"></i><span>Degree</span></a
            >
          </li>   
        <?php            
          }
        ?>
        </ul>
      </li>



      <li>
      <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
        <a class="sidebar-header" href="#"
          ><i data-feather="layout"></i><span>Accounts</span
          ><i class="fa fa-angle-right pull-right"></i
        ></a>
        <?php
          }
        ?>
        <ul class="sidebar-submenu">>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../accounts/add-fees.php"
              ><i class="fa fa-circle"></i><span>Add Fees</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../accounts/student-fees.php"
              ><i class="fa fa-circle"></i><span>Student Fees</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../accounts/student/course-fees.php"
              ><i class="fa fa-circle"></i><span>Course Fees</span></a
            >
          </li>          
        <?php            
          }
        ?>
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../accounts/staff-salary.php"
              ><i class="fa fa-circle"></i><span>Staff Salary</span></a
            >
          </li>          
        <?php            
          }
        ?>
       <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../accounts/class-expenses.php"
              ><i class="fa fa-circle"></i><span>Class Expenses</span></a
            >
          </li>          
        <?php            
          }
        ?>
        </ul>
      </li>

      <li>
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
        <ul class="sidebar-submenu">
        
        <?php
          if ($_SESSION['ftip69_role'] == 'superadmin') {
        ?>
          <li>
            <a href="../reports/activity-timeline.php"
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
            <a href="../reports/cold-calling.php"
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
            <a href="../reports/enquiry.php"
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
            <a href="../reports/classes.php"
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
            <a href="../reports/batch.php"
              ><i class="fa fa-circle"></i><span>Batch</span></a
            >
          </li>          
        <?php            
          }
        ?><?php
        if ($_SESSION['ftip69_role'] == 'superadmin') {
      ?>
          <li>
            <a href="../reports/student.php"
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
            <a href="../reports/student-profile.php"
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
            <a href="../reports/income-and-expense.php"
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
            <a href="../reports/admission.php"
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
            <a href="../reports/online-course.php"
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
            <a href="../reports/student-review.php"
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
            <a href="../reports/active-user.php"
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
            <a href="../reports/placement.php"
              ><i class="fa fa-circle"></i><span>Placement</span></a
            >
          </li>          
        <?php            
          }
        ?>
        </ul>
      </li>
    </ul>
  </div>
</div>
