<?php

/* @var $this EjemplarController */
/* @var $model Ejemplar */

$this->breadcrumbs = array(
    $model->idbiblioteca0->nombre => array('biblioteca/view', 'id' => $model->idbiblioteca),
    'Libros' => array('/libro'),
    $model->idlibro0->nombre => array('libro/view', 'id' => $model->idlibro),
    'Ejemplares'
);

$empleado = Empleado::model()->findByAttributes(array('idusuario' => Yii::app()->user->id, 'idbiblioteca' => $_GET['biblioteca']));

$visible = false;

if (Yii::app()->user->getState('admin') || $empleado)
    $visible = true;

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'ejemplar-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'columns' => array(
        array('header' => 'Libro',
            'value' => '$data->idlibro0->nombre'),
        'idestado0.estado',
        array('header' => 'Biblioteca',
            'value' => '$data->idbiblioteca0->nombre'),
        array('header' => 'Disponibilidad',
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{disponible} {nodisponible}',
            'buttons' => array(
                'nodisponible' => array(
                    'label' => '<span class="icon-remove"></span>',
                    'options' => array('title' => 'No disponible'),
                    'url' => 'Yii::app()->createUrl("/prestamo",array("biblioteca"=>$data->idbiblioteca, "ejemplar"=>$data->id))',
                    'visible' => '($data->disponibilidad == 0 ) ? true : false'
                ),
                'disponible' => array(
                    'label' => '<span class="icon-ok"></span>',
                    'options' => array('title' => 'Dispoinible'),
                    'visible' => '($data->disponibilidad==1) ? true : false',
            ))),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header' => 'Prestamo',
            'template' => '{prestamo}',
            'buttons' => array(
                'prestamo' => array(
                    'url' => 'Yii::app()->createUrl("prestamo/create",array("ejemplar"=>$data->id, "tipo"=>1))',
                    'label' => '<span class="icon-home"></span>',
                    'options' => array('title' => 'Prestamo'),
            )),
            'visible' => $visible,
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header' => 'Reserva',
            'template' => '{reserva}',
            'buttons' => array(
                'reserva' => array(
                    'url' => 'Yii::app()->createUrl("prestamo/create",array("ejemplar"=>$data->id, "tipo"=>2))',
                    'label' => '<span class="icon-bell"></span>',
                    'options' => array('title' => 'Reserva'),
                ),)
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header' => 'Ver',
            'template' => '{view}',
        ),
        array(
            'header' => 'Administrar',
            'template' => '{update} {delete}',
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'buttons' => array(
                'delete' => array(
                    'visible' => 'Yii::app()->user->getState("admin") ? true : false',
                )
            ),
            'visible' => $visible,
        ),
    ),
));
?>