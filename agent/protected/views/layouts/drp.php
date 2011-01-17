<?php
$this->menu = array(
		array('label'=>Utils::t('List Wholesales'), 'url'=>array('wholesale/list')),
		array('label'=>Utils::t('Add Wholesale'), 'url'=>array('wholesale/create')),
		//array('label'=>Utils::t('List Groups'), 'url'=>array('group/list')),
		//array('label'=>Utils::t('Add Group'), 'url'=>array('group/create')),
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

