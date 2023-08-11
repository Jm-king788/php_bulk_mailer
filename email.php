<?php

require_once "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;

session_start();

class EmailSender
{
    private $mailer;

    public function __construct($email, $password)
    {
        $this->mailer = new PHPMailer;
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.gmail.com';
        $this->mailer->Port = 465;
        $this->mailer->SMTPSecure = 'ssl';
        $this->mailer->SMTPAuth = true;
        $this->mailer->CharSet = "UTF-8";
        $this->mailer->Username = $email;
        $this->mailer->Password = $password;
    }

    public function sendEmail($name, $email, $subject, $message, $recipients, $attachmentPath)
    {
        try {
            $this->mailer->setFrom($email, $name);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $message;
            $this->mailer->addAttachment($attachmentPath);

            $recipientsArray = array_map('trim', explode(',', $recipients));
            foreach ($recipientsArray as $recipient) {
                $this->mailer->addAddress($recipient);
                
                if (!$this->mailer->send()) {
                    $error = "Mailer Error: " . $this->mailer->ErrorInfo . "\n\n";
                    echo $error;
                } else {
                    echo "Email sent successfully to: " . $recipient . "\n";
                }

                $this->mailer->clearAddresses();
            }
        } catch (Exception $e) {
            // Handle the exception
        }
    }
}

// Usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $subject = htmlentities($_POST['subject']);
    $message = htmlentities($_POST['message']);
    $recipients = htmlentities($_POST['recipients']); 
    $attachmentPath = $_FILES['Pdf']['tmp_name']; 

    $emailSender = new EmailSender($email, $password);
    $emailSender->sendEmail($name, $email, $subject, $message, $recipients, $attachmentPath);

    exit;
}
?>
