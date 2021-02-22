<?php 
class DomDocumentParser {

	private $doc;

	public function __construct($url) {
		$options = array(
			'http'=>array('method'=>"GET", 'header'=>"User-Agent: ChromeBot/0.1\n")
		);
		$context = stream_context_create($options);
		@$this->doc = new DomDocument('1.0', 'UTF-8');
		@$this->doc->loadHTML(file_get_contents($url, true, $context));
	} 

	public function getLyrics() {
		return $this->doc->getElementsByTagName("div");
	}

}

?>