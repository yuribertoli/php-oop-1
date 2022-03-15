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

    /* public function stampaGeneri(){

        echo "<strong>Generi:</strong>";

        for ($i=0; $i<count($this->film["Underground"]["genre"]); $i++){

            echo $i;
        
        }

        echo "<br>";
    } */
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
echo "<strong>Generi: </strong>";
foreach($underground->generi as $key => $genere){
    echo $genere . ", ";
}
echo "<br>";
echo "<strong>Attori: </strong>";
foreach($underground->attori as $key => $attore){
    echo $attore . ", ";
}
echo "<br>";
echo "<strong>Regista:</strong> $underground->regista <br>";
echo "<strong>Anno di produzione:</strong> $underground->annoProduzione <br>";
echo "<strong>Durata del film:</strong> $underground->durata <br>";
echo "<strong>Punteggio (da 0 a 10):</strong> $underground->punteggio <br>";
echo "<strong>Produzione:</strong> {$underground->origine($film1["country"], $film1["language"])} <br><br><br>";






//prendo il nome del titolo definito nell'array ricercato nel database
$anarchia = new Movie($film2["title"], $film2["genre"], $film2["cast"]);

//definisco le variabili
$anarchia->generi = $film2["genre"];
$anarchia->attori = $film2["cast"];
$anarchia->regista = $film2["director"];
$anarchia->annoProduzione = $film2["year_of_production"];
$anarchia->durata = $film2["movie_length"];
$anarchia->punteggio = $film2["rating"];
$anarchia->origine($film2["country"], $film2["language"]);

//stampo a schermo i valori
echo "<strong>Titolo:</strong> $anarchia->titolo <br>";
echo "<strong>Generi: </strong>";
foreach($anarchia->generi as $key => $genere){
    echo $genere . ", ";
}
echo "<br>";
echo "<strong>Attori: </strong>";
foreach($anarchia->attori as $key => $attore){
    echo $attore . ", ";
}
echo "<br>";
echo "<strong>Regista:</strong> $anarchia->regista <br>";
echo "<strong>Anno di produzione:</strong> $anarchia->annoProduzione <br>";
echo "<strong>Durata del film:</strong> $anarchia->durata <br>";
echo "<strong>Punteggio (da 0 a 10):</strong> $anarchia->punteggio <br>";
echo "<strong>Produzione:</strong> {$anarchia->origine($film2["country"], $film2["language"])} <br>";
