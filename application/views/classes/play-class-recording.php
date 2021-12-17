<?php
   session_start();
   if (!isset($_SESSION['ftip69_uid'])) {
     header('location:../auth/login.php');
   } else{
    $user_id = $_SESSION['ftip69_uid'];
   if($user_id == 99){
      ?>
<script>
   window.history.back()
window.location = 'https://fingertips.co.in/en/auth/login.php';
</script>
<?php
   }
   } 
   ?>
<?php
   require_once '../../dbcon.php';
   $user_id = $_SESSION['ftip69_uid'];
   $query = "SELECT * FROM `user2` WHERE `id` = $user_id;";
   $run = mysqli_query($con, $query);
   $row = mysqli_num_rows($run);
   $data = mysqli_fetch_assoc($run);
   
   $ftip69_acc_classes = $data['acc_classes'];
   $ftip69_acc_student = $data['acc_student'];
   
   
   // success
   if ($ftip69_acc_classes==1||$ftip69_acc_student==1) {
   // getting users credentials
   $user_id = $_SESSION['ftip69_uid'];
   }else{
   ?>
<script>
   window.history.back()
window.location = 'https://fingertips.co.in/en/auth/login.php';
</script>
<?php
   }  
   ?>
<?php
   if (isset($_POST['session_id'])) {
       $session_id = $_POST['session_id'];
       // echo "<script>alert($session_id);</script>";
      } else{
        ?>
<script>
   window.history.back()
window.location = 'https://fingertips.co.in/en/auth/login.php';
</script>
<?php
   }
   ?>
<?php
   require '../../dbcon.php';
   ?>
