<?php
$this->breadcrumbs=array(
	'Custom',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<div class="block">
	<h5><span><?php echo Utils::t("Wholesale Goods Cart") ?></span></h5>
	<div class="blank"></div>
		<table id='ws-cart' width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
			<tr>
				<th><?php echo Utils::t("Goods Name"); ?></th>
				<th><?php echo Utils::t("Count"); ?></th>
				<th><?php echo Utils::t("Wholesale Price"); ?></th>
				<th><?php echo Utils::t("Wholesale Total"); ?></th>
				<th><?php echo Utils::t("Operation"); ?></th>
			</tr>
			<!-- {foreach from=$cart_goods key=key item=goods} 循环批发商品开始 -->
			<?php foreach($carts as $cart) {?>
			<tr class="cart-line">
				<td><a href="<?php echo '../goods.php?id='.$cart['goods_id'] ?>" target="_blank" class="f6"><?php echo $cart['goods_name'] ?></a></td>
				<td><?php echo $cart['count'] ?></td>
				<td><?php echo $cart['price'] ?></td>
				<td><?php echo $cart['count'] * $cart['price']  ?></td>
				<td><a class="drop" href="<?php echo Yii::app()->createUrl('custom/dropCart', array('key'=>$cart['key'])) ?>"><?php echo $cart['drop_label'] ?></a></td>
			</tr>
			<?php } ?>
		</table>
		<form method="post" action="wholesale.php?act=submit_order">
			<table border="0" cellpadding="5" cellspacing="1" width="100%">
				<tr>
					<td class="f5" style="text-decoration:none;"><?php echo Utils::t("Wholesale Remark") ?></td>
				</tr>
				<tr>
					<td><textarea name="remark" rows="4" class="border" style="width:99%; border:1px solid #ccc;"></textarea></td>
				</tr>
				<tr>
					<td align="center"><input type="submit" class="bnt_bonus"  value="<?php echo Utils::t("Submit") ?>" /></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
	<tr>
		<th width="200" align="center" bgcolor="#ffffff"><?php echo Utils::t("Goods Name") ?></th>
		<th width="200" align="center" bgcolor="#ffffff"><?php echo Utils::t("Goods Attr") ?></th>
		<th width="250" align="center" bgcolor="#ffffff"><?php echo Utils::t("Goods Price") ?></th>
		<th width="80" align="center" bgcolor="#ffffff"><?php echo Utils::t("Goods Count") ?></th>
		<th width="130" align="center" bgcolor="#ffffff">&nbsp;</th>
	</tr>

	<!-- {foreach from=$wholesale_list item=wholesale} 循环批发商品开始 -->
	<?php foreach($models as $model) { ?>
	<tr class="ws-line">
		<input type="hidden" name="ws_id" value="<?php echo $model->id ?>"/>
		<td bgcolor="#ffffff"><?php echo $model->name ?></td>
		<td bgcolor="#ffffff">

			<table width="100%" border="0" align="center">
				<?php foreach($model->goods->attrs as $attr) { ?>
				<tr>
					<td nowrap="true" style="border-bottom:2px solid #ccc;"><?php echo $attr->attribute->attr_name ?></td>
					<td style="border-bottom:1px solid #ccc;"><?php echo $attr->attr_value ?></td>
				</tr>
				<?php } ?>
			</table>
		</td>

		<td bgcolor="#ffffff">
			<!-- {foreach from=$wholesale.price_ladder key=key item=attr_price} -->
			<table width="100%" border="0" align="center" cellspacing="1" bgcolor="#547289">
				<tr>
					<td align="left" nowrap="true" bgcolor="#ffffff" style="padding:5px;"><?php echo Utils::t("Count"); ?></td>
					<td bgcolor="#ffffff" style="padding:5px;"><?php echo Utils::t("Price") ?></td>
				</tr>

				<!-- {foreach from=$attr_price.qp_list key=qp_list_key item=qp_list_value} -->
				<?php foreach($model->price_strategies as $ps) { ?>
				<tr>
					<td align="left" nowrap="true" bgcolor="#ffffff" style="padding:5px;"><?php echo $ps->quantity ?></td>
					<td bgcolor="#ffffff" style="padding:5px;"><?php echo $ps->price ?></td>
				</tr>
				<?php } ?>
				<!-- {/foreach} -->
			</table>
			<br />
			<!-- {/foreach} -->
		</td>
		<td align="center" bgcolor="#ffffff" style="padding:5px;">
			<table width="100%" border="0" align="center" cellspacing="0" bgcolor="#547289">
				<tr>
					<td align="left" nowrap="true" bgcolor="#ffffff" style="padding:5px;" colspan="2">
						<input name="goods_count" type="text" class="inputBg" value="" size="10" />
					</td>
				</tr>
			</table>
		</td>
		<td bgcolor="#ffffff" align="center">
			<input name="add2cart" type="button" value="<?php echo Utils::t("Add to Cart"); ?>" style="margin:8px auto;" />
		</td>
	</tr>
	<?php } ?>
	<!--{/foreach}-->

</table>

