
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
   window.location = "firsttest";
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
     
         <script>
            var getheader = document.getElementById('header_row');
            getheader.classList.add("open");
            
            var get_sidebar_btn = document.getElementById('sidebar_btn');
            get_sidebar_btn.style.display = "none";
            
            var get_brand_logo_top_header = document.getElementById('brand_logo_top_header');
            get_brand_logo_top_header.style.display = "block";
         </script>
        <!--  <span style="font-family: Poppins;font-size: 30px;">Activity</span> -->
    <div class="col-lg-8">
      <div class="card-body" id="header" >
         <!-- <a href="#" style="color: #ffffff;" id="sidebarToggle"><i class="fa fa-bars" aria-hidden="true" style="height:5px;width: 5px;"></i></a> -->
         <div class="row">
            <div class="col-lg-1">
            <img class="" alt="100x100" src="<?php echo base_url()?>assets/images/student_portal_icon/Finger Tips 01.png"
           style="margin-left:-30px;margin-top:-18px;width: 170px;height: 184px;">
            </div>
            <div class="col-lg-11">
                 <div class="media static-top-widget" >
               <div class="align-self-center text-center">
                </div>
               <div class="media-body">
                  <div class="pull-right" style="width:200px;margin-top:20px;text-align:center;">
                   <div class="row">
                       <div class="col-lg-10" >
                       <h1 style="font-size:60px"><?php echo "#".$student_id; ?></h1>
               
                     </div>
                      </div>   
                  </div> 
                  <BR> <?php echo $student_batch_name; ?> 
                  <span class="m-0" style="font-size:16px;">Welcome to Fingertips</span>
                  <h5 style="font-size:22px;" >You have enrolled in <?php echo $student_course_name; ?></h5>
                  <span class="m-0" style="font-size:10px;" >Your Batch: <?php echo $student_batch_name; ?> <?php echo "(".$word.$student_batch_name_have_number.")"; ?></span>
               </div>
            </div>
         </div>
         </div>
         </div>
         <br>
          <div class="container-fluid">
                   <div class="row">
                        <div class="col-lg-8" style="margin-left:-60px;">
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
                              <span style="margin-left:20px;font-size: 40px;color:#858585;border:#707070;">Activity</span>
                           </div>
                        </div>
                         <script type="text/javascript"> 
                                      $(document).ready(function() { 
                                            $('#all-link').click();
                                       });
                                    </script>
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
                                 <div class="card-body" style="margin-left:-10px;">
                                   
                                    <div class="tab-content customScroll1" id="" style="max-height:470px; overflow-y:auto; overflow-x:hidden;">
                                       <div
                                          class="search-links tab-pane fade active show"
                                          id="upcoming"
                                          role="tabpanel"
                                          aria-labelledby="upcoming"
                                          >
                                          <div class="row">
                                             <div class="col-xl-12 xl-50">
                                                <div class="card height-equal" style=";margin-left:10px;box-shadow:0px 0px;margin-top:-25px;">
                                                   <div class="card-body">
                                                      <div class="upcoming-event" style="margin-top:-30x;"">
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
                                                         <div class="upcoming-innner media"  style="width:100%;margin-left:-45px;padding-top:0px;">
                                                               <img src="<?php echo base_url()?>assets/images/student_portal_icon/Group 59.png" >
                                                            <div class="media-body">
                                                               <p class="mb-0" style="color: #B1B1B1;font-size:12px;">
                                                                  Offline Sessions <?php echo '(#'.$data['id'].')'; ?>
                                                                  </span>
                                                               </p>
                                                               <h5  style="opacity: 100%;font-size:15px;"><?php echo $data['session_name']; ?></h5>
                                                               <span style="color: #B1B1B1;font-size:14px;">Course: Python for Data Science</span>
                                                               <br><span style="color: #B1B1B1;font-size:13px;">Starts at: Feb 25, 11:00 AM</span>
                                                               <ul
                                                                  class="nav"
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
                                                                     <div class="row">
                                                                         <div class="col-lg-12">
                                                                         <form method="post" action="read">
                                                                    <button id="activity_button" style="width:164px;margin-top:8px;">
                                                                         <img style="margin-left:-30px;" src="<?php echo base_url()?>assets/images/student_portal_icon/reading-material.png">&nbsp;
                                                                      Reading Material </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                      </form> 
                                                                     
                                                                        </div>
                                                                     </div>

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


                                                            <!-- test Exam code panel  -->
                                                            <?php

                                             $query = "SELECT * FROM `offline_session` WHERE `batch_id` = $batch_id AND `is_deleted` = 0;";

                                             $runfetch = mysqli_query($con, $query);

                                             $noofrow = mysqli_num_rows($runfetch);

                                             $indexnumber = 1;

                                             

                                             if ($noofrow >0 && $runfetch == TRUE) { 

                                                while ($data = mysqli_fetch_assoc($runfetch)) { 

                                             

                                                   $session_id_test = $data['id'];

                                             

                                                   

                                                      

                                                // use of explode 

                                                $test = $data['test']; 

                                                

                                                $test_array = explode (",", $test);  

                                                $no_of_test =  sizeof($test_array);

                                                for($i= 0; $i < $no_of_test-1; $i++){

                                                   

                                             

                                                   $query10 = "SELECT * FROM `mcq_test_log` WHERE `given_by` = $user_id  AND `test_id` = $test_array[$i];";

                                                   $runfetch10 = mysqli_query($con, $query10);

                                                   $noofrow10 = mysqli_num_rows($runfetch10);

                                                   

                                             

                                                   if ($noofrow10 == 0){

                                                      // echo $assignment_array[$i].'<br>';  

                                             

                                             

                                                      // deriving submission date

                                             

                                                $query1000 = "SELECT * FROM `offline_session_log` WHERE `session_id` = $session_id_test;";

                                                $runfetch1000 = mysqli_query($con, $query1000);

                                                $noofrow1000 = mysqli_num_rows($runfetch1000);

                                                $indexnumber1000 = 1;

                                                

                                                if ($noofrow1000 > 0 && $runfetch1000 == TRUE) { 

                                                   while ($data1000 = mysqli_fetch_assoc($runfetch1000)) { 

                                                      $test_submission = $data1000['test_submission'];

                                                      if($test_submission == ""){

                                                         $date = date_create();

                                                         $timestamp = date_timestamp_get($date);

                                             

                                                         $test_submission = $timestamp;

                                                      }

                                                   }

                                                }else{

                                                   // echo "Error: " . $query1000 . "<br>" . $con->error;

                                                   continue;

                                                }

                                             

                                             

                                             

                                                   $query100 = "SELECT * FROM `mcq_test` WHERE `id` = $test_array[$i];";

                                                   $runfetch100 = mysqli_query($con, $query100);

                                                   $noofrow100 = mysqli_num_rows($runfetch100);

                                                   $indexnumber = 1;

                                                   

                                                   if ($noofrow100 >0 && $runfetch100 == TRUE) { 

                                                      while ($data100 = mysqli_fetch_assoc($runfetch100)) { 

                                             

                                             

                                                      ?>
                                             <!--  <div class="upcoming-innner media"  style="width:100%;margin-left:-45px;padding-top:0px;">
                                                               <img src="<?php echo base_url()?>assets/images/student_portal_icon/Group 59.png" >
                                                            <div class="media-body">
                                                               <p class="mb-0" style="color: #B1B1B1;font-size:12px;">
 -->
                                               <div class="upcoming-innner media"  style="width:100%;margin-left:-45px;padding-top:0px;">
                                                               <img src="<?php echo base_url()?>assets/images/student_portal_icon/Group 59.png" >
                                                            <div class="media-body">
                                                               <p class="mb-0" style="color: #B1B1B1;font-size:12px;">
                                                                  Offline Sessions <?php echo '(#'.$data100['id'].')'; ?>
                                                                  </span>
                                                               </p>
                                                               <h5  style="opacity: 100%;font-size:15px;"><?php echo $data100['test_name'] ?></h5>
                                                              <span style="color: #B1B1B1;font-size:13px;">Starts at:  <?php $mydate=getdate($test_submission);
                                                                 echo "$mydate[month] $mydate[mday]"; ?>
                                                                    <?php

                                                   $test_id100=$data100['id'];

                                                   $query4="SELECT * FROM `mcq_test_questions` WHERE test_id=$test_id100";

                                                   $run4=mysqli_query($con,$query4);

                                                   $data4=mysqli_fetch_assoc($run4);

                                                      $question_type=$data4['question_type'];

                                                      if ($question_type==1) {?>
                                                   
                                                           <form action="" method="post">
                                                            <input type="hidden" name="test_id" value="<?php echo $data100['id'];?>">
                                                                    <button id="activity_button" style="width:164px;margin-top:8px;" name="start_test">
                                                                         <img style="margin-left:-30px;" src="<?php echo base_url()?>assets/images/student_portal_icon/reading-material.png">&nbsp;
                                                                      Start Test </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                      </form> 
                                                                     
                                               <!--  <form action="" method="post">

                                                   <input type="hidden" name="test_id" value="<?php echo $data100['id'];?>">

                                                   <button class="btn btn-sm text-white custom-primary" type="submit" name="start_test">

                                                   Start Test

                                                   </button>

                                                </form> -->

                                                <?php

                                                   }elseif ($question_type==2 || $question_type==3) {

                                                      ?>
                                                   <!--  <form action="" method="post">
                                                            <input type="hidden" name="test_id" value="<?php echo $data100['id'];?>">
                                                                    <button id="activity_button" style="width:164px;margin-top:8px;" name="start_test2">
                                                                         <img style="margin-left:-30px;" src="<?php echo base_url()?>assets/images/student_portal_icon/reading-material.png">&nbsp;
                                                                      Start Test </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                      </form>  -->
                                                <form action="" method="post">

                                                   <input type="hidden" name="test_id" value="<?php echo $data100['id'];?>">

                                                   <button class="btn btn-sm text-white custom-primary" type="submit" name="start_test2">

                                                   Start Test

                                                   </button>

                                                </form>

                                                <?php

                                                   }

                                                   ?>


                                                      </span>
                                                             </div>
                                         
                                             
                                             

                                          </div>

                                          <?php

                                             }}

                                             }else{

                                                

                                                

                                                if($test_incomplete_no_data_found != 1){

                                                   // echo "<div class='text-center'>No Data Found :(</div>";

                                                }

                                                $test_incomplete_no_data_found = 1;

                                                

                                             }

                                                                                                  

                                             }

                                             

                                             

                                             }

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
                                          id="completed"
                                          role="tabpanel"
                                          aria-labelledby="completed"
                                          >
                                          <div class="row">
                                             <div class="col-xl-12 xl-50">
                                                <div class="card height-equal" style="box-shadow:0px 0px;margin-left:-38px;margin-top:-30px;">
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
                                                               <img src="<?php echo base_url()?>assets/images/student_portal_icon/Group 55.png" >
                                                            <div class="media-body">
                                                               <p class="mb-0" style="color: #B1B1B1">
                                                                  Offline Sessions <?php echo ' (#'.$data10['id'].')'; ?>                                                               <span class="pull-right">
                                                                  <?php 
                                                                     $mydate=getdate($data10['session_date']);
                                                                   //  echo "$mydate[month] $mydate[mday]";
                                                                     ?>    
                                                                  </span>
                                                               </p>
                                                               <h6 class="" style="font-size:15px;"><?php echo $data10['session_name']; ?></h6>
                                                                <span style="color: #B1B1B1">Course:
                                                               <?php 
                                                                  echo   $data10['course'];
                                                                   ?></span>
                                                                    <br><span style="color: #B1B1B1">Starts at: <?php echo "$mydate[month] $mydate[mday]" ?>, 11:00 AM</span>
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
                                                                         <img src="<?php echo base_url()?>assets/images/student_portal_icon/reading-material.png">&nbsp;&nbsp;
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
                                                            <!-- text exam code  -->
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
                                                                   //  echo "$mydate[month] $mydate[mday]";
                                                                     ?>    
                                                                  </span>
                                                               </p>
                                                               <h6 class="" style="font-size:15px;"><?php echo $data10['session_name']; ?></h6>
                                                                <span style="color: #B1B1B1">Course:
                                                               <?php 
                                                                  echo   $data10['course'];
                                                                   ?></span>
                                                                    <br><span style="color: #B1B1B1">Starts at: <?php echo "$mydate[month] $mydate[mday]" ?>, 11:00 AM</span>
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
                                                                         <img src="<?php echo base_url()?>assets/images/student_portal_icon/reading-material.png">&nbsp;&nbsp;
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
                                             <div class="col-lg-9 offset-lg-1" style="font-size:17px;color: #5A5858">
                                              Support ?<br>
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
                                             <div class="col-lg-9 offset-lg-1" style="font-size:17px;color: #5A5858">
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
                                                type="image/x-icon" style="width: 250px;height: 130px;">
                                             </div>
                                             <div class="col-lg-6 " style="font-size: 25px;color: #5A5858;">
                                              <B>REFER AND EARN</B><br>
                                              <span style="color:#949393;font-size: 12">Spread the gift of learning! Refer your friend and get rewarded.</span>
                                             </div>
                                             
                                          </div>

                                       </div>
                                     </div>
                                   </div>
                                 </div>
                                 </div>

                                   <div class="col-lg-4" style="margin-top: 135px;">
                                     <div class="card" id="demo">
                                       <div class="card-body">
                                          <div class="row" style="color:#5A5858;font-size:17px;">
                                             <div class="col-lg-4">
                                              Assignment
                                              <br><br><span style="margin-left:20px;font-size:17px;">1</span>
                                             </div>
                                             <div class="col-lg-4" >
                                              Project
                                              <br><br><span style="margin-left:20px;font-size:17px;">1</span>
                                             </div>
                                             <div class="col-lg-4">
                                              Cash study
                                              <br><br><span style="margin-left:20px;font-size:17px;">1</span>
                                             </div>
                                          </div>
                                          
                                          <div class="row" style="font-size: 13px;color:#5A5858;">
                                             <div class="col-lg-4 offset-lg-8">
                                              <span style="color: #26266C;font-size: 14px;color:#26266C;">View More </span>
                                          </div>
                                        </div>
                                       </div>
                                     </div>
                                         <div class="card" id="demo">
                                          <div class="card-body">
                                           
                                           <div class="row">
                                             <div class="col-lg-6">
                                              <span style="color:#5A5858;font-family:Poppins;font-size:15px;">ATTENDANCE</span>
                                             </div>
                                             <div class="col-lg-4 offset-lg-2">
                                              <span style="color:#5A5858"> View All</span>
                                             </div>
                                             <div class="container">
                                                <img src="<?php echo base_url()?>assets/images/student_portal_icon/circle.png" alt="Nature" style="height: 250px;width:250px;margin-top:50px;">
                                                <br>

                                                   <div id="chart"></div>
                                                 </div>
                                                 <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                                        
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
          <!--  -->