<?php
		$servername="192.168.1.135";
		$username="sa";
		$password="CogAdm@123";
		$dbname="shear_circle_dev";

		$connection = new mysqli($servername,$username,$password,$dbname);
			if ($connection->connect_error) 
		   {
	         die("Connection failed: " . $connection->connect_error);
		   } 

			$sql  =   "SELECT DISTINCT(b.customer_email),mt.template_id,mt.message,sc.template_type ,CONCAT(sc.start_date,' - ',sc.end_date) AS viewDate 
			    FROM send_campaigns sc
			    JOIN marketing_templates mt ON mt.template_id = sc.template_id
			    JOIN bookings b ON sc.user_id = b.business_id 
			
			
			    WHERE sc.start_date >='06-28-2018'
			    AND sc.end_date <=CURDATE()
			    AND sc.template_type='Email Template'
			    AND sc.user_id = 1034";

		$result = $connection->query($sql);
		$users=array();