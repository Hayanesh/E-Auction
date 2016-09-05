<html>
  
    <head>
       
    </head>
<?php
session_start();
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

$sql = "SELECT * from member where name='".$_SESSION["uname"]."'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
       $pn=$row["name"];
       $pe=$row["email"];
       $pc=$row["number"];
   }  
  
}
$s = "SELECT id FROM sessiontrack where name= '".$_SESSION["uname"]."' ORDER BY id DESC LIMIT 1,1";
$re = $conn->query($s);
$ro = $re->fetch_assoc();
$id = $ro["id"];
$sql = "SELECT * from sessiontrack where name = '".$_SESSION["uname"]."' AND id = $id" ;
$result1 = $conn->query($sql);
$r = $result1->fetch_assoc();
$login=$r["login"];
$logout=$r["logout"];
$conn->close();
?>
    <body>
        <div style="width: 50%;margin: 0 auto;height:300px;background-color: #DDD;box-shadow: 0 0 8px;margin-top: 100px">
            <h1 style="margin: 0 auto"><center>PROFILE<center></h1>
                        <form style="margin: 0 auto" action="logout.php">
                <input type="submit" name="logout" value="logout" style=" float: right;
          background: #1abc9c;
  padding: 10px;
  font-size: 20px;
  display: block;
  width: 100px;
  border: none;
  color: #fff;
  border-radius: 5px;margin-right: 10px">
                        <div style="text-indent:26px"><b>User Name : </b>
                        <span type="text" name="UN" id="UN" ><?php echo $pn ?></span><br><br>
                        </div>
                         <div style="text-indent:40px"><b>Email id :  </b>
                             <span  name="EI" id="EI" ><?php echo $pe ?></span><br><br>
                        </div>
                         <div style="text-indent:40px">
                            <b>Contact no :</b>
                            <span  id="contact" name="contact" style="width: 130px"><?php echo $pc ?></span><br><br>
                            </div>
                            <div style="text-indent:40px">
                            <b>Last Login:</b>
                            <span  id="login" name="login" style="width: 130px"><?php echo $login ?></span><br><br>
                            </div >
                            <div style="text-indent:40px">
                            <b>Last Logout:</b>
                            <span  id="logout" name="login" style="width: 130px"><?php echo $logout ?></span><br><br>
                            </div>
            
        </form>
                    
            </div>
    </body>
</html>