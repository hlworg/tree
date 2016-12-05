<?php
include('common.php');
$adminmenu[1] = array(
	'headnav' => '信息中心',
	'subnav' => array(
		array('name' => '古树列表', 'menumark' => 'product', 'url' => 'admin.php?mod=product&state=1'),
	    array('name' => '古树类别', 'menumark' => 'branch', 'url' => 'admin.php?mod=branch'),
		array('name' => '古树区域', 'menumark' => 'category', 'url' => 'admin.php?mod=category'),
		array('name' => '古树图片', 'menumark' => 'brand', 'url' => 'admin.php?mod=brand'),
		array('name' => '古树维护', 'menumark' => 'prot', 'url' => 'admin.php?mod=prot')		
	)
);
if (!pe_login('user')) {
	pe_error('请先登录...','index.php');
}


if (in_array("{$mod}.php", pe_dirlist("{$pe['path_root']}module/{$module}/*.php"))) {
	include("{$pe['path_root']}module/{$module}/{$mod}.php");
}
pe_result();
?>