<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
<form method="post" action="files.php">
    <table>
        <tr> <td>Nazwisko: </td>
            <td><input name="name" size="30" id="name"/><label for="name"></label></td>
        </tr>
        <tr> <td>Wiek:</td>
            <td><input name="age" size="30" id="age"/><label for="age"></label></td>
        </tr>
        <tr> <td>Państwo:</td>
            <td><select name="country" id="country">
                    <option value="pl" selected="selected">Polska</option>
                    <option value="gb">Wielka Brytania</option>
                </select><label for="country"></label>
            </td>
        </tr>
        <tr> <td>Adres e-mail: </td>
            <td><input name="email" size ="30" id="email"/><label for="email"></label></td>
        </tr>
    </table>
    <h4>Zamawiam tutorial z języka:</h4>
    <?php
    $languages = ["c", "cpp", "java", "c#", "html", "css", "xml", "php", "javascript"];
    foreach ($languages as $language){
        echo "<input name='languages[".$language."]' type='checkbox' value='$language'><label for='$language'>$language</label>";
    }
    ?>
    <h4>Sposób zapłaty:</h4>
    <p><input name="payment" id="euro" type="radio" value="euro"/><label for="euro">eurocard</label>
        <input name="payment" id="visa" type="radio" value= "visa"/><label for="visa">visa</label>
        <input name="payment" id="przelew" type="radio" value="przelew"/><label for="przelew">przelew</label>
        <br>
        <input type="submit" name="submit" value="clear">
        <input type="submit" name="submit" value="save">
        <input type="submit" name="submit" value="show">
        <input type="submit" name="submit" value="php">
        <input type="submit" name="submit" value="cpp">
        <input type="submit" name="submit" value="java">
</form>
<?php
    include_once "utils.php";

    $value = $_POST['submit'];
    $_POST['submit'] = '';

    switch($value){
        case 'save':
            save();
            break;
        case 'show':
            show();
            break;
        case 'php':
            showOnly('php');
            break;
        case 'cpp':
            showOnly('cpp');
            break;
        case 'java':
            showOnly('java');
            break;
        default:
            echo "";
    }

//    // 3.3
//    foreach ($_SERVER as $key => $value){
//        echo $key." = ".$value."<br>";
//    }
?>
</body>
</html>