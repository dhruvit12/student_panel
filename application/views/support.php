<script>
   //menu
 document.getElementById('menu_editprofile').classList.add("menu-active");
 //icon
 document.getElementById('sidebar_icon_6').style.fill='#E46F0E';

</script>
<style type="text/css">
	.header-text{
		font-size: 50px;
		color:#858585;
		font-weight: bold;
	}
	input[type=checkbox]{
        
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
         	#content{
  /* DON'T USE DISPLAY NONE/BLOCK! Instead: */
			  background: #cf5;
			  padding: 10px;
			  position: absolute;
			  visibility: hidden;
			  opacity: 0;
			          transition: 0.6s;
			  -webkit-transition: 0.6s;
			          transform: translateX(-100%);
			  -webkit-transform: translateX(-100%);
			}
			#content.appear{
			  visibility: visible;
			  opacity: 1;
			          transform: translateX(0);
			  -webkit-transform: translateX(0);
			}
			.btn{
				border-radius: 10px;
			}
         </style>
       <!--   <script>
			  if ($('#checkbox').is(':checked')) {
			    $('#appTimes').display = "block";
			  } else {
			    $('#appTimes').display = "none";
			  }
	      </script> -->
<script type="text/javascript">
   
   
//    $("#second").display("none");
    function ShowHideDiv(chkPassport) {
    	 
    	if(document.getElementById("checkbox").checked = true)
    	{
         var dvPassport = document.getElementById("first");
         dvPassport.style.display = chkPassport.checked ? "block" : "none";
    	}
       else 
    	{
         var dvPassport = document.getElementById("second");
         dvPassport.style.display = chkPassport.checked ? "block" : "none";
    	}
        
    }
</script>


         	<div class="container m-5">
         		<span class="header-text">Support</span>
         			<input type="checkbox" id="chkPassport" onclick="ShowHideDiv(this)" />
         			<label for="chkPassport"> 
         				<span class='toggle'></span>
         				<span class='label on'>ON</span>
         				<span class='label off'>OFF</span>   
         			</label>
         	</div>
         
     <input type="checkbox" checked data-toggle="toggle" data-text="hi" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger" id="checkbox">
			<div class="container" id="first">
			  <div class="row">
			    <div class="col-lg">
			     <div class="card" id="course_card">
			         				<img class="card-img-top" src="<?php echo base_url()?>assets/images/student_portal_icon/python-popularity.png" alt="Card image" style="">
			         				<div class="card-body">
			         					<h4 class="card-title" style="color: #535252;">Tableau</h4>
			         					<p class="card-text" style="color: #535252;">Tableau helps people see and understand data.</p>
			         					<center><input type="submit" class="btn btn-deafult" style="background-color: #26266c;color: #ffffff;width: 200px" value="Installation_lips"></center>
			         					
			         				</div>
			         			</div>
			    </div>
			    <div class="col-lg ">
			     <div class="card" id="course_card">
			         				<img class="card-img-top" src="<?php echo base_url()?>assets/images/student_portal_icon/python-popularity.png" alt="Card image" style="">
			         				<div class="card-body">
			         					<h4 class="card-title" style="color: #535252;">Tableau</h4>
			         					<p class="card-text" style="color: #535252;">Tableau helps people see and understand data.</p>
			         					<center><input type="submit" class="btn btn-deafult" style="background-color: #26266c;color: #ffffff;width: 200px" value="Installation_lips"></center>
			         				</div>
			         			</div>
			    </div>
			    <div class="col-lg ">
			     <div class="card" id="course_card">
			         				<img class="card-img-top" src="<?php echo base_url()?>assets/images/student_portal_icon/python-popularity.png" alt="Card image" style="">
			         				<div class="card-body">
			         					<h4 class="card-title" style="color: #535252;">Tableau</h4>
			         					<p class="card-text" style="color: #535252;">Tableau helps people see and understand data.</p>
			         					<center><input type="submit" class="btn btn-deafult" style="background-color: #26266c;color: #ffffff;width: 200px" value="Installation_lips"></center>
			         				</div>
			         			</div>
			    </div>
			  </div>
			</div>
			<div class="container" id="second">
				 	 	 <div class="col-lg-6">Category <span>*</span>
                                     <select class="form-control">
                                     	<option></option>
                                     </select>

				 	 	 </div>
				 	 	 <div class="col-lg-6">Priority <span>*</span>
                                     <select class="form-control">
                                     	<option></option>
                                     </select>

				 	 	 </div>
				 	 	
				 	 	  <div class="col-lg-12">Comment <span>*</span>
				 	 	  	<textarea class="form-control" rows="8"></textarea>
				 	 	  	<br>
				 	 	  	  <input type="submit" class="btn btn-deafult" style="float:right;background-color: #26266c;color: #ffffff;width: 200px" value="Submit"></div>

				 	 	  </div>
				 	 	   <br>

			</div>

				 	
			</div>
		</div>
		