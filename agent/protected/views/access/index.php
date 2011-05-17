<?php
$this->breadcrumbs=array(
	'Access Control',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>


<fieldset>
	<legend>UnSelected Action</legend>

	<form action="<?php echo $formaction ?>" method="POST">
		<select multiple="multiple" id="access" name="accesses[]">
		<?php foreach($actions as $controller=>$action) {?>
			<optgroup label="<?php echo $controller ?>">
			<?php foreach($action as $a=>$v) { ?>
				<option value="<?php echo $controller.'/'.$a?>"><?php echo $a;?></option>
			<?php } ?>
			</optgroup>
		<?php } ?>
		</select>
		<input id="SelectAll" name="all" type="checkbox" value="1"/> <label>Select ALL</label>
		<input type="submit" value="submit"/>
	</form>
</fieldset>

<table id="list-table" cellspacing="1" width="100%" border="1px">
	<?php foreach($operations as $cat=>$opt) { ?>
	<tr>
		<td class="first-cell" width="18%" valign="top">
			<input class="checkbox" type="checkbox"/><?php echo $cat ?>
		</td>
		<td>
			<?php foreach($opt as $k=>$v) { ?>
			<?php $id = $cat."-".$k ?>
			<div style="width: 200px; float:left;">
				<label for="<?php echo $id ?>">
					<input id="<?php echo $id ?>" class="checkbox" type="checkbox" name="action_code[]"/>
					<?php echo $k ?>
				</label>
			</div>
			<?php } ?>
		</td>
	</tr>
	<?php } ?>
</table>

<script type="text/javascript">
	$(document).ready(function() {
		$("#SelectAll").click(function(){
			if ($("#SelectAll").attr("checked") == true) {
				$("#access option").attr("selected", true);
			}
		});
	});
</script>
