<?php

class Smartphone
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSmartphones()
{
    $sql = 'SELECT SMPS.Id
                  ,SMPS.Merk
                  ,SMPS.Model
                  ,SMPS.Prijs
                  ,SMPS.Geheugen
                  ,SMPS.Besturingssysteem
                  ,CONCAT(SMPS.Schermgrootte, " inch") as Schermgrootte
                  ,DATE_FORMAT(SMPS.Releasedatum, "%d/%m/%Y") as Releasedatum
                  ,CONCAT(SMPS.MegaPixels, " MP") as MegaPixels
            FROM   Smartphones as SMPS
            ORDER BY SMPS.Schermgrootte DESC
                  ,SMPS.Prijs DESC
                  ,SMPS.Geheugen DESC
                  ,SMPS.Releasedatum DESC
                  ,SMPS.MegaPixels DESC';

    $this->db->query($sql);

    return $this->db->resultSet();
}

public function delete($Id)
    {
        $sql = "DELETE
                FROM Smartphones
                WHERE Id = :Id";

        $this->db->query($sql);

        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }
    public function create($data)
{
    $sql = "INSERT INTO Sneakers (Merk, Model, Type, Prijs, Materiaal, Gewicht, Releasedatum) 
            VALUES (:merk, :model, :type, :prijs, :materiaal, :gewicht, :releasedatum)";

    $this->db->query($sql);
    $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
    $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
    $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
    $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_STR);
    $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
    $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_STR);
    $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);

    return $this->db->execute();
}
}