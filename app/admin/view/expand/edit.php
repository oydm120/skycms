{include file="Common:Head" /}
<body class="J_scroll_fixed">
    <div class="wrap jj">
        {include file="Common:Nav"/}
        <div class="common-form">
            <form method="post" action="{:Url('Admin/Expand/edit')}" class="J_ajaxForm">
                <div class="h_a">基本信息</div>
                <div class="table_list">
                    <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
                        <tbody>
                            <tr>
                                <td width="140">所属类别:</td>
                                <td class="jgbox">
                                    <select name="catid">
                                     <option value="">--请选择--</option>         
                                     {volist name="cat" id="vo"}
                                        <option value="{$vo.id}" {if condition="$vo['id'] eq $catid"}selected="selected"{/if}>{$vo.catname}</option>
                                     {/volist}
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>名称:</td>
                                <td><input type="text" class="input" name="name" id="name" value="{$data.name}" ></td>
                            </tr>
                             <tr>
                                <td>值:</td>
                                <td><input type="text" class="input" name="value" id="value" value="{$data.value}" ></td>
                            </tr>
                            <tr>
                                <td>状态:</td>
                                <td><select name="status">
                                        <option value="1" {eq name="data.status" value="1"}selected{/eq}>启用</option>
                                        <option value="0" {eq name="data.status" value="0"}selected{/eq}>禁用</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>排序:</td>
                                <td><input type="text" class="input" name="listorder" id="listorder" value="{$data.listorder}" ></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="btn_wrap">
                    <div class="btn_wrap_pd">
                          <input type="hidden" class="input" name="id" value="{$data.id}" >
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {include file="Common:Js" /}
</body>
</html>