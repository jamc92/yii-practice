<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 17/07/14
 * Time: 11:15 AM
 */
?>

<h1>Countries</h1>

<!--Creando link para crear pais-->
<?php echo CHtml::link("Crear",array("create"));?>
<!--En cada iteracion a $counties se obtieen una instancia del modelo-->
<?php foreach($countries as $data):?>
<!--Imprimiendo los nombres del registro y al status-->
<h3><?php echo $data->name?> <small><?php echo $data->status==1?"Enabled":"Disabled";?></small></h3>

<!--Creando link en cada registro y mostrando el ID-->
<label class="badge badge-info"><?php echo $data->id?></label>
    <!--Parametros clave valor del metodo GET-->
<?php echo CHtml::link("Update",array("update","id"=>$data->id)); ?>
 |
<!--Creando link para eliminar registro-->
<?php echo CHtml::link("Delete",array("delete","id"=>$data->id),array("confirm"=>"Are you sure to delete this item?"));?>
    <hr>


<?php endforeach;?>

