<?php
$this->breadcrumbs=array(
	Utils::t('Access')=>array('list'),
	Utils::t('Assign Role'),
);

?>

<h1><?php echo $role->name ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'role-grid',
	'dataProvider'=>new CActiveDataProvider(AuthItem, array('data'=>$role->users)),
//	'filter'=>$model,
	'columns'=>array(
		'user_id',
		'user_name',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
			'updateButtonUrl'=>'Yii::app()->controller->createUrl("user/update",array("id"=>$data->primaryKey))',
			'deleteButtonUrl'=>'Yii::app()->controller->createUrl("access/remove",array("role"=>'.$role->name.',"user_id"=>$data->primaryKey))',
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
			<input type="hidden" name="name" value="<?php echo $role->name ?>"/>
			<input type="submit" value="submit"/>
		</p>
	</fieldset>
</form>

