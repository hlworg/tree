<?php
			if($_g_keyword || $_g_city || $_g_leval || $_g_category){
				if(isset($_g_keyword)){
					empty($_g_keyword)?$sqlwhere .= null : $sqlwhere .= " and `msg_name` like '%{$_g_keyword}%'";
					
				}
				if(isset($_g_city)){
					empty($_g_city)?$sqlwhere .= null : $sqlwhere .= " and `msg_areaID` like '%{$_g_city}%'";
					
				}
				if(isset($_g_leval)){
					empty($_g_leval)?$sqlwhere .= null : $sqlwhere .= " and `msg_rank` = '{$_g_leval}'";
					
				}
				if(isset($_g_category)){
					empty($_g_category)?$sqlwhere .= null : $sqlwhere .= " and `msg_branch` = '{$_g_category}'";
					
				}
				$sqlwhere .= ' order by';		
				$sqlwhere .= " `msg_id` desc";
				$search_list = $db->pe_selectall('message', $sqlwhere, '*');
				if($search_list){
					foreach( $search_list as $k=>$v){
						$protect_note_search[$k] = $db->pe_selectall('protectnote', array('msg_id'=>$v['msg_id'],'order by'=>'prot_id asc'), '*');
						$pic_search[$k] = $db->pe_selectall('pic', array('msg_id'=>$v['msg_id'],'order by'=>'pic_id asc'), '*');
					}
				}				
				echo "showsearch();
					  function showsearch(){";					  	
					  	if(!$search_list){
						  echo "alert('对不起，您搜索的内容不存在！！')";
					    }else{
							echo "map.clearOverlays(); 
							  (function(){";
							  		foreach( $search_list as $k=>$v){
										echo "
										var point = new BMap.Point(".$v['msg_jingdu'].", ".$v['msg_weidu'].");					
										var icon = new BMap.Icon('".$pe['host_tpl']."images/marker.png', new BMap.Size(28, 28), {//是引用图标的名字以及大小，注意大小要一样
											anchor: new BMap.Size(14, 28),//这句表示图片相对于所加的点的位置
											infoWindowAnchor: new BMap.Size(14, 0)
										});
										var label = new BMap.Label('".$v['msg_name']."',{'offset':new BMap.Size(-10,-33)});
										label.setStyle({                                   //给label设置样式，任意的CSS都是可以的
											color:'#fff',                   //颜色
											fontSize:'10px',               //字号
											fontFamily:'微软雅黑',
											//border:'1px red solid',                    //边
											padding:'5px',
											backgroundColor:'#f04854',
											textAlign:'center',            //文字水平居中显示
											lineHeight:'15px',
											cursor:'pointer'
										});
										var marker = new BMap.Marker(point,{ icon: icon });
										marker.setLabel(label);  
										map.addOverlay(marker);
										
										label.addEventListener('click', function(){ 
										    $('#info').css('display','none');
                    					    $('#infobtn').css('marginTop','0px');
                    					    show = true;										   
											var parent = document.getElementById('mright');
											if(document.getElementById('crediv')){
												var divboxs = document.getElementById('crediv');
												parent.removeChild(divboxs);
											}
											parent.innerHTML = '<div id='+'crediv'+' style='+'width:420px;'+'>'+
																	'<div id='+'crediv1'+' style='+'width:350px;'+'>'+
																		'<div class='+'base_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;'+'>'+'基本情况'+'</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'调查号：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_number']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'古树编号：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_areaID']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树种名：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_name']."</div>'+														
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'地址：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;cursor:pointer;'+' onclick='+'center(this);'+'>".$v['msg_address']."<span hidden>|".$v['msg_jingdu']."|".$v['msg_weidu']."|</span></div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'纬度：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_weidu']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'经度：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_jingdu']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'特征代码：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_tezheng']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'权属：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_quanshu']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树龄：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_age']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'冠幅(东西)：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_dxguanfu']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'冠幅(南北)：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_nbguanfu']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树高：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_height']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'胸径：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_xiongjing']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'海拔：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_hb']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡向：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_poxiang']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡度：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_podu']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡位：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_powei']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'生长势：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_state']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'生长环境：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_environment']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'管护单位：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_prodanwei']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'管护人：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_proman']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'备注：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_note']."</div>'+
																			'<div style='+'width:100px;height:20px;float:left;'+'></div>'										
																	+'</div>'	
																+'</div>';									
											
											var crediv = document.getElementById('crediv');";					
											foreach( $protect_note_search[$k] as $kk=>$vv){
												echo "
											
												crediv.innerHTML += '<div class='+'protnote'+' style='+'width:350px;clear:both;display:none;'+'>'+
																			'<div class='+'prot_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;margin:auto;margin-top:20px;'+'>'+'维护记录".($kk+1)."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'编号：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_areaID']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护原因：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_reason']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护结果：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_result']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护时间：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_time']."</div>'+											
																			'<div class='+'empty'+' style='+'width:350px;height:30px;float:left;'+'></div>'	
								
																	+'</div>';";	
											}
											
											echo "			
											crediv.innerHTML += '<div id='+'story'+' style='+'width:350px;clear:both;display:none;'+'>'+
																		'<div class='+'base_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;margin:auto;margin-top:20px;'+'>'+'古树故事'+'</div>'+
																		'<div class='+'base_content1'+' style='+'width:330px;height:auto;color:#000;float:left;padding:10px;'+'>".$v['msg_story']."</div>'
																+'</div>';";					
											foreach( $pic_search[$k] as $vv){
												echo "
											
											
															
												crediv.innerHTML += '<div class='+'pic'+' style='+'width:350px;clear:both;display:none;'+'>'+
																			'<img class='+'image'+' src=".$vv['pic_path']." style='+'width:330px;height:auto;color:#000;float:left;padding:10px;'+'/>'
																	+'</div>';";
											}
											echo "
											
											document.getElementById('crediv1').style.border='1px #000 solid';
											document.getElementById('crediv1').style.margin='20px auto';
										
											
											$('.base_title').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
											$('.base_content1').css('background','url(".$pe['host_tpl']."images/bg_title2.png)');
											$('.base_content2').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
											$('.prot_title').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
											$('.protnote').css('margin','auto');
											$('#story').css('margin','auto');
											$('.pic').css('margin','20px auto');
											$('.empty').css('background','url(".$pe['host_tpl']."images/mbanner.png)');
											$('#info').css('color','#fff');
										});
										marker.addEventListener('click', function(){  
											$('#info').css('display','none');
                    					    $('#infobtn').css('marginTop','0px');
                    					    show = true;
											var parent = document.getElementById('mright');
											if(document.getElementById('crediv')){
												var divboxs = document.getElementById('crediv');
												parent.removeChild(divboxs);
											}
											parent.innerHTML = '<div id='+'crediv'+' style='+'width:420px;'+'>'+
																	'<div id='+'crediv1'+' style='+'width:350px;'+'>'+
																		'<div class='+'base_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;'+'>'+'基本情况'+'</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'调查号：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_number']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'古树编号：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_areaID']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树种名：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_name']."</div>'+														
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'地址：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;cursor:pointer;'+' onclick='+'center(this);'+'>".$v['msg_address']."<span hidden>|".$v['msg_jingdu']."|".$v['msg_weidu']."|</span></div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'纬度：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_weidu']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'经度：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_jingdu']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'特征代码：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_tezheng']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'权属：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_quanshu']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树龄：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_age']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'冠幅(东西)：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_dxguanfu']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'冠幅(南北)：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_nbguanfu']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树高：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_height']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'胸径：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_xiongjing']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'海拔：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_hb']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡向：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_poxiang']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡度：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_podu']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡位：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_powei']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'生长势：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_state']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'生长环境：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_environment']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'管护单位：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_prodanwei']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'管护人：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_proman']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'备注：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_note']."</div>'+
																			'<div style='+'width:100px;height:20px;float:left;'+'></div>'										
																	+'</div>'	
																+'</div>';									
											
											var crediv = document.getElementById('crediv');";					
											foreach( $protect_note_search[$k] as $kk=>$vv){
												echo "
											
												crediv.innerHTML += '<div class='+'protnote'+' style='+'width:350px;clear:both;display:none;'+'>'+
																			'<div class='+'prot_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;margin:auto;margin-top:20px;'+'>'+'维护记录".($kk+1)."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'编号：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_areaID']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护原因：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_reason']."</div>'+
																			'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护结果：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_result']."</div>'+
																			'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护时间：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_time']."</div>'+											
																			'<div class='+'empty'+' style='+'width:350px;height:30px;float:left;'+'></div>'	
								
																	+'</div>';";	
											}
											
											echo "			
											crediv.innerHTML += '<div id='+'story'+' style='+'width:350px;clear:both;display:none;'+'>'+
																		'<div class='+'base_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;margin:auto;margin-top:20px;'+'>'+'古树故事'+'</div>'+
																		'<div class='+'base_content1'+' style='+'width:330px;height:auto;color:#000;float:left;padding:10px;'+'>".$v['msg_story']."</div>'
																+'</div>';";					
											foreach( $pic_search[$k] as $vv){
												echo "
											
											
															
												crediv.innerHTML += '<div class='+'pic'+' style='+'width:350px;clear:both;display:none;'+'>'+
																			'<img class='+'image'+' src=".$vv['pic_path']." style='+'width:330px;height:auto;color:#000;float:left;padding:10px;'+'/>'
																	+'</div>';";
											}
											echo "
											
											document.getElementById('crediv1').style.border='1px #000 solid';
											document.getElementById('crediv1').style.margin='20px auto';
										
											
											$('.base_title').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
											$('.base_content1').css('background','url(".$pe['host_tpl']."images/bg_title2.png)');
											$('.base_content2').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
											$('.prot_title').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
											$('.protnote').css('margin','auto');
											$('#story').css('margin','auto');
											$('.pic').css('margin','20px auto');
											$('.empty').css('background','url(".$pe['host_tpl']."images/mbanner.png)');
										});  ";
									}
							echo "})()";
						}
				echo "}";
			}else if($_g_filter){
			    echo
			    "showfilter();
    			function showfilter(){
    				map.clearOverlays();
    				(function(){";
    			    foreach( $filter_list as $k=>$v){
    			        echo "
    					var point = new BMap.Point(".$v['msg_jingdu'].", ".$v['msg_weidu'].");
    					var icon = new BMap.Icon('".$pe['host_tpl']."images/marker.png', new BMap.Size(28, 28), {//是引用图标的名字以及大小，注意大小要一样
    						anchor: new BMap.Size(14, 28),//这句表示图片相对于所加的点的位置
    						infoWindowAnchor: new BMap.Size(14, 0)
    					});
    					var label = new BMap.Label('".$v['msg_name']."',{'offset':new BMap.Size(-10,-33)});
    					label.setStyle({                     //给label设置样式，任意的CSS都是可以的
    						color:'#fff',                   //颜色
    						fontSize:'10px',               //字号
    						fontFamily:'微软雅黑',
    						//border:'1px red solid',                    //边
    						padding:'5px',
    						backgroundColor:'#f04854',
    						textAlign:'center',            //文字水平居中显示
    						lineHeight:'15px',
    						cursor:'pointer'
    					});
    			    
    					 var marker = new BMap.Marker(point,{ icon: icon });
    					 marker.setLabel(label);
    					 map.addOverlay(marker);
    					 label.addEventListener('click', function(){
    					    $('#info').css('display','none');
    					    $('#infobtn').css('marginTop','0px');
    					    show = true;
    						var parent = document.getElementById('mright');
    						if(document.getElementById('crediv')){
    							var divboxs = document.getElementById('crediv');
    							parent.removeChild(divboxs);
    						}
    						parent.innerHTML = '<div id='+'crediv'+' style='+'width:420px;'+'>'+
    												'<div id='+'crediv1'+' style='+'width:350px;'+'>'+
    													'<div class='+'base_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;'+'>'+'基本情况'+'</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'调查号：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_number']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'古树编号：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_areaID']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树种名：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_name']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'地址：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;cursor:pointer;'+' onclick='+'center(this);'+'>".$v['msg_address']."<span hidden>|".$v['msg_jingdu']."|".$v['msg_weidu']."|</span></div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'纬度：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_weidu']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'经度：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_jingdu']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'特征代码：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_tezheng']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'权属：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_quanshu']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树龄：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_age']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'冠幅(东西)：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_dxguanfu']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'冠幅(南北)：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_nbguanfu']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树高：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_height']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'胸径：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_xiongjing']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'海拔：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_hb']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡向：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_poxiang']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡度：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_podu']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡位：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_powei']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'生长势：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_state']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'生长环境：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_environment']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'管护单位：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_prodanwei']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'管护人：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_proman']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'备注：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_note']."</div>'+
    														'<div style='+'width:100px;height:20px;float:left;'+'></div>'
    												+'</div>'
    											+'</div>';
    			    
    						var crediv = document.getElementById('crediv');";
    			        foreach( $protect_note_filter[$k] as $kk=>$vv){
    			            echo "
    			    
    							crediv.innerHTML += '<div class='+'protnote'+' style='+'width:350px;clear:both;display:none;'+'>'+
    														'<div class='+'prot_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;margin:auto;margin-top:20px;'+'>'+'维护记录".($kk+1)."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'古树编号：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_areaID']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护原因：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_reason']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护结果：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_result']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护时间：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_time']."</div>'+
    														'<div class='+'empty'+' style='+'width:350px;height:30px;float:left;'+'></div>'
    		
    												+'</div>';";
    			        }
    			    
    			        echo "
    						crediv.innerHTML += '<div id='+'story'+' style='+'width:350px;clear:both;display:none;'+'>'+
    													'<div class='+'base_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;margin:auto;margin-top:20px;'+'>'+'古树故事'+'</div>'+
    													'<div class='+'base_content1'+' style='+'width:330px;height:auto;color:#000;float:left;padding:10px;'+'>".$v['msg_story']."</div>'
    											+'</div>';";
    			        foreach( $pic_filter[$k] as $vv){
    			            echo "
    			    
    			    
    			    
    							crediv.innerHTML += '<div class='+'pic'+' style='+'width:350px;clear:both;display:none;'+'>'+
    														'<img class='+'image'+' src=".$vv['pic_path']." style='+'width:330px;height:auto;color:#000;float:left;padding:10px;'+'/>'
    												+'</div>';";
    			        }
    			        echo "
    			    
    						document.getElementById('crediv1').style.border='1px #000 solid';
    						document.getElementById('crediv1').style.margin='20px auto';
    			
    			    
    						$('.base_title').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
    						$('.base_content1').css('background','url(".$pe['host_tpl']."images/bg_title2.png)');
    						$('.base_content2').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
    						$('.prot_title').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
    						$('.protnote').css('margin','auto');
    						$('#story').css('margin','auto');
    						$('.pic').css('margin','20px auto');
    						$('.empty').css('background','url(".$pe['host_tpl']."images/mbanner.png)');
    					});
    					 marker.addEventListener('click', function(){
    						$('#info').css('display','none');
    					    $('#infobtn').css('marginTop','0px');
    					    show = true;
    						var parent = document.getElementById('mright');
    						if(document.getElementById('crediv')){
    							var divboxs = document.getElementById('crediv');
    							parent.removeChild(divboxs);
    						}
    						parent.innerHTML = '<div id='+'crediv'+' style='+'width:420px;'+'>'+
    												'<div id='+'crediv1'+' style='+'width:350px;'+'>'+
    													'<div class='+'base_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;'+'>'+'基本情况'+'</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'调查号：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_number']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'古树编号：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_areaID']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树种名：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_name']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'地址：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;cursor:pointer;'+' onclick='+'center(this);'+'>".$v['msg_address']."<span hidden>|".$v['msg_jingdu']."|".$v['msg_weidu']."|</span></div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'纬度：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_weidu']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'经度：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_jingdu']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'特征代码：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_tezheng']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'权属：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_quanshu']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树龄：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_age']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'冠幅(东西)：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_dxguanfu']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'冠幅(南北)：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_nbguanfu']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树高：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_height']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'胸径：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_xiongjing']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'海拔：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_hb']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡向：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_poxiang']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡度：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_podu']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡位：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_powei']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'生长势：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_state']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'生长环境：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_environment']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'管护单位：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_prodanwei']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'管护人：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_proman']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'备注：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_note']."</div>'+
    														'<div style='+'width:100px;height:20px;float:left;'+'></div>'
    												+'</div>'
    											+'</div>';
    			    
    						var crediv = document.getElementById('crediv');";
    			        foreach( $protect_note_filter[$k] as $kk=>$vv){
    			            echo "
    			    
    							crediv.innerHTML += '<div class='+'protnote'+' style='+'width:350px;clear:both;display:none;'+'>'+
    														'<div class='+'prot_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;margin:auto;margin-top:20px;'+'>'+'维护记录".($kk+1)."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'编号：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_areaID']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护原因：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_reason']."</div>'+
    														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护结果：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_result']."</div>'+
    														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护时间：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_time']."</div>'+
    														'<div class='+'empty'+' style='+'width:350px;height:30px;float:left;'+'></div>'
    		
    												+'</div>';";
    			        }
    			    
    			        echo "
    						crediv.innerHTML += '<div id='+'story'+' style='+'width:350px;clear:both;display:none;'+'>'+
    													'<div class='+'base_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;margin:auto;margin-top:20px;'+'>'+'古树故事'+'</div>'+
    													'<div class='+'base_content1'+' style='+'width:330px;height:auto;color:#000;float:left;padding:10px;'+'>".$v['msg_story']."</div>'
    											+'</div>';";
    			        foreach( $pic_filter[$k] as $vv){
    			            echo "
    			    
    			    
    			    
    							crediv.innerHTML += '<div class='+'pic'+' style='+'width:350px;clear:both;display:none;'+'>'+
    														'<img class='+'image'+' src=".$vv['pic_path']." style='+'width:330px;height:auto;color:#000;float:left;padding:10px;'+'/>'
    												+'</div>';";
    			        }
    			        echo "
    			    
    						document.getElementById('crediv1').style.border='1px #000 solid';
    						document.getElementById('crediv1').style.margin='20px auto';
    			
    			    
    						$('.base_title').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
    						$('.base_content1').css('background','url(".$pe['host_tpl']."images/bg_title2.png)');
    						$('.base_content2').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
    						$('.prot_title').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
    						$('.protnote').css('margin','auto');
    						$('#story').css('margin','auto');
    						$('.pic').css('margin','20px auto');
    						$('.empty').css('background','url(".$pe['host_tpl']."images/mbanner.png)');
    					});  " ;
    			    }
    			    echo "})()
    			}";
			}else {		
		 echo
			"showall();
			function showall(){
				map.clearOverlays(); 
				(function(){";					
				foreach( $allmessage as $k=>$v){
					echo "
					var point = new BMap.Point(".$v['msg_jingdu'].", ".$v['msg_weidu'].");					
					var icon = new BMap.Icon('".$pe['host_tpl']."images/marker.png', new BMap.Size(28, 28), {//是引用图标的名字以及大小，注意大小要一样
						anchor: new BMap.Size(14, 28),//这句表示图片相对于所加的点的位置
						infoWindowAnchor: new BMap.Size(14, 0)
					});
					var label = new BMap.Label('".$v['msg_name']."',{'offset':new BMap.Size(-10,-33)});
					label.setStyle({                     //给label设置样式，任意的CSS都是可以的
						color:'#fff',                   //颜色
						fontSize:'10px',               //字号
						fontFamily:'微软雅黑',
						//border:'1px red solid',                    //边
						padding:'5px',
						backgroundColor:'#f04854',
						textAlign:'center',            //文字水平居中显示
						lineHeight:'15px',
						cursor:'pointer'
					});
												
					 var marker = new BMap.Marker(point,{ icon: icon });
					 marker.setLabel(label);  
					 map.addOverlay(marker);  
					 label.addEventListener('click', function(){  
					    $('#info').css('display','none');
					    $('#infobtn').css('marginTop','0px');
					    show = true;
						var parent = document.getElementById('mright');
						if(document.getElementById('crediv')){
							var divboxs = document.getElementById('crediv');
							parent.removeChild(divboxs);
						}
						parent.innerHTML = '<div id='+'crediv'+' style='+'width:420px;'+'>'+
												'<div id='+'crediv1'+' style='+'width:350px;'+'>'+
													'<div class='+'base_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;'+'>'+'基本情况'+'</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'调查号：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_number']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'古树编号：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_areaID']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树种名：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_name']."</div>'+														
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'地址：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;cursor:pointer;'+' onclick='+'center(this);'+'>".$v['msg_address']."<span hidden>|".$v['msg_jingdu']."|".$v['msg_weidu']."|</span></div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'纬度：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_weidu']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'经度：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_jingdu']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'特征代码：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_tezheng']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'权属：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_quanshu']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树龄：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_age']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'冠幅(东西)：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_dxguanfu']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'冠幅(南北)：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_nbguanfu']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树高：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_height']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'胸径：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_xiongjing']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'海拔：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_hb']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡向：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_poxiang']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡度：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_podu']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡位：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_powei']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'生长势：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_state']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'生长环境：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_environment']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'管护单位：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_prodanwei']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'管护人：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_proman']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'备注：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_note']."</div>'+
														'<div style='+'width:100px;height:20px;float:left;'+'></div>'										
												+'</div>'	
											+'</div>';									
						
						var crediv = document.getElementById('crediv');";					
						foreach( $protect_note_all[$k] as $kk=>$vv){
							echo "
						
							crediv.innerHTML += '<div class='+'protnote'+' style='+'width:350px;clear:both;display:none;'+'>'+
														'<div class='+'prot_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;margin:auto;margin-top:20px;'+'>'+'维护记录".($kk+1)."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'古树编号：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_areaID']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护原因：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_reason']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护结果：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_result']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护时间：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_time']."</div>'+											
														'<div class='+'empty'+' style='+'width:350px;height:30px;float:left;'+'></div>'	
			
												+'</div>';";	
						}
						
						echo "			
						crediv.innerHTML += '<div id='+'story'+' style='+'width:350px;clear:both;display:none;'+'>'+
													'<div class='+'base_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;margin:auto;margin-top:20px;'+'>'+'古树故事'+'</div>'+
													'<div class='+'base_content1'+' style='+'width:330px;height:auto;color:#000;float:left;padding:10px;'+'>".$v['msg_story']."</div>'
											+'</div>';";					
						foreach( $pic_all[$k] as $vv){
							echo "
						
						
										
							crediv.innerHTML += '<div class='+'pic'+' style='+'width:350px;clear:both;display:none;'+'>'+
														'<img class='+'image'+' src=".$vv['pic_path']." style='+'width:330px;height:auto;color:#000;float:left;padding:10px;'+'/>'
												+'</div>';";
						}
						echo "
						
						document.getElementById('crediv1').style.border='1px #000 solid';
						document.getElementById('crediv1').style.margin='20px auto';
					
						
						$('.base_title').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
						$('.base_content1').css('background','url(".$pe['host_tpl']."images/bg_title2.png)');
						$('.base_content2').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
						$('.prot_title').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
						$('.protnote').css('margin','auto');
						$('#story').css('margin','auto');
						$('.pic').css('margin','20px auto');
						$('.empty').css('background','url(".$pe['host_tpl']."images/mbanner.png)');
					});  
					 marker.addEventListener('click', function(){ 
						$('#info').css('display','none');
					    $('#infobtn').css('marginTop','0px');
					    show = true; 
						var parent = document.getElementById('mright');
						if(document.getElementById('crediv')){
							var divboxs = document.getElementById('crediv');
							parent.removeChild(divboxs);
						}
						parent.innerHTML = '<div id='+'crediv'+' style='+'width:420px;'+'>'+
												'<div id='+'crediv1'+' style='+'width:350px;'+'>'+
													'<div class='+'base_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;'+'>'+'基本情况'+'</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'调查号：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_number']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'古树编号：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_areaID']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树种名：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_name']."</div>'+														
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'地址：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;cursor:pointer;'+' onclick='+'center(this);'+'>".$v['msg_address']."<span hidden>|".$v['msg_jingdu']."|".$v['msg_weidu']."|</span></div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'纬度：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_weidu']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'经度：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_jingdu']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'特征代码：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_tezheng']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'权属：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_quanshu']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树龄：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_age']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'冠幅(东西)：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_dxguanfu']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'冠幅(南北)：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_nbguanfu']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树高：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_height']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'胸径：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_xiongjing']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'海拔：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_hb']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡向：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_poxiang']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡度：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_podu']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡位：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_powei']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'生长势：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_state']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'生长环境：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_environment']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'管护单位：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_prodanwei']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'管护人：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_proman']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'备注：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_note']."</div>'+
														'<div style='+'width:100px;height:20px;float:left;'+'></div>'										
												+'</div>'	
											+'</div>';									
						
						var crediv = document.getElementById('crediv');";					
						foreach( $protect_note_all[$k] as $kk=>$vv){
							echo "
						
							crediv.innerHTML += '<div class='+'protnote'+' style='+'width:350px;clear:both;display:none;'+'>'+
														'<div class='+'prot_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;margin:auto;margin-top:20px;'+'>'+'维护记录".($kk+1)."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'编号：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$v['msg_areaID']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护原因：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_reason']."</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护结果：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_result']."</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护时间：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>".$vv['prot_time']."</div>'+											
														'<div class='+'empty'+' style='+'width:350px;height:30px;float:left;'+'></div>'	
			
												+'</div>';";	
						}
						
						echo "			
						crediv.innerHTML += '<div id='+'story'+' style='+'width:350px;clear:both;display:none;'+'>'+
													'<div class='+'base_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;margin:auto;margin-top:20px;'+'>'+'古树故事'+'</div>'+
													'<div class='+'base_content1'+' style='+'width:330px;height:auto;color:#000;float:left;padding:10px;'+'>".$v['msg_story']."</div>'
											+'</div>';";					
						foreach( $pic_all[$k] as $vv){
							echo "
						
						
										
							crediv.innerHTML += '<div class='+'pic'+' style='+'width:350px;clear:both;display:none;'+'>'+
														'<img class='+'image'+' src=".$vv['pic_path']." style='+'width:330px;height:auto;color:#000;float:left;padding:10px;'+'/>'
												+'</div>';";
						}
						echo "
						
						document.getElementById('crediv1').style.border='1px #000 solid';
						document.getElementById('crediv1').style.margin='20px auto';
					
						
						$('.base_title').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
						$('.base_content1').css('background','url(".$pe['host_tpl']."images/bg_title2.png)');
						$('.base_content2').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
						$('.prot_title').css('background','url(".$pe['host_tpl']."images/bg_title.png)');
						$('.protnote').css('margin','auto');
						$('#story').css('margin','auto');
						$('.pic').css('margin','20px auto');
						$('.empty').css('background','url(".$pe['host_tpl']."images/mbanner.png)');
					});  " ;	
				}					
				echo "})()
			}";
			}
		?>