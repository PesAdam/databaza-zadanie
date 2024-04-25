<?php 


// $DB->prepare("CREATE TABLE IF NOT EXISTS knihy1 LIKE vzorova")->execute();
// $DB->prepare("CREATE TABLE IF NOT EXISTS knihy LIKE vzorova")->execute();
// $DB->prepare("TRUNCATE TABLE knihy1")->execute();

// function xmlInsert($DB, $xmlFile, $kategoria) {

//     $xml = simplexml_load_file($xmlFile);
//     foreach ($xml->channel->item as $item) {
//         $nazov = $item->title;
//         $autor = $item->author;
//         $informacieoknihe = $item->description;
//         $cena = $item->price;
//         $obrazok = $item->enclosure['url'];
//         $urlnazov = preg_replace('/[^a-zA-Z0-9\s]/', '', $nazov);;

//         $stmt = $DB->prepare("INSERT INTO knihy1 (nazov, autor, informacieoknihe, cena, obrazok, kategoria, urlnazov) 
//                              VALUES (:nazov, :autor, :informacieoknihe, :cena, :obrazok, :kategoria, :urlnazov)");
//         $stmt->bindParam(':nazov', $nazov);
//         $stmt->bindParam(':autor', $autor);
//         $stmt->bindParam(':informacieoknihe', $informacieoknihe);
//         $stmt->bindParam(':cena', $cena);
//         $stmt->bindParam(':obrazok', $obrazok);
//         $stmt->bindParam(':kategoria', $kategoria);
//         $stmt->bindParam(':urlnazov', $urlnazov);
//         $stmt->execute();
//     }
// }

function nazovNaSlug($nazov) {
    // Odstránenie špeciálnych znakov, diakritiky, zmena na malé písmená a nahradenie medzier pomlčkami
    $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $nazov);
    $slug = preg_replace('/[^a-zA-Z0-9 -]/', '', $slug);
    $slug = strtolower(trim($slug, '-'));
    $slug = preg_replace('/[ -]+/', '-', $slug);
    return $slug;
}

function get_segments(){
    $current_url = 'http' . (isset($_SERVER[ 'HTTPS' ]) == 'on'  ? 's://' : '://') .
    $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $path = str_replace( BASE_URL, ' ', $current_url);
    $path = trim(parse_url($path, PHP_URL_PATH), '/');
    $segment = explode('/' , $path);

    return $segment;
}

function segment($index){
    $segment = get_segments();
    return isset ($segment[ $index - 1]) ? $segment[$index - 1] : false;
}

function show_404 (){   
    header("HTTP/1.0 404 Not Found");
    include_once "partials/404.php";
    die();

}

// xmlInsert($DB, 'http://export.martinus.sk/?a=XmlPartner&cat=6414&q=&z=B7GET5&key=NYtvbkOHAzPzGJNz7qR9Kk', "Učebnice pre stredné školy");
// xmlInsert($DB, 'http://export.martinus.sk/?a=XmlPartner&cat=6768&q=&z=B7GET5&key=NYtvbkOHAzPzGJNz7qR9Kk', "Učebnice pre autoškoly");
// xmlInsert($DB, 'http://export.martinus.sk/?a=XmlPartner&cat=6764&q=&z=B7GET5&key=NYtvbkOHAzPzGJNz7qR9Kk', "Učebnice pre vysoké školy");
// xmlInsert($DB, 'http://export.martinus.sk/?a=XmlPartner&cat=6408&q=&z=B7GET5&key=NYtvbkOHAzPzGJNz7qR9Kk', "Knihy o programovaní");
// xmlInsert($DB, 'http://export.martinus.sk/?a=XmlPartner&cat=6406&q=&z=B7GET5&key=NYtvbkOHAzPzGJNz7qR9Kk', "Knihy o tvorbe webu");
// xmlInsert($DB, 'http://export.martinus.sk/?a=XmlPartner&cat=6414&q=&z=B7GET5&key=NYtvbkOHAzPzGJNz7qR9Kk', "Knihy o databázach");

// $DB->prepare("CREATE TABLE IF NOT EXISTS knihy2 LIKE vzorova")->execute();
// $DB->prepare("TRUNCATE TABLE knihy2")->execute();
// $DB->prepare("INSERT INTO knihy2 SELECT * FROM knihy1")->execute();
// $DB->prepare("DROP TABLE knihy1")->execute();
// $DB->prepare("ALTER TABLE knihy2 ENGINE = INNODB")->execute();
// $DB->prepare("START TRANSACTION")->execute();
// $DB->prepare("DROP TABLE knihy")->execute();
// $DB->prepare("ALTER TABLE knihy2 RENAME TO knihy")->execute();
// $DB->prepare("COMMIT")->execute();
