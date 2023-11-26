<?php

function validateClient(): array{
    $args = [
        'name' => ['filter' => FILTER_VALIDATE_REGEXP,
                    'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']],
        'age' => ['filter' => [FILTER_VALIDATE_INT, FILTER_SANITIZE_FULL_SPECIAL_CHARS]],
        'country' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => ['filter' => [FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_FULL_SPECIAL_CHARS]],
        'languages' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                        'flags' => FILTER_REQUIRE_ARRAY],
        'payment' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'submit' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ];

    $data = filter_input_array(INPUT_POST, $args);

    $errors = '';
    foreach ($data as $key => $val){
        if($val === false or $val === NULL){
            $errors .= $key . " ";
        }
    }

    if($errors === ''){
        return $data;
    } else {
        echo $errors;
        echo "<h1 style='color: red'>Niepoprawne dane</h1>";
        return [];
    }
}