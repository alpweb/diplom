<?php

/**
 * Подключаем БД 
*/	
function startup() {
	
  // Настройки подключения к БД.	
    $db_hostname = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "diplom";
    
    $link = mysqli_connect($db_hostname, $db_user, $db_password, $db_name);
    
    if ($link == false) {
      print("Ошибка подключения к БД - " . mysqli_connect_error());
    }
    // else {
    //   print("Соединение установлено!!!");
    // }
  
    mysqli_query($link, "SET NAMES 'utf8'");
  
    return $link;
  }
  