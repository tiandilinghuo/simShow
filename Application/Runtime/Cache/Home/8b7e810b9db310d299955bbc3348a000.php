<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="/pyShow/Public/css/base.css" rel="stylesheet" type="text/css">
    <!--<link href="/pyShow/Public/css/test.css" rel="stylesheet" type="text/css">-->
    <link href="/pyShow/Public/css/test-plus.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/pyShow/Public/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/pyShow/Public/js/mine.js"></script>
    <script>
        $(document).ready(function(){
            /* 点击添加按钮块js*/
            init();
            $("a").click(showAll);
            $("#kftest").click(mainSub);
            $("#addtest").click(addUserSample);
            //$(".zhang").live("click",tryTest);
            $('body').on('click', '.zhang',tryTest);
        });
        function  init(){
            pd="me=1";
            showAllSen(pd);
            showAllUserSample(pd);
        }
        function  tryTest(){
            tt=$(this).html();
	        ts=$("span.zhang");
          
            for(var i=0;i<ts.length;i++){
                var $v=$(ts[i]);
                $v.attr("style","");
                //sbs[i].attr("clsss","a");
                /// /sbs[i].css("clsss","active");
            }
            $(this).attr("style","background-color: #5cb85c");
            pd="me="+tt;
            seeMostSim(pd);
            seeLetter(pd);
            seePar(pd);
        }
        function  addUserSample(){
            pd="me="+$("#addSen").val();
            addUSerSen(pd);
            showAllUserSample(pd);
        }
        function  showAllUserSample(pd){
            $.ajax( {
                method : "post",
                url : 'getAllUserSample',
                data : pd,
                dataType : 'json',
                success : function(data){
                    if(data.code==0){
                        $("#userSample").empty();
                        ret=data.result;
                        index=1;
                        for (var ii=0;ii<ret.length;ii++){
                            tt="<dd><em>句"+index+"</em><span class=\"zhang\">"+ret[ii].sen+"</span></dd>";
                            index+=1;
                            $("#userSample").append(tt);
                        }
                    }

                    else {alert("获取失败");}
                },
                error :function(data){

                }
            });
        }
        function addUSerSen(pd){
            $.ajax( {
                method : "post",
                url : 'addUserSample',
                data : pd,
                dataType : 'json',
                success : function(data){
                    if(data.code==0){
                        alert("添加成功");
                    }

                    else {alert("添加失败");}
                },
                error :function(data){

                }
            });
        }
        function  seeMostSim(pd){
            $.ajax( {
                method : "post",
                url : 'getTop3',
                data : pd,
                dataType : 'json',
                success : function(data){
                    if(data.code==0){
                        ret=data.result;
                        $("#top3").empty();
                        ti=" <dt>初次判断Top-3的文本：</dt>";
                        $("#top3").append(ti);
                        for(var ii=0;ii<ret.length;ii++){
                            tt="<dd><span>"+ret[ii].py+"</span><span>"+ret[ii].sen+"</span><span>"+ret[ii].score+"</span></dd>";
                            $("#top3").append(tt);
                        }
                    }

                    else {alert("解析失败");}
                },
                error :function(data){

                }
            });
        }
        function  seeLetter(pd){
            $.ajax( {
                method : "post",
                url : 'seeLetter',
                data : pd,
                dataType : 'json',
                success : function(data){
                    if(data.code==0){
                        ret=data.result;
                        $("#seeLetter").empty();
                        ti="<dt>有待纠正的字</dt>";
                        $("#seeLetter").append(ti);
                        for(var ii=0;ii<ret.length;ii++){
                            tt="<dd><span>"+ret[ii].sour+"</span><span>"+ret[ii].change+"</span></dd>";
                            $("#seeLetter").append(tt);
                        }
                    }

                    else {alert("解析失败");}
                },
                error :function(data){

                }
            });
        }
        function  mainSub(){
            pd="me="+$("#addSen").val();
            seeMostSim(pd);
            seeLetter(pd);
            seePar(pd);
        }
        function  seePar(pd){
            $.ajax( {
                method : "post",
                url : 'seePar',
                data : pd,
                dataType : 'json',
                success : function(data){
                    if(data.code==0){
                        ret=data.result;
                        $("#seePar").empty();
                        ti=" <dt>有待纠正的长短语<span>（预存）：</span></dt>";
                        $("#seePar").append(ti);
                        for(var ii=0;ii<ret.length;ii++){
                            tt="<dd><span>"+ret[ii].sour+"</span><span>"+ret[ii].change+"</span></dd>";
                            $("#seePar").append(tt);
                        }
                    }

                    else {alert("解析失败");}
                },
                error :function(data){

                }
            });
        }
        function showAll(){
            vv=$(this).text();

            sbs=$(this).siblings();
            for(var i=0;i<sbs.length;i++){
                var $v=$(sbs[i]);
                $v.attr("class","a");
                //sbs[i].attr("clsss","a");
                /// /sbs[i].css("clsss","active");
            }
            $(this).attr("class","active-a");
            vv= vv.replace(/[^0-9]/g, '')
            pd="me="+vv;
            showAllSen(pd);
            showAllUserSample(pd);
        }
        function showAllSen(pd){
            $.ajax( {
                method : "post",
                url : 'callR',
                data : pd,
                dataType : 'json',
                success : function(data){
                    $("#dsen").empty();
                    ii=1;
                    ///alert(data.result.length);
                    for(var i=0;i<data.result.length;i++){
                        mtt="<dd><em>句"+ii+"</em><span>"+data.result[i].sen+"</span></dd>";
                        $("#dsen").append(mtt);
                        ii+=1;
                    }
                },
                error :function(data){

                }
            });
        }
    </script>
</head>
<body>
<div class="steps">
    <div class="steps-head">
        <h3>拼音显性化表达</h3>

        <p><a>答案库</a><a class="active-a" >测试1</a><a >测试2</a><a >测试3</a></p>
    </div>
    <div class="steps-content">
        <div class="left mr100">
            <h3><span>测试结果</span></h3>
            <dl id="top3">


            </dl>
            <dl id="seeLetter">

            </dl>
            <dl id="seePar">

            </dl>
        </div>
        <div class="right">
            <div class="test-centent">
                <!--     <h3><span>输入</span></h3>-->
                <h4 class="answer">（发音错误）测试句</h4>
                <dl class="plus" id="userSample">
                </dl>
                <div class="plus-show">
                    <textarea id="addSen" class="text">请输入文本</textarea><input type="button" id="addtest" class="plus-btn" value="添加">
                    <input type="button" id="kftest" class="test-btn" value="测试">
                </div>
            </div>
            <div class="bg-white"></div>
            <div class="answer-content">
                <h3><span>答案库</span></h3>
                <h4 class="answer">目标句集</h4>
                <dl class="plus" id="dsen">
                   
                </dl>
            </div>
        </div>
        <div class="bg-img"></div>
    </div>
</div>

</body>
</html>