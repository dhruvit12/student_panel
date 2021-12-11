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
            padding: 0px;
            margin-top: 0px;
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
        /* body {
         	display: flex;
         	justify-content: center;
         	align-items: center;
         }*/
         #course_card
         {
         	border-radius: 38px;
         	box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.1);
         	border:#707070;
         }
      </style>
   </head>
   <body>
   <div class="col-lg-9 " >
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