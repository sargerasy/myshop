<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

<table>
	<tr>
		<td><?php echo $form->labelEx($model,'user_name'); ?></td>
		<td><?php echo $form->textField($model,'user_name'); ?></td>
		<td><?php echo $form->error($model,'user_name'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'email'); ?></td>
		<td><?php echo $form->textField($model,'email'); ?></td>
		<td><?php echo $form->error($model,'email'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'password'); ?></td>
		<td><?php echo $form->passwordField($model,'password'); ?></td>
		<td><?php echo $form->error($model,'password'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'password_repeat'); ?></td>
		<td><?php echo $form->passwordField($model,'password_repeat'); ?></td>
		<td><?php echo $form->error($model,'password_repeat'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'msn'); ?></td>
		<td><?php echo $form->textField($model,'msn'); ?></td>
		<td><?php echo $form->error($model,'msn'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'qq'); ?></td>
		<td><?php echo $form->textField($model,'qq'); ?></td>
		<td><?php echo $form->error($model,'qq'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'office_phone'); ?></td>
		<td><?php echo $form->textField($model,'office_phone'); ?></td>
		<td><?php echo $form->error($model,'office_phone'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'home_phone'); ?></td>
		<td><?php echo $form->textField($model,'home_phone'); ?></td>
		<td><?php echo $form->error($model,'home_phone'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'mobile_phone'); ?></td>
		<td><?php echo $form->textField($model,'mobile_phone'); ?></td>
		<td><?php echo $form->error($model,'mobile_phone'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'passwd_question'); ?></td>
		<td><?php echo $form->textField($model,'passwd_question'); ?></td>
		<td><?php echo $form->error($model,'passwd_question'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'passwd_answer'); ?></td>
		<td><?php echo $form->textField($model,'passwd_answer'); ?></td>
		<td><?php echo $form->error($model,'passwd_answer'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td align="center" colspan="2"><?php echo CHtml::submitButton($model->isNewRecord ? Utils::t('Create') : Utils::t('Save')); ?></td>
	</tr>
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->
