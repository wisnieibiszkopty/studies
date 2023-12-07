<?php

class UserManager{
    public function login(Database $db): int{
        $args = [
            'login' => FILTER_SANITIZE_ADD_SLASHES ,
            'passwd' => FILTER_SANITIZE_ADD_SLASHES
        ];

        $request = filter_input_array(INPUT_POST, $args);
        $login = $request["login"];
        $password = $request['passwd'];

        $id = $db->selectUser($login, $password, "users");

        if($id >= 0){
            session_start();
            $db->delete("logged_in_users", "userId", $id);
            $date = new DateTime('now');
            $date = $date->format("YYYY-MM-DD");
            $sessionId = session_id();
            $sql = "INSERT INTO logged_in_users VALUES ('$sessionId','$id','$date')";
            $db->query($sql);
        }

        return $id;
    }

    public function logout(Database $db): void{
        session_start();
        $id = session_id();
        echo "Session id: $id";
        if(isset($_COOKIE[session_name()]) ) {
            setcookie(session_name(),'', time() - 42000, '/');
        }
        session_destroy();
        $db->delete("logged_in_users", "sessionId", $id);
    }

    public function getLoggedInUser(Database $db, int $id){
        $sql = "SELECT userId FROM logged_in_users WHERE sessionId=$id";
        $result = $db->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_object();
            return $row->id;
        }
        return -1;
    }

}