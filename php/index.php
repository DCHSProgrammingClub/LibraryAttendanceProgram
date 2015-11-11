<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>
<?php
include('private/database.php');

function logVisit($id) {
		query('INSERT INTO `visits`(`s_id`, `time`) VALUES ('.$id.','.time().')');
}

function test_id($id) {
	connect();
	$rs = query('SELECT * FROM `users` WHERE `id` = '.$id);
	if($rs->num_rows == 1) {
		free($rs);
		return true;
	}
	free($rs);
	return false;
}

function get_name($id) {
	$rs = query('SELECT * FROM `users` WHERE `id` = '.$id);
	$tmp = $rs->fetch_assoc()['fname'];
	free($rs);
	return $tmp;
}


function message() {
	if(isset( $_GET['id'] ) && !empty( $_GET['id'] )) {
		$id = htmlspecialchars($_GET['id']);
		if(!is_numeric($id)) {
			echo 'ERROR: ID should be a number';
		}
		else {
			if(test_id($id)) {
				echo 'Hello '.get_name($id);
				logVisit($id);
			}
			else {
				echo 'ERROR: ID not found';
			}
		}
	}
		//NO ID FOUND, NoTHING
}

?>

<html>
	<head>
		<title>Library Login</title>
	</head>
	<body>
		<center>
			<h3>Login</h3>
			<form method='get'>
				<input type='text' name='id' />
				<input type='submit' />
				<br /><h5>
<?php
	message();
?>
				</h5>
		</center>
	</body>
</html>
