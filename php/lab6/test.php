<?php
include_once "classes/User.php";

session_start();

// $_SESSION['username'] = 'barti';
// $_SESSION['fullname'] = 'Barti Stero';
// $_SESSION['email'] = 'barti@pollub.pl';
// $_SESSION['status'] = 'ADMIN';

$user = new User('barti', 'Barti Stero', 'barti@pollub.pl', 'Haslo123');
$_SESSION['user'] = serialize($user);

$id = session_id();
echo "<h1>Session id: $id</h1>";

echo "<h1>Session: </h1>";
foreach($_SESSION as $val){
    echo "<p>$val</p>";
}

echo "<h1>Cookies: </h1>";
foreach($_COOKIE as $val){
    echo "<p>$val</p>";
}

?>

<a href="test2.php">Next page CLICK</a>