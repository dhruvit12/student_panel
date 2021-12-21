<style type="text/css">
	.header_logo{
		
	}
	.Current_password
	{
		font-size: 18px;
		color:#3A3737;
		font-weight: normal;
	}
	.text{
		color:#3A3737;
		font-size: 30px;
		font-weight: normal;
	}
	.form-control{
		height: 35px;
		border-radius: 5px;
	}
</style>
<?php  if (!isset($_SESSION['ftip69_uid'])) {
     header('location:auth/login.php');
   } 
   $user_id=$_SESSION['ftip69_uid'];  
 
 require 'dbcon.php';?>
<div class="col-lg-4 offset-lg-3 mt-5">
	<img class="rounded-circle "  src="<?php echo base_url()?>assets/images/student_portal_icon/profile.png"
	data-holder-rendered="true" style="height:auto;width: 40%;margin-left: 20px;border:3px solid #BEBEDF;" >
</div>
</div>
<!-- <div class="row">
	<div class="col-lg-6 offset-lg-3">
	<form class="dropzone" id="upload_file"  enctype="multipart/form-data">
                                 <div class="dz-message needsclick">
                                    <i class="fas fa-cloud"></i>
                                    <h6>Drop files here or click to upload.</h6>
                                    <span class="note needsclick">(You files will be uploaded to Fingertips server.)</span>
                                 </div>
                              </form>
		</div>
	</div> -->
<br><br><br><br>
<form method="post" action="">
<div class="row">
	
	<div class="col-lg-6 offset-lg-3">
		<label class="text">CHANGE PASSWORD</label>
	</div>
</div>

<div class="row mt-5">

	<div class="col-lg-3 offset-lg-3">
		<span class="Current_password">Current Password</span>
	<br>
	</div>
	<div class="col-lg-3">
	 <input type="text" class="form-control" name="current_password" >
	</div>

</div>

<div class="row  mt-5">

	<div class="col-lg-3 offset-lg-3">
		<span class="Current_password">New Password </span>
	</div>
  <br>
	<div class="col-lg-3">
	   <input type="text" class="form-control" name="new_password">
	</div>
	
</div>

<div class="row  mt-5">

	<div class="col-lg-3 offset-lg-3">
		<span class="Current_password">Conform Password </span>
	</div>
	<div class="col-lg-3">
	   <input type="text" class="form-control" name="repeat_password">
	</div>

</div>
<div class="row ">
 <div class="col-lg-6 offset-lg-3 mt-5" style="text-align: right;">
  		<input type="submit" class="btn btn-default" name="change_password" style="width:150px;background-color:#26266C;color:#ffffff;font-size: 15px;font-weight: medium;border-radius: 6px;">
 </div>
</div>
</form>	
<!-- <script>

      
//  javascript for dropzone file upload handling 
Dropzone.autoDiscover = true;
var url_link = "edit-profile-backend.php?id=<?php echo $user_id; ?>";


var uploadFile = new Dropzone("#upload_file", { 
url: url_link,   //file = upload_file
parallelUploads: 1,
maxFiles:1,
uploadMultiple: false,
addRemoveLinks:true,
acceptedFiles: ".jpeg,.jpg,.png",
autoProcessQueue: true,
createImageThumbnails : true,
success: function(file,response){
  if(response != 'false'){
  document.write(response);
   
	$('#content1 .anzar-alert').hide();

	$('#content1').append('<div id="success" class="alert  alert-dismissible fade show  custom-success anzar-alert" role="alert"><strong>Woyee!</strong> Data Uploaded Successfully.<button class="close" type="button" data-dismiss="alert" aria-label="Close" data-original-title="" title=""><span aria-hidden="true">×</span></button></div>');
  }else{
	 console.log(response);
   //   document.write(response);
	$('#content1').append('<div id="failed" class="alert  alert-dismissible fade show  custom-danger anzar-alert" role="alert"><strong>Holy!</strong> Data Upload Failed.<button class="close" type="button" data-dismiss="alert" aria-label="Close" data-original-title="" title=""><span aria-hidden="true">×</span></button></div>');
  }
}
});   

$('#upload_file_btn').click(function(){           
   uploadFile.processQueue();
   
});
</script>
</body>
</html>

<?php
if (isset($_POST['change_password'])) {





$query10 = "SELECT * FROM `user2` WHERE is_deleted = 0 AND id = $user_id";
$runfetch10 = mysqli_query($con, $query10);
$noofrow10 = mysqli_num_rows($runfetch10);
if ($noofrow10 > 0 && $runfetch10 == TRUE) { 
while ($data10 = mysqli_fetch_assoc($runfetch10)) { 
$password =  $data10['password'];

}
}



$current_password = $_POST['current_password'];  
$new_password = $_POST['new_password'];        
$repeat_password = $_POST['repeat_password'];        
$date = date_create();
$timestamp = date_timestamp_get($date);
if($current_password != $password){
?>

<script>
 var element = document.getElementById("password_mismatch");
 element.classList.remove("alerttoggle");
			 
</script>


 <?php
 


}else if($current_password == $repeat_password){
?>

<script>
var element = document.getElementById("new_is_not_repeat");
element.classList.remove("alerttoggle");
	   
</script>


<?php


}else{

$query3 = "UPDATE `user2` SET `password`='$new_password' WHERE `id` = $user_id";
if ($con->query($query3) === TRUE) { 
   $last_id = mysqli_insert_id($con); 
   ?>
<script>
	   var element = document.getElementById("success");
	   element.classList.remove("alerttoggle");
				   
   </script>
<?php
} else {
	?>
<script>
	   var element = document.getElementById("failed");
	   element.classList.remove("alerttoggle");
				   
   </script>
<?php
} 

}      







// get date function 
// $mydate=getdate(1456);
// echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";


}
?> -->