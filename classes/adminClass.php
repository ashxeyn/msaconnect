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
    public $officer_id;
    public $status;
    public $user_id;
    public $created_at;
    public $program_id;
    public $school_year_id;
    
    protected $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }
    
        function addOfficer($data) {
            $sql = "INSERT INTO executive_officers (last_name, first_name, middle_name, position_id, program_id, school_year_id, image)
                    VALUES (:last_name, :first_name, :middle_name, :position, :program, :school_year, :image)";
            
            $query = $this->db->connect()->prepare($sql);
    
            $query->bindParam(':last_name', $data['surname']);
            $query->bindParam(':first_name', $data['firstName']);
            $query->bindParam(':middle_name', $data['middleName']);
            $query->bindParam(':position', $data['position']);
            $query->bindParam(':program', $data['program']);
            $query->bindParam(':school_year', $data['schoolYear']);
            $query->bindParam(':image', $data['image']['name']);
    
            if ($query->execute()) {
                if (!empty($data['image']['tmp_name'])) {
                    move_uploaded_file($data['image']['tmp_name'], "../../assets/officers/" . $data['image']['name']);
                }
                return true;
            } else {
                return "Failed to add officer.";
            }
        }
    
        function updateOfficer($officerId, $surname, $firstName, $middleName, $positionId, $schoolYearId, $programId, $image = null) {
            $sql = "UPDATE executive_officers 
                    SET last_name = :last_name, 
                        first_name = :first_name, 
                        middle_name = :middle_name, 
                        position_id = :position_id, 
                        school_year_id = :school_year_id, 
                        program_id = :program_id, 
                        image = IF(:image IS NOT NULL AND :image != '', :image, image) 
                    WHERE officer_id = :officer_id";
        
            $query = $this->db->connect()->prepare($sql);
        
            $query->bindParam(':last_name', $surname);
            $query->bindParam(':first_name', $firstName);
            $query->bindParam(':middle_name', $middleName);
            $query->bindParam(':position_id', $positionId);
            $query->bindParam(':school_year_id', $schoolYearId);
            $query->bindParam(':program_id', $programId);
            $query->bindParam(':image', $image);
            $query->bindParam(':officer_id', $officerId);
        
            if (!$query->execute()) {
                return "Failed to update officer.";
            }
            return true;
        }
        

    function deleteOfficer($officerId) {
        $sql = "DELETE FROM executive_officers WHERE officer_id = :officer_id";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':officer_id', $officerId);
            
        if ($query->execute()) {
            return true;
        } else {
            return "Failed to delete officer.";
        }
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

    function updateVolunteer($volunteerId, $surname, $firstName, $middleName, $year, $section, $programId, $contact, $email, $corFile = null) {
        $sql = "UPDATE volunteers 
                SET last_name = :last_name, 
                    first_name = :first_name, 
                    middle_name = :middle_name, 
                    year = :year, 
                    section = :section, 
                    program_id = :program_id, 
                    contact = :contact, 
                    email = :email, 
                    cor_file = IF(:cor_file IS NOT NULL AND :cor_file != '', :cor_file, cor_file)
                WHERE volunteer_id = :volunteer_id";
    
        $query = $this->db->connect()->prepare($sql);
    
        $query->bindParam(':last_name', $surname);
        $query->bindParam(':first_name', $firstName);
        $query->bindParam(':middle_name', $middleName);
        $query->bindParam(':year', $year);
        $query->bindParam(':section', $section);
        $query->bindParam(':program_id', $programId);
        $query->bindParam(':contact', $contact);
        $query->bindParam(':email', $email);
        $query->bindParam(':cor_file', $corFile);
        $query->bindParam(':volunteer_id', $volunteerId);
    
        if (!$query->execute()) {
            return "Failed to update volunteer.";
        }
        return true;
    }

    function getVolunteerById($volunteerId) {
        $sql = "SELECT 
                    v.volunteer_id,
                    v.first_name,
                    v.middle_name,
                    v.last_name,
                    v.year AS year_level,
                    v.section,
                    v.program_id,
                    v.contact,
                    v.email,
                    v.cor_file,
                    v.status,
                    v.created_at,
                    p.program_name
                FROM volunteers v
                JOIN programs p ON v.program_id = p.program_id
                WHERE v.volunteer_id = :volunteer_id";
    
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':volunteer_id', $volunteerId);
        $query->execute();
    
        return $query->fetch();
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

    function fetchOfficers() {
        $sql = "SELECT 
                    v.officer_id,
                    CONCAT(v.last_name, ', ', v.first_name, ' ', v.middle_name) AS full_name, 
                    p.program_name, 
                    op.position_name, 
                    sy.school_year, 
                    v.image AS image 
                FROM executive_officers v 
                LEFT JOIN programs p ON v.program_id = p.program_id 
                LEFT JOIN officer_positions op ON v.position_id = op.position_id 
                LEFT JOIN school_years sy ON v.school_year_id = sy.school_year_id";
        
        $query = $this->db->connect()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    
        function getOfficerById($officerId) {
        $sql = "SELECT 
                    eo.officer_id,
                    eo.last_name,
                    eo.first_name,
                    eo.middle_name,
                    eo.position_id,
                    eo.image,
                    eo.school_year_id,
                    eo.program_id,
                    p.program_name,
                    op.position_name,
                    sy.school_year
                FROM executive_officers eo
                LEFT JOIN programs p ON eo.program_id = p.program_id
                LEFT JOIN officer_positions op ON eo.position_id = op.position_id
                LEFT JOIN school_years sy ON eo.school_year_id = sy.school_year_id
                WHERE eo.officer_id = :officer_id";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':officer_id', $officerId);
        $query->execute();

        return $query->fetch();
    }

    function fetchPendingVolunteer() { 
        $sql = "SELECT v.volunteer_id, CONCAT(v.last_name, ', ', v.first_name, ' ', v.middle_name) AS full_name, p.program_name, CONCAT(v.year, '-', v.section) AS yr_section, 
                v.contact, v.email, v.cor_file AS cor, v.status FROM volunteers v
                LEFT JOIN programs p ON v.program_id = p.program_id WHERE v.status = 'pending'";
        
        $query = $this->db->connect()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    function fetchApprovedVolunteer() { 
        $sql = "SELECT v.volunteer_id, CONCAT(v.last_name, ', ', v.first_name, ' ', v.middle_name) AS full_name, p.program_name, CONCAT(v.year, '-', v.section) AS yr_section, 
                v.contact, v.email, v.cor_file AS cor, v.status, u.username AS registered_by FROM volunteers v 
                LEFT JOIN users u ON v.user_id = u.user_id LEFT JOIN programs p ON v.program_id = p.program_id WHERE v.status = 'approved'";
        
        $query = $this->db->connect()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    function fetchRejectedVolunteer() { 
        $sql = "SELECT v.volunteer_id, CONCAT(v.last_name, ', ', v.first_name, ' ', v.middle_name) AS full_name, p.program_name, CONCAT(v.year, '-', v.section) AS yr_section, 
                v.contact, v.email, v.cor_file AS cor, v.status, u.username AS registered_by FROM volunteers v LEFT JOIN users u ON v.registered_by = u.user_id 
                LEFT JOIN programs p ON v.program_id = p.program_id WHERE v.status = 'rejected'";
        
        $query = $this->db->connect()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    function approveVolunteer($volunteerId, $adminUserId) {
        $sql = "UPDATE volunteers SET status = 'approved', user_id = :admin_id WHERE volunteer_id = :volunteer_id";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':admin_id', $adminUserId);
        $query->bindParam(':volunteer_id', $volunteerId);
        if (!$query->execute()) {
            return "Sad di magawa";
        }
        return true;
    }
    
    function rejectVolunteer($volunteerId, $adminUserId) {
        $sql = "UPDATE volunteers SET status = 'rejected', user_id = :admin_id WHERE volunteer_id = :volunteer_id";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':admin_id', $adminUserId);
        $query->bindParam(':volunteer_id', $volunteerId);
        if (!$query->execute()) {
            return "Sad di magawa";
        }
        return true;
    }
    
    function deleteVolunteer($volunteerId) {
        $sql = "DELETE FROM volunteers WHERE volunteer_id = :volunteer_id";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':volunteer_id', $volunteerId);
        return $query->execute();
    }
}