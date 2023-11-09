<?php
    echo 'dzialam<br>';

//    if(filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_FULL_SPECIAL_CHARS) &&
//        filter_input(INPUT_POST, 'technologies', ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, 'flags' => FILTER_REQUIRE_ARRAY])){
//    }

    $filelines = fopen("data.txt", "a") or die("Cannot open file");

    foreach ($filelines as $line){
        $index = strpos($line, " ");
        $count = substr($line, $index, -1);
    }

    fclose($filelines);

    foreach ($_POST['technologies'] as $key => $value){
        echo "$key => $value<br>";
    }
?>