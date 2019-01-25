<?php

include("classes/DomDocumentParser.php");

function followLinks($url) {
    $parser = new DomDocumentParser($url);

    $linkList = $parser->getLinks();

    foreach($linkList as $link) {
        $href = $link->getAttribute("href");

        if(strpos($href, "#") !== false) {
            continue;
        }
        else if(substr($href, 0, 11) == "javascript:") {
            continue;
        }
        else if(substr($href, 0, 7) == "mailto:") {
            continue;
        }

        echo $href."<br>";
    }
}

$url = "https://mahmudul-hasan-sreejon.github.io/";
followLinks($url);

?>
