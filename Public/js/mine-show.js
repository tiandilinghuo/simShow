/**
 * Created by Administrator on 2017/7/19.
 */
var _isin = false;
$(document).ready(function(){
    var plus1 = $('.plus-l');
    var plus2 = $('.plus-m');
    var plus3 = $('.plus-r');
    /* 点击添加按钮块js*/
    $(".plus-btn-l").click(function(){
        if(_isin){
            var text = $.trim($('#textEdit-l').val());
            if(!text)return;
            $('#textEdit-l').val('');
            plus1.append('<dd><em>b1.'+(($('.plus-l>dd').length)+1)+'</em><span>'+text+'</span></dd>').scrollTop( plus1[0].scrollHeight);

        }
    });
    /* 点击添加按钮块js*/
    $(".plus-btn-m").click(function(){
        if(_isin){
            var text = $.trim($('#textEdit-m').val());
            if(!text)return;
            plus2.append('<dd><em>b1.'+(($('.plus-m>dd').length)+1)+'</em><span>'+text+'</span></dd>').scrollTop( plus2[0].scrollHeight);
            $('#textEdit-m').val('');
        }
    });
    /* 点击添加按钮块js*/
    $(".plus-btn-r").click(function(){
        if(_isin){
            var text = $.trim($('#textEdit-r').val());
            if(!text)return;
            plus3.append('<dd><em>b1.'+(($('.plus-r>dd').length)+1)+'</em><span>'+text+'</span></dd>').scrollTop( plus3[0].scrollHeight);
            $('#textEdit-r').val('');
        }
    });
    /* 点击JQ问题内容显示块s*/
    $('.jq-question .question').click(function () {
        $('.jq-question .answer').show();
    })

});