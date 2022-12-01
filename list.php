<?php
//check connection 
$conn = mysqli_connect('localhost', 'root','', 'db');
if(! $conn){
	echo"error" ;
	echo mysqli_connect_error();
	exit;
}
echo "successed";
//select all users
$query = "SELECT * FROM users";
$result = mysqli_query($conn , $query);

?>

<html>
<head>
	<title>Admin :: Users List</title>
</head>
<body>
	<h1>List Users</h1>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<!-- <th>ADMIN</th> -->
				<th>Action</th>
			</tr>
		</thead>
      <tbody>
        <?php
           //loop in rowset

         while($row= mysqli_fetch_assoc($result)){
         ?>
       <!-- tabel row tr -->
        <tr>
       <!-- tabel data td -->
        	<td><?= $row['id'] ?></td>
        	<td><?=  $row['name'] ?></td> 
        	<td><?= $row['email'] ?></td>
        	<!-- <td><?= ($row['admin']? 'yes':'no')?></td> -->
        	<td><a href="edit.php?id= <? = $row['id']?>">Edit || </a>
        		<a href="delete.php?id= <? = $row['id']?>">Delete</a>
        	</td>
        </tr>
        <?php
          }
        ?>
       </tbody>
       <tfoot>
       	<td colspan="2" style="text-align: center;" ><?= mysqli_num_rows($result); echo ' users'; ?></td>
       	<td colspan="3" style="text-align: center;" ><a href="add.php">Add Users</td>
       </tfoot>
	</table>
   </body>
</html>
<!-- dont forget to:
1-free result
2-diconnect db -->
<?php 
mysqli_free_result($result);
mysqli_close($conn);
?>