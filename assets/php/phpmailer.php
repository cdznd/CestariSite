<?php

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';
    

    


    //Variables

    //Server 
    $mail_host = 'smtp.gmail.com';
    $mail_host_username = 'smtpforwebetis@gmail.com';
    $mail_host_password = '21043737';

    //Recipients
    $mail_sender = 'smtpserverfuccingtest@gmail.com';
    $mail_sender_name = 'Email Site';

    $mail_address = 'comercial@
    escoladefinancascestari.com.br';

    //Content
    $content_name = $_POST['nameVar'];
    $content_email = $_POST['emailVar'];
    
    $content_subject = $_POST['subjectVar'];
    $content_message = $_POST['textVar'];

    $content_submit = $_POST['submitVar'];

    $content_final_message = "Nome:".$content_name."<br>"."Email:".$content_email."<br>"."Mensagem:".$content_message;
    
    //Validation
    $errorEmpty = false;
    $errorEmail = false;

    //Return
    $signal;
    $msg;

    /*
    $return_array = json_encode(array(
            
            'name' => "Name:".$content_name,
            'email' => "Email:".$content_email,
            'phone' => "Phone".$content_phone,
            'subject' => "Subject:".$content_subject,
            'message' => "Message:".$content_message
            
        ));

    echo $return_array;
    */
    
    
    if($content_name != null && $content_email =! null && $content_message){






    

    
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        

        //Server settings
        //Disable That shit below ************
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = $mail_host;                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $mail_host_username;                     // SMTP username
        $mail->Password   = $mail_host_password;                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($mail_sender,$mail_sender_name);
        $mail->addAddress($mail_address,'EasterEgg <:>');     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $content_subject;
        $mail->Body    = $content_final_message;
        $mail->AltBody = $content_final_message;

        //$mail->send();
        //echo 'Message has been sent';

        //$signal = 'good';
        //$msg = 'The messagem has been send with success';

        if(!$mail->send()) {

            $signal ='bad';
            $msg = 'Mailer Error: ' . $mail->ErrorInfo;

        } else {

            $signal = 'good';
            $msg = 'Mensagem enviada com sucesso!!';

        }
        

        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

        
        

        /*
        $return_array = json_encode(array(
                
            'name' => "Name:".$content_name,
            'email' => "Email:".$content_email,
            'phone' => "Phone".$content_phone,
            'subject' => "Subject:".$content_subject,
            'message' => "Message:".$content_message
            
        ));
        */
        
    }else{

        $signal = 'bad';
        $msg = 'Erro:Complete todos os campos';

    }
    

    $return_array = json_encode(array(

        'signal' => $signal,
        'msg' => $msg

    ));

    echo $return_array;
    