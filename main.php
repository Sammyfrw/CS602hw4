<?php
  //set the default values for variables
  if (!isset($grossIncome)) {$grossIncome = '';}
  if (!isset($deductible)) {$deductible = '6100';}
  if (!isset($exemption)) {$exemption = '3900';}
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8" />
  <title>Progressive Tax Calculator</title>
  <link rel ="stylesheet" type="text/css" href="styles.css">
</head>

<body>
  <main>
  <h1>Progressive Tax Calculator</h1>
  <p class="info">Welcome to the tax calculator. Please enter your values below:</p>
  <form action="progressive_income_tax.php" method="post">
    <div class="form">
      <label>Gross Annual Income:</label>
      <input type="text" name="gross_income">value="<?php echo $grossIncome ?>">
      <br>

      <label>Deductible Amount:</label>
      <input type="text" name="deductible">value="<?php echo $deductible ?>">
      <br>

      <label>Exemption Amount:</label>
      <input type="text" name="exemption">value="<?php echo $exemption ?>">
      <br>
    </div>

    <div class="button">
      <label>Submit</label>
      <input type="submit"><br>
    </div>
  </form>
  </main>
</body>
</html>
