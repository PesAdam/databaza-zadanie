<?php
include "inc/config.php";
// include "inc/functions.php";
include "partials/header.php";
// include "partials/sidebar.php";
?>


<div class="span-9">
	<h1>Moje produkty!</h1>
	<div class="container">
		<ul class="items">
			<?php
			$sql = "SELECT nazov, autor, cena, obrazok FROM `knihy` LIMIT 25,24;";
			$products = $DB->prepare($sql);
			$products->execute();
			$index_products = $products->fetchAll(PDO::FETCH_OBJ);
			foreach ($index_products as $pkt) {
			?>
				<li class="item">
					<div class="card">
						<a class="card-img" href="produkt_detail.php?produkt=<?= $pkt->nazov ?>">
							<img src='<?= $pkt->obrazok ?>' alt="<?= $pkt->nazov ?>" />
						</a>
						<div class="card-inf">
							<h5 class="card-name">
								<a href="produkt_detail.php?produkt=<?= $pkt->nazov ?>"><?= $pkt->nazov ?></a>
							</h5>
							<div class="card-buy">

								<a class="red" href="produkt_detail.php?produkt=<?= $pkt->nazov ?>">
									<?= $pkt->cena ?>€
								</a>
								<a class="blue" href="#">
									Pridať do košíka
								</a>
							</div>
						</div>
					</div>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php
?>