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

        $this->database = new Database();
        $this->database->selectCollection("users");
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

    public static function getAllUsers(): void{
        $json_file = file_get_contents('users.json');
        $users = json_decode($json_file, true);
?>
        <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Fullname</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
<?php
        $i = 1;
        foreach ($users as $user){
            echo "<tr>
                <td>$i</td>
                <td>".$user['userName']."</td>
                <td>".$user['fullName']."</td>
                <td>".$user['email']."</td>
                <td>".$user['passwd']."</td>
                <td>".$user['date']."</td>
                <td>".$user['status']."</td>
            </tr>";
            $i++;
        }
        echo "</tbody></table>";
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

    public function save($file): void{
        $array = json_decode(file_get_contents($file), true);
        array_push($array, $this->toArray());
        file_put_contents($file, json_encode($array));
    }

    public static function getAllUsersFromXML(){
        $users = simplexml_load_file('users.xml') or die("Cannot create object");
?>
        <table class="table table-warning table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
<?php
        $i = 1;
        foreach ($users as $user){
            $userName = $user->userName;
            $filename = $user->fullName;
            $email = $user->email;
            $password = $user->passwd;
            $date = $user->date;
            $status = $user->status;
            echo "<tr>
                <td>$i</td>
                <td>$userName</td>
                <td>$filename</td>
                <td>$email</td>
                <td>$password</td>
                <td>$date</td>
                <td>$status</td>
            </tr>";
            $i++;
        }
        echo "</tbody></table>";
    }

    public function saveXML($file): void{
        $xml = simplexml_load_file($file) or die("Cannot create object");
        $xmlChild = $xml->addChild("user");
        $xmlChild->addChild("userName", $this->getUserName());
        $xmlChild->addChild("fullName", $this->getFullName());
        $xmlChild->addChild("email", $this->getEmail());
        $xmlChild->addChild("passwd", $this->getPassword());
        $xmlChild->addChild("date", $this->getDate());
        $xmlChild->addChild("status", $this->getStatus());
        $xml->asXML($file);
    }

    public function saveToDatabase(): void {
        $document = $this->toArray();
        $this->database->insert($document);
        echo "<h2>Zapisano dokument w bazie danych</h2><br>";
    }

    // powinnismy skorzystac z obiektu $database, ale jest on dostepny tylko po dodaniu nowego rekordu
    // wiec nie da sie wyswietlic z nim danych statyczna metoda, a bez statycznej beda wyswietlane
    // tylko gdy dodajemy nowego uzytkownika
    public static function findInDatabase(): void {
        $db = new Database();
        $db->selectCollection("users");
        $users = $db->findAll();
        echo "<h1>Dane z bazy danych</h1><br>";
        foreach($users as $user){
            echo "id: " . $user["_id"] . 
            "<br>name: " . $user["userName"] . 
            "<br>surname: " . $user["fullName"] . 
            "<br>email: " . $user["email"] . 
            "<br>password: " . $user["passwd"] . 
            "<br>date: " . $user["date"] . 
            "<br>status: " . $user["status"] . "<br><br>";
        }
    }

}