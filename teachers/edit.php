<?php

include ("../init.php");
use Models\Teacher;

    $id = $_GET['id'];

    $teacher = new Teacher('','','','','','');
    $teacher->setConnection($connection);
    $teacher->getById($id);
    $first_name = $teacher->getFirstName();
    $last_name = $teacher->getLastName();
    $email = $teacher->getStudentNumber();
    $contact = $teacher->getEmail();
    $employee_number = $teacher->getContactNumber();

    $template = $mustache->loadTemplate('students/edit.mustache');
    echo $template->render(compact('id', 'teacher', 'first_name', 'last_name', 'email', 'contact', 'employee_number'));


?>