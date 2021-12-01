
<?php
   require('dbcon.php');
   $user_id = $_SESSION['ftip69_uid'];
   $query = "SELECT * FROM `user2` WHERE `id` = $user_id;";
   $run = mysqli_query($con, $query);
   $row = mysqli_num_rows($run);
   $data = mysqli_fetch_assoc($run);
   $ftip69_acc_student = $data['acc_student'];
   if ($ftip69_acc_student==1) {
   $user_id = $_SESSION['ftip69_uid'];
   }else{
   ?>
   <script>
   window.history.back()
   window.location = 'https://fingertips.co.in/en/auth/login.php';
  </script>
  <?php
   }  
   ?>
<?php
   $user_id = $_SESSION['ftip69_uid'];
   $query = "SELECT `student_id` FROM `user2` WHERE `id` = $user_id";
   $runfetch = mysqli_query($con, $query);
   $noofrow = mysqli_num_rows($runfetch);
   $indexnumber = 1;
   if ($noofrow > 0 && $runfetch == TRUE) { 
      while ($data = mysqli_fetch_assoc($runfetch)) {
            $student_id = $data['student_id'];
            } 
         } 
   
   
   $query = "SELECT `course`,`batch` FROM `student` WHERE `id` = $student_id";
   $runfetch = mysqli_query($con, $query);
   $noofrow = mysqli_num_rows($runfetch);
   $indexnumber = 1;
   if ($noofrow > 0 && $runfetch == TRUE) { 
      while ($data = mysqli_fetch_assoc($runfetch)) {
            $batch_id = $data['batch'];
            $course = $data['course'];
            } 
         } 
      ?>
<?php
   $query = "SELECT * FROM `course_category`  WHERE `id` = $course";
   
   $runfetch = mysqli_query($con, $query);
   
   $noofrow = mysqli_num_rows($runfetch);
   
   
   $indexnumber = 1;
   if ($noofrow >0 && $runfetch == TRUE) { 
      while ($data = mysqli_fetch_assoc($runfetch)) { 
   $student_course_name = $data['name'];
   
   }}
   ?>
<?php
   $query = "SELECT * FROM `batch`  WHERE `id` = $batch_id";
   
   $runfetch = mysqli_query($con, $query);
   
   $noofrow = mysqli_num_rows($runfetch);
   
   
   $indexnumber = 1;
   if ($noofrow >0 && $runfetch == TRUE) { 
      while ($data = mysqli_fetch_assoc($runfetch)) { 
   $student_batch_name = $data['batch_name'];
   
   $certificate_status = $data['certificate'];
   preg_match_all('!\d+!',  $student_batch_name , $matches);
   $student_batch_name_have_number = implode(' ', $matches[0]);
   
   $acronym='';
   $word='';
   $words = preg_split("/(\s|\-|\.)/", $student_batch_name);
   foreach($words as $w) {
       $acronym .= substr($w,0,1);
   }
   $word = $word . $acronym ;
   
   $numbers = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", " ");
   $word = str_replace($numbers, '', $word);
   
   }}
   ?>
<?php
   if (isset($_POST['start_test']) ||isset($_POST['start_test2'])) {
   
      
      
      unset($_SESSION['ftip69_test_id']);
   
   
      $test_id  = $_POST['test_id'];
      $_SESSION['ftip69_test_id'] = $test_id;
      
      $date = date_create();
      $timestamp = date_timestamp_get($date);   
      $test_start_time = $_SESSION['ftip69_test_start_time'] = $timestamp;
      $user_id = $_SESSION['ftip69_uid'];
   
   
      //allowed attempt
      $query100 = "SELECT `allowed_attempt` FROM `mcq_test` WHERE `id` = $test_id"; 
       $runfetch100 = mysqli_query($con, $query100);
       $noofrow100 = mysqli_num_rows($runfetch100);
       $attempt_count = 0;
     if ($noofrow100 >0 && $runfetch100 == TRUE) { 
       while ($data100 = mysqli_fetch_assoc($runfetch100)) {
          $allowed_attempt = $data100['allowed_attempt'];
          
       }
       
       }
   
      // check for attempt
      $query100 = "SELECT * FROM `mcq_test_log` WHERE `test_id` = $test_id AND `given_by` = $user_id"; 
       $runfetch100 = mysqli_query($con, $query100);
       $noofrow100 = mysqli_num_rows($runfetch100);
       $attempt_count = 0;
     if ($noofrow100 >0 && $runfetch100 == TRUE) { 
       while ($data100 = mysqli_fetch_assoc($runfetch100)) {
          $attempt_count++;
          
       }
      //  echo "<script>alert($attempt_count);</script>";
       }
   
       if($attempt_count > $allowed_attempt){
         echo "<script>alert('You have used your $allowed_attempt attempt for this test!');</script>";
          
       }else{
   
               // derive student id
       $query100 = "SELECT `student_id` FROM `user2` WHERE `id` = $user_id"; 
       $runfetch100 = mysqli_query($con, $query100);
       $noofrow100 = mysqli_num_rows($runfetch100);
       $indexnumber10 = 1;
     if ($noofrow100 >0 && $runfetch100 == TRUE) { 
       while ($data100 = mysqli_fetch_assoc($runfetch100)) {
          $student_id = $data100['student_id'];
       }
       }
   
       $query3 = "INSERT INTO `mcq_test_log`(`id`, `test_id`, `test_start_time`, `given_by`,`student_id`,`test_status`) VALUES (NULL,$test_id,$test_start_time,$user_id,$student_id,'incomplete')";
   
   
       if ($con->query($query3) === TRUE) { 
          $last_id = mysqli_insert_id($con); 
          $_SESSION['ftip69_mcq_test_log_id'] = $last_id;
          insertMcqTestQuestionLog($test_id);
            ?>
<script>
   // redirect to test question page 
   // window.location = "mcq-test-view.php?q=1";
   
</script>
<?php
   } else {
      // echo "Error: " . $query3 . "<br>" . $con->error;
   ?>
<script>
   alert('Fail to log this test');
</script>
<?php
   } 
   
   }
   }
   function insertMcqTestQuestionLog($test_id){
   require('dbcon.php');
   // derive data from mcq question table
   $query100 = "SELECT `id` FROM `mcq_test_questions` WHERE `test_id` = $test_id"; 
   $runfetch100 = mysqli_query($con, $query100);
   $noofrow100 = mysqli_num_rows($runfetch100);
   $indexnumber10 = 0;
   if ($noofrow100 >0 && $runfetch100 == TRUE) { 
   while ($data100 = mysqli_fetch_assoc($runfetch100)) {
   $mcq_test_question_id = $data100['id'];
   
   
   $mcq_test_log_id = $_SESSION['ftip69_mcq_test_log_id'];
   
   // inserting data into the question log of mcq test 
   $query3 = "INSERT INTO `mcq_test_questions_log`(`id`, 
   `mcq_test_log_id`, `mcq_test_question_id`) VALUES (NULL,$mcq_test_log_id,$mcq_test_question_id)";
   
   
   if($con->query($query3)){
      if (isset($_POST['start_test'])) {?>
<script>
   window.location = "../test/mcq-test-view.php?q=1";
</script>
<?php
   }else if (isset($_POST['start_test2'])) {?>
<script>
   window.location = "../test/long-test-view.php?q=1";
</script>
<?php
   }
   ?>
<?php
   }else{
      echo "<script>alert('Question log entry not done!');</script>";
   }
   
   $indexnumber10++;
   }
   }
   }
   ?>
