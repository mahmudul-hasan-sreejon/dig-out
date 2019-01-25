<?php

class DomDocumentParser {
    public function __construct($url) {
        $options = array(
            "https"=>array("method"=>"GET", "header"=>"User-Agent: digOutBot/0.1\n"),
        );
    }
}

?>
