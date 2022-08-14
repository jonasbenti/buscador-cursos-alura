<?php

require 'vendor/autoload.php';
// require 'src/Buscador.php';

use GuzzleHttp\Client;
use Jonas\BuscadorDeCursos\Buscador;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['verify' => false, 'base_uri' => 'https://www.alura.com.br/']);
// $resposta = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');

// $html = $resposta->getBody();

$crawler = new Crawler();
// $crawler->addHtmlContent($html);

$cursos = $crawler->filter('span.card-curso__nome');

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');


foreach ($cursos as $curso) {
    echo $curso. "<br>";
}