<?php

namespace models;
use \PDO;

class Classes
{
    protected $id;
    protected $name;
    protected $description;
    protected $class_code;


    public function __construct($name, $description, $class_code)
    {
        $this->name = $name;
        $this->description = $description;
        $this->class_code = $class_code;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getCode()
    {
        return $this->code;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getTeacherId()
    {
        return $this->teacher_id;
    }
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }
    public function saveclasses()
    {
        try {
            $sql = "INSERT INTO class SET name=:name, description=:description, class_code=:class_code";
            $statement = $this->connection->prepare($sql);

            return $statement->execute([
                ':id' => $this->getId(),
                ':name' => getName(),
                ':code' => $this->getCode(),
                ':description' => $this->getDescription(),
                ':teacher_id' => $this->getTeacherId()

            ]);
        } catch (Exception $e) {
            error_log($egetMessage());
        }
    }

    public function update($id, $name, $code, $description, $teacher_id)
    {
        try {
            $sql = 'UPDATE class SET name=?, description=?, code=? WHERE id = ?';
            $statement = $this->connection->prepare($sql);
            $statement->execute([
                $id,
                $name,
                $code,
                $description,
                $teacher_id,

                $this->getId()
            ]);
            $this->name = $name;
            $this->code = $code;
            $this->description = $description;
            $this->teacher_id = $teacher_id;



        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
    public function delete()
    {
        try {
            $sql = 'DELETE FROM class WHERE id=?';
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
            $sql = 'SELECT * FROM class';
            $data = $this->connection->query($sql)->fetchAll();
            return $data;
        
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
}