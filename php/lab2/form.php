<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
<form method="post" action="receive4.php">
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
        $languages = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];
        foreach ($languages as $language){
            echo "<input name='languages[".$language."]' type='checkbox' value='$language'><label for='$language'>$language</label>";
        }
    ?>
    <h4>Sposób zapłaty:</h4>
    <p><input name="payment" id="euro" type="radio" value="euro"/><label for="euro">eurocard</label>
        <input name="payment" id="visa" type="radio" value= "visa"/><label for="visa">visa</label>
        <input name="payment" id="przelew" type="radio" value="przelew"/><label for="przelew">przelew</label>
        <br>
        <input type="submit" value="Wyślij"/>
        <input type="reset" value="Anuluj"/></p>
</form>
</body>
</html>