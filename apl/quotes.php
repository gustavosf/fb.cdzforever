<?php

// Retorna um quote randômico
Router::get('quotes', function() {
	$q = new Quotes();
	$quote = $q->getRandom();
	View::html('quote', array(
		'quote' => $quote->frase,
	));
});

// facebook usa requisições em POST :(
Router::post('quotes', function() {
	$q = new Quotes();
	$quote = $q->getRandom();
	View::html('quote', array(
		'quote' => $quote->frase,
	));
});