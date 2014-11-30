<?php
/* @var $this LibroController */
/* @var $model Libro */
/* @var $form CActiveForm */
?>
<?php
    $datos= Autor::model()->findAll();
    foreach ($datos as $row){
        $indice=$row->attributes['id'];
        $autores[$indice]=$row->attributes['nombreyapellido'];
        $indice++;
    }
              
    $datos= Editorial::model()->findAll();
    foreach ($datos as $row){
        $indice=$row->attributes['id'];
        $editoriales[$indice]=$row->attributes['nombre'];
        $indice++;
    }
                
    $datos= Edicion::model()->findAll();
    foreach ($datos as $row){
        $indice=$row->attributes['id'];
        $ediciones[$indice]='Edición: '.$row->attributes['edicion'].' - Año: '.$row->attributes['anio'];
        $indice++;
    }
              
    $datos= Genero::model()->findAll();
    foreach ($datos as $row){
        $indice=$row->attributes['id'];
        $generos[$indice]=$row->attributes['genero'];
        $indice++;
    }
    ?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'libro-form',
        'type' => 'inline',
        'htmlOptions' => array('class' => 'well span10', 'style'=>'padding:2% 0 2% 7%; margin-left:5%;'),
	'enableAjaxValidation'=>true,
)); ?>
        <?php echo $form->errorSummary($model); ?>

	<div class="row" style="margin-bottom:20px;">
            <div style="float:left;">
                <?php echo $form->textFieldRow($model,'nombre',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Nombre', 'class'=>'span3',)); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
            </div>
            <div style="float:left; margin-top: 3px;">
                <?php
                $this->widget('bootstrap.widgets.TbSelect2', array(
                    'asDropDownList' => true,
                    'name' => 'Libro[idautor]',
                    'value'=>$model->idautor,
                    'data'=> $autores,
                    'options' => array(
                        'placeholder' => 'Autor',
                        'tokenSeparators' => array(',', ' '),
                )));?><span class="error" style="margin:0 15px 0 0;"> *</span>
                <?php echo $form->error($model,'idautor'); ?>
            </div>
            <div style="float:left; margin-top: 3px;">
                <?php 
                $this->widget('bootstrap.widgets.TbSelect2', array(
                    'asDropDownList' => true,
                    'value'=>$model->ideditorial,
                    'name' => 'Libro[ideditorial]',
                    'data'=> $editoriales,
                    'options' => array(
                        'height'=>'500px',
                        'placeholder' => 'Editorial',
                        'tokenSeparators' => array(',', ' '),
                     )));?><span class="error" style="margin:0 15px 0 0;"> *</span>
                <?php echo $form->error($model,'ideditorial'); ?>
            </div>
	</div>
        <div class="row" style="margin-bottom:20px;">
            <div style="float:left; margin-top:10px;">
                <?php
                $this->widget('bootstrap.widgets.TbSelect2', array(
                    'asDropDownList' => true,
                    'value'=>$model->idedicion,
                    'name' => 'Libro[idedicion]',
                    'data'=> $ediciones,
                    'options' => array(
                    //'width'=>'23%',
                    'placeholder' => 'Edición',
                    'tokenSeparators' => array(',', ' '),
                )));?><span class="error" style="margin:0 15px 0 0;"> *</span>
                <?php echo $form->error($model,'idedicion'); ?>
        </div>
                <div style="float:left; margin-top:10px;">
            <?php
                 $this->widget('bootstrap.widgets.TbSelect2', array(
                     'asDropDownList' => true,
                     'name' => 'Libro[idgenero]',
                     'value'=>$model->idgenero,
                     'data'=> $generos,
                     'options' => array(
                        'placeholder' => 'Genero',
                        'tokenSeparators' => array(',', ' '),
                     )));?><span class="error" style="margin:0 15px 0 0;"> *</span>
             <?php echo $form->error($model,'idgenero'); ?>
        </div>
            <div style="float: left;">
             <?php echo $form->textField($model,'codigo',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Código', 'style'=>'margin:4% 0 0 0;')); ?><span class="error" style="margin:0 15px 0 0;"> *</span>
             <?php echo $form->error($model,'codigo'); ?>
        </div><br/><br/><br/>
	<div class="row">
            <div class="row">
		<?php echo $form->labelEx($model,'resumen'); ?>
		<?php echo $form->textArea($model,'resumen',array('rows'=>3, 'style'=>'width:90%;')); ?>
		<?php echo $form->error($model,'resumen'); ?>
            </div>
            <div class="row buttons">
		<?php echo CHtml::submitButton('Guardar', array('class'=>'btn btn-primary span8', 'style'=>'margin:20px 60px;')); ?>
            </div>
            
            <p>Los campos con<span class="error"> *</span> son obligatorios</p>
            <p class="info"align="center">¿No encuentra autor, edición o editorial?</p>
             
             <div class="row">
                Crear autor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="Autor[nombre]" maxlength="20" placeholder="Nombre">
                <input type="text" name="Autor[apellido]" maxlength="20" placeholder="Apellido">
             </div>
            <div class="row">
                Crear edicion:&nbsp;&nbsp; 
                <input type="text" name="Edicion[numero]" maxlength="20" placeholder="Edición">
                <input type="text" name="Edicion[anio]" maxlength="20" placeholder="Año">
            </div>
            <div class="ideditorial">
                Crear editorial:&nbsp;
                <input type="text" name="Editorial[nombre]" maxlength="20" placeholder="Editorial">
            </div>
                <?php //echo $form->textFieldRow($model,'ideditorial0',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Editorial', 'class'=>'span3', 'style'=>'margin-right:20px;')); ?>
            
            <!--<input>
            <input>
            <input>-->
        </div>
        
<?php $this->endWidget(); ?>

</div><!-- form -->