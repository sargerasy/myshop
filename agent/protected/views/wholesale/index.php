<?php
$this->breadcrumbs=array(
	'Wholesales',
);

$this->menu=array(
	array('label'=>'Create Wholesale', 'url'=>array('create')),
	array('label'=>'Manage Wholesale', 'url'=>array('admin')),
);
?>

<h1>Wholesales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
