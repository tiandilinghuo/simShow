var _isin = false;
$(document).ready(function(){
    var plus = $('.plus');

    $('textarea').focus(function(){
        _isin = true;
        if($.trim(this.value) == '请输入文本'){
            this.value = "";
        }
    }).blur(function(){
        if($.trim(this.value) == ''){
            _isin = false;
            this.value = "请输入文本";
        }
    });
    /* 点击添加按钮块js*/
    $(".plus-btn").click(function(){
            var text = $.trim($('#textEdit').val());
            if(!text)return;
            plus.append('<dd><em>句'+(($('.plus>dd').length)+1)+'</em><span>'+text+'</span></dd>').scrollTop( plus[0].scrollHeight);
            $('#textEdit').val('');
    });
    /* 点击选中块js*/
    $('.plus').on('click','dd',function(){
        $('.plus dd').removeClass('active-txt');
        $(this).addClass('active-txt');
    });

});