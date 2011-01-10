<?php
$this->breadcrumbs=array(
	Utils::t('Users')=>array('list'),
	Utils::t('List Users'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Utils::t('List Users'); ?></h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'email',
		'user_name',
		'qq',
		'mobile_phone',
		/*
		'sex',
		'birthday',
		'user_money',
		'frozen_money',
		'pay_points',
		'rank_points',
		'address_id',
		'reg_time',
		'last_login',
		'last_time',
		'last_ip',
		'visit_count',
		'user_rank',
		'is_special',
		'salt',
		'parent_id',
		'flag',
		'alias',
		'msn',
		'qq',
		'office_phone',
		'home_phone',
		'mobile_phone',
		'is_validated',
		'credit_line',
		'passwd_question',
		'passwd_answer',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
