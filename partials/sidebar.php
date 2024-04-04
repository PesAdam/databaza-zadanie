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
				?>
					
					<li class="itemik sidebar"><a href="produkty.php?p_n=1&k1=<?php echo $kat->kategoria ?>"><?php echo $kat->kategoria ?></a>
						
					</li>
				<?php 
					if ($kat->kategoria != "Knihy o databázach") {
						echo "<hr>";
					}
				}  
				?>
			</ul>
        </div>
	