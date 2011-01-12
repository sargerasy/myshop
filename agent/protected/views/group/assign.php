<?php
$this->breadcrumbs=array(
	Utils::t('Group') => array('access/list'),
	Utils::t('Assign Role'),
);?>
<h1><?php echo Utils::t("assign Role").":".$name?></h1>

<div class="list-div">
	<form action="<?php echo $action ?>" method="POST">
		<table id="list-table" cellspacing="1">
			<?php foreach($selects as $cat=>$opt) { ?>
			<tr>
				<td class="first-cell" width="18%" valign="top">
					<input class="checkbox" type="checkbox"/><?php echo $cat ?>
				</td>
				<td>
					<?php foreach($opt as $k=>$v) { ?>
					<?php $id = $cat."-".$k ?>
					<div style="width: 130px; float:left;">
						<label for="<?php echo $id ?>">
							<input id="<?php echo $id ?>" value="<?php echo $v['value']->name; ?>" class="checkbox" type="checkbox"  name="actions[]" <?php echo $v['exist']?"checked":"" ?>/>
							<?php echo $v['unuse']?"<strike>".$k."</strike>":$k ?>
						</label>
					</div>
					<?php } ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="2" style="text-align:right"><input type="submit" value="<?php echo Utils::t("Add")?>"/></td>
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
	
	function check(obj)
	{
		var frm = obj.form;
		for (var i = 0; i < frm.elements.length; i++) {
			if (frm.elements[i].name == "actions"){
			}
		}
	}
</script>
