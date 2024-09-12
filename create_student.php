<?php

session_start();
require_once "./dp_connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(!($_POST['first_name'] == '' or $_POST['last_name'] == '' or $_POST['phone'] == '')){
        $f_name = $_POST["first_name"];
        $l_name = $_POST["last_name"];
        $phone = $_POST["phone"];
        
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

        $query = mysqli_query($connect, "INSERT INTO students (first_name, last_name, phone , image) VALUES ('$f_name', '$l_name' , '$phone' , '$newPath' )");

    //validation
    if($query){
        
        $_SESSION['success'] = 'Student Added successfully!';
        header('location: ./index.php');
        
        mysqli_close($connect);
        exit();
    }else{
        echo 'error:' . mysqli_error($connect);
    } 
    }
    else{
        echo '<h2>Error: Please fill in all the required fields.</h2>';
    }
}

