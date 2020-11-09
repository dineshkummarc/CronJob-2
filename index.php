<?php
require_once 'C:\Users\User\vendor\autoload.php'; 
use Twilio\Rest\Client;

		$servername="192.168.1.135";
		$username="sa";
		$password="CogAdm@123";
		$dbname="shear_circle_dev";

$connection = new mysqli($servername,$username,$password,$dbname);
	if ($connection->connect_error) 
	{
	    die("Connection failed: " . $connection->connect_error);
	} 


	$sql  =   "SELECT distinct(mobile) as mobile FROM users
	            WHERE created_at <= UNIX_TIMESTAMP((CURDATE() - INTERVAL 5 DAY))
	            AND username NOT IN (SELECT DISTINCT(customer_email) FROM bookings) AND mobile IS NOT NULL
	            GROUP BY username";

		$result = $connection->query($sql);
		$users=array();
	// while($row = $result->fetch_assoc())
	// {
	// 	$users[]=$row;
	// }

	$customer=[];
	foreach ($result as  $user) {
		{
				 $customer[]=array(
				 'mobile' => $user['mobile'],
				 );
		}
	}


	echo "count ".count($customer)."<br>";

	
			foreach ($customer as $index=>$one) 
			{
				
				//$isCorrectFormat = preg_match("/^(\+?[01])?[-.\s]?\(?[1-9]\d{2}\)?[-.\s]?\d{3}[-.\s]?\d{4}/", $one['mobile']);
				$isCorrectFormat = preg_match("/\+1([- ])?\(?\d{3}\)? \d{3}-\d{4}/", $one['mobile']);
				
			        if ($isCorrectFormat) 
			        {

			        	try{
					        	$isvalidphone = str_replace(["(",")","-"," "],["","","",""],$one['mobile']);   
					        	// echo "step 1<br>";
							   		$account_sid = 'AC039657533a1738441a4cb0b462c26d75';
									$auth_token = '0bb9e8d21750db2c7eba2680b9f5eba9';
									$twilio_number = "+19042046266";
									$client = new Client($account_sid, $auth_token);
									// echo "step 2<br>";
									$client->messages->create(
									         $isvalidphone,
									        // Where to send a text message (your cell phone?)
									        array(
									            'from' => $twilio_number,
									            'body' => 'Hi we are testing for it.'
									        )
									    );
									// echo "step 3<br>";
								    echo "Sent message ".$one['mobile']."<br>";
						    }
						    catch(Exception $ex)
						    {

						    }


					}
					else
					{
						// echo $isCorrectFormat;
						// echo $index;
					}
			    
			    }
			   
 		
 		// catch(Exception $ex){
 		// 	echo "<pre>";
 		// 	print_r($ex);
 		// 	echo "</pre>";
 		// }
	$connection->close();
