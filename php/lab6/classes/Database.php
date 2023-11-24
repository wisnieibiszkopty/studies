<?php

class Database{
    private $database;

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

    public function select($sql, $params){
        $html = "";
        if($result = $this->database->query($sql)){
            $count = count($params);
            $rowsCount = $result->num_rows;
            $html .= "<table><tbody>";
            while($row = $result->fetch_object()){
                $html .= "<tr>";
                for($i=0; $i<$count; $i++){
                    $field = $params[$i];
                    $html .= "<td>" . $row->$field . "</td>";
                }
                $html .= "</tr>";
            }
            $html .= "</tbody></table>";
            $result->close();
        }

        return $html;
    }

    public function save($sql): bool{
        if($this->database->query($sql)) return true; else return false;
    }

    public function delete($sql): bool{
        if($this->database->query($sql)) return true; else return false;
    }

    public function getDB(){
        return $this->database;
    }
}