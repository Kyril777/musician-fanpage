<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Castro's Template</title>

	<!-- CSS Stylesheet. -->
	<link href="css/style.css" rel="stylesheet" />
	
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
			<div id="entries">
				<h1>Book Marte</h1>
				<br/>
				<div id="form">
					<form name="contactform" method="post" action="html_form_send.php">
						<table>
							
							<!--  Name / Organization. -->
							<tr>
								<td valign="top">
									<label for="name"><b>Name / Organization</></label>
								</td>
								<td valign="top">
									<input type="text" id="name" name="name" maxlength="50" size="24">
								</td>
							</tr>
							 
							<!-- E-mail. -->
							<tr>
								<td valign="top">
									<label for="email"><b>Email Address</b></label>
								</td>
								<td valign="top">
									<input  type="text" id="email" name="email" maxlength="80" size="24">
								</td>
							</tr>
							
							<!-- Telephone number. -->
							<tr>
								<td valign="top">
									<label for="telephone"><b>Telephone Number</b></label>
								</td>
								<td valign="top">
									<input  type="text" id="telephone" name="telephone" maxlength="24" size="24">
								</td>
							</tr>
							
							<!-- Comments! -->
							<tr>
								<td valign="top">
									<label for="comments"><b>Comments</b></label>
								</td>
								<td valign="top">
									<textarea id="comments" name="comments" maxlength="1000" cols="24" rows="10"></textarea>
								</td>
							</tr>
							
							<!-- Submit button. -->
							<tr>
								<td colspan="2" style="text-align:center">
									<input type="submit" value="submit" class="button">
								</td>
							</tr>
							
						</table>
					</form>
				</div><!-- End of form id. -->
				
				<div id="contacts">
					<h3 id="contacts">Marte Can Also Be Reached Through the Following</h3>
					<hr/>
					<table>
						<tr><!-- The contacts. -->
							<th width="250px;"><span class="friend">Free the Mind</span></th>
							<th width="250px;><span class="friend">Eazy Studios</span></th>
							<th width="250px;><span class="friend">Adam Fermin</span></th>
						</tr>
						<tr><!-- The contacts' pictures. -->
							<td><img src="img/free_the_mind.png" alt="Free the Mind" style="width:200px;height:125px;" class="contacts_pic" /></td><!-- Img src: <a href='http://www.freepik.com/free-photo/happy-people-singing_860112.htm'>Designed by Freepik</a> -->
							<td><img src="img/eazy_studios.png" alt="Eazy Studios" style="width:200px;height:125px;" class="contacts_pic" /></td><!-- Img src: <a href='http://www.freepik.com/free-photo/close-up-of-sound-mixer-with-buttons_954069.htm'>Designed by Freepik</a> --></td>
							<td><img src="img/adam_fermin.png" alt="Adam Fermin" style="width:200px;height:125px;" class="contacts_pic" /></td><!-- Img src: <a href='http://www.freepik.com/free-photo/elegan-man-singing_916754.htm'>Designed by Freepik</a> --></td>
						</tr>
						<tr><!-- The contacts' e-mail addresses. -->
							<td><p class="contacts_email"><a href="#">laura@freethemind.com</a></p></td>
							<td><p class="contacts_email"><a href="#">pr@eazystudios.com</a></p></td>
							<td><p class="contacts_email"><a href="#">contact@afermin.com</a></p></td>
						</tr>
						<tr><!-- The contacts' telephone numbers. -->
							<td>212-555-9876</td>
							<td>718-555-6842</td>
							<td>310-555-3265</td>
						</tr>
					</table>
				</div><!-- End of contacts. -->
				
			</div><!-- End of entries. -->
		</div><!-- End of content. -->
			
		<!-- Footer. -->
		<?php include("footer.php"); ?>
		
	</div><!-- End of page. -->
		
</body>

</html> 
