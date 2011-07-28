<?php

require 'facebook/facebook.php';

/**
 * Classe proxy para o sdk padrão do Facebook
 */
class FB {

	private static function handler() {
		static $handler;
		if (!is_object($handler)) {
			$data = array(
				'appId' => APP_ID,
				'secret' => APP_SECRET,
				'cookie' => true,
			);
			$handler = new Facebook($data);
		}
		return $handler;
	}
	
	/**
	 * Inicializa a sessão do facebook.
	 * Verifica se o app tem as permissões do usuário. Caso não tenha,
	 * redireciona para a página de permissões, com as permissões setadas
	 * no cfg/app.config.php
	 */
	public static function init() {
		$fb = self::handler();
		if (!$fb->getUser()) {
			try {
				$user = $fb->api('/me');
			} catch (FacebookApiException $e) {
				View::html('permissions');
				exit;
			}
		}
		return true;
	}

}