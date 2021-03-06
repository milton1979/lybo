<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'usuario-form',
    'type' => 'inline',
    'htmlOptions' => array('class' => 'well span10', 'style'=>'margin-left:8%;'),
    'enableAjaxValidation' => true,
)); ?>
        <?php echo $form->errorSummary($model); ?>
        
        <?php if (Yii::app()->user->hasFlash('exito')): ?>
                <div class="alert alert-success">
                    <?php echo Yii::app()->user->getFlash('exito'); ?>
                </div>
        <?php endif; ?>

	<div class="row" style="margin-bottom:20px;">
                <?php echo $form->textFieldRow($model,'dni',array('size'=>50,'maxlength'=>8, 'placeholder'=>'DNI','disabled'=>true, 'class'=>'span3')); ?><span class="error" style="margin:0 15px 0 0;"> &nbsp;&nbsp;</span>
		<?php echo $form->textFieldRow($model,'nombre',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Nombre', 'class'=>'span3')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
		<?php echo $form->textFieldRow($model,'apellido',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Apellido', 'class'=>'span3')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
	</div>
        <div class="row" style="margin-bottom:20px;">
		<?php echo $form->textFieldRow($model,'direccion',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Dirección', 'class'=>'span3')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
                <?php echo $form->textFieldRow($model,'telefono',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Teléfono', 'class'=>'span3')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
                <?php echo $form->textFieldRow($model,'email',array('size'=>50,'maxlength'=>50, 'placeholder'=>'E-mail', 'class'=>'span3')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
	</div>
	<div class="row">
                <?php
                    $htmlOptions = array(
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => $this->createUrl('ciudadProvincia'),
                            'update' => '#Usuario_idciudad',
                        ),
                        'class'=>'span3',
                        'empty' => 'Provincia',
                    );
                    ?>
                <?php echo $form->dropDownList($model, 'idciudad0', CHtml::listData(Provincia::model()->findAll(), 'id', 'nombre'), $htmlOptions); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
                <?php echo $form->dropDownList($model, 'idciudad', CHtml::listData(Ciudad::model()->findAll(), 'id', 'nombre'), array('empty' => 'Ciudad', 'class'=>'span3')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
                <?php echo $form->passwordField($model,'pass',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Password', 'class'=>'span3')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
                <br/>
		<p>Los campos con<span class="error"> *</span> son obligatorios</p>                
                <br/>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
                            'buttonType' => 'submit',
                            'type' => 'primary',
                            'label' => 'Guardar',
                            'htmlOptions' => array('style'=>'margin-left:8%;', 'class'=>'span8'),
                        ));
                        ?>

                
        </div>
        
<?php $this->endWidget(); ?>
</div>
