<?php
    echo "<h1>Formularz 3</h1>";
    foreach ($_REQUEST['languages'] as $language){
        echo "<h2>$language</h2>";
    }

    echo "<h1>Checkbox z join: </h1><br>";
    $checkboxes = join(" | ", $_REQUEST['languages']);
    echo "<h2>$checkboxes</h2>";

    echo "<h1>Var dump</h1>";
    foreach($_REQUEST as $key => $value){
        if(is_array($value)){
            echo "<h3>Tablica</h3>";
            foreach($value as $v){
                echo "<h4>$v</h4>";
            }
        } else {
            echo "<h3>$key => $value</h3>";
        }
    }
?>
