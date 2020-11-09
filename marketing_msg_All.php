<?php

ini_set('max_execution_time', 300); //300 seconds = 5 minutes
$servername = "192.168.1.135";
$username = "sa";
$password = "CogAdm@123";
$dbname = "shear_circle_dev";

// $servername = "127.0.0.1";
// $username = "shearapp";
// $password = "shearapp";
// $dbname = "shear_circle_main";

$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


$sql = "SELECT * FROM send_campaigns WHERE STATUS = 1 AND start_date = DATE_FORMAT(CURDATE(),'%m-%d-%Y')
          AND times = '11:45 AM'";

$result = $connection->query($sql);
$users = array();


if ($result != null){
    $customer = [];
    foreach ($result as $user) 
        { 

            {
                $customer[] = array(
                     
                      'customer_type'=>$user['customer_type'],
                      'user_id'=>$user['user_id'],
                      'template_id'=>$user['template_id'],
                      'customer_type'=>$user['customer_type']
                    );
            }
                        
           
        }
             
   
    $sentCnt =0;

    foreach ($customer as $index => $one) {
            try {
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($user));
                curl_setopt($curl, CURLOPT_URL, 'http://dev.shearcircle.com/api/booking/send_marketing_campaigns');
                $result = curl_exec($curl);
                curl_close($curl);
                $sentCnt++;
                
            } catch (Exception $ex) {
                $file = fopen("error_sub_cron.txt", "a");
                fwrite("Error " . $ex . "\n", $file);
                fclose($file);
            }
        
    }

    echo 'Message sent to ' . $sentCnt;
}
$connection->close();
