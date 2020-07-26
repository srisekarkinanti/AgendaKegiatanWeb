
 <script>
 	$(document).ready(function(){
 		var url;
 		function check_reminder(){
 			url = "<?php echo site_url('admin/events/check_reminder') ?>";

 			$.ajax({
 				url : url,
 				method: "GET",
 				dataType : false,
 				success : function(data){
 					console.log(data)
 				},
 				error: function(data){
 					console.log(data)
 				}
 			})

 		}

 		function ganti_status(){
 			url = "<?php echo site_url('admin/events/ganti_status') ?>";
 			$.ajax({
 				url : url,
 				method: "GET",
 				dataType : false,
 				success : function(data){
 					console.log(data)
 				},
 				error: function(data){
 					console.log(data)
 				}
 			})
 		}
 		setInterval(function(){ 
 			check_reminder()
 			ganti_status()
 		}, 	1000);
 	})
 </script>