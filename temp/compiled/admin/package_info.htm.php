<!-- $Id $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js,validator.js,selectzone.js')); ?>
<script type="text/javascript" src="../js/calendar.php?lang=<?php echo $this->_var['cfg_lang']; ?>"></script>
<link href="../js/calendar/calendar.css" rel="stylesheet" type="text/css" />
<div class="main-div">
<form method="post" action="package.php" name="theForm" onsubmit="return validate()">
<table cellspacing="1" cellpadding="3" width="100%">
  <tr>
    <td class="label"><?php echo $this->_var['lang']['package_name']; ?></td>
    <td><input type="text" name="package_name" maxlength="60" size="40" value="<?php echo $this->_var['package']['package_name']; ?>" /><?php echo $this->_var['lang']['require_field']; ?></td>
  </tr>
  <tr>
    <td class="label"><?php echo $this->_var['lang']['start_time']; ?></td>
    <td>
      <input type="text" name="start_time" maxlength="60" size="40" value="<?php echo $this->_var['package']['start_time']; ?>" readonly="readonly" id="start_time_id" />
      <input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('start_time_id', '%Y-%m-%d %H:%M', '24', false, 'selbtn1');" value="<?php echo $this->_var['lang']['btn_select']; ?>" class="button"/>
      <?php echo $this->_var['lang']['require_field']; ?>
    </td>
  </tr>
  <tr>
    <td class="label"><?php echo $this->_var['lang']['end_time']; ?></td>
    <td>
      <input type="text" name="end_time" maxlength="60" size="40" value="<?php echo $this->_var['package']['end_time']; ?>"  readonly="readonly" id ="end_time_id" />
      <input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('end_time_id', '%Y-%m-%d %H:%M', '24', false, 'selbtn1');" value="<?php echo $this->_var['lang']['btn_select']; ?>" class="button"/>
      <?php echo $this->_var['lang']['require_field']; ?></td>
  </tr>
  <tr>
    <td class="label"><a href="javascript:showNotice('noticepackagePrice');" title="<?php echo $this->_var['lang']['form_notice']; ?>"><img src="images/notice.gif" width="16" height="16" border="0" alt="<?php echo $this->_var['lang']['form_notice']; ?>"></a><?php echo $this->_var['lang']['package_price']; ?></td>
    <td><input type="text" name="package_price" maxlength="60" size="20" value="<?php echo $this->_var['package']['package_price']; ?>" /><?php echo $this->_var['lang']['require_field']; ?><br /><span class="notice-span" <?php if ($this->_var['help_open']): ?>style="display:block" <?php else: ?> style="display:none" <?php endif; ?> id="noticepackagePrice"><?php echo $this->_var['lang']['notice_package_price']; ?></span></td>
  </tr>
  <tr>
    <td class="label"><?php echo $this->_var['lang']['desc']; ?></td>
    <td><textarea  name="desc" cols="60" rows="4"><?php echo $this->_var['package']['act_desc']; ?></textarea></td>
  </tr>
  <!-- 商品搜索 -->
  <tr>
    <td class="label">
      <?php echo $this->_var['lang']['search_goods']; ?>
    </td>
    <td>
      <select name="cat_id"><option value="0"><?php echo $this->_var['lang']['all_category']; ?></caption><?php echo $this->_var['cat_list']; ?></select>
      <select name="brand_id"><option value="0"><?php echo $this->_var['lang']['all_brand']; ?></caption><?php echo $this->html_options(array('options'=>$this->_var['brand_list'])); ?></select>
      <input type="text" name="keyword" />
      <input type="button" value="<?php echo $this->_var['lang']['button_search']; ?>" onclick="javascript:searchGoods();" class="button" />
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <table id="groupgoods-table" align="center" style="width:70%;">
        <!-- 商品列表 -->
        <tr>
          <th><?php echo $this->_var['lang']['all_goods']; ?></th>
          <th><?php echo $this->_var['lang']['handler']; ?></th>
          <th><?php echo $this->_var['lang']['package_goods']; ?></th>
        </tr>
        <tr>
          <td width="42%">
            <select name="source_select" size="15" style="width:100%" onchange="this.form.elements['number'].value = 1" ondblclick="sz.addItem(false, 'add_package_goods', this.form.elements['id'].value, this.form.elements['number'].value)">
            </select>
          </td>
          <td align="center">
            <p><?php echo $this->_var['lang']['goods_number']; ?><br /><input name="number" type="text" size="6" value="1" /></p>
            <p><input type="button" value=">>" onclick="sz.addItem(true, 'add_package_goods', this.form.elements['id'].value, this.form.elements['number'].value)" class="button" /></p>
            <p><input type="button" value=">" onclick="sz.addItem(false, 'add_package_goods', this.form.elements['id'].value, this.form.elements['number'].value)" class="button" /></p>
            <p><input type="button" value="<" onclick="sz.dropItem(false, 'drop_package_goods', this.form.elements['id'].value)" class="button" /></p>
            <p><input type="button" value="<<" onclick="sz.dropItem(true, 'drop_package_goods', this.form.elements['id'].value)" class="button" /></p>
          </td>
          <td width="42%">
            <select name="target_select" size="15" style="width:100%" multiple ondblclick="sz.dropItem(false, 'drop_package_goods', this.form.elements['id'].value)">
              <?php $_from = $this->_var['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods']):
