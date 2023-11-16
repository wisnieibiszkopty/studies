<?php
class User{
    const STATUS_USER = 1;
    const STATUS_ADMIN = 2;

    protected string $userName;
    protected string $fullName;
    protected string $email;
    protected string $password;
    protected DateTime $date;
    protected int $status;

    public function __construct($userName, $fullName, $email, $password){
        $this->userName = $userName;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->status = User::STATUS_USER;
        $this->date = new DateTime();
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setUserName(string $name): void{
        $this->userName = $name;
    }

    public function getUserName(): string{
        return $this->userName;
    }

    public function show(): void{
        echo $this->userName . " " . $this->fullName . " " . $this->email . " " .
            $this->password . " " . $this->date->format('Y-m-d') . " " . $this->status . "<br>";
    }

    public static function getAllUsers(): void{
        $json_file = file_get_contents('users.json');
        $users = json_decode($json_file, true);

        foreach ($users as $user){
            foreach ($user as $field){
                echo "$field<br>";
            }
        }
    }

    public function toArray(): array{
        $array = [
            'userName' => $this->userName,
            'fullname' => $this->fullName,
            'email' => $this->email,
            'password' => $this->password,
            'date' => $this->date->format('Y-m-d'),
            'status' => $this->status
        ];

        return $array;
    }

    public function save($file): void{
        $array = json_decode(file_get_contents($file), true);
        array_push($array, $this->toArray());
        file_put_contents($file, json_encode($array));
    }

    public static function getAllUsersFromXML(){
        $users = simplexml_load_file('users.xml');
        foreach ($users as $user){
            $userName = $user->userName;
            $filename = $user->filename;
            $email = $user->email;
            $password = $user->password;
            echo "
                
            ";
        }
    }

    public function saveXML(): void{

    }

}