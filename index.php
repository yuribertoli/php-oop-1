<?php

require __DIR__ . "/database.php";

class Movie {

    public $titolo;
    public $generi;
    public $attori = [];
    public $regista;
    public $annoProduzione;
    public $durata;
    public $punteggio;
    public $linguaOriginale;
    public $paeseDiProduzione;

    //costruttore per richiedere subito il titolo del film, unica variabile necessaria
    public function __construct($_titolo, $_generi, $_attori){
        $this->titolo = $_titolo;
        $this->generi = $_generi;
        $this->attori = $_attori;
    }

    //unisco il paese di produzione e la lingua in cui è stato girato
    public function origine($paese, $lingua) {
        $this->paeseDiProduzione = $paese;
        $this->linguaOriginale = $lingua;
        return "Prodotto in " . $this->paeseDiProduzione . " e recitato in " . $this->linguaOriginale;
    }
}

//definisco le variabili da cui creo il percorso per i film
$film1 = $film['Underground'];
$film2 = $film['Film d\'amore e d\'anarchia'];

//prendo il nome del titolo definito nell'array ricercato nel database
$underground = new Movie($film1["title"], $film1["genre"], $film1["cast"]);

//definisco le variabili
$underground->generi = $film1["genre"];
$underground->attori = $film1["cast"];
$underground->regista = $film1["director"];
$underground->annoProduzione = $film1["year_of_production"];
$underground->durata = $film1["movie_length"];
$underground->punteggio = $film1["rating"];
$underground->origine($film1["country"], $film1["language"]);

//stampo a schermo i valori
echo "<strong>Titolo:</strong> $underground->titolo <br>";
foreach($underground->generi as $genere){
    echo "<strong>Generi:</strong> $genere <br>";
}
foreach($underground->attori as $attore){
    echo "<strong>Attori:</strong> $attore <br>";
}
echo "<strong>Regista:</strong> $underground->regista <br>";
echo "<strong>Anno di produzione:</strong> $underground->annoProduzione <br>";
echo "<strong>Durata del film:</strong> $underground->durata <br>";
echo "<strong>Punteggio (da 0 a 10):</strong> $underground->punteggio <br>";
echo "<strong>Produzione:</strong> {$underground->origine($film1["country"], $film1["language"])} <br>";

/* for ($i=0; $i<count($film); $i++){

    $underground = new Movie($film[$i]["title"]);

} */