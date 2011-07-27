<?php

/**
* Classe para puxar quotes de um resource qualquer
*/
class Quotes {

	public function __construct() {}

	/**
	 * Seleciona uma quote aleatoriamente
	 */
	public function getRandom() {
		$quote = $this->get('random', array('limit'=>1));
		return $quote[0];
	}

	/**
	 * Função privada para pegar quotes do banco de dados
	 */
	private function get($type, $opt = null) {
		$dbh =& DB::handler();
		$opt = (object)$opt;
		$params = array();
		
		switch ($type) {
			case 'random':
				$sql = 'SELECT * FROM frases ORDER BY RAND()';
				break;
			case 'specific':
				$sql = 'SELECT * FROM frases WHERE id=?';
				$params['id'] = $opt->id;
				break;
			default:
				$sql = 'SELECT * FROM frases';
				break;
		}

		if ($opt->limit) {
			$sql .= " LIMIT ".$opt->limit;
		}

		$sth = $dbh->prepare($sql);
		$sth->execute($params);
		return $sth->fetchAll();
	}
}