<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_GET['id'];
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
    <a href="./students.php"><i class="fas fa-arrow-left" class="i"></i></a> <span>Back</span>
    <div>
        <h1>CRUD System</h1>
    <form action="./create_student_back.php?id= <?php echo $id ?>" method="post" enctype="multipart/form-data">
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
</body>
</html>