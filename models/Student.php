<?php

namespace models;

use \PDO;

class Student 
{
    protected $id;
    protected $first_name;
    protected $last_name;
    protected $student_number;
    protected $email;
    protected $contact_number;
    protected $program;
    
    public function __construct($first_name, $last_name, $student_number, $email, $contact_number, $program)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->student_number = $student_number;
        $this->email = $email;
        $this->contact_number = $contact_number;
        $this->program = $program;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getFirstName()
    {
        return $this->first_name;
    }
    public function getLastName()
    {
        return $this->last_name;
    }
    public function getStudentNumber()
    {
        return $this->student_number;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getContactNumber()
    {
        return $this->contact_number;
    }
    public function getProgram()
    {
        return $this->program;
    }
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }
    public function saveClass()
    {
        try {
            $sql = "INSERT INTO student SET name=:name, description=:description, class_code=:class_code";
            $statement = $this->connection->prepare($sql);

            return $statement->execute([
                ':first_name' => $this->getFirstName(),
                ':last_name' => $this->getLastName(),
                ':student_number' => $this->getStudentNumber(),
                ':email' => $this->getEmail(),
                ':contact_number' => $this->getContactNumber(),
                ':program' => $this->getProgram(),
            ]);
        } catch (Exception $e) {
            error_log($egetMessage());
        }
    }

    public function update($first_name, $last_name, $student_number, $email, $contact_number, $program)
    {
        try {
            $sql = 'UPDATE student SET first_name=?, last_name=?, student_number=?, email=?, contact_number=?, program=? WHERE id = ?';
            $statement = $this->connection->prepare($sql);
            $statement->execute([
                $first_name,
                $last_name,
                $student_number,
                $email,
                $contact_number,
                $program,
                $this->getId()
            ]);
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->student_number = $student_number;
            $this->email = $email;
            $this->contact_number = $contact_number;
            $this->program = $program;

        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
    public function delete()
    {
        try {
            $sql = 'DELETE FROM student WHERE id=?';
            $statement = $this->connection->prepare($sql);
            $statement->execute([
                $this->getId()
            ]);

        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM student';
            $data = $this->connection->query($sql)->fetchAll();
            return $data;
        
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
}