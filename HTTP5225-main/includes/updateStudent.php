<?php
if(isset($_POST['updateStudent'])){
    //Arrays
//print_r($_POST)
$id =$_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST ['lname'];
$marks = $_POST ['marks'];
$imageURL = $_POST ['imageURL'];

//Connection string
include('../includes/connect.php');
$query = "UPDATE students SET fname='$fname', lname='$lname', marks='$marks', imageURL='$imageURL' WHERE `id` = '$id'";
//change grades on phpmyadmin and select 'null' to make it accept null values
$student = mysqli_query($connect, $query);

if($student){
    header("Location:../index.php");
    //echo "Success";
}else{
    echo "Failed: " . mysqli_error($connect);
}
}else{
    echo "You should not be here";
}
?>