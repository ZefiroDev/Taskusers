
<?php include('databaseConnect.php') ?>

<?php 
session_start();
	if(isset($_POST['createProject'])){
		//validate and insert into database.
		$sql = "INSERT into project (projectName) VALUES ('".$_POST['projectName']."')";
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
 
 	
