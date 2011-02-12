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
				<th bgcolor="#ffffff"><?php echo Utils::t("Goods Name"); ?></th>
				<th bgcolor="#ffffff"><?php echo Utils::t("Count"); ?></th>
				<th bgcolor="#ffffff"><?php echo Utils::t("Wholesale Price"); ?></th>
				<th bgcolor="#ffffff"><?php echo Utils::t("Wholesale Total"); ?></th>
				<th bgcolor="#ffffff"><?php echo Utils::t("Operation"); ?></th>
			</tr>
			<!-- {foreach from=$cart_goods key=key item=goods} 循环批发商品开始 -->
			<tr>
				<td bgcolor="#ffffff" align="center"><a href="{$goods.goods_url}" target="_blank" class="f6">{$goods.goods_name}</a></td>
				<td bgcolor="#ffffff" align="center">{$goods.goods_number}</td>
				<td bgcolor="#ffffff" align="center">{$goods.formated_goods_price}</td>
				<td bgcolor="#ffffff" align="center">{$goods.formated_subtotal}</td>
				<td bgcolor="#ffffff" align="center"><a href="wholesale.php?act=drop_goods&key={$key}" class="f6">{$lang.drop}</a></td>
			</tr>
			<!--{/foreach}-->
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
		<input type="hidden" name="goods_id" value="<?php echo $model->goods_id ?>"/>
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