<!DOCTYPE html>
<html>
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
         href="../../assets/images/favicon.png"
         type="image/x-icon"
         />
      <link
         rel="shortcut icon"
         href="../../assets/images/favicon.png"
         type="image/x-icon"
         />
      <title>Play Class Recording | Fingertips</title>
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
         href="../../assets/css/fontawesome.css"
         />
      <!-- ico-font-->
      <link
         rel="stylesheet"
         type="text/css"
         href="../../assets/css/icofont.css"
         />
      <!-- Themify icon-->
      <link
         rel="stylesheet"
         type="text/css"
         href="../../assets/css/themify.css"
         />
      <!-- Flag icon-->
      <link
         rel="stylesheet"
         type="text/css"
         href="../../assets/css/flag-icon.css"
         />
      <!-- Feather icon-->
      <link
         rel="stylesheet"
         type="text/css"
         href="../../assets/css/feather-icon.css"
         />
      <!-- Plugins css start-->
      <!-- Plugins css Ends-->
      <!-- Bootstrap css-->
      <link
         rel="stylesheet"
         type="text/css"
         href="../../assets/css/bootstrap.css"
         />
      <!-- App css-->
      <link rel="stylesheet" type="text/css" href="../../assets/css/style.css" />
      <link
         id="color"
         rel="stylesheet"
         href="../../assets/css/light-1.css"
         media="screen"
         />
      <!-- Responsive css-->
      <link
         rel="stylesheet"
         type="text/css"
         href="../../assets/css/responsive.css"
         />
      <link
         rel="stylesheet"
         href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
         integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp"
         crossorigin="anonymous"
         />
         <link rel="stylesheet" href="https://players.brightcove.net/videojs-overlay/2/videojs-overlay.css">
      <!-- video js files starts -->
      <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
      <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
      <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
      <!-- video js files ends -->
   </head>
   <body oncontextmenu="return false">
   <?php
                                             $query = "SELECT * FROM `user2` where `id` = $user_id";
                                             
                                             $runfetch = mysqli_query($con, $query);
                                             
                                             $noofrow = mysqli_num_rows($runfetch);
                                             
                                             
                                             $indexnumber = 1;
                                             if ($noofrow >
                                             0 && $runfetch == TRUE) { while ($data =
                                             mysqli_fetch_assoc($runfetch)) { 
                                                $student_id = $data['student_id'];
                                             }}
                                             $query = "SELECT * FROM `student` where `id` = $student_id";
                                             
                                             $runfetch = mysqli_query($con, $query);
                                             
                                             $noofrow = mysqli_num_rows($runfetch);
                                             
                                             
                                             $indexnumber = 1;
                                             if ($noofrow >
                                             0 && $runfetch == TRUE) { while ($data =
                                             mysqli_fetch_assoc($runfetch)) { 
                                                $phone1 = $data['phone1'];
                                             }}
                                             ?>
   <div id="show_user_id_over_video" style="position:absolute; height:20px; color:black; opacity:0.5; z-index:100000; top:40px; righ:50px;"><?php $date = date_create();
      $timestamp = date_timestamp_get($date); echo '  &nbsp;'.$phone1;?> | <?php echo $user_id.' &nbsp ';?> </div>
      <!-- Loader starts-->
      <div class="loader-wrapper">
         <div class="loader bg-white">
            <div class="whirly-loader"></div>
         </div>
      </div>
      <!-- Loader ends-->
      <!-- page-wrapper Start-->
      <div class="page-wrapper">
         <!--change compact-wrapper-->
         <?php require_once '../elements/header.php' ?>
         <!-- Page Body Start-->
         <script>
            var getheader = document.getElementById('header_row');
               getheader.classList.add("open");
               
               var get_sidebar_btn = document.getElementById('sidebar_btn');
               get_sidebar_btn.style.display = "none";
               
               var get_brand_logo_top_header = document.getElementById('brand_logo_top_header');
               get_brand_logo_top_header.style.display = "block";
            
         </script>
         <div class="page-body-wrapper open">
            <!-- sidebar-icon -->
            <!-- Page Sidebar Start-->
            <!-- Page Sidebar Ends-->
            <div class="page-body">
               <div class="container-fluid">
                  <div class="page-header">
                     <div class="row">
                        <div class="col">
                           <div class="page-header-left">
                              <h3>Play Class Recording</h3>
                              <ol class="breadcrumb">
                                 <li class="breadcrumb-item">
                                    <a href="../auth/login.php"><i data-feather="home"></i></a>
                                 </li>
                                 <li class="breadcrumb-item active">Classes</li>
                              </ol>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Container-fluid starts-->
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="card">
                           <div class="card-header">
                              <h5>Play Class Recording</h5>
                              <span
                                 >This class has been completed but you can learn from
                              video.</span
                                 >
                           </div>
                           <div class="card-body">
                              <?php
                                 $query100 = "SELECT * FROM `offline_session_log` WHERE `session_id` = $session_id;";
                                 $runfetch100 = mysqli_query($con, $query100);
                                 $noofrow100 = mysqli_num_rows($runfetch100);
                                 $indexnumber100 = 1;
                                 
                                 if ($noofrow100 >0 && $runfetch100 == TRUE) { 
                                    while ($data100 = mysqli_fetch_assoc($runfetch100)) { 
                                 
                                       // use of explode 
                                       $string1 = $data100['recording_files']; 
                                       $str_arr1 = explode (",", $string1);  
                                       $no_of_videos =  sizeof($str_arr1);
                                 
                                       for($i= 0; $i < $no_of_videos-1; $i++){
                                         // echo $str_arrgit 1[$i];
                                       
                                 ?>
                              <div style="height:0px; overflow:hidden;" id="<?php echo "div-my-video-large".$i ?>">
                              <span id="video_location_span_tag"></span>

                                 <video-js 
                                    id="<?php echo "my-video-large".$i ?>"
                                    class="video-js vjs-big-play-centered"
                                    controlsList="nodownload"
                                    onclick="changeMa`inVideo(<?php echo $i; ?>);"
                                    data-setup="{}"
                                    >
                                    <track
                                       kind="captions"
                                       src="//example.com/path/to/captions.vtt"
                                       srclang="en"
                                       label="English"
                                       default
                                       />
                                    <p class="vjs-no-js">
                                       To view this video please enable JavaScript, and
                                       consider upgrading to a web browser that
                                       <a
                                          href="https://videojs.com/html5-video-support/"
                                          target="_blank"
                                          >supports HTML5 video</a
                                          >
                                    </p>
                                 </video-js>
                              </div>
                              <?php
                                 }
                                 
                                 }
                                 }
                                 
                                 ?>
                           </div>
                        </div>
                        <br /><br /><br /><br />
                     </div>
                     <div class="col-md-4" id="right-sidebar">
                        <div class="card">
                           <div class="card-body">
                              <?php
                                 $query100 = "SELECT * FROM `offline_session` WHERE `id` = $session_id;";
                                 $runfetch100 = mysqli_query($con, $query100);
                                 $noofrow100 = mysqli_num_rows($runfetch100);
                                 $indexnumber100 = 1;
                                 
                                 if ($noofrow100 >0 && $runfetch100 == TRUE) { 
                                    while ($data100 = mysqli_fetch_assoc($runfetch100)) { 
                                 
                                      $session_date = $data100['session_date'];
                                      $assigned_to = $data100['assigned_to'];
                                 
                                    }
                                  }

 
                                 
                                 ?>
                                                                          <?php
          $user_id = $_SESSION['ftip69_uid'];
          $query = "SELECT `faculty_id` FROM `user2` WHERE `id` = $assigned_to";
          $runfetch = mysqli_query($con, $query);
          $noofrow = mysqli_num_rows($runfetch);
          $indexnumber = 1;
          if ($noofrow > 0 && $runfetch == TRUE) { 
              while ($data = mysqli_fetch_assoc($runfetch)) {
                    $faculty_id = $data['faculty_id'];
                    } 
                } 
          
          
              ?>

