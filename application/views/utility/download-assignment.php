<?php
   session_start();
   if (!isset($_SESSION['ftip69_uid'])) {
     header('location:../auth/login.php');
   } 
   ?>

<?php
   require '../../dbcon.php';
   ?>
<?php
if (isset($_POST['download_assignment'])) {
       $assignment_log_id = $_POST['assignment_log_id'];
    
       $query = "SELECT `file_name` FROM `assignment_log` WHERE `id` = $assignment_log_id;";
       $runfetch = mysqli_query($con, $query);
       $noofrow = mysqli_num_rows($runfetch);
       $indexnumber = 1;
       
       if ($noofrow >0 && $runfetch == TRUE) { 
          while ($data = mysqli_fetch_assoc($runfetch)) { 
       
             // use of explode 
             $files = $data['file_name']; 
            //  echo $files;
             $files_array = explode (",", $files); 
             $no_of_files =  sizeof($files_array);
             if($files == ''){
                 ?>

<script>
window.history.back()
window.location = 'https://fingertips.co.in/en/auth/login.php';
</script>
                 <?php
             }

          }
       }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Assignment</title>
</head>
<body>
    
</body>
</html>

<script>

var links = [<?php
    for($i= 0; $i < $no_of_files-1; $i++){
        $file_name = trim($files_array[$i]);
        
        if($i == $no_of_files-2){
            
            echo "'../uploads/session/assignment-upload/".$file_name."'";
        }else{
        echo "'../uploads/session/assignment-upload/".$file_name."',";
    }
        
    }?>];

function downloadAll(urls) {
     
  var get_download_links = document.getElementById('download_links');
     for (var i = 0; i < urls.length; i++) {
       var link = document.createElement('a');
       var extension = urls[i].split('.');

   extension = extension[3];
   var link_o = 'anzarkhan.com' + urls[i];  
   var file_name = link_o.split("/"); 
   file_name = file_name[4].substring(0, 20);
   file_name += '.';
   file_name += extension;
   link.setAttribute('download',file_name);
   link.setAttribute('target', '_blank');
   link.setAttribute('class', 'download_file text-primary');
   link.setAttribute('href', urls[i]);
   
   
   
   // var t  =   document.createTextNode(extension); 
 
   
   var link_o = 'anzarkhan.com' + urls[i];  
   var file_name = link_o.split("/"); 
   file_name = file_name[4].substring(0, 20);
   file_name += '.';
   file_name += extension;
   var t  =   document.createTextNode(file_name); 


   console.log(t); 
   link.appendChild(t);
   
   link.style.display = 'block';
   get_download_links.appendChild(link);
       
       // link.click();
       if(i < urls.length-2 ){
         //   document.write('No data found');
       }
     }
   
     // document.body.removeChild(link);
   }

downloadAll(links);
</script>

<script>
function downloadcall(){
    


    var get_download_file = document.getElementsByClassName('download_file');
for(var i = 0; i < get_download_file.length; i++){
    get_download_file[i].click();

    window.history.back()
window.location = 'https://fingertips.co.in/en/auth/login.php';
}

}

</script>

<!-- 
<script>

/**
 * Download a list of files.
 * @author speedplane
 */
function download_files(files) {
  function download_next(i) {
    if (i >= files.length) {
      return;
    }
    var a = document.createElement('a');
    a.href = files[i].download;
    a.target = '_parent';
    // Use a.download if available, it prevents plugins from opening.
    if ('download' in a) {
      a.download = files[i].filename;
    }
    // Add a to the doc for click to work.
    (document.body || document.documentElement).appendChild(a);
    if (a.click) {
      a.click(); // The click method is supported by most browsers.
    } else {
      $(a).click(); // Backup using jquery
    }
    // Delete the temporary link.
    a.parentNode.removeChild(a);
    // Download the next file with a small timeout. The timeout is necessary
    // for IE, which will otherwise only download the first file.
    setTimeout(function() {
      download_next(i + 1);
    }, 500);
  }
  // Initiate the first download.
  download_next(0);
}
</script>


<script>
  // Here's a live example that downloads three test text files:
  function do_dl() {
    download_files([
        <?php


for($i= 0; $i < $no_of_files-1; $i++){
    $file_name = trim($files_array[$i]);

    echo "{download:'../uploads/session/assignment-upload/".$file_name."',filename:'$file_name'},";

}


?>
   
    ]);
  };

  do_dl();

  
</script> -->