<?php
$this->breadcrumbs=array(
	'Wholesales'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Wholesale', 'url'=>array('index')),
	array('label'=>'Manage Wholesale', 'url'=>array('admin')),
);
?>

<h1><?php echo Utils::t("Create Wholesale") ?></h1>

<div class="search">
	<?php echo Utils::t("Search For"); ?>: 
	<select name="cat_id" id="cat_id">
		<option value="0"><?php echo Utils::t("All Categories");?></option>
		<?php echo $categories; ?>
	</select>
	<?php echo CHtml::dropDownList('brand_id', '', CHtml::listData($brands, 'brand_id', 'brand_name')); ?>
	<?php echo Utils::t("Goods No., Goods Name, Goods SN"); ?>:
	<input id="keyword" type="text" size="10" name="keyword"/>
	<?php echo CHtml::button('Search', array(
		'ajax' => array(
			'type'=>'POST',
			'url'=>CController::createUrl('wholesale/search'),
			'update'=>'#goods_id',
			'data'=>'',
		)));
	?>
</div>
<hr/>
<div class="stuff">
Goods Name: <?php echo CHtml::dropDownList('goods_id', '', array()); ?>
</div>
<hr/>
<div class="price-strategy">
</div>
