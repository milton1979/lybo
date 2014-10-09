<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'empleado-form',
	'type'=>'inline',
        'enableAjaxValidation'=>true,
)); ?>
<div class="form-actions">

<?php  if(Yii::app()->user->hasFlash('success')):?>
     <div class="alert alert-info">
         <?php echo Yii::app()->user->getFlash('success');?>
     </div>
<?php endif; ?>

<?php echo $form->errorSummary(array($model, $modelUs));?>
    
	<?php echo $form->textFieldRow($modelUs,'dni',array('placeholder'=>'DNI','maxlength'=>8, 'class'=>'span2',)); ?>

        <?php //$lista=Empleado::model()->findAll(array('idusuario'=>Yii::app()->user->getState('idUs')));?>
    
        <?php //echo $form->dropDownList($model,'idbiblioteca', array(Empleado::model()->findAll(array('idusuario'=>Yii::app()->user->id))), array('class'=>'span2', 'empty'=>'Biblioteca')); ?>    
    
	
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
