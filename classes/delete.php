<?php

inlcude ("../init.php");
use Models\Classes;
use Models\Teacher;

$id=$_GET['id'] ?? null;
$student = new Classes('', '', '', '', '', '');
$student->setConnection($connection);
$student->getById($id);
$student->delete();
echo "<script>window.location.href='index.php';</script>"
?>
