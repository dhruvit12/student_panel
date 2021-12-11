<?php
  
   if (!isset($_SESSION['ftip69_uid'])) {
     header('login');
     
   } 
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Navbar with Logo Image</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom_style/student_recording.css">

<link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-white bg-white" id="navbar" >
        <div class="container-fluid">
         <div class="row">
             <div class="col-lg-2 offset-lg-2">
               <a href="#" class="navbar-brand">
                    <img src="<?php echo base_url()?>assets/images/student_portal_icon/logo.png" height="28" alt="CoolBrand">
                </a>
             </div>
         </div>
          <button type="button" class="btn btn-default" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav" id="header">
                    <a href="dashboard" class="nav-item nav-link" style="color:#26266C;">Dashboard</a>
                    <a href="course" class="nav-item nav-link" style="color:#26266C;">Courses</a>
                    <a href="program_flow" class="nav-item nav-link" style="color:#26266C;">Program Flow</a>
                    <a href="#" class="nav-item nav-link" tabindex="-1" style="color:#26266C;" >Practise</a>
                    <a href="support" class="nav-item nav-link" tabindex="-1" style="color:#26266C;" >Support</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <img src="<?php echo base_url()?>assets/images/student_portal_icon/box.png" width="13" height="13" class="rounded-circle">&nbsp;&nbsp;&nbsp;
                          <img src="<?php echo base_url()?>assets/images/student_portal_icon/profile.png" width="40" height="40" class="rounded-circle">
                        </a>
                <ul class="navbar-nav">
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="#" style="color:#26266C;">Dashboard</a>
                          <a class="dropdown-item" href="#" style="color:#26266C;">Edit Profile</a>
                          <a class="dropdown-item" href="#" style="color:#26266C;">Log Out</a>
                        </div>
                      </li>   
                    </ul>
                </div>
            </div>
        </div>
    </nav>