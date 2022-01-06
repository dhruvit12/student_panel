<script>
   //menu
 document.getElementById('menu_course').classList.add("menu-active");
 //icon
 document.getElementById('sidebar_icon_2').style.fill='#E46F0E';

</script>
<?php  require_once ('dbcon.php'); ?>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<div class="row">
   <span id="course_card" style="margin-left:0px;"><b>List of Sessions</b></span>
   <br><br><br> <br><br><br>
   <?php 
      if(!empty($session_list)){
                        foreach($session_list as $session_data)
                        {
                    ?>
   <div class="col-lg-12 ">
      <div class="jumbotron" id="session">
         <div class="row" style="margin-top: -27px;">
            <div class="col-lg-1">
               <?php
                  $query100 = "SELECT * FROM `offline_session_log` WHERE `session_id` = $session_data->id;";
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
               <ul class="nav">
               <li class="nav-item" style="cursor:pointer;"  
                  
                  onclick= "prepareNoVideoReason(
                  <?php                                                                  
                     echo "'".$video_comment."'";
                     ?>
                  )"
                  >
                  &nbsp;&nbsp;&nbsp; 
                  <img src="<?php echo base_url()?>assets/images/student_portal_icon/play.png" id="icon" style="height: 73px;margin-top:12px;" alt="CoolBrand" data-toggle="modal"
                  data-target="#no_video_reason">
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
                         echo $session_data->id;
                         if($i != $no_of_videos - 2){
                         echo ',';                                                                 
                     }
                     }
                     ?>
                  )"
                  >
                  <img src="<?php echo base_url()?>assets/images/student_portal_icon/play.png" id="icon" style="height: 73px;margin-top:12px;" alt="CoolBrand">
                  <!--  <a class="text-primary"
                     ><i class="fas fa-play-circle"></i>Recordings </a
                     > -->
                  <div class="material-border"></div>
               </li>
               <?php
                  }
                  
                  ?>
               <!--                             
                  <a href="" data-toggle="modal" data-target="#myModal" data-id="<? echo $session_data['session_id']; ?>">
                          <img src="<?php echo base_url()?>assets/images/student_portal_icon/play.png" id="icon" style="height: 73px;margin-top:12px;" alt="CoolBrand">
                              </a>       -->
            </div>
            <div class="col-lg-4 mt-3" id="content">
               <span style="margin-top: -50px;color: #858585;font-size: 19px;" ><?php print_r($session_data->session_name);?></span>
               <br><span style="color:#949393;" id="sub-contect">Course: <?php print_r($course_name[0]->name);?></span>
               <br><span style="color:#949393" id="sub-contect">Starts at: <?php 
                  $mydate = getdate($session_data->session_date);
                  echo "$mydate[mday]/$mydate[mon]/$mydate[year], ";
                  
                  $mydate = getdate($session_data->start_time);
                  echo "$mydate[hours]:$mydate[minutes] ($mydate[weekday]),";
                  
                  $mydate = getdate($session_data->end_time);
                  echo "$mydate[hours]:$mydate[minutes] ($mydate[weekday])";
                  ?>
            </div>
            <div class="col-lg-6 offset-lg-1">
              <button style="display:none"><form method="post" action="<?php echo base_url()?>quiz"> <button id="course_button">Knowledge check</button></form></button>&nbsp;&nbsp;
          
                                             <span class="nav-item" style="cursor:pointer;"  
                                                   data-toggle="modal"
                                                   data-target="#reading_material_list"
                                                    <?php   
                                                      $query100 = "SELECT * FROM `offline_session` WHERE `id` =$session_data->id;";
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
                                                     <?php  for($i= 0; $i < $no_of_reading_material-1; $i++){
                                                         
                                                         $anz_material_id = $reading_material_array[$i];
                                                         $query1000 = "SELECT * FROM `material` WHERE `id` = $anz_material_id";
                                                         $runfetch1000 = mysqli_query($con, $query1000);
                                                         $noofrow1000 = mysqli_num_rows($runfetch1000);
                                                         
                                                         
                                                         if ($noofrow1000 > 0 && $runfetch1000 == TRUE) { 
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
                                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                   <button id="course_button">Reading Material </button>&nbsp;&nbsp;
               </span>
               <!-- <button id="course_button">Reading Material </button>&nbsp; -->
            </div>
         </div>
      </div>
   </div>
   <?php  
      }
          } ?>
</div>
</div>
</div>
<div class="modal fade" id="reading_material_list" >
                        <div class="modal-dialog modal-md modal-dialog-centered"  >
                           <div class="modal-content">
                              <div class="modal-header border-0" >
                                 <h4 class="modal-title">Reading Materials</h4>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body text-center " id="readingMaterialListModalId" style="" >
                              </div>
                              <div class="modal-footer border-0" >
                                 <button type="button" class="btn btn-default" style="background-color:#26266C;color:#ffffff" data-dismiss="modal">Close</button>
                              </div>
                           </div>
                        </div>
                     </div>
<div class="modal fade" id="video_list">
   <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Class Recordings</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body text-center" id="videoListModalId">
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-default" style="background-color:#26266C;color:#ffffff" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="no_video_reason" style="z-index:999999">
   <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Class Recordings</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body text-center" id="noVideoReasonModalId" style="overflow-x:auto;">
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-default" style="background-color:#26266C;color:#ffffff" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<script src="<?php echo base_url()?>assets/js/student-dashboard-modal-create.js"></script>
<script src="<?php echo base_url()?>assets/js/chart/chartist/chartist.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-3.2.1.min.js"></script>
      <!-- Bootstrap js-->
      <script src="<?php echo base_url()?>assets/js/bootstrap/popper.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/bootstrap/bootstrap.js"></script>
      