<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="jquery,ui,easy,easyui,web">
    <meta name="description" content="easyui help you build your web page easily!">
    <title>Custom DataGrid Paging - jQuery EasyUI Demo</title>
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/demo/demo.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
    <script language="JavaScript">
        $(document).ready(function(){
          // alert();
         //  $('#td1').onselect(dicCli);
          $("#mySub").click(doPo);
        });
        function doPo(){
            var tt=$("#text").html();
            var uu=$("#uinput").val();
            var pd='me='+tt+'&pp='+uu;


            $.ajax( {
                method : "post",
                url : 'callR',
                data : pd,
                dataType : 'json',
                success : function(data){
                    //alert(data.result.en);
                $("#en").empty();
                $("#cn").empty();
                 $("#en").append(data.result.en);
                 $("#cn").append(data.result.cn);
                },
                error :function(data){
                    alert("error");
                }
            });
        }
        function dicCli(rec,rtc){
           // var tt=$(this);
            //var str = JSON.stringify(rtc);
            //alert(rtc.group);
            //alert(rtc.text);
            $("#topic").empty();
            $("#text").empty();
            $("#topic").append(rtc.group);
            $("#text").append(rtc.text);
            $("#ffm").css("visibility","visible");
            $("#en").empty();
            $("#cn").empty();
            $("#uinput").empty();
        }
    </script>
</head>
<body>
<h2>同音字发音错误NLP可视化</h2>
<p>基于汉字匹配的方式（点击下方某句，进行单句开放测试）</p>
<div style="margin:20px 0"></div>
<table>
    <tr>
        <td id="td1" class="easyui-datalist" title="现有主题及内容" style="width:400px;height:550px" data-options="
            url: 'datalist',
            method: 'get',
            groupField: 'group',
            onSelect: dicCli
            "></td><td id="one">

               <div id="topic" name="topic" style="border: 2px;border-left: 5px;font-weight: bold"></div>
          <div id="text" name="text"></div><BR><BR><BR><BR>
        <div id="ffm" style="visibility: hidden">
            输入测试句：<textarea  id="uinput" style="width: 580px;height: 80px"></textarea>
            <BR><BR><BR>
            <input type="button" value="提交" id="mySub"/>
            <hr>
        </div>

        <div id="en"></div>
        <div id="cn"></div>
                </td>
    </tr>
</table>
<!--
<div class="easyui-datalist"  title="Group DataList" style="width:400px;height:250px" data-options="
            url: 'datalist',
            method: 'get',
            groupField: 'group'
            ">
</div>
-->
</body>
<!--
<body>
<h2>Custom DataGrid Paging</h2>
<div class="demo-info" style="margin-bottom:10px">
    <div class="demo-tip icon-tip">&nbsp;</div>
    <div>You can append some buttons to the standard datagrid pager bar.</div>
</div>

<table id="tt" title="Load Data" class="easyui-datagrid" style="width:700px;height:250px"
       url="get_users"
       iconCls="icon-save" pagination="true">
    <thead>
    <tr>
        <th field="create_time" width="100">Item ID</th>
        <th field="username" width="120">Product ID</th>
        <th field="content" width="80" align="right">List Price</th>
        <th field="ip_address" width="200" align="right">Unit Cost</th>

    </tr>
    </thead>
</table>
</body>
-->
</html>