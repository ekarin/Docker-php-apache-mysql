<?php
$host = "db";         //  refer to the mysql service name in docker-compose.yml
$dbname = "my_database";
$charset = "utf8";
$port = "3306";
try {
    $pdo = new PDO(
        dsn: "mysql:host=$host;dbname=$dbname;charset=$charset;port=$port",
        username: "user",
        password: "user_password",
    );
    $persons = $pdo->query("SELECT * FROM Persons");
    echo '<pre>';
    foreach ($persons->fetchAll(PDO::FETCH_ASSOC) as $person) {
        print_r($person);
    }
    echo '</pre>';

} catch (PDOException $e) {
    throw new PDOException(
        message: $e->getMessage(),
        code: (int)$e->getCode()
    );
}

?>