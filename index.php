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
        return "Prodotto in " . $this->paeseDiProduzione . " e recitato in " . strtolower($this->linguaOriginale);
    }
}

//prendo ogni array che definisce un singolo film
foreach($film as $key => $value){

    //utilizzo la sua chiave per determinarne il nome che andro' poi ad utilizzare
    //per inizializzare il nuovo oggetto (che accetterà 3 valori in entrata: title, genre e cast)
    $nome_array = "$".$key;
    $nome_array = new Movie($value["title"], $value["genre"], $value["cast"]);

    //definisco le restanti variabili
    $nome_array->generi = $value["genre"];
    $nome_array->attori = $value["cast"];
    $nome_array->regista = $value["director"];
    $nome_array->annoProduzione = $value["year_of_production"];
    $nome_array->durata = $value["movie_length"];
    $nome_array->punteggio = $value["rating"];

    //utilizzo una funzione interna per creare una stringa composta da 2 variabili
    $nome_array->origine($value["country"], $value["language"]);

    //stampo a schermo i valori
    echo "<strong>Titolo:</strong> $nome_array->titolo <br>";
    echo "<strong>Regista:</strong> $nome_array->regista <br>";
    echo "<strong>Anno di produzione:</strong> $nome_array->annoProduzione <br>";
    echo "<strong>Durata del film:</strong> $nome_array->durata <br>";
    echo "<strong>Punteggio (da 0 a 10):</strong> $nome_array->punteggio <br>";
    echo "<strong>Produzione:</strong> {$nome_array->origine($value["country"], $value["language"])} <br>";

    /* ciclo i valori di generi e aggiungo la virgola solo se l'elemento ciclato non è l'ultimo */
    echo "<strong>Generi: </strong>";
    $i=0;
    foreach($nome_array->generi as $key => $genere){
        $i++;
        if($i < count($nome_array->generi)){
            echo $genere . ", ";
        } else {
            echo $genere;
        }
    }
    echo "<br>";

    /* ripeto la stessa operazione per attori */
    echo "<strong>Attori: </strong>";
    $i=0;
    foreach($nome_array->attori as $key => $genere){
        $i++;
        if($i < count($nome_array->attori)){
            echo $genere . ", ";
        } else {
            echo $genere;
        }
    }
    echo "<br><br><br>";
}



/* ALTERNATIVA SENZA IL FOREACH, RICOPIANDO OGNI VOLTA I VALORI PER OGNI FILM */

/* 
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

// ciclo i valori di generi e aggiungo la virgola solo se l'elemento ciclato non è l'ultimo 
echo "<strong>Generi: </strong>";
$i=0;
foreach($underground->generi as $key => $genere){
    $i++;
    if($i < count($underground->generi)){
        echo $genere . ", ";
    } else {
        echo $genere;
    }
}
echo "<br>";

// ripeto la stessa operazione per attori 
echo "<strong>Attori: </strong>";
$i=0;
foreach($underground->attori as $key => $genere){
    $i++;
    if($i < count($underground->attori)){
        echo $genere . ", ";
    } else {
        echo $genere;
    }
}
echo "<br>";

echo "<strong>Regista:</strong> $underground->regista <br>";
echo "<strong>Anno di produzione:</strong> $underground->annoProduzione <br>";
echo "<strong>Durata del film:</strong> $underground->durata <br>";
echo "<strong>Punteggio (da 0 a 10):</strong> $underground->punteggio <br>";
echo "<strong>Produzione:</strong> {$underground->origine($film1["country"], $film1["language"])} <br><br><br>";


 */

/* 

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

// ciclo i valori di generi e aggiungo la virgola solo se l'elemento ciclato non è l'ultimo 
echo "<strong>Generi: </strong>";
$i=0;
foreach($anarchia->generi as $key => $genere){
    $i++;
    if($i < count($anarchia->generi)){
        echo $genere . ", ";
    } else {
        echo $genere;
    }
}
echo "<br>";

// ripeto la stessa operazione per attori 
echo "<strong>Attori: </strong>";
$i=0;
foreach($anarchia->attori as $key => $genere){
    $i++;
    if($i < count($anarchia->attori)){
        echo $genere . ", ";
    } else {
        echo $genere;
    }
}
echo "<br>";

echo "<strong>Regista:</strong> $anarchia->regista <br>";
echo "<strong>Anno di produzione:</strong> $anarchia->annoProduzione <br>";
echo "<strong>Durata del film:</strong> $anarchia->durata <br>";
echo "<strong>Punteggio (da 0 a 10):</strong> $anarchia->punteggio <br>";
echo "<strong>Produzione:</strong> {$anarchia->origine($film2["country"], $film2["language"])} <br>";
 */