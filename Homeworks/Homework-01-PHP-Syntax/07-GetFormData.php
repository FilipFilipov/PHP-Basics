<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form Data</title>
</head>
<body>
<form action="07-GetFormData.php" method="get">
    <div>
        <input type="text" name="name" placeholder="Name">
    </div>
    <div>
        <input type="text" name="age" placeholder="Age">
    <div>
        <input type="radio" name="gender" id="male" value="male">
        <label for="male">Male</label>
    </div>
    <div>
        <input type="radio" name="gender" id="female" value="female">
        <label for="female">Female</label>
    </div>
    <input type="submit" value="Send">
</form>
<div>
    <?php
    if(isset($_GET['name']) && isset($_GET['age']) && isset($_GET['gender'])) {
        echo "My name is ". htmlspecialchars($_GET['name']) . ". I am " .
            htmlspecialchars($_GET['age']) . " year old. I am " . htmlspecialchars($_GET['gender']) . ".";
    }
    ?>
</div>
</body>
</html>