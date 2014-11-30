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
?>

<div>
    <?php
    $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => $model->idejemplar0->idlibro0->nombre,
        'headerIcon' => 'icon-book',
        'htmlOptions' => array('class' => 'bootstrap-widget-table span8', 'style' => 'margin:0 20%;'),
    ));
    ?>
    <table>
        <tbody>
            <tr>
                <th class="label label-success span8" colspan="2" style="text-align: center;"> <?php echo $model->idtipo0->tipo; ?></span></th>
            </tr>
            <tr >
                <td> <span class="label label-info" style="width:75px;"> Retiro </span> <?php echo $model->retiro; ?></td>
                <td> <span class="label label-info" style="width:75px;"> Devolucion </span> <?php echo $model->devolucion; ?></td>
            </tr>
            <tr>
                <td> <span class="label label-info" style="width:75px;"> Observacion </span> <?php echo $model->observacion; ?></td>
                <td> <span class="label label-info" style="width:75px;"> Socio </span> <?php echo $model->idsocio0->idusuario0->nombre . ' ' . $model->idsocio0->idusuario0->apellido; ?></td>
            </tr>

        </tbody>
    </table>
<?php $this->endWidget(); ?>
</div>
