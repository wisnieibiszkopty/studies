<?php
function saveToFile($filename, $dataArray): void{
    echo 'zapisano do pliku';
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
    $file = fopen($filename, "a") or die("Cannot open file");
    fwrite($file, $data) or die("Cannot write to a file");
    fclose($file);

    echo "<p>Zapisano: <br> $data </p>";
}

function validate(): void{
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
        saveToFile("data.txt", $data);
    } else {
        echo $errors;
        echo "<h1 style='color: red'>Niepoprawne dane</h1>";
    }
}

function save(): void{
    echo '<h3>Dodawanie pliku</h3>';
    validate();
}

function printTable($orders){
    echo "<div class='form-item'><table>
            <thead>
                <tr>
                    <th>Nazwisko</th>
                    <th>Wiek</th>
                    <th>Kraj</th>
                    <th>Email</th>
                    <th>Płatność</th>
                </tr>
            </thead><tbody>";
    foreach ($orders as $order){
        $array = explode(" ", $order);
        echo "<tr><td>$array[0]</td>";
        echo "<td>$array[1]</td>";
        echo "<td>$array[2]</td>";
        echo "<td>$array[3]</td>";
        echo "<td>$array[5]</td></tr>";
    }
    echo "</tbody></table></div>";
}

function show(): void{
    $orders = file("data.txt");
    printTable($orders);
}

function showOnly($filter): void{
    $filter = $filter . ',';
    $orders = file("data.txt");
    $filterOrders = array();
    foreach ($orders as $order){
        if(str_contains($order, $filter)){
            $filterOrders[] = $order;
        }
    }
    printTable($filterOrders);
}

function showStatistics(): void{
    $ordersCount = 0;
    $childCount = 0;
    $elderCount = 0;
    $orders = file("data.txt");
    foreach ($orders as $order){
        $startIndex = strpos($order, " ");
        $endIndex = strpos($order, " ", strpos($order, " ") + 1);
        $age = substr($order, $startIndex+1, $endIndex - $startIndex - 1);

        if($age < 18) $childCount++;
        if($age > 49) $elderCount++;
        $ordersCount++;
    }

    // pretify later
    echo "Liczba wszystkich zamówień: $ordersCount<br>";
    echo "Liczba zamówień od osób w wieku < 18 lat: $childCount<br>";
    echo "Liczba zamówień od osób w wieku >= 50: $elderCount<br>";
}

?>
