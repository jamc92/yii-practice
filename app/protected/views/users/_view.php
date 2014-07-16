<?php
/* @var $this UsersController */
/* @var $data Users */
?>
<!--Estilos para la muestra de los usuarios-->
<div class="media">
	<div class="media-body">
		<h3 class="media-heading">
			<!--Llama la etiqueta del valor asignado-->
			<?php echo CHtml::encode($data->getAttributeLabel('id')); ?>: 
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
			<!--Llama el valor en la base de datos-->
			<?php echo CHtml::encode($data->username);?>
			<small><?php echo CHtml::encode($data->email); ?></small>
		</h3>

	</div>
</div>