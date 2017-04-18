  <?php
  //obtain form data
  $grossIncome = filter_input(INPUT_POST, 'gross_annual_income', FILTER_VALIDATE_FLOAT);
  $deductible = filter_input(INPUT_POST, 'deductible', FILTER_VALIDATE_FLOAT);
  $exemption = filter_input(INPUT_POST, 'exemption', FILTER_VALIDATE_FLOAT);

  //input validation after input has been filtered; populate error messages if present
  $error_messages = array('');
  numberValidation($grossIncome, $deductible, $exemption);

  ?>
  <?php
    //Taxable Income function
    function calcTaxableIncome($grossIncome, $deductible, $exemption){
      $taxableIncome = $grossIncome - ($deductible + $exemption);
      return $taxableIncome;
    }

    //Income Tax function
    function calcIncomeTax($taxableIncome){
      if ($taxableIncome <= 9225) {
        $incomeTax = $taxableIncome * 0.10
        return $incomeTax;

      } else if ($taxableIncome >= 9226 && $taxableIncome <= 37450) {
        $incomeTax = 922.50
        $incomeTax += ($taxableIncome - 9225) * 0.15
        return $incomeTax;

      } else if ($taxableIncome >= 37451 && $taxableIncome <= 90750) {
        $incomeTax = 5156.25
        $incomeTax += ($taxableIncome - 37450) * 0.25
        return $incomeTax;

      } else if ($taxableIncome >= 90751 && $taxableIncome <= 189300) {
        $incomeTax = 18481.25
        $incomeTax += ($taxableIncome - 90750) * 0.28
        return $incomeTax;

      } else if ($taxableIncome >= 189301 && $taxableIncome <= 411500) {
        $incomeTax = 46075.25
        $incomeTax += ($taxableIncome - 189300) * 0.33
        return $incomeTax;

      } else if ($taxableIncome >= 411501 && $taxableIncome <= 413200) {
        $incomeTax = 119401.25
        $incomeTax += ($taxableIncome - 411500) * 0.35
        return $incomeTax;

      } else if ($taxableIncome >= 413201) {
        $incomeTax = 119996.25
        $incomeTax += ($taxableIncome - 413200) * 0.396
        return $incomeTax;
      }
    }

    //Effective tax rate function
    function calcTaxRate($grossIncome, $taxableIncome){
       $effectiveTaxRate = ($incomeTax / $grossIncome) * 100
       return $effectiveTaxRate;

    function numberValidation($grossIncome, $deductible, $exemption)
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
    }
  ?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8" />
  <title>Progressive Tax Calculator</title>
</head>
<body>
  <main>
  <h1>Progressive Tax Calculator</h1>
  <p class="info">Welcome to the tax calculator. Please enter your values below:</p>
  <form action=

  </p>
</body>
</html>
