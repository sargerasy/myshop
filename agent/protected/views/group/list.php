<?php
$this->breadcrumbs=array(
	Utils::t('Groups')=>array('list'),
	Utils::t('List Groups'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('group-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Utils::t('List Groups'); ?></h1>

<?php echo CHtml::link(Utils::t('Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'group-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'group_id',
		'group_name',
		'group_desc',
		'memberCount',
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("group/member", array("id"=>$data->primaryKey))',
			'viewButtonLabel'=>Utils::t("Members"),
		),
	),
)); ?>
