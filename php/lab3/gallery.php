<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,400;1,700&family=Noto+Sans+KR:wght@400;900&family=Poppins&family=Sora&family=Ubuntu:wght@500&display=swap');

        *{
            font-family: 'Josefin Sans', sans-serif;
            font-family: 'Noto Sans KR', sans-serif;
            font-family: 'Poppins', sans-serif;
            font-family: 'Sora', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }
        img{
            padding: 15px;
            margin: 5px;
            border-radius: 10px;
            transition: all 0.2s ease-in-out;
        }

        img:hover{
            background-color: #f0f0f0;
            /*filter: brightness(50%);*/
            transform: scale(1.05);
            overflow: hidden;
        }

        .flex{
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
        }
    </style>
</head>
<body>
    <h1>Gallery</h1>
    <div class='grid'>
    <?php
        $dir = './images';
        if(is_dir($dir)){
            if($handle = opendir($dir)){
                while(false !== ($file = readdir($handle))){
                    if ($file != '.' && $file != '..'){
                        echo '<a href="./images/'. $file .'"><img class="img" src="./mini/mini-'. $file .'"></a>';
                    }
                }
                closedir($handle);
            }

            $count = count(scandir($dir)) - 2;
            echo "</div><h2>There are $count images in gallery now.</h2>";
        }
    ?>
    <a href="images.html">Go back</a>
</body>
</html>