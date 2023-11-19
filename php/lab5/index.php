<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
    include_once 'classes/User.php';
    include_once 'classes/RegistrationForm.php';

    // 5.1

//    $u1 = new User('km', 'Kamil Wodowski', 's97766@pollub.edu.pl', 'haslo123');
//    $u2 = new User('pw', 'Paweł Wiński', 's97765@pollub.edu.pl', 'haslo123456');
//
//    $u1->show();
//    $u2->show();

    $rf = new RegistrationForm();

    if(filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
        $user = $rf->checkUser();
        if($user === NULL){
            echo "<h1>Niepoprawne dane rejestracji</h1><br>";
        } else {
            echo "<h1>Poprawne dane rejestracji</h1><br>";
            $user->show();
            $user->save("users.json");
            $user->saveXML("users.xml");
            $user->saveToDatabase();
        }
    }

    // 5.3

    echo "<h1>Użytkownicy z pliku json: </h1><br>";
    User::getAllUsers();

    // 5.4

    echo "<h1>Użytkownicy z pliku xml: </h1><br>";
    User::getAllUsersFromXML();

    // Wyświetlanie rekordów z bazy danych
    User::findInDatabase();
?>
</body>
</html>