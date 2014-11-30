<?php
/* @var $this EjemplarController */
/* @var $model Ejemplar */

$this->breadcrumbs=array(
        $model->idbiblioteca0->nombre=>array('biblioteca/view', 'id'=>$model->idbiblioteca),
        'Libros'=>array('/libro'),
        $model->idlibro0->nombre=>array('libro/view', 'id'=>$model->idlibro),
        'Ejemplares ('.$model->idbiblioteca0->nombre.')'=>array('/ejemplar', 'biblioteca'=>$model->idbiblioteca, 'libro'=>$model->idlibro),
        'Actualizar'
    
);

echo $this->renderPartial('_form', array('model'=>$model)); ?>