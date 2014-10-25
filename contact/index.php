<?php 

require_once("../inc/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = trim($_POST["name"]);
	$email = trim($_POST["email"]);
	$message = trim($_POST["message"]);
	
	$error_message = array();

	if ($name == "" OR $email == "" OR $message == "") {
		$error_message[] = "Please enter your name, email address, and message.";
	}

	
		foreach( $_POST as $value ){
			if( stripos($value, 'Content_Type;') !== FALSE ){
				$error_message[] = "There was a problem with the infomation you entered.";
				exit;
			}
		}
	

	if($_POST["address"] != "") {
		$error_message[] = "Your form submission has an error.";
	}

	require_once(ROOT_PATH . "inc/phpmailer/class.phpmailer.php");
	$mail = new PHPmailer();

	if(!$mail->ValidateAddress($email)) {
		$error_message[] = "Please enter a valid email address.";
	}

	if(!isset($error_message)) {
		$email_body = "";
		$email_body = $email_body . "Name: " . $name . "<br>";
		$email_body = $email_body . "Email: " . $email . "<br>";
		$email_body = $email_body . "Message: " . $message;


		// TODO: Send Email


		$mail->SetFrom($email,$name);

		$address = "orders@flockofthree.com";
		$mail->AddAddress($address, "Flock of Three");
		$mail->Subject = "Flock of Three Contact Form Submission | " . $name;
		$mail->msgHTML($email_body);

		if($mail->Send()) {
			header("Location: " . BASE_URL . "contact/thanks/");
			exit;
		} else {
			$error_message[] = "There was a problem sending the email: " . $mail->ErrorInfo;
			exit;
		}

	}	

}
?>	
<?php 
$pageTitle = "Contact Flock Of Three";
$section = "contact";
include(ROOT_PATH . 'inc/header.php'); 
?>

	<div class="section page">

		<div class="wrapper">

			<h1>Contact</h1>

			<?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>
				<p>Thanks for the email! I&rsquo;ll be in touch shortly.</p>
			<?php } else { ?>


				<?php
					if (!isset($error_message)) {				
						echo '<p>I&rsquo;d love to hear from you! Complete the form to send me an email.</p>';						
					} else {
						foreach($error_message as $error){
							echo '<p class="message">' . $error . '</p>';
						}
					}
				?>

				<form method="post" action="<?php echo BASE_URL; ?>contact/">

					<table>
						<tr>
							<th>
								<label for="name">Name</label>
							</th>
							<td>
								<input type="text" name="name" id="name" value="<?php if (isset($name)) { echo htmlspecialchars($name); } ?>">
							</td>
						</tr>	
						<tr>
							<th>
								<label for="email">Email</label>
							</th>
							<td>
								<input type="text" name="email" id="email" value="<?php if (isset($email)) { echo htmlspecialchars($email); } ?>">
							</td>
						</tr>
						<tr>
							<th>
								<label for="message">Message</label>
							</th>
							<td>
								<textarea name="message" id="message"><?php if (isset($message)) { echo htmlspecialchars($message); } ?></textarea>
							</td>
						</tr>
						<tr>
							<th>
								<label for="reason">Reason for inquiry</label>
							</th>
							<td>
								<select name="reason" id="reason">
									<option value="Returns">Returns</option>
									<option value="Orders">Orders</option>
									<option value="Other">Other</option>
								</select>	
							</td>	
						</tr>
						<tr style="display: none;">
							<th>
								<label for="address">Address</label>
							</th>
							<td>
								<input type="text" name="address" id="address">
								<p>Humans, please leave this field blank.</p>
							</td>
						</tr>		
					</table>
					<input type="submit" value"send">	

				</form>	

			<?php } ?>

		</div>	

	</div>	

<?php include(ROOT_PATH . 'inc/footer.php'); ?>	