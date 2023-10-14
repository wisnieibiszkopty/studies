<!DOCTYPE html>
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
    <div>
        <?php
        function gallery($rows, $cols){
            $itr = 1;
            for($i=0; $i<$rows; $i++){
                for($j=0; $j<$cols; $j++){
                    echo "<img src='grafika/zdjecia/obraz$itr.JPG'>";
                    $itr++;
                }
                echo '<br>';
            }
        }

        gallery(2, 4);
        ?>
    </div>

</body>
</html>