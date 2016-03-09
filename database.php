<?php

  // remove before flight

  ini_set('display_errors', 'On');

  $dns = 'mysql:host=localhost; dbname=sakila';
  $username = 'root';
  $password = 'toor';
  $options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
  );

  try{
    $db = new PDO($dns, $username, $password, $options);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  } catch(Exception $e) {
    echo $e->getMessage();
    die();
  }

?>
