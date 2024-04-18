<?php
	include "inc/config.php";
	// include "inc/functions.php"; // Uistite sa, že tento súbor je správne zapojený.
	$routes = [	
		'/' => [
		  'GET' =>  'partials/home.php'
		],
		'/produkty' => [
			'GET' => 'produkty.php',
		],

		'/produkt' => [
			'GET' => 'produkt_detail.php'
		],
	];
	
	$page = "/" . segment(1); // Prvý segment po doménovej časti
	$method = $_SERVER['REQUEST_METHOD'];
	// var_dump($page);
	
	if (!isset($routes[$page][$method])) {
		show_404();
	} else {
		require $routes[$page][$method];
	}

	include "partials/footer.php";
?>

