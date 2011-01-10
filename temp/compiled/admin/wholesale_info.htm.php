<!-- $Id: wholesale_info.htm 16644 2009-09-09 02:12:26Z wangleisvn $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'validator.js,../js/transport.js')); ?>
<div class="main-div">
<form method="post" action="wholesale.php" name="theForm" enctype="multipart/form-data" onSubmit="return validate()">
<table width="100%">
  <!-- <?php if ($this->_var['form_action'] == "insert"): ?> 编辑时不能改商品名称 -->
  <tr>
    <td align="right"><?php echo $this->_var['lang']['pls_search_goods']; ?></td>
    <td><!-- 分类 -->
      <select name="cat_id"><option value="0"><?php echo $this->_var['lang']['custom_goods_cat']; ?></option><?php echo $this->_var['cat_list']; ?></select>
      <!-- 品牌 -->
      <select name="brand_id"><option value="0"><?php echo $this->_var['lang']['custom_goods_brand']; ?></option><?php echo $this->html_options(array('options'=>$this->_var['brand_list'])); ?></select>
      <!-- 关键字 -->
      <?php echo $this->_var['lang']['label_search_goods']; ?><input name="keyword" type="text" id="keyword" size="10">
      <!-- 搜索 -->
      <input name="search" type="button" id="search" value="<?php echo $this->_var['lang']['button_search']; ?>" class="button" onclick="searchGoods()" /></td>
  </tr>
  <!-- <?php endif; ?> -->
  <tr>
    <td class="label"><?php echo $this->_var['lang']['label_goods_name']; ?></td>
    <td><select name="goods_id" id="goods_id" onchange="document.getElementById('price-div').innerHTML = ''; getGoodsInfo(this.value);">
      <option value="<?php echo $this->_var['wholesale']['goods_id']; ?>" selected="selected"><?php echo $this->_var['wholesale']['goods_name']; ?></option>
    </select>
      <input name="goods_name" type="hidden" id="goods_name" value="<?php echo $this->_var['wholesale']['goods_name']; ?>" /></td>
  </tr>
  <tr>
    <td class="label"><?php echo $this->_var['lang']['label_rank_name']; ?></td>
    <td><?php $_from = $this->_var['user_rank_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rank');if (count($_from)):
    foreach ($_from AS $this->_var['rank']):
?> 
      <input name="rank_id[]" type="checkbox" id="rank_id[]" value="<?php echo $this->_var['rank']['rank_id']; ?>" <?php if ($this->_var['rank']['checked']): ?>checked="checked"<?php endif; ?> />
      <?php echo $this->_var['rank']['rank_name']; ?> <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></td>
  </tr>
  <tr>
    <td class="label"><?php echo $this->_var['lang']['label_enabled']; ?></td>
    <td><label>
        <input type="radio" name="enabled" value="1" <?php if ($this->_var['wholesale']['enabled']): ?>checked="checked"<?php endif; ?> />
        <?php echo $this->_var['lang']['yes']; ?></label>
      <label>
        <input type="radio" name="enabled" value="0" <?php if (! $this->_var['wholesale']['enabled']): ?>checked="checked"<?php endif; ?> />
        <?php echo $this->_var['lang']['no']; ?></label>    </td>
  </tr>
</table>

<hr />

