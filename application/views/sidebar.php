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
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom_style/style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css" />
<body>
   <div class="container-fluid">
   <div class="row">
   <div class="col-lg-3">
      <div class="jumbotron" id="sidebar">
         <img class="" alt="100x100" src="<?php echo base_url()?>assets/images/student_portal_icon/logo.png"
            style="margin-top: -40px;margin-left: 10px;width:110px">
         <br><br>   <img class="rounded-circle z-depth-2 header_logo" alt="100x100" src="<?php echo base_url()?>assets/images/student_portal_icon/profile.png"
            data-holder-rendered="true" style="height: 130px;width: 130px;" >
         <br>
         <br>
         <br>
         <a href="../student/dashboard_new.php"><img src="<?php echo base_url()?>assets/images/student_portal_icon/Group 1.png" id="img">  Dashboard </a> 
         <a href="../student/course-new.php"><img src="<?php echo base_url()?>assets/images/student_portal_icon/course.png" id="img"> Courses </a>
         <a href="#"><img src="<?php echo base_url()?>assets/images/student_portal_icon/rocket.png" id="img"> Excelerate </a> 
         <a href="#"><img src="<?php echo base_url()?>assets/images/student_portal_icon/hirachical.png" id="img"> Program flow </a> 
         <a href="#"><img src="<?php echo base_url()?>assets/images/student_portal_icon/user.png" id="img"> Edit Profile </a>
         <a href="#"><img src="<?php echo base_url()?>assets/images/student_portal_icon/logout.png" id="img"></i> Log out </a>
      </div>
   </div>