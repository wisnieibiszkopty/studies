<?php
    include_once "classes/UserManager.php";
    include_once "classes/Database.php";

    $userManager = new UserManager();
    $db = new Database("localhost", "root", "", "clients");

    if(isset($_POST['login'])) {
        $id = $userManager->login($db);
        if ($id == -1) {
            echo "<h1>Wrong username or password!</h1>";
            include "login.php";
        } else {
            echo "<h1>Succesfully logged in!</h1>";
            echo "<h2>User id: $id</h2>";
            echo "<form method='POST' action='auth.php'><input type='submit' name='submit' value='logout'></form>";
        }
    } else if($_POST['submit'] == "logout"){
        echo "siema";
        $userManager->logout($db);
        //header("location:login.php");
    } else {
        //header("location:login.php");
    }
?>