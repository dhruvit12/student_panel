<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta name="author" content="anzarkhan.com" />
      <!-- <meta http-equiv="refresh" content="600;url=../auth/logout.php" /> -->
      <link rel="icon" href="<?php echo base_url()?>assets/images/favicon.png" type="image/x-icon" />
      <link
         rel="shortcut icon"
         href="<?php echo base_url()?>assets/images/favicon.png"
         type="image/x-icon"
         />
      <title>Forgot Password | Fingertips</title>
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
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/icofont.css" />
      <!-- Themify icon-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/themify.css" />
      <!-- Flag icon-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/flag-icon.css" />
      <!-- Feather icon-->
      <link
         rel="stylesheet"
         type="text/css"
         href="<?php echo base_url()?>assets/css/feather-icon.css"
         />
      <!-- Plugins css start-->
      <!-- Plugins css Ends-->
      <!-- Bootstrap css-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css" />
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
         type="text/css"
         href="<?php echo base_url()?>assets/css/rounded-circle.css"
         />
   </head>
   <body>
      <!-- Loader starts-->
      <div class="loader-wrapper">
         <div class="loader bg-white">
            <div class="whirly-loader"></div>
         </div>
      </div>
      <!-- Loader ends-->
      <!-- page-wrapper Start-->
      <div class="page-wrapper">
      <div class="container-fluid p-0">
         <!-- login page start-->
         <div class="authentication-main">
            <div class="row">
               <div class="col-md-12">
                  <div class="auth-innerright">
                     <div class="authentication-box">
                        <div class="text-center">
                           <img src="<?php echo base_url()?>assets/images/logo/fingertip-logo.png" alt="" class="w-50" />
                        </div>
                        <div class="card mt-4">
                           <div
                              id="login_success_alert"
                              class="alert custom-success alert-dismissible fade show alerttoggle"
                              role="alert"
                              >
                              <strong>Woyee!</strong> Password sent successfully, Please check your email.
                              <button
                                 class="close"
                                 type="button"
                                 data-dismiss="alert"
                                 aria-label="Close"
                                 data-original-title=""
                                 title=""
                                 >
                              <span aria-hidden="true">×</span>
                              </button>
                           </div>
                           <div
                              id="login_failed_alert"
                              class="alert custom-danger alert-dismissible fade show alerttoggle  "
                              role="alert"
                              >
                              <strong>Holy!</strong> No User Found.
                              <button
                                 class="close"
                                 type="button"
                                 data-dismiss="alert"
                                 aria-label="Close"
                                 data-original-title=""
                                 title=""
                                 >
                              <span aria-hidden="true">×</span>
                              </button>
                           </div>
                           <div
                              id="mail_success_alert"
                              class="alert custom-danger alert-dismissible fade show alerttoggle "
                              role="alert"
                              >
                              <strong>Holy!</strong> Mail has been sent.
                              <button
                                 class="close"
                                 type="button"
                                 data-dismiss="alert"
                                 aria-label="Close"
                                 data-original-title=""
                                 title=""
                                 >
                              <span aria-hidden="true">×</span>
                              </button>
                           </div>
                           <div
                              id="mail_failed_alert"
                              class="alert custom-danger alert-dismissible fade show alerttoggle "
                              role="alert"
                              >
                              <strong>Holy!</strong> Mail Sending Fail.
                              <button
                                 class="close"
                                 type="button"
                                 data-dismiss="alert"
                                 aria-label="Close"
                                 data-original-title=""
                                 title=""
                                 >
                              <span aria-hidden="true">×</span>
                              </button>
                           </div>
                           <div
                              id="no_mail_exist"
                              class="alert custom-danger alert-dismissible fade show alerttoggle "
                              role="alert"
                              >
                              <strong>Holy!</strong> No Email Exist!
                              <button
                                 class="close"
                                 type="button"
                                 data-dismiss="alert"
                                 aria-label="Close"
                                 data-original-title=""
                                 title=""
                                 >
                              <span aria-hidden="true">×</span>
                              </button>
                           </div>
                           <div class="card-body">
                              <!--alert front end  -->
                              <!-- alert backend -->
                              <div class="text-center">
                                 <h4>Forgot Password</h4>
                                 <h6>Enter your registered Email address</h6>
                              </div>
                              <form class="theme-form" action="" method="POST">
                                 <div class="form-group">
                                    <label class="col-form-label pt-0">Your Email</label>
                                    <input class="form-control" type="email" name="email" required="" placeholder="Enter your email"/>
                                 </div>
                                 <div class="form-group">
                                    <div class="form-group form-row mb-0">
                                       <button
                                          class="btn btn-primary btn-block"
                                          type="submit"
                                          name="send"
                                          >
                                       Send Mail
                                       </button>
                                    </div>
                              </form>
                              <script>
                                 function showPassword(){
                                 
                                   var x = document.getElementById("loginPassword");
                                       if (x.type === "password") {
                                         x.type = "text";
                                       } else {
                                         x.type = "password";
                                       }
                                 }
                              </script>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- login page end-->
         </div>
      </div>
      <!-- latest jquery-->
      <script src="<?php echo base_url()?>assets/js/jquery-3.2.1.min.js"></script>
      <!-- Bootstrap js-->
      <script src="<?php echo base_url()?>assets/js/bootstrap/popper.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/bootstrap/bootstrap.js"></script>
      <!-- feather icon js-->
      <script src="<?php echo base_url()?>assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- Sidebar jquery-->
      <script src="<?php echo base_url()?>assets/js/sidebar-menu.js"></script>
      <script src="<?php echo base_url()?>assets/js/config.js"></script>
      <!-- Plugins JS start-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="<?php echo base_url()?>assets/js/script.js"></script>
      <!-- Plugin used-->
   </body>
</html>

<?php
   require '../../dbcon.php';
     
     if(isset($_POST['send'])){
         $email = $_POST['email']; 
         $query = "SELECT * FROM `user2` WHERE `email` = '$email'";
         $run = mysqli_query($con, $query);
         $row = mysqli_num_rows($run);
         $data = mysqli_fetch_assoc($run); 
         if ($row >= 1) {
         //  echo $data['password'];
           ini_set('display_errors',1);
           error_reporting( E_ALL );
   
           $from = "admin@fingertips.co.in";
   
           $to = $email; //receiver mail address
           $subject = "Your password from Fingertips"; 
           $message = "Your Password for"." ".$email." "."is"." ".$data['password'];
           // $message = $message;
           $headers = "From:" . $from;
           if(mail($to,$subject,$message,$headers)){
               ?>
                <script>
              var element = document.getElementById("mail_success_alert");
              element.classList.remove("alerttoggle");
              winldow.location = '../auth/login.php';
              console.log('su');                
            </script>
           <?php
            }else{
                ?>
           <script>
              var element = document.getElementById("mail_failed_alert");
              element.classList.remove("alerttoggle");
              console.log('su');                
            </script>

            <?php
            }
            
            }
            else 
            {
            ?>
            <script>
              var element = document.getElementById("no_mail_exist");
              element.classList.remove("alerttoggle");
              
              console.log('su');                
            </script>
   <?php
   }
   }
   ?>