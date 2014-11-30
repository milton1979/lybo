<?php
class RecuperarPassword extends CFormModel{
	public $username;
	public $email;
	public $captcha;
	
	public function rules(){
		return array(
			array(
				'username, email, captcha',
				'required',
				'message'=>'El campo es requerido'
		),
				array(
						'username',
						'match',
						'pattern'=>'/^[a-z0-9ביםףתאטלעשהכןצüס\_]+$/i',
						'message'=>'Error, solo letras, nתmeros y guiones bajos',
				),
				array(
			'email',
			'email',
			'message'=>'Formato de email incorrecto',						
		),
				array(
			'captcha',
			'captcha',
			'message'=>'Error el cףdigo captcha no es valido',						
		),
	);
	}
	
	public function attributeLabels(){
		return array(
			'username' =>'Nombre de usuario',
		);
	}
}
?>