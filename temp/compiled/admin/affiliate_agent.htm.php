<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'validator.js')); ?>
<div class="form-div">
<form method="post" action="affiliate_agent.php">
<input type="radio" name="on" value="1" <?php if ($this->_var['config']['on'] == 1): ?> checked="true" <?php endif; ?> onClick="javascript:actDiv('listDiv','');"><?php echo $this->_var['lang']['on']; ?>
<input type="radio" name="on" value="0" <?php if (! $this->_var['config']['on'] || $this->_var['config']['on'] == 0): ?> checked="true" <?php endif; ?> onClick="javascript:actDiv('listDiv','none');"><?php echo $this->_var['lang']['off']; ?>
<br><br>
<input type="hidden" name="act" value="on" />
<input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button" id="btnon"/>
</form>
</div>
<div class="list-div" id="listDiv">
<?php endif; ?>
<table cellspacing='1' cellpadding='3'>
	<tr>
		<th name="levels" ReadOnly="true" width="10%"><?php echo $this->_var['lang']['levels']; ?></th>
		<th name="level_point" Type="TextBox"><?php echo $this->_var['lang']['level_point']; ?></th>
		<th name="level_money" Type="TextBox"><?php echo $this->_var['lang']['level_money']; ?></th>
		<th Type="Button"><?php echo $this->_var['lang']['handler']; ?></th>
	</tr>
<?php $_from = $this->_var['config']['item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');$this->_foreach['nav'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav']['total'] > 0):
    foreach ($_from AS $this->_var['val']):
        $this->_foreach['nav']['iteration']++;
?>
<tr align="center">
	<td><?php echo $this->_foreach['nav']['iteration']; ?></td>
	<td><span onclick="listTable.edit(this, 'edit_point', '<?php echo $this->_foreach['nav']['iteration']; ?>'); return false;"><?php echo $this->_var['val']['level_point']; ?></span></td>
	<td><span onclick="listTable.edit(this, 'edit_money', '<?php echo $this->_foreach['nav']['iteration']; ?>'); return false;"><?php echo $this->_var['val']['level_money']; ?></span></td>
	<td ><a href="javascript:confirm_redirect(lang_removeconfirm, 'affiliate_agent.php?act=del&id=<?php echo $this->_foreach['nav']['iteration']; ?>')"><img style="border:0px;" src="images/no.gif" /></a></td>
</tr>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</table>
<?php if ($this->_var['full_page']): ?>
</div>
</div>
<script type="Text/Javascript" language="JavaScript">
<!--
<?php if (! $this->_var['config']['on'] || $this->_var['config']['on'] == 0): ?>
actDiv('listDiv','none');
<?php endif; ?>

var all_null = '<?php echo $this->_var['lang']['all_null']; ?>';

onload = function()
{
  // 开始检查订单
  startCheckOrder();
  cleanWhitespace(document.getElementById("listDiv"));
  if (document.getElementById("listDiv").childNodes[0].rows.length<6)
  {
    listTable.addRow(check);
  }
  
}
function check(frm)
{
  if (frm['level_point'].value == "" && frm['level_money'].value == "")
  {
     frm['level_point'].focus();
     alert(all_null);
     return false;  
  }
  
  return true;
}
function actDiv(divname, flag)
{
    document.getElementById(divname).style.display = flag;
}

//-->
</script>
<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>
