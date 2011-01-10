<?php if ($this->_var['type'] == 1): ?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%">
      <tr>
        <td align="center"><a href="<?php echo $this->_var['goods_url']; ?><?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" border="0"></a></td>
      </tr>
      <tr>
        <td align="center"><a href="<?php echo $this->_var['goods_url']; ?><?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><big><?php echo $this->_var['goods']['goods_name']; ?></big></a><br /><font color="#FF0000"><?php echo $this->_var['goods']['shop_price']; ?></font></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php elseif ($this->_var['type'] == 2): ?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%">
      <tr>
        <td align="center"><a href="<?php echo $this->_var['goods_url']; ?><?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" border="0"></a></td>
      </tr>
      <tr>
        <td align="center"><a href="<?php echo $this->_var['goods_url']; ?><?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><big><?php echo $this->_var['goods']['goods_name']; ?></big></a><br /><s><?php echo $this->_var['goods']['market_price']; ?></s> <font color = "#FF0000"><?php echo $this->_var['goods']['shop_price']; ?></font></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php elseif ($this->_var['type'] == 3): ?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%">
      <tr>
        <td align="center"><a href="<?php echo $this->_var['goods_url']; ?><?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" border="0"></a></td>
      </tr>
      <tr>
        <td align="center"><a href="<?php echo $this->_var['goods_url']; ?><?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><big><?php echo $this->_var['goods']['goods_name']; ?></big></a><br /><font color = "#FF0000"><?php echo $this->_var['goods']['shop_price']; ?></font></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php elseif ($this->_var['type'] == 4): ?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%">
      <tr>
        <td align="center"><a href="<?php echo $this->_var['goods_url']; ?><?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" border="0"></a></td>
      </tr>
      <tr>
        <td align="center"><a href="<?php echo $this->_var['goods_url']; ?><?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><big><?php echo $this->_var['goods']['goods_name']; ?></big></a><br /><s><?php echo $this->_var['goods']['market_price']; ?></s> <font color = "#FF0000"><?php echo $this->_var['goods']['shop_price']; ?></font></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php elseif ($this->_var['type'] == 5): ?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><a href="<?php echo $this->_var['goods_url']; ?><?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><big><?php echo $this->_var['goods']['goods_name']; ?></big></a><br /><s><?php echo $this->_var['goods']['market_price']; ?></s> <font color = "#FF0000"><?php echo $this->_var['goods']['shop_price']; ?></font></td>
  </tr>
</table>
<?php elseif ($this->_var['type'] == 6): ?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center"><a href="<?php echo $this->_var['goods_url']; ?><?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" border="0"></a></td>
      </tr>
</table>
<?php endif; ?>