<?php
   if (!isset($_SESSION['ftip69_uid'])) {
     header('location:../auth/login.php');
     
   } 
   ?>
<?php
   require_once 'dbcon.php';
   $user_id = $_SESSION['ftip69_uid'];
   $query = "SELECT * FROM `user2` WHERE `id` = $user_id;";
   $run = mysqli_query($con, $query);
   $row = mysqli_num_rows($run);
   $data = mysqli_fetch_assoc($run);
   
   
      $ftip69_acc_student = $data['acc_student'];
      
   
   // success
   if ($ftip69_acc_student==1) {
   // getting users credentials
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
   .jumbotron-card
   {
   height:auto; 
   border:2px;
   background-color: #ffffff;
   border-radius: 
   border-radius: 16px;
   color:white;
   font-family: Poppins;
   box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.1);
   background-size: 150px;
   box-shadow: 3px -0.4px 1px -0.5px #E46F0E, 2px 1px 2px 3px rgb(0 0 0 / 10%);
   padding-top:0px;
   padding-bottom:0px;
      }
   #course_button
   {
   background-color: #26266C;
   opacity:100%;
   color:#ffffff;
   font-family: Poppins;
   font-size: 11px;;
   border-radius: 7px;
   height: 29px;
   box-shadow: 1px 3px 8px 0px rgba(0,0,0,0.1);
   border:none;
   box-shadow: 2px -0.4px 1px -0.5px #E46F0E, 2px 1px 2px 3px rgb(0 0 0 / 10%);
   margin-top: 5px;
   width:140px;
   }
</style>
      <span id="course_card" style="margin-left:0px;"><b>Assignments</b></span>
    
