<?php if ($this->_var['full_page']): ?>
<!-- $Id: users_list.htm 15617 2009-02-18 05:18:00Z sunxiaodong $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>

<div class="form-div">
<?php echo $this->_var['lang']['page_note']; ?><?php echo $this->_var['lang']['total_records']; ?><?php echo $this->_var['record_count']; ?><?php echo $this->_var['lang']['how_many_user']; ?>
</div>

<form method="POST" action="" name="listForm">

<!-- start users list -->
<div class="list-div" id="listDiv">
<?php endif; ?>
<!--用户列表部分-->
<table cellpadding="3" cellspacing="1">
  <tr>
    <th><?php echo $this->_var['lang']['record_id']; ?></th>
    <th><?php echo $this->_var['lang']['username']; ?></th>
    <th><?php echo $this->_var['lang']['affiliate_level']; ?><?php echo $this->_var['lang']['level']; ?></th>
    <th><?php echo $this->_var['lang']['email']; ?></th>
    <th><?php echo $this->_var['lang']['is_validated']; ?></th>
    <th><?php echo $this->_var['lang']['user_money']; ?></th>
    <th><?php echo $this->_var['lang']['frozen_money']; ?></th>
    <th><?php echo $this->_var['lang']['rank_points']; ?></th>
    <th><?php echo $this->_var['lang']['pay_points']; ?></th>
    <th><?php echo $this->_var['lang']['reg_date']; ?></th>
    <th><?php echo $this->_var['lang']['handler']; ?></th>
  <tr>
  <?php $_from = $this->_var['user_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'user');if (count($_from)):
    foreach ($_from AS $this->_var['user']):
?>
  <tr>
    <td><?php echo $this->_var['user']['user_id']; ?></td>
    <td class="first-cell"><?php echo htmlspecialchars($this->_var['user']['user_name']); ?></td>
    <td class="first-cell"><?php echo $this->_var['user']['level']; ?></td>
    <td><span onclick="listTable.edit(this, 'edit_email', <?php echo $this->_var['user']['user_id']; ?>)"><?php echo $this->_var['user']['email']; ?></span></td>
    <td align="center"><?php if ($this->_var['user']['is_validated']): ?> <img src="images/yes.gif"> <?php else: ?> <img src="images/no.gif"> <?php endif; ?></td>
    <td><?php echo $this->_var['user']['user_money']; ?></td>
    <td><?php echo $this->_var['user']['frozen_money']; ?></td>
    <td><?php echo $this->_var['user']['rank_points']; ?></td>
    <td><?php echo $this->_var['user']['pay_points']; ?></td>
    <td align="center"><?php echo $this->_var['user']['reg_time']; ?></td>
    <td align="center">
      <a href="users.php?act=edit&id=<?php echo $this->_var['user']['user_id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>"><img src="images/icon_edit.gif" border="0" height="16" width="16" /></a>
      <a href="users.php?act=address_list&id=<?php echo $this->_var['user']['user_id']; ?>" title="<?php echo $this->_var['lang']['address_list']; ?>"><img src="images/book_open.gif" border="0" height="16" width="16" /></a>
      <a href="order.php?act=list&user_id=<?php echo $this->_var['user']['user_id']; ?>" title="<?php echo $this->_var['lang']['view_order']; ?>"><img src="images/icon_view.gif" border="0" height="16" width="16" /></a>
      <a href="account_log.php?act=list&user_id=<?php echo $this->_var['user']['user_id']; ?>" title="<?php echo $this->_var['lang']['view_deposit']; ?>"><img src="images/icon_account.gif" border="0" height="16" width="16" /></a>
      <a href="javascript:confirm_redirect('<?php echo $this->_var['lang']['remove_confirm']; ?>', 'users.php?act=remove&id=<?php echo $this->_var['user']['user_id']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>"><img src="images/icon_drop.gif" border="0" height="16" width="16" /></a>
    </td>
  </tr>
  <?php endforeach; else: ?>
  <tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
  <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
</table>

<?php if ($this->_var['full_page']): ?>
</div>
<!-- end users list -->
</form>
<script type="text/javascript" language="JavaScript">
<!--

onload = function()
{
    document.forms['searchForm'].elements['keyword'].focus();
    // 开始检查订单
    startCheckOrder();
}
//-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>