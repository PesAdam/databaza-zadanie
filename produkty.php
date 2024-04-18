<?php	
	$urlPath = $_SERVER['REQUEST_URI'];
	if (preg_match('/\/produkty\/([^\/]+)/', $urlPath, $matches)) {		
		$k3= $matches[1]; // Obsah za /produkty/
		$k2 = urldecode($k3);
		$k1 = str_replace('-', ' ', $k2); 
	} else {
		$k1 = null; // Nie je nájdené
	}
	$pagenum = $_GET['p_n'];

	// include "inc/config.php";
	include "partials/header.php";
	

?>
<div class="span-9">
	<h1>Naše produkty</h1>
	<?php include "partials/sidebar.php"; ?>
	<!-- <div class="container"> -->
		<ul class="items">
			<?php 
				$sql = "SELECT COUNT(kategoria) AS NumberOfProducts FROM knihy WHERE kategoria ='$k1';";
				// var_dump($sql);
				$countProducts = $DB->prepare($sql);
				$countProducts->execute();
				$countPro = $countProducts->fetchAll(PDO::FETCH_OBJ);
				// var_dump($countPro);
				foreach ($countPro as $count) {
					$numberOfProducts = $count->NumberOfProducts;
				}
				$selectitems = $pagenum * 24 - 24;
				$sql = "SELECT nazov, autor, cena, obrazok FROM `knihy` WHERE kategoria ='$k1'";
				$products = $DB->prepare($sql);
				$products->execute();
				$index_products = $products->fetchAll(PDO::FETCH_OBJ);
				foreach ($index_products as $pkt) {
					$pkt_url = urldecode($pkt->nazov);
					$pkt_pretty = str_replace(' ', '-', $pkt_url); 
			?>
					<li class="item">
						<div class="card">
							<a class="card-img" href="/produkt/<?= $pkt_pretty ?>">
								<img  src='<?= $pkt->obrazok ?>' alt="<?= $pkt->nazov ?>"/>
							</a>
							<div class="card-inf">
								<h5 class="card-name">
									<a href="/produkt/<?= $pkt->nazov ?>"><?= $pkt->nazov ?></a>
								</h5>
								<div class="card-buy">
									<a class="red" href="/produkt/<?= $pkt->nazov ?>"><?= $pkt->cena ?>€</a>
									<a class="blue" href="#">Pridať do košíka</a>
								</div>
							</div>
						</div>
					</li>
				<?php } ?>
			</ul>
		<!-- </div> -->
		<div class="pagi">
			<?php if ($pagenum > 1) { ?>
				<a class="pagiBtn" id="previous" href="produkty.php?p_n=<?= $pagenum - 1?>&k1=<?=$k1?>">Predošlá strana</a>
			<?php } ?>
			<a class="pagiBtn" id="next" href="produkty.php?p_n=<?= $pagenum + 1?>&k1=<?=$k1?>">Nasledujúca strana</a>
		</div>
	</div>
<?php include "partials/footer.php";?> 

<script>
  const pagenum = <?php echo $pagenum; ?>;
  window.onload = function() {
    const previousItem = document.getElementById('previous');
    
  };

  const numberOfProducts = <?php echo $numberOfProducts; ?>;
  if (numberOfProducts <= pagenum * 24) {
	document.getElementById('next').classList.add('block');
  }
</script>