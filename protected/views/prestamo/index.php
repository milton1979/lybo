<?php
$this->breadcrumbs = array(
    $model->idejemplar0->idbiblioteca0->nombre => array('biblioteca/view', 'id' => $model->idejemplar0->idbiblioteca),
    'Libros' => array('/libro'),
    $model->idejemplar0->idlibro0->nombre => array('libro/view', 'id' => $model->idejemplar0->idlibro),
    'Ejemplares' => array('/ejemplar', 'biblioteca' => $model->idejemplar0->idbiblioteca, 'libro' => $model->idejemplar0->idlibro),
    'Prestamos/Reservas'
);

$empleado = Empleado::model()->findByAttributes(array('idusuario' => Yii::app()->user->id, 'idbiblioteca' => $model->idejemplar0->idbiblioteca));

$visible = false;

if (Yii::app()->user->getState('admin') || $empleado)
    $visible = true;

    $this->widget('bootstrap.widgets.TbGridView', array(
        'id'=>'prestamo-grid',
        'type' => 'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array('name'=>'retiro', 'htmlOptions'=>array('style'=>'width:15%;')),
                array('name'=>'devolucion', 'htmlOptions'=>array('style'=>'width:15%;')),		array(
                    'header'=>'Socio',
                    'value'=>'$data->idsocio0->idusuario0->nombre." ".$data->idsocio0->idusuario0->apellido',
                ),
                'idtipo0.tipo',
                array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'header'=>'Ver',
                    'template'=>'{view}'),
		array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'header'=>'Editar',
                    'template'=>'{update} {delete}',
                    'visible'=>$visible,
                 ),
	),
)); ?>
