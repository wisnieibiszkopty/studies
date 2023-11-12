<?php
    function consoleLog($text): void{
        echo "<script>console.log(".$text.")</script>";
    }

    if (isset($_POST['save']) && $_POST['save'] == 'save' && !isset($_GET['pic'])) {
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            $type = $_FILES['image']['type'];
            if ($type === 'image/jpeg' || $type === 'image/png' || $type === 'image/gif') {

                move_uploaded_file($_FILES['image']['tmp_name'],'./images/'.$_FILES['image']['name']);
                $link =  $_FILES['image']['name'];
                $random = uniqid('img_'); //wygenerowanie losowej wartości
                $image =  './images/' . $random . '.jpg';
                copy('./images/' . $link, $image); //utworzenie kopii zdjęcia

                list($width, $height) = getimagesize($image); //pobranie rozmiarów obrazu
                $wdth = $_POST['width']; //wysokość preferowana przez użytkownika
                $hght = $_POST['height']; //szerokość preferowana przez użytkownika
                $widthScale = 1;
                $heightScale = 1;
                $scale = 1;
                if ($width > $wdth) $widthScale = $wdth / $width;
                if ($height > $hght) $heightScale = $hght / $height;
                if ($heightScale <= $widthScale) $scale = $heightScale;
                else $scale = $widthScale;
                //ustalenie rozmiarów miniaturki tworzonego zdjęcia:
                $newH = $height * $scale;
                $newW = $width * $scale;

                header('Content-Type: image/jpeg');
                $new = imagecreatetruecolor($newW, $newH);
                $picture = imagecreatefromjpeg($image);
                imagecopyresampled($new, $picture, 0, 0, 0, 0, $newW, $newH, $width, $height);
                imagejpeg($new, './mini/mini-' . $link, 100);
                imagedestroy($new);
                imagedestroy($picture);
                unlink($image);

                $length = strlen($link);
                $length -= 4;
                $link = substr($link, 0, $length);
                echo "link: $link <br>";
                header('location:images.php?pic=' . $link);
            } else {
                header('location:images.html');
            }
        }
    }

    if(isset($_GET['pic']) && !empty($_GET['pic'])){
        consoleLog("dziala");

        echo '<div class="background"><div class="flex"><div class="box"><a href="./images/'. $_GET['pic'] .'.jpg">Image</a><br></div>';
        echo '<div class="box"><a href="./mini/mini-'. $_GET['pic'] .'.jpg">Miniature</a><br></div>';
        echo '<div class="box"><a href="images.html">Go back</a><br></div></div></div>';
    }
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,400;1,700&family=Noto+Sans+KR:wght@400;900&family=Poppins&family=Sora&family=Ubuntu:wght@500&display=swap');

    body{
        margin: 0;
    }

    .background{
        background-image: linear-gradient(110deg, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%);
        width: 100vw;
        height: 100vh;
    }

    .flex{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        position: absolute;
        top: 40vh;
        width: 100%;
    }

    .box{
        width: 15vw;
        height: 20vh;
        border-radius: 50px;
        background-image: linear-gradient(110deg, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    a{
        color: black;
        text-decoration: none;
        font-size: 150%;
        font-family: 'Josefin Sans', sans-serif;
        font-family: 'Noto Sans KR', sans-serif;
        font-family: 'Poppins', sans-serif;
        font-family: 'Sora', sans-serif;
        font-family: 'Ubuntu', sans-serif;
    }
</style>