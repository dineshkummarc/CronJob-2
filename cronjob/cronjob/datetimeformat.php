<?php

 echo  date("d-m-Y") . "<br/>";
 echo date("m-d-y")."<br/>"; 

 echo  date("d-m-Y",time())."<br/>"; 



 $date = date_create("3-6-2007");
 echo date_format($date,"jS F, Y")."<br/>"; 


 $date2 = date_create("15-7-2018");
 echo date_format($date2,"F j,Y ")."<br/>";



 $current_timestamp = time();
 echo $current_timestamp."<br/>";


 $current_timestamp1 = strtotime("now");
 echo $current_timestamp1."<br/>";


$date_from_timestamp = date("d-m-Y",$current_timestamp);
echo "Formatted date from timestamp:" . $date_from_timestamp;




?>