<?php
  session_start();
  if (isset($_SESSION['session_id'])) {
    header('Location: login2.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

<html lang="pl">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task system</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


</head>
 <body>
 <div class="textsIndex" >
<?php
require('Header.php');
?>
	<div style='text-align:center'>
	<p class="textsIndex">
		Welcome to Task management tool. This tool will help you to keep track 
		<br>
		of your projects and make sure you submit them on time. To create a new project press
		<br>
		the create button below!<br>
	</p>
	<div style='text-align:center' class = "container">
	<a href = "Task.php" >Task</a>
	<a href ="Projects.php">Projects</a>
	<a href="disconessione.php">logout</a>
	</div>
	<?php
	?>
	</div>
<?php
	require('Footer.php');
?>	
</div>
</body>
</html>
	
