
<!DOCTYPE html>
<?php include('databaseConnect.php') ?>

<?php 
session_start();
if(isset($_POST['submit'])){
	
	$sql = "UPDATE `project` SET `projectName`='".$_POST['projectName']."',`projectPrio`= '".$_POST['priority']."' WHERE projectID = '".$_POST['projectID']."'";
	
	if ($conn->query($sql) == TRUE) 
	{
		echo "New record created successfully";	
	} 
	else 
	{
		echo "Error creating record: " . $conn->error;
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	header("location:Projects.php");
	exit();
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

<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>



</head>
<body>
 <div class = "wrapper">
<?php
	require('Header.php');
	
?>
<?php
	//fetch all the details for this proj id
	$sql = "SELECT projectName, projectID, projectPrio FROM project WHERE projectID = '".$_GET['projectID']."'";
	$edit = $conn -> query($sql);
	$edit = $edit -> fetch_assoc();
?>		

<form action="" method="POST">
<div class="login-box2">
	<input type="hidden" value="<?php echo $_GET['projectID'] ?>" name="projectID">
	<input type="text" value="<?php echo $edit['projectName'] ?>" required name="projectName" placeholder="Project Name here">
	<select required name="priority" class="login-box">
			<option value="">Select Priority</option>
			<option value ="high" <?php if($edit['projectPrio'] == 'High') { echo "selected";} ?>>High</option>
			<option value="medium" <?php if($edit['projectPrio'] == 'Medium') { echo "selected";} ?>>Medium</option>
			<option value="low" <?php if($edit['projectPrio'] == 'Low') { echo "selected";} ?>>Low</option>
	</select>
		
	<input type="submit" name="submit" class="btn2">
	</div>	
</form>

		
