<?php


	
	echo "Nome:";
	echo $_POST['name'];

	echo '<br>';

	echo "Email:";
	echo $_POST['email'];

	echo "<br>";

	echo "Categoria:";
	echo $_POST['category'];

	echo "Mensagem:";
	echo $_POST['message'];
	
	

	//Here starts the PHPMailer Code.

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //Variables

    //SMTP User.
    $sender_mail = 'smtpserverfuccingtest@gmail.com';
    //SMTP User Password.
    $sender_pass = '21043737';
    //The email that will recive the message.
    $mail_address = 'antonio.cestari@escoladefinancascestari.com.br';

    //The name of the person.
    $name = $_POST['name'];
    //The subject of the email.
    $subject = $_POST['category'];
    //The message of the email.
    $message = "Email:".$_POST["email"]."<br>"."Messagem:".$_POST["message"];

	try {

	    //Server settings
	    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
	    $mail->isSMTP();                                            // Send using SMTP
	    $mail->Host       = 'smtp.gmail.com ';                    // Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = $sender_mail;                     // SMTP username
	    $mail->Password   = $sender_pass;                               // SMTP password
	    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
	    $mail->Port       = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom($sender_mail, $name);
	    $mail->addAddress($mail_address, $name);     // Add a recipient
	    //$mail->addAddress('ellen@example.com');               // Name is optional
	    //$mail->addReplyTo('info@example.com', 'Information');
	    //$mail->addCC('cc@example.com');
	    //$mail->addBCC('bcc@example.com');

	    // Attachments
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    // Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $subject;
	    $mail->Body    = $message;
	    $mail->AltBody = $message;

	    $mail->send();
	    //echo 'Message has been sent';
	    echo "<script>window.location.assign('../../index.html')</script>";

	} catch (Exception $e) {

	    echo "<script>window.location.assign('../../index.html')</script>";

	}


	
?>