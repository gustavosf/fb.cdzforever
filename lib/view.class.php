<?php

class View {
	public static function html($view, $params = null) {
		if ($params) extract($params);
		include VIEW_DIR.DS.$view.".php";
	}
}