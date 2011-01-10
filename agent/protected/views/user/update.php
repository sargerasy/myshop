<?php
$this->breadcrumbs=array(
	Utils::t('Users')=>array('list'),
	$model->user_name,
);
?>

<h1><?php echo $model->user_name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