<div id="price-div">
<?php $_from = $this->_var['wholesale']['price_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'attr_price');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['attr_price']):
?>
<table width="100%">
  <!-- <?php if ($this->_var['attr_list']): ?> 该商品的属性 -->
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">
	  <?php $_from = $this->_var['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');if (count($_from)):
    foreach ($_from AS $this->_var['attr']):
?>
	  <?php echo $this->_var['attr']['attr_name']; ?> <select name="attr_<?php echo $this->_var['attr']['attr_id']; ?>[<?php echo $this->_var['key']; ?>]"> <?php echo $this->html_options(array('options'=>$this->_var['attr']['goods_attr_list'],'selected'=>$this->_var['attr_price']['attr'][$this->_var['attr']['attr_id']])); ?> </select>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </td>
    <td><?php if ($this->_var['key'] == 0): ?> <input type="button" class="button" value=" + " onclick="addAttr(this)" /> <?php else: ?> <input type="button" class="button" value=" - " onclick="dropAttr(this)" /> <?php endif; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr><td></td><td colspan="3" style="border-bottom:1px #000 dashed;"></td><td></td></tr>
  <!-- <?php endif; ?> -->

  <?php $_from = $this->_var['attr_price']['qp_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('index', 'qp');if (count($_from)):
    foreach ($_from AS $this->_var['index'] => $this->_var['qp']):
?>
  <tr>
    <td width="10%">&nbsp;</td>
    <td> <?php echo $this->_var['lang']['quantity']; ?> <input name="quantity[<?php echo $this->_var['key']; ?>][]" type="text" value="<?php echo $this->_var['qp']['quantity']; ?>" /> </td>
    <td> <?php echo $this->_var['lang']['price']; ?> <input name="price[<?php echo $this->_var['key']; ?>][]" type="text" value="<?php echo $this->_var['qp']['price']; ?>" /> </td>
    <td> <?php if ($this->_var['index'] == 0): ?> <input type="button" class="button" value=" + " onclick="addQuantityPrice(this, '<?php echo $this->_var['key']; ?>')" /> <?php else: ?> <input type="button" class="button" value=" - " onclick="dropQuantityPrice(this)" /> <?php endif; ?> </td>
    <td width="10%">&nbsp;</td>
  </tr>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</table>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>

<table width="100%">
  <tr>
    <td colspan="2" align="center">
      <input type="submit" class="button" value="<?php echo $this->_var['lang']['button_submit']; ?>" />
      <input type="reset" class="button" value="<?php echo $this->_var['lang']['button_reset']; ?>" />
      <input type="hidden" name="act" value="<?php echo $this->_var['form_action']; ?>" />
      <input type="hidden" name="id" value="<?php echo $this->_var['wholesale']['act_id']; ?>" />
	  <input type="hidden" name="seed" id="seed" value="<?php echo $this->_var['key']; ?>" />
    </td>
  </tr>
</table>
</form>
</div>


<script language="JavaScript">
<!--
onload = function()
{
  // 开始检查订单
  startCheckOrder();
}
/**
 * 检查表单输入的数据
 */
function validate()
{
  if (parseInt(document.forms['theForm'].elements['goods_id'].value) <= 0)
  {
    alert(pls_search_goods);
	return false;
  }
  return true;
}

function searchGoods()
{
  var filter = new Object;
  filter.keyword  = document.forms['theForm'].elements['keyword'].value;
	filter.cat_id  = document.forms['theForm'].elements['cat_id'].value;
	filter.brand_id  = document.forms['theForm'].elements['brand_id'].value;

  Ajax.call('wholesale.php?is_ajax=1&act=search_goods', filter, searchGoodsResponse, 'GET', 'JSON');
}

function searchGoodsResponse(result)
{
  if (result.error == '1' && result.message != '')
  {
    alert(result.message);
		return;
  }

  var sel = document.forms['theForm'].elements['goods_id'];

  sel.length = 0;

  /* 创建 options */
  var goods = result.content;
  if (goods)
  {
    for (i = 0; i < goods.length; i++)
    {
      var opt = document.createElement("OPTION");
      opt.value = goods[i].goods_id;
      opt.text  = goods[i].goods_name;
      sel.options.add(opt);
    }
	document.getElementById('price-div').innerHTML = '';
	getGoodsInfo(goods[0].goods_id);
  }
  else
  {
    getGoodsInfo(0);
  }

  return;
}

/**
 * 取得某商品信息
 * @param int goodsId 商品id
 */
function getGoodsInfo(goodsId)
{
  if (goodsId > 0)
  {
    Ajax.call('wholesale.php?act=get_goods_info', 'goods_id=' + goodsId, getGoodsInfoResponse, 'get', 'json');
  }
  else
  {
    var divObj = document.getElementById('price-div');
    divObj.innerHTML = '';
  }
}
function getGoodsInfoResponse(result)
{
  var divObj = document.getElementById('price-div');
  var tableObj = divObj.appendChild(document.createElement('TABLE'));
  tableObj.width = '100%';

  var key = getKey();

  if (result.length > 0)
  {
    var row1 = tableObj.insertRow(-1);
    var cell1 = row1.insertCell(-1);
    var cell2 = row1.insertCell(-1);
    cell2.colSpan = 2;
	var html = '';
	for (var i = 0; i < result.length; i++)
	{
      var attr = result[i];
			var re;
      html += attr.attr_name + ' <select name="attr_' + attr.attr_id + '[' + key + ']">';
      for (var goodsAttrId in attr.goods_attr_list)
      {
        if (goodsAttrId != 'toJSONString')
        {
					// 去掉 goodsAttrId 中的字符 c
					re = /c/g;
					_goodsAttrId = goodsAttrId.replace(re, "");

          html += ' <option value="' + _goodsAttrId + '"> ' + attr.goods_attr_list[goodsAttrId] + '  </option> ';
        }
      }
      html += ' </select> ';
	}
    cell2.innerHTML = html;
    var cell4 = row1.insertCell(-1);
	if (divObj.childNodes.length == 1)
	{
      cell4.innerHTML = '<input type="button" class="button" value=" + " onclick="addAttr(this)" />';
	}
	else
	{
	  cell4.innerHTML = '<input type="button" class="button" value=" - " onclick="dropAttr(this)" />';
	}
    var cell5 = row1.insertCell(-1);
  
    var row2 = tableObj.insertRow(-1);
    var cell1 = row2.insertCell(-1);
    var cell2 = row2.insertCell(-1);
    cell2.style.borderBottom = '1px #000 dashed';
    cell2.colSpan = 3;
    var cell5 = row2.insertCell(-1);
  }

  var row3 = tableObj.insertRow(-1);
  var cell1 = row3.insertCell(-1);
  cell1.width = '10%';
  var cell2 = row3.insertCell(-1);
  cell2.innerHTML = getQuantityHtml(key);
  var cell3 = row3.insertCell(-1);
  cell3.innerHTML = getPriceHtml(key);
  var cell4 = row3.insertCell(-1);
  cell4.innerHTML = getButtonHtml(key);
  var cell5 = row3.insertCell(-1);
  cell5.width = '10%';
}

/**
 * @param object buttonObj
 * @param int    tableIndex
 */
function addQuantityPrice(buttonObj, tableIndex)
{
  var tableObj = buttonObj.parentNode.parentNode.parentNode.parentNode;
  var newRow = tableObj.insertRow(-1);
  var cell1 = newRow.insertCell(-1);
  var cell2 = newRow.insertCell(-1);
  var cell3 = newRow.insertCell(-1);
  var cell4 = newRow.insertCell(-1);
  var cell5 = newRow.insertCell(-1);
  
  cell1.innerHTML = '&nbsp;';
  cell2.innerHTML = ' <?php echo $this->_var['lang']['quantity']; ?> <input name="quantity[' + tableIndex + '][]" type="text" value="" /> ';
  cell3.innerHTML = ' <?php echo $this->_var['lang']['price']; ?> <input name="price[' + tableIndex + '][]" type="text" value="" /> ';
  cell4.innerHTML = ' <input type="button" class="button" value=" - " onclick="dropQuantityPrice(this)" />';
  cell5.innerHTML = '&nbsp;';
  
}

/**
 * @param object buttonObj
 */
function dropQuantityPrice(buttonObj)
{
  var trObj = buttonObj.parentNode.parentNode;
  var tableObj = trObj.parentNode.parentNode;
  tableObj.deleteRow(trObj.rowIndex);
}

/**
 * @param object buttonObj
 */
function addAttr(buttonObj)
{
  getGoodsInfo(document.getElementById('goods_id').value);
}

/**
 * @param object buttonObj
 */
function dropAttr(buttonObj)
{
  var divObj = document.getElementById('price-div');
  var tableObj = buttonObj.parentNode.parentNode.parentNode.parentNode;
  divObj.removeChild(tableObj);
}

function getKey()
{
  var seedObj = document.getElementById('seed');
  seedObj.value = parseInt(seedObj.value) + 1;
  return seedObj.value;
}

function getQuantityHtml(key)
{
  
  var html = '<?php echo $this->_var['lang']['quantity']; ?> <input name="quantity[#][]" type="text" value="" />';
  

  return html.replace('[#]', '[' + key + ']');
}

function getPriceHtml(key)
{
  
  var html = '<?php echo $this->_var['lang']['price']; ?> <input name="price[#][]" type="text" value="" />';
  

  return html.replace('[#]', '[' + key + ']');
}

function getButtonHtml(key)
{
  
  var html = '<input type="button" class="button" value=" + " onclick="addQuantityPrice(this, [#])" />';
  

  return html.replace('[#]', key);
}

//-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>