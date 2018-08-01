<?php

//require_once 'C:\Users\User\vendor\autoload.php'; 
use \root\Twilio\twilio\sdk\Twilio\TwiML\Voice\Client;


$servername = "127.0.0.1";
$username = "shearapp";
$password = "shearapp";
$dbname = "shear_circle_main";

// $servername = "192.168.1.135";
// $username = "sa";
// $password = "CogAdm@123";
// $dbname = "shear_circle_dev";

$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$q = "select * from cron_job_duration_settings  WHERE event_name='INACTIVE_CUST_MSG'";
$data = $connection->query($q);
$duration = 5;
while ($row = mysqli_fetch_assoc($data)) {
    $duration = $row['duration'];
}

$sql = "SELECT id,mobile,CONCAT(firstname,'',lastname) AS professional_name FROM users WHERE role_id=3
        AND created_at <= UNIX_TIMESTAMP((CURDATE() - INTERVAL 5 DAY))
        AND id NOT IN (SELECT DISTINCT(business_id) FROM bookings WHERE created_at <= UNIX_TIMESTAMP(CURDATE() - INTERVAL 5 DAY))
        GROUP BY id";

$result = $connection->query($sql);
$users = array();

if ($result != null) {
    $customer = [];
    foreach ($result as $user) { {
            $customer[] = array(
                'mobile' => $user['mobile'],
            );
        }
    }


    echo "count " . count($customer) . "<br>";


    foreach ($customer as $index => $one) {

        //$isCorrectFormat = preg_match("/^(\+?[01])?[-.\s]?\(?[1-9]\d{2}\)?[-.\s]?\d{3}[-.\s]?\d{4}/", $one['mobile']);
        $isCorrectFormat = preg_match("/\+1([- ])?\(?\d{3}\)? \d{3}-\d{4}/", $one['mobile']);

        if ($isCorrectFormat) {

            try {
                $isvalidphone = str_replace(["(", ")", "-", " "], ["", "", "", ""], $one['mobile']);
                // echo "step 1<br>";
                $account_sid = 'AC6d341554e43efae7efbb27a13f13cbc9';
                $auth_token = '9ce2574671b7268aecfdc353ba83fcec';
                $twilio_number = "+18338260690";
                $message = $one['cust_name'] . ', we noticed that you haven’t been using shear circle to book your appointments with stylist or salon listed in our platform near you. With Shear circle, you can now book appointments with your stylist on your own and earn reward points on every dollar you spend through shear circle platform.';
                $client = new Client($account_sid, $auth_token);
                $insertSQL = "INSERT INTO event_message VALUES (NULL,'" . $twilio_number . "','" . $isvalidphone . "','" . $message . "'," . time() . "," . time() . ",1)";
                // echo "step 2<br>";
                $connection->query($insertSQL);
                $client->messages->create(
                        $isvalidphone,
                        // Where to send a text message (your cell phone?)
                        array(
                    'from' => $twilio_number,
                    'body' => $message
                        )
                );
                // echo "step 3<br>";
                //echo "Sent message ".$one['mobile']."<br>";
            } catch (Exception $ex) {
                $file = fopen("error_cust_cron.txt", "a");
                fwrite("Error " . $ex . "\n", $file);
                fclose($file);
            }
        } else {
            // echo $isCorrectFormat;
            // echo $index;
        }
    }
    // catch(Exception $ex){
    // 	echo "<pre>";
    // 	print_r($ex);
    // 	echo "</pre>";
    // }
}
$connection->close();
