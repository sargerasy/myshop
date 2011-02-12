<?php
$this->breadcrumbs=array(
	'Wholesales'=>array('index'),
	'Update',
);

$this->menu=array(
	array('label'=>'List Wholesale', 'url'=>array('index')),
	array('label'=>'Manage Wholesale', 'url'=>array('admin')),
);
?>

<h1><?php echo Utils::t("Update Wholesale") ?></h1>

<hr/>
<div class="stuff">
<table>
	<tr>
		<td><?php echo Utils::t("Goods Name")?>: </td>
		<td><?php echo $model->goods->goods_name ?></td>
	</tr>
	<tr>
		<td><?php echo Utils::t("Wholesale Name")?>: </td>
		<td><input id="goods_name" type="text" value="<?php echo $model->name ?>"/></td>
	</tr>
	<tr>
		<td><?php echo Utils::t("Description") ?>:</td>
		<td><textarea id="desc" name="desc"><?php echo $model->desc ?></textarea></td>
	</tr>
	<tr>
		<td><?php echo Utils::t("Enable") ?>:</td>
		<td><input id="enable" type="checkbox" name="enable" <?php echo intval($model->enable) ? "checked" : "" ?>/></td>
	</tr>
	<input id="id" type="hidden" value="<?php echo $model->id ?>"/>
	<tr>
		<td colspan="2"><center>
			<input id="save" class="button" type="button" value="<?php echo Utils::t("Save") ?>"/>
		</center></td>
	</tr>
</table>
</div>
<hr/>
<div class="price-strategy">
		<table>
			<?php $first = true; foreach($model->price_strategies as $ps) { ?>
			<tr id=<?php echo $first ? "ps-first" : "ps-normal" ?>>
				<td><input type="hidden" id="ps-id" name="ps-id" value="<?php echo $ps->id ?>"/></td>
				<td><?php echo Utils::t('quantity')?>: <input type="text" value="<?php echo $ps->quantity ?>" name="quantity"/></td>
				<td><?php echo Utils::t('price')?>: <input type="text" value="<?php echo $ps->price ?>" name="price"/></td>
				<td><?php echo Utils::t('commision')?>: <input type="text" value="<?php echo $ps->commision ?>" name="commision"/></td>
				<td><?php echo CHtml::button($first ? "+" : "-", array()) ?></td>
			</tr>
			<?php $first = false ?>
			<?php } ?>
		</table>
</div>
<script type='text/javascript'>
	$(document).ready(function() {
		$("#ps-first td:last-child input").click(addEmptyPriceStrategy);
		$("#ps-normal td:last-child input").click(delPriceStrategyLine);
		$("#save").click(saveWholesale);
	});

	function saveWholesale()
	{
		$.ajax({
			'type': 'POST',
			'url': '<?php echo Yii::app()->controller->createUrl("wholesale/updateWholesale"); ?>',
			'data': {
				'name': $("#goods_name").val(), 
				'desc': $("#desc").val(), 
				'enable': $("#enable").attr("checked"),
				'id': $("#id").val()
			},
			'success': function(data, status) {
				alert(data);
			}
		});
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
