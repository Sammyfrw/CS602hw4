<?php
//Using root user; can change dbname, username, password as necessary
  $dsn='mysql:host=localhost;dbname=cs602';
  $username = 'root';
  $password = '';

  try {
    $db = new PDO($dsn, $username, $password);
  } catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
  }
?>
