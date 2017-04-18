<!-- Form to add students; add_student.php handles creation -->
<!DOCTYPE html>
<html>
<head>
  <title>Student Database</title>
  <link rel ="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<main>
  <h1>Student Information</h1>
  <form action="add_student.php" method="post">
  <table>
    <tr>
      <th>First Name</th>
      <td><input type="text" name="firstName"></td>
    </tr>
    <tr>
      <th>Last Name</th>
      <td><input type="text" name="lastName"></td>
    </tr>
    <tr>
      <th>E-Mail</th>
      <td><input type="text" name="email"></td>
    </tr>
  </table>
  <input type="submit" value="Add Student"><br>
  </form>
</main>
</body>
</html>
