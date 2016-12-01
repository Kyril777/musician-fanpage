<?php

	// Connect to MySQL.
	if($dbc = mysql_connect('localhost', 'root', '')) { 
		print '<p>Succesfully connected to MySQL!</p>';

		// Create the database.
		if(@mysql_query('CREATE DATABASE myblog', $dbc)){
			print '<p>The database has been created!</p>';
		} else {
			print '<p>' . mysql_error($dbc) . '</p>';
		}
		
		// Select the database.
		if(mysql_select_db('myblog', $dbc)){
			print '<p>The database has been selected!</p>';
		} else {
			print '<p>Could not select the database because: ' . mysql_error($dbc) . '.</p>';
		}
		
		mysql_close($dbc); // Close the connection.
	
	} else {
	
		print "<p>Could not connect to MySQL: " . mysql_error() . "</p>";
		
	}
?>