<?php
$this->pageTitle = 'Recuperar password';
$this->breadcrumbs = array ('Recuperar password');
echo $msg;
?>
<div class="form">
<?php $form = $this->beginWidget('CActiveForm',
array(
	'method' => 'POST',
    'action' => Yii::app()->createUrl('site/recuperarpassword'),
	'enableClientValidation' => true,
	'clientOptions' => array(	
		'validateOnSubmit' =>true,
		),
		
))?>
<div class="row">
<?php 
echo $form->labelEx($model, 'username');
echo $form->textField($model, 'username');
//echo $form->error($model, 'username', array('class'=>'text-error'));
?>
</div>

<div class="row">
<?php 
echo $form->labelEx($model, 'email');
echo $form->textField($model, 'email');
echo $form->error($model, 'email', array('class'=>'text-error'));
?>
</div>

<div class="row">
<?php 
echo $form->labelEx($model, 'captcha');
$this->widget('CCaptcha', array('buttonLabel' => 'Actualizar codigo'));
echo $form->textField($model, 'captcha');
?>
<div class="text-info">
Por favor, introduce el texto que ves en la imagen.
</div>
<?php  //echo $form->error($model, 'captcha', array('class'=>'text-error'));
?>
</div>
<div class="row">
<?php 
echo CHtml::submitButton('Recuperar password', array('class'=>'btn btn-primary'));
?>
</div>
<?php $this->endWidget();?>
</div>