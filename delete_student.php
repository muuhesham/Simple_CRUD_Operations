<?php

session_start();
require_once "./dp_connect.php";

if ($_SERVER["REQUEST_METHOD"] == 'GET'){
    $id = $_GET["id"];

    $result = mysqli_query($connect, "SELECT image FROM students WHERE id = '$id'");
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $imagePath = $row['image'];
        unlink($imagePath);

    $query = mysqli_query( $connect, "DELETE FROM students WHERE id = '$id' " );
    // validation -> affected rows or return true if query delete or false if query can't delete
    if($query){
        
        $_SESSION['deleted'] = 'Student Deleted successfully!';
        header('location: ./students.php');

        mysqli_close($connect);
        exit();
    }
    else{
        echo 'error:'. mysqli_error($connect);
    }
}}
