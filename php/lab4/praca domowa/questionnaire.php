<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
<form method="post" action="results.php">
    <?php
    $technologies = ["C", "CPP", "Java", "C#", "Html", "CSS", "XML", "PHP", "Javascript"];

    foreach ($technologies as $tech){
        echo "<input name='technologies[".$tech."]' type='checkbox' value='$tech'>
        <label for='$tech'>$tech</label><br>";
    }
    ?>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
