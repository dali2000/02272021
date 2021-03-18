<?php

require 'database.class.php';

class Client
{
    private $pdo;

    public function __construct()
    {
        $conn = new Database();
        $this->pdo = $conn->getConnection();
    }

    public function getAllClients()
    {
        try {
            $sql = "SELECT * FROM clients";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getOneClient($id)
    {
        try {
            $sql = "SELECT * FROM clients WHERE id = ?";
            $query = $this->pdo->prepare($sql);
            $query->execute([$id]);
            return $query;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addNewClient($nom, $prenom, $dateN, $adress, $tel)
    {
        try {
            $sql = "
                INSERt INTO clients(nom, prenom, datenaissance, adresse, tel)
                VALUES (?, ?, ?, ?, ?)
                ";
            $query = $this->pdo->prepare($sql);
            $query->execute([$nom, $prenom, $dateN, $adress, $tel]);
            return $query;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function deleteClient($id){
        try{
            $sql= "DELETE FROM clients WHERE id = $id";
            $query = $this->pdo->prepare(($sql));
            $query->execute();
            return $query;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function modifieClient($id){
        try{
            $sql = "SELECT * FROM clients WHERE id = $id";
            $query = $this->pdo->prepare(($sql));
            $query->execute();
            return $query;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
