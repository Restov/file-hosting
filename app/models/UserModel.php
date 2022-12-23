<?php
class UserModel
{
    protected $db;
    public function __construct()
    {
        echo 'UserModel';
    }
    public function getUsers()
    {
        $stmt = $this->db->query('SELECT * FROM users');
        return $stmt->fetchAll();
    }
    public function createUser($user)
    {
        $stmt = $this->db->prepare('INSERT INTO users (name, email) VALUES (:name, :email)');
        $stmt->execute($user);
    }
}
