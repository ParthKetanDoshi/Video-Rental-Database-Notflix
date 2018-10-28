<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "notflix";

	$conn = mysqli_connect($servername, $username, $password, $database);
	if ($conn->connect_error) 
	{
    	die("Connection failed: " . mysqli_connect_error());
	}

	$cid = $_POST['cid'];
	$vid = $_POST['vid'];
	$numvids = $_POST['numvids'];
	$issuedate = $_POST['issuedate'];
	$returndate = $_POST['returndate'];
	$cond = $_POST['cond'];
	$fine = $_POST['fine'];

	$sql="insert into issuereturn values('$cid','$vid','$numvids','$issuedate','$returndate','$cond','$fine')";
	
	if ($conn->query($sql) === TRUE) 
	{
		header('location:issuereturn.php');
	} 
	else 
	{
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>