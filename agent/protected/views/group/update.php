<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->group_id=>array('view','id'=>$model->group_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Group', 'url'=>array('index')),
	array('label'=>'Create Group', 'url'=>array('create')),
	array('label'=>'View Group', 'url'=>array('view', 'id'=>$model->group_id)),
	array('label'=>'Manage Group', 'url'=>array('admin')),
);
?>

<h1>Update Group <?php echo $model->group_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>