?>
              <option value="<?php echo $this->_var['package_goods']['g_p']; ?>"><?php echo $this->_var['package_goods']['goods_name']; ?></option>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
          </td>
        </tr>
      </table>
    </td>
  </tr>

  <tr>
    <td colspan="2" align="center">
      <input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button" />
      <input type="reset" value="<?php echo $this->_var['lang']['button_reset']; ?>" class="button" />
      <input type="hidden" name="act" value="<?php echo $this->_var['form_action']; ?>" />
      <input type="hidden" name="id" value="<?php echo $this->_var['package']['id']; ?>" />
    </td>
  </tr>
</table>
</form>
</div>
<script language="JavaScript">
<!--

document.forms['theForm'].elements['package_name'].focus();
var elements = document.forms['theForm'].elements;
var sz = new SelectZone(2, elements['source_select'], elements['target_select'], elements['number']);
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
    validator = new Validator("theForm");
    validator.required("package_name",  no_name);
    //validator.isNullOption("goods_id", no_goods_id);
    validator.isTime("start_time", invalid_starttime, true);
    validator.isTime("end_time", invalid_endtime, true);
    validator.gt("end_time", "start_time", invalid_gt);
    validator.isNumber("package_price", invalid_package_price, true);

    if (document.forms['theForm'].elements['act'] == "insert")
    {
        validator.required("password", no_password);
    }

    return validator.passed();
}

function searchGoods()
{
    var filter = new Object;
    filter.keyword    = document.forms['theForm'].elements['keyword'].value;
    filter.cat_id     = document.forms['theForm'].elements['cat_id'].value;
    filter.brand_id   = document.forms['theForm'].elements['brand_id'].value;

    Ajax.call('package.php?is_ajax=1&act=search_goods', filter, searchGoodsResponse, 'GET', 'JSON')
}

function searchGoodsResponse(result)
{
  var frm = document.forms['theForm'];
  var sel = frm.elements['source_select'];

  if (result.error == 0)
  {
    /* 清除 options */
    sel.length = 0;

    /* 创建 options */
    var goods = result.content;
    if (goods)
    {
        for (i = 0; i < goods.length; i++)
        {
            /* 货品 options */
            if (goods[i].products.length > 0)
            {
              for (var j = 0; goods[i].products[j]; j++)
              {
                var opt = document.createElement("OPTION");
                opt.value = goods[i].value + '_' + goods[i].products[j].product_id;
                opt.text  = goods[i].text + '[' + goods[i].products[j].goods_attr_str + ']';
                sel.options.add(opt);
              }
            }
            else
            {
              var opt = document.createElement("OPTION");
              opt.value = goods[i].value;
              opt.text  = goods[i].text;
              sel.options.add(opt);
            }
        }
    }
    else
    {
        var opt = document.createElement("OPTION");
        opt.value = 0;
        opt.text  = search_is_null;
        sel.options.add(opt);
    }
  }

  if (result.message.length > 0)
  {
    alert(result.message);
  }
}

/* 关联商品函数 */
//function searchGoods_list(szObject, catId, brandId, keyword)
//{
//  var filters = new Object;
//
//  filters.cat_id = elements[catId].value;
//  filters.brand_id = elements[brandId].value;
//  filters.keyword = Utils.trim(elements[keyword].value);
//
//  szObject.loadOptions('get_goods_list', filters);
//}
//-->

</script>
<?php echo $this->fetch('pagefooter.htm'); ?>