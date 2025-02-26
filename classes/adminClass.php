<?php
require_once 'databaseClass.php';

class Admin {

    public $last_name;
    public $first_name;
    public $middle_name; 
    public $position;
    public $image;
    public $school_year;

    protected $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }

    function addOfficer() {
        $sql = "INSERT INTO executive_officers (last_name, first_name, middle_name, position_id, image, school_year_id)
                VALUES (:last_name, :first_name, :middle_name, :position, :image, :school_year)"; 
    
        $query = $this->db->connect()->prepare($sql);
    
        $query->bindParam(':last_name', $this->last_name);
        $query->bindParam(':first_name', $this->first_name);
        $query->bindParam(':middle_name', $this->middle_name);
        $query->bindParam(':position', $this->position);
        $query->bindParam(':image', $this->image);
        $query->bindParam(':school_year', $this->school_year);
    
        $query->execute();
    }    

    function fetchSy(){
        $sql = "SELECT * FROM school_years ORDER BY school_year_id ASC;";
        $query = $this->db->connect()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    function fetchProgram(){
        $sql = "SELECT * FROM programs ORDER BY program_name ASC;";
        $query = $this->db->connect()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }



}
?>