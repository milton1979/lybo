<?php /*$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'dni',array('class'=>'span2')); ?>

	<?php echo $form->textFieldRow($model,'usuario',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'apellido',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'idciudad',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'direccion',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'estado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'admin',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); */?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
            'id'=>'usuario-form',
            'enableAjaxValidation'=>true,
            'type'=>'inline'
       )); ?>

    <?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
                'encodeHeading'=>false,
                'htmlOptions'=>array('style'=>'padding:20px'),
            )); ?>
        
        <?php echo $form->errorSummary($model); ?>
        <table>
        <tbody>
        <tr>
            <th class="span2"><?php echo $form->textFieldRow($model,'dni',array('placeholder'=>'DNI','maxlength'=>11, 'class'=>'span2',)); ?></th>
            <!--<th class="span2"><?php //echo $form->textFieldRow($model,'usuario',array('placeholder'=>'Usuario','maxlength'=>50, 'class'=>'span2')); ?></th>-->
            <!--<th class="span2"><?php //echo $form->textFieldRow($model,'pass',array('placeholder'=>'Password','maxlength'=>50, 'class'=>'span2')); ?></th>-->
            <th class="span3"><?php echo $form->textFieldRow($model,'nombre',array('placeholder'=>'Nombre','maxlength'=>50, 'class'=>'span2')); ?></th>
            <th class="span2"><?php echo $form->textFieldRow($model,'apellido',array('placeholder'=>'Apellido','maxlength'=>50, 'class'=>'span2')); ?></th>            
            <th class="span2"><?php echo $form->textFieldRow($model,'direccion',array('placeholder'=>'Direccion','maxlength'=>50, 'class'=>'span2')); ?></th>
        </tr>
        <tr>
            <th class="span2"><?php echo $form->textFieldRow($model,'telefono',array('placeholder'=>'Telefono','maxlength'=>50, 'class'=>'span2')); ?></th>
            <th class="span2"><?php echo $form->textFieldRow($model,'email',array('placeholder'=>'Correo Electronico','maxlength'=>50, 'class'=>'span2')); ?></th>
            <th class="span2"><?php echo $form->dropDownList($model,'idciudad', CHtml::listData(Provincia::model()->findAll(), 'id', 'nombre'),array('empty'=>'Provincia', 'class'=>'span2')); ?>
            <th class="span2"><?php echo $form->dropDownList($model,'idciudad', CHtml::listData(Ciudad::model()->findAll(), 'id', 'nombre'),array('empty'=>'Ciudad', 'class'=>'span2')); ?>
            <th class="span2"><?php echo $form->error($model,'provincia',array('class'=>'errorMessage')); ?></th>
        </tr>
        <tr>
            <!--<th class="span2"><?php //echo $form->textFieldRow($model,'ciudad',array('placeholder'=>'Ciudad','maxlength'=>50)); ?></th>-->
        </tr>
        <tr>
            <th></th>
            <?php //echo $form->textFieldRow($model,'sitioweb',array('placeholder'=>'Sitio Web (www.sitio.com)','prepend'=>'www.', 'maxlength'=>50)); ?></th>
            <th colspan="2"><?php $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType'=>'submit',
			'type'=>'success',
                        'htmlOptions'=>array('class'=>'span3'),
			'label'=>$model->isNewRecord ? 'Registrar' : 'Actualizar',
		)); ?>
            </th>            
        </tr>
        </tbody>
        </table>
    
   <?php $this->endWidget(); ?>

<?php $this->endWidget(); ?>