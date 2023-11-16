<style>
    @import "styles.css";
</style>

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
        }
    }

    // 5.3

    User::getAllUsers();

?>