<?php
          $user_id = $_SESSION['ftip69_uid'];
          $query = "SELECT * FROM `faculty` WHERE `id` = $faculty_id";
          $runfetch = mysqli_query($con, $query);
          $noofrow = mysqli_num_rows($runfetch);
          $indexnumber = 1;
          if ($noofrow > 0 && $runfetch == TRUE) { 
              while ($data = mysqli_fetch_assoc($runfetch)) {
                   $first_name = $data['first_name'];
                   $last_name = $data['last_name'];
                   
                    } 
                } 
          
          
              ?>
                              <h5 class="mb-4"><strong>Session Details</strong></h5>
                              <div class="row">
                                 <div class="col-lg-12 pb-3">
                                    <strong>Session Date</strong> <span><?php
                                    
                                    
                                    $mydate=getdate($session_date);
                                                   echo "$mydate[mday]/$mydate[mon]/$mydate[year]";
                                    ?></span>
                                 </div>
                                 <div class="col-lg-12 pb-3">
                                    <strong>Faculty Name</strong>
                                    <span><?php 
                                    echo $first_name.' '.$last_name;
                                     ?></span>
                                 </div>
                              </div>
                           </div>
                          </div>
                           <div class="card">
                              <div class="card-body">
                                 
                                 <h5 class="mt-2"><strong>Recordings</strong></h5>
                                 <span
                                    >This class has been completed but you can learn from
                                 videos.</span
                                    >
                               
                                 <?php
                                    $query100 = "SELECT * FROM `offline_session_log` WHERE `session_id` = $session_id;";
                                    $runfetch100 = mysqli_query($con, $query100);
                                    $noofrow100 = mysqli_num_rows($runfetch100);
                                    $indexnumber100 = 1;
                                    
                                    if ($noofrow100 >0 && $runfetch100 == TRUE) { 
                                       while ($data100 = mysqli_fetch_assoc($runfetch100)) { 
                                    
                                          // use of explode 
                                          $string1 = $data100['recording_files']; 
                                          $str_arr1 = explode (",", $string1);  
                                          $no_of_videos =  sizeof($str_arr1);
                                    
                                          for($i= 0; $i < $no_of_videos-1; $i++){
                                            // echo $str_arr1[$i];
                                          
                                    ?>
                                    <div class="p-2 bg-light m-2" id="<?php echo "my-video0".$i ?>" onclick="changeMainVideo(<?php echo $i; ?>);">
                                            <span class="text-primary">Video <?php echo $i+1; ?></span>
                                    </div>
                                 <!-- <video-js
                                    id="<?php echo "my-video".$i ?>"
                                    class="video-js vjs-big-play-centered"
                                    controlsList="nodownload"
                                    onclick="changeMainVideo(<?php echo $i; ?>);"
                                    data-setup="{}"
                                    >
                                    <track
                                       kind="captions"
                                       src="//example.com/path/to/captions.vtt"
                                       srclang="en"
                                       label="English"
                                       default
                                       />
                                    <p class="vjs-no-js">
                                       To view this video please enable JavaScript, and
                                       consider upgrading to a web browser that
                                       <a
                                          href="https://videojs.com/html5-video-support/"
                                          target="_blank"
                                          >supports HTML5 video</a
                                          >
                                    </p>
                                 </video-js> -->
                                 <?php
                                    }
                                    
                                    }
                                    }
                                    
                                    ?>
                              </div>
                           </div>
                           <br /><br /><br /><br />
                        </div>
                     </div>
                  </div>
                  <!-- Container-fluid Ends-->
               </div>
               <!-- footer start-->
               <?php require_once '../elements/footer.php' ?>
               <script>
                  var get_footer = document.getElementById('footer_id');
                  get_footer.style.marginLeft = "0px";
               </script>
               
            </div>
            
         </div>
         
      </div>

      
      <!-- latest jquery-->
      <script src="../../assets/js/jquery-3.2.1.min.js"></script>
      <!-- Bootstrap js-->
      <script src="../../assets/js/bootstrap/popper.min.js"></script>
      <script src="../../assets/js/bootstrap/bootstrap.js"></script>
      <!-- feather icon js-->
      <script src="../../assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="../../assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- Sidebar jquery-->
      <script src="../../assets/js/sidebar-menu.js"></script>
      <script src="../../assets/js/config.js"></script>
      <!-- Plugins JS start-->
      <script src="../../assets/js/typeahead/handlebars.js"></script>
      <script src="../../assets/js/typeahead/typeahead.bundle.js"></script>
      <script src="../../assets/js/typeahead/typeahead.custom.js"></script>
      <script src="../../assets/js/chat-menu.js"></script>
      <script src="../../assets/js/tooltip-init.js"></script>
      <script src="../../assets/js/typeahead-search/handlebars.js"></script>
      <script src="../../assets/js/typeahead-search/typeahead-custom.js"></script>
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="../../assets/js/script.js"></script>
      <!-- videjs  -->
      <script src="https://vjs.zencdn.net/7.10.2/video.js"></script>
      <script src="https://cdn.sc.gl/videojs-hotkeys/0.2/videojs.hotkeys.min.js"></script>
      <script src="https://players.brightcove.net/videojs-overlay/2/videojs-overlay.min.js"></script>
      <!-- Plugin used-->
      <script>
         var js_str_arr1 = <?php echo json_encode($str_arr1); ?>;
         function changeMainVideo(i){
           console.log(i);
         
           // // console.log(js_str_arr1.length);
           for(var j = 0; j < js_str_arr1.length-1; j++){
             document.getElementById('div-my-video-large'+j).style.height = "0px";
             }
              document.getElementById('div-my-video-large'+i).style.height = "100%";
         
         }
         
         changeMainVideo(0);
      </script>
      <?php
         // large value 
         $i_max_value = $i;
         
         for($j = 0; $j <= $i_max_value; $j++){
           
           ?>
      <?php 
         // echo $str_arr1[$j];
         
         ?>
      <script>
         videojs("<?php echo "my-video-large".$j ?>", {
           
           // autoplay: "muted",
           controls: true,
           fluid: true,
           
         
           playbackRates: [0.5, 1, 1.5, 2],
           loop: false,
         
           plugins: {
             hotkeys: {
               enableModifiersForNumbers: false,
             },
           },
         
           sources: [
             {
               src: "../../../resources/offline-session-recordings/<?php $string_yoo = preg_replace('/\s+/', '', $str_arr1[$j]); echo $string_yoo; ?>",
               type: "video/mp4",
             },
           ],
         });
      </script>
      <?php
         }
         
         ?>
      <?php
         $i_max_value = $i;
         
         
         for($j = 0; $j <= $i_max_value; $j++){
         
           ?>
      <script>
         videojs("<?php echo "my-video".$j ?>", {
           // autoplay: "muted",
           controls: true,
           fluid: true,
         
           playbackRates: [0.5, 1, 1.5, 2],
           loop: false,
         
           plugins: {
             hotkeys: {
               enableModifiersForNumbers: false,
             },
           },
         
           sources: [
             {
               src: "../../../resources/offline-session-recordings/<?php $string_yoo = preg_replace('/\s+/', '', $str_arr1[$j]); echo $string_yoo; ?>",
               type: "video/mp4",
             },
           ],
         });
      </script>
      <?php
         }
         
         ?>
      <script>
         // number input off
         $(document).ready(function () {
           $(".txtOnly").keypress(function (e) {
             var key = e.keyCode;
             if (key >= 48 && key <= 57) {
               e.preventDefault();
             }
           });
         });
      </script>
   </body>
