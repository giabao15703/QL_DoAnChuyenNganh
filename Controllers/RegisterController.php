<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

class RegisterController
{
    public function randomCode()
    {
        $code = '';
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        for ($i = 0; $i < 8; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
    }

    public function sendVerificationEmail()
    {
        $mail = new PHPMailer(true);
        $userEmail = $_POST['userEmail'];
        $verificationCode = $this->randomCode();
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Địa chỉ SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'dat19122003it@gmail.com'; // SMTP username
            $mail->Password = 'iuxi kkdq ohmi tksm'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port = 587; // TCP port

            //Recipients
            $mail->setFrom('dat19122003it@gmail.com', 'GOODGOAT');
            $mail->addAddress($userEmail); // Add a recipient

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Verify your email';
            $mail->Body = 'Your verification code is ' . $verificationCode;

            $mail->send();

            header('Content-type: application/json');
            echo json_encode(['status' => 1, 'verificationCode' => hash('sha256', $verificationCode), 'message' => 'Message has been sent']);
        } catch (Exception $e) {
            header('Content-type: application/json');
            echo json_encode(['status' => 0, 'verificationCode' => hash('sha256', $verificationCode), 'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
        }
    }

    public function checkVerificationCode()
    {
        $verificationCode = $_POST['verificationCode'];
        $userVerificationCode = $_POST['userVerificationCode'];
        if ($verificationCode == hash('sha256', $userVerificationCode)) {
            header('Content-type: application/json');
            echo json_encode(['status' => 1, 'message' => 'Verification code is correct']);
        } else {
            header('Content-type: application/json');
            echo json_encode(['status' => 0, 'message' => 'Verification code is incorrect']);
        }
    }
}
?>