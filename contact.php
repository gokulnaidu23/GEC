<?php

//php comments can be made with 2 forward slashes
//php code for sending an email

//include our php classes that send the email

	include_once('classes/class.phpmailer.php');
	include("classes/class.smtp.php");

//create an if structure to test if the submit button has been pushed

	if (isset($_POST['submit'])){

	$studentName = $_POST['studentname']; //created from the value of the html input with attribute name="studentname"
	$studentId = $_POST['studentid']; //created from the value of the html select with attribute name="studentid"
	$studentEmail = $_POST['studentemail']; //created from the value of the html input with attribute name="studentid"
	$studentMajor = $_POST['studentmajor']; //created from the value of the html radio buttons all with name=studentmajor

	$mail = new PHPMailer();

	$mail->IsSMTP();               // set mailer to use SMTP to relay against the IIT mail server
	$mail->Host = "mail.iit.edu";  // specify main and backup server

	$mail->From = "scarlata@iit.edu";  // your iit email address goes here
	$mail->FromName = "Website Contact Form";
	$mail->AddAddress("gnaidu1@iit.edu", "Gokul Naidu"); //add your iit email address and name
	$mail->AddReplyTo("gnaidu1@iit.edu", "Website developer");  //add your iit email address and name

	$mail->WordWrap = 60;   // set word wrap to 60 characters
	$mail->IsHTML(true);    // set email format to HTML

	$mail->Subject = "Response form from example website";  //set the email subject line

// creating the email body text

	$mail->Body =
	"Name: " . $studentName .
	"<br /> Email: " . $studentEmail .
	"<br /> Major: " . $studentMajor .
	"<br /> Student Id: " . $studentId;



	if(!$mail->Send())
	{
		echo "Message could not be sent. <p>";
		echo "Mailer Error: " . $mail->ErrorInfo;
		exit;
	}

	$cssclass = "hideform";
	$feedback= "Thanks, your information has been sent to GEC";
}
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="css/Untitled_1.css" media="screen"/>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="js/dropdown.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

<title>Contact us</title>

</head>


<!--  include the top navigation and logo section -->
<?php
include "includes/nav.html";
?>
<br>
<br>
<br>
<br>
<br>
<br>
<!--  COMMENT // start of the form table with html form-->

<div><?php echo $feedback; ?></div>
<div class="<?php echo $cssclass; ?>">
<form method="post" action="contact.php">

<div>fill out the following</div>
<br />
<br />

<table>
<!--  Start A Row-->
	<tr>
		<div class="row">
        <!--  A cell-->
			<td><label for="studentname">Name</label></td>
        <!--  A cell-->
			<td><input id="studentname" name="studentname" type="text" /></td>
		</div>
<!-- End Row -->
	</tr>
	<tr>
		<div class="row">
			<td><label for="studentid">Already registered?</label></td>
			<td><select id="studentid" name="request info">
					<option value="some option">yes</option>
					<option value="another option">no</option>
			</select></td>
		</div>
    </tr>
	<tr>
		<div class="row">
			<td><label for="studentemail">E-mail</label></td>
			<td><input id="studentemail" name="studentemail" type="email" /></td>
		</div>
    </tr>
	<tr>
		<div class="row">
			<td colspan="2"><fieldset>
			<legend>Sex</legend>
				<span><input value="itm" id="studentmajor_1" name="studentmajor" type="radio" /> <label for="studentmajor_1">male</label></span>
 				<span><input value="ece" id="studentmajor_2" name="studentmajor" type="radio" /> <label for="studentmajor_2">female</label></span>
 			
 			</fieldset></td>
		</div>
   	</tr>
	<tr>
		<div class="row">
			<td><label for="studenttranscript">File</label></td>
			<td><input id="studenttranscript" name="studenttranscript" type="file" /></td>
		</div>
    </tr>
	<tr>
		<div class="row">
		<td colspan="2"><input type="submit" name="submit" value="submit this form" /></td>
		</div>
        </tr>
</table>
</form>
</div>
<br><br><br><br><br>
<!--  include the right column -->
<?php
include "includes/end.html";
?>

</div>

</body>

</html>