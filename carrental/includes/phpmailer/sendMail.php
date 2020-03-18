
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
class sendMail{
    private $mail;
    public function __construct()
    {
        
        $this->mail = new PHPMailer(true);
    }
    public function send($email,$body,$name)
    {

        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $this->mail->isSMTP();                                            // Send using SMTP
        $this->mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $this->mail->Username   = 'masiur.ma@gmail.com';                     // SMTP username
        $this->mail->Password   = 'moshiurw68';                               // SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; 
        $this->mail->Port       = 587;                                    // TCP port to connect to
        $this->mail->setFrom('masiur.ma@gmail.com', 'WildLife Bangladesh');
        $this->mail->addAddress($email, $name);     
        $this->mail->isHTML(true);                                 
        $this->mail->Subject = "Confirmation Code";
        $this->mail->Body    = $body;
        $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        if($this->mail->send())
        {
            echo "Sms Sned";
            return true;

            exit();
        }
        else
        {
            return false;
            
            exit();
        }
    }   
}
?>