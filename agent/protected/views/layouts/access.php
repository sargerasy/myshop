<?php
$this->menu = array(
		array('label'=>Utils::t('List Operations'), 'url'=>array('operation')),
		//array('label'=>Utils::t('List Tasks'), 'url'=>array('task')),
		//array('label'=>Utils::t('Add Task'), 'url'=>array('addTask')),
		array('label'=>Utils::t('List Roles'), 'url'=>array('role')),
		array('label'=>Utils::t('Create Role'), 'url'=>array('createRole')),
		array('label'=>Utils::t('Assign Role'), 'url'=>array('assignRole')),
	);
?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-5 last">
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>Utils::t('Menu'),
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>

