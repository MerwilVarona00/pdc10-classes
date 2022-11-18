<?php

include ("../init.php");
use Models\Student;

    $id = $_GET['id'];

    $student = new Classes('','','','','','');
    $student->setConnection($connection);
    $student->getById($id);
    $id = $class->getId();
    $name = $class->Name();
    $code = $class->getCode();
    $description = $class->getDescription();
    $teacher_id = $class->getTeacherId();
    $program = $student->getProgram();

    $template = $mustache->loadTemplate('classes/edit.mustache');
    echo $template->render(compact('id', 'name', 'code', 'description', 'teacher_id'));


?>