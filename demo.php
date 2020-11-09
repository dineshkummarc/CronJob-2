<?php
require_once 'C:\Users\User\vendor\autoload.php'; 
use Twilio\Rest\Client;

$servername="192.168.1.135";
$username="sa";
$password="CogAdm@123";
$dbname="shear_circle_dev";

$connection = new mysqli($servername,$username,$password,$dbname);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 


$sql  =   "SELECT id,username,mobile FROM users
            WHERE created_at <= UNIX_TIMESTAMP((CURDATE() - INTERVAL 5 DAY))
            AND username NOT IN (SELECT DISTINCT(customer_email) FROM bookings)
            GROUP BY username";

	$result = $connection->query($sql);
	if ($result->num_rows > 0)
    {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        echo "ID :{$row['id']}  <br> ".
          "UserName : {$row['username']} <br> ".
           "Mobile : {$row['mobile']} <br> ".
            "<br>";

            	$account_sid = 'AC039657533a1738441a4cb0b462c26d75';
				$auth_token = '0bb9e8d21750db2c7eba2680b9f5eba9';
				$twilio_number = "+19042046266";
				$client = new Client($account_sid, $auth_token);
			    $client->messages->create(
			        array('+917990254501'),
			        array(
			            'from' => $twilio_number,
			            'body' => 'Hi You have cancelled the meetings'
			        )
			    );



    }
} 
	else 
	{
	    echo "0 results";
	}
	 $connection->close();


function validPhoneNumber($phone){
    if (preg_match ("/[1-9][01][0-9]-?[0-9]{3}-=[0-9]{4}/", $phone)) {
        return "Good Phone";
    }
    else {
        return "Bad Phone";
    }
}



