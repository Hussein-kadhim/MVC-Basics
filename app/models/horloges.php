<?php

class horloges 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllHorloges()
    {
        // Vergeet UniekKenmerk niet toe te voegen om de vorige error op te lossen!
        $sql = 'SELECT Id, Merk, Model, Prijs, Type, Materiaal, UniekKenmerk 
                FROM Horloges 
                ORDER BY Prijs DESC';
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE FROM Horloges WHERE Id = :Id";
        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Horloges (Merk, Model, Prijs, Materiaal, Type, UniekKenmerk) 
                VALUES (:merk, :model, :prijs, :materiaal, :type, :kenmerk)";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':kenmerk', $data['kenmerk'], PDO::PARAM_STR);

        return $this->db->execute();
    }
}