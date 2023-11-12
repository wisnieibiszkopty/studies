<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
    $languages = $_POST['technologies'];

    if(isset($languages) && is_array($languages)){
        $orders = [];

        // opening file
        $ordersFromFile = file('orders.txt') or die("Cannot open file!");

        // making associative array to store language and count from file
        foreach($ordersFromFile as $order){
            $index = strpos($order, ":");
            $lang = trim(substr($order, 0, $index));
            $count = trim(substr($order, $index+1));
            $orders[$lang] = $count;
        }

        // incrementing count
        foreach($languages as $language){
            $orders[$language] += 1;
        }
?>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Language</th>
                <th scope="col">Orders</th>
            </tr>
        </thead>
        <tbody>
<?php
        // showing orders
        $i = 1;
        foreach($orders as $key => $value){
            echo "<tr>
                <td>$i</td>
                <td>$key</td>
                <td>$value</td>
            </tr>";
            $i++;
        }

        echo "</tbody></table>";


        // saving file
        $file = fopen("orders.txt", 'w');
        foreach($orders as $key => $value){
            $newline = "$key:$value\n";
            fwrite($file, $newline);
        }
        fclose($file);

    } else {
        echo "Data is not valid<br>";
    }
?>
</body>
</html>