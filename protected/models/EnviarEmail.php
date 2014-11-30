<?php
Yii::import('application.extensions.smtpmail.PHPMailer');
class EnviarEmail{
	
	public function Enviar_Email(array $from, array $to, $subject, $message){
		$mail = Yii::app()->Smtpmail;
		 
		$mail->setFrom($from[0], $from[1]);
		$mail->Subject = $subject;
		$mail->MsgHTML($message);
		$mail->AddAddress($to[0],$to[1]);
		/*if (!$mail->Send()) {
			throw new Exception("Mailer Error: " . $mail->ErrorInfo);*/
		$mail->Send();

	   }
	
	}

?>