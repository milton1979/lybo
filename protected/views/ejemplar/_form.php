<?php
/* @var $this EjemplarController */
/* @var $model Ejemplar */
/* @var $form CActiveForm */
?>

<div class="well span10">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'ejemplar-form',
        'type' => 'inline',
        'htmlOptions' => array('style' => 'padding:2% 6%;'),
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>

         <div class="row">
		<?php $datos= Libro::model()->findAll();
                foreach ($datos as $row){
                    $indice=$row->attributes['id'];
                    $libros[$indice]=$row->attributes['nombre'];
                    $indice++;
                }
                $this->widget('bootstrap.widgets.TbSelect2', array(
                    'asDropDownList' => true,
                    'name' => 'Ejemplar[idlibro]',
                    'data'=> $libros,
                    'value'=>$model->idlibro,
                    'options' => array(
                        'placeholder' => 'Libro',
                        'tokenSeparators' => array(',', ' '),
                 )));?>
		<?php echo $form->error($model,'idlibro'); ?>
            
                <?php echo $form->dropDownList($model, 'idestado', CHtml::listData(Estadoejemplar::model()->findAll(), 'id', 'estado'), array('empty'=>'Estado', 'style'=>'margin:0 20px;')); ?>
                
                <?php if(Yii::app()->user->getState('admin')):?>
                    <?php echo $form->dropDownList($model,'idbiblioteca', CHtml::listData(Biblioteca::model()->findAll(), 'idbiblioteca', 'nombre'), array('empty' => 'Biblioteca')); ?>
                <?php else:?>
                    <?php echo $form->dropDownList($model,'idbiblioteca', CHtml::listData(Empleado::model()->findAll('idusuario=?', array(Yii::app()->user->id)), 'idbiblioteca', 'idbiblioteca0.nombre'), array('empty' => 'Biblioteca')); ?>
                <?php endif;?>
        </div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar', array('class'=>'btn btn-primary span8', 'style'=>'margin:2% 7%;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->