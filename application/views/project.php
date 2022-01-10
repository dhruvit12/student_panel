<script>
   //menu
 document.getElementById('menu_course').classList.add("menu-active");
 //icon
 document.getElementById('sidebar_icon_2').style.fill='#E46F0E';

</script>
<?php
   if (!isset($_SESSION['ftip69_uid'])) {
     header('location:../auth/login.php');
     
   } 
   ?>
<script src="<?php echo base_url()?>assets/js/jquery-3.2.1.min.js"></script>
      <!-- Bootstrap js-->
      <!-- <script src="<?php echo base_url()?>assets/js/bootstrap/popper.min.js"></script> -->
      <script src="<?php echo base_url()?>assets/js/bootstrap/bootstrap.js"></script>
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
   window.location = '<?php echo base_url()?>';
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
<span id="course_card" style="font-family: 'Poppins', sans-serif;"><b>Project</b></span>
 <br><br><br>
      <script>
   function prepareAssignmentDownloadModal(no1,no2,no3,no4,no5,no6,no7,no8,no9,no10){
      if(no1 == undefined){
         no1 = '';
      }else{
      var name_array = no1.split('.');
      no1_extension = name_array[1];
      no1_file_name = no1.substring(0, 20);
         
      }
      if(no2 == undefined){
         no2 = '';
      }
      else{
      var name_array = no2.split('.');
      no2_extension = name_array[1];
      no2_file_name = no2.substring(0, 20);
         
      }
      if(no3 == undefined){
         no3 = '';
      }
      else{
      var name_array = no3.split('.');
      no3_extension = name_array[1];
      no3_file_name = no3.substring(0, 20);
         
      }
      if(no4 == undefined){
         no4 = '';
      }
      else{
      var name_array = no4.split('.');
      no4_extension = name_array[1];
      no4_file_name = no4.substring(0, 20);
         
      }
      if(no5 == undefined){
         no5 = '';
      }
      else{
      var name_array = no5.split('.');
      no5_extension = name_array[1];
      no5_file_name = no5.substring(0, 20);
         
      }
      if(no6 == undefined){
         no6 = '';
      }
      else{
      var name_array = no6.split('.');
      no6_extension = name_array[1];
      no6_file_name = no6.substring(0, 20);
         
      }
      if(no7 == undefined){
         no7 = '';
      }
      else{
      var name_array = no7.split('.');
      no7_extension = name_array[1];
      no7_file_name = no7.substring(0, 20);
         
      }
      if(no8 == undefined){
         no8 = '';
      }
      else{
      var name_array = no8.split('.');
      no8_extension = name_array[1];
      no8_file_name = no8.substring(0, 20);
         
      }
      if(no9 == undefined){
         no9 = '';
      }
      else{
      var name_array = no9.split('.');
      no9_extension = name_array[1];
      no9_file_name = no9.substring(0, 20);
         
      }
      if(no10 == undefined){
         no10 = '';
      }
      else{
      var name_array = no10.split('.');
      no10_extension = name_array[1];
      no10_file_name = no10.substring(0, 20);
         
      }
   
   
      var get_assignment_download_a_tag_1 = document.getElementById('assignment_download_a_tag_1');
      var get_assignment_download_a_tag_2 = document.getElementById('assignment_download_a_tag_2');
      var get_assignment_download_a_tag_3 = document.getElementById('assignment_download_a_tag_3');
      var get_assignment_download_a_tag_4 = document.getElementById('assignment_download_a_tag_4');
      var get_assignment_download_a_tag_5 = document.getElementById('assignment_download_a_tag_5');
      var get_assignment_download_a_tag_6 = document.getElementById('assignment_download_a_tag_6');
      var get_assignment_download_a_tag_7 = document.getElementById('assignment_download_a_tag_7');
      var get_assignment_download_a_tag_8 = document.getElementById('assignment_download_a_tag_8');
      var get_assignment_download_a_tag_9 = document.getElementById('assignment_download_a_tag_9');
      var get_assignment_download_a_tag_10 = document.getElementById('assignment_download_a_tag_10');
   
      var link = '<?php echo base_url()?>uploads/session/material/';
   no1 = no1.trim();
   get_assignment_download_a_tag_1.href = link+no1;
   
   no2 = no2.trim();
   get_assignment_download_a_tag_2.href = link+no2;
   no3 = no3.trim();
   get_assignment_download_a_tag_3.href = link+no3;
   no4 = no4.trim();
   get_assignment_download_a_tag_4.href = link+no4;
   no5 = no5.trim();
   get_assignment_download_a_tag_5.href = link+no5;
   no6 = no6.trim()
   get_assignment_download_a_tag_6.href = link+no6;
   no7 = no7.trim()
   get_assignment_download_a_tag_7.href = link+no7;
   no8 = no8.trim()
   get_assignment_download_a_tag_8.href = link+no8;
   no9 = no9.trim()
   get_assignment_download_a_tag_9.href = link+no9;
   no10 = no10.trim()
   get_assignment_download_a_tag_10.href = link+no10;
   
      get_assignment_download_a_tag_1.innerHTML = no1_file_name+'.'+no1_extension;
      get_assignment_download_a_tag_2.innerHTML = no2_file_name+'.'+no2_extension;
      get_assignment_download_a_tag_3.innerHTML = no3_file_name+'.'+no3_extension;
      get_assignment_download_a_tag_4.innerHTML = no4_file_name+'.'+no4_extension;
      get_assignment_download_a_tag_5.innerHTML = no5_file_name+'.'+no5_extension;
      get_assignment_download_a_tag_6.innerHTML = no6_file_name+'.'+no6_extension;
      get_assignment_download_a_tag_7.innerHTML = no7_file_name+'.'+no7_extension;
      get_assignment_download_a_tag_8.innerHTML = no8_file_name+'.'+no8_extension;
      get_assignment_download_a_tag_9.innerHTML = no9_file_name+'.'+no9_extension;
      get_assignment_download_a_tag_10.innerHTML = no10_file_name+'.'+no10_extension;
   
   }
   
   
