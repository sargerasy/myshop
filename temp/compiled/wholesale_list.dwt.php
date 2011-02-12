<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.2" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>

<div class="block box">
 <div id="ur_here">
  <?php echo $this->fetch('library/ur_here.lbi'); ?>
 </div>
</div>

<div class="blank"></div>
<?php if ($this->_var['cart_goods']): ?>

<div class="block">
  <h5><span><?php echo $this->_var['lang']['wholesale_goods_cart']; ?></span></h5>
  <div class="blank"></div>
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
          <tr>
            <th bgcolor="#ffffff"><?php echo $this->_var['lang']['goods_name']; ?></th>
            <th bgcolor="#ffffff"><?php echo $this->_var['lang']['goods_attr']; ?></th>
            <th bgcolor="#ffffff"><?php echo $this->_var['lang']['number']; ?></th>
            <th bgcolor="#ffffff"><?php echo $this->_var['lang']['ws_price']; ?></th>
            <th bgcolor="#ffffff"><?php echo $this->_var['lang']['ws_subtotal']; ?></th>
            <th bgcolor="#ffffff"><?php echo $this->_var['lang']['handle']; ?></th>
          </tr>
          <?php $_from = $this->_var['cart_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
?>
          <tr>
            <td bgcolor="#ffffff" align="center"><a href="<?php echo $this->_var['goods']['goods_url']; ?>" target="_blank" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a></td>
            <td bgcolor="#ffffff" align="center"><?php echo $this->_var['goods']['goods_attr']; ?></td>
            <td bgcolor="#ffffff" align="center"><?php echo $this->_var['goods']['goods_number']; ?></td>
            <td bgcolor="#ffffff" align="center"><?php echo $this->_var['goods']['formated_goods_price']; ?></td>
            <td bgcolor="#ffffff" align="center"><?php echo $this->_var['goods']['formated_subtotal']; ?></td>
            <td bgcolor="#ffffff" align="center"><a href="wholesale.php?act=drop_goods&key=<?php echo $this->_var['key']; ?>" class="f6"><?php echo $this->_var['lang']['drop']; ?></a></td>
          </tr>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </table>
   <form method="post" action="wholesale.php?act=submit_order">
          <table border="0" cellpadding="5" cellspacing="1" width="100%">
            <tr>
              <td class="f5" style="text-decoration:none;"><?php echo $this->_var['lang']['ws_remark']; ?></td>
            </tr>
            <tr>
              <td><textarea name="remark" rows="4" class="border" style="width:99%; border:1px solid #ccc;"></textarea>
              </td>
            </tr>
            <tr>
              <td align="center"><input type="submit" class="bnt_bonus"  value="<?php echo $this->_var['lang']['submit']; ?>" /></td>
            </tr>
          </table>
        </form>
</div>
<div class="blank5"></div>
<?php endif; ?>

<?php if ($this->_var['wholesale_list']): ?>
<div class="block">
  <h5><span><?php echo $this->_var['lang']['wholesale_goods_list']; ?></span><?php echo $this->_var['lang']['btn_display']; ?>：
  <a href="javascript:void(0);" onClick="javascript:display_mode_wholesale('list')"><img align="middle" src="themes/default/images/display_mode_list<?php if ($this->_var['pager']['display'] == 'list'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['list']; ?>"></a>
  <a href="javascript:void(0);" onClick="javascript:display_mode_wholesale('text')"><img align="middle" src="themes/default/images/display_mode_text<?php if ($this->_var['pager']['display'] == 'text'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['text']; ?>"></a>&nbsp;&nbsp;<a href="wholesale.php?act=price_list" class="f6"><?php echo $this->_var['lang']['ws_price_list']; ?></a></h5>
  <div class="blank"></div>

  <table border="0" cellpadding="5" cellspacing="1" width="100%">
    <form method="post" action="wholesale.php?act=list" name="wholesale_search">
      <tr>
        <td align="right">
        <?php echo $this->_var['lang']['wholesale_search']; ?>
        <select name="search_category" id="search_category">
        <option value="0"><?php echo $this->_var['lang']['all_category']; ?></option>
        <?php echo $this->_var['category_list']; ?>
        </select>
        <input name="search_keywords" type="text" id="search_keywords" value="<?php echo htmlspecialchars($this->_var['search_keywords']); ?>" style="width:110px;"/>
        <input name="search" type="submit" value="<?php echo $this->_var['lang']['search']; ?>" class="go" />
        <input type="hidden" name="search_display" value="<?php echo $this->_var['pager']['display']; ?>" id="search_display" />
        </td>
      </tr>
    </form>
  </table>

  <form name="wholesale_goods" action="wholesale.php?act=add_to_cart" method="post">
          <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <th width="200" align="center" bgcolor="#ffffff"><?php echo $this->_var['lang']['goods_name']; ?></th>
              <th width="200" align="center" bgcolor="#ffffff"><?php echo $this->_var['lang']['goods_attr']; ?></th>
              <th width="250" align="center" bgcolor="#ffffff"><?php echo $this->_var['lang']['goods_price_ladder']; ?></th>
              <th width="80" align="center" bgcolor="#ffffff"><?php echo $this->_var['lang']['number']; ?></th>
              <th width="130" align="center" bgcolor="#ffffff">&nbsp;</th>
            </tr>

            <?php $_from = $this->_var['wholesale_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'wholesale');if (count($_from)):
    foreach ($_from AS $this->_var['wholesale']):
?>
            <tr>
              <td bgcolor="#ffffff"><?php if ($this->_var['pager']['display'] == 'list'): ?><a href="<?php echo $this->_var['wholesale']['goods_url']; ?>" target="_blank"><img src="<?php echo $this->_var['wholesale']['goods_thumb']; ?>" alt="<?php echo $this->_var['wholesale']['goods_name']; ?>" /></a><?php endif; ?><a href="<?php echo $this->_var['wholesale']['goods_url']; ?>" target="_blank" class="f6"><?php echo $this->_var['wholesale']['goods_name']; ?></a></td>
              <td bgcolor="#ffffff">

                <table width="100%" border="0" align="center">
                  <?php $_from = $this->_var['wholesale']['goods_attr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?>
                  <?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');if (count($_from)):
    foreach ($_from AS $this->_var['property']):
?>
                  <tr>
                    <td nowrap="true" style="border-bottom:2px solid #ccc;"><?php echo htmlspecialchars($this->_var['property']['name']); ?></td>
                    <td style="border-bottom:1px solid #ccc;"><?php echo htmlspecialchars($this->_var['property']['value']); ?></td>
                  </tr>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </table>
              </td>

              <td bgcolor="#ffffff">
                <?php $_from = $this->_var['wholesale']['price_ladder']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'attr_price');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['attr_price']):
?>
                <table width="100%" border="0" align="center" cellspacing="1" bgcolor="#547289">
                  <?php if ($this->_var['attr_price']['attr'] != ''): ?>
                   <tr>
                    <td align="left" nowrap="true" bgcolor="#ffffff" style="padding:5px;" colspan="2">
                      <?php $_from = $this->_var['attr_price']['attr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('attr_key', 'attr_value');if (count($_from)):
    foreach ($_from AS $this->_var['attr_key'] => $this->_var['attr_value']):
?>                <?php echo $this->_var['attr_value']['attr_name']; ?>:<?php echo $this->_var['attr_value']['attr_val']; ?>&nbsp;<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </td>
                  </tr>
                  <?php endif; ?>

                  <tr>
                    <td align="left" nowrap="true" bgcolor="#ffffff" style="padding:5px;"><?php echo $this->_var['lang']['number']; ?></td>
                    <td bgcolor="#ffffff" style="padding:5px;"><?php echo $this->_var['lang']['ladder_price']; ?></td>
                  </tr>

                  <?php $_from = $this->_var['attr_price']['qp_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('qp_list_key', 'qp_list_value');if (count($_from)):
    foreach ($_from AS $this->_var['qp_list_key'] => $this->_var['qp_list_value']):
?>
                  <tr>
                    <td align="left" nowrap="true" bgcolor="#ffffff" style="padding:5px;"><?php echo $this->_var['qp_list_key']; ?></td>
                    <td bgcolor="#ffffff" style="padding:5px;"><?php echo $this->_var['qp_list_value']; ?></td>
                  </tr>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </table>
                <br />
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </td>
              <td align="center" bgcolor="#ffffff" style="padding:5px;">
                <?php $_from = $this->_var['wholesale']['price_ladder']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key1', 'attr_price1');if (count($_from)):
    foreach ($_from AS $this->_var['key1'] => $this->_var['attr_price1']):
?>
                <table width="100%" border="0" align="center" cellspacing="0" bgcolor="#547289">
                  <?php if ($this->_var['attr_price1']['attr'] != ''): ?>
                  <tr>
                    <td align="left" nowrap="true" bgcolor="#ffffff" style="padding:5px;" colspan="2">
                      <input name="goods_number[<?php echo $this->_var['wholesale']['act_id']; ?>][<?php echo $this->_var['key1']; ?>]" type="text" class="inputBg" value="" size="10" />
                      <?php $_from = $this->_var['attr_price1']['attr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('attr_key1', 'attr_value1');if (count($_from)):
    foreach ($_from AS $this->_var['attr_key1'] => $this->_var['attr_value1']):
?>
                      <input name="attr_id[<?php echo $this->_var['wholesale']['act_id']; ?>][<?php echo $this->_var['key1']; ?>][<?php echo $this->_var['attr_key1']; ?>][attr_id]" type="hidden" value="<?php echo $this->_var['attr_value1']['attr_id']; ?>"/>
                      <input name="attr_id[<?php echo $this->_var['wholesale']['act_id']; ?>][<?php echo $this->_var['key1']; ?>][<?php echo $this->_var['attr_key1']; ?>][attr_val_id]" type="hidden" value="<?php echo $this->_var['attr_value1']['attr_val_id']; ?>"/>
                      <input name="attr_id[<?php echo $this->_var['wholesale']['act_id']; ?>][<?php echo $this->_var['key1']; ?>][<?php echo $this->_var['attr_key1']; ?>][attr_name]" type="hidden" value="<?php echo $this->_var['attr_value1']['attr_name']; ?>"/>
                      <input name="attr_id[<?php echo $this->_var['wholesale']['act_id']; ?>][<?php echo $this->_var['key1']; ?>][<?php echo $this->_var['attr_key1']; ?>][attr_val]" type="hidden" value="<?php echo $this->_var['attr_value1']['attr_val']; ?>"/>
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" nowrap="true" bgcolor="#ffffff" style="padding:5px;" colspan="2">&nbsp;</td>
                  </tr>
                  <?php else: ?>
                  <tr>
                    <td align="left" nowrap="true" bgcolor="#ffffff" style="padding:5px;" colspan="2">
                    <input name="goods_number[<?php echo $this->_var['wholesale']['act_id']; ?>]" type="text" class="inputBg" value="" size="10" />
                    </td>
                  </tr>
                  <?php endif; ?>

                  <?php $_from = $this->_var['attr_price']['qp_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('qp_list_key', 'qp_list_value');if (count($_from)):
    foreach ($_from AS $this->_var['qp_list_key'] => $this->_var['qp_list_value']):
?>
                  <tr>
                    <td align="left" nowrap="true" bgcolor="#ffffff" style="padding:5px;" colspan="2">&nbsp;</td>
                  </tr>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  </table>
                <br />
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

              </td>
              <td bgcolor="#ffffff" align="center">
              <input name="image" type="image" onClick="this.form.elements['act_id'].value = <?php echo $this->_var['wholesale']['act_id']; ?>" src="themes/default/images/bnt_buy_1.gif" style="margin:8px auto;" />
              </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          </table>
          <input type="hidden" name="act_id" value="" />
          <input type="hidden" name="display" value="<?php echo $this->_var['pager']['display']; ?>" id="display" />
        </form>
  <div class="blank5"></div>
     <?php echo $this->fetch('library/pages.lbi'); ?>
  </div>
  <?php else: ?>
  <div style="margin:2px 10px; font-size:14px; text-align:center; line-height:36px;"><B><?php echo $this->_var['lang']['no_wholesale']; ?></B></div>
  <?php endif; ?>
<div class="blank5"></div>

<div class="block">
  <div class="box">
   <div class="helpTitBg clearfix">
    <?php echo $this->fetch('library/help.lbi'); ?>
   </div>
  </div>
</div>
<div class="blank"></div>


<?php if ($this->_var['img_links'] || $this->_var['txt_links']): ?>
<div id="bottomNav" class="box">
 <div class="box_1">
  <div class="links clearfix">
    <?php $_from = $this->_var['img_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
    <a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><img src="<?php echo $this->_var['link']['logo']; ?>" alt="<?php echo $this->_var['link']['name']; ?>" border="0" /></a>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <?php if ($this->_var['txt_links']): ?>
    <?php $_from = $this->_var['txt_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
    [<a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><?php echo $this->_var['link']['name']; ?></a>]
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <?php endif; ?>
  </div>
 </div>
</div>
<?php endif; ?>

<div class="blank"></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>
<?php if ($this->_var['search_category'] > 0): ?>
<script language="javascript">
document.getElementById('search_category').value = '<?php echo $this->_var['search_category']; ?>';
</script>
<?php endif; ?>