<!-- $Id: goods_batch_edit.htm 16992 2010-01-19 08:45:49Z wangleisvn $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<ul style="margin: 0pt; padding: 0pt; list-style-type: none; color: rgb(204, 0, 0);">
<li style="border: 1px solid rgb(204, 0, 0); padding: 10px; background: rgb(255, 255, 204) none repeat scroll 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; margin-bottom: 5px;"><?php echo $this->_var['lang']['notice_edit']; ?></li>
</ul>
<div style="background-color: #F4FAFB;"></div>
<div class="list-div">
<form action="goods_batch.php?act=update" method="post" name="theForm">
<table cellspacing="1" cellpadding="3" width="100%">
  <?php if ($this->_var['edit_method'] == "each"): ?>
  <tr>
    <th scope="col"><?php echo $this->_var['lang']['goods_sn']; ?></th>
    <th scope="col"><?php echo $this->_var['lang']['goods_name']; ?></th>
    <th scope="col"><?php echo $this->_var['lang']['market_price']; ?></th>
    <th scope="col"><?php echo $this->_var['lang']['shop_price']; ?></th>
    <?php $_from = $this->_var['rank_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rank');if (count($_from)):
    foreach ($_from AS $this->_var['rank']):
?>
    <th scope="col"><?php echo $this->_var['rank']['rank_name']; ?></th>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <th scope="col"><?php echo $this->_var['lang']['integral']; ?></th>
    <th scope="col"><?php echo $this->_var['lang']['give_integral']; ?></th>
    <th scope="col"><?php echo $this->_var['lang']['goods_number']; ?></th>
    <th scope="col"><?php echo $this->_var['lang']['brand']; ?></th>
  </tr>
  <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
  <tr align="center">
    <td class="first-cell" scope="row"><?php echo $this->_var['goods']['goods_sn']; ?></td>
    <td class="first-cell" scope="row"><?php echo $this->_var['goods']['goods_name']; ?></td>
    <td>
      <input name="market_price[<?php echo $this->_var['goods']['goods_id']; ?>]" type="text" value="<?php echo $this->_var['goods']['market_price']; ?>" size="8" style="text-align:right" />    </td>
    <td>
      <input name="shop_price[<?php echo $this->_var['goods']['goods_id']; ?>]" type="text" value="<?php echo $this->_var['goods']['shop_price']; ?>" size="8" style="text-align:right" />    </td>
    <?php $_from = $this->_var['rank_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rank');if (count($_from)):
    foreach ($_from AS $this->_var['rank']):
