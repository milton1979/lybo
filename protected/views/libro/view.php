<?php
/* @var $this LibroController */
/* @var $model Libro */

$this->breadcrumbs=array(
	'Libros'=>array('/libro'),
	$model->nombre,
);?>

<div>
<?php
$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => $model->nombre ,
    'headerIcon' => 'icon-book',
    'htmlOptions' => array('class' => 'bootstrap-widget-table span6','style'=>'margin:0 10px;'),
));
?>
<table>
    <tbody>
        <tr >
            <td> <span class="label label-info" style="width:55px;"> Autor </span> <?php echo $model->idautor0->nombreyapellido; ?></td>
            <td> <span class="label label-info" style="width:55px;"> Editorial </span> <?php echo $model->ideditorial0->nombre; ?></td>
        </tr>
        <tr>
            <td> <span class="label label-info" style="width:55px;">Edici&oacute;n </span> <?php echo 'N° '.$model->idedicion0->edicion.' - Año '.$model->idedicion0->anio; ?></td>
            <td> <span class="label label-info" style="width:55px;">Genero </span> <?php echo $model->idgenero0->genero; ?></td>
        </tr>
        <tr>
            <td colspan="2" class="label label-info span2" style="padding: 1% 40%; font-size:14px;">
                Resumen
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid #ede; font-size:14px;">
            <?php echo $model->resumen;?>
            </td>
        </tr>
        
    </tbody>
</table>
<?php $this->endWidget(); ?>
</div>

<div>
    <?php
    $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'Disponible en bibliotecas',
    'headerIcon' => 'icon-home',
    'htmlOptions' => array('class' => 'bootstrap-widget-table span5','style'=>'margin:0 10px;'),
));
    
    $datos= Ejemplar::model()->findAllByAttributes(array('idlibro'=>$model->id));
    if(!$datos)
        echo '<div class="alert alert-error"><span class="icon-remove"></span> No se encontraron bibliotecas';
    $bibliotecas=array();
    foreach ($datos as $row){
        $indice=$row->attributes['id'];
        $b=Biblioteca::model()->findByPk($row->attributes['idbiblioteca']);
        if(!in_array($b->nombre, $bibliotecas))
           echo CHtml::link('<span class="icon-asterisk" style="margin:0 1%"></span>'.$b->nombre, array('/ejemplar', 'biblioteca'=>$b->idbiblioteca,'libro'=>$model->id)).'<br/>';
        $bibliotecas[$indice]=$b->nombre;
        $indice++;
    }
?>
<?php $this->endWidget(); ?>
    
</div>

<?php
    $empleado=Empleado::model()->findAllByAttributes(array('idusuario'=>Yii::app()->user->id));
    
    $visible=false;
    
    if(Yii::app()->user->getState('admin')||$empleado)
         $visible=true;
    ?>
<?php
    if ($visible)
        echo CHtml::link('<span class="icon-plus-sign" style="margin:0 1%"></span> Crear Ejemplar', array('/ejemplar/create', 'libro'=>$model->id), array('class' => 'btn btn-success span6', 'style' => 'margin:2% 0;'));
    ?>