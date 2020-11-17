<?php

require './util/MunicipioCrawler.php';

$gut = new Municipio();
$titulos = $gut->getTitulos();
$imagens = $gut->getSrcImagens();
$links = $gut->getLinks();

// print_r($titulos);
// print_r($imagens);
// print_r($links);