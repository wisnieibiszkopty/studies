<?php
include_once "Database.php";

class User{
    const STATUS_USER = 1;
    const STATUS_ADMIN = 2;

    protected string $userName;
    protected string $fullName;
    protected string $email;
    protected string $password;
    protected DateTime $date;
    protected int $status;

    protected $database;

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

    public function getDate(): string {
        return $this->date->format('Y-m-d');
    }

    public function getStatus(): int {
        return $this->status;
    }

    public function show(): void{
        echo $this->userName . " " . $this->fullName . " " . $this->email . " " .
            $this->password . " " . $this->date->format('Y-m-d') . " " . $this->status . "<br>";
    }

    public function toArray(): array{
        $array = [
            'userName' => $this->userName,
            'fullName' => $this->fullName,
            'email' => $this->email,
            'passwd' => $this->password,
            'date' => $this->date->format('Y-m-d'),
            'status' => $this->status
        ];

        return $array;
    }

    public function saveDB(Database $db){
        $sql = "INSERT INTO users VALUES (NULL,'". $this->getUserName() .
        "','". $this->getFullName() .
        "','". $this->getEmail() .
        "','". $this->getPassword() .
        "',". $this->getStatus() .
        ",'". $this->getDate() ."')";
        if($db->query($sql)){
            echo "Udało się dodać użytkownika!";
        } else {
            echo "Wystąpił błąd przy dodawaniu użytkownika";
        }
    }

    public function getAllUsersFromDB(Database $db){
        $results = $db->getAll("users");
        if($results){
            echo "<table><thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead><tbody>";
            while($row = $results->fetch_assoc()){
                echo "<tr>
                    <th>". $row['id'] ."</th>
                    <th>". $row['userName'] ."</th>
                    <th>". $row['fullName'] ."</th>
                    <th>". $row['email'] ."</th>
                    <th>". substr($row['passwd'], 0, 10) ."...</th>
                    <th>". $row['status'] ."</th>
                    <th>". $row['date'] ."</th>
                </tr>";
            }
            echo "</tbody></table>";

        } else {
            echo "<h1>Wygląda na to że nie ma jeszcze żadnych użytkowników :'(</h1>";
        }
    }

}