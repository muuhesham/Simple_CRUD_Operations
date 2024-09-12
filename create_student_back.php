<?php

session_start();
require_once "./dp_connect.php";

$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!($_POST['first_name'] == '' or $_POST['last_name'] == '' or $_POST['phone'] == '')){
        $f_name = $_POST["first_name"];
        $l_name = $_POST["last_name"];
        $phone = $_POST["phone"];
    
        $imgTem = $_FILES['image']['tmp_name'];
        $imgName = $_FILES['image']['name'];
        $nameArr = explode( '.' , $imgName);
        $ext = end($nameArr);
        $newPath = './images/' . time() . '.' . $ext;
        move_uploaded_file($imgTem, $newPath);

    $result = mysqli_query($connect, "SELECT image FROM students WHERE id = $id");
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $oldImagePath = $row['image'];

                if ($oldImagePath && $oldImagePath !== 'https://static.vecteezy.com/system/resources/previews/016/079/150/non_2x/user-profile-account-or-contacts-silhouette-icon-isolated-on-white-background-free-vector.jpg') {
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
            }
        } 
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
            // file upload
                $imgTem = $_FILES['image']['tmp_name'];
                $imgName = $_FILES['image']['name'];
                $nameArr = explode( '.' , $imgName);
                $ext = end($nameArr);
                $newPath = './images/' . time() . '.' . $ext;
                move_uploaded_file($imgTem, $newPath);
        }else{
            $newPath = 'https://static.vecteezy.com/system/resources/previews/016/079/150/non_2x/user-profile-account-or-contacts-silhouette-icon-isolated-on-white-background-free-vector.jpg';
    }

    $query = mysqli_query($connect, "UPDATE students SET first_name = '$f_name', last_name = '$l_name', phone = '$phone' , image = '$newPath' WHERE id = '$id' ");

    if($query){
        $_SESSION['updated'] = 'Student Updated successfully!';
        header('location: ./students.php');

        mysqli_close($connect);
        exit();
    }
    else{
        echo 'error:' . mysqli_error($connect);
    }
    }
    else{
    echo '<h2>Error: Please fill in all the required fields.</h2>';
    }
