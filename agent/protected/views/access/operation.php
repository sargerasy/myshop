<?php
$this->breadcrumbs=array(
	Utils::t('Access'),
);?>
<h1><?php echo Utils::t("List Operations")?></h1>

<div class="list-div">

	<form action="<?php echo $addaction ?>" method="POST">
		<fieldset>
			<legend><?php echo Utils::t("UnSelected Action")?></legend>

			<dl>
				<dt></dt>
				<dd align="center" style="text-align:center;">
					<select size="10" multiple="multiple" id="access" name="accesses[]" style="width: 30%;">
						<?php foreach($actions as $controller=>$action) {?>
						<optgroup label="<?php echo $controller ?>">
							<?php foreach($action as $a=>$v) { ?>
								<option value="<?php echo $controller.'/'.$a?>"><?php echo $a;?></option>
							<?php } ?>
						</optgroup>
						<?php } ?>
					</select>
				</dd>
				<dd align="center" style="text-align:center;">
					<label><input id="SelectAll" name="all" type="checkbox" value="1"/> <?php echo Utils::t("Select ALL")?></label>
				</dd>
				<p style="text-align: right; margin: 0;">
					<input type="submit" value="<?php echo Utils::t("Add") ?>"/>
				</p>
			</dl>
		</fieldset>
	</form>

	<form action="<?php echo $delaction ?>" method="POST">
		<table id="list-table" cellspacing="1">
			<?php foreach($operations as $cat=>$opt) { ?>
			<tr>
				<td class="first-cell" width="18%" valign="top">
					<input class="checkbox" type="checkbox"/><?php echo $cat ?>
				</td>
				<td>
					<?php foreach($opt as $k=>$v) { ?>
					<?php $id = $cat."-".$k ?>
					<div style="width: 130px; float:left;">
						<label for="<?php echo $id ?>">
							<input id="<?php echo $id ?>" value="<?php echo $cat."/".$k ?>" class="checkbox" type="checkbox" name="actions[]"/>
							<?php echo $v->noaction?"<strike>".$k."</strike>":$k ?>
						</label>
					</div>
					<?php } ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="2" style="text-align:right"><input type="submit" value="<?php echo Utils::t("Delete")?>"/></td>
			</tr>
		</table>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#SelectAll").click(function(){
			if ($("#SelectAll").attr("checked") == true) {
				$("#access option").attr("selected", true);
			}
		});
	});
</script>
