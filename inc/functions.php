<?php 
include "inc/config.php";

function xmlInsert($DB, $xmlFile, $kategoria) {

    $xml = simplexml_load_file($xmlFile);
    foreach ($xml->channel->item as $item) {
        $nazov = $item->title;
        $autor = $item->author;
        $informacieoknihe = $item->description;
        $cena = $item->price;
        $obrazok = $item->enclosure['url'];

        $stmt = $DB->prepare("INSERT INTO knihy (nazov, autor, informacieoknihe, cena, obrazok, kategoria) 
                             VALUES (:nazov, :autor, :informacieoknihe, :cena, :obrazok, :kategoria)");
        $stmt->bindParam(':nazov', $nazov);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':informacieoknihe', $informacieoknihe);
        $stmt->bindParam(':cena', $cena);
        $stmt->bindParam(':obrazok', $obrazok);
        $stmt->bindParam(':kategoria', $kategoria);
        $stmt->execute();
    }
}

$delete = $DB->prepare("DELETE FROM knihy");
$delete->execute();

xmlInsert($DB, 'http://export.martinus.sk/?a=XmlPartner&cat=6414&q=&z=B7GET5&key=NYtvbkOHAzPzGJNz7qR9Kk', "Učebnice pre stredné školy");
xmlInsert($DB, 'http://export.martinus.sk/?a=XmlPartner&cat=6768&q=&z=B7GET5&key=NYtvbkOHAzPzGJNz7qR9Kk', "Učebnice pre autoškoly");
xmlInsert($DB, 'http://export.martinus.sk/?a=XmlPartner&cat=6764&q=&z=B7GET5&key=NYtvbkOHAzPzGJNz7qR9Kk', "Učebnice pre vysoké školy");
xmlInsert($DB, 'http://export.martinus.sk/?a=XmlPartner&cat=6408&q=&z=B7GET5&key=NYtvbkOHAzPzGJNz7qR9Kk', "Knihy o programovaní");
xmlInsert($DB, 'http://export.martinus.sk/?a=XmlPartner&cat=6406&q=&z=B7GET5&key=NYtvbkOHAzPzGJNz7qR9Kk', "Knihy o tvorbe webu");
xmlInsert($DB, 'http://export.martinus.sk/?a=XmlPartner&cat=6414&q=&z=B7GET5&key=NYtvbkOHAzPzGJNz7qR9Kk', "Knihy o databázach");

?>