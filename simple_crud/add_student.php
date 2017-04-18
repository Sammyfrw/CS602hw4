<?php
  //Get student data from form
  $firstName = filter_input(INPUT_POST, 'firstName');
  $lastName = filter_input(INPUT_POST, 'lastName');
  $email = filter_input(INPUT_POST, 'email');

  //Validate inputs; return to index with error if validation fails
  if ($firstName == NULL || $firstName == FALSE || $lastName == NULL ||
    $lastName == FALSE || $email == NULL || $email == FALSE) {
      $error_message = "Invalid data - ensure all fields are filled.";
      include('index.php');
      exit();
  } else {
      require_once('database.php');

    //Query for student and delete record
    $queryStudent =
      'INSERT INTO students (firstName, lastName, email)
      VALUES (:firstName, :lastName, :email)';
    $statement = $db->prepare($queryStudent);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();

    //Return to homepage upon success
    include('index.php');
  }
?>
