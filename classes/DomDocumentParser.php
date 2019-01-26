<?php

class DomDocumentParser {
    private $doc;

    public function __construct($url) {
        $options = array("https"=>array("method"=>"GET", "header"=>"User-Agent: digOutBot/0.1\n"));
        $context = stream_context_create($options);

        $this->doc = new DOMDocument();
        @$this->doc->loadHTML(file_get_contents($url, false, $context));
    }

    public function getLinks() {
        return $this->doc->getElementsByTagName("a");
    }

    public function getTitleTags() {
        return $this->doc->getElementsByTagName("title");
    }

    public function getMetaTags() {
        return $this->doc->getElementsByTagName("meta");
    }
}

?>
