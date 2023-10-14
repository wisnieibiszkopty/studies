<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="static/style.css">
</head>
<body>
    <?php

        function showVar($var){
            echo is_array($var) ? "<p>Zmienna: ".implode($var).", Wartość: ".count($var)."</p>"
                : "<p>Zmienna: $$var, Wartość: $var</p>";
            echo "<br>Bool: ".var_dump(is_bool($var));
            echo "<br>Int: ".var_dump(is_int($var));
            echo "<br>Numeric: ".var_dump(is_numeric($var));
            echo "<br>String: ".var_dump(is_string($var));
            echo "<br>Array: ".var_dump(is_array($var));
            echo "<br>Object: ".var_dump(is_object($var));
        }

        function compare($x, $y){
            echo '<p>Operator == '.var_dump(($x == $y)).'</p><br>';
            echo '<p>Operator === '.var_dump(($x === $y)).'</p><br>';
        }

        function checkDumpAndR($var){
            echo "<p>Dump: ".var_dump($var)."</p>";
            echo "<p>print_r: ".print_r($var, true)."</p>";
        }

        // variables

        $v1 = 1234;
        $v2 = 567.789;
        $v3 = 1;
        $v4 = 0;
        $v5 = true;
        $v6 = "0";
        $v7 = "Typy w PHP";
        $v8 = [1, 2, 3, 4];
        $v9 = [];
        $v10 = ["zielony", "czerwony", "niebieski"];
        $v11 = ["Agata", "Agatowska", 4.67, true];
        $v12 = new DateTime();
        $v13 = $v12->format('Y-m-d H:i:s');

        $variables = [$v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $v13];

        foreach ($variables as $var){
            showVar($var);
            checkDumpAndR($var);
        }

        compare(1, true);
        compare(0, "0");
    ?>
</body>
</html>