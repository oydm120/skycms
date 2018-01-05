<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title>{$Title} - {$Powered}</title>
<link rel="stylesheet" href="/static/install/css/install.css?v=9.0" />
</head>
<body>
<div class="wrap">
  {include file="header" /}
  <section class="section">
    <div class="step">
      <ul>
        <li class="on"><em>1</em>检测环境</li>
        <li class="current"><em>2</em>创建数据</li>
        <li><em>3</em>完成安装</li>
      </ul>
    </div>
    <form id="js-install-form" action="{:url('step4')}" method="post">
      <input type="hidden" name="force" value="0" />
				<div class="server">
					<table width="100%">
						<tr>
							<td class="td1" width="100">数据库信息</td>
							<td class="td1" width="200">&nbsp;</td>
							<td class="td1">&nbsp;</td>
						</tr>
						<tr>
							<td class="text-left">数据库服务器：</td>
							<td><input type="text" name="dbhost" id="dbhost" value="127.0.0.1" class="input"></td>
							<td>
								<div id="js-install-tip-dbhost">
									<span class="gray">数据库服务器地址，一般为127.0.0.1或localhost</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-left">数据库端口：</td>
							<td><input type="text" name="dbport" id="dbport" value="3306" class="input"></td>
							<td>
								<div id="js-install-tip-dbport">
									<span class="gray">数据库服务器端口，一般为3306</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-left">数据库用户名：</td>
							<td><input type="text" name="dbuser" id="dbuser" value="root" class="input"></td>
							<td><div id="js-install-tip-dbuser"></div></td>
						</tr>
						<tr>
							<td class="text-left">数据库密码：</td>
							<td><input type="password" name="dbpw" id="dbpw" value="" class="input" autoComplete="off" onblur="testdb()"></td>
							<td><div id="js-install-tip-dbpw"></div></td>
						</tr>
						<tr>
							<td class="text-left">数据库名：</td>
							<td><input type="text" name="dbname" id="dbname" value="skycms" class="input"></td>
							<td><div id="js-install-tip-dbname"></div></td>
						</tr>
						<tr>
							<td class="text-left">数据库表前缀：</td>
							<td><input type="text" name="dbprefix" id="dbprefix" value="sky_" class="input"></td>
							<td>
								<div id="js-install-tip-dbprefix">
									<span class="gray">建议使用默认，同一数据库安装多个SkyCMS时需修改</span>
								</div>
							</td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td class="td1" width="100">网站配置</td>
							<td class="td1" width="200">&nbsp;</td>
							<td class="td1">&nbsp;</td>
						</tr>
						<tr>
							<td class="text-left">网站名称：</td>
							<td><input type="text" name="sitename" value="SkyCMS管理框架" class="input"></td>
							<td><div id="js-install-tip-sitename"></div></td>
						</tr>
						<tr>
							<td class="text-left">网站域名：</td>
							<td><input type="text" name="siteurl" value="{:get_host()}/" class="input" autoComplete="off"></td>
							<td>
								<div id="js-install-tip-siteurl">
									<span class="gray">请以“/”结尾</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-left">关键词：</td>
							<td><input type="text" name="sitekeywords" value="SkyCMS管理框架" class="input" autoComplete="off"></td>
							<td><div id="js-install-tip-sitekeywords"></div></td>
						</tr>
						<tr>
							<td class="text-left">描述：</td>
							<td><input type="text" name="siteinfo" class="input" value="SkyCMS是Sky发布的一款用于快速开发的管理框架"></td>
							<td><div id="js-install-tip-siteinfo"></div></td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td class="td1" width="100">创始人信息</td>
							<td class="td1" width="200">&nbsp;</td>
							<td class="td1">&nbsp;</td>
						</tr>
						<tr>
							<td class="text-left">管理员帐号：</td>
							<td><input type="text" name="manager" value="admin" class="input"></td>
							<td><div id="js-install-tip-manager"></div></td>
						</tr>
						<tr>
							<td class="text-left">密码：</td>
							<td><input type="password" name="manager_pwd" id="js-manager-pwd" class="input" autoComplete="off"></td>
							<td><div id="js-install-tip-manager_pwd"></div></td>
						</tr>
						<tr>
							<td class="text-left">重复密码：</td>
							<td><input type="password" name="manager_ckpwd" class="input" autoComplete="off"></td>
							<td><div id="js-install-tip-manager_ckpwd"></div></td>
						</tr>
						<tr>
							<td class="text-left">Email：</td>
							<td><input type="text" name="manager_email" class="input" value=""></td>
							<td><div id="js-install-tip-manager_email"></div></td>
						</tr>
					</table>
					<div id="js-response-tips" style="display: none;"></div>
				</div>
				<div class="bottom tac"> 
					<a href="{:url('step2')}" class="btn btn-primary">上一步</a>
					<button type="submit" class="btn btn-primary">创建数据</button>
				</div>
    </form>
  </section>
  <script src="/static/install/js/jquery.js"></script>
  <script src="/static/install/js/validate.js"></script>
		<script src="/static/install/js/ajaxForm.js"></script>
		<script>
			function testdb() {
				var dbHost = $('#dbhost').val();
				var dbUser = $('#dbuser').val();
				var dbPwd = $('#dbpw').val();
				var dbName = $('#dbname').val();
				var dbPort = $('#dbport').val();
				data = {
					'hostname' : dbHost,
					'username' : dbUser,
					'password' : dbPwd,
					'hostport' : dbPort
				};
				var url = "{:url('testdb')}";
				$.ajax({
					type : "POST",
					url : url,
					data : data,
					beforeSend : function() {
					},
					success : function(msg) {
						if (msg) {
							$('#js-install-tip-dbpw').html('<i class="fa fa-check correct"></i>数据库配置正确');
						} else {
							$('#dbpw').val("");
							$('#js-install-tip-dbpw').html('<span for="dbname" generated="true" class="tips_error" style="">数据库链接配置失败</span>');
						}
					},
					complete : function() {
					},
					error : function() {
						$('#js-install-tip-dbpw').html('<span for="dbname" generated="true" class="tips_error" style="">数据库链接配置失败</span>');
						$('#dbpw').val("");
					}
				});
			}
			$(function() {
				//聚焦时默认提示
				var focus_tips = {
					dbhost : '数据库host，一般为127.0.0.1或localhost',
					dbport : '数据库port，一般为3306',
					dbuser : '',
					dbpw : '',
					dbname : '',
					dbprefix : '建议使用默认，同一数据库安装多个SkyCMS时需修改',
					manager : '创始人帐号，拥有站点后台所有管理权限',
					manager_pwd : '',
					manager_ckpwd : '',
					sitename : '',
					siteurl : '请以“/”结尾',
					sitekeywords : '',
					siteinfo : '',
					manager_email : ''
				};

				var install_form = $("#js-install-form");

				install_form.validate({
					errorPlacement : function(error, element) {
						$('#js-install-tip-' + element[0].name).html(error);
					},
					errorElement : 'span',
					errorClass : 'tips_error',
					validClass : 'tips_error',
					onkeyup : false,
					focusInvalid : false,
					rules : {
						dbhost : {required : true},
						dbport : {required : true},
						dbuser : {required : true},
						/* dbpw: {required	: true}, */
						dbname : {required : true},
						dbprefix : {required : true},
						manager : {required : true},
						manager_pwd : {required : true},
						manager_ckpwd : {required : true,equalTo : '#js-manager-pwd'},
						manager_email : {required : true,email : true}
					},
					highlight : false,
					unhighlight : function(element, errorClass,validClass) {
						var tip_elem = $('#js-install-tip-'+ element.name);
						tip_elem.html('<span class="'+ validClass +'" data-text="text"><span>');
					},
					onfocusin : function(element) {
						var name = element.name;
						$('#js-install-tip-' + name).html('<span data-text="text">'+ focus_tips[name] + '</span>');
						$(element).parents('tr').addClass('current');
					},
					onfocusout : function(element) {
						var _this = this;
						$(element).parents('tr').removeClass('current');

						if (element.name === 'email') {
							//邮箱匹配点击后，延时处理
							setTimeout(function() {
								_this.element(element);
							}, 150);
						} else {
							_this.element(element);
						}

					},
					messages : {
						dbhost : {required : '数据库服务器地址不能为空'},
						dbport : {required : '数据库服务器端口不能为空'},
						dbuser : {required : '数据库用户名不能为空'},
						dbpw : {required : '数据库密码不能为空'},
						dbname : {required : '数据库名不能为空'},
						dbprefix : {required : '数据库表前缀不能为空'},
						manager : {required : '管理员帐号不能为空'},
						manager_pwd : {required : '密码不能为空'},
						manager_ckpwd : {required : '重复密码不能为空',equalTo : '两次输入的密码不一致,请重新输入.'},
						manager_email : {required : 'Email不能为空',email : '请输入正确的电子邮箱地址'}
					},
					submitHandler : function(form) {
						form.submit();
						return true;
					}
				});
			});
		</script>
</div>
{include file="footer" /}
</body>
</html>