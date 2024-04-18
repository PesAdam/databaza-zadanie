<?php
include "partials/header.php";
?>
<div class="span-9">        
    <h2>Naše produkty</h2>
    <?php include "partials/sidebar.php"; ?>
    <h2>Výpredaj!</h2>
    <p>
        Aktuálne prebieha vianočna akcia! Všetky produkty sú zľavnené o 10%!
    </p>
    <h3>Toto sú naše top produkty!</h3>
    <ul class="items">
        <?php
            $sql = "SELECT nazov, autor, cena, obrazok FROM `knihy` LIMIT 25,24;";
            $products = $DB->prepare($sql);
            $products->execute();
            $index_products = $products->fetchAll(PDO::FETCH_OBJ);
            foreach ($index_products as $pkt) {
                $urlNazov = urlencode($pkt->nazov); 
        ?>
            <li class="item">
                <div class="card">
                    <a class="card-img" href="/produkt/<?= $urlNazov ?>">
                        <img src='<?= $pkt->obrazok ?>' alt="<?= $pkt->nazov ?>"/>
                    </a>
                    <div class="card-inf">
                        <h5 class="card-name">
                            <a href="/produkt/<?= $urlNazov ?>"><?= $pkt->nazov ?></a>
                        </h5>
                        <div class="card-buy">
                            <a class="red" href="/produkt/<?= $urlNazov ?>">
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

    <?php include 'partials/footer' ?>