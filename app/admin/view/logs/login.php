{include file="Common:Head" /}
<body class="J_scroll_fixed">
<div class="wrap jj">
{include file="Common:Nav"/}
 <!-- -->
  <div class="h_a">搜索</div>
  <form method="post" action="{:Url('Admin/Logs/login')}">
  <div class="search_type cc mb10">
    <div class="mb10"> <span class="mr20">
              搜索类型：
    <select class="select_2" name="status" style="width:70px;">
                <option value='' {if condition="$Think.post.status eq ''"}selected{/if}>不限</option>
                <option value="1" {if condition="$Think.post.status eq '1'"}selected{/if}>成功</option>
                <option value="2" {if condition="$Think.post.status eq '2'"}selected{/if}>失败</option>
              
      </select>
      用户ID：<input type="text" class="input length_2" name="uid" size='10' value="{$Think.post.uid}" placeholder="用户ID">
      IP：<input type="text" class="input length_2" name="ip" size='20' value="{$Think.post.ip}" placeholder="IP">
    时间：
      <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.post.start_time}" style="width:80px;">
      -
      <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.post.end_time}" style="width:80px;">
      <button class="btn">搜索</button>
      <a class="J_ajax_del btn" name="del_log_4" href="{:Url('Admin/Logs/logindel')}" >删除一月前数据</a>
      </span> </div>
      </form> 
  </div>
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td align="center" width="80">ID</td>
            <td  align="center">用户名</td>
            <td align="center">密码</td>
            <td align="center">状态</td>
            <td align="center">其他说明</td>
            <td align="center" width="120">时间</td>
            <td align="center" width="120">IP</td>
          </tr>
        </thead>
        <tbody>
          {volist name="logs" id="vo"}
            <tr>
              <td align="center">{$vo.loginid}</td>
            <td align="center">{$vo.username}</td>
            <td align="center">{$vo.password}</td>
            <td align="center">{if condition="$vo['status'] eq 1"}登陆成功{else /}<font color="#FF0000">登陆失败</font>{/if}</td>
            <td align="center">{$vo.info}</td>
            <td align="center">{$vo.logintime}</td>
            <td align="center">{$vo.loginip}</td>
            </tr>
          {/volist}
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div>
  
</div>
{include file="Common:Js" /}
</body>
</html>