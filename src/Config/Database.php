<?php
namespace Config;

class Database {
    // Paramètres de connexion à la base de données
    private string $host = "localhost";
    private string $dbname = "API REST";
    private string $username = "root";
    private string $password = "root_password";
    private ?\PDO $connection = null;

    public function getConnection(): \PDO {
        // Si la connexion n'existe pas encore
        if ($this->connection === null) {
            try {
                // Tentative de connexion à la base
                $this->connection = new \PDO(
                    "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                    $this->username,
                    $this->password
                );
                // Définir le mode d'erreur sur exception
                $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch(\PDOException $e) {
                // En cas d'erreur, on lance une exception
                throw new \Exception("Connection error: " . $e->getMessage());
            }
        }
        // Retourne la connexion
        return $this->connection;
    }
}
