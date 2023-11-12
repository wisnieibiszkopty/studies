<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form method="post" action="files.php">
    <article>
        <div class="form-item">
            <div class="input">
                <label class="mg-left" for="name">Nazwisko</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="input">
                <label class="mg-left" for="age">Wiek</label>
                <input type="age" name="age" size="30" id="age">
            </div>
            <div class="input">
                <label class="mg-left" for="country">Państwo</label>
                <select name="country" id="country">
                    <option value="pl" selected="selected">Polska</option>
                    <option value="gb">Wielka Brytania</option>
                </select>
            </div>
            <div class="input">
                <label class="mg-left" for="email">Adres e-mail</label>
                <input name="email" size ="30" id="email">
            </div>
        </div>
        <div class="form-item">
        <h4>Sposób zapłaty:</h4>
        <p><input name="payment" id="euro" type="radio" value="euro"/><label for="euro">eurocard</label>
            <input name="payment" id="visa" type="radio" value= "visa"/><label for="visa">visa</label>
            <input name="payment" id="przelew" type="radio" value="przelew"/><label for="przelew">przelew</label>
            <br>
        </div>
    </article>
    <article>
    <div class="form-item">
        <h4>Zamawiam tutorial z języka:</h4>
        <?php
        $languages = ["c", "cpp", "java", "c#", "html", "css", "xml", "php", "javascript"];
        foreach ($languages as $language){
            echo "<input name='languages[".$language."]' type='checkbox' value='$language'>
                <label for='$language'>$language</label>";
        }

        ?>
        </div>
        <div class="form-item">
            <div class="border-gradient"><input type="submit" name="submit" value="clear"></div>
            <div class="border-gradient"><input type="submit" name="submit" value="save"></div>
            <div class="border-gradient"><input type="submit" name="submit" value="show"></div>
            <div class="border-gradient"><input type="submit" name="submit" value="php"></div>
            <div class="border-gradient"><input type="submit" name="submit" value="cpp"></div>
            <div class="border-gradient"><input type="submit" name="submit" value="java"></div>
            <div class="border-gradient"><input type="submit" name="submit" value="statistics"></div>
        </div>
    </article>
</form>
<?php
    include_once "utils.php";

    if(filter_input(INPUT_POST, 'submit')){
        switch(filter_input(INPUT_POST, 'submit')){
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
            case 'statistics':
                showStatistics();
                break;
            default:
                echo "";
        }
        $_POST['submit'] = '';
    }

//    // 3.3
//    foreach ($_SERVER as $key => $value){
//        echo $key." = ".$value."<br>";
//    }
?>
</body>
</html>