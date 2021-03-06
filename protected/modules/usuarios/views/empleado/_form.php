<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'empleado-form',
        'type' => 'inline',
        'htmlOptions' => array('class' => 'well span10'),
        'enableAjaxValidation' => true,
            ));
    ?>

    <?php echo $form->errorSummary(array($model, $modelUs)); ?>

    <?php if (Yii::app()->user->hasFlash('exito')): ?>
        <div class="alert alert-success">
            <?php echo Yii::app()->user->getFlash('exito'); ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::app()->user->hasFlash('nuevoRegistro')): ?>
        <div class="alert alert-info">
            <?php echo Yii::app()->user->getFlash('nuevoRegistro'); ?>
        </div>

        <div class="row" style="margin-bottom:20px;">
            <?php echo $form->textFieldRow($modelUs, 'dni', array('size' => 50, 'maxlength' => 8, 'placeholder' => 'DNI', 'class' => 'span3')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
            <?php echo $form->textFieldRow($modelUs, 'nombre', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Nombre', 'class' => 'span3')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
            <?php echo $form->textFieldRow($modelUs, 'apellido', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Apellido', 'class' => 'span3')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
        </div>

        <div class="row" style="margin-bottom:20px;">
            <?php echo $form->textFieldRow($modelUs, 'direccion', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Dirección', 'class' => 'span3')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
            <?php echo $form->textFieldRow($modelUs, 'telefono', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Teléfono', 'class' => 'span3')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
            <?php echo $form->textFieldRow($modelUs, 'email', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'E-mail', 'class' => 'span3')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
        </div>

        <div class="row">
            <?php
            $htmlOptions = array(
                'ajax' => array(
                    'type' => 'POST',
                    'url' => $this->createUrl('ciudadProvincia'),
                    'update' => '#Usuario_idciudad',
                ),
                'class' => 'span3',
                'empty' => 'Provincia',
            );
            ?>
            <?php echo $form->dropDownList($modelUs, 'idciudad0', CHtml::listData(Provincia::model()->findAll(), 'id', 'nombre'), $htmlOptions); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
            <?php echo $form->dropDownList($modelUs, 'idciudad', CHtml::listData(Ciudad::model()->findAll(), 'id', 'nombre'), array('empty' => 'Ciudad', 'class' => 'span3')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
            <?php if(Yii::app()->user->getState('admin')===true):?>
                    <?php echo $form->dropDownList($model, 'idbiblioteca', CHtml::listData(Biblioteca::model()->findAll(), 'idbiblioteca', 'nombre'), array('empty' => 'Biblioteca'));?><span class="error" style="margin:0 15px 0 0;"> *</span>
            <?php else: ?>
                    <?php echo $form->dropDownList($model, 'idbiblioteca', CHtml::listData(Empleado::model()->findAll('idusuario=?', array(Yii::app()->user->id)), 'idbiblioteca', 'idbiblioteca0.nombre'), array('class' => 'span3', 'empty' => 'Biblioteca'));?><span class="error" style="margin:0 15px 0 0;"> *</span>
            <?php endif;?>
        </div>
        
        <div>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => 'Guardar',
                'htmlOptions' => array('class' => 'span4', 'style'=>'margin:1% 28%;'),
            ));
            ?>
            <br/><br/><br/>
            <p>Los campos con<span class="error"> *</span> son obligatorios</p>
        </div>
    <?php else: ?>
        <div class="row" style="margin-bottom:20px;">
            <?php echo $form->textFieldRow($modelUs, 'dni', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'DNI', 'class' => 'span3', 'style' => 'margin:0 15px 0 0;')); ?>
            <?php if(Yii::app()->user->getState('admin'))
                    echo $form->dropDownList($model, 'idbiblioteca', CHtml::listData(Biblioteca::model()->findAll(), 'idbiblioteca', 'nombre'), array('class' => 'span3', 'style' => 'margin:0 0 10px 15px;', 'empty' => 'Biblioteca'));
                else
                    echo $form->dropDownList($model, 'idbiblioteca', CHtml::listData(Empleado::model()->findAll('idusuario=?', array(Yii::app()->user->id)), 'idbiblioteca', 'idbiblioteca0.nombre'), array('class' => 'span3', 'style' => 'margin:0 0 10px 15px;', 'empty' => 'Biblioteca'));
 
                $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => 'Guardar',
                'htmlOptions' => array('style' => 'width:220px; margin:0 0 10px 15px;'),
            ));
            ?>
        </div>

    <?php endif; ?>

    <?php $this->endWidget(); ?>
</div>