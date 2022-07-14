<?php
class Category{
    private $db ;

    public function __construct(){
        $this->db  = new Database;

    }


    public function GetCategories(){
        $this->db->query('SELECT * FROM categories');
        $results = $this->db->resultSet();
        return $results;
    }
}