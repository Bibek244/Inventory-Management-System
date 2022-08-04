<?php
 $today = date('mdGis');
 echo $today;
 $yesterday =uniqid();
 echo "<br>".$yesterday."<br>";
 $key = microtime() + floor(rand()*10000);
echo $key;
 ?>