
<!DOCTYPE html>
<?php include('databaseConnect.php') ?>

<?php 
session_start();
if(isset($_POST["submit"])){
	
	$sql = "update `tasks` set `taskName`='".$_POST['taskName']."',`taskStartDate`='".$_POST['taskSDate']."', `taskDueDate`='".$_POST['taskDDate']."', `taskPriority`='".$_POST['priority']."',`projectID`='".$_POST['ProjectId']."',`taskDone`='".$_POST['done']."' WHERE taskID = '".$_POST['taskID']."'";
	
	if ($conn->query($sql) == TRUE) 
	{
		echo "New record created successfully";	
	} 
	else 
	{
		echo "Error creating record: " . $conn->error;
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	header("location:Task.php");
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

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
 <body>
 <div class = "wrapper">
<?php
	require('Header.php');
?>
<?php
	$sql = "SELECT taskName, taskStartDate, taskDueDate, taskPriority, taskDone, projectID FROM tasks WHERE taskID = '".$_GET['taskID']."'";
	$edit = $conn -> query($sql);
	$edit = $edit -> fetch_assoc();
?>	
 <div class="lg-6 whoami">
    </div>
<form action="" method="post" class="container projectListContainer">
	<input type="hidden" value="<?php echo $_GET['taskID'] ?>" name="taskID">
	<input type="text" value="<?php echo $edit['taskName'] ?>" required name="taskName" placeholder="Task Name here">
	<input type="date" value="<?php echo $edit['taskStartDate'] ?>" required name="taskSDate" placeholder="Task Date here">
	<input type="date" value="<?php echo $edit['taskDueDate'] ?>" required name="taskDDate" placeholder="Task Date here">
</div>
<div class="container projectListContainer">
	<select required name="priority">
			<option value="">Select Priority</option>
			<option value ="high" <?php if($edit['taskPriority'] == 'High') { echo "selected";} ?>>High</option>
			<option value="medium" <?php if($edit['taskPriority'] == 'Medium') { echo "selected";} ?>>Medium</option>
			<option value="low" <?php if($edit['taskPriority'] == 'Low') { echo "selected";} ?>>Low</option>
			</div>
		
	</select>
			<select required name="ProjectId"> 
			<option value=""> Select project </option>
			<?php
				$sql = "SELECT * FROM project";
				$result = $conn ->query($sql);
				while($row = $result ->fetch_assoc()){
					echo '<option ' ;
					if($row['projectID'] == $edit['projectID']) { echo "selected"; }
					echo ' value ="',$row['projectID'],'">',$row['projectName'],'</option>';
				}
			?>
	</select>
	<select name="done">
		<option value="yes" <?php if($edit['taskDone'] == 'yes') { echo "selected";} ?>>Yes</option>
		<option value="no" <?php if($edit['taskDone'] == 'no') { echo "selected";} ?>>No</option>
	</select>

	<input type="submit" name="submit" class="btn">

	</div>	
</form>

<?php
	require('Footer.php');
?>	
</div>
</body>
</html>
			
 
 
