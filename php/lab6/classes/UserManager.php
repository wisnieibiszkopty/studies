<?php

class UserManager{
    public function login(Database $db){
        $args = [
            'login' => FILTER_SANITIZE_ADD_SLASHES ,
            'passwd' => FILTER_SANITIZE_ADD_SLASHES
        ];

        $request = filter_input_array(INPUT_POST, $args);
        $login = $request["login"];
        $password = $request['passwd'];

        $user = json_decode($db->selectUser($login, $password, "users"));

        if($user->id >= 0){
            session_start();
            $db->delete("logged_in_users", "userId", $user->id);
            $date = new DateTime('now');
            $date = $date->format("YYYY-MM-DD");
            $sessionId = session_id();
            $id = $user->id;
            $sql = "INSERT INTO logged_in_users VALUES ('$sessionId','$id','$date')";
            $db->query($sql);
        }

        return $user;
    }

    public function logout(Database $db): void{
        session_start();
        $id = session_id();
        if(isset($_COOKIE[session_name()]) ) {
            setcookie(session_name(),'', time() - 42000, '/');
        }
        session_destroy();
        $db->delete("logged_in_users", "sessionId", $id);
    }

    public function getLoggedInUser(Database $db, string $id){
        $sql = "SELECT userId FROM logged_in_users WHERE sessionId='$id'";
        if($id = json_decode($db->find($sql))){
            // teraz okazuje sie ze istnieje zalogowany uzytkownik z takim sessionId
            // teraz dzieki id mozemy zrobic selecta na usera i go zwrocic
            if($id->userId == -1){
                return null;
            }

            $sql = "SELECT * FROM users WHERE id=". $id->userId;
            $user = json_decode($db->find($sql));
            if($user->id != -1){
                return $user;
            }
        }

        return null;
    }

}