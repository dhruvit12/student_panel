
<?php  require_once('dbcon.php');
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
require 'dbcon.php';
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
  //../test/mcq-test-view.php?q=1
window.location = "mcq-test/1";
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



?><style type="text/css">
   .image{
    margin-top: -33px;
    margin-left:-34px;
    border-radius: 27px;
    width: 200px;
   }
  .background
  {
    border-radius: 18px;
    box-shadow:1px 2px 2px 2px rgb(0 0 0 / 10%);
    margin-left:-20px;
  }
  .course_button
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
    box-shadow: 2px -0.4px 1px -0.5px #E46F0E, 1px 1px 2px 3px rgb(0 0 0 / 10%);
    margin-top:10px ;
    width:140px;
    }
</style>
   <span id="course_card" style="font-family: 'Poppins', sans-serif;"><b>Quiz</b></span>
      <div class="row">
      <div class="col-lg-9 mt-1">
     <!--
      	<div class="row">
      		 <div class="col-lg-12">
          <div class="card background" style="height:170px">
            <div class="card-body">
              <div class="row" style="">
                 <div class="col-lg-4">
                  <div class="image">
                   <img  src="<?php echo base_url()?>assets/images/university/python-1.png"; style="margin-top:-2px;height: 180px;width:250px">
                 </div>
               </div>
               //
                 <div class="col-lg-3" style="font-family: poppins">
                   <h3 style="color:#858585;">TABLEAU QUIZ</h3>
                      <span style="color:#858585;font-size: 10px;" id="sub-contect">Course: </span>
                      <br>
                      <span style="color:#858585;font-size: 10px;" id="sub-contect">Starts at: </span>
                      <br>
                      <span style="color:#858585;font-size: 10px;" id="sub-contect">Starts at: Feb 25, 11:00 AM</span>
                 </div>
                 <div class="col-lg-2 mt-4">
               
                 	<a  class="course_button"><p style="margin-top:2px;">Start Quiz</p></a><br><br>
                  <a  class="course_button"><p style="margin-top:2px;">Restart Quiz</p></a><br>
                 	 <br><button class="course_button">Restart Quiz</button><br> -->


               <!--  </div> -->
                 
                 
                     
                 
                                    
                                  
<!-- 
              </div>
            </div>
          </div>
		      </div>
		  </div>
          </div>
      </div> -->
        
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
                                                      
                                             
                                                      $query10 = "SELECT * FROM `mcq_test_log` WHERE `given_by` = $user_id AND `test_id` = $test_array[$i];";
                                                      $runfetch10 = mysqli_query($con, $query10);
                                                      $noofrow10 = mysqli_num_rows($runfetch10);
                                                      
                                             
                                                      if ($noofrow10 != 0){
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
                                                      continue;
                                                   }
                                                         $query100 = "SELECT * FROM `mcq_test` WHERE `id` = $test_array[$i];";
                                                      $runfetch100 = mysqli_query($con, $query100);
                                                      $noofrow100 = mysqli_num_rows($runfetch100);
                                                      $indexnumber = 1;
                                                      
                                                      if ($noofrow100 >0 && $runfetch100 == TRUE) { 
                                                         while ($data100 = mysqli_fetch_assoc($runfetch100)) { 
                                             
                                             
                                                         ?>
                                         	<div class="row">
                                            <div class="col-lg-12">
                                            <div class="card background" style="height:170px">
                                              <div class="card-body">
                                                <div class="row" style="">
                                                  <div class="col-lg-4">
                                                    <div class="image">
                                                    <img  src="<?php echo base_url()?>assets/images/university/python-1.png"; style="margin-top:-2px;height: 180px;width:250px">
                                                  </div>
                                                </div>
                                                <div class="col-lg-3" style="font-family: poppins">
                                                  <h3 style="color:#858585;"> <?php echo $data100['test_name']; ?></h3>
                                                      <span style="color:#858585;font-size: 10px;" id="sub-contect">Course: <?php echo $_SESSION['student_course_name']; ?></span>
                                                      <br>
                                                      <span style="color:#858585;font-size: 10px;" id="sub-contect">Starts at:   <?php 
                                                                                      $mydate=getdate($test_submission);
                                                                                      echo "$mydate[month] $mydate[mday]";
                                                                                      ?>     </span>
                                                </div>
                                                <?php
                                                   $test_id100=$data100['id'];
                                                   $query4="SELECT * FROM `mcq_test_questions` WHERE test_id=$test_id100";
                                                   $run4=mysqli_query($con,$query4);
                                                   $data4=mysqli_fetch_assoc($run4);
                                                   $question_type=$data4['question_type'];
                                                   if ($question_type==1) {?>
                                                   
                                                <form action="" method="post">
                                                   <input type="hidden" name="test_id" value="<?php echo $data100['id'];?>">
                                                   <button class="course_button" type="submit" name="start_test">
                                                   Start Test 
                                                   </button>
                                                </form>
                                                <?php
                                                   }elseif ($question_type==2 || $question_type==3) {
                                                      ?>
                                                <form action="" method="post">
                                                   <input type="hidden" name="test_id" value="<?php echo $data100['id'];?>">
                                                   <button class="course_button" type="submit" name="start_test2">
                                                   Restart Test Again
                                                   </button>
                                                </form>
                                                <?php
                                                   }
                                                   ?>
                                             </div>
                                          </div>
                                          </div>
                                          </div>
                                          </div>
                                          <?php
                                             }}
                                             }else{
                                             
                                                if($test_complete_no_data_found != 1){
                                                   // echo "<div class='text-center'>No Data Found :(</div>";
                                                   
                                                }
                                                $test_complete_no_data_found = 1;
                                                
                                             }                                                     
                                             }
                                             
                                             
                                             }
                                             }
                                             
                                             
                                             
                                             ?>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
     