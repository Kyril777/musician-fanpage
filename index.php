<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Castro's Template</title>
	
	<!-- CSS Stylesheet. -->
	<link href="css/style.css" rel="stylesheet" >
	
	<!-- Style new HTML5 elements. -->
	<!--[if lt IE 9]>
		<script src="js/html5-shiv.js"><.script>
	<![endif] -->
	
</head>

<body>
	<div id="page">
		<!-- Masthead. -->
		<?php include('header.php'); ?>
		
		<!-- Main content. -->
		<div id="content">
			<div id="sidebar">
				<h2>Recent Performance<h2>
				<iframe width="325" height="183" src="http://www.youtube.com/embed/"></iframe>
				
				<p class="quote">Music expresses that which cannot be put into words and that which cannot remain silent.<br/>- <em>Victor Hugo</em></p>
			</div><!-- End of sidebar. -->
			
			<div id="entries">
				<h1>Welcome to Marte's Official Website</h1>
				<hr>
					<?php 
					/* This script retrieves blog entries from the database. */

					// Connect and select:
					$dbc = mysql_connect('localhost', 'blogger', 'XGFPbacjaUTjFrKp');
					mysql_select_db('myblog', $dbc);

					// Define the query:
					$query = 'SELECT * FROM entries ORDER BY date_entered DESC';

					if($r = mysql_query($query, $dbc)) { // Run the query.

						// Retrieve and print every record:
						while($row = mysql_fetch_array($r)) {
							print "<p><h4>{$row['title']}</h4>
								{$row['entry']}<br/><br/>
							</p><hr />\n";
						}
							
					} else { // Query didn't run.
						print '<p style="color:red;">Could not retrieve the data because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
					} // End of query IF.

					mysql_close($dbc); // Close the connection.
					?>
			</div><!-- End of entries. -->
		</div><!-- End of content. -->

		<!-- Footer. -->
		<?php include("footer.php");  ?>
		
	</div><!-- End of page. -->
		
</body>
</html> 
