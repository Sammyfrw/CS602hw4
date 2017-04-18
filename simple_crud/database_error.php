<!-- Simple error handling for database errors -->
<!DOCTYPE html>
<html>
<head>
  <title>Student Database</title>
  <link rel ="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <h1>Database Error</h1>
  <p>There was an error in connecting to the database.</p>
  <p>Error Message: <?php echo $error_message; ?></p>
</body>
</html>
