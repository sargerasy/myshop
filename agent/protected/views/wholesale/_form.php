<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wholesale-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="search">
		Search For: 
		<?php echo CHtml::dropDownList('cat_id', '', array()); ?>
		<?php echo CHtml::dropDownList('brand_id', '', array()); ?>
		Goods No., Goods Name, Goods SN 
		<input id="keyword" type="text" size="10" name="keyword"/>
		<input id="search" class="button" type="button" value="Search" name="search"/>
	</div>
	<hr/>
	<div class="stuff">
		<select name="goods_id"></select>
	</div>
	<hr/>
	<div class="price-strategy">
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'goods_id'); ?>
		<?php echo $form->textField($model,'goods_id'); ?>
		<?php echo $form->error($model,'goods_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enable'); ?>
		<?php echo $form->textField($model,'enable'); ?>
		<?php echo $form->error($model,'enable'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
