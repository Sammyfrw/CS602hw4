<?php
  require_once('database.php');

  //Get Student ID and validate; return to index with error if validation fails
  $student_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
  if ($student_id == NULL || $student_id == FALSE) {
    $error_message = "Invalid student ID";
    include('index.php');
    exit();
  }

  //Query for student and delete record
  $queryStudent = 'DELETE FROM students WHERE ID = :student_id';
  $statement = $db->prepare($queryStudent);
  $statement->bindValue(':student_id', $student_id);
  $success = $statement->execute();
  $statement->closeCursor();

  //return to index upon completion
  include('index.php');
?>
