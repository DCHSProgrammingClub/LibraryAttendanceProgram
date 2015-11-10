<?php
	$connect = mysqli_connect('localhost', 'root', "", 'root');

	if(!$connect)
	{
		die('could not connect to the server! '.mysql_error());
	}
	
	$id =  $_POST['studentID'];
	
	$sql = "SELECT `Number_Of_Visits` FROM `studentattendance` WHERE `Student_ID`=".$id;
	$result = mysqli_query($connect, $sql);
	if(mysqli_num_rows($result) != 0)
	{
		$row = mysqli_fetch_assoc($result);
	$num = $row["Number_Of_Visits"] + 1;
		$sql = "UPDATE `studentattendance` SET `Number_Of_Visits`=".$num." WHERE `Student_ID`=".$id;
		mysqli_query($connect , $sql);
	}
	else
	{
	
	}
?>
