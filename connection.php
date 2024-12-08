<?php

//Connection to database

$connection = mysqli_connect("localhost", "root", "", "student_information");

if(!$connection){
    echo "<script>alert('Not connected to database')</script>";
}

error_reporting(0);