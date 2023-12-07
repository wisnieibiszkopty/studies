<?php

class Registration{
    protected User $user;

    public function __construct(){
        ?>
            <form method="post" action="registration.php">
                <div class='form-item'>
                    <div class='input'>
                        <label for='userName'>Username</label>
                        <input type='text' name='userName' id='userName'>
                    </div>
                    <div class='input'>
                        <label for='fullName'>Fullname</label>
                        <input type="text" name="fullName" id="fullname">
                    </div>
                    <div class='input'>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class='input'>
                        <label for="passwd">Password</label>
                        <input type="passwd" name="passwd" id="passwd">
                    </div>
                    <div class='input'>
                        <input type='submit' name='submit' value='submit'>
                    </div>
                </div>
            </form>
        <?php
    }

    public function setUser($user): void{
        $this->user = $user;
    }

    public function checkUser(): User | NULL{
        $args = [
            'userName' => ['filter' => FILTER_VALIDATE_REGEXP,
              'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/']],
            'fullName' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS],
            'email' => ['filter' => FILTER_VALIDATE_EMAIL],
            'passwd' => ['filter' => FILTER_VALIDATE_REGEXP,
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
            $this->setUser(new User($data['userName'], $data['fullName'], $data['email'], $data['passwd']));
            return $this->user;
        } else {
            echo $errors;
            echo "<h1 style='color: red'>Niepoprawne dane</h1>";
            return NULL;
        }

    }


}

?>