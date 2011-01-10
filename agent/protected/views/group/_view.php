<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->group_id), array('view', 'id'=>$data->group_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_name')); ?>:</b>
	<?php echo CHtml::encode($data->group_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_desc')); ?>:</b>
	<?php echo CHtml::encode($data->group_desc); ?>
	<br />


</div>