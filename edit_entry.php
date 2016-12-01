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
			<div id="entries">
				<h2>Edit Your Content</h2>
				<br />
				<?php // Edit a content entry.

				// Connect and select:
				$dbc = mysql_connect('localhost', 'root', '');
				mysql_select_db('myblog', $dbc);

				if(isset($_GET['id']) && is_numeric($_GET['id'])) { // Display the entry form:

					// Define the query:
					$query = "SELECT title, entry FROM entries WHERE entry_id={$_GET['id']}";
					if($r = mysql_query($query, $dbc)) { // Run the query.
						
						$row = mysql_fetch_array($r); // Retrieve the information.
							
						// Make the form:
						print '<form action="edit_entry.php" method="POST">
						<p>Content Title: <input type="text" name="title" size="40" maxsize="100" value="' . htmlentities($row['title']) . '" /></p>
						<br />
						<p>Content Text: <textarea name="entry" cols="50" rows="8">' . htmlentities($row['entry']) . '</textarea></p>
						<br />
						<input type="hidden" name="id" value="' . $_GET['id'] . '" />
						<input class="submitButton" type="submit" name="submit" value="Update this Entry!" />
						</form>';
							
						// Update Times Content Has Been Updated:
						?><br /><h5>Previously updated on:</h5> <?php
						$query = 'SELECT * FROM entries ORDER BY date_entered DESC';

							if($r = mysql_query($query, $dbc)) { // Run the query.

							// Retrieve and print every record:
								while($row = mysql_fetch_array($r)) {
									print "<small><p>{$row['date_entered']}</p></small>";
								}
										
							}
							
							} else { // Couldn't get the information.
								print '<p style="color:red;">Could not retrieve the data because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
							}	
						
					} elseif (isset($_POST['id']) && is_numeric($_POST['id'])) {
						
						// Validate and secure the form data.
						$problem = FALSE;
						if(!empty($_POST['title']) && !empty($_POST['entry'])) {
							$title = mysql_real_escape_string(trim(strip_tags($_POST['title'])), $dbc);
							$entry = mysql_real_escape_string(nl2br(strip_tags($_POST['entry'])), $dbc);
						} else {
							print '<p style="color: red;">Please submit both a title and an entry.</p>';
							$problem = TRUE;
						}

						if(!$problem) {
							
							// Define the query.
							$query = "UPDATE entries SET title='$title', entry='$entry' WHERE entry_id={$_POST['id']}";
							$r = mysql_query($query, $dbc); // Execute the query.
								
							// Report on the result:
							if(mysql_affected_rows($dbc) == 1) {
								print '<p>The blog entry has been updated.</p><br />
									<a href="view_entries.php">Go back to Entries</a>';		
							} else {
								print '<p style="color:red;">Could not update entry because there are no changes in the title and the comments section. Return to the <a href="view_entries.php">entries page</a>.</p>';
							}
							
						} // No problem!
							
					} else {
						print '<p style="color:red;">This page has been accessed in error.</p>';
					}

				mysql_close($dbc); // Close the connection.
				?>
			</div><!-- End of entries. -->
		</div><!-- End of content. -->
	</div><!-- End of page. -->
</body>
</html>