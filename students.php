<?php
session_start();
require_once "./dp_connect.php";

$query = mysqli_query($connect, "SELECT * FROM students");

if(!$query){
    echo 'error:'. mysqli_error($connect);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD System Students</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <a href="./index.php"><i class="fas fa-arrow-left" class="i"></i></a> <span>Back</span>

    <table>
    <thead>
        <th>
            ID
        </th>
        <th>
            First Name
        </th>
        <th>
            Last Name
        </th>
        <th>
            Phone
        </th>
        <th>
            Image
        </th>
    </thead>
    <tbody>

    <?php  
    // use return numbers rows selected from query
    if(mysqli_num_rows($query) > 0) {
        while($row = mysqli_fetch_assoc($query)) {
            $text = '<tr><td>';
            $text .= $row['id'];
            $text .= '</td> <td>';
            $text .= $row['first_name'];
            $text .= '</td> <td>';
            $text .= $row['last_name'];
            $text .= '</td><td>';
            $text .= $row['phone'];
            $text .= '</td><td>';
            $text .= "<img src='". $row["image"] ."' width='150'/>";
            $text .= '</td><td> <a href="./delete_student.php?id='. $row['id'].' "> Delete </a></td>';
            $text .= '<td><a href="./update_student.php?id='.$row['id'].' "> Update </a> </td></tr>';
            echo $text;
        }
    } else {
        echo ' <tr> <td colspan="5">No Records!</td> </tr> ';
    }
    ?>

    </tbody>
</table>

<?php
    if (isset($_SESSION['deleted'])){
        echo '<p class="success-message">' .$_SESSION['deleted']. '</p>';
        unset($_SESSION['deleted']);
    }
?>

<?php
    if (isset($_SESSION['updated'])){
        echo '<p class="success-message">' .$_SESSION['updated']. '</p>';
        unset($_SESSION['updated']);
    }
?>

<?php
        mysqli_close($connect);
?>

</body>
</html>

