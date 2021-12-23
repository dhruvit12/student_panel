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
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<body>
  <div class="container-fluid">
   <div class="row">
   <div class="col-lg-3">
      <div class="jumbotron mt-5" id="sidebar">
         <img  alt="100x100" src="<?php echo base_url()?>assets/images/logo/logo.png"
            style="margin-left: 0px;width:150px;padding:0px;margin:0px;border-radius: 16px;">
             <br><br><img class="rounded-circle z-depth-2 header_logo" alt="100x100" src="<?php echo base_url()?>assets/images/student_portal_icon/profile.png"
            data-holder-rendered="true" style="height: 130px;width: 130px;margin-left: 20px;" >
         <br>
         <br>
        
       <div class="row">
           <div class="col-lg-6" style="margin-left: -30px;text-align: left" id="sidebar_hover">
           <div>
           <a href="<?php echo base_url()?>dashboard" onmouseover="changeSidebarIconColor(1)" onmouseout="changeSidebarIconColorOut(1)">
              <svg id="sidebar_icon_1"  class="icon" style="height: auto;width: 23px;margin-bottom:5px;font-family:Poppins" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 425.11 413.39" fill="#808080">
              <rect x="27.56" y="24.09" width="184.2" height="184.2" rx="42.51"/>
                <rect x="226.42" y="66.6" width="141.69" height="141.69" rx="32.7"/>
                <rect x="70.07" y="228.71" width="141.69" height="141.69" rx="32.7"/>
                <rect x="226.42" y="226.34" width="141.69" height="141.69" rx="32.7"/>
              </svg>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span >Dashboard</span> </a></div > 
            <a href="<?php echo base_url()?>course" onmouseover="changeSidebarIconColor(2)" onmouseout="changeSidebarIconColorOut(2)">
             <svg id="sidebar_icon_2"  version="1.1" class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               viewBox="0 0 773.4 774.33" style="height: auto;width: 20px;fill:#808080;margin-top:-7px;font-family:Poppins" xml:space="preserve">
            <path d="M771.46,61.84C759.09,25.29,725.1,0.53,686.6,0.52C487.26,0.46,287.93,0.46,88.59,0.59c-8.79,0-17.75,0.2-26.27,3.05
              C34.07,13.09-0.13,43.46,0,89.43c0.54,199,0.22,398.01,0.28,597.02c0,8.06,0.17,16.28,2.36,24.05
              c8.79,31.27,41.52,61.91,71.83,63.34h625.67c0.27-0.02,0.53-0.04,0.8-0.06c5.6-0.45,11.1-1.3,16.38-3.45
              c18.9-7.67,33.79-20.2,44.73-37.3c5.92-9.24,10.71-19.05,11.35-30.36V74.55C772.95,70.28,772.86,65.97,771.46,61.84z M151.87,179.48
              c1.81-0.18,3.65-0.22,5.47-0.22c153.54-0.01,307.08-0.02,460.62,0c17.25,0,29.76,10.37,32.15,26.54
              c2.53,17.14-10.44,33.45-27.78,34.89c-2.48,0.2-4.98,0.18-7.48,0.18c-75.85,0.01-151.71,0.01-227.56,0.01
              c-76.19,0-152.37-0.04-228.56,0.04c-14.32,0.01-25.17-5.47-31.36-18.69C118.78,203.87,131.68,181.48,151.87,179.48z M649.75,572.32
              c-2.07,11.47-13.13,22.16-24.74,23.78c-2.63,0.36-5.31,0.53-7.96,0.53c-152.87,0.02-305.75,0-458.63,0.06
              c-14.16,0.01-24.8-5.51-30.95-18.49c-8.94-18.88,4.8-41.87,25.69-43.17c1.99-0.12,3.99-0.07,5.99-0.07h229.06
              c76.69,0,153.37-0.02,230.06,0.01C639.31,534.97,653.45,551.81,649.75,572.32z M622.55,418.53c-1.16,0.09-2.33,0.1-3.49,0.1
              c-154.2,0.01-308.41,0.02-462.61-0.01c-16.53,0-28.94-10.71-31.44-26.88c-2.48-16.02,10.02-32.49,26.16-34.35
              c2.63-0.3,5.31-0.32,7.96-0.32c76.36-0.01,152.71-0.01,229.07-0.01c76.35,0,152.71,0.04,229.06-0.04
              c14.24-0.01,24.71,5.77,30.66,18.86C656.38,394.5,642.93,417.03,622.55,418.53z"/>
            </svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Courses</a>
            <a href="#" onmouseover="changeSidebarIconColor(3)" onmouseout="changeSidebarIconColorOut(3)"><svg id="sidebar_icon_3"  class="icon" style="height: auto;width: 23px;margin-bottom:5px;font-family:Poppins"   data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 425.11 413.39" fill="#808080"><path d="M20.89,384.76c3.23-9.65,6.39-19.32,9.72-28.93,7.47-21.53,15.2-42.92,26-63.11C67.21,273,90.29,263.68,111.4,269a48.82,48.82,0,0,1,37.18,47.22c0,18.72-8,33.43-24.55,42.87-16.08,9.16-33.3,15.76-50.69,21.87C60.3,385.51,47.12,389.67,34,394a27.21,27.21,0,0,0-2.64,1.21H26.88l-6-6Z"/><path d="M224,307l-6.78,6c-5.25,4.64-9,4.58-13.92-.36q-36.81-36.76-73.59-73.56-13.11-13.11-26.2-26.21c-5-5-5.08-8.7-.47-13.9,1.9-2.13,3.78-4.27,6.18-7-6-.91-11.46-1.78-16.91-2.56q-21.84-3.1-43.68-6.15c-3.5-.49-6.18-2.17-7.26-5.61s.19-6.48,2.85-9.07c27.63-27,60.22-45,97.9-53.19,12.12-2.64,24.67-3.23,37-4.94a9,9,0,0,0,5.06-2.38C226.7,62.73,278.32,33,338.71,18.38A229.11,229.11,0,0,1,393.94,12c7.39,0,10.23,2.82,10.27,10.1.22,39.76-9.56,77.22-26.13,113.07C361,172,337.85,204.51,307.8,232c-2.21,2-2.15,4.27-2.28,6.73Q301.55,315,249,370.41a22.32,22.32,0,0,1-2.14,2.1c-2.57,2.07-5.4,3.08-8.68,1.78a8.17,8.17,0,0,1-5.35-7q-4.11-29.25-8.32-58.49C224.42,308.41,224.28,308.07,224,307ZM334.49,121.69a40,40,0,1,0-40.13,39.87A40.12,40.12,0,0,0,334.49,121.69Z"/></svg>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Excelerate </a> 
            <a href="<?php echo base_url()?>program_flow" onmouseover="changeSidebarIconColor(4)" onmouseout="changeSidebarIconColorOut(4)">
              <svg id="sidebar_icon_4"  class="icon" style="height: auto;width: 23px;margin-bottom:5px;font-family:Poppins"  data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 425.11 413.39" fill="#808080"><path d="M29.27,396.31c-6.48-3-8.41-8.11-8.34-15.07.26-27.93.1-55.87.11-83.8C21,288.2,25.25,284,34.53,284h85.66c8.77,0,13.12,4.33,13.12,13.05,0,28.06-.14,56.12.11,84.18.07,6.95-1.88,12.08-8.34,15.07Z"/><path d="M164.75,396.31c-6.47-3-8.4-8.11-8.34-15.07.26-27.93.11-55.87.11-83.8,0-9.24,4.22-13.43,13.5-13.43h85.65c8.77,0,13.12,4.33,13.13,13.05,0,28.06-.15,56.12.11,84.18.06,6.95-1.88,12.08-8.34,15.07Z"/><path d="M300.24,396.31c-6.47-3-8.4-8.11-8.34-15.07.26-27.92.1-55.85.11-83.77,0-9.25,4.2-13.46,13.45-13.46,27.93,0,55.85.15,83.77-.11,6.95-.06,12.08,1.86,15.06,8.35v95.83a17.24,17.24,0,0,1-8.24,8.23Z"/><path d="M212.66,13h58c8.77,0,13.13,4.32,13.13,13q0,58.17,0,116.35c0,8.46-4.43,12.85-12.95,12.86H154.5c-8.52,0-12.94-4.4-12.94-12.86q0-58.36,0-116.72C141.56,17.44,146,13,154.31,13Q183.49,13,212.66,13Z"/><path d="M88.31,231.13v30.24H66.17c-.08-1.08-.21-2.15-.21-3.22q0-18.52,0-37.06c0-8.24,4.48-12.69,12.74-12.69q58.95,0,117.89,0h4.7V178h22.51v30.4h4.78q58.76,0,117.51,0c9,0,13.29,4.26,13.29,13.27,0,13.1,0,26.19,0,39.58H337V231.06H224.05v30.25H201.53V231.13Z"/></svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Program flow </a> 
            <a href="<?php echo base_url()?>edit_profile" onmouseover="changeSidebarIconColor(5)" onmouseout="changeSidebarIconColorOut(5)"> 
              <svg id="sidebar_icon_5"  class="icon" style="height: auto;width: 21px;margin-bottom:5px;font-family:Poppins"  data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 370.72 413.39" fill="#808080"><path d="M81.59,411.39c-4.64-1-9.36-1.67-13.91-3-29.14-8.2-47.55-30.66-48.84-61.25C17.52,315.59,21,284.45,33,254.87c7.75-19.1,19-35.62,37.88-45.71a74.48,74.48,0,0,1,37.18-8.92c4.11.08,8.45,2.16,12.21,4.21,6.06,3.29,11.67,7.38,17.55,11q51.3,31.68,102.57-.07c4.74-2.94,9.58-5.78,14-9.12,8.18-6.12,17.17-6.89,26.89-5.46,26.51,3.89,45.24,18.42,57.87,41.58,11.27,20.69,16.34,43.15,18.6,66.3a327.37,327.37,0,0,1,1.56,35.84c-.42,35.66-24.9,62.2-60.37,66.11a15.62,15.62,0,0,0-2.6.75Z"/><path d="M285,100.89c.36,53.86-44.09,98.56-98.26,98.71S88,155.11,87.94,101.4A98.51,98.51,0,0,1,186,2.6C240.48,2.19,284.65,46.06,285,100.89Z"/></svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit Profile </a>
            
             <a href="<?php echo base_url()?>support"  onmouseover="changeSidebarIconColorfa(6)" onmouseout="changeSidebarIconColorOutfa(6)"><i class="fa fa-support"  class="icon" id="sidebar_icon_6" style="font-size: 20px;margin-bottom:5px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Support</a>
             <a href="<?php echo base_url()?>logout" onmouseover="changeSidebarIconColor(7)" onmouseout="changeSidebarIconColorOut(7)">
              <svg id="sidebar_icon_7" class="icon" data-name="Layer 1"  style="height: auto;;width:23px;margin-bottom:5px;font-family:Poppins" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 425.11 413.39" fill="#808080"><path d="M394.32,185.46c-1.48,5.62-5,9.79-9.11,13.78-11.57,11.36-22.87,23-34.45,34.36-10.92,10.72-28.3,6.39-32.26-8a18.27,18.27,0,0,1,4.63-18.33c1.69-1.78,3.66-3.28,5.51-4.91l-.62-1.11H298.54v4.57q0,35.17,0,70.36c0,30.38-19.77,53.64-49.73,58.58-2.07.34-4.19.35-6.86.57v-5.06q0-82.71,0-165.42,0-55.08-40.81-92.13c-10.35-9.42-22.52-15.95-35-22-13-6.36-25.87-12.91-38.79-19.39-1.07-.53-2.12-1.13-4-2.14,1.56-.13,2.22-.23,2.88-.23,38.3,0,76.6-.14,114.9.05,27.57.14,50.39,18.89,56.17,45.87a63.55,63.55,0,0,1,1.2,13c.11,23.57.06,47.15.06,70.73v4.22h30.6c-2.45-2.24-4.25-3.7-5.84-5.35-7.46-7.8-7.49-19.42-.13-27a18.72,18.72,0,0,1,26.87-.33q19.68,19.22,38.87,38.92c2.48,2.56,3.64,6.39,5.41,9.64Z"/><path d="M202.65,257.61c0,31.67-.46,63.36.13,95,.63,33.33-35.09,54.94-64.06,39.62-27.07-14.32-55.06-26.92-82-41.47-26.56-14.35-41.23-37.55-45-67.54a90.66,90.66,0,0,1-.64-11.18Q11,180,11.08,88c0-26.66,21.38-46.38,48-43.94a40.53,40.53,0,0,1,13.88,4c28.27,13.91,56.56,27.8,84.51,42.34,29.77,15.48,44.78,40.59,45.16,74.06C202.93,195.49,202.65,226.55,202.65,257.61Z"/></svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout </a>
             </div>
          </div>
      </div>
   </div>

   <script>
     function  changeSidebarIconColor(get_icon_number)
     {
       document.getElementById('sidebar_icon_'+get_icon_number).style.fill='#E46F0E';
     }
     function changeSidebarIconColorOut(get_icon_number)
     {
      document.getElementById('sidebar_icon_'+get_icon_number).style.fill='#808080';
     }
     function  changeSidebarIconColorfa(get_icon_number)
     {
       document.getElementById('sidebar_icon_'+get_icon_number).style.color='#E46F0E';
     }
     function changeSidebarIconColorOutfa(get_icon_number)
     {
      document.getElementById('sidebar_icon_'+get_icon_number).style.color='#808080';
     }
  </script>