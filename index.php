<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD System Students</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div>
        <h1>CRUD System</h1>
    <form action="./create_student.php" method="post" enctype="multipart/form-data">
        <label>First Name</label>
        <input type="text" name="first_name" required>
        <label>Last Name</label>
        <input type="text" name="last_name" required>
        <label>Phone</label>
        <input type="tel" name="phone">
        <label>Image</label>
        <input type="file" name="image">
        <input type="submit">
        <a href="./students.php">Show Data</a>
    </form>

<?php
    if(isset($_SESSION["success"])){
        echo '<p class="success-message">' .$_SESSION['success']. '</p>';
        unset($_SESSION['success']);
    }
?>

    </div>
</body>
</html>