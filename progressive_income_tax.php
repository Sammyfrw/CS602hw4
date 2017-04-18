<?php
//Form calculations and case handling
  //obtain form data
  $grossIncome = filter_input(INPUT_POST, 'gross_annual_income', FILTER_VALIDATE_FLOAT);
  $deductible = filter_input(INPUT_POST, 'deductible', FILTER_VALIDATE_FLOAT);
  $exemption = filter_input(INPUT_POST, 'exemption', FILTER_VALIDATE_FLOAT);

  //input validation after input has been filtered; populate error messages if present
  $error_messages = numberValidation($grossIncome, $deductible, $exemption);

  //if there are no errors, calculate taxation values and format output
  if (empty($error_messages)) {
    $taxableIncome = calcTaxableIncome($grossIncome, $deductible, $exemption);
    $incomeTax = calcIncomeTax($taxableIncome);
    $effectiveTaxRate = calcTaxRate($grossIncome, $incomeTax);

    $taxableIncome = '$'.number_format($taxableIncome, 2);
    $incomeTax = '$'.number_format($incomeTax, 2);
    $effectiveTaxRate = number_format($effectiveTaxRate, 2).'%';
  }

  //If there are any errors, return to the index page
  if (!empty($error_messages)) {
    include('main.php');
    exit();
  }

//Function definitions
  //Taxable Income function
  function calcTaxableIncome($grossIncome, $deductible, $exemption){
    $taxableIncome = $grossIncome - ($deductible + $exemption);
    return $taxableIncome;
  }

  //Income Tax function
  function calcIncomeTax($taxableIncome){
    if ($taxableIncome <= 9225) {
      $incomeTax = $taxableIncome * 0.10;
      return $incomeTax;

    } else if ($taxableIncome >= 9226 && $taxableIncome <= 37450) {
      $incomeTax = 922.50;
      $incomeTax += ($taxableIncome - 9225) * 0.15;
      return $incomeTax;

    } else if ($taxableIncome >= 37451 && $taxableIncome <= 90750) {
      $incomeTax = 5156.25;
      $incomeTax += ($taxableIncome - 37450) * 0.25;
      return $incomeTax;

    } else if ($taxableIncome >= 90751 && $taxableIncome <= 189300) {
      $incomeTax = 18481.25;
      $incomeTax += ($taxableIncome - 90750) * 0.28;
      return $incomeTax;

    } else if ($taxableIncome >= 189301 && $taxableIncome <= 411500) {
      $incomeTax = 46075.25;
      $incomeTax += ($taxableIncome - 189300) * 0.33;
      return $incomeTax;

    } else if ($taxableIncome >= 411501 && $taxableIncome <= 413200) {
      $incomeTax = 119401.25;
      $incomeTax += ($taxableIncome - 411500) * 0.35;
      return $incomeTax;

    } else if ($taxableIncome >= 413201) {
      $incomeTax = 119996.25;
      $incomeTax += ($taxableIncome - 413200) * 0.396;
      return $incomeTax;
    }
  }

  //Effective tax rate function
  function calcTaxRate($grossIncome, $incomeTax){
     $effectiveTaxRate = ($incomeTax / $grossIncome) * 100;
     return $effectiveTaxRate;
   }

   //Number validation function
  function numberValidation($grossIncome, $deductible, $exemption) {
    $error_messages = array();
    if ($grossIncome === FALSE) {
      array_push($error_messages, 'Gross Annual Income needs to be a valid number.');
    } else if ($grossIncome <= 0 ) {
      array_push($error_messages, 'Gross Annual Income needs to be greater than zero.');
    }

    if ($deductible === FALSE) {
      array_push($error_messages, 'Deductible needs to be a valid number.');
    } else if ($deductible <= 0 ) {
      array_push($error_messages, 'Deductible needs to be greater than zero.');
    }

    if ($exemption === FALSE) {
      array_push($error_messages, 'Exemption needs to be a valid number.');
    } else if ($exemption <= 0) {
      array_push($error_messages, 'Exemption needs to be greater than zero.');
    }
    return $error_messages;
  }
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8" />
  <title>Progressive Tax Calculator</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <main>
    <!-- Displaying outputs below -->
   <h1>Progressive Tax Calculator</h1>
    <p class="info">Below are your calculated values:</p>

    <label>Gross Annual Income:</label>
    <span><?php echo $grossIncome; ?></span></br>

    <label>Deductibles:</label>
    <span><?php echo $deductible; ?></span></br>

    <label>Exemptions: </label>
    <span><?php echo $exemption; ?></span></br>

    <label>Taxable Income:</label>
    <span><?php echo $taxableIncome; ?></span></br>

    <label>Taxed Income:</label>
    <span><?php echo $incomeTax; ?></span></br>

    <label>Effective Tax Rate:</label>
    <span><?php echo $effectiveTaxRate; ?></span></br>
  </main>
</body>
</html>
