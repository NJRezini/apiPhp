<?php
require 'MunicipioCrawler.php';
require '../config/Conexao.php';

$Municipio = new Municipio();
$titulos = $Municipio->getTitulos();
$imagens = $Municipio->getSrcImagens();
$links = $Municipio->getLinks();


$titulosLength = count($titulos);
$conn = OpenCon();

for($i = 0; $i < $titulosLength; $i++){
    $titulos[$i] = utf8_decode($titulos[$i]);
    $compararTitulo = $conn->query("SELECT id FROM noticias WHERE name='$titulos[$i]'");
    if($compararTitulo->num_rows == 0){
        $result = $conn->query("INSERT INTO noticias (name, img_src, link) VALUES ('$titulos[$i]', '$imagens[$i]', '$links[$i]')");
        if (!$result) {
            die('Invalid query: ' . $conn->error);
        }
    }
}

CloseCon($conn);
