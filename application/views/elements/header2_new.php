<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Navbar with Logo Image</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../../assets/css/custom_style/student_recording.css">

<link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-white bg-white" id="navbar" >
        <div class="container-fluid">
         <div class="row">
             <div class="col-lg-2 offset-lg-2">
               <a href="#" class="navbar-brand">
                    <img src="../../assets/images/student_portal_icon/logo.png" height="28" alt="CoolBrand">
                </a>

             </div>

         </div>
          <button type="button" class="btn btn-default" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav" id="header">
                    <a href="#" class="nav-item nav-link disabled">Dashboard</a>
                    <a href="#" class="nav-item nav-link disabled">Courses</a>
                    <a href="#" class="nav-item nav-link disabled">Program Flow</a>
                    <a href="#" class="nav-item nav-link disabled" tabindex="-1">Practise</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <img src="../../assets/images/student_portal_icon/box.png" width="13" height="13" class="rounded-circle">&nbsp;&nbsp;&nbsp;
                          <img src="../../assets/images/student_portal_icon/profile.png" width="40" height="40" class="rounded-circle">
                        </a>
                <ul class="navbar-nav">
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="#">Dashboard</a>
                          <a class="dropdown-item" href="#">Edit Profile</a>
                          <a class="dropdown-item" href="#">Log Out</a>
                        </div>
                      </li>   
                    </ul>
                </div>
            </div>
        </div>
    </nav>