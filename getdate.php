<?php
    include('common.php');
	if(!empty($_GET['id'])){
	    $date = $db->pe_select('message',array('msg_id'=>$_GET['id']),'*');
	    echo $poidate = '|'.$date['msg_jingdu'].'|'.$date['msg_weidu'].'|'.$date['msg_number'].'|'.$date['msg_areaID'].'|'.$date['msg_name'].'|'.$date['msg_address'].'|'.$date['msg_tezheng'].'|'.$date['msg_quanshu'].'|'.$date['msg_age'].'|'.$date['msg_dxguanfu'].'|'.$date['msg_nbguanfu'].'|'.$date['msg_height'].'|'.$date['msg_xiongjing'].'|'.$date['msg_hb'].'|'.$date['msg_poxiang'].'|'.$date['msg_podu'].'|'.$date['msg_powei'].'|'.$date['msg_state'].'|'.$date['msg_environment'].'|'.$date['msg_story'].'|'.$date['msg_prodanwei'].'|'.$date['msg_proman'].'|'.$date['msg_rank'].'|'.$date['msg_note'].'|';
	    $protect_note = $db->pe_selectall('protectnote', array('msg_id'=>$_GET['id'],'order by'=>'prot_id asc'), '*');
	    echo $count = count($protect_note)."|";
	    foreach( $protect_note as $v){
	        echo $v['prot_reason'],"*",$v['prot_result'],"*",$v['prot_time'].'|';
	    }
	    $pic = $db->pe_selectall('pic', array('msg_id'=>$_GET['id'],'order by'=>'pic_id asc'), '*');
	    echo $piccount = count($pic)."|";
	    foreach( $pic as $v){
	        echo $v['pic_path'].'|';
	    }
	}
	if(!empty($_GET['area'])){
	    $date = $db->pe_selectall('city',array('city_pid'=>$_GET['area']),'city_id,city_areaname');
	    $arr = array();
	    foreach ($date as $k=>$v){
	        array_push($arr, $v['city_id']);
	        array_push($arr, $v['city_areaname']);
	    }	   
	    echo json_encode($arr);
	}
?>