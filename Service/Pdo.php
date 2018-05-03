<?php
namespace Service;

class Pdo
{
    private $database;

    /**
     * @param \PDO $db
     */
    public function __construct(DatabaseConnexion $database)
    {
        $this->database = $database;
    }

    private function getDb()
    {
        return $this->database;
    }
}
