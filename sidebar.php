<?php
	$sql = "SELECT DISTINCT kategoria FROM `knihy` ";
	$kategorie = $DB->prepare($sql);
	$kategorie->execute();
	$kategorie = $kategorie->fetchAll(PDO::FETCH_OBJ);
?>


<main class="main-page">
		<div class="container">
			<ul class="items-sidebar">
				<?php 
					foreach ($kategorie as $kat){
					$kategoria_encoded =  urldecode($kat->kategoria);
					$kategoria_pretty = str_replace(' ', '-', $kategoria_encoded); 
				?>
					<li class="itemik sidebar"><a href="/produkty/<?php echo $kategoria_pretty ?>"><?php echo $kat->kategoria ?></a></li>
					</li>
				<?php 
					if ($kat->kategoria != "Knihy o databázach") {
						echo "<hr>";
					}
				}  
				?>
			</ul>
			
				<div class="obrazok">
					<img class="obrazok" src="https://www.polygrafcentrum.sk/wp-content/uploads/2017/02/kniha_vazba_V8_tlac_polygraficke_centrum-470x353.jpg"/>
				</div>
        </div>
