<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_name'); ?>
		<?php echo $form->textField($model,'user_name',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question'); ?>
		<?php echo $form->textField($model,'question',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer'); ?>
		<?php echo $form->textField($model,'answer',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birthday'); ?>
		<?php echo $form->textField($model,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_money'); ?>
		<?php echo $form->textField($model,'user_money',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'frozen_money'); ?>
		<?php echo $form->textField($model,'frozen_money',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pay_points'); ?>
		<?php echo $form->textField($model,'pay_points',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rank_points'); ?>
		<?php echo $form->textField($model,'rank_points',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address_id'); ?>
		<?php echo $form->textField($model,'address_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reg_time'); ?>
		<?php echo $form->textField($model,'reg_time',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_login'); ?>
		<?php echo $form->textField($model,'last_login',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_time'); ?>
		<?php echo $form->textField($model,'last_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_ip'); ?>
		<?php echo $form->textField($model,'last_ip',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visit_count'); ?>
		<?php echo $form->textField($model,'visit_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_rank'); ?>
		<?php echo $form->textField($model,'user_rank'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_special'); ?>
		<?php echo $form->textField($model,'is_special'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'flag'); ?>
		<?php echo $form->textField($model,'flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'msn'); ?>
		<?php echo $form->textField($model,'msn',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qq'); ?>
		<?php echo $form->textField($model,'qq',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'office_phone'); ?>
		<?php echo $form->textField($model,'office_phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'home_phone'); ?>
		<?php echo $form->textField($model,'home_phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mobile_phone'); ?>
		<?php echo $form->textField($model,'mobile_phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_validated'); ?>
		<?php echo $form->textField($model,'is_validated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_line'); ?>
		<?php echo $form->textField($model,'credit_line',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'passwd_question'); ?>
		<?php echo $form->textField($model,'passwd_question',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'passwd_answer'); ?>
		<?php echo $form->textField($model,'passwd_answer',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->