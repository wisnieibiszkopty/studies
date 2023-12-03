<?php
include_once "classes/User.php";

session_start();

// $_SESSION['username'] = 'barti';
// $_SESSION['fullname'] = 'Barti Stero';
// $_SESSION['email'] = 'barti@pollub.pl';
// $_SESSION['status'] = 'ADMIN';

if(isset($_SESSION['user'])){
    $sessionUser = $_SESSION['user'];
    echo "<h1>Wartość user: $sessionUser</h1>";
    $user = unserialize($sessionUser);
    $user->show();
}

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

session_unset();
if ( isset($_COOKIE[session_name()]) ) {
    setcookie(session_name(),'', time() - 42000, '/');
}
session_destroy();

echo "<a href='test.php'>Go back</a>";

?>