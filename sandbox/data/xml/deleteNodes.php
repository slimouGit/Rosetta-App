<?php

$doc = new DOMDocument;
$doc->load('MOKKA_df_008_.xml');

$book = $doc->documentElement;

// we retrieve the chapter and remove it from the book
$chapter = $book->getElementsByTagName('entry')->item(0);
$oldchapter = $book->removeChild($chapter);

echo $doc->saveXML();
?>