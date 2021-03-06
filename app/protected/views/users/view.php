<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(

	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>View Users #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
    //Definiendo el estilo de las vistas con diseño Bootstrap con array clave-valor al htmlOptions
    'htmlOptions'=>array("class"=>"table table-hover"),
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
	),
)); ?>

<!--Renderizando vista para reutilizacion de cogido. Nombre de la vista y parametros asignados-->
<?php $this->renderPartial("_roles",array("role"=>$role,"model"=>$model));?>
