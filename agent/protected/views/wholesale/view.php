<?php
$this->breadcrumbs=array(
	'Wholesales'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Wholesale', 'url'=>array('index')),
	array('label'=>'Create Wholesale', 'url'=>array('create')),
	array('label'=>'Update Wholesale', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Wholesale', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Wholesale', 'url'=>array('admin')),
);
?>

<h1>View Wholesale #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'desc',
		'goods_id',
		'enable',
	),
)); ?>
