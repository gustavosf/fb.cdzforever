<?php

// Redireciona para a página do app no facebook
Router::get('redirect', function() {
	header('location:'.APP_CANVAS);
});

// dump do $_SERVER
Router::get('sinfo', function() {
	echo '<pre>';
	print_r($_SERVER);
});
