
<?php
$error_err = array();
if(isset($_GET['error_fields']))
{
	$error_err = explode(",", $_GET['error_fields']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>  
<body>
<form method="post" action="back.php">
	<label>name</label>
	<input type="text" name="name" id="name">
	<?php if(in_array("name", $error_err)){echo "please, enter your name";} ?><br>

	<label>email</label>
	<input type="text" name="email" id="email">
	<?php if(in_array("email", $error_err))  echo "please, enter valid email"; ?><br>
	<label>password</label>
	<input type="password" name="password" id="password" ><?php if(in_array("password", $error_err)){echo "please, enter your password";}
	 ?><br>
	<input type="radio" name="gender" value="male" >male
	<input type="radio" name="gender"  value="female">female<br>
	<?php if(in_array("gender", $error_err)){echo "please, enter your gender";}?>
	<input type="submit" value="submit"  required><br>
</form>
</body>
</html>


