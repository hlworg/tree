function showpoi(obj,id){
		<?php echo 
			"showdate(id);
            $('#info').css('display','none');
		    $('#infobtn').css('marginTop','0px');
		    show = true;
			strs=poidate.split('|'); 
			var point = new BMap.Point(strs[1], strs[2]);	
			var map = new BMap.Map('container');          // 创建地图实例 
			map.centerAndZoom(point, 16);                 // 初始化地图，设置中心点坐标和地图级别
			map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
			map.setCurrentCity('梅州');          // 设置地图显示的城市 此项是必须设置的
			map.enableScrollWheelZoom(true);    //缩略地图控件 右下角      //   地图类型控件，默认位于地图右上方。
			// 覆盖区域图层测试
			//map.addTileLayer(new BMap.PanoramaCoverageLayer());
			
			var stCtrl = new BMap.PanoramaControl(); //构造全景控件
			stCtrl.setOffset(new BMap.Size(150, 10));
			map.addControl(stCtrl); //添加全景控件 
			
			var opts = {type: BMAP_NAVIGATION_CONTROL_LARGE}    
			map.addControl(new BMap.NavigationControl(opts)); 
			map.clearOverlays(); 
							
			var icon = new BMap.Icon('".$pe['host_tpl']."images/marker.png', new BMap.Size(28, 28), {//是引用图标的名字以及大小，注意大小要一样
				anchor: new BMap.Size(14, 28),//这句表示图片相对于所加的点的位置
				infoWindowAnchor: new BMap.Size(14, 0)
			});
			var label = new BMap.Label(strs[5],{'offset':new BMap.Size(-10,-33)});
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
			 });
			 marker.addEventListener('click', function(){ 
			    $('#info').css('display','none');
			    $('#infobtn').css('marginTop','0px');
			    show = true; 
			 });
			    
			var parent = document.getElementById('mright');
			if(document.getElementById('crediv')){
				var divboxs = document.getElementById('crediv');
				parent.removeChild(divboxs);
			}
			parent.innerHTML = '<div id='+'crediv'+' style='+'width:420px;'+'>'+
									'<div id='+'crediv1'+' style='+'width:350px;'+'>'+
										'<div class='+'base_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;'+'>'+'基本情况'+'</div>'+
											'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'调查号：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[3]+'</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'古树编号：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[4]+'</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树种名：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[5]+'</div>'+														
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'地址：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;cursor:pointer;'+' onclick='+'center(this);'+'>'+strs[6]+'<span hidden>|'+strs[1]+'|'+strs[2]+'|</span></div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'纬度：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[2]+'</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'经度：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[1]+'</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'特征代码：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[7]+'</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'权属：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[8]+'</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树龄：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[9]+'</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'冠幅(东西)：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[10]+'</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'冠幅(南北)：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[11]+'</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'树高：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[12]+'</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'胸径：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[13]+'</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'海拔：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[14]+'</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡向：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[15]+'</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡度：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[16]+'</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'坡位：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[17]+'</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'生长势：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[18]+'</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'生长环境：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[19]+'</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'管护单位：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[21]+'</div>'+
														'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'管护人：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[22]+'</div>'+
														'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'备注：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[24]+'</div>'+
			    							'<div style='+'width:100px;height:20px;float:left;'+'></div>'			
									+'</div>'			                         
								+'</div>';									
			
			var crediv = document.getElementById('crediv');
			var num = 26+strs[25]*1;
			for(var i = 26; i<num; i++){
				var protcontent = strs[i];
				protnote=protcontent.split('*'); 
				crediv.innerHTML += '<div class='+'protnote'+' style='+'width:350px;clear:both;display:none;'+'>'+
											'<div class='+'prot_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;margin:auto;margin-top:20px;'+'>'+'维护记录'+(i-25)+'</div>'+
											'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'编号：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+strs[4]+'</div>'+
											'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护原因：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+protnote[0]+'</div>'+
											'<div class='+'base_content1'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护结果：'+'</div>'+'<div class='+'base_content1'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+protnote[1]+'</div>'+
											'<div class='+'base_content2'+' style='+'width:100px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+'维护时间：'+'</div>'+'<div class='+'base_content2'+' style='+'width:250px;height:30px;line-height:30px;text-align:center;color:#000;float:left;'+'>'+protnote[2]+'</div>'+											
											'<div class='+'empty'+' style='+'width:350px;height:30px;float:left;'+'></div>'	

									+'</div>';	
			}
						
			crediv.innerHTML += '<div id='+'story'+' style='+'width:350px;clear:both;display:none;'+'>'+
										'<div class='+'base_title'+' style='+'width:350px;height:36px;line-height:36px;text-align:center;color:#fff;margin:auto;margin-top:20px;'+'>'+'古树故事'+'</div>'+
										'<div class='+'base_content1'+' style='+'width:330px;height:auto;color:#000;float:left;padding:10px;'+'>'+strs[20]+'</div>'
								+'</div>';	
			var picnum = num+strs[num]*1+1;
			for(var i = num+1; i<picnum; i++){
				var path = strs[i];				
				crediv.innerHTML += '<div class='+'pic'+' style='+'width:350px;clear:both;display:none;'+'>'+
											'<img class='+'image'+' src='+path+' style='+'width:330px;height:auto;color:#000;float:left;padding:10px;'+'/>'
									+'</div>';	
			}
			
			
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
			 ";
			
		?>
	}