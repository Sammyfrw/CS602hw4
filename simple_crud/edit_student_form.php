<?php
  require_once('database.php');

  //Get student ID from URL get request
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

<!-- Edit student form; includes passing in student ID. Update handled by edit_student.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Student Database</title>
  <link rel ="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<main>
  <h1>Student Information</h1>
  <form action="edit_student.php" method="post">
  <table>
    <tr>
      <th>First Name</th>
      <td><input type="text" name="firstName" value=<?php echo $student['firstName']; ?>></td>
    </tr>
    <tr>
      <th>Last Name</th>
      <td><input type="text" name="lastName" value=<?php echo $student['lastName']; ?>></td>
    </tr>
    <tr>
      <th>E-Mail</th>
      <td><input type="text" name="email" value=<?php echo $student['email']; ?>></td>
    </tr>
  </table>
  <!-- Pass id field back into post request -->
  <input type="hidden" name="id" value=<?php echo $student['ID']; ?>>
  <input type="submit" value="Edit Student"><br>
  </form>
</main>
</body>
</html>
