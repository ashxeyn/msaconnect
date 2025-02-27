<?php
require_once 'databaseClass.php';

class Admin {

    public $last_name;
    public $first_name;
    public $middle_name; 
    public $position;
    public $image;
    public $school_year;
    public $year;
    public $contact;
    public $email;
    public $program;
    public $section;
    public $cor_file;

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
    
    function addVolunteer() {
        $sql = "INSERT INTO volunteers (last_name, first_name, middle_name, year, section, program_id, contact, email, cor_file)
                VALUES (:last_name, :first_name, :middle_name, :year, :section, :program, :contact, :email, :cor_file)";
        
        $query = $this->db->connect()->prepare($sql);

        $query->bindParam(':last_name', $this->last_name);
        $query->bindParam(':first_name', $this->first_name);
        $query->bindParam(':middle_name', $this->middle_name);
        $query->bindParam(':year', $this->year);
        $query->bindParam(':section', $this->section);
        $query->bindParam(':contact', $this->contact);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':cor_file', $this->cor_file);
        $query->bindParam(':program', $this->program);

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