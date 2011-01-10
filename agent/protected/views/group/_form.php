<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'group_name'); ?>
		<?php echo $form->textField($model,'group_name'); ?>
		<?php echo $form->error($model,'group_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'group_desc'); ?>
		<?php echo $form->textField($model,'group_desc'); ?>
		<?php echo $form->error($model,'group_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->