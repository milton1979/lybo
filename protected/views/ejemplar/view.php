<?php
/* @var $this EjemplarController */
/* @var $model Ejemplar */

$this->breadcrumbs=array(
        'Libros'=>array('/libro'),
	$model->idlibro0->nombre=>array('libro/view','id'=>$model->idlibro),
        'Ejemplares ('.$model->idbiblioteca0->nombre.')'=>array('/ejemplar', 'biblioteca'=>$model->idbiblioteca, 'libro'=>$model->idlibro),
        'Ejemplar '.$model->id
);?>

<div>
<?php
$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => $model->idlibro0->nombre ,
    'headerIcon' => 'icon-book',
    'htmlOptions' => array('class' => 'bootstrap-widget-table span9','style'=>'margin:0 0 5% 17%;'),
));?>
<table>
    <tbody>
        <tr>
            <th><span class="label label-success" style="width:170%; font-size:20px; text-align: center; padding: 4%; margin:0 55%;"> Ejemplar n° <?php echo $model->id;?> </span></th>
        </tr>
        <tr >
            <td> <span class="label label-info" style="width:55px;"> Biblioteca </span> <?php echo $model->idbiblioteca0->nombre; ?></td>
            <td> <span class="label label-info" style="width:55px;"> Estado </span> <?php echo $model->idestado0->estado; ?></td>
            <td> <span class="label label-info" style="width:85px;"> Disponibilidad </span> <?php if($model->disponibilidad)echo 'Ejemplar disponible'; else echo 'Ejemplar no disponible'; ?></td>
        </tr>
    </tbody>
</table>
<?php $this->endWidget(); ?>
</div>