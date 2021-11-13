
<!DOCTYPE html>

<?php include('databaseConnect.php') ?>


<?php

session_start();
if(isset($_GET['projectID'])){
	
	if(isset($_GET['done'])){
		$conn -> query("update project set done='yes' where projectID = '".$_GET['projectID']."'");
	}
	
	if(isset($_GET['delete'])){
		$conn -> query("delete from project where projectID = '".$_GET['projectID']."'");
	}
	
	header("location:Projects.php");exit();
	
}

?>

<html>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="#">
<title>Task system</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/custom.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</head>
 <tbody>
 <div class="container">
<?php
	require('HeaderForTask.php');
?>
<div  class="container projectListContainer">
<h1> All projects 	</h1>
<table class="project-list">
<tr> <th scope="col">Project Name</th> <th scope="col">Project Priority</th> <th scope="col">Delete</th> <th scope="col">Edit&#160;</th>  </th></tr>
	<?php
		$sql = "SELECT * FROM project";
		$result = $conn ->query($sql);
		while($row = $result ->fetch_assoc())
		{
			echo "<tr><td>",$row['projectName'],'</td><td>', $row['projectPrio'], "</td>
			<td><a class='edit' href='Projects.php?delete=1&projectID=",$row["projectID"],"'>&#10060</a></td>
			<td style='text-align:center'><a class='btn' href='EditProject.php?edit=1&projectID=",$row["projectID"],"'>Edit</a></td>
			</tr>";
		}

?>
</table>

	
<br> 

<form action="newProject.php" method="POST">
<div class="login-box">
	<input type="text" required name="projectName" placeholder="Project Name here">
	</div>
	<div class="login-box">
	<select  required name="priority" class="login-box">
		<option value="">Select Priority</option>
		<option value="High">High</option>
		<option value="Medium">Medium</option>
		<option value="Low">Low</option>
	</select>
	</div>
	<div class="login-box">
	<button type="submit" name="createProject" class="btn">Create Project</button>
		</div>
</form>
</div>
<?php
	require('Footer.php');
?>	
</div>
</tbody>
</html>
	
 
 
