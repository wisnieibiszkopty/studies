<?php

class PDODB{
    private $db;

    public function __construct($server, $user, $pass){
        try{
            $this->db = new PDO($server, $user, $pass, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
        } catch (PDOException $e){
            echo "Błąd: " . $e->getMessage() . "<br>";
            die();
        }
    }

    function __destruct(){
        $this->db = null;
    }

    public function query(string $sql): void{
        try{
            $this->db->exec($sql);
        } catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    // not working yet
    public function select($sql, $params): string{
        $html = "";
        try{
            $count = count($params);
            $stmt = $this->db->query($sql)->fetchAll();
            foreach ($stmt as $row){
                $html .= "<tr>";
                for($i=0; $i<$count; $i++){
                    $field = $params[$i];
                    $html .= "<td>" . $row . "</td>";
                }
                $html .= "<td><form action='index_pdo.php' method='post'>" .
                    "<input type='hidden' name='id' >" .
                    "<input type='submit' name='submit' value='delete'>" .
                    "</form></td>";
                $html .= "</tr>";
            }
            $html .= "</tbody></table>";

        } catch(PDOException $e){
            echo $e->getMessage() . "<br>";
        }

        return $html;
    }

    public function save($values): void{
        $table = 'clients';
        try{
            $sql = "INSERT INTO $table VALUES (NULL, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$values[0],$values[1],$values[2],$values[3],$values[4],$values[5]]);
            echo "<h2>Dodano użytkownika</h2>";
        } catch(PDOException $e){
            echo $e->getMessage() . "<br>";
        }
    }

    public function delete(string $table, string $condition, string $value): void{
        try{
            $sql = "DELETE FROM $table WHERE $condition=$value";
            echo $sql;
            $this->db->exec($sql);
        } catch(PDOException $e){
            echo $e->getMessage() . "<br>";
        }
    }

    public function update(string $table, string $column, string $new_value, string $condition, string $value): void{
        try{
            $sql = "UPDATE $table SET $column=$new_value WHERE $condition=$value";
            echo $sql;
            $this->db->exec($sql);
        } catch(PDOException $e){
            echo $e->getMessage() . "<br>";
        }
    }

}