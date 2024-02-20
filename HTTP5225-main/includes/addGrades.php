<?php
//if(isset($_POST['grades'])){
if(isset($_POST['submit'])){

//Arrays
//print_r($_POST)
$fname = $_POST['fname'];
$lname = $_POST ['lname'];
$marks = $_POST ['marks'];
$imageURL = $_POST ['imageURL'];

//Connection string
include('../includes/connect.php');
$query = "INSERT INTO students (fname, lname, marks, imageURL) 
        VALUES (
            '" . mysqli_real_escape_string( $connect, $fname) ."',
            '" . mysqli_real_escape_string( $connect, $lname) ."',
            '" . mysqli_real_escape_string( $connect, $marks) ."',
            '" . mysqli_real_escape_string( $connect, $imageURL)."')";

//change grades on phpmyadmin and select 'null' to make it accept null values

$student = mysqli_query($connect, $query);

if($student){
    echo "Success";
}else{
    echo "Failed: " . mysqli_error($connect);
}
}else{
    echo "You should not be here";
}
?>