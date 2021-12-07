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
     
<body>


   <div class="container-fluid">
   <div class="row">
   <div class="col-lg-3">
      <div class="jumbotron" id="sidebar">
         <img class="" alt="100x100" src="<?php echo base_url()?>assets/images/logo/logo.png"
            style="margin-left: 0px;width:150px;margin-top:25px;border-radius: 16px;">
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
           <div class="col-lg-6" >
           <div id="first_icon"><a  style="margin-top:10px;" href="dashboard" id="sidebar_anchor"><img id="img" src="<?php echo base_url()?>assets/images/student_portal_icon/Group 1.png" >  
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
   </div>