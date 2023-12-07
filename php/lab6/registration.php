<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
    <style>
        .form-item{
            width: 80vw;
            margin-left: 10vw;
        }
    </style>
</head>
<body>
    <h1>Rejstracja</h1>
<?php
    include_once 'classes/User.php';
    include_once 'classes/Registration.php';
    include_once 'classes/Database.php';

    $rf = new Registration();
    $db = new Database('localhost', 'root', '', 'clients');

    if(filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
        $user = $rf->checkUser();
        if($user === NULL){
            echo "<h1>Niepoprawne dane rejestracji</h1><br>";
        } else {
            echo "<h1>Poprawne dane rejestracji</h1><br>";
            $user->saveDB($db);
            $user->getAllUsersFromDB($db);
        }
    }

?>
</body>
</html>