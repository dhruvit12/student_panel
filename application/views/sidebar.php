<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<style type="text/css">
   body{
   background-color: #ffffff;
   }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Student Dashboard | Fingertips</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom_style/style.css">
<style type="text/css">
  .sidebar_icon
  {
    
  }
</style>
<body>


   <div class="container-fluid">
   <div class="row">
   <div class="col-lg-3 col-sm-8">
      <div class="jumbotron" id="sidebar">
         <img class="" alt="100x100" src="<?php echo base_url()?>assets/images/student_portal_icon/logo.png"
            style="margin-left: 20px;width:150px;margin-top:25px;border-radius: 16px;">
             <br><br><img class="rounded-circle z-depth-2 header_logo" alt="100x100" src="<?php echo base_url()?>assets/images/student_portal_icon/profile.png"
            data-holder-rendered="true" style="height: 130px;width: 130px;margin-left: 20px;" >
         <br>
         <br>
         <br>
        <!--  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" class="sidebar_icon">
  <g id="Group_1" data-name="Group 1" transform="translate(-131 -527.647)">
    <rect id="Rectangle_4" data-name="Rectangle 4" width="13" height="13" rx="3" transform="translate(131 527.647)" fill="#000"/>
    <rect id="Rectangle_5" data-name="Rectangle 5" width="10" height="10" rx="3" transform="translate(145 530.647)" fill="#000"/>
    <rect id="Rectangle_6" data-name="Rectangle 6" width="10" height="10" rx="3" transform="translate(134 542.647)" fill="#000"/>
    <rect id="Rectangle_7" data-name="Rectangle 7" width="10" height="10" rx="3" transform="translate(145 542.647)" fill="#000"/>
  </g>
</svg> -->
       <div class="row">
           <div class="col-lg-6">
           <a  style="margin-top:10px;" href="dashboard" id="sidebar_anchor"><img id="img" src="<?php echo base_url()?>assets/images/student_portal_icon/Group 1.png" >  
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboard </a> 
            <a  style="margin-top:10px;" href="course"><img id="img" src="<?php echo base_url()?>assets/images/student_portal_icon/course.png" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Courses </a>
            <a  style="margin-top:10px;" href="#"><img id="img" src="<?php echo base_url()?>assets/images/student_portal_icon/rocket.png" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Excelerate </a> 
            <a  style="margin-top:10px;" href="#"><img id="img" src="<?php echo base_url()?>assets/images/student_portal_icon/hirachical.png" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program flow </a> 
            <a  style="margin-top:10px;" href="#"><img id="img" src="<?php echo base_url()?>assets/images/student_portal_icon/user.png" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit Profile </a>
            <a  style="margin-top:10px;" href="logout"><img id="img" src="<?php echo base_url()?>assets/images/student_portal_icon/logout.png" ></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Log out </a>    

         </div>
          </div>
        
      </div>
   </div>