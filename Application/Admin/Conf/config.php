<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_PARSE_STRING' =>array(
    //后台模板替换原则,MODULE_NAME当前模块名称,APP_NAME是在入口文件index.php中指定的常量
    //通过这样的方式，我们又回到thinkphp3.1.3中模板替换原则

        '__CSS__'=>'/'.MODULE_NAME.'/View/login/Public/Css',
        '__JS__'=>'/'.MODULE_NAME.'/View/login/Public/Js',
        '__IMG__'=>'/'.MODULE_NAME.'/View/login/Public/Img'

    )
);