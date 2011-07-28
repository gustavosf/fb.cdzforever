<html>
	<head>
		<title>CDZForever</title>
		<link rel='stylesheet' href='<?php echo BASE_URI; ?>css/style.css'>
	</head>
	<body>
		<div id='fb-root'>
			<div class="quote">
				<?php echo $quote; ?><br/><br/>
				<a href='#' onclick='postIt()'>Postar essa porra no meu mural</a>
			</div>
		</div>
		<script src='http://connect.facebook.net/en_US/all.js'></script>
		<script>
			FB.init({ 
				appId:'<?php echo APP_ID; ?>',
				cookie:true, 
				status:true,
				xfbml:true 
			});
			var postIt = function() {
				FB.ui({
					method: 'feed',
					description: '<b><?php echo $quote; ?></b>',
					link: '<?php echo APP_CANVAS; ?>',
					picture: 'http://fb.cdzforever.net/img/seiya.jpg',
					name: 'CDZForever',
					caption: 'Frases dos Cavaleiros do Zodíaco'
				}, function(resp) {
					if (resp) {
						window.top.location = 'http://www.facebook.com/'
							+ resp.post_id.replace('_', '/posts/');
					}
					else {
						window.location.reload();
					}
				});
			};
		</script>
	</body>
</html> 