<?php 
                  $query = "SELECT * FROM `offline_session` WHERE `batch_id` = $batch_id AND `is_deleted` = 0;";
                  $runfetch = mysqli_query($con, $query);
                  $noofrow = mysqli_num_rows($runfetch);
                  if ($noofrow > 0 && $runfetch == TRUE) {
                     while ($data = mysqli_fetch_assoc($runfetch)) {
                        $session_id_assignment = $data['id'];
                        $course_id=$data['course'];
                  
                        
                        
                        
                        $querys = "SELECT * FROM `course` WHERE `id` = $course_id;";
                        $runfetchs = mysqli_query($con, $querys);
                        $noofrows = mysqli_num_rows($runfetchs);
                        if ($noofrows > 0 && $runfetchs == TRUE) {
                        while ($datas = mysqli_fetch_assoc($runfetchs)) {
                              $course_name = $datas['name'];  
                              

                              $assignment = $data['assignment'];
                        $assignment_array = explode(",", $assignment);
                        $no_of_assignment = sizeof($assignment_array);



                        // print_r($assignment_array);
                        // echo $session_id_assignment.'<br>';
                        // echo $no_of_assignment;
                  
                        for ($i = 0; $i < $no_of_assignment - 1; $i++) {
                           $assignment_id = $assignment_array[$i];
                           
                           $query10 = "SELECT * FROM `assignment_log` WHERE `given_by` = $user_id AND `batch_id` = $batch_id AND `assignment_id` = $assignment_id;";
                           $runfetch10 = mysqli_query($con, $query10);
                           $noofrow10 = mysqli_num_rows($runfetch10);
                           if ($noofrow10 == 0) {
                              
                              $query1000 = "SELECT * FROM `offline_session_log` WHERE `session_id` = $session_id_assignment;";
                              $runfetch1000 = mysqli_query($con, $query1000);
                              $noofrow1000 = mysqli_num_rows($runfetch1000);
                              if ($noofrow1000 > 0 && $runfetch1000 == TRUE) {
                                 while ($data1000 = mysqli_fetch_assoc($runfetch1000)) {
                                 
                                 
                                    $assignment_submission = $data1000['assignment_submission'];
                                    if ($assignment_submission == "") {
                                       $date = date_create();
                                       $timestamp = date_timestamp_get($date);
                                       $assignment_submission = $timestamp;
                                       
                                    }
                                    
                                 }
                           }else{
                              $date = date_create();
                              $timestamp = date_timestamp_get($date);
                              $assignment_submission = $timestamp;
                           }
                  
                           $query100 = "SELECT * FROM `assignment` WHERE `id` = $assignment_id;";
                           $runfetch100 = mysqli_query($con, $query100);
                           $noofrow100 = mysqli_num_rows($runfetch100);
                           if ($noofrow100 > 0 && $runfetch100 == TRUE) {
                              while ($data100 = mysqli_fetch_assoc($runfetch100)) {
                  
                              $assignment_solution = $data100['assignment_solution'];
                                       
                                       ?>
                                         <div class="row" >
                                             <div class="col-lg-12 mt-1" >
                                                <div class="jumbotron jumbotron-card">
                                             
                                                   <div class="row ">
                                                   <div class="col-lg-1">
                                                <img src="<?php echo base_url()?>assets/images/student_portal_icon/Group 59.png" id="icon" style="height: 73px;" alt="CoolBrand">
                                             </div>
                                             <div class="col-lg-7">
                                                <p style="
                                                   color: #858585;
                                                   font-size: 18px;
                                                   margin-left: -40px;
                                                   margin-top:25px;" >
                                                   <?php echo $data100['assignment_name']; ?>
                                                
                                                </p>
                                                
                                                <div class="collapse" id="myCollapse<?php echo $data100['id'];?>" style="margin-top: -36px; padding: 0px;">
                                                <br>
                                                
                                                <div  style="margin-left:-50px;" >
                                                   <div class="jumbotron" style="height:auto;background-color:white;padding-top:0px;padding-bottom:0px;">
                                                      <span style="font-size:10px;color: #858585;margin-left:-50px">Course: <?php echo $course_name;?></span><br>
                                                      <span style="font-size:10px;color: #858585;margin-left:-50px"><?php
                                                   $mydate = getdate($assignment_submission);
                                                   echo "$mydate[month] $mydate[mday]";
                                                   ?>   </span>
                                                    <?php
                                                   $assignment_resource_id = $data100['assignment_resources'];
                                                   // echo $assignment_resource_id;
                                                   $query10000 = "SELECT `file_name` FROM `material` WHERE `id` = $assignment_resource_id;";
                                                   $runfetch10000 = mysqli_query($con, $query10000);
                                                   $noofrow10000 = mysqli_num_rows($runfetch10000);
                                                   $indexnumber = 1;
                                                   if ($noofrow10000 > 0 && $runfetch10000 == TRUE) {
                                                       while ($data10000 = mysqli_fetch_assoc($runfetch10000)) {
                                                           // use of explode
                                                           $files = $data10000['file_name'];
                                                           //  echo $files;
                                                           $files_array = explode(",", $files);
                                                           $no_of_files = sizeof($files_array);
                                                          
                                                           //  echo 'number of file'.$no_of_files;
                                                           //  print_r($files_array);
                                                           
                                                       }
                                                   }
                                                   ?>
                                                      <br>
                                                      <span style="width:180px;margin-left:-50px;margin-top:-80px; ">
                                                      <button   id="course_button" style="cursor:pointer"
                                                   data-toggle="modal"
                                                   data-target="#assignment_download_modal"
                                                   onclick="prepareAssignmentDownloadModal(
                                                   <?php
                                                      for ($j= 0;$j < $no_of_files-1 ;$j++) {
                                                         
                                                         echo "'".$files_array[$j]."'";
                                                         
                                                         if ($j != $no_of_files - 2) {
                                                            echo ',';
                                                         }
                                                      }
                                                      ?>
                                                   )"
                                                   >Download Files</button>&nbsp;&nbsp;
                                                         <button class="text-default" type="submit" name="download_material" id="course_button" >Download Solution
                                                         </button>
                                                      </span>
                                                   
                                                   </div>
                                                </div>
                                                </div>
                                             </div>
                                             <div class="col-lg-4 mt-5">
                                             <div class="pull-right">
                                             <a href="#myCollapse<?php echo  $data100['id'];?>" data-bs-toggle="collapse" style="font-size:24px;color:gray;" >
                                                <i class="fas fa-angle-down" ></i>
                                                </a>
                                              </div>
                                             </div>
                                          </div>
                                          </div>
                                       <?php
                                             }
                                             }
                                             }else{
                                             echo "";
                                             }
                                             }
                                             }
                                             }
                                          }}
                                             ?>

                   
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
   <div class="m-4"></div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>