<?php

include("classes/DomDocumentParser.php");

function followLinks($url) {
    $parser = new DomDocumentParser($url);
}

$url = "https://www.sreejon.com";
followLinks($url);

?>
