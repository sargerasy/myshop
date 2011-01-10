<?php
$this->breadcrumbs=array(
	Utils::t('Groups')=>array('list'),
	Utils::t('Members'),
);

?>

<h1><?php echo $model->group_name ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'member-grid',
	'dataProvider'=>$model->members(),
//	'filter'=>$model,
	'columns'=>array(
		'user_id',
		'user_name',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
			'updateButtonUrl'=>'Yii::app()->controller->createUrl("user/update",array("id"=>$data->primaryKey))',
			'deleteButtonUrl'=>'Yii::app()->controller->createUrl("group/remove",array("group_id"=>'.$model->group_id.',"user_id"=>$data->primaryKey))',
		),
	),
)); ?>

<h1><?php echo Utils::t("Add to Group") ?></h1>
<form method="POST" action="<?php echo $action ?>">
	<fieldset>
		<legend><?php echo Utils::t("Select Users") ?></legend>

		<dl>
			<dt></dt>
		</dl>
		<dd>
			<select multiple="multiple" size="10" name="users[]" style="width: 30%;margin: 0 0 0 45%;">
				<?php foreach($users as $user){ ?>
				<option value="<?php echo $user->user_id ?>"><?php echo $user->user_name ?></option>
				<?php } ?>
			</select>
			<br/>
		</dd>
		<dd>
		</dd>
		<p style="text-align:right;">
			<input type="hidden" name="group_id" value="<?php echo $model->group_id ?>"/>
			<input type="submit" value="submit"/>
		</p>
	</fieldset>
</form>

