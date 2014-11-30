<?php
/* @var $this BibliotecaController */
/* @var $model Biblioteca */
/* @var $form CActiveForm */
?>

<div class="form span10">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'biblioteca-form',
        'type' => 'inline',
        'htmlOptions' => array('class' => 'well span10'),
	'enableAjaxValidation'=>false,
)); ?>
        <?php echo $form->errorSummary($model); ?>

	<div class="row" style="margin-bottom:20px;">
		<?php echo $form->textFieldRow($model,'nombre',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Nombre', 'class'=>'span3',)); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
		<?php echo $form->textFieldRow($model,'direccion',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Dirección', 'class'=>'span3',)); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
                <?php echo $form->textFieldRow($model,'horario',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Horario', 'class'=>'span3',)); ?><span class="error" style="margin:0 15px 0 0;"> *</span>                
	</div>
        <div class="row" style="margin-bottom:20px;">
		<?php echo $form->textFieldRow($model,'telefono',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Teléfono', 'class'=>'span3',)); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
                <?php echo $form->textFieldRow($model,'email',array('size'=>50,'maxlength'=>50, 'placeholder'=>'E-mail', 'class'=>'span3',)); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
                <?php echo $form->textFieldRow($model,'web',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Web', 'class'=>'span3',)); ?><span class="error" style="margin:0 15px 0 0;"> &nbsp;</span>
	</div>
	<div class="row">
                <?php
                    $htmlOptions = array(
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => $this->createUrl('ciudadProvincia'),
                            'update' => '#Biblioteca_idciudad',
                        ),
                        'class'=>'span3',
                        'empty' => 'Provincia',
                    );
                    ?>
                <?php echo $form->dropDownList($model, 'idciudad0', CHtml::listData(Provincia::model()->findAll(), 'id', 'nombre'), $htmlOptions); ?><span class="error" style="margin:0 15px 0 0;"> &nbsp;</span>
                <?php echo $form->dropDownList($model, 'idciudad', CHtml::listData(Ciudad::model()->findAll(), 'id', 'nombre'), array('empty' => 'Ciudad', 'class'=>'span3',)); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                            'buttonType' => 'submit',
                            'type' => 'primary',
                            'label' => 'Guardar',
                            'htmlOptions' => array('style'=>'width:220px;'),
                        ));
                        ?>
            <br/><br/><br/>
            <p>Los campos con<span class="error"> *</span> son obligatorios</p>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->