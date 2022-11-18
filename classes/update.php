<?php

include ("../init.php");
use Models\Classes;
use Models\Teacher;


try{
    if (isset($_POST['id'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $code = $_POST['code'];
        $description = $_POST['description'];
        $email = $_POST['email'];
        $teacher_id = $_POST['teacher_id'];

        $class= new Student ('','','','','','','');
        $class->setConnection($connection);
        $class->getById($id);

        $student->update($id,$name,$code,$description,$teacher_id);
        echo "<script> window.location.href='index.php'; </script>";
        exit;
    }
}
catch (Exception $e) {
    error_log($e->getMessage());
}
?>