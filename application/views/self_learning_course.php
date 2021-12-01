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
      <style>
         .customScroll1::-webkit-scrollbar-track
         {
         -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
         border-radius: 10px;
         background-color: #F5F5F5;
         }
         .customScroll1::-webkit-scrollbar
         {
         width: 5px;
         background-color: #F5F5F5;
         }
         .customScroll1::-webkit-scrollbar-thumb
         {
         border-radius: 10px;
         -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
         background-color: #ababab;
         }
      </style>
 <!-- toggle css -->
      <style type="text/css">
      	input[type=checkbox]{
	height: 0;
	width: 0;
	visibility: hidden;
}

label {
	cursor: pointer;
	text-indent: -9999px;
	width: 260px;
	height: 50px;
	background: #E4E4E4;
	display: block;
	border-radius: 15px;
	position: relative;
 }

label:after {
	content: '';
	position: absolute;
	top: 5px;
	left: 0px;
	margin-top: -5px;
	width: 130px;
	height: 50px;
	background: #ffffff;
	border-radius: 15px;
	transition: 0.9s;
	box-shadow: 0px 1px 2px 0px #000000;
	border-color: #707070;
	border-bottom: orange;
	opacity: 100%;
}

input:checked + label {
	background: #26266C;
}

input:checked + label:after {
	left: calc(100% - 0px);
	transform: translateX(-100%);
}

label:active:after {
	width: 130px;
}
body {
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
}
#course_card
{
	border-radius: 38px;
	box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.1);
	border:#707070;
}
      </style>
   </head>
   <body>
 
    
     <div class="col-lg-9 " style="margin-top: 20px;">
      <span style="color:#858585;font-size: 50px;"><b>Courses</b></span>
      <br>
      <input type="checkbox" id="switch" />
        <label for="switch"> 
        	 <span class='toggle'></span>
 		     <span class='label on'>ON</span>
		     <span class='label off'>OFF</span>   
	    </label>

      <div class="container">
      	<div class="row">
      		<div class="col-lg-3">
      	       <div class="card" id="course_card">
		    <img class="card-img-top" src="<?php echo base_url()?>assets/images/student_portal_icon/python-popularity.png" alt="Card image" style="">
		    <div class="card-body" style="">
		      <h4 class="card-title">Python</h4>
		      <p class="card-text">Contrary to popular belief, Lorem 
				Ipsum is not simply random text. 
				It has roots</p>
				<span class="pull-right"><i class="fa fa-lock" aria-hidden="true" ></i></span>          
		    </div>
		  </div>
		
      		</div>
      	</div>

          <br>
     </div>