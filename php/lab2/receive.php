<?php
    function validateData($data, $name): void
    {
        if(isset($_POST[$data]) && ($_POST[$data] != "")){
            $var = htmlspecialchars(trim($_POST[$data]));
            echo '<p>'.$name.': '.$var.'</p>';
        } else{
            echo '<p>Niepoprawne dane!</p>';
        }
    }

    function validateCheckbox($data, $name): void{
        if(isset($_POST[$data]) && ($_POST[$data] != "")){
            $var = htmlspecialchars(trim($_POST[$data]));
            echo '<p>'.$name.': '.$var.'</p>';
        }
    }

    $values['Nazwisko'] = 'name';
    $values['Wiek'] = 'age';
    $values['Państwo'] = 'country';
    $values['Email'] = 'email';
    $checkboxes['Php'] = 'php';
    $checkboxes['C'] = 'c';
    $checkboxes['Java'] = 'java';
    $values['Płatność'] = 'payment';

    foreach ($values as $key => $value){
        validateData($value, $key);
    }
    foreach ($checkboxes as $key => $value){
        validateCheckbox($value, $key);
    }
?>

