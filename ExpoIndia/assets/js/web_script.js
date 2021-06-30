			var client_ip=null;
			var http_referrer = document.location;
			var is_declined = false;				
				function getUserIP(onNewIP) { 
					var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
					var pc = new myPeerConnection({
						iceServers: []
					}),
					noop = function() {},
					localIPs = {},
					ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,
					key;
				
					function iterateIP(ip) {
						if (!localIPs[ip]) onNewIP(ip);
						localIPs[ip] = true;
					}
				
					pc.createDataChannel("");
				
					pc.createOffer(function(sdp) {
						sdp.sdp.split('\n').forEach(function(line) {
							if (line.indexOf('candidate') < 0) return;
							line.match(ipRegex).forEach(iterateIP);
						});
						
						pc.setLocalDescription(sdp, noop, noop);
					}, noop); 
				
					pc.onicecandidate = function(ice) {
						if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
						ice.candidate.candidate.match(ipRegex).forEach(iterateIP);
					};
				}
				getUserIP(function(ip){
					var ipaddress = ip;
					client_ip = ipaddress;
				
				});
						
				/***********************************************************/
				
				
				function get_data()
				{
												
						function gethttpobject() 
						{
							if(window.ActiveXObject)
							{
								return new ActiveXObject("Microsoft.XMLHTTP");
							}else if(window.XMLHttpRequest)
							{
								return new XMLHttpRequest();
							}else
							{
								return null;
							}
						}
			
						function setoutput()
						{
				
							if (httpobject.readyState == 4)
							{
								//console.log(httpobject.responseText);
								 //alert(httpobject.responseText);
								
							}
						}
						
						var url ="http://localhost/ExpoIndia/index.php/Home/count?user_ip="+client_ip;
								
									httpobject=gethttpobject();
											
									if(httpobject != null)
									{
										httpobject.open("POST",url,true);
										httpobject.send(null);
										httpobject.onreadystatechange=setoutput;
									}
						
						
					if(is_declined==true){
						
					}
				 }
				 setTimeout(function(){	
				 	get_data();	
				 },1000);