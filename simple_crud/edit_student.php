<?php
  //Get student data from form
  $firstName = filter_input(INPUT_POST, 'firstName');
  $lastName = filter_input(INPUT_POST, 'lastName');
  $email = filter_input(INPUT_POST, 'email');
  $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

  //Validate inputs; return to index with error if validation fails
  if ($firstName == NULL || $firstName == FALSE || $lastName == NULL ||
    $lastName == FALSE || $email == NULL || $email == FALSE || $id == FALSE ||
    $id == NULL) {
      $error_message = "Invalid data - ensure all fields are filled.";
      include('index.php');
      exit();
  } else {
      require_once('database.php');

    //Query for student and delete record
    $queryStudent =
      'UPDATE students
      SET firstName = :firstName, lastName = :lastName, email = :email
      WHERE id = :id';
    $statement = $db->prepare($queryStudent);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();

    //Return to homepage upon completion
    include('index.php');
  }
?>