<?php
   $assignment_incomplete_no_data_found = 0;
   $assignment_complete_no_data_found = 0;
   $test_incomplete_no_data_found = 0;
   $test_complete_no_data_found = 0;
   
   
   ?>
<?php
   if (isset($_POST['add_ratings'])) {
     
   $session_id = $_POST['session_id'];
     $rate_count = $_POST['rate_count'];
     $rate_description = $_POST['rate_description'];
     $rate_by = $student_id;
     
     $date = date_create();
     $timestamp = date_timestamp_get($date);
   
      $sql = "DELETE FROM `offline_session_rating` WHERE `session_id`=$session_id AND `rate_by` = $rate_by";
   
      if ($con->query($sql) === TRUE) {
   
      }
   
     $query3 = "INSERT INTO `offline_session_rating`(`id`, `session_id`, `rate_count`, `rate_description`, `rate_by`, `timestamp`) 
     VALUES (NULL,$session_id,$rate_count,'$rate_description',$rate_by,$timestamp)";
   
   
      // get date function 
      // $mydate=getdate(1456);
      // echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
   
       if ($con->query($query3) === TRUE) {
          
         ?>
<script>
   var su = 1;
   
     
</script>
<?php
   } else {
   ?>
<script>
   var fa = 1;
</script>
<?php
   echo "Error: " . $query3 . "<br>" . $con->error;
   }
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta
         name="description"
         content="endless admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities."
         />
      <meta
         name="keywords"
         content="admin template, endless admin template, dashboard template, flat admin template, responsive admin template, web app"
         />
      <meta name="author" content="pixelstrap" />
      <link
         rel="icon"
         href="<?php echo base_url()?>assets/images/favicon.png"
         type="image/x-icon"
         />
      <link
         rel="shortcut icon"
         href="<?php echo base_url()?>assets/images/favicon.png"
         type="image/x-icon"
         />
      <title>Student Dashboard | Fingertips</title>
      <!-- Google font-->
      <link
         href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900"
         rel="stylesheet"
         />
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet"
         />
      <link
         href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet"
         />
      <!-- Font Awesome-->
      <link
         rel="stylesheet"
         type="text/css"
         href="<?php echo base_url()?>assets/css/fontawesome.css"
         />
      <!-- ico-font-->
      <link
         rel="stylesheet"
         type="text/css"
         href="<?php echo base_url()?>assets/css/icofont.css"
         />
      <!-- Themify icon-->
      <link
         rel="stylesheet"
         type="text/css"
         href="<?php echo base_url()?>assets/css/themify.css"
         />
      <!-- Flag icon-->
      <link
         rel="stylesheet"
         type="text/css"
         href="<?php echo base_url()?>assets/css/flag-icon.css"
         />
      <!-- Feather icon-->
      <link
         rel="stylesheet"
         type="text/css"
         href="<?php echo base_url()?>assets/css/feather-icon.css"
         />
      <!-- Plugins css start-->
      <link
         rel="stylesheet"
         type="text/css"
         href="<?php echo base_url()?>assets/css/chartist.css"
         />
      <link
         rel="stylesheet"
         type="text/css"
         href="<?php echo base_url()?>assets/css/date-picker.css"
         />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/prism.css" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/tour.css" />
      <!-- Plugins css Ends-->
      <!-- Bootstrap css-->
      <link
         rel="stylesheet"
         type="text/css"
         href="<?php echo base_url()?>assets/css/bootstrap.css"
         />
      <!-- App css-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css" />
      <link
         id="color"
         rel="stylesheet"
         href="<?php echo base_url()?>assets/css/light-1.css"
         media="screen"
         />
      <!-- Responsive css-->
      <link
         rel="stylesheet"
         type="text/css"
         href="<?php echo base_url()?>assets/css/responsive.css"
         />
      <link
         rel="stylesheet"
         href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
         integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp"
         crossorigin="anonymous"
         />
     

      <link
         rel="stylesheet"
         type="text/css"
         href="<?php echo base_url()?>assets/css/rounded-circle.css"
         />
      <style>
         .customScroll1::-webkit-scrollbar-track
         {
         -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
         border-radius: 10px;
         background-color: #F5F5F5;
         }
         .customScroll1::-webkit-scrollbar
         {
         width: 5px;
         background-color: #F5F5F5;
         }
         .customScroll1::-webkit-scrollbar-thumb
         {
         border-radius: 10px;
         -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
         background-color: #ababab;
         }
      </style>
   </head>
   <body style="background-color:#ffffff;">
      <!-- Loader starts-->
     <!--  <div class="loader-wrapper">
         <div class="loader bg-white">
            <div class="whirly-loader"></div>
         </div>
      </div> -->
      <!-- Loader ends-->
      <!-- page-wrapper Start-->
      <!-- <div class="page-wrapper"> -->
         <!--change compact-wrapper-->
         <!-- Page Body Start-->
         <script>
            var getheader = document.getElementById('header_row');
            getheader.classList.add("open");
            
            var get_sidebar_btn = document.getElementById('sidebar_btn');
            get_sidebar_btn.style.display = "none";
            
            var get_brand_logo_top_header = document.getElementById('brand_logo_top_header');
            get_brand_logo_top_header.style.display = "block";
         </script>
        <!--  <span style="font-family: Poppins;font-size: 30px;">Activity</span> -->
          <div class="col-lg-9">
      <div class="card-body" id="header">
         <!-- <a href="#" style="color: #ffffff;" id="sidebarToggle"><i class="fa fa-bars" aria-hidden="true" style="height:5px;width: 5px;"></i></a> -->
          <div class="media static-top-widget">
               <div class="align-self-center text-center">
                <img class="" alt="100x100" src="<?php echo base_url()?>assets/images/student_portal_icon/Finger Tips 01.png"
           style="width: 100px;height: 100px;">
                </div>
               <div class="media-body">
                  <div class="pull-right">
                     <h1><?php echo "#".$student_id; ?></h1>
                  </div>
                  <span class="m-0">Welcome to Fingertips</span>
                  <h5  >You have enrolled in <?php echo $student_course_name; ?></h5>
                  <span class="m-0">Your Batch: <?php echo $student_batch_name; ?> <?php echo "(".$word.$student_batch_name_have_number.")"; ?></span>
               </div>
            </div>
         </div>
       <br>
          <div class="container-fluid">
         <div class="row">
            
                                 <div class="col-lg-8">
                                   <?php 
                                 $query200="SELECT * FROM `dashboard_notification` WHERE `batch_id`=$batch_id";
                                 $runfetch200=mysqli_query($con,$query200);
                                 $noofrow200=mysqli_num_rows($runfetch200);
                                 if ($noofrow200 > 0 && $runfetch200 == TRUE) {
                                    while ($data200=mysqli_fetch_assoc($runfetch200)) {
                                       ?>
                              <div id="success" class="alert  alert-dismissible fade show custom-primary" role="alert">
                                 <?php echo $data200['notification'];?>
                                 <button class="close" type="button" data-dismiss="alert" aria-label="Close" data-original-title="" title=""><span aria-hidden="true">×</span></button>
                              </div>
                              <!-- <div id="success" class="alert  alert-warning" role="alert">
                                 <?php echo $data200['notification'];?>
                                 </div> -->
                              <?php
                                 }
                                 }else{
                                 // echo "Error: " . $query3 . "<br>" . $con->error;
                                 }
                                 ?>
                                <div class="row">
                                   <div class="col-lg-3 ">
                                       <span style="font-size: 40px;color:#858585;border:#707070;">Activity</span>
                                   </div>
                                </div>
                                  <ul
                                       class="nav nav-tabs border-tab"
                                       id="top-tab"
                                       role="tablist"
                                       >
                                       <li class="nav-item">
                                          <a
                                             class="nav-link active"
                                             id="all-link"
                                             data-toggle="tab"
                                             href="#upcoming"
                                             role="tab"
                                             aria-selected="false"
                                             data-original-title=""
                                             title=""
                                             >Upcoming</a
                                             >
                                          <div class="material-border"></div>
                                       </li>
                                       <!-- <li class="nav-item">
                                          <a
                                             class="nav-link"
                                             id="image-link"
                                             data-toggle="tab"
                                             href="#ongoing"
                                             role="tab"
                                             aria-selected="false"
                                             data-original-title=""
                                             title=""
                                             ></i>Ongoing</a
                                             >
                                          <div class="material-border"></div>
                                       </li> -->
                                       <li class="nav-item">
                                          <a
                                             class="nav-link"
                                             id="video-link"
                                             data-toggle="tab"
                                             href="#completed"
                                             role="tab"
                                             aria-selected="false"
                                             data-original-title=""
                                             title=""
                                             ></i>Completed</a
                                             >
                                          <div class="material-border"></div>
                                       </li>
                                    </ul>
                              <div class="card" id="activity">
                                 <div class="card-body">
                                   
                                    <div class="tab-content customScroll1" id="" style="max-height:300px; overflow-y:auto; overflow-x:hidden;">
                                       <div
                                          class="search-links tab-pane fade active show"
                                          id="upcoming"
                                          role="tabpanel"
                                          aria-labelledby="upcoming"
                                          >
                                          <div class="row">
                                             <div class="col-xl-12 xl-50">
                                                <div class="card height-equal" style="box-shadow:0px 0px">
                                                   <div class="card-body">
                                                      <div class="upcoming-event">
                                                         <?php
                                                            $date = date_create();
                                                            $timestamp = date_timestamp_get($date);
                                                            $query = "SELECT * FROM `offline_session` WHERE `batch_id` = $batch_id AND `is_deleted` = 0;";
                                                            $runfetch = mysqli_query($con, $query);
                                                            $noofrow = mysqli_num_rows($runfetch);
                                                            
                                                            if ($noofrow >0 && $runfetch == TRUE) { 
                                                               while ($data = mysqli_fetch_assoc($runfetch)) { 
                                                            
                                                            $session_id = $data['id'];
                                                            $query10 = "SELECT * FROM `offline_session_log` WHERE `session_id` = $session_id;";
                                                            $runfetch10 = mysqli_query($con, $query10);
                                                            $noofrow10 = mysqli_num_rows($runfetch10);
                                                            if($noofrow10 == 0){
                                                                 ?>
                                                         <div class="upcoming-innner media"  style="width:100%;">
                                                            <div class="left m-r-30">
                                                               <img src="<?php echo base_url()?>assets/images/student_portal_icon/Group 59.png" >
                                                            </div>
                                                            <div class="media-body">
                                                               <p class="mb-0" style="color: #B1B1B1">
                                                                  Offline Sessions <?php echo '(#'.$data['id'].')'; ?>
                                                                  <span class="pull-right">
                                                                  <?php 
                                                                     $mydate=getdate($data['session_date']);
                                                                     echo "$mydate[month] $mydate[mday]";
                                                                     
                                                                     ?>    
                                                                  </span>
                                                               </p>
                                                               <h6  style="opacity: 100%"><?php echo $data['session_name']; ?></h6>
                                                               <span style="color: #B1B1B1">Course: Python for Data Science</span>
                                                               <br><span style="color: #B1B1B1">Starts at: Feb 25, 11:00 AM</span>
                                                               <ul
                                                                  class="nav "
                                                                  >
                                                                  <li class="nav-item" style="cursor:pointer;"  
                                                                     data-toggle="modal"
                                                                     data-target="#reading_material_list"
                                                                     <?php
                                                                        $query100 = "SELECT * FROM `offline_session` WHERE `id` = $session_id;";
                                                                        $runfetch100 = mysqli_query($con, $query100);
                                                                        $noofrow100 = mysqli_num_rows($runfetch100);
                                                                        $indexnumber100 = 1;
                                                                        
                                                                        if ($noofrow100 >0 && $runfetch100 == TRUE) { 
                                                                           while ($data100 = mysqli_fetch_assoc($runfetch100)) { 
                                                                        
                                                                              // use of explode 
                                                                              $reading_material = $data100['reading_material']; 
                                                                              $reading_material_array = explode (",", $reading_material);  
                                                                              $no_of_reading_material =  sizeof($reading_material_array);
                                                                              
                                                                        
                                                                           }
                                                                        }
                                                                             
                                                                        ?>
                                                                     onclick= "prepareReadingMaterialListModal(
                                                                     <?php                                                                  
                                                                        for($i= 0; $i < $no_of_reading_material-1; $i++){
                                                                            
                                                                            $anz_material_id = $reading_material_array[$i];
                                                                            $query1000 = "SELECT * FROM `material` WHERE `id` = $anz_material_id;";
                                                                           $runfetch1000 = mysqli_query($con, $query1000);
                                                                           $noofrow1000 = mysqli_num_rows($runfetch1000);
                                                                           
                                                                           
                                                                           if ($noofrow1000 >0 && $runfetch1000 == TRUE) { 
                                                                              while ($data1000 = mysqli_fetch_assoc($runfetch1000)) { 
                                                                                 echo "'".$data1000['topic_name']."'," ;
                                                                              }}
                                                                              echo $reading_material_array[$i];
                                                                            if($i != $no_of_reading_material - 2){
                                                                               echo ',';                                                                 
                                                                           }
                                                                           
                                                                           }
                                                                           ?>
                                                                     )"
                                                                     >
                                                                     <form method="post" action="read">
                                                                    <button id="activity_button">
                                                                         <img src="<?php echo base_url()?>assets/images/student_portal_icon/reading-material.png">&nbsp;
                                                                      Reading Material &nbsp;&nbsp;</button>
                                                                      </form> 
                                                                     <div class="material-border"></div>
                                                                  </li>
                                                               </ul>
                                                            </div>
                                                         </div>
                                                         <?php
                                                            }else{
                                                            
                                                             // data not found 
                                                            }
                                                            }}else{
                                                            // echo "<div class='text-center'>No Data Found  :(</div>";
                                                            }
                                                            
                                                            ?>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div
                                          class="search-links tab-pane fade"
                                          id="ongoing"
                                          role="tabpanel"
                                          aria-labelledby="ongoing"
                                          >
                                          <div class="row">
                                             <div class="col-xl-12 xl-50">
                                                <div class="card height-equal" style="box-shadow:0px 0px">
                                                   <div class="card-body">
                                                      <div class="upcoming-event">
                                                         <?php
                                                            $query = "SELECT * FROM `offline_session_log` WHERE `start_time` != 0 AND `is_completed` = 0 ";                                            
                                                            $runfetch = mysqli_query($con, $query);                       
                                                            $noofrow = mysqli_num_rows($runfetch);       
                                                            
                                                            if ($noofrow > 0 && $runfetch == TRUE) { 
                                                              while ($data = mysqli_fetch_assoc($runfetch)) {
                                                                $session_id = $data['session_id'];
                                                            
                                                            $query10 = "SELECT * FROM `offline_session` WHERE `id` = $session_id  AND `is_deleted` = 0;";                                            
                                                            $runfetch10 = mysqli_query($con, $query10);                       
                                                            $noofrow10 = mysqli_num_rows($runfetch10);       
                                                            
                                                            if ($noofrow10 > 0 && $runfetch10 == TRUE) { 
                                                              while ($data10 = mysqli_fetch_assoc($runfetch10)) {
                                                            
                                                               if($data10['batch_Id'] == $batch_id){
                                                            ?>
                                                         <div class="upcoming-innner media">
                                                            <div class="left m-r-20"  style="background-color: #26266C; opacity:15%;"> 
                                                               <i data-feather="book-open"></i>
                                                            </div>
                                                            <div class="media-body">
                                                               <p class="mb-0" style="color: #B1B1B1">
                                                                  Offline Sessions <?php echo ' (#'.$data10['id'].')'; ?>
                                                                  <span class="pull-right">
                                                                  <?php 
                                                                     $mydate=getdate($data10['session_date']);
                                                                     echo "$mydate[month] $mydate[mday]";
                                                                     
                                                                     ?>    
                                                                  </span>
                                                               </p>
                                                               <h6 class="f-w-600"><?php echo $data10['session_name']; ?></h6>
                                                               <ul
                                                                  class="nav "
                                                                  >
                                                                  <li class="nav-item" style="cursor:pointer;"  
                                                                     data-toggle="modal"
                                                                     data-target="#reading_material_list"
                                                                     <?php
                                                                        $query100 = "SELECT * FROM `offline_session` WHERE `id` = $session_id;";
                                                                        $runfetch100 = mysqli_query($con, $query100);
                                                                        $noofrow100 = mysqli_num_rows($runfetch100);
                                                                        $indexnumber100 = 1;
                                                                        
                                                                        if ($noofrow100 >0 && $runfetch100 == TRUE) { 
                                                                           while ($data100 = mysqli_fetch_assoc($runfetch100)) { 
                                                                        
                                                                              // use of explode 
                                                                              $reading_material = $data100['reading_material']; 
                                                                              $reading_material_array = explode (",", $reading_material);  
                                                                              $no_of_reading_material =  sizeof($reading_material_array);
                                                                              
                                                                        
                                                                           }
                                                                        }
                                                                             
                                                                        ?>
                                                                     onclick= "prepareReadingMaterialListModal(
                                                                     <?php                                                                  
                                                                        for($i= 0; $i < $no_of_reading_material-1; $i++){
                                                                            
                                                                            $anz_material_id = $reading_material_array[$i];
                                                                            $query1000 = "SELECT * FROM `material` WHERE `id` = $anz_material_id;";
                                                                           $runfetch1000 = mysqli_query($con, $query1000);
                                                                           $noofrow1000 = mysqli_num_rows($runfetch1000);
                                                                           
                                                                           
                                                                           if ($noofrow1000 >0 && $runfetch1000 == TRUE) { 
                                                                              while ($data1000 = mysqli_fetch_assoc($runfetch1000)) { 
                                                                                 echo "'".$data1000['topic_name']."'," ;
                                                                              }}
                                                                              echo $reading_material_array[$i];
                                                                            if($i != $no_of_reading_material - 2){
                                                                               echo ',';                                                                 
                                                                           }
                                                                           
                                                                           }
                                                                           ?>
                                                                     )"
                                                                     >
                                                                     <!-- <a
                                                                        class="text-primary"
                                                                        ><i class="fas fa-book"></i>Reading Material &nbsp;&nbsp; </a
                                                                        > -->

                                                                         <button id="activity_button"><i class="fas fa-book"></i>Reading Material &nbsp;&nbsp;</button> 
                                                                     <div class="material-border"></div>
                                                                  </li>
                                                                  <li class="nav-item" style="cursor:pointer;"  
                                                                     data-toggle="modal"
                                                                     data-target="#session_resource_list"
                                                                     <?php
                                                                        $query100 = "SELECT * FROM `offline_session` WHERE `id` = $session_id;";
                                                                        $runfetch100 = mysqli_query($con, $query100);
                                                                        $noofrow100 = mysqli_num_rows($runfetch100);
                                                                        $indexnumber100 = 1;
                                                                        
                                                                        if ($noofrow100 >0 && $runfetch100 == TRUE) { 
                                                                           while ($data100 = mysqli_fetch_assoc($runfetch100)) { 
                                                                        
                                                                              // use of explode 
                                                                              $session_resource = $data100['session_resource']; 
                                                                              $session_resource_array = explode (",", $session_resource);  
                                                                              $no_of_session_resource =  sizeof($session_resource_array);
                                                                              
                                                                        
                                                                           }
                                                                        }
                                                                             
                                                                        ?>
                                                                     onclick= "prepareSessionResourceListModal(
                                                                     <?php                                                                  
                                                                        for($i= 0; $i < $no_of_session_resource-1; $i++){
                                                                         
                                                                         $anz_material_id = $session_resource_array[$i];
                                                                          $query1000 = "SELECT * FROM `material` WHERE `id` = $anz_material_id;";
                                                                        $runfetch1000 = mysqli_query($con, $query1000);
                                                                        $noofrow1000 = mysqli_num_rows($runfetch1000);
                                                                        
                                                                        
                                                                        if ($noofrow1000 >0 && $runfetch1000 == TRUE) { 
                                                                           while ($data1000 = mysqli_fetch_assoc($runfetch1000)) { 
                                                                              echo "'".$data1000['topic_name']."'," ;
                                                                           }}
                                                                         echo $session_resource_array[$i];
                                                                         if($i != $no_of_session_resource - 2){
                                                                            echo ',';                                                                 
                                                                        }
                                                                        }
                                                                        ?>
                                                                     )"
                                                                     >
                                                                 &nbsp;     <button id="activity_button"><i class="fas fa-book"></i>Session Resource &nbsp;&nbsp;</button> 
                                                                   <!--   <a
                                                                        class="text-primary"
                                                                        ><i class="fas fa-file-invoice"></i>Session Resource &nbsp;&nbsp; </a
                                                                        > -->
                                                                     <div class="material-border"></div>
                                                                  </li>
                                                               </ul>
                                                            </div>
                                                         </div>
                                                         <?php
                                                            }
                                                               }
                                                               } 
                                                               }
                                                               }else{
                                                                  // echo "<div class='text-center'>No Data Found :(</div>";
                                                                  }
                                                               
                                                               ?>
                                                      </div>
                                                      <div class="code-box-copy">
                                                         <button
                                                            class="code-box-copy__btn btn-clipboard"
                                                            data-clipboard-target="#example-head"
                                                            title="Copy"
                                                            >
                                                         <i class="icofont icofont-copy-alt"></i>
                                                         </button>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div
                                          class="search-links tab-pane fade"
                                          id="completed"
                                          role="tabpanel"
                                          aria-labelledby="completed"
                                          >
                                          <div class="row">
                                             <div class="col-xl-12 xl-50">
                                                <div class="card height-equal" style="box-shadow:0px 0px">
                                                   <div class="card-body">
                                                      <div class="upcoming-event">
                                                         <?php
                                                            $query = "SELECT * FROM `offline_session_log` WHERE `is_completed` = 1";                                            
                                                            $runfetch = mysqli_query($con, $query);                       
                                                            $noofrow = mysqli_num_rows($runfetch);       
                                                            
                                                            if ($noofrow > 0 && $runfetch == TRUE) { 
                                                              while ($data = mysqli_fetch_assoc($runfetch)) {
                                                                $session_id = $data['session_id'];
                                                              
                                                            
                                                            $query10 = "SELECT * FROM `offline_session` WHERE `id` = $session_id  AND `is_deleted` = 0;";                                            
                                                            $runfetch10 = mysqli_query($con, $query10);                       
                                                            $noofrow10 = mysqli_num_rows($runfetch10);       
                                                            
                                                            if ($noofrow10 > 0 && $runfetch10 == TRUE) { 
                                                              while ($data10 = mysqli_fetch_assoc($runfetch10)) {
                                                               if($data10['batch_Id'] == $batch_id){
                                                            ?>
                                                         <div class="upcoming-innner media">
                                                           <div class="left m-r-30">
                                                               <img src="<?php echo base_url()?>assets/images/student_portal_icon/Group 55.png" >
                                                            </div>
                                                            <div class="media-body">
                                                               <p class="mb-0" style="color: #B1B1B1">
                                                                  Offline Sessions <?php echo ' (#'.$data10['id'].')'; ?>                                                               <span class="pull-right">
                                                                  <?php 
                                                                     $mydate=getdate($data10['session_date']);
                                                                     echo "$mydate[month] $mydate[mday]";
                                                                     
                                                                     ?>    
                                                                  </span>
                                                               </p>
                                                               <h6 class=""><?php echo $data10['session_name']; ?></h6>
                                                                <span style="color: #B1B1B1">Course: Python for Data Science</span>
                                                                    <br><span style="color: #B1B1B1">Starts at: Feb 25, 11:00 AM</span>
                                                               <ul
                                                                  class="nav "
                                                                  >
                                                                  <li class="nav-item" style="cursor:pointer;"  
                                                                     data-toggle="modal"
                                                                     data-target="#reading_material_list"
                                                                     <?php
                                                                        $query100 = "SELECT * FROM `offline_session` WHERE `id` = $session_id;";
                                                                        $runfetch100 = mysqli_query($con, $query100);
                                                                        $noofrow100 = mysqli_num_rows($runfetch100);
                                                                        $indexnumber100 = 1;
                                                                        
                                                                        if ($noofrow100 >0 && $runfetch100 == TRUE) { 
                                                                           while ($data100 = mysqli_fetch_assoc($runfetch100)) { 
                                                                        
                                                                              // use of explode 
                                                                              $reading_material = $data100['reading_material']; 
                                                                              $reading_material_array = explode (",", $reading_material);  
                                                                              $no_of_reading_material =  sizeof($reading_material_array);
                                                                              
                                                                        
                                                                           }
                                                                        }
                                                                             
                                                                        ?>
                                                                     onclick= "prepareReadingMaterialListModal(
                                                                     <?php                                                                  
                                                                        for($i= 0; $i < $no_of_reading_material-1; $i++){
                                                                            
                                                                            $anz_material_id = $reading_material_array[$i];
                                                                            $query1000 = "SELECT * FROM `material` WHERE `id` = $anz_material_id;";
                                                                           $runfetch1000 = mysqli_query($con, $query1000);
                                                                           $noofrow1000 = mysqli_num_rows($runfetch1000);
                                                                           
                                                                           
                                                                           if ($noofrow1000 >0 && $runfetch1000 == TRUE) { 
                                                                              while ($data1000 = mysqli_fetch_assoc($runfetch1000)) { 
                                                                                 echo "'".$data1000['topic_name']."'," ;
                                                                              }}
                                                                              echo $reading_material_array[$i];
                                                                            if($i != $no_of_reading_material - 2){
                                                                               echo ',';                                                                 
                                                                           }
                                                                           
                                                                           }
                                                                           ?>
                                                                     )"
                                                                     >
                                                                     <form method="post" action="read">
                                                                    <button id="activity_button">
                                                                         <img src="<?php echo base_url()?>assets/images/student_portal_icon/reading-material.png">&nbsp;
                                                                      Reading Material &nbsp;&nbsp;</button>
                                                                      </form> 
                                                                        <!-- <button id="activity_button"><img src="<?php echo base_url()?>assets/images/student_portal_icon/reading-material.png" >&nbsp;&nbsp;Reading Material &nbsp;&nbsp;</button>  -->
                                                                     <!-- <a
                                                                        class="text-primary"
                                                                        ><i class="fas fa-book"></i>Reading Material &nbsp;&nbsp; </a
 -->                                                                        
                                                                     <div class="material-border"></div>
                                                                  </li>
                                                                  <li class="nav-item" style="cursor:pointer;"  
                                                                     data-toggle="modal"
                                                                     data-target="#session_resource_list"
                                                                     <?php
                                                                        $query100 = "SELECT * FROM `offline_session` WHERE `id` = $session_id;";
                                                                        $runfetch100 = mysqli_query($con, $query100);
                                                                        $noofrow100 = mysqli_num_rows($runfetch100);
                                                                        $indexnumber100 = 1;
                                                                        
                                                                        if ($noofrow100 >0 && $runfetch100 == TRUE) { 
                                                                           while ($data100 = mysqli_fetch_assoc($runfetch100)) { 
                                                                        
                                                                              // use of explode 
                                                                              $session_resource = $data100['session_resource']; 
                                                                              $session_resource_array = explode (",", $session_resource);  
                                                                              $no_of_session_resource =  sizeof($session_resource_array);
                                                                              
                                                                        
                                                                           }
                                                                        }
                                                                             
                                                                        ?>
                                                                     onclick= "prepareSessionResourceListModal(
                                                                     <?php                                                                  
                                                                        for($i= 0; $i < $no_of_session_resource-1; $i++){
                                                                         
                                                                         $anz_material_id = $session_resource_array[$i];
                                                                          $query1000 = "SELECT * FROM `material` WHERE `id` = $anz_material_id;";
                                                                        $runfetch1000 = mysqli_query($con, $query1000);
                                                                        $noofrow1000 = mysqli_num_rows($runfetch1000);
                                                                        
                                                                        
                                                                        if ($noofrow1000 >0 && $runfetch1000 == TRUE) { 
                                                                           while ($data1000 = mysqli_fetch_assoc($runfetch1000)) { 
                                                                              echo "'".$data1000['topic_name']."'," ;
                                                                           }}
                                                                         echo $session_resource_array[$i];
                                                                         if($i != $no_of_session_resource - 2){
                                                                            echo ',';                                                                 
                                                                        }
                                                                        }
                                                                        ?>
                                                                     )"
                                                                     >
                                                                      &nbsp;   <button id="activity_button"><img src="<?php echo base_url()?>assets/images/student_portal_icon/page.png" >&nbsp;&nbsp;RSession Resource &nbsp;&nbsp;&nbsp;&nbsp;</button> 
                                                                    <!--  <a
                                                                        class="text-primary"
                                                                        ><i class="fas fa-file-invoice"></i>Session Resource &nbsp;&nbsp; </a
                                                                        > -->
                                                                     <div class="material-border"></div>
                                                                  </li>
                                                                  <?php
                                                                     $query100 = "SELECT * FROM `offline_session_log` WHERE `session_id` = $session_id;";
                                                                     $runfetch100 = mysqli_query($con, $query100);
                                                                     $noofrow100 = mysqli_num_rows($runfetch100);
                                                                     $indexnumber100 = 1;
                                                                     
                                                                     if ($noofrow100 >0 && $runfetch100 == TRUE) { 
                                                                        while ($data100 = mysqli_fetch_assoc($runfetch100)) { 
                                                                     
                                                                           // use of explode 
                                                                           $string1 = $data100['recording_files']; 
                                                                           $str_arr1 = explode (",", $string1);  
                                                                           $no_of_videos =  sizeof($str_arr1);
                                                                     
                                                                           $video_comment = $data100['video_comment'];
                                                                           
                                                                           
                                                                     
                                                                        }
                                                                     }
                                                                          
                                                                     ?>
                                                                  <?php 
                                                                     if($no_of_videos == 1){
                                                                     
                                                                        ?>
                                                                  <li class="nav-item" style="cursor:pointer;"  
                                                                     data-toggle="modal"
                                                                     data-target="#no_video_reason"
                                                                     onclick= "prepareNoVideoReason(
                                                                     <?php                                                                  
                                                                        echo "'".$video_comment."'";
                                                                        ?>
                                                                     )"
                                                                     >
                                                                     <form method="post" action="record">
                                                                      <button id="activity_button"><img src="<?php echo base_url()?>assets/images/student_portal_icon/button.png" >&nbsp;&nbsp;Recordings &nbsp;&nbsp;</button> 
                                                                     </form>
                                                                      <!-- <a
                                                                        class="text-primary"
                                                                        ><i class="fas fa-play-circle"></i>Recordings </a
                                                                        > -->
                                                                     <div class="material-border"></div>
                                                                  </li>
                                                                  <?php
                                                                     }else{
                                                                        ?>
                                                                  <li class="nav-item" style="cursor:pointer;"  
                                                                     data-toggle="modal"
                                                                     data-target="#video_list"
                                                                     onclick= "prepareVideoListModal(
                                                                     <?php                                                                  
                                                                        for($i= 0; $i < $no_of_videos-1; $i++){
                                                                         echo $session_id;
                                                                         if($i != $no_of_videos - 2){
                                                                            echo ',';                                                                 
                                                                        }
                                                                        }
                                                                        ?>
                                                                     )"
                                                                     >
                                                                      &nbsp; <button id="activity_button"><img src="<?php echo base_url()?>assets/images/student_portal_icon/button.png" ></i>&nbsp;&nbsp;Recordings &nbsp;&nbsp;</button> 
                                                                    <!--  <a class="text-primary"
                                                                        ><i class="fas fa-play-circle"></i>Recordings </a
                                                                        > -->
                                                                     
                                                                        
                                                                     <div class="material-border"></div>

                                                                  </li>
                                                                  
                                                                  <?php
                                                                     }
                                                                     
                                                                     ?>
                                                                  <?php
                                                                     $query512 = "SELECT * FROM `attendance` WHERE `student_id`=$student_id AND `batch_id`=$batch_id AND `session_id`=$session_id";
                                                                     print_r($query512);
                                                                     $runfetch512 = mysqli_query($con, $query512);
                                                                     
                                                                     $noofrow512 = mysqli_num_rows($runfetch512);
                                                                     
                                                                     if ($noofrow512 >
                                                                     0 && $runfetch512 == TRUE) { while ($data512 =
                                                                     mysqli_fetch_assoc($runfetch512)) { 
                                                                        $attendance_for_rating=$data512['attendance'];
                                                                        
                                                                     }}
                                                                     if ($attendance_for_rating=='present') {
                                                                     
                                                                     ?>
                                                                  <li class="nav-item" style="cursor:pointer;margin-left:10px;"  
                                                                     data-toggle="modal"
                                                                     data-target="#rating_modal"
                                                                     <?php
                                                                        $query100 = "SELECT * FROM `offline_session_log` WHERE `session_id` = $session_id;";
                                                                        $runfetch100 = mysqli_query($con, $query100);
                                                                        $noofrow100 = mysqli_num_rows($runfetch100);
                                                                        $indexnumber100 = 1;
                                                                        
                                                                        if ($noofrow100 >0 && $runfetch100 == TRUE) { 
                                                                           while ($data100 = mysqli_fetch_assoc($runfetch100)) { 
                                                                        
                                                                              // use of explode 
                                                                              $string1 = $data100['recording_files']; 
                                                                              $str_arr1 = explode (",", $string1);  
                                                                              $no_of_videos =  sizeof($str_arr1);
                                                                              
                                                                        
                                                                           }
                                                                        }
                                                                             
                                                                        ?>
                                                                     <?php
                                                                        $query100 = "SELECT * FROM `offline_session_rating` WHERE `session_id` = $session_id AND `rate_by` = $student_id;";
                                                                        $runfetch100 = mysqli_query($con, $query100);
                                                                        $noofrow100 = mysqli_num_rows($runfetch100);
                                                                        $indexnumber100 = 1;
                                                                        
                                                                        if ($noofrow100 >0 && $runfetch100 == TRUE) { 
                                                                           while ($data100 = mysqli_fetch_assoc($runfetch100)) { 
                                                                        
                                                                              $rates_given = $data100['rate_count'];
                                                                              $rate_description = $data100['rate_description'];
                                                                              echo $rate_description;
                                                                        
                                                                           }
                                                                        }else{
                                                                           $rates_given = 'Rate Now';
                                                                           $rate_description = '';
                                                                        }
                                                                             
                                                                        ?>
                                                                     onclick= "prepareRatingModal(
                                                                     '<?php echo $session_id; ?>',
                                                                     '<?php echo $rate_description; ?>'
                                                                     ); ratingMouseOver('<?php if($rates_given == 'Rate Now'){echo '5';}else{echo $rate_description;} ?>');"
                                                                     >
                                                                     <a
                                                                        class="text-warning"
                                                                        ><i class="<?php if($rates_given=='Rate Now'){echo 'far';}else{echo 'fas';} ?> fa-star"></i><?php echo $rates_given; ?></a
                                                                        >
                                                                     <div class="material-border"></div>
                                                                  </li>
                                                                  <?php 
                                                                     }
                                                                     ?>
                                                               </ul>
                                                            </div>
                                                         </div>
                                                         <?php
                                                            }
                                                            }
                                                            } 
                                                            }
                                                            }else{
                                                               // echo "<div class='text-center'>No Data Found :(</div>";
                                                               }
                                                            
                                                            ?>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                               <div class="col-lg-6" >
                                     <div class="card" id="assignment_css">
                                       <div class="card-body">
                                          <div class="row">
                                            <div class="col-lg-1">
                                            <img class="z-depth-2 header_logo" alt="100x100" src="<?php echo base_url()?>assets/images/student_portal_icon/help.png" style="height:50px;width: 50px;"> 
                                            </div>
                                             <div class="col-lg-8 offset-lg-1" style="font-size:17px;color: #5A5858">
                                              Need Assistance ?<br>
                                              <span style="font-size:11px;color: #949393;">We are here to help. Click here to reach out to us.
                                             </div>
                                            
                                           </div>

                                        </div>
                                       </div>
                                     </div>
                                      <div class="col-lg-6" >
                                     <div class="card" id="assignment_css">
                                       <div class="card-body">
                                          <div class="row" >
                                            <div class="col-lg-1">
                                            <img class="z-depth-2 header_logo" alt="100x100" src="<?php echo base_url()?>assets/images/student_portal_icon/newsletter.png" style="height:50px;width: 50px;"> 
                                            </div>
                                             <div class="col-lg-8 offset-lg-1" style="font-size:17px;color: #5A5858">
                                             Industry Articals<br>
                                              <span style="font-size:11px;color: #949393;">Curated articles on latest industry development and trends.
                                             </div>
                                             
                                          </div>

                                        </div>
                                       </div>
                                     </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-lg-12" >
                                     <div class="card" id="refer_to_earn">
                                       <div class="card-body">
                                          <div class="row" >
                                             <div class="col-lg-6" >
                                              <img src="<?php echo base_url()?>assets/images/student_portal_icon/2784128.png" id="img"
                                                type="image/x-icon" style="width: 310px;height: 180px;">
                                             </div>
                                             <div class="col-lg-6 " style="font-size: 25px;color: #5A5858">
                                              <B>REFER AND EARN</B><br>
                                              <span style="color:#949393;font-size: 12">Spread the gift of learning! Refer your friend and get rewarded.</span>
                                             </div>
                                             
                                          </div>

                                       </div>
                                     </div>
                                   </div>
                                 </div>
                                 </div>
                                   <div class="col-lg-4">
                                     <div class="card" id="assignment_css">
                                       <div class="card-body">
                                          <div class="row" style="font-size: 12px;color:#5A5858;">
                                             <div class="col-lg-4">
                                              Assignment
                                              <br>1
                                             </div>
                                             <div class="col-lg-3">
                                              Project
                                              <br>1
                                             </div>
                                             <div class="col-lg-4">
                                              Cash study
                                              <br>1
                                             </div>
                                          </div>
                                          <br><br>
                                          <div class="row" style="font-size: 13px;color:#5A5858;">
                                             <div class="col-lg-4 offset-lg-7">
                                              <span style="color: #26266C;font-size: 14px;"> View More </span>
                                          </div>
                                        </div>
                                       </div>
                                     </div>
                                         <div class="card" id="assignment_css">
                                          <div class="card-body">
                                           
                                           <div class="row">
                                             <div class="col-lg-6">
                                              <span style="color:#5A5858">ATTENDANCE</span>
                                             </div>
                                             <div class="col-lg-4 offset-lg-2">
                                              <span style="color:#5A5858"> View All</span>
                                             </div>
                                             <div class="container">
                                                 <img src="<?php echo base_url()?>assets/images/student_portal_icon/circle.png" alt="Nature" style="height: 300px">
                                                 <br>

                                                   <div id="chart"></div>
                                                 </div>
                                                 <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                                             <script type="text/javascript">
                                               var options = {
                                                    series: [100],
                                                    chart: {
                                                    height: 450,
                                                    type: 'donut',
                                                    offsetY: -10
                                                  },
                                                  plotOptions: {
                                                    radialBar: {
                                                      startAngle: -135,
                                                      endAngle: 135,
                                                      dataLabels: {
                                                        name: {
                                                          fontSize: '16px',
                                                          color: undefined,
                                                          offsetY: 120
                                                        },
                                                        value: {
                                                          offsetY: 76,
                                                          fontSize: '22px',
                                                          color: undefined,
                                                          formatter: function (val) {
                                                    //        return val + "%";
                                                             
                                                          }
                                                        }
                                                      }
                                                    }
                                                  },
                                                  fill: {
                                                    type: 'gradient',
                                                    gradient: {
                                                        shade: 'gray',
                                                        shadeIntensity: 0.15,
                                                        inverseColors: false,
                                                        opacityFrom: 1,
                                                        opacityTo: 1,
                                                        stops: [0, 50, 65, 91]
                                                    },
                                                  },
                                                  stroke: {
                                                    dashArray: 4
                                                  },
                                                  //labels: ['Median Ratio'],
                                                  };

                                                  var chart = new ApexCharts(document.querySelector("#chart"), options);
                                                  chart.render();
                                                
                                             </script>
                                          </div>
                                       </div>
                                     </div>
                                     </div>
                                   </div>
                                 </div>
      </div>

    </div>
 <style type="text/css">
   .container {
  position: relative;
  font-family: Arial;
}

