<?php
 $user_id = $_SESSION['ftip69_uid'];
 $query10 = "SELECT * FROM `user2` WHERE is_deleted = 0 AND id = $user_id;";
    $runfetch10 = mysqli_query($con, $query10);
    $noofrow10 = mysqli_num_rows($runfetch10);
    if ($noofrow10 > 0 && $runfetch10 == TRUE) { 
        while ($data10 = mysqli_fetch_assoc($runfetch10)) { 
                $user_img =  $data10['user_img'];
                $faculty_id=$data10['faculty_id'];
                $path = "old path";

                if($user_img=='user.png'){
                  $studentphotoquery=mysqli_query($con,"SELECT `faculty_photo`,`id` FROM `faculty` WHERE id=$faculty_id");
                  $data11=mysqli_fetch_assoc($studentphotoquery);
                  $user_img= $data11['faculty_photo'];
                  $path = "new path";

                  
                }
                if ($user_img==NULL) {
                  $user_img='user.png';
                  $path = "old path";
                }
    
        }
    }
?>

<!-- Page Header Start-->
<div class="page-main-header" id="header_row">
  <div class="main-header-right row">
    <div class="main-header-left d-lg-none">
      <div class="logo-wrapper">
        
      </div>
    </div>
    <div class="mobile-sidebar d-block" >
      <div class="media-body text-right switch-sm" id="sidebar_btn">
        <label class="switch"
          ><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a
        ></label>
      </div>
    </div>
<div id="brand_logo_top_header" style="display:none;">
<ul>
    <li>
    <a href="https://fingertips.co.in/cloud/en/auth/login.php"
          ><img src="../../assets/images/logo/fingertip-logo.png" alt=""
          style="height:60px;"
        /></a>
    </li>
    </ul>
</div>
<div class="nav">
<ul class="nav-menus pl-5">
        <li class="pr-3 pl-3" >
        <a class="text-dark" href="../auth/login.php" data-original-title="" title="">
                  <span class="text-primary" id='dashboard_header' style="font-size:16px; line-height:80px; vertical-align:middle;">Dashboard</span>
                  </a>
        </li>
        <li class="pr-3 pl-3" >
        <a class="text-dark" href="../faculty/add-marks-long-test.php" data-original-title="" title="">
                  <span  class="text-dark" id='course_header' style="font-size:16px; line-height:80px; vertical-align:middle;">Test</span>
                  </a>
        </li>
        <li class="pr-3 pl-3" >
        <a class="text-dark" href="../faculty/assignment.php"  data-original-title="" title="">
                  <span class="text-dark" id='excelerate_header'  style="font-size:16px; line-height:80px; vertical-align:middle;">Assignment</span>
                  </a>
        </li>
        <li class="pr-3 pl-3" >
        <a class="text-dark" href="../faculty/project.php"  data-original-title="" title="">
                  <span class="text-dark" id='program_flow_header'  style="font-size:16px; line-height:80px; vertical-align:middle;">Project</span>
                  </a>
        </li>
        <li class="pr-3 pl-3" >
        <a class="text-dark" href="../faculty/batch-report.php"  data-original-title="" title="">
                  <span class="text-dark" id='batch_report_header'  style="font-size:16px; line-height:80px; vertical-align:middle;">Batch Report</span>
                  </a>
        </li>
        
        </ul>

</div>
    <div class="nav-right col p-0">
    
      <ul class="nav-menus">
        <li>
          
        </li>
       
       
        <li class="onhover-dropdown">
          <i data-feather="package"></i><span class="dot"></span>
          <ul class="notification-dropdown onhover-show-div">
            <li>
              APPS<span class="badge badge-pill badge-primary pull-right"
                >1</span
              >
            </li>
            <a href="../sharing-center/index.php">
              <li>
                <div class="media">
                  <div class="media-body">
                    <h6 class="mt-0">
                      <span>
                        <i
                          class="shopping-color"
                          data-feather="shopping-bag"
                        ></i> </span
                      >Shring Center
                    </h6>
                    <p class="mb-0 text-dark">
                      Itesms that are shared with you.
                    </p>
                  </div>
                </div>
              </li>
            </a>
          </ul>
        </li>
        
        <li class="onhover-dropdown">
          <div class="media align-items-center">
          <?php 
            if ($path=="old path") {
          ?>
            <img
              class="align-self-center pull-right img-50 rounded-circle"
              src="../uploads/user/user-img/<?php echo $user_img; ?>"
              alt="header-user"
            /><?php
            }else {?>
              <img
              class="align-self-center pull-right img-50 rounded-circle"
              src="../uploads/faculty-kyc/faculty-photo/<?php echo $user_img; ?>"
              alt="header-user"
            /><?php
            }
            ?>

            <div class="dotted-animation">
              <span class="animate-circle"></span
              ><span class="main-circle"></span>
            </div>
          </div>
          <ul class="profile-dropdown onhover-show-div p-20">
            <li>
              <a href="../auth/edit-profile.php"><i data-feather="user"></i> Edit Profile</a>
            </li>
           
            
            <li>
              <a href="../auth/logout.php"><i data-feather="log-out"></i> Logout</a>
            </li>
          </ul>
        </li>
      </ul>
      
      <div class="d-lg-none mobile-toggle pull-right">
        <i data-feather="more-horizontal"></i>
      </div>
    </div>
  </div>
</div>
