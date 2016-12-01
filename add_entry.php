<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Entries</title>
	
	<!-- CSS Stylesheet. -->
	<link href="css/stylesheet.css" rel="stylesheet" >
	
	<!-- Style new HTML5 elements. -->
	<!--[if lt IE 9]>
		<script src="js/html5-shiv.js"><.script>
	<![endif] -->

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
					<li><a href="view_entries.php">View Content</a></li>
					<li><a href="add_entry.html">Add Content</a></li>	
				</ul><!-- End of nav-main. -->
			</nav><!-- End of navigation. -->
		</div><!-- End of masthead. -->

		<div id="content">
			<br />
			<h2>Add Content</h2>
			<div id="entries">

				<?php // Adds new content to the database.
									
				if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { 
								
					// Connect and select.
					$dbc = mysql_connect('localhost', 'root', '');
					mysql_select_db('myblog', $dbc);
										
					// Validate the form data:
					$problem = FALSE;
					if(!empty($_POST['title']) && !empty($_POST['entry'])) {
						$title = mysql_real_escape_string(trim(strip_tags($_POST['title'])), $dbc);
						$entry = mysql_real_escape_string(trim(strip_tags($_POST['entry'])), $dbc);		
					} else {
						print '<p style="color:red;">Please submit both a title and an entry.</p>';
						$problem = TRUE;
					}
					if (!$problem) {
							
						// Define the query:
						$query = "INSERT INTO entries (entry_id, title, entry, date_entered) VALUES (0, '$title', '$entry', NOW())";
						
						// Execute the query:
						if (@mysql_query($query, $dbc)) {
							print '<p>The blog entry has been added! <br /><br />Go back to <a href="view_entries.php">current entries</a>.</p>';
						} else {
							print '<p style="color:red;">Could not add entry because <br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
						}
					
					} // No problem.

					mysql_close($dbc); // Close the connection.
				}
						
				?>
			</div><!-- End of entries. -->
		</div><!-- End of content. -->
			
		
		
	</div><!-- End of page. -->
		
  </body>

</html> 