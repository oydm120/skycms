<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:65:"F:\www\thinkphp\public/../application/admin\view\category\add.php";i:1501731716;s:64:"F:\www\thinkphp\public/../application/admin\view\Common\Head.php";i:1484295982;s:65:"F:\www\thinkphp\public/../application/admin\view\Common\Cssjs.php";i:1488264017;s:63:"F:\www\thinkphp\public/../application/admin\view\Common\Nav.php";i:1500620345;s:62:"F:\www\thinkphp\public/../application/admin\view\Common\Js.php";i:1501140469;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>系统管理后台</title>
<link href="/static/admin/css/admin_style.css" rel="stylesheet" />
<link href="/static/admin/js/layui/css/layui.css" rel="stylesheet" />
</head>
<style>
.pop_nav{
	padding: 0px;
}
.pop_nav ul{
	border-bottom:1px solid #266AAE;
	padding:0 5px;
	height:25px;
	clear:both;
}
.pop_nav ul li.current a{
	border:1px solid #266AAE;
	border-bottom:0 none;
	color:#333;
	font-weight:700;
	background:#F3F3F3;
	position:relative;
	border-radius:2px;
	margin-bottom:-1px;
}

</style>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
<?php 
$Menu = \app\admin\controller\Common::getMenu(); 
$getMenu=$Menu['getMenu'];
$cur_action=$Menu['action'];
$menuReturn=$Menu['menuReturn'];
if($getMenu) {
 ?>
<div class="nav">
<?php
  if(!empty($menuReturn)){
	  echo '<div class="return"><a href="'.$menuReturn['url'].'">'.$menuReturn['name'].'</a></div>';
  }
  ?>
  <ul class="cc">
    <?php
	foreach($getMenu as $r){
		$name = $r['name'];
		$app=explode("/",$r['name']);
        $action=$app[2];
	?>
    <li <?php echo $action==$cur_action?'class="current"':""; ?>><a href="<?php echo Url("".$name."");?>"><?php echo $r['title'];?></a></li>
    <?php
	}
	?>
  </ul>
</div>
<?php } ?>
<form name="myform" id="myform" action="<?php echo Url('Admin/Category/add'); ?>" class="J_ajaxForm" method="post" >
  <div class="pop_nav">
    <ul class="J_tabs_nav">
      <li class="current"><a href="javascript:;;">基本属性</a></li>
      <li class=""><a href="javascript:;;">选项设置</a></li>
    </ul>
  </div>
    <div class="tabs_content J_tabs_contents">
      <div class="J_tabs_div">
        <div class="h_a">基本属性</div>
        <div class="table_full">
          <table width="100%" class="table_form ">
            <tr>
              <th width="200">请选择模型：</th>
              <td><select name="modelid" id="modelid">
                  <option value="" <?php if(empty($parentid_modelid)): ?> selected<?php endif; ?>>请选择模型</option>
                  <option value="2" <?php if($parentid_modelid == 2): ?> selected<?php endif; ?>>列表模块</option>
                  <option value="1" <?php if($parentid_modelid == 1): ?> selected<?php endif; ?>>单页模块</option>
                </select></td>
            </tr>
            <tr>
              <th width="200">上级栏目：</th>
              <td><select name="parentid" id="parentid">
                  <option value='0'>≡ 作为一级栏目 ≡</option>
                  <?php echo $category; ?>
                </select></td>
            </tr>
            <tr id="normal_add">
              <th>栏目名称：</th>
              <td><input type="text" name="catname" id="catname" class="input" value=""></td>
            </tr>
            <tr id="catdir_tr">
              <th>英文名称：</th>
              <td><input type="text" name="encatname" id="encatname" class="input" value=""></td>
            </tr>
            <tr>
              <th>栏目缩略图：</th>
              <td><input type="text" name="image" id="image" class="input length_5" value=""  runat="server" style="float: left"   ondblclick='image_priview(this.value);'> &nbsp;
                  <input type="button" class="" value="选择上传" id="uploadify" >
               <span class="gray"> 双击文本框查看图片</span>
              </td>
            </tr>
            <tr>
              <th>是否终级栏目：</th>
              <td><input name="child" type="checkbox" id="child"  value="1">
                终极栏目 (<font color="#FF0000">终极栏目才可以添加信息</font>)</td>
            </tr>
            <tr>
              <th>栏目简介：</th>
              <td><textarea name="description" maxlength="255" style="width:300px;height:60px;"></textarea></td>
            </tr>
              <tr>
              <th >是否显示：</th>
              <td><ul class="switch_list cc ">
                  <li>
                    <label>
                      <input type='radio' name='ismenu' value='1' checked>
                      <span>显示</span></label>
                  </li>
                  <li>
                    <label>
                      <input type='radio' name='ismenu' value='0'  >
                      <span>不显示</span></label>
                  </li>
                </ul></td>
            </tr>
            <tr>
              <th>显示排序：</th>
              <td><input type="text" name="listorder" id="listorder" class="input" value="0"></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="J_tabs_div">
        <div class="h_a">选项设置</div>
        <div class="table_full">
          <table width="100%" class="table_form ">
          <tr >
              <th  width="200"><strong>META Title（栏目标题）</strong><br/>
                针对搜索引擎设置的标题</th>
              <td><input name='meta_title' type='text' id='meta_title' class="input" value='' size='60' maxlength='60'></td>
            </tr>
            <tr>
              <th ><strong>META Keywords（栏目关键词）</strong><br/>
                关键字中间用半角逗号隔开</th>
              <td><textarea name='meta_keywords' id='meta_keywords' style="width:90%;height:40px"></textarea></td>
            </tr>
            <tr>
              <th ><strong>META Description（栏目描述）</strong><br/>
                针对搜索引擎设置的网页描述</th>
              <td><textarea name='meta_description' id='meta_description' style="width:90%;height:50px"></textarea></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="btn_wrap">
      <div class="btn_wrap_pd">
          <input type="hidden" name="type" value="1">
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
      </div>
    </div>
  </form>
</div>
<script src="/static/admin/js/jquery.js"></script>
<script src="/static/admin/js/layui/layui.js"></script>
<script src="/static/admin/js/laydate/laydate.js"></script>
<script src="/static/admin/js/tabs.js"></script>
<script src="/static/admin/js/ajaxForm.js"></script>
<script src="/static/admin/js/common.js"></script>
<script src="/static/admin/js/content.js"></script>
<link rel="stylesheet" href="/static/admin/js/editor/themes/default/default.css" />
<script charset="utf-8" src="/static/admin/js/editor/kindeditor.js"></script>
<script charset="utf-8" src="/static/admin/js/editor/lang/zh-CN.js"></script>
<script>
    KindEditor.ready(function(K) {
        var uploadbutton = K.uploadbutton({
            button : K('#uploadify')[0],
            fieldName : 'imgFile',
            url : '/Admin/Upload/imgfile.html',
            afterUpload : function(data) {
                if (data.state === 1) {
                    var url = K.formatUrl(data.info, 'absolute');
                    K('#image').val(url);
                } else {
                    layui.use('layer', function(){
                        var layer = layui.layer;
                        layer.msg(data.info, {time: 2000,icon: 2});
                    });
                }
            },
            afterError : function(str) {
                layui.use('layer', function(){
                    var layer = layui.layer;
                    layer.msg(str, {time: 2000,icon: 2});
                });
            }
        });
        uploadbutton.fileBox.change(function(e) {
            uploadbutton.submit();
        });
    });
</script>
</body>
</html>