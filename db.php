<?php
//check connection 
$conn = mysqli_connect('localhost', 'root','', 'db');
if($conn){
	echo "connection is successed";
}

$query = "SELECT * FROM 'users'";
$result = mysqli_query($conn, $query);

//fetch every row in table 
$row = mysqli_fetch_assoc($result);
while($row){
	echo "ID: ".$row['id']."<br>";
	echo "Name: ".$row['name']."<br>";
	echo "Password: ".$row['password']."<br>";
	echo "Email: ".$row['email']."<br>";
	echo str_repeat('-', 50);
}
?>
