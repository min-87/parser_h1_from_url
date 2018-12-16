<?php

require 'simple_html_dom.php';


$link = new mysqli('localhost','ispmgr','5hB1I3OuJfSIPVDd1S','sphider');//Connection to BD
$link->query( "SET CHARSET ISO utf8" );


if (mysqli_connect_errno()){
    
    echo 'Ошибка подключения к БД ('.mysqli_connect_errno().'): '.mysqli_connect_error();
    exit();
}
 


$sql = "SELECT h1 FROM links WHERE link_id BETWEEN 1700 AND 1900";
 
$result = mysqli_query($link, $sql);
while($row = $result->fetch_assoc()){
	print_r($row['h1']);
	echo '<br>';
}









    


