<!DOCTYPE html>
<?php
if(isset($_POST['submit-cv'])) {
    function sanitize($s) {
        return htmlspecialchars($s);
    }

    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $gender = htmlspecialchars($_POST['gender']);
    $birthDate = htmlspecialchars($_POST['date']);
    $nationality = htmlspecialchars($_POST['nation']);
    $company = htmlspecialchars($_POST['company']);
    $workedFrom = htmlspecialchars($_POST['from']);
    $workedTo = htmlspecialchars($_POST['to']);
    $programmingLanguages = array_map('sanitize', $_POST['progLanguages']);
    $levelProgramming = array_map('sanitize', $_POST['level']);
    $speakingLanguages = array_map('sanitize', $_POST['speakingLanguages']);
    $comprehension = array_map('sanitize', $_POST['comprehension']);
    $reading = array_map('sanitize', $_POST['reading']);
    $writing = array_map('sanitize', $_POST['writing']);
    $category = htmlspecialchars(isset($_POST['category']) ? implode(', ', $_POST['category']) : '');
}
else {
    $firstName = $lastName = $email = $phone = $gender = $birthDate = $nationality = $company = $workedFrom = $workedTo = "";
    $programmingLanguages = $levelProgramming = $speakingLanguages = $comprehension = $reading = $writing = $category = "";
}
?>
<html>
<head>
    <title>CV Generator</title>
    <link rel="stylesheet" href="05-CVGenerator.css"/>
    <script src="05-CVGenrator.js"></script>
