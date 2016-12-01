<h3>Form Processing...</h3>
<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['telephone'];
	$telephone = str_replace("-", "", $phone);
	
	$comment = mysql_real_escape_string(trim(strip_tags($_POST['comments'])));
	$comment_length = strlen($comment);

	$now = time();
	$date = date('Y-m-d H:i:s', $now);
	
	$name_pattern = '/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s\'\-]{0,}$/';
	$email_pattern = '/^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$/';
	$phone_pattern = '/^[[:digit:]]{10}$/';

	if(!preg_match($name_pattern, $name)) {
		echo '<b>Please enter a valid name.</b><br/>';
	} 

	if(!preg_match($email_pattern, $email)) {
		echo '<b>Please enter a valid email address.</b><br/>';
	}
	
	if($comment_length <= 29){
		echo '<b>Comments must be at least 30 characters.</b>';
	} 

	if(preg_match($name_pattern, $name) && preg_match($email_pattern, $email) && $comment_length >= 30){
		echo '<b>The following data will be entered to the MySQL database: </b><br>
			Name: ' . $name . '<br>
			Email: ' . $email . '<br>
			Telephone number: ' . $telephone . '<br>
			Comments: ' . $comment . '<br>
			Entry date: ' .$date . '<br>';
	}
?>

<br><a href="../castro/index.php">Home</a>