<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Post page</title>
</head>
<style>
    a{
    position: absolute;
    text-decoration: none;
    color: black;
    font-weight: bold;
    font-size: 20px;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    transition: color 0.2s;
    }
    a:hover{
        color: blue;
    }
</style>
<body>
<?php 
if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $regno = $_POST['regno'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $department = $_POST['dept'];
    $cgpa = $_POST['cgpa'];
    $skills = $_POST['skills'];

    $conn = mysqli_connect('localhost','root','1011','details');
    if(mysqli_connect_error()){
        die('connection error:'.mysqli_connect_error());
    }
    $stmt = $conn->prepare("INSERT INTO studentinfo (RegNo, Name, Email, Gender, Department, CGPA, Skills) VALUES(?,?,?,?,?,?,?)");
    $stmt->bind_param("issssds", $regno, $name, $email, $gender, $department, $cgpa, $skills);
    if($stmt->execute()){
        echo "Student details added successfully";
    }else{
        echo "Error:".$stmt->error;
    }
    $stmt->close();
    $conn->close();
}

?>
<a href="index.html">Back to Home Page</a>
</body>
</html>