</head>
<body>
<form action="05-CVGenerator.php" method="post" name="mainForm">
    <fieldset>
        <legend>Personal Information</legend>
        <input type="text" name="firstName" placeholder="First Name" value="<?=$firstName?>" required/><br/>
        <input type="text" name="lastName" placeholder="Last Name" value="<?=$lastName?>" required/><br/>
        <input type="email" name="email" placeholder="Email" value="<?=$email?>" required/><br/>
        <input type="tel" name="phone" placeholder="Phone Number" value="<?=$phone?>" required/><br/>
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female" <?=$gender == "female" ? "checked" : ""?> value="female" required/>
        <label for="male">Male</label>
        <input type="radio" name="gender" id="male" <?=$gender == "male" ? "checked" : ""?> value="male" required/><br/>
        <label for="date">Birth Date</label><br/>
        <input type="date" name="date" id="date" placeholder="dd/mm/yyyy" value="<?=$birthDate?>" required/><br/>
        <label for="nation">Nationality</label><br/>
        <select name="nation" id="nation" required>
            <option value="Bulgarian">Bulgarian</option>
            <option value="Non-Bulgarian">Non-Bulgarian</option>
        </select>
    </fieldset>

    <fieldset>
        <legend>Last Work Position</legend>
        <label for="comp-name">Company Name</label>
        <input type="text" name="company" id="comp-name" value="<?=$company?>" required/><br/>
        <label for="from">From</label>
        <input type="date" id="from" name="from" placeholder="dd/mm/yyyy" value="<?=$workedFrom?>" required/><br/>
        <label for="from">To</label>
        <input type="date" id="to" name="to" placeholder="dd/mm/yyyy" value="<?=$workedTo?>" required/><br/>
    </fieldset>

    <fieldset>
        <legend>Computer Skills</legend>
        <label>Programming Languages</label><br/>
        <div id="parent-prog-lang"></div>
        <script>addProgLang();</script>
        <input type="button" name="remove-item" value="Remove Language" onclick="removeProgLang()"/>
        <input type="button" name="progLang[]" id="add" value="Add Language" onclick="addProgLang()"/>
    </fieldset>

    <fieldset>
        <legend>Other Skills</legend>
        <label>Languages</label><br/>
        <div id="speaking-lang-parent"></div>
        <script>addSpeakingLang();</script>
        <input type="button" name="remove-lang" value="Remove Language" onclick="removeSpeakingLang()"/>
        <input type="button" name="remove-lang" value="Add Language" onclick="addSpeakingLang()"/><br/>
        <label>Driver`s License</label><br/>
        <label for="B">B</label>
        <input type="checkbox" name="category[]" <?=strpos($category, "B") !== false ? "checked" : ""?> id="B" value="B"/>
        <label for="A">A</label>
        <input type="checkbox" name="category[]" <?=strpos($category, "A") !== false ? "checked" : ""?> id="A" value="A"/>
        <label for="C">C</label>
        <input type="checkbox" name="category[]" <?=strpos($category, "C") !== false ? "checked" : ""?> id="C" value="C"/>
    </fieldset>
    <input type="submit" name="submit-cv" value="Generate CV"/>
</form>
<br/>
<div id="result">
    <?php
    if(isset($_POST['submit-cv'])) {
        function validateFields($firstName, $lastName, $email, $phone, $company, $programmingLanguages, $speakingLanguages)
        {
            $error = false;
            $namesPattern = '/^[A-za-z ]{2,20}$/';
            $emailPattern = '/^[^@.]+@[^@.]+\.[^@.]+$/';
            $companyPattern = '/^[A-Za-z0-9 ]{2,20}$/';
            $phonePattern = '/^(\+{0,}[\d- ]+)$/';

            if (!preg_match($namesPattern, $firstName)) {
                echo "<div>Invalid first name: {$firstName}.</div>";
                $error = true;
            }
            if (!preg_match($namesPattern, $lastName)) {
                echo "<div>Invalid last name: {$lastName}.</div>";
                $error = true;
            }
            if(!preg_match($emailPattern, $email)){
                echo "<div>Invalid email: {$email}.</div>";
                $error = true;
            }
            if(!preg_match($phonePattern, $phone)){
                echo "<div>Invalid phone number: {$phone}.</div>";
                $error = true;
            }
            if(!preg_match($companyPattern, $company)){
                echo "<div>Invalid company name: {$company}.</div>";
                $error = true;
            }
            $languages = array_merge($programmingLanguages, $speakingLanguages);
            foreach ($languages as $language) {
                if (!preg_match($namesPattern, $language)) {
                    echo "<div>Invalid language name: $language.</div>";
                    $error = true;
                    break;
                }
            }
            return !$error;
        }

        if(validateFields($firstName, $lastName, $email, $phone, $company, $programmingLanguages, $speakingLanguages)) {
            $personalInfoTable =
                "<table><thead><tr><th colspan='2''>Personal Information</th></tr></thead><tbody>" .
                "<tr><td>First Name</td><td>$firstName</td></tr>" .
                "<td>Last Name</td><td>$lastName</td></tr>" .
                "<tr><td>Email</td><td>$email</td></tr>" .
                "<tr><td>Phone Number</td><td>$phone</td></tr>" .
                "<tr><td>Gender</td><td>$gender</td></tr>" .
                "<tr><td>Birth Date</td><td>$birthDate</td></tr>" .
                "<tr><td>Nationality</td><td>$nationality</td></tr></tbody></table>";

            $lastWorkTable =
                "<table><thead><tr><th colspan='2'>Last Work Position</th></tr></thead><tbody>" .
                "<tr><td>Company Name</td><td>$company</td></tr>" .
                "<tr><td>From</td><td>$workedFrom</td></tr>" .
                "<tr><td>To</td><td>$workedTo</td></tr></tbody></table>";

            $computerSkillsTable =
                "<table><thead><tr><th colspan='2'>Computer Skills</th></tr></thead><tbody>" .
                "<tr><td>Programming Languages</td>" .
                "<td><table><thead><tr><th>Language</th><th>Skill Level</th></tr></thead>" .
                "<tbody>";
            for($i = 0; $i < count($levelProgramming); $i++) {
                $computerSkillsTable .=
                    "<tr><td>$programmingLanguages[$i]</td><td>$levelProgramming[$i]</td></tr>";
            }
            $computerSkillsTable .=
                "</tbody></table></tr>" .
                "</tbody></table>";

            $otherSkills =
                "<table><thead><tr><th colspan='2''>Other Skills</th></tr></thead><tbody>" .
                "<tr><td>Languages</td>" .
                "<td><table><thead><th>Language</th><th>Comprehension</th><th>Reading</th><th>Writing</th></tr>";
            for($i = 0; $i < count($comprehension); $i++) {
                $otherSkills .=
                    "<tr><td>$speakingLanguages[$i]</td><td>$comprehension[$i]</td><td>$reading[$i]</td><td>$writing[$i]</td>";
            }
            $otherSkills .= "</tbody></table></tr>" .
                "<tr><td>Driver`s License</td><td>$category</td></tr></tbody></table>";

            echo "<h1>CV</h1>";
            echo $personalInfoTable;
            echo $lastWorkTable;
            echo $computerSkillsTable;
            echo $otherSkills;
        }
    }
    ?>
</div>
</body>
</html>