<?php

$connection = null;

function connect() {
		global $connection;
		if($connection) {
				die('Alreaddy connected to database');
		}
		$connection = mysqli_connect('localhost', 'root', 'root', 'library') or die('Issue');
		if(!$connection) {
				die('Can\'t connect to database '.mysql_error());
		}
}

function query($sql) {
		global $connection;
		if(!$connection) {
				die('Trying to query without database connection');
		}
		$result = $connection->query($sql);
		return $result;
}

function show($result) {
		if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
						foreach ($row as $column => $value) {
								//Column name is in $column, value in $value
								echo $column.': '.$value.'  ';
						}
				}
		}
		else {
				echo 'Nothing to display';
		}
}

function close() {
		global $connection;
		$connection->close();
}
?>
