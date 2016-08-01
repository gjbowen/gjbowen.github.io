<?php
include 'ip.php';
include 'header.php';
include 'sidebar.php';
?>
<title>Greg Bowen | CONTACT</title>
<div id="content">
	<i><b>Contact</b></i><br>
	<p>Please feel free to fill out a form and I'll be happy to get back to you.</p>

	<?php 
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$regarding = $_POST['regarding'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$formcontent="From: $name \n Message: $message";
		$recipient = "gjbowen@ua.edu";
		$subject = "Contact Form";
		$mailheader = "From: $email \r\n";
		$output = "<br>UH OH! Your submission was not sent!";

		$errors="no";
		if($name==""){
			$output .= '<h4>Name was not entered!!</h4>';
			$errors="yes";
		}
		if($regarding==""){
			$output .= '<h4>Regarding was not entered!!</h4>';
			$errors="yes";
		}	
		if($message==""){
			$output .= '<h4>Email was not entered!!</h4>';
			$errors="yes";
		}

		if($email==""){
			$output .= '<h4>A message was not entered!!</h4>';
			$errors="yes";
		}

		if($errors=="no"){
			mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");

			echo "<br>Thank You! Your message has been sent.";
		}
		else{
			$output .= "<br>";
			echo $output ;
		}
	}
	?>

	<h2>
		<form action="contact.php" method="POST">
			Name: <input type="text" name="name"><br>
			Email: <input type="text" name="email"><br>
			Subject: <input type="text" name="regarding"><br>
			Message: <br><textarea name="message" rows="12" cols="100"></textarea><br>
			<input type="submit" name="submit" id="submit" value="Submit"><input type="reset" value="Clear">
		</form>
	</h2>

</div>

<?php
include 'footer.php';
?>

