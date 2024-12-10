<?php 

//Ato e inherit ang database connection so that di ta mag copy paste sige every page
include "./connection.php";



//Mu register sa student sa database
//Ang isset kay function sa php when it is true or false, naka emdedded dira ang button name nga submit
//See the button nga submit naay name nga :submitForm:
//if e click siya then mu trigger ni nga if statement

if(isset($_POST["submitForm"])){
    $id = $_POST['idnum'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $year = $_POST['year'];

    
    $query = "INSERT INTO student (`student_id`, `student_name`, `student_course`, `student_year`) VALUES ('$id', '$name', '$course', '$year')";
    
    if(mysqli_query($connection, $query)){
         echo "<script>alert('Add Student Successful')</script>";
    }
   
}


if(isset($_POST["submitEdit"])){
    $id = $_POST['idnum'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $year = $_POST['year'];


    $query = "UPDATE student SET `student_name` = '$name' , `student_course` = '$course' , `student_year` = '$year' WHERE `student_id` = '$id'";

    if(mysqli_query($connection, $query)){
         echo "<script>alert('Edit Student Successful')</script>";
    }
   
}
//deleteStudent
if(isset($_POST["deleteStudent"])){
    $id = $_POST['id'];
   


    $query = "DELETE FROM student WHERE `student_id` = '$id'";

    if(mysqli_query($connection, $query)){
         echo "<script>alert('Delete Student Successful')</script>";
    }
   
}
function get_all_students($course){
    global $connection;


       $query = $course == 'BSEE' ? "SELECT * FROM student WHERE student_course = 'BSEE'" : 
         ($course == 'BSIT' ? "SELECT * FROM student WHERE student_course = 'BSIT'" : 
         ($course == 'BSCS' ? "SELECT * FROM student WHERE student_course = 'BSCS'" : 
         ($course == 'BSCE' ? "SELECT * FROM student WHERE student_course = 'BSCE'" : 
         "SELECT * FROM student ")));

     


    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $students = [];
        while ($row = mysqli_fetch_array($result)) {
            $students[] = $row;
        }
    }
    return $students;

}
if(isset($_POST['filterCourse'])){
    $select =  $_POST['selectedCourse'];

    $filtered_course =  get_all_students($select);
}

