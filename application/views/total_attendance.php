<script>
   //menu
 document.getElementById('menu_dashboard').classList.add("menu-active");
 //icon
 document.getElementById('sidebar_icon_1').style.fill='#E46F0E';

</script>
<style>
    body{font-family: 'Poppins', sans-serif;}
</style>           
<?php require_once 'dbcon.php'; ?>
          
              <div class="col-lg-9 mt-5 ">
                  <span  style="margin-left:0px;font-size: 40px;color:#858585;"><b>Total Attendance</b></span>
                <BR>
               
                                 <table class="table table-hover text-left " >
                                    <thead>
                                       <tr>
                                          <th>Session</th>
                                          <th>Date</th>
                                          <th>Attendance</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       foreach($attendance as $data){?>
                                       <tr >
                                     <td style="width:500px">
                                          <?php 
                                           
                                         
                                           $query = "SELECT * FROM `offline_session` WHERE `id` = $data->session_id";
                                           $runfetch = mysqli_query($con, $query);
                                           $noofrow = mysqli_num_rows($runfetch);
                                           $totalCount = 0;
                                           $presentCount = 0;
                                           $absentCount = 0;
                                           $attendacePercentage = 0;
                                           
                                           if ($noofrow >0 && $runfetch == TRUE) {   
                                              while ($datas = mysqli_fetch_assoc($runfetch)) { 
                                                echo $datas['session_name'];
                                              }
                                            }
                                          ?> 
                                          </td>
                                          <td><?php
                                                $mydate=getdate($data->timestamp);
                                                echo "$mydate[mday]/$mydate[mon]/$mydate[year]";
                                                ?></td>
                                          <td>
                                            <?php
                                            if($data->attendance == 'present'){
                                                ?>
                                                  <button class="btn btn-default" id="present"><p style="font-size:15px;color:#ffffff;margin-top:-2px;">Present</p></button>
                                                <?php
                                            }else if($data->attendance == 'absent'){
                                                ?>
                                                  <button class="btn btn-danger" id="absent" ><p style="font-size:15px;color:#ffffff;margin-top:-2px;">Absent</p></button>
                                                <?php   }
                                            ?>
                                            <br>
                                            <br>
                                      
                                        </td>
                                       </tr>
                                       <?php
                                          }
                                          ?>
                                        </tbody>
                                 </table>
               <!-- Container-fluid Ends-->
            </div>
                </div>

          </div>
      
            <style>
                 #present{
                     background-color:#8AEC8E;
                     width:145px;
                     height:30px;
                     border-radius:17px;
                 }
                 #absent{
                     background-color:#FF5E5E;
                     width:145px;
                     height:30px;
                     border-radius:17px;
               
                    }
                 
                </style>