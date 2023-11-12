<?php
    echo '<h1>Images</h1>';

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename(($_FILES["image"]["name"]));
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if(isset($_POST["save"])){
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check == false){
            echo "Wrong file format";
            $uploadOk = 0;
        } else {
            echo "Uploaded image: " .$check["mime"];
            $uploadOk = 1;
        }
    }

    if(file_exists($targetFile)){
        echo "Sorry, file already exists";
        $uploadOk = 0;
    }

    if($imageFileType != 'jpg' && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif"){
        $uploadOk = 0;        
    }

    if($uploadOk == 1){
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
        copy($targetFile, 'copy/' . basename(($_FILES["image"]["name"])));
    }


    echo '<a href="images.html">Go back</a><br>';
?>
