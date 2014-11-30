<?php
/* @var $this PrestamoController */
/* @var $model Prestamo */
/* @var $form CActiveForm */
?>

<div class="well">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        //'CActiveForm'
        'id'=>'prestamo-form',
	'enableAjaxValidation'=>false,
)); ?>
    <?php if (Yii::app()->user->hasFlash('error')):?>
            <div class="alert alert-error">
                <h3><?php echo Yii::app()->user->getFlash('error'); ?></h3>
            </div>
        <?php else:?>
        
        <div class="alert alert-success span10">
            <h3 style="margin-left:25%;">Realizar <?php echo $model->idtipo0->tipo;?> de <?php echo $model->idejemplar0->idlibro0->nombre;?></h3>
        </div>
        <br/><br/><br/><br/><br/>
        
        <?php if(Yii::app()->user->hasFlash('errorFecha')):?>
        <div class="alert alert-block alert-error">
            <?php echo Yii::app()->user->getFlash('errorFecha');?>
        </div>
        <?php else: ?>
            <?php echo $form->errorSummary($model, Yii::app()->user->getFlash('errorFecha')); ?>
        <?php endif; ?>
        
        <div class="row span10">
        <div style="float:left; margin-top: 3px;">    
        <?php echo $form->datepickerRow( $model,'devolucion',
                    array(
                        'options' => array(
                            'language' => 'es',
                            'format'=>'yyyy-mm-dd'
                        ), 
                        'htmlOptions' => array(
                            'hint' => 'Fecha de devolucion',
                        )
                    ),
                    array(
                        'prepend' => '<i class="icon-calendar"></i>'
                    )
            ); ?>
        </div>
            
            <div style="float:left; margin-left: 31%;">
                <p>&nbsp;</p>
            <?php 
            $a=Empleado::model()->findByAttributes(array('idusuario'=>Yii::app()->user->id, 'idbiblioteca'=>$model->idejemplar0->idbiblioteca));?>
            <input type="text" name="Prestamo[idempleado]" maxlength="20" value="<?php echo $a->attributes['idempleado'];?>" style="display: none;">
            </div>
            
            <?php
                $socio =  Socio::model()->findAllByAttributes(array('idbiblioteca'=>$model->idejemplar0->idbiblioteca));
                foreach ($socio as $row){
                        $indice=$row->attributes['idsocio'];
                        $usr=Usuario::model()->findByPk($row->attributes['idusuario']);
                        $socios[$indice]=$usr->nombre.' '.$usr->apellido;
                        $indice++;
                }?>

            
            
                <div style="float:left; margin: 28px 30px 0 35px;">
                   <?php $this->widget('bootstrap.widgets.TbSelect2', array(
                    'asDropDownList' => true,
                    'name' => 'Prestamo[idsocio]',
                    'data'=> $socios,
                    'value'=>$model->idsocio,
                    'options' => array(
                        'placeholder' => 'Socio',
                        'tokenSeparators' => array(',', ' '),
                        ''=>'margin:190px;'
                 )));?>
            <?php echo $form->error($model,'idsocio'); ?>
                </div>
            
	</div>
<br/><br/><br/><br/><br/>
        <div class="row" style="margin: 0 0 0 5%;"> 
            <div class="row">
		<?php echo $form->labelEx($model,'observacion'); ?>
		<?php echo $form->textArea($model,'observacion',array('style'=>'width:84%;')); ?>
		<?php echo $form->error($model,'observacion'); ?>
            </div>
        
            <div class="row buttons">
		<?php echo CHtml::submitButton('Guardar', array('class'=>'btn btn-primary span7', 'style'=>'margin:0 13%')); ?>
            </div>
        </div>
<?php endif;?>
<?php $this->endWidget(); ?>

</div><!-- form -->