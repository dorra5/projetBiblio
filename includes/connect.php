<?php 

try {
  $db = new PDO('mysql:host=localhost;dbname=ghada_db', 'root','', 
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
  $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
} catch (Exception $e) {
  echo"une erreur est servenue";
  die();
}


?>