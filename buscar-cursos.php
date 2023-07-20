<?php

require 'vendor/autoload.php';
//Guzzle: realizar requisições HTTP
use GuzzleHttp\Client;

//DomCrawler: ler o HTML
use Symfony\Component\DomCrawler\Crawler;

//Guzzle
$client = new Client();
$resposta = $client->request('GET', 'https://www.unisenaipr.com.br/cursos/graduacao');
$html = $resposta->getBody();

//DomCrawler
//$crawler = new Crawler();
$crawler = new Crawler($html);

//$crawler->addHtmlContent($html);

$cursos = $crawler->filter('h3.item-curso__title');

foreach ($cursos as $curso) {
    echo $curso->textContent . PHP_EOL;
}
