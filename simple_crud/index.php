<?php
  //connecting to db
  require_once ('database.php');

  //acquiring all students
  $query = 'SELECT * FROM students ORDER BY ID';
  $statement = $db->prepare($query);
  $statement->execute();
  $students = $statement->fetchAll();
  $statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Database</title>
  <link rel ="stylesheet" type="text/css" href="styles.css">
</head>
<main>
<body>
  <h1><a style="text-decoration: none; color: green;" href="index.php">Student Database Homepage</a></h1>
  <h2> <a href="add_student_form.php">Add New Student</a></h2>
  <?php if (!empty($error_message)) { ?>
    <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
  <?php } ?>
  <p class="info">Welcome to the student database. Please review the list of students below and select an action:</p>
  <table>
    <!-- Display list of students -->
    <tr>
      <th>ID Number</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email Address</th>
      <th colspan="2";>Options</th>
    </tr>
  <?php foreach($students as $student) : ?>
    <tr>
      <td><?php echo $student['ID']; ?></td>
      <td><?php echo $student['firstName']; ?></td>
      <td><?php echo $student['lastName']; ?></td>
      <td><?php echo $student['email']; ?></td>
      <td><a href="view_student.php?id=<?php echo $student['ID']; ?>">View Student</a></td>
      <td><a href="remove_student.php?id=<?php echo $student['ID']; ?>">Remove Student</a></td>
    </tr>
  <?php endforeach; ?>
  </table>
</body>
</main>
</html>
