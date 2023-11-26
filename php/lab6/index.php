<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="static/script.js"></script>
</head>
<body>
<div class="center">
    <form method="post" action="index.php">
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
                        <option value="Polska" selected="selected">Polska</option>
                        <option value="Wielka Brytania">Wielka Brytania</option>
                        <option value="Niemcy">Niemcy</option>
                        <option value="Czechy">Czechy</option>
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
    include_once "classes/Database.php";
    include_once "utils.php";

    function add(Database $database): void{
        // czemu on szuka funkcji w innym folderze w ogóle 😭
        // spytaj sie ziuta o to
        $data = validateClient();

        if(count($data) != 0){
            // formularz przeszedł walidacje            
            var_dump($data);
            if($database->save([
                $data['name'],
                $data['age'],
                $data['country'],
                $data['email'],
                implode(',', $data['languages']),
                $data['payment']
            ])){
                echo "Udało się dodać klienta.";
            } else {
                echo "Wystąpił problem przy dodawaniu klienta";
            }
        }
        show($database);
    }

    function show(Database $database): void{
        echo "<table><thead>
            <tr>
                <th>ID</th>
                <th>Nazwisko</th>
                <th>Wiek</th>
                <th>Kraj</th>
                <th>Email</th>
                <th>Zamówienia</th>
                <th>Płatność</th>
                <th></th>
            </tr>
        </thead><tbody>";
        // remaining part of table
        echo $database->select("SELECT * FROM clients;", ['Id', 'Name', 'Age', 'Country', 'Email', 'Order', 'Payment']);
    }

    function delete(Database $database): void {

        if($database->delete("clients", "Id", '10')){
            echo "Usunięto rekord z bazy danych.";
        } else {
            echo "Nie udało się usunąć rekordu z bazy danych.";
        }
        show($database);
        http_response_code(200);
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
            case 'delete':
                delete($db);
                break;
            default:
                echo "Nieprawidłowe dane";
        }
    }

?>
</body>
</html>