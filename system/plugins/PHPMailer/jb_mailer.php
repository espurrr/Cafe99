<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../system/plugins/PHPMailer/Exception.php';
require '../system/plugins/PHPMailer/PHPMailer.php';
require '../system/plugins/PHPMailer/SMTP.php';

class JB_Mailer 
{
    function __construct()
    {
        $this->mail = new PHPMailer(TRUE);
    }

   
    public static function sendEmail($to_email, $to_name, $subject, $html_body, $email_body){//
 
        $mail = new PHPMailer(TRUE); //Remove TRUE in production stage
        $mail_sent = false;
        try{
            $mail->setFrom('cafe99.teamdashcode@gmail.com', 'Lounge Cafe99');
            $mail->addAddress($to_email, $to_name);
            $mail->isHTML(true);
            $mail->Subject =$subject;
            if(!empty($html_body)) {
                $mail->isHTML(true);
                $mail->AltBody = $email_body;
                $mail->Body    = $html_body;
            } else{
                $mail->Body    = $email_body;
            }

            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = E_HOST;
            $mail->SMTPAuth = TRUE;
            $mail->SMTPSecure = 'tls';
            $mail->Username = E_USERNAME;
            $mail->Password = E_PASSWORD;
            $mail->Port = E_PORT;
          
            if($mail->send()) $mail_sent = true;

        }
        catch (Exception $e){
            echo $e->errorMessage();
        }
        catch (\Exception $e){
            echo $e->getMessage();
        }
        return $mail_sent;
    }
}

?>
