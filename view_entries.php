<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Castro's Template</title>
	
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
					<li id="not-active"><a href="">View Content</a></li>
					<li><a href="add_entry.html">Add Content</a></li>	
				</ul><!-- End of nav-main. -->
			</nav><!-- End of navigation. -->
		</div><!-- End of masthead. -->

		<div id="content">
			<p id="greeting"><small>Hello, Marte! The current time is 
				<strong><?php date_default_timezone_set('US/Eastern');
					$currenttime = date('h:i:s:u:A');
					list($hrs,$mins,$secs,$msecs,$meridian) = split(':',$currenttime);
					echo "$hrs:$mins:$secs $meridian\n";
				?></strong>
			</small></p>
			<h2>View Content</h2>
			<div id="entries">
				<?php // Retrieve blog entries from the database. 

				// Connect and select:
				$dbc = mysql_connect('localhost', 'root', '');
				mysql_select_db('myblog', $dbc);

				// Define the query:
				$query = 'SELECT * FROM entries ORDER BY date_entered DESC';

				if($r = mysql_query($query, $dbc)) { // Run the query.

					// Retrieve and print every record:
					while($row = mysql_fetch_array($r)) {
						print "<p><h4>{$row['title']}</h4>
							{$row['entry']}<br/><br/>
							<small><p>Posted on: <strong>{$row['date_entered']}</strong></p></small>
							<a class='button' href=\"edit_entry.php?id={$row['entry_id']}\">Edit</a>
							<a class='button' href=\"delete_entry.php?id={$row['entry_id']}\">Delete</a>
						</p><br /><hr />\n";
					}
							
				} else { // Query didn't run.
					print '<p style="color:red;">Could not retrieve the data because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
				} // End of query IF.

				mysql_close($dbc); // Close the connection.

				?>
			</div><!-- End of entries. -->
		</div><!-- End of content. -->
	</div><!-- End of page. -->
		
  </body>
</html> 
