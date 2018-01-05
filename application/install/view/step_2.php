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
        <li class="current"><em>1</em>检测环境</li>
        <li><em>2</em>创建数据</li>
        <li><em>3</em>完成安装</li>
      </ul>
    </div>
    <div class="server">
      <table width="100%">
          <tr>
            <td class="td1">环境检测</td>
            <td class="td1" width="25%">推荐配置</td>
            <td class="td1" width="25%">当前状态</td>
            <td class="td1" width="25%">最低要求</td>
          </tr>
          <tr>
            <td>操作系统</td>
            <td>类UNIX</td>
            <td><i class="fa fa-check correct"></i> {$os}</td>
            <td>不限制</td>
          </tr>
          <tr>
            <td>PHP版本</td>
            <td>>5.4.x</td>
            <td><i class="fa fa-check correct"></i> {$phpversion}</td>
            <td>5.4.0</td>
          </tr>
          <tr>
            <td>
              PDO 
              <a href="https://www.baidu.com/s?wd=开启PDO,PDO_MYSQL扩展" target="_blank">
                <i class="fa fa-question-circle question"></i>
              </a>
            </td>
            <td>开启</td>
            <td>
              {$pdo}
            </td>
            <td>开启</td>
          </tr>
          <tr>
            <td>
              PDO_MySQL
              <a href="https://www.baidu.com/s?wd=开启PDO,PDO_MYSQL扩展" target="_blank">
                <i class="fa fa-question-circle question"></i>
              </a>
            </td>
            <td>开启</td>
            <td>
              {$pdo_mysql}
            </td>
            <td>开启</td>
          </tr>
          <tr>
          <td>
            PHP的curl扩展
          </td>
          <td>开启</td>
          <td>
            {$curl}
          </td>
          <td>开启</td>
          </tr>
          <tr>
            <td>
              PHP的mbstring扩展
            </td>
            <td>开启</td>
            <td>
              {$mbstring}
            </td>
            <td>开启</td>
          </tr>
          <tr>
            <td>
              PHP的php_exif扩展
            </td>
            <td>开启</td>
            <td>
              {$exif}
            </td>
            <td>开启</td>
          </tr>
          <tr>
            <td>file_get_contents</td>
            <td>开启</td>
            <td>
              {$file_get_contents}
            </td>
            <td>开启</td>
          </tr>
          <tr>
            <td>session</td>
            <td>开启</td>
            <td>
              {$session}
            </td>
            <td>开启</td>
          </tr>
          <tr>
            <td>
              PHP的allow_url_fopen
            </td>
            <td>开启</td>
            <td>
              {$allow_url_fopen}
            </td>
            <td>开启</td>
          </tr>
          <tr>
            <td>附件上传</td>
            <td>>2M</td>
            <td>
              {$upload_size}
            </td>
            <td>不限制</td>
          </tr>
        </table>

      <table width="100%">
          <tr>
            <td class="td1">目录、文件权限检查</td>
            <td class="td1" width="25%">写入</td>
            <td class="td1" width="25%">读取</td>
          </tr>
          {foreach name="checklist" item="vo" key="path"}
            <tr>
              <td>
                ./{$path}
              </td>
              <td>
                {if condition="$vo['w']"}
                  <i class="fa fa-check correct"></i> 可写 
                {else/}
                  <i class="fa fa-remove error"></i> 不可写 
                {/if}
              </td>
              <td>
                {if condition="$vo['r']"}
                  <i class="fa fa-check correct"></i> 可读
                {else/}
                  <i class="fa fa-remove error"></i> 不可读
                {/if}
              </td>
            </tr>
          {/foreach}
        </table>
    </div>
    <div class="bottom tac"> <a href="{:Url('step2')}" class="btn">重新检测</a><a href="{:Url('step3')}" class="btn next">下一步</a> </div>
  </section>
</div>
{include file="footer" /}

</body>
</html>