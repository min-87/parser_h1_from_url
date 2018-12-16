<?php

require 'simple_html_dom.php';


$link = new mysqli('localhost','ispmgr','5hB1I3OuJfSIPVDd1S','sphider');//Connection to BD
$link->query( "SET CHARSET ISO utf8" );


if (mysqli_connect_errno()){
    
    echo 'Ошибка подключения к БД ('.mysqli_connect_errno().'): '.mysqli_connect_error();
    exit();
}
 


function getTitleH1FromURL($link){
	$content = file_get_contents($link);
	$html = str_get_html($content);
	return trim($html->find('h1',0)->innertext);
}



$sql = "SELECT link_id, url FROM links where link_id between 2200 and 2400";//sql запрос
$result = mysqli_query($link, $sql);
$articles = array();
while($row = mysqli_fetch_assoc($result)){
    $articles = $row;
	$real_url = $articles['url'];
	$h1 = getTitleH1FromURL($real_url);
	$h1 = mysqli_real_escape_string($link,$h1);
	$sql = "update links set h1 = '{$h1}' where link_id = {$articles['link_id']}";//sql запрос
	mysqli_query($link, $sql);//Направление запроса на mysql сервер
}
  








    


