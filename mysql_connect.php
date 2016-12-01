<?php
	if($dbc = @mysql_connect('localhost', 'username', '')) {
		print '<p>Succesfully connected to MySQL!</p>';
	} else {
		print "<p>Could not connect to MySQL: " . mysql_error() . "</p>";
	}
?>