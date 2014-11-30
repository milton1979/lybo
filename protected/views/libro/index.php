<?php
/* @var $this LibroController */
/* @var $model Libro */
$this->breadcrumbs=array(
	'Libros'
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#libro-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
    $empleado=Empleado::model()->findAllByAttributes(array('idusuario'=>Yii::app()->user->id));
    
    $visible=false;
    
    if(Yii::app()->user->getState('admin')||$empleado)
         $visible=true;
    ?>


<div class="well">
    <?php
    if ($visible)
        echo CHtml::link('<span class="icon-plus-sign" style="margin:0 1%"></span> Crear Libro', array('create'), array('class' => 'btn btn-success span5', 'style' => 'margin-left:28%;'));
    ?>

    <br/>
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'libro-grid',
        'type' => 'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'nombre', 'value'=>'$data->nombre', 'filter'=>CHtml::activeTextField($model, 'nombre', array('placeholder'=>'Buscar por nombre'))),
                array('name'=>'autor', 'value'=>'$data->idautor0->nombreyapellido', 'filter'=>CHtml::activeTextField($model, 'autor', array('placeholder'=>'Buscar por autor'))),
                array('header'=>'Editorial', 'value'=>'$data->ideditorial0->nombre',),
                array('header'=>'Genero','value'=>'$data->idgenero0->genero',),
		array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'header'=>'Ver',
                    'template'=>'{view}',
                ),
                array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'template'=>'{update} {delete}',
                    'header'=>'Editar',
                    'buttons'=>array(
                       'delete'=>array(
                           'visible'=>'Yii::app()->user->getState("admin")? true : false',
                       )),
                    'visible'=> $visible,
		),
	),
)); ?>
</div>