#chart {
  position: absolute;
  bottom: 20px;
  right: 20px;
  color: white;
  padding-left: 20px;
  padding-right: 20px;
}
 </style>
          <script src="<?php echo base_url()?>assets/js/jquery-3.2.1.min.js"></script>
      <!-- Bootstrap js-->
      <script src="<?php echo base_url()?>assets/js/bootstrap/popper.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/bootstrap/bootstrap.js"></script>
      <!-- feather icon js-->
      <script src="<?php echo base_url()?>assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- Sidebar jquery-->
      <script src="<?php echo base_url()?>assets/js/sidebar-menu.js"></script>
      <script src="<?php echo base_url()?>assets/js/config.js"></script>
      <!-- Plugins JS start-->
      <script src="<?php echo base_url()?>assets/js/chart/chartist/chartist.js"></script>
      <script src="<?php echo base_url()?>assets/js/chart/chartjs/chart.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/chart/knob/knob.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/chart/knob/knob-chart.js"></script>
      <script src="<?php echo base_url()?>assets/js/prism/prism.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/clipboard/clipboard.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/counter/jquery.waypoints.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/counter/jquery.counterup.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/counter/counter-custom.js"></script>
      <script src="<?php echo base_url()?>assets/js/custom-card/custom-card.js"></script>
      <script src="<?php echo base_url()?>assets/js/dashboard/university-custom.js"></script>
      <script src="<?php echo base_url()?>assets/js/datepicker/date-picker/datepicker.js"></script>
      <script src="<?php echo base_url()?>assets/js/datepicker/date-picker/datepicker.en.js"></script>
      <script src="<?php echo base_url()?>assets/js/datepicker/date-picker/datepicker.custom.js"></script>
      <!-- <script src="<?php echo base_url()?>assets/js/tour/intro.js"></script> -->
      <!-- <script src="<?php echo base_url()?>assets/js/tour/intro-init.js"></script> -->
      <script src="<?php echo base_url()?>assets/js/typeahead/handlebars.js"></script>
      <script src="<?php echo base_url()?>assets/js/typeahead/typeahead.bundle.js"></script>
      <script src="<?php echo base_url()?>assets/js/typeahead/typeahead.custom.js"></script>
      <script src="<?php echo base_url()?>assets/js/chat-menu.js"></script>
      <script src="<?php echo base_url()?>assets/js/height-equal.js"></script>
      <script src="<?php echo base_url()?>assets/js/tooltip-init.js"></script>
      <script src="<?php echo base_url()?>assets/js/typeahead-search/handlebars.js"></script>
      <script src="<?php echo base_url()?>assets/js/typeahead-search/typeahead-custom.js"></script>
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="<?php echo base_url()?>assets/js/script.js"></script>
      <!-- Plugin used-->
      <!-- custom js starts -->
      <script src="<?php echo base_url()?>assets/js/student-dashboard-modal-create.js"></script>
      <!-- custom js ends -->