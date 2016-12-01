<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Castro's Template</title>
	<link href="css/stylesheet.css" rel="stylesheet" >

  </head>

<body>
	<div class="page">
		<!-- Masthead. -->
		<div class="masthead" role="banner">
			<div id="header">				
				<h1 id="page_header">Control Page</h1>
			</div><!-- End of header. -->
		
			<nav role="navigation">
				<ul class="nav-main">
					<li id="active"><a href="view_entries.php">View Content</a></li>
					<li><a href="add_entry.html">Add Content</a></li>	
				</ul><!-- End of nav-main. -->
			</nav><!-- End of navigation. -->
		</div><!-- End of masthead. -->

		<div id="content">
			<br />
			<h2>Delete an Entry</h2>
			<div id="entries">
				<?php // Deletes a content entry. 

				// Connect and select:
				$dbc = @mysql_connect('localhost', 'root', '');
				mysql_select_db('myblog', $dbc);

				if (isset($_GET['id']) && is_numeric($_GET['id']) ) { // Display the entry in a form:

					// Define the query:
					$query = "SELECT title, entry FROM entries WHERE entry_id={$_GET['id']}";
					if ($r = mysql_query($query, $dbc)) { // Run the query.
					
						$row = mysql_fetch_array($r); // Retrieve the information
					
						// Make the form:
						print '<form action="delete_entry.php" method="post">
						<p>Are you sure you want to delete this entry?</p><br />
						<small><p><h4>' . $row['title'] . '</h4>' .
						$row['entry'] . '<br /></small><br />
						<input type="hidden" name="id" value="' . $_GET['id'] . '" />
						<input class="submitButton" type="submit" name="submit" value="Delete this Entry!" /></p>
						</form>';

					} else { // Couldn't get the information.
						print '<p style="color: red;">Could not retrieve the blog entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
					}
						
				} elseif (isset($_POST['id']) && is_numeric($_POST['id'])) { // Handle the form.

					// Define the query:
					$query = "DELETE FROM entries WHERE entry_id={$_POST['id']} LIMIT 1";
					$r = mysql_query($query, $dbc); // Execute the query.
						
					// Report the result:
					if(mysql_affected_rows($dbc) == 1) {
						print '<p>The blog has been deleted.<br /><br />
						<a href="view_entries.php">Go Back to Entries</a>
						
						</p>';
					} else {
						print '<p style="color:red;">Could not delete the blog entry because:<br />' . mysql_error($dbc) . '</p><p>The query being run was: ' . $query . '</p>';
					}
					
				} else { // No ID received.
					print '<p style="color: red;">This page has been accessed in error.</p>';	
				} // End of main IF.

				mysql_close($dbc); // Close the connection.
						


				?>
			</div><!-- End of entries. -->
		</div><!-- End of content. -->
		
	</div><!-- End of page. -->
		
</body>

</html> 