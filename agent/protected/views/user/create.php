<?php
$this->breadcrumbs=array(
	Utils::t('Users')=>array('list'),
	Utils::t('Add User'),
);
?>

<h1><?php echo Utils::t("Add User")?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
