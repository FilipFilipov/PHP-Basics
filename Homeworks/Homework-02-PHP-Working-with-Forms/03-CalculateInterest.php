<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculate Interest</title>
</head>
<body>
<form action="03-CalculateInterest.php" method="post">
    <label for="amount">Enter Amount</label>
    <input type="text" name="amount" id="amount" required/>
    <div>
        <input type="radio" name="currency" id="dollar" value="$" required/>
        <label for="dollar">USD</label>
        <input type="radio" name="currency" id="euro" value="€" required/>
        <label for="euro">EUR</label>
        <input type="radio" name="currency" id="lev" value="лв" required/>
        <label for="lev">BGL</label>
    </div>
    <div>
        <label for="interest">Compound Interest Amount</label>
        <input type="text" name="interest" id="interest" required/></div>
    <select name="period">
        <option value="6">6 Months</option>
        <option value="12">1 Year</option>
        <option value="24">2 Years</option>
        <option value="60">5 Years</option>
    </select>
    <input type="submit" name="submit" value="Calculate">
</form>
<div>
    <?php
    if (isset($_POST['submit'])){
        $amount = (int)htmlspecialchars($_POST['amount']);
        $monthlyInterest = (int)htmlspecialchars($_POST['interest']) / 12;
        $period = (int)htmlspecialchars($_POST['period']);
        $finalAmount = $amount * pow((1 + $monthlyInterest / 100), $period);
        $result = number_format($finalAmount, 2, '.', '');
        $currency = htmlspecialchars($_POST['currency']);
        echo $currency !== 'лв' ? "<br/>$currency $result" : "<br/>$result $currency";
    }
    ?>
</div>
</body>
</html>