?>
    <td>
      <input name="member_price[<?php echo $this->_var['goods']['goods_id']; ?>][<?php echo $this->_var['rank']['rank_id']; ?>]" type="text" value="<?php echo empty($this->_var['member_price_list'][$this->_var['goods']['goods_id']][$this->_var['rank']['rank_id']]) ? '-1' : $this->_var['member_price_list'][$this->_var['goods']['goods_id']][$this->_var['rank']['rank_id']]; ?>" size="8" style="text-align:right" />    </td>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <td>
      <input name="integral[<?php echo $this->_var['goods']['goods_id']; ?>]" type="text" value="<?php echo $this->_var['goods']['integral']; ?>" size="8" style="text-align:right" />    </td>
    <td><input name="give_integral[<?php echo $this->_var['goods']['goods_id']; ?>]" type="text" id="give_integral[<?php echo $this->_var['goods']['goods_id']; ?>]" value="<?php echo $this->_var['goods']['give_integral']; ?>" size="8" style="text-align:right" /></td>
    <td>
      <input name="goods_number[<?php echo $this->_var['goods']['goods_id']; ?>]" type="text" value="<?php echo $this->_var['goods']['goods_number']; ?>" size="8" style="text-align:right" <?php if ($this->_var['goods']['is_real'] == 0): ?>readonly="readonly"<?php endif; ?> />    </td>
    <td><select name="brand_id[<?php echo $this->_var['goods']['goods_id']; ?>]"><option value="0" <?php if ($this->_var['goods']['brand_id'] == 0): ?>selected<?php endif; ?>><?php echo $this->_var['lang']['select_please']; ?></option><?php echo $this->html_options(array('options'=>$this->_var['brand_list'],'selected'=>$this->_var['goods']['brand_id'])); ?></select></td>
  </tr>
    <?php if (product_exists): ?>
      <?php $_from = $this->_var['product_list'][$this->_var['goods']['goods_id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'products');if (count($_from)):
    foreach ($_from AS $this->_var['products']):
?>
      <tr align="center">
        <td class="first-cell" scope="row"><?php echo $this->_var['products']['product_sn']; ?></td>
        <td class="first-cell" scope="row"><?php echo $this->_var['products']['goods_attr']; ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <?php $_from = $this->_var['rank_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rank');if (count($_from)):
    foreach ($_from AS $this->_var['rank']):
?>
          <td>&nbsp;</td>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>
          <input name="product_number[<?php echo $this->_var['goods']['goods_id']; ?>][<?php echo $this->_var['products']['product_id']; ?>]" type="text" value="<?php echo $this->_var['products']['product_number']; ?>" size="8" style="text-align:right"/>    </td>
        <td>&nbsp;</td>
      </tr>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <?php else: ?>
  <tr>
    <th scope="col" colspan="102"><?php echo $this->_var['lang']['goods_name']; ?></th>
  </tr>
  <tr align="center">
    <td colspan="102">
      <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?><?php echo $this->_var['goods']['goods_name']; ?>, <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>      </td>
  </tr>
  <tr>
    <th scope="col"><?php echo $this->_var['lang']['market_price']; ?></th>
    <th scope="col"><?php echo $this->_var['lang']['shop_price']; ?></th>
    <?php $_from = $this->_var['rank_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rank');if (count($_from)):
    foreach ($_from AS $this->_var['rank']):
?>
    <th scope="col"><?php echo $this->_var['rank']['rank_name']; ?></th>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <th scope="col"><?php echo $this->_var['lang']['integral']; ?></th>
    <th scope="col"><?php echo $this->_var['lang']['give_integral']; ?></th>
    <th scope="col"><?php echo $this->_var['lang']['goods_number']; ?></th>
    <th scope="col"><?php echo $this->_var['lang']['brand']; ?></th>
  </tr>
  <tr align="center">
    <td>
      <input name="market_price" type="text" value="" size="8" style="text-align:right" />    </td>
    <td>
      <input name="shop_price" type="text" size="8" style="text-align:right" />    </td>
    <?php $_from = $this->_var['rank_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rank');if (count($_from)):
    foreach ($_from AS $this->_var['rank']):
?>
    <td>
      <input name="member_price[<?php echo $this->_var['rank']['rank_id']; ?>]" type="text" size="8" style="text-align:right" />    </td>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <td>
      <input name="integral" type="text" size="8" style="text-align:right" />    </td>
    <td><input name="give_integral" type="text" id="give_integral" style="text-align:right" size="8" />    </td>
    <td>
      <input name="goods_number" type="text" size="8" style="text-align:right" />    </td>
    <td><select name="brand_id"><option value="0" selected><?php echo $this->_var['lang']['select_please']; ?></option><?php echo $this->html_options(array('options'=>$this->_var['brand_list'])); ?></select></td>
  </tr>
  <?php endif; ?>
  <tr align="center">
    <td colspan="22" scope="row">
      <input type="submit" name="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button" />
      <input type="reset" name="reset" value="<?php echo $this->_var['lang']['button_reset']; ?>" class="button" />
      <input type="hidden" name="edit_method" value="<?php echo $this->_var['edit_method']; ?>" />
      <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
      <input type="hidden" name="goods_id[]" value="<?php echo $this->_var['goods']['goods_id']; ?>" />
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php $_from = $this->_var['rank_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rank');if (count($_from)):
    foreach ($_from AS $this->_var['rank']):
?>
      <input type="hidden" name="rank_id[]" value="<?php echo $this->_var['rank']['rank_id']; ?>" />
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>    </td>
  </tr>
</table>
</form>
</div>
<?php echo $this->fetch('pagefooter.htm'); ?>