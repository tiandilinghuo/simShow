<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="/simShow/Public/css/base.css" rel="stylesheet" type="text/css">
    <link href="/simShow/Public/css/show3.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/simShow/Public/js/jquery-1.11.1.min.js"></script>
    <style type="text/css">

        body {overflow:hidden;border:0px;}
        img,object {border:0px;}

    </style>
    <script>
        $(document).ready(function(){
            /* 点击选中块js*/
            initUserSen();
            $(".plus-btn").click(addC);
            $('body').on('click', '.zhang',comDis);
        });
        function comDis(){
            ts=$(this).siblings();

            for (var  ii=0;ii<ts.length;ii++){
                $(ts[ii]).attr("style","");
            }
            $(this).attr("style","background-color: #4db14d");
            ts=$(this).children();
            sp=$(ts[1]);
            pd="me="+sp.html();
           // alert(pd);
            $.ajax( {
                method : "post",
                url : 'wordDis',
                data : pd,
                dataType : 'json',
                success : function(data){
                    if(data.code==0){
                        ret=data.result;
                        $("#substrleft").empty();
                        for(var i=0;i<ret.length;i++){
                            index=i+1;
                            tt="<tr><td>"+ret[i].senID+"</td><td>"+ret[i].sen+"</td><td>"+ret[i].len+"</td><td>"+ret[i].per+"</td></tr>";
                            $("#substrleft").append(tt);
                        }
                    }
                },
                error :function(data){

                }
            });
        }
        function  initUserSen(){
            pd="me=1";
            $.ajax( {
                method : "post",
                url : 'getAllUserSen',
                data : pd,
                dataType : 'json',
                success : function(data){
                    if(data.code==0){
                        ret=data.result;
                        $(".plus").empty();
                        for(var i=0;i<ret.length;i++){
                            index=i+1;
                            tt="<dd class=\"zhang\"><em>测试句"+index+"</em><span>"+ret[i].sen+"</span></dd>";
                            $(".plus").append(tt);
                        }
                    }
                },
                error :function(data){

                }
            });
        }
        function addC(){
            tt=$("#textEdit").val();
            pd="me="+tt;
            $.ajax( {
                method : "post",
                url : 'addUserSen',
                data : pd,
                dataType : 'json',
                success : function(data){
                    alert(data);
                },
                error :function(data){

                }
            });
            $.ajax( {
                method : "post",
                url : 'getAllUserSen',
                data : pd,
                dataType : 'json',
                success : function(data){
                    if(data.code==0){
                        ret=data.result;
                        $(".plus").empty();
                        for(var i=0;i<ret.length;i++){
                            index=i+1;
                            tt="<dd class=\"zhang\"><em>测试句"+index+"</em><span>"+ret[i].sen+"</span></dd>";
                            $(".plus").append(tt);
                        }
                    }
                },
                error :function(data){

                }
            });
        }
    </script>
</head>
<body scroll="no">
<div class="steps-content">
    <div class="left mr100">
        <h3><span>判断逻辑（逐一对比）</span></h3>
        <table>
            <thead>
            <th width="15%">满分分支ID(调取)</th>
            <th width="40%">打中的内容（重合部分）</th>
            <th width="8%">打中长度（排序）</th>
            <th width="8%">占比大小（排序）</th>
            </thead>
            <tbody id="substrleft">

            </tbody>
        </table>
    </div>
    <div class="right">
        <h3><span>输入+累加input</span></h3>
        <h4 class="answer">测试样本</h4>
        <dl class="plus">

        </dl>
        <div class="plus-show">
            <input type="text" id="textEdit" class="text" value="请输入文本" onfocus="if (value =='请输入文本'){value =''; _isin = true;} " onblur="if (value ==''){value='请输入文本';_isin = false;}" >
            <input type="button" class="plus-btn" value="添加">

        </div>

    </div>
    <div class="bg-img img2"></div>
</div>
<div class="test-show1"><em>测试句：</em><span>个别满分分支+个别等价句b（同义词替换+句式变化）+反义词+夹杂冗余废话的等价句+加胳膊少腿的等价句。</span></div>
</div>
</body>
</html>