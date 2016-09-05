<!DOCTYPE html>
<?php
    $cookie_name = $_POST["UN"];
    setcookie("cookie[1]", $_POST['UN'], time()+360, "/"); // 86400 = 1 day
    setcookie("cookie[2]", $_POST['PWord'], time()+360, "/"); // 86400 = 1 day
?>


<html>
    
    <head>
        <meta http-equiv="refresh" content="0; url=index.html">
    </head>
<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
$_SESSION["login"]=date("d/M/Y/h:i:sa");
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

$sql = "SELECT * from member where name='".$_POST["UN"]."' AND password ='".$_POST["PWord"]."'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
     $_SESSION["uname"]= $_POST["UN"];
    $lin=date("d/M/Y h:i:sa");
    $sql1 = "INSERT INTO sessiontrack (name,login) VALUES ('".$_SESSION["uname"]."','$lin')";
    $conn->query($sql1);
    if(!isset($_COOKIE['cookie'])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
   foreach ($_COOKIE['cookie'] as $name => $value) {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        echo "$name : $value <br />\n";
        
    }
    
}
   
    echo "<script type='text/javascript'>sessionStorage.setItem('username','Welcome '+'".$_POST["UN"]."');
                                                        alert('Login successful');</script>";
    
    
}
 else {
    echo "<script type = 'text/javascript'>alert('User Invalid');</script>";
}
     

$conn->close();
?>
    
</html>