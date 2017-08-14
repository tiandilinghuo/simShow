<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link href="/pyShow/Public/css/base.css" rel="stylesheet" type="text/css">

    <link href="/pyShow/Public/css/steps.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="/pyShow/Public/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/pyShow/Public/js/mine.js"></script>
    <script language="javascript">
        $(document).ready(function(){
            // alert();
            //  $('#td1').onselect(dicCli);
            $(".a").click(doPo);
        });
    function  doPo(){

        vv=$(this).text();

        sbs=$(this).siblings();
        for(var i=0;i<sbs.length;i++){
            var $v=$(sbs[i]);
            $v.attr("class","a");
            //sbs[i].attr("clsss","a");
            /// /sbs[i].css("clsss","active");
        }
        $(this).attr("class","active");


        vv= vv.replace(/[^0-9]/g, '')
        pd="me="+vv;
        showSen(pd);
        showLetter(pd);
        showTerm(pd);

    }
        function showTerm(pd){
            $.ajax( {
                method : "post",
                url : 'callTerm',
                data : pd,
                dataType : 'json',
                success : function(data){
                    $("#sumTerm").html(data.result.sum);
                    $("#sumTermU").html(data.result.sumUi);
                    $("#termGroup").html(data.result.pyNum);
                    $("#termSum").html(data.result.sumUi);
                    $("#tyDetail").empty();
                    det=data.result.detail;
                    for( var k in det){
                        mtt="<dd><em>"+k+"</em><span>"+det[k]+"</span></dd>";
                        $("#tyDetail").append(mtt);
                    }
                    $("#pySim").empty();
                    yu="<dt>近音词：</dt>";
                    $("#pySim").append(yu);
                    det=data.result.pySim;
                    for( var k=0;k<det.length;k++){
                        mtt="<dd><span>"+det[k]+"</span></dd>";
                        //alert(mtt);
                        $("#pySim").append(mtt);
                    }
                },
                error :function(data){

                }
            });
        }
        function showLetter(pd){
            $.ajax( {
                method : "post",
                url : 'callLetter',
                data : pd,
                dataType : 'json',
                success : function(data){
                    $("#sumLetter").html(data.result.letterSource);
                    $("#sumLetterU").html(data.result.letterNum);
                    $("#pyS").html(data.result.pyNumS);
                    $("#pyU").html(data.result.pyNum);
                    $("#letterDetail").empty();
                    det=data.result.pyDetail;
                    for( var k in det){
                    mtt="<dd><em>"+k+"</em><span>"+det[k]+"</span></dd>";
                        $("#letterDetail").append(mtt);
                    }

                },
                error :function(data){

                }
            });
        }
        function  showSen(pd){
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
        <p><strong>主题库</strong><span class="a">T1</span><span class="a">T2</span><span class="a">T3</span></p>
        <p><a class="active-a" href="step1.html">主题库</a><a href="test1.html">测试1</a><a href="test2.html">测试2</a><a href="test3.html">测试3</a></p>
    </div>
    <div class="steps-content">
        <div class="left mr100">
            <h3><strong>（分组后）</strong><span>同义词+近音词</span></h3>
            <ul>
                <li><strong>同音词：</strong><span><i id="termGroup">x</i>组</span><span>共<i id="termSum">y</i>个</span></li>
                <li><strong>近音词：</strong><span><i>10</i>组</span><span>共<i>20</i>个</span></li>
            </ul>
            <dl>
                <dt>同音词：</dt>
                <div id="tyDetail">

                </div>

            </dl>
            <dl id="pySim">




            </dl>
        </div>
        <div class="middle mr100">
            <h3><strong>（字单位）</strong><span>拼音注释</span></h3>
            <ul>
                <li><strong>拼音：</strong><span><i id="pyS">130</i>个，</span></li>
                <li><strong>不同拼音</strong><span>有<i id="pyU">80</i>个（去重）</span></li>
            </ul>
            <dl>
                <dt>同音字：</dt>
                <div id="letterDetail">

                </div>

            </dl>

        </div>
        <div class="right">
            <h3><strong>T2</strong><span>目标答案</span><strong>（父子小组）</strong></h3>
            <ul>
                <li><strong>汉字：</strong><span>共<i id="sumLetter"></i>个</span></li>
                <li><strong>不同字</strong><<span><i id="sumLetterU"></i>个（去重）</span></li>
                <li><strong>分词后短语</strong><span><i id="sumTerm"></i>个</span></li>
                <li><strong>不同短语</strong><span><i id="sumTermU"></i>个</span></li>
            </ul>
            <h4 class="answer">显示全部 答案</h4>
            <dl class="plus" id="dsen">

            </dl>
            <div class="plus-show">
                <input type="text" id="addSen" class="text" value="请输入文本" onfocus="if (value =='请输入文本'){value =''}" onblur="if (value ==''){value='请输入文本'}" ><input type="button" class="plus-btn" value="添加">
            </div>
        </div>
        <div class="bg-img img1"></div>
        <div class="bg-img img2"></div>
    </div>
</div>
<script>
    $(document).ready(function(){
        /* 点击添加按钮块js*/

        $(".plus-btn").click(function(){
            pd="me="+$("#addSen").val();
            //alert(pd);
            $.ajax( {
                method : "post",
                url : 'addTopicData',
                data : pd,
                dataType : 'json',
                success : function(data){
                    if(data.code==0){alert("添加成功");}
                    else if(data.code==2){alert("请先选择主题！");}
                    else {alert("添加失败");}
                },
                error :function(data){

                }
            });
        });
    });
</script>
</body>
</html>