<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
	die("connection failed:" .$conn->connect_error);
}
$email = $_POST['uemail'];
$password = $_POST['upass'];
if ((isset($email) && !empty($email)) &&
   (isset($password) && !empty($password)))
 {
	$sql = "SELECT email,password FROM login WHERE email = '$email' and password = '$password' ";
		$result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
      	  while ($row = $result->fetch_assoc()) {
      	  	//echo $row["email"];
      	  	 header('Location:welcome.php');
      	  }
      }else
      {

         echo '<script language="javascript">';
         echo 'alert("Incorrect Username and Password")';
         echo '</script>';
         
      	
      	 //header('Location:login.html');
      }
  }    
	
$conn->close();
 ?>