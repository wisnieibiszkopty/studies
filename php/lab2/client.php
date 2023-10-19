<?php
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $age = $_REQUEST["age"];
    $country = $_REQUEST["country"];

    echo "<h2>Dane klienta: </h2>";
    echo "<p>Nazwisko: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Wiek: $age</p>";
    echo "<p>Kraj: $country</p>";
?>