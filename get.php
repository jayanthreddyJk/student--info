<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="./get.css">
</head>
<body>
    <nav>
        <h1>Student Details</h1>
    </nav>
    <h2>Student Details</h2>
    <table>
        <thead>
        <tr>
            <th>Reg No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Department</th>
            <th>CGPA</th>
            <th>Skills</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $conn = new mysqli("localhost","root","1011","details");
            if($conn->connect_error){
                die("Connection error:". $conn->connect_error);
            }
            $sql = "SELECT RegNo,Name,Email,Gender,Department,CGPA,Skills FROM studentinfo";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>". $row["RegNo"]."</td>";
                echo "<td>". $row["Name"]."</td>";
                echo "<td>". $row["Email"]."</td>";
                echo "<td>". $row["Gender"]."</td>";
                echo "<td>". $row["Department"]."</td>";
                echo "<td>". $row["CGPA"]."</td>";
                echo "<td>". $row["Skills"]."</td>";
                echo "</tr>";
                }
            }else{
            echo "<tr><td colspan = '7'> No Data Found </td></tr>";
            }
            $conn->close(); 
            ?>
        </tbody>
    </table>
    <div class="link-contain">
<a href="index.html" class="link">Back to Home Page</a>
</div>
</body>
</html>