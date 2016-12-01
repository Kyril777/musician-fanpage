<?php

	if($dbc = @mysql_connect('localhost', 'root', '')){ // Delete password upon completion.
		
		// Handle the error if the database couldn't be selected"
		if(!@mysql_select_db('myblog', $dbc)) {
			print '<p>Could not select the database because:<br />' . mysql_error($dbc) . '.</p>';
			mysql_close($dbc);
			$dbc = FALSE;
		}

	} else { // Connection failure:
	
		print '<p>Could not connect to MySQL because:<br />' . mysql_error($dbc) . '.</p>';

	}
	
	if($dbc) {
	
		// Define the query:
		$query = 'CREATE TABLE entries (
		entry_id INT signed NOT NULL AUTO_INCREMENT PRIMARY KEY,
		title VARCHAR(100) NOT NULL,
		entry TEXT NOT NULL,
		date_entered DATETIME NOT NULL
		)';
		
		// Execute the query:
		if(@mysql_query($query, $dbc)) {
			print '<p>The table has been created!</p>';
		} else {
			print '<p style="color:red;">Could not create the table because:<br/>' . mysql_error($dbc) . '</p><p>The query being run was: ' . $query . '</p>';	
		}
		
		mysql_close($dbc); // Close the connection.

	}
	
?>