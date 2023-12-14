<?php
include_once "classes/UserManager.php";
include_once "classes/Database.php";

$userManager = new UserManager();
$db = new Database("localhost", "root", "", "clients");

if(isset($_POST['login'])) {
    $user = $userManager->login($db);
    if ($user->id == -1) {
        echo "<h1>Wrong username or password!</h1>";
        include "login.php";
    } else {
        header("location:user.php");
    }
} else if($_POST['submit'] == "logout"){
    $userManager->logout($db);
    header("location:login.php");
} else {
    header("location:login.php");
}
?>