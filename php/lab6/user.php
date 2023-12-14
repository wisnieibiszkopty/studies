<?php

include_once 'classes/UserManager.php';
include_once 'classes/Database.php';

$userManager = new UserManager();
$database = new Database('localhost', 'root', '', 'clients');

if(isset($_COOKIE[session_name()]) ) {
    session_start();
    $id = session_id();
    $user = $userManager->getLoggedInUser($database, session_id());
    if($user !== null){
        echo "<h1>Succesfully logged in!</h1>";
        echo "<h2>User id: $user->id</h2>";
        echo "<p>Username: $user->userName</p>";
        echo "<p>Fullname: $user->fullName</p>";
        echo "<p>Email: $user->email</p>";
        echo "<form method='POST' action='auth.php'><input type='submit' name='submit' value='logout'></form>";
    } else {
        header("location:login.php");
    }
} else {
    header("location:login.php");
}