<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8" />
  <title>Progressive Tax Calculator</title>
</head>
<body>
  <p>
  <?php
    $grossIncome = 0
    $deductible = 6100
    $exemption = 3900

    function calcTaxableIncome($grossIncome, $deductible, $exemption){
      $taxableIncome = $grossIncome - ($deductible + $exemption);
      return $taxableIncome;
    }

    function calcIncomeTax($taxableIncome){
      if ($taxableIncome <= 9225) {
        $incomeTax = $taxableIncome * 0.10
        return $incomeTax;

      } elseif ($taxableIncome >= 9226 && $taxableIncome <= 37450) {
        $incomeTax = 922.50
        $incomeTax += ($taxableIncome - 9225) * 0.15
        return $incomeTax;

      } elseif ($taxableIncome >= 37451 && $taxableIncome <= 90750) {
        $incomeTax = 5156.25
        $incomeTax += ($taxableIncome - 37450) * 0.25
        return $incomeTax;

      } elseif ($taxableIncome >= 90751 && $taxableIncome <= 189300) {
        $incomeTax = 18481.25
        $incomeTax += ($taxableIncome - 90750) * 0.28
        return $incomeTax;

      } elseif ($taxableIncome >= 189301 && $taxableIncome <= 411500) {
        $incomeTax = 46075.25
        $incomeTax += ($taxableIncome - 189300) * 0.33
        return $incomeTax;

      } elseif ($taxableIncome >= 411501 && $taxableIncome <= 413200) {
        $incomeTax = 119401.25
        $incomeTax += ($taxableIncome - 411500) * 0.35
        return $incomeTax;

      } elseif ($taxableIncome >= 413201) {
        $incomeTax = 119996.25
        $incomeTax += ($taxableIncome - 413200) * 0.396
        return $incomeTax;
      }
    }

    function calcTaxRate($grossIncome, $taxableIncome){
       $effectiveTaxRate = ($incomeTax / $grossIncome) * 100
       return $effectiveTaxRate;
    }

    echo
  ?>
  </p>
</body>
</html>
