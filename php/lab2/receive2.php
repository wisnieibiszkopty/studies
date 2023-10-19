<?php
    foreach ($_REQUEST as $key => $value) {
        echo "<p>$key: ".var_dump($value)."</p>";
    }
?>