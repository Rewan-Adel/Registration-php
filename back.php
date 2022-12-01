<?php  
//validation
$error_fields = array();
if(! isset($_POST['name']) && !empty($_POST['name']) ){
	$error_fields[] = "name";
	echo "enter name";
}
 if(! isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
	$error_fields[] = 'email';
}

 if(! isset($_POST['password'])){
	$error_fields[] = 'password';
}
 if(! isset($_POST['password'])){
	$error_fields[] = 'gender';
}

//-----------------------------------------------
if($error_fields){
	header("Location: form.php?error_fields=".implode(",", $error_fields));
	exit;
}
//check connection 
$conn = mysqli_connect('localhost', 'root','', 'db');
if($conn){
	echo "connection is successed";
}
else{
	echo mysqli_connect(), "failed";
}
//escape any special characters to avoid sql injection
$id = random_int(0, 20);
$name = mysqli_escape_string($conn, $_POST['name']); 
$pass = mysqli_escape_string($conn, $_POST['password']); 
$email = mysqli_escape_string($conn, $_POST['email']); 
$gender = isset($_POST['gender']);
//insert the data 
$query = "INSERT INTO users (id,name,passsword,email, gender) VALUES ('$id','$name','$pass', '$email' , '$gender' )";
$result = mysqli_query($conn, $query);
//$row = mysqli_fetch_assoc($result);
if($result){
	echo '<br>';
	echo "Thank you ".$_POST['name'];
}
else{
	echo mysqli_query;
	echo mysqli_error;
}
//close the connection
mysqli_close($conn);
?>
