<?php
	$urlPath = $_SERVER['REQUEST_URI'];
	if (preg_match('/\/produkt\/([^\/]+)/', $urlPath, $matches)) {		
		$k3= $matches[1]; // Obsah za /produkty/
		$k2 = urldecode($k3);
		$u_p_slug = str_replace('-', ' ', $k2); 
		// var_dump($u_p_slug);
	}
		// var_dump($urlPath);
		// Použitie slugu pre bezpečnejšie vyhľadávanie
		// $sql = "SELECT nazov, autor, kategoria, informacieoknihe, cena, obrazok FROM `knihy` WHERE slug = :slug LIMIT 1";
		
	if($u_p_slug){
		$sql = "SELECT nazov, autor, kategoria, informacieoknihe, cena, obrazok FROM `knihy` WHERE nazov='$u_p_slug' LIMIT 1";
		// var_dump($sql);
		$produkt = $DB->prepare($sql);
		// $produkt->bindParam(':slug', $u_p_slug, PDO::PARAM_STR);
		$produkt->execute();
		$zvoleny_produkt = $produkt->fetchAll(PDO::FETCH_OBJ);
	
		if (empty($zvoleny_produkt)) {
			echo "Produkt nebol nájdený.";
		} else {
			// echo $zvoleny_produkt;
		}
	} else {

	}
	

	include "partials/header.php";
?>
<title>Kniha | <?= $u_p_slug ?></title>
<main class="main-page">
	<h1 class="nadpis">Kniha: <?= $u_p_slug ?></h1>
	<div class="product">
		<div class="product-path">
			<ul>
				<li><a href="/">Domov</a><span>   /</span></li>
				<li><a href="produkty.php?p_n=1&k1=<?= $zvoleny_produkt[0]->kategoria ?>"><?= $zvoleny_produkt[0]->kategoria ?></a><span>   /</span></li>
				<li class="active"><p><?= $zvoleny_produkt[0]->nazov ?></p></li>
			</ul>	
		</div>
		
		<div class="product-details">
			<?php 
				foreach ($zvoleny_produkt as $produktik) {
				?> 
				<div class="span-3">
					<a href="" title="">
						<img src="<?= $produktik->obrazok ?>" style="width:100%" alt="<?= $produktik->nazov ?>"/>
					</a>
					
				</div>
				<div class="span-6">
						<h1><?= $produktik->nazov ?></h1>
						<?= $produktik->informacieoknihe ?>
						<div class="">
							<p class="price"><?= $produktik->cena ?>€</p>
							<button type="" class=""> Pridať do košíka</button>
						</div>
				</div>
				<?php	}?>
		</div>
	</div>
<?php
	// include "partials/footer.php";

?>