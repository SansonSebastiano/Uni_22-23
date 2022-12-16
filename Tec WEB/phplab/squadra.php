<?php
use DB\DBAccess;
require_once "..".DIRECTORY_SEPARATOR."connection.php";

$HTMLPage = file_get_contents("squadra.html");

$connection = new DBAccess();

$playersString = "";
$playerslist = "";

$connACK = $connection->openDBConnection();

if ($connACK) {
    $playerslist = $connection->getList();
    $connection->closeDBConnection();

    if ($playerslist != null) {
        $playersString .= '<dl id="players">';

        foreach($playerslist as $player){
            // creare i vari dt e dd
        }

        $playersString .= '</dl>';
    } else {
        $playersString = "<p>Non ci sono giocatori registrati.</p>";
    }
} else {
    $playersString = "<p>I sistemi sono momentaneamente non disponibili, ci scusiamo per il disagio. Riprova più tardi.</p>";
}

echo str_replace("<playersList/>", $playersString, $HTMLPage);
?>


