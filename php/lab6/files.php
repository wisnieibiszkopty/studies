<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<div class="center">
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
                <div class="border-gradient"><input type="submit" name="submit" value="add"></div>
                <div class="border-gradient"><input type="submit" name="submit" value="show"></div>
            </div>
        </article>
    </form>
</div>
<?php
    include_once "Database.php";

    function add(Database $database): void{
        $args = [
            'name' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']],
            'age' => ['filter' => [FILTER_VALIDATE_INT, FILTER_SANITIZE_FULL_SPECIAL_CHARS]],
            'country' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'email' => ['filter' => [FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_FULL_SPECIAL_CHARS]],
            'languages' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'flags' => FILTER_REQUIRE_ARRAY],
            'payment' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'submit' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ];

        $data = filter_input_array(INPUT_POST, $args);
        var_dump($data);

        $errors = '';
        foreach ($data as $key => $val){
            if($val === false or $val === NULL){
                $errors .= $key . " ";
            }
        }

        if($errors == ''){
            echo $data['languages'];
            $sql = "INSERT INTO clients " .
                " (`Id`, `Name`, `Age`, `Country`, `Email`, `Order`, `Payment`)" .
                " VALUES( " .
                NULL . ", '" . $data['name'] . "', '" . $data['age'] . "', '" .
                $data['country'] . "', '" . $data['email'] . "', '" . implode(',',$data['languages']) . "', '" .$data['payment'] . "');";

            if($database->save($sql)){
                echo "<h1>Dodano rekord do bazy danych</h1>";
            }

        } else {
            echo "<h1>Niepoprawne dane</h1>";
        }

    }

    function show(Database $database): void{
        echo $database->select("SELECT * FROM clients;", ['Name', 'Age', 'Country', 'Email', 'Order', 'Payment']);
    }

    $db = new Database("localhost", "root", "", "clients");
    if(filter_input(INPUT_POST, "submit")){
        switch(filter_input(INPUT_POST, 'submit')){
            case 'add':
                add($db);
                break;
            case 'show':
                show($db);
                break;
            default:
                echo "Nieprawidłowe dane";
        }
    }

?>
</body>
</html>