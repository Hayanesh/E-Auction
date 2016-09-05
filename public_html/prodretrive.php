<html>
    
<?php
session_start();
$n = $_SESSION["uname"] ;
$url = $_GET['redirurl'];
$id = $_GET['id'];
$price = $_GET['price'];
$servername = "localhost";
$username = "hayanesh";
$password = "";
$dbname = "eauction";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
echo 'Error';
}

$sql = "SELECT start,lastbid from bid where id = '$id'";
$result = $conn->query($sql);



            
            
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       if($row["start"]<$price)
       {
            $sql1 = "UPDATE bid SET name = '$n',lastbid= $price WHERE id=$id";
            $conn->query($sql1);
           echo "<script type=text/javascript>localStorage.setItem('lastbid1','$price');alert('bid successfull'+'.$n.');window.location = '$url';</script>";
          
       }
       elseif ($row["lastbid"]<$price) {
           echo "<script type = text/javascript>localStorage.setItem('lastbid1','$price');alert('bid price is less than last bid');window.location = '$url';</script>";
   }
 else {
           echo "<script>alert('bid price is low');localStorage.setItem('lastbid1','".$row["lastbid"]."');window.location = '$url';</script>";
       }
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</html>