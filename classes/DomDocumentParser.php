<?php

class DomDocumentParser {
    public function __construct($url) {
        $options = array("https"=>array("method"=>"GET", "header"=>"User-Agent: digOutBot/0.1\n"));
        $context = stream_context_create($options);

        $doc = new DOMDocument();
        @$doc->loadHTML(file_get_contents($url, false, $context));
    }
}

?>
