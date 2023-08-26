<?php
session_start();
$email=$_GET['mail'];
$_SESSION['mail']=$email;
$id=$_GET['id'];
if($id=="staff"){
    header("location: resume_staff.php");
}else if($id=="student"){
    header("location: resume_student.php");
}
