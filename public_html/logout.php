<html>
    
    <head>
        <meta http-equiv="refresh" content="0; url=index.html">
    </head>
<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
$_SESSION["logout"]=date("h:i:sa");
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
        $sql = "SELECT MAX(id)AS ID FROM sessiontrack";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
        $id = $row["ID"];
         $lin=date("d/M/Y h:i:sa");
         echo $lin;
        $s = "UPDATE sessiontrack SET logout = '$lin' where name ='".$_SESSION["uname"]."' AND id =$id";
        $conn->query($s);
        echo "<script>sessionStorage.removeItem('username');</script>";
$conn->close();
?>
    
</html>