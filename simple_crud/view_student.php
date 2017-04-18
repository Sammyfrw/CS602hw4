<?php
  require_once('database.php');

  //Get Student ID and validate; return to index with error if validation fails
  $student_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
  if ($student_id == NULL || $student_id == FALSE) {
    $error_message = "Invalid student ID";
    include('index.php');
    exit();
  }

  //Query for student
  $queryStudent = 'SELECT * FROM students WHERE ID = :student_id';
  $statement = $db->prepare($queryStudent);
  $statement-> bindValue(':student_id', $student_id);
  $statement->execute();
  $student = $statement->fetch();
  $statement->closeCursor();
?>

 <!-- Print student information -->

<!DOCTYPE html>
<html>
<head>
  <title>Student Database</title>
  <link rel ="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<main>
  <h1>Student Information</h1>
  <table>
    <tr>
      <th>Student ID</th>
      <td><?php echo $student['ID']; ?></td>
    </tr>
    <tr>
      <th>First Name</th>
      <td><?php echo $student['firstName']; ?></td>
    </tr>
    <tr>
      <th>Last Name</th>
      <td><?php echo $student['lastName']; ?></td>
    </tr>
    <tr>
      <th>E-Mail</th>
      <td><?php echo $student['email']; ?></td>
    </tr>
  </table>
  <a href="edit_student_form.php?id=<?php echo $student['ID']; ?>">Edit Information</a>
</main>
</body>
</html>
