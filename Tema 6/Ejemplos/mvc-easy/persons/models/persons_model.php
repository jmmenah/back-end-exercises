<?php

class persons_model
{
    private $db;
    private $persons;

    public function __construct()
    {
        $this->db = Connection::connect();
        $this->persons = array();
    }

    public function get_persons()
    {
        $query = $this->db->query("select * from persons");
        while ($row = $query->fetch( PDO::FETCH_ASSOC )) {
            $this->persons[] = $row;
        }
        return $this->persons;
    }
}