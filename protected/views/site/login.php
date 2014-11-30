<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Iniciar sesión',
);
?>
<div class="well span10" style="margin-left: 7%;">
    <div style="padding: 2% 33%;">
<div class="text-info">
    <h2>&nbsp;Iniciar sesion</h2>
</div>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			
		</p>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Iniciar', array('class'=>'btn btn-primary', 'style'=>'width:220px;')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
¿Olvidaste tu password? 
<a href="<?php echo Yii::app()->createUrl('site/recuperarpassword'); ?>">
Recuperar
</a>
<br/><br/><br/><br/><br/>
</div></div>