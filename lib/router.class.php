<?php

class Router {

    static private $routes = array(
        'GET'    => array(),
        'POST'   => array(),
        'DELETE' => array(),
        'UPDATE' => array()
    );

    // route public setters
	/** Funções auxiliares para cadastro de rotas
	 *
	 * string   route * rota descrita conforme padrão
	 * function fn    * callback para esta rota
	 */
    public static function get($route, $fn) {
        self::setRoute('GET', $route, $fn);
    }

    public static function post($route, $fn) {
        self::setRoute('POST', $route, $fn);
    }

    public static function delete($route, $fn) {
        self::setRoute('DELETE', $route, $fn);
    }

    public static function update($route, $fn) {
        self::setRoute('UPDATE', $route, $fn);
    }

    /** Função para armazenar rotas.
	 * Deve ser usado apenas pelos "setters"
	 * 
	 * string   method * Método roteado (get, post, delete ou update)
	 * string   route  * Rota a ser roteada :)
	 * function fn     * Callback para a rota supracitada
	 */
    private static function setRoute($method, $route, $fn) {
        $method = strtoupper($method);

        preg_match_all('/:([a-z]+)/i', $route, $vars);
        $vars = $vars[1];

        $route = preg_replace('/:[a-z]+/i', '([^\/]+)', addcslashes($route,'/'));

        self::$routes[$method][] = array(
            'route' => $route,
            'fn' => $fn,
            'vars' => $vars,
        );
    }

	/** Route Caller
	 * Função que chama uma determinada rota
	 *
	 * string method * Método usado na chamada
	 * string url    * Path chamado
	 */
    public static function route($method, $url) {
        $method = strtoupper($method);
        foreach (self::$routes[$method] as $route) {
            if (preg_match("/^{$route['route']}$/i", $url, $match)) {
				array_shift($match);
				if (sizeof($match)) 
	                $match = array_combine($route['vars'], $match);
				call_user_func_array($route['fn'], $match);
                return true;
            }
        }
        return false;
    }

}
