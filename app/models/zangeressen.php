<?php

class zangeressen
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllZangeressen()
    {
        // Voeg Id toe aan de SELECT zodat de delete-knop werkt
        $sql = 'SELECT  Id
                       ,Naam
                       ,NettoWaarde
                       ,Land
                       ,Leeftijd
                       ,BekendsteNummer
                       ,Debuutjaar as Debuut
                FROM    zangeressen
                ORDER BY NettoWaarde DESC';

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE FROM zangeressen 
                WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }
public function create($data)
{
    $sql = "INSERT INTO zangeressen (Naam, NettoWaarde, Land, Leeftijd, BekendsteNummer, Debuutjaar) 
            VALUES (:naam, :waarde, :land, :leeftijd, :nummer, :jaar)";

    $this->db->query($sql);
    
    $this->db->bind(':naam', $data['naam'], PDO::PARAM_STR);
    $this->db->bind(':waarde', $data['waarde'], PDO::PARAM_INT); // Was 'netto_waarde'
    $this->db->bind(':land', $data['land'], PDO::PARAM_STR);
    $this->db->bind(':leeftijd', $data['leeftijd'], PDO::PARAM_INT);
    $this->db->bind(':nummer', $data['nummer'], PDO::PARAM_STR);
    $this->db->bind(':jaar', $data['jaar'], PDO::PARAM_INT); // Was 'debuutjaar'

    return $this->db->execute();
}
}