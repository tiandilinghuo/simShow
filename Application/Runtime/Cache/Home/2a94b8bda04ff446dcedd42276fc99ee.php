<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="/simShow/Public/css/base.css" rel="stylesheet" type="text/css">
    <link href="/simShow/Public/css/show3.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/simShow/Public/js/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="steps">
    <div class="steps-head">
        <p><strong>问题</strong><input type="radio" name="radio" value="1" checked>JQ1
            <input type="radio" name="radio" value="2">JQ2
            <input type="radio" name="radio" value="3" >JQ3

        <p><a class="active-a" id="left">语意判断测试</a><a id="right">子串匹配测试</a></p>

    </div>

    <object style="border:0px" type="text/x-scriptlet" id="ob" data="simsee?topic=1"  width="100%" height="600"></object>


<script>
    $(document).ready(function(){
        /* 点击选中块js*/
        $("a").click(chContent);
    });

function chContent(){
    myv=$('input:radio:checked').val();

    tt=$(this).attr("id");
    $(this).attr("class","active-a");
    if(tt=="left"){
        $("#ob").attr("data","simsee?topic="+myv);
        $("#right").attr("class","a");
    }
    else {
        $("#ob").attr("data","substr?topic="+myv);
        $("#left").attr("class","a");
    }
}
</script>
</body>
</html>