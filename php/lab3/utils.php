<?php
function save(): void{
    // creating data string
    $data = "";
    foreach ($_POST as $key => $value) {
        if(is_array($value)){
            $data .= implode(",", $value) . " ";
        } else {
            $data .= $value . " ";
        }
    }
    $data .="\n";

    // saving data
    $file = fopen("data.txt", "a") or die("Cannot open file");
    fwrite($file, $data) or die("Cannot write to a file");
    fclose($file);
}

function show(): void{
    $orders = file("data.txt");
    foreach ($orders as $order){
        echo $order."<br>";
    }
}

function showOnly($filter): void{
    $filter = $filter . ',';
    $orders = file("data.txt");
    foreach ($orders as $order){
        if(str_contains($order, $filter)){
            echo $order."<br>";
        }
    }
}
?>
