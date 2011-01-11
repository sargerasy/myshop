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
		),
	),
)); ?>
