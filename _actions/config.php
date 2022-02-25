<?php

class DB
{
    private const DB_HOST = "localhost::8080";
    private const DB_NAME = "for_interview";
    private const DB_USER = "root";
    private const DB_PASSWORD = '';
    public $pdo;
    private $option = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    public function connect()
    {
        try {
            $this->pdo = new PDO("mysql:dbhost=" . self::DB_HOST . ";dbname=" . self::DB_NAME, self::DB_USER, self::DB_PASSWORD, $this->option);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function insert($data)
    {
        try {
            $query = "INSERT INTO user_data(name, email,message)
                    VALUES (:name, :email, :message)";
            $statement = $this->pdo->prepare($query);
            $statement->execute($data);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getAll()
    {
        try {
            $statement = $this->pdo->query("SELECT * FROM user_data");
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function delete($id)
    {
        $statement = $this->pdo->prepare('DELETE FROM user_data WHERE id=:id');
        return $statement->execute([':id' => $id]);
    }
    public static function escape($html)
    {
        return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
    }
}
