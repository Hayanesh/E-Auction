<html>
    <head>
        <meta http-equiv="refresh" content="0; url=index.html" />
    </head>
<?php

$servername = "localhost";
$username = "hayanesh";
$password = "";
$dbname = "eauction";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
echo 'Error';
}

$sql = "INSERT INTO member (name,email,password,gender,number)
VALUES ('".$_POST["UN"]."','".$_POST["EI"]."','".$_POST["PWord"]."','".$_POST["sex"]."','".$_POST["contact"]."')";

if ($conn->query($sql) === TRUE) {
echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}

$conn->close();

?>
    
</html>