<?php

class Database{
    private mysqli $database;

    public function __construct($server, $user, $password, $database){
        $this->database = new mysqli($server, $user, $password, $database);
        if($this->database->connect_errno){
            echo "Wystąpił błąd" . $database->connect_error;
            exit();
        }
    }

    public function __destruct(){
        $this->database->close();
    }

    public function query($sql): bool{
        if($this->database->query($sql)) return true; else return false;
    }

    public function find($sql){
        if($result = $this->database->query($sql)){
            $count = $result->num_rows;
            if($count == 1) {
                $row = $result->fetch_object();
                return json_encode($row);
            }
        }

        return json_encode(array("id" => -1));
    }

    public function select($sql, $params): string{
        $html = "";
        if($result = $this->database->query($sql)){
            $count = count($params);
            while($row = $result->fetch_object()){
                $field = $params[0];
                $id = $row->$field;
                $html .= "<tr>";
                for($i=0; $i<$count; $i++){
                    $field = $params[$i];
                    $html .= "<td>" . $row->$field . "</td>";
                }
                $html .= "<td><form action='index.php' method='post'>" .
                    "<input type='hidden' name='id' value='$id'>" .
                    "<input type='submit' name='submit' value='delete'>" .
                    "</form></td>";
                $html .= "</tr>";
            }
            $html .= "</tbody></table>";
            $result->close();
        }

        return $html;
    }

    public function selectUser(string $login, string $password, string $table): string{
        $id = -1;
        $sql = "SELECT * FROM $table WHERE userName='$login';";

        if($result = $this->database->query($sql)){
            $count = $result->num_rows;
            if($count == 1) {
                $row = $result->fetch_object();
                $hash = $row->passwd;
                if(password_verify($password, $hash)){
                    return json_encode($row);
                }
            }
        }

        return json_encode(array("id" => $id));
    }

    public function getAll(String $table): mysqli_result | null{
        $sql = "SELECT * FROM $table";
        $results = $this->database->query($sql);
        if($results->num_rows > 0){
            return $results;
        }
        return null;
    }

    // póki co funkcja odnosi się jedynie do tabeli clients,
    // użycie bind_param w ogólnym przypadku jest za
    // trudne żebym się teraz z tym męczył
    public function save($values): bool{
        $stmt = $this->database->prepare("INSERT INTO clients VALUES (NULL, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sissss", $name, $age, $country, $email, $orders, $payment);
        $name = $values[0];
        $age = $values[1];
        $country = $values[2];
        $email = $values[3];
        $orders = $values[4];
        $payment = $values[5];
        return $stmt->execute();
    }


    // na ten moment usuwa się na podstawie tylko jednego warunku
    public function delete(string $table, string $condition, string $value): bool{
        $sql = "DELETE FROM " .  $table . " WHERE " . $condition . "='" . $value . "';";
        if($this->database->query($sql)) return true; else return false;
    }

    public function update(string $table, string $column, string $new_value, string $condition, string $value): bool{
        $sql = "UPDATE $table SET $column='$new_value' WHERE $condition='$value'";
        if($this->database->query($sql)) return true; else return false;
    }

    public function getDB(): mysqli{
        return $this->database;
    }
}