<?php
$this->breadcrumbs=array(
	Utils::t('Access')=>array('list'),
	Utils::t('List Roles'),
);
?>

<h1><?php echo Utils::t('List Roles'); ?></h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$data,
	'filter'=>$model,
	'columns'=>array(
		'name',
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->controller->createUrl("access/assignRole", array("name"=>$data->primaryKey))',
			'updateButtonUrl'=>'Yii::app()->controller->createUrl("access/updateRole",array("name"=>$data->primaryKey))',
			'deleteButtonUrl'=>'Yii::app()->controller->createUrl("access/deleteRole",array("name"=>$data->primaryKey))',
		),
	),
)); ?>

