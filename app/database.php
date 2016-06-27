<?php

namespace app;

use PDO;
use app\score;

class Database
{
    private $conn;
    private $string;
    private $sql;

    public function __construct()
    {
        $this->conn = new PDO(
            'mysql:dbname=' . getenv('DB_NAME') . ';host=' . getenv('HOST'),
            getenv('DB_USER'),
            getenv('DB_PASS')
        );
    }
    public function getRanking($table)
    {
        $this->string = 'SELECT * FROM '. $table .' ORDER BY score DESC';
        $this->sql = $this->conn->prepare($this->string);
        $this->sql->setFetchMode(PDO::FETCH_CLASS, score::class);
        $this->sql->execute();
        return $this->sql->fetchAll();
    }
    public function insertUser($login, $user, $score)
    {
        $this->string = 'INSERT INTO score(login, username, score) VALUES(:login, :username, :score);';
        $this->sql = $this->conn->prepare($this->string);
        $this->sql->bindParam(':login', $login);
        $this->sql->bindParam(':username', $user);
        $this->sql->bindParam(':score', $score);
        if (!($this->sql->execute())) {
            $this->string = 'UPDATE score SET score = :score 
            WHERE username = :username;';
            $this->sql->bindParam(':username', $login);
            $this->sql->bindParam(':username', $user);
            $this->sql->bindParam(':username', $score);
        }
    }
}
