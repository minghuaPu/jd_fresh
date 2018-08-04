<?php

/**
 * 页面跳转
 * @param  object $dx  控制器的对象
 * @param  string $url 条跳转的地址
 * @param  string $msg 提醒信息
 */
 function message($dx,$url,$msg)
{
	$dx->assign('url',$url);
	$dx->assign('msg',$msg);
	$dx->display('message.html');
}

/**
 * 绝对的url
 * @param  string $control 控制器
 * @param  string $action  行为
 * @return string          地址
 */
function url($control,$action)
{
	return 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']."?control=$control&action=$action";
}
?>