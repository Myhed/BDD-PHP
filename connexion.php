<?php

  try {
      $db = new PDO('mysql:host=localhost;dbname=register','root','Azerty789Uiop');
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }catch(Exception $e){
    echo 'error: '.$e->getMessage();
  }