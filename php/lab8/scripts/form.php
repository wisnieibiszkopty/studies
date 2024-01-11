<?php
function showForm(){
    $content = '
        <form method="post" action="scripts/form.php">
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
            echo "<input name="languages[".$language."]" type="checkbox" value="$language"><label for="$language">$language</label>";
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
    ';

    return $content;
}

function validate(){
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

    $errors = '';
    foreach ($data as $key => $val){
        if($val === false or $val === NULL){
            $errors .= $key . " ";
        }
    }

    if($errors === ''){
        return $data;
    } else {
        echo $errors;
        echo "<h1 style='color: red'>Niepoprawne dane</h1>";
        return [];
    }
}

function insert($db){
    $data = validate();

    if(count($data) != 0){
        // formularz przeszedł walidacje
        if($db->save([
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
}

include_once "classes/Database.php";
$title = "Formularz zamówień";
$content = showForm();

$database = new Database("localhost", "root", "", "clients");

if(filter_input(INPUT_POST, 'submit')) {
    $action = filter_input(INPUT_POST, "submit");

    switch($action){
        case 'add': insert($database);
        break;
        case 'show': $content = $database->select("select * from clients", ['email', 'order']);
    }
}