</html>
<script>
   jQuery(".video-js").bind("contextmenu", function () {
     return false;
   });
   
   // prevent right click
   $(document).on("contextmenu", function (e) {
     e.preventDefault();
   });
</script>
<script>
   $(document).keydown(function (event) {
     if (event.keyCode == 123) {
       // Prevent F12
       window.location = "offline-session-suspicious-activity.php?r=f12_pressed";
       disabledEvent(event);
   
       return false;
     } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
       // Prevent Ctrl+Shift+I
       window.location =
         "offline-session-suspicious-activity.php?r=ctrl+shift+I_pressed";
       disabledEvent(event);
   
       return false;
     } else if (event.ctrlKey && event.keyCode == 85) {
       window.location =
         "offline-session-suspicious-activity.php?r=ctrl+u_pressed";
       disabledEvent(event);
   
       return false;
     }
   });
   
   function disabledEvent(event) {
     if (event.stopPropagation) {
       event.stopPropagation();
     } else if (window.event) {
       window.event.cancelBubble = true;
     }
     event.preventDefault();
     return false;
   }
   
   //  detact developer option
   
   !(function () {
     function detectDevTool(allow) {
       if (isNaN(+allow)) allow = 100;
       var start = +new Date(); // Validation of built-in Object tamper prevention.
       debugger;
       var end = +new Date(); // Validates too.
       if (isNaN(start) || isNaN(end) || end - start > allow) {
         window.location =
           "offline-session-suspicious-activity.php?r=detact developer option";
       }
     }
     if (window.attachEvent) {
       if (
         document.readyState === "complete" ||
         document.readyState === "interactive"
       ) {
         detectDevTool();
         window.attachEvent("onresize", detectDevTool);
         window.attachEvent("onmousemove", detectDevTool);
         window.attachEvent("onfocus", detectDevTool);
         window.attachEvent("onblur", detectDevTool);
       } else {
         setTimeout(argument.callee, 0);
       }
     } else {
       window.addEventListener("load", detectDevTool);
       window.addEventListener("resize", detectDevTool);
       window.addEventListener("mousemove", detectDevTool);
       window.addEventListener("focus", detectDevTool);
       window.addEventListener("blur", detectDevTool);
     }
   })();
   
   // detactiv idm downloader
