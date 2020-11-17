<?php

class GutenbergCrawler
{

    private $url;
    private $proxy;
    private $dom;
    private $html;

    public function __construct()
    {
        $this->url = 'http://gutenberg.org/';
        $this->proxy = '10.1.21.254:3128';
        $this->dom = new DOMDocument();
    }

    public function getParagrafos()
    {
        $this->carregarHtml();
        $divsGeral = $this->capturarTagsDivGeral();
        $divsInternas = $this->capturarDivsInternasPageContent($divsGeral);
        $tagsP = $this->capturarTagsP($divsInternas);
        $paragrafos = $this->getArrayParagrafos($tagsP);

        return $paragrafos;
    }

    private function getContextConexao()
    {
        $arrayConfig = array(
            'http' => array(
                'proxy' => $this->proxy,
                'request_fulluri' => true
            ),
            'https' => array(
                'proxy' => $this->proxy,
                'request_fulluri' => true
            )
        );
        $context = stream_context_create($arrayConfig);
        return $context;

    }

    private function carregarHtml()
    {
        $context = $this->getContextConexao();
        $this->html = file_get_contents($this->url, false, $context);

        libxml_use_internal_errors(true);

        $this->dom->loadHTML($this->html);
        libxml_clear_errors();
    }

    private function capturarTagsDivGeral()
    {
        $tagsDiv = $this->dom->getElementsByTagName('div');
        return $tagsDiv;
    }

    private function capturarDivsInternasPageContent($divsGeral)
    {
        $divsInternas = null;
        foreach ($divsGeral as $div) {
            $classeInterna = $div->getAttribute('class');

            if ($classeInterna == 'page_content') {
                $divsInternas = $div->getElementsByTagName('div');
                break;
            }
        }
        return $divsInternas;
    }

    private function capturarTagsP($divsInternas)
    {
        foreach ($divsInternas as $divInterna) {
            $classeInterna = $divInterna->getAttribute('class');

            if ($classeInterna == 'box_announce') {
                $tagsP = $divInterna->getElementsByTagName('p');
            }
        }
        return $tagsP;
    }

    private function getArrayParagrafos($tagsP)
    {
        foreach ($tagsP as $PInterno) {
            $arrayParagrafos[] = $PInterno->nodeValue;
        }

        return $arrayParagrafos;
    }
}
