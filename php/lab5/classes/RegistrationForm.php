<?php

class RegistrationForm{
    protected User $user;

    public function __construct(){
        ?>
            <style>
                @import "styles.css";
            </style>
            <form method="post" action="index.php">
                <div class='form-item'>
                    <div class='input'>
                        <label for='userName'>Username</label>
                        <input type='text' name='userName' id='userName'>
                    </div>
                    <div class='input'>
                        <label for='fullname'>Fullname</label>
                        <input type="text" name="fullname" id="fullname">
                    </div>
                    <div class='input'>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class='input'>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class='input'>
                        <label></label>
                        <input type='submit' name='submit' value='submit'>
                    </div>
                </div>
            </form>
        <?php
    }

    public function setUser(User $user): void{
        $this->user = $user;
    }

    public function checkUser(): User{
        $args = [
            'userName' => ['filter' => FILTER_VALIDATE_REGEXP,
              'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/']],
            'fullname' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS],
            'email' => ['filter' => FILTER_VALIDATE_EMAIL],
            'password' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/']]
        ];

        $data = filter_input_array(INPUT_POST, $args);

        $errors = '';
        foreach ($data as $key => $val){
            if($val === false or $val === NULL){
                $errors .= $key . " ";
            }
        }

        if($errors === ''){
            $this->setUser(new User($data['userName'], $data['fullname'], $data['email'], $data['password']));
        } else {
            echo $errors;
            echo "<h1 style='color: red'>Niepoprawne dane</h1>";
            $this->setUser(NULL);
        }

        return $this->user;
    }


}

?>