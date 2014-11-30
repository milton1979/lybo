<?php

/* @var $this PrestamoController */
/* @var $model Prestamo */

$this->breadcrumbs = array(
    $model->idejemplar0->idbiblioteca0->nombre => array('biblioteca/view', 'id' => $model->idejemplar0->idbiblioteca),
    'Libros' => array('/libro'),
    $model->idejemplar0->idlibro0->nombre => array('libro/view', 'id' => $model->idejemplar0->idlibro),
    'Ejemplares' => array('/ejemplar', 'biblioteca' => $model->idejemplar0->idbiblioteca, 'libro' => $model->idejemplar0->idlibro),
    $model->idtipo0->tipo
);

echo $this->renderPartial('_form', array('model' => $model));
?>