<link rel="stylesheet" href="../../assets/css/custom_style/style.css">
<?php
 $user_id = $_SESSION['ftip69_uid'];
 $query10 = "SELECT * FROM `user2` WHERE is_deleted = 0 AND id = $user_id;";
    $runfetch10 = mysqli_query($con, $query10);
    $noofrow10 = mysqli_num_rows($runfetch10);
    if ($noofrow10 > 0 && $runfetch10 == TRUE) { 
        while ($data10 = mysqli_fetch_assoc($runfetch10)) { 
                $user_img =  $data10['user_img'];
                $student_id=$data10['student_id'];
                $path = "old path";

                if($user_img=='user.png'){
                  $studentphotoquery=mysqli_query($con,"SELECT `student_photo`,`id` FROM `student` WHERE id=$student_id");
                  $data11=mysqli_fetch_assoc($studentphotoquery);
                  $user_img= $data11['student_photo'];
                  $path = "new path";

                  
                }
                if ($user_img==NULL) {
                  $user_img='user.png';
                  $path = "old path";
                }
    
        }
    }
?>
<style type="text/css">
  
.nav_link:hover {
    color: red;
}
</style>

<!-- Page Header width: 174px;height: 49px;margin-top: -30px;Startcol-xs-3 col-sm-3 col-xs-9 col-sm-9-->
 <div class="container-fluid">
<div class="row">
   <div class="col-lg-2 ">
       <div class="jumbotron" id="sidebar">
          <img class="" alt="100x100" src="../../assets/images/student_portal_icon/logo.png"
           style="margin-top: -40px;margin-left: 40px;width:110px">
       <br><br>   <img class="rounded-circle z-depth-2 header_logo" alt="100x100" src="../../assets/images/student_portal_icon/profile.png"
          data-holder-rendered="true" style="height: 130px;width: 130px;margin-left: 23px;" >
          <br>
          <br>
          <br>
        
               <a href="../student/dashboard_new.php"><img src="../../assets/images/student_portal_icon/Group 1.png" id="img"> Dashboard </a> 
               <a href="../student/course-new.php"><img src="../../assets/images/student_portal_icon/course.png" id="img"> Courses </a>
               <a href="#"><img src="../../assets/images/student_portal_icon/rocket.png" id="img"> Excelerate </a> 
               <a href="#"><img src="../../assets/images/student_portal_icon/hirachical.png" id="img"> Program flow </a> 
               <a href="#"><img src="../../assets/images/student_portal_icon/user.png" id="img"> Edit Profile </a>
               <a href="#"><img src="../../assets/images/student_portal_icon/logout.png" id="img"></i> Log out </a>
         
  </div>
</div>
         <!--  <div class="row">
             <div class="col-lg-3 sm-2" >
                 <a href="#home" class="btn btn-default btn-hover" id="prac"><img src="../../assets/images/student_portal_icon/Group 1.png" id="img" type="image/x-icon">&nbsp;&nbsp;&nbsp;Dashboard</a>
                  <a href="#services" class="btn btn-default btn-hover" id="prac"><img src="../../assets/images/student_portal_icon/Group 1.png" id="img" type="image/x-icon">&nbsp;&nbsp;&nbsp; Courses</a>
                  <a href="#clients" class="btn btn-default btn-hover" id="prac"><img src="../../assets/images/student_portal_icon/rocket.png" id="img" type="image/x-icon">&nbsp;&nbsp;&nbsp; Excelerate</a>
                  <a href="#contact" class="btn btn-default btn-hover" id="prac"><img src="../../assets/images/student_portal_icon/hirachical.png" id="img" type="image/x-icon"> &nbsp;&nbsp;&nbsp;Program flow</a>
                  <a href="#contact" class="btn btn-default btn-hover" id="prac"><img src="../../assets/images/student_portal_icon/user.png" id="img" type="image/x-icon">&nbsp;&nbsp;&nbsp; Edit Profile</a>
                  <a href="#contact" class="btn btn-default btn-hover" id="prac"><img src="../../assets/images/student_portal_icon/logout.png" id="img" type="image/x-icon">&nbsp;&nbsp;&nbsp; Log out</a>
             </div>

           </div> -->
        
      



   
   
  <!-- </div>
    <div class="nav-right col p-0">
      <ul class="nav-menus">
      </ul>
      
      <div class="d-lg-none mobile-toggle pull-right">
        <i data-feather="more-horizontal"></i>
      </div>
    </div>
    <script id="result-template" type="text/x-handlebars-template">
    </script>
    <script id="empty-template" type="text/x-handlebars-template">
    </script>
  </div>
</div> -->
