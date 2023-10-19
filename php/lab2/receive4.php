<?php
    $payment =htmlspecialchars($_REQUEST["payment"]);
    $languages =htmlspecialchars($_REQUEST["languages"]);
    $name = htmlspecialchars($_REQUEST["name"]);
    $email = htmlspecialchars($_REQUEST["email"]);
    $age = htmlspecialchars($_REQUEST["age"]);
    $country = htmlspecialchars($_REQUEST["country"]);

    if(isset($payment) && isset($languages) && isset($name) && isset($age) && isset($email) && isset($country)){
        echo "<h2>Zamowione produkty: </h2>";
        $checkboxes = join(" | ", $languages);
        echo "<h3>$checkboxes</h3>";
        echo "<h2>Sposób zapłaty: </h2><h3>".$payment."</h3>";
        echo "<h1><a href='client.php?name=$name&email=$email&age=$age&country=$country'>Dane klienta: </a></h1>";
    } else {
        echo "<h2>Nie podano wymaganych danych.</h2>";
        echo "<a href='form.php'>Wypełnij formularz jeszcze raz</a>";
    }

?>