</script>
<script>
   function projectDownloadMaterial(downloadproject) {
      var get_download_project = downloadproject;
   
   }
</script>

<?php 
                  $query = "SELECT * FROM `assign_project` WHERE `batch_id` = $batch_id";
                  $runfetch = mysqli_query($con, $query);
                  $noofrow = mysqli_num_rows($runfetch);
                  if ($noofrow > 0 && $runfetch == TRUE) {
                     $kp=1;
                     while ($data = mysqli_fetch_assoc($runfetch)) {
                        $project_id = $data['project_id'];
                        // $course_id=$data['course'];
                        $querys = "SELECT * FROM `project` WHERE `id` = $project_id;";
                        $runfetchs = mysqli_query($con, $querys);
                        $noofrows = mysqli_num_rows($runfetchs);
                        if ($noofrows > 0 && $runfetchs == TRUE) {
                        while ($datas = mysqli_fetch_assoc($runfetchs)) {
                              $project_name = $datas['project_name'];  
                            $description = $datas['description'];

 ?>
                              <div class="row">
                              <div class="col-lg-11 mt-1">
                                  <div class="card background" style="height:180px">
                                    <div class="card-body">
                                      <div class="row" style="">
                                         <div class="col-lg-4">
                                          <div class="image">
                                           <img  src="<?php echo base_url()?>assets/images/university/python-1.png"; style="margin-top:-2px;height: 190px;margin-left: -3px;">
                                         </div>
                                       </div>
                                         <div class="col-lg-8" style="font-family: poppins">
                                           <h3 style="color:#585252;"><?php echo $project_name;?></h3>
                                           <p style="color:#000000;font-size: 10px;"><?php echo $description;?></p>
                                              <span style="color:#949393;font-size: 10px;" id="sub-contect">Starts at: <?php
                                                   $mydate = getdate($datas['timestamp']);
                                                   echo "$mydate[month] $mydate[mday]";
                                                   ?>  </span>
                                              <br>
                                                <button class="course_button">Knowledge check</button>&nbsp;&nbsp;
                        
                                         </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                             </div>

<?php 
                        // print_r($assignment_array);
                        // echo $session_id_assignment.'<br>';
                        // echo $no_of_assignment;
                         } }
                      }
                    }?>
                   
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
   <div class="m-4"></div>
   <script src="<?php echo base_url()?>assets/js/student-dashboard-modal-create.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   <div class="modal fade" id="assignment_download_modal">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                           <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                 <h4 class="modal-title">Assignments Resources</h4>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <!-- Modal body -->
                              <div class="modal-body text-center" style="overflow-x:auto;">
                                 <div><a href="" id="assignment_download_a_tag_1" download></a></div>
                                 <div><a href="" id="assignment_download_a_tag_2" download></a></div>
                                 <div><a href="" id="assignment_download_a_tag_3" download></a></div>
                                 <div><a href="" id="assignment_download_a_tag_4" download></a></div>
                                 <div><a href="" id="assignment_download_a_tag_5" download></a></div>
                                 <div><a href="" id="assignment_download_a_tag_6" download></a></div>
                                 <div><a href="" id="assignment_download_a_tag_7" download></a></div>
                                 <div><a href="" id="assignment_download_a_tag_8" download></a></div>
                                 <div><a href="" id="assignment_download_a_tag_9" download></a></div>
                                 <div><a href="" id="assignment_download_a_tag_10" download></a></div>
                              </div>
                              <!-- Modal footer -->
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                              </div>
                           </div>
                        </div>
                     </div>
               
<script>
   //menu
 document.getElementById('menu_course').classList.add("menu-active");
 //icon
 document.getElementById('sidebar_icon_2').style.fill='#E46F0E';

</script>
<style type="text/css">
   .image{
    margin-top: -33px;
    margin-left:-34px;
    border-radius: 27px;
    padding: 1px;
   }
  .background
  {
    border-radius: 18px;
    box-shadow: 8px -0.4px 1px -0.5px #E46F0E, 0px 1px 2px 3px rgb(0 0 0 / 10%);
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
    box-shadow: 2px -0.4px 1px -0.5px #E46F0E, 2px 1px 2px 3px rgb(0 0 0 / 10%);
    margin-top:10px ;
    width:140px;
    }
</style>
 
   