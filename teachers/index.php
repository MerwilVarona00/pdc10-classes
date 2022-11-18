<?php

include ("../init.php");
use Models\Teacher;

$teacher = new Student('', '', '', '', '', '');
$teacher->setConnection($connection);
$all_teachers = $student->getAll();

$template = $mustache->loadTemplate('teachers/index.mustache');
echo $template->render(compact('all_teachers'));