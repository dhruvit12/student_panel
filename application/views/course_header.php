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
<link rel="stylesheet" href="program_assets/mastercss/bootstrap.css">
<style type="text/css">
  .sidebar_icon
  {
    
  }
</style>
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
         href="<?php echo base_url()?>assets/css/themify.css"
         />
      <!-- Plugins css Ends-->
      <!-- Bootstrap css-->
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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
 <link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom_style/course.css">
 <div class="col-lg-9 mt-4" style="margin-left: -25px;border: none;">
    <div class="row">
       <div class="col-lg-12 mt-3" style="margin-left: 50px">
          <div class="card" style="height: 50px;width:900px;border-radius: 14px;margin-top: 10px;
                                   box-shadow:0px 3px 6px 0px rgb(0 0 0 / 10%);">
                <div class="row mt-3">
                   <div class="col-lg-2" id="header-text">
                     <a href="<?php echo base_url()?>course" id="course">Recording</a>
                      <?php if($this->uri->segment(1)=='course'){
                        ?>
                        <div id="line" style="margin-left:16px;">
                        </div>
                        <script>document.getElementById('course').style.color='#5A4242';</script>
                      <?php
                      } ?>
                   </div>
                    <div class="col-lg-2" id="header-text">
                     <a href="<?php echo base_url()?>project" id="project">Project</a>
                      <?php if($this->uri->segment(1)=='project'){
                        ?>
                       <div id="line" style="margin-left:5px;">
                        </div>
                        <script>document.getElementById('project').style.color='#5A4242';</script>
                      <?php
                      } ?>
                   </div>
                    <div class="col-lg-2" id="header-text">
                     <a href="<?php echo base_url()?>assignment" id="assignment">Assignment</a>
                      <?php if($this->uri->segment(1)=='assignment'){
                        ?>
                        <div id="line">
                        </div>
                        <script>document.getElementById('assignment').style.color='#5A4242';</script>
                      <?php
                      } ?>
                   </div>
                    <div class="col-lg-2" id="header-text">
                     <a href="<?php echo base_url()?>case_study" id="case study">Case Study</a>
                      <?php if($this->uri->segment(1)=='case_study'){
                        ?>
                        <div id="line">
                        </div>
                        <script>document.getElementById('case study').style.color='#5A4242';</script>
                      <?php
                      } ?>
                   </div>
                    <div class="col-lg-2" id="header-text" >
                     <a href="<?php echo base_url()?>quiz" id="quiz">Quiz</a>
                     <?php if($this->uri->segment(1)=='quiz' || $this->uri->segment(1)=='mcq-test' || $this->uri->segment(1)=='mcq-test-result'){
                        ?>
                        <div id="line_last"  style="margin-left:-3px;">
                        </div>
                        <script>document.getElementById('quiz').style.color='#5A4242';</script>
                      <?php
                      } ?>
                   </div>
                </div>               
          </div>
       </div> 
    </div>