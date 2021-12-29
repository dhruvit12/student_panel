<?php
// mail('anzarkhan.rain@gmail.com','send message to telegram','telegram notify');
        require_once '../../dbcon.php';

        function sendMessage($chatID, $messaggio, $token,$session_id,$con) {
                // echo "sending message to " . $chatID . "\n";
            
                $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
                $url = $url . "&text=" . urlencode($messaggio);
                $ch = curl_init();
                $optArray = array(
                        CURLOPT_URL => $url,
                        CURLOPT_RETURNTRANSFER => true
                );
                curl_setopt_array($ch, $optArray);
                $result = curl_exec($ch);
                curl_close($ch);
                $dataofresult=json_decode($result);
                // echo $dataofresult->ok;
                if ($dataofresult->ok == "true" || $dataofresult->ok == 1) {
                      

                $query3="UPDATE offline_session SET `telegram_notification`= 1 WHERE `id`=$session_id";
                // $run3=mysqli_query($con,$query3);
                // print_r($run3);
          
                if (mysqli_query($con,$query3)) {
                        echo "done";
                }else {
                        echo "Error: " . $query3 . "<br>" . $con->error;
                }
      

                
                        // if ($con->query($query3) === TRUE) {
                        //         echo "Done";        
                        // }else {
                        //         echo "not";
                        // }

                }else {
                        echo "Not Defining JSON Value";
                }
            }


         $query = "SELECT * FROM `offline_session`";
         $runfetch = mysqli_query($con, $query);
         $noofrow = mysqli_num_rows($runfetch);
         $indexnumber = 1;
         if ($noofrow >0 && $runfetch == TRUE) { 
         while ($data = mysqli_fetch_assoc($runfetch)) {
                 $session_id = $data['id'];
                 $batch_id = $data['batch_Id'];
                 $start_time = $data['start_time'];
                 $telegram_notification=$data['telegram_notification'];
        

        $query1 = "SELECT * FROM `offline_session_log` WHERE `session_id` = $session_id";
        $runfetch1 = mysqli_query($con, $query1);
        $noofrow1 = mysqli_num_rows($runfetch1);
        $indexnumber1 = 1;
        if ($noofrow1 >0 && $runfetch1 == TRUE) { 
        while ($data1 = mysqli_fetch_assoc($runfetch1)) {
                $is_completed = $data1['is_completed'];
                
                if($is_completed == 0){
                        // echo "Not completed";
                        // echo $session_id."<br>";
                        $date = date_create();
                        $current_time = date_timestamp_get($date);
        
                        if(($start_time - $current_time) <= 63000 && ($start_time - $current_time ) > 59400){
                                
                        //     echo 'In 12 hours';
                        //     echo $session_id;
                                // 86400 seconds = 12 hours.
                                // 82,800 seconds = 11 hours.
                                // _________________________
                                // 13      12      11     10
                                //    No      Yes  yes No    No
                                // notification before 11-12 hours.  
                                
                                $query2 = "SELECT * FROM `batch` WHERE `id` = $batch_id";
                                $runfetch2 = mysqli_query($con, $query2);
                                $noofrow2 = mysqli_num_rows($runfetch2);
                                $indexnumber2 = 1;
                                if ($noofrow2 >0 && $runfetch2 == TRUE) { 
                                while ($data2 = mysqli_fetch_assoc($runfetch2)) { 
                                        $telegram_group_id = $data2['telegram_group'];
                                        $telegram_bot_token = $data2['telegram_bot_token'];
                                        
                                        // echo $telegram_group_id."<br>";
                                        // echo $telegram_bot_token."<br>";
                                        
                                        $telegrambot=$telegram_bot_token;
                                        $telegramchatid=$telegram_group_id;

                                        $timing = date('d/m/Y h:i:s A', $start_time);
                                        if ($telegram_notification==0) {
                                        sendMessage($telegramchatid, "Dear students, this is a gentle reminder for your next session  scheduled on $timing", $telegrambot,$session_id,$con);
                                        }


                                        
                                }
                        }
                        
                                
                        }else{
                                $calc = $start_time - $current_time;
                                // echo "Not in 12 hours $session_id Calc  $calc ($start_time , $current_time)<br>";
                        }
                }       
                else{
                        // echo "completed";
                        // echo $session_id."<br>";
                }   

              

                
                
                
        }
        
       }else{
        $date = date_create();
        $current_time = date_timestamp_get($date);

        if(($start_time - $current_time) <= 63000 && ($start_time - $current_time ) > 59400){
        //     echo 'In 12 hours';
        //     echo $session_id;
                // 86400 seconds = 12 hours.
                // 82,800 seconds = 11 hours.
                // _________________________
                // 13      12      11     10
                //    No      Yes  yes No    No
                // notification before 11-12 hours.  
                
                $query2 = "SELECT * FROM `batch` WHERE `id` = $batch_id";
                $runfetch2 = mysqli_query($con, $query2);
                $noofrow2 = mysqli_num_rows($runfetch2);
                $indexnumber2 = 1;
                if ($noofrow2 >0 && $runfetch2 == TRUE) { 
                while ($data2 = mysqli_fetch_assoc($runfetch2)) { 
                        $telegram_group_id = $data2['telegram_group'];
                        $telegram_bot_token = $data2['telegram_bot_token'];
                        
                        // echo $telegram_group_id."<br>";
                        // echo $telegram_bot_token."<br>";
                        
                        $telegrambot=$telegram_bot_token;
                        $telegramchatid=$telegram_group_id;

                        $timing = date('d/m/Y h:i:s A', $start_time);
                        if ($telegram_notification==0) {
                        $sendmessage=sendMessage($telegramchatid, "Dear students, this is a gentle reminder for your next session  scheduled on $timing", $telegrambot,$session_id,$con);
                        }
                }
        }
        
                
        }
        

       }


}
}

?>
