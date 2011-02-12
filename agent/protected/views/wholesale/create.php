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
	<?php echo CHtml::button(Utils::t('Search'), array(
		'ajax' => array(
			'type'=>'POST',
			'url'=>CController::createUrl('wholesale/search'),
			'update'=>'#goods_id',
			'data'=>array('cat_id'=>'js:$("#cat_id").val()',
						'brand_id'=>'js:$("#brand_id").val()',
					),
		)));
	?>
</div>
<hr/>
<form onsubmit="return validate()" method="POST" action=<?php echo Yii::app()->controller->createUrl("wholesale/save")?> >
	<div class="stuff">
	<table>
		<tr>
			<td><?php echo Utils::t("Goods Name")?>: </td>
			<td><?php echo CHtml::dropDownList('goods_id', '', array('0'=>Utils::t('Search Goods First'),)); ?></td>
		</tr>
		<tr>
			<td><?php echo Utils::t("Description") ?>:</td>
			<td><textarea name="desc"></textarea></td>
		</tr>
	</table>
	</div>
	<hr/>
	<div class="price-strategy">
			<table>
				<tr id="ps-first">
					<td><?php echo Utils::t('quantity')?>: <input type="text" value="0" name="quantity[]"/></td>
					<td><?php echo Utils::t('price')?>: <input type="text" value="0" name="price[]"/></td>
					<td><?php echo Utils::t('commision')?>: <input type="text" value="0" name="commision[]"/></td>
					<td><?php echo CHtml::button('+', array()) ?></td>
				</tr>
				<tr id="ps-last">
					<td colspan="4"><center><input class="button" type="submit" value="<?php echo Utils::t("Save") ?>"/></center></td>
				</tr>
			</table>
	</div>
</form>
<script type='text/javascript'>
	$(document).ready(function() {
		$("#ps-first td:last-child input").click(addEmptyPriceStrategy);
	});

	function validate()
	{
		if($("#goods_id").val() > 0) {
			return true;
		}
		alert("<?php echo Utils::t("Search Goods First") ?>");
		return false;
	}
	function addEmptyPriceStrategy()
	{
		var last = $("#ps-last");
		var line = $("#ps-first").clone();
		line.attr('id', 'ps-normal');
		line.find('td:last-child input').val('-').click(delPriceStrategyLine);
		last.before(line);
	}
	function delPriceStrategyLine()
	{
		$(this).parent().parent().remove();
	}
</script>