</script>
<script>
   function checkidm() {
     $(document).ready(function () {
       var idm_downloader = document
         .getElementsByTagName("video")[0]
         .getAttribute("__idm_id__");
       // console.log(idm_downloader);
       if (idm_downloader != null) {
         // console.log("blast");
         window.location =
           "offline-session-suspicious-activity.php?r=idm_detacted";
       }
     });
     checkidmpair();
   }
   
   function checkidmpair() {
     setTimeout(() => {
       checkidm();
     }, 200);
   }
   checkidm();
</script>


<script>
function changePosition(){
   
 
 var get_video_location_span_tag_top_position = $('#video_location_span_tag').offset().top;
 var get_video_location_span_tag_left_position = $('#video_location_span_tag').offset().left;
 var get_show_user_id_over_video =  document.getElementById('show_user_id_over_video');
 var random1 = Math.floor((Math.random() * 300) + 1);
 var random2 = Math.floor((Math.random() * 200) + 1);
 get_show_user_id_over_video.style.top = get_video_location_span_tag_top_position+random1+'px';
 get_show_user_id_over_video.style.left = get_video_location_span_tag_left_position+random2+'px';

 console.log(get_video_location_span_tag_top_position);
 console.log(get_video_location_span_tag_left_position);
 console.log('aza');
 changePosition2();
}

function changePosition2(){
   setTimeout(function(){changePosition(); }, 10000);
}
changePosition();
</script>

