<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php


/* Widget para adaptar con extesion tablesorter
 *
 * $this->widget('application.extensions.tablesorter.Sorter', array(
    'data'=>$records,
    'columns'=>array(
        'id',
        'username',
        'password',
        'email',
        // Relation value given in model
    )
));
*/


$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'users-grid',
    //Estilos de la vista para la tabla
    'itemsCssClass'=>"table table-striped table-responsive",
    'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    //Estilos para la tabla de administración. Mal funcionamiento del responsive de la tabla
    //'htmlOptions'=>array("class"=>"table-responsive table table-hover table-condensed"),
    'columns'=>array(
        'id',
        'username',
        'password',
        'email',
        array(
            'class'=>'CButtonColumn',
        ),
    ),
));



?>

