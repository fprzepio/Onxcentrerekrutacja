<?php

class Thesaurus {
    private $thesaurus;

    public function __construct($thesaurus) {
        $this->thesaurus = $thesaurus;
    }

    public function getSynonyms($word) {
        $synonyms = isset($this->thesaurus[$word]) ? $this->thesaurus[$word] : [];
        return json_encode(['word' => $word, 'synonyms' => $synonyms]);
    }
}

$thesaurus = new Thesaurus(array("market" => array("trade"), "small" => array("little", "compact")));

echo $thesaurus->getSynonyms("small"); // zwraca '{"word":"small","synonyms":["little", "compact"]}'
echo $thesaurus->getSynonyms("asleast"); // zwraca'{"word":"asleast","synonyms":[]}'

?>
