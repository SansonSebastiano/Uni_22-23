<?php
use DB\DBAccess;
require_once ".".DIRECTORY_SEPARATOR."connection.php";

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
            $playersString .= "<dt>".$player["nome"];
            if($player['capitano']){
                $playersString .= "- <em>Capitano</em>";
            }
            $playersString .= "</dt>"
            . '<dd><img src="' . $player['immagine'] . '" alt="" />'
            . '<dl class="giocatore"> <dt>Data di nascita</dt>'
            . '<dd>' . $player['dataNascita'] . '</dd>'
            . '<dt>Luogo di nascita</dt>'
            . '<dd>' . $player['luogo'] . '</dd>'
            . '<dt>Squadra</dt>'
            . '<dd>' . $player['squadra'] . '</dd>'
            . '<dt>Ruolo</dt>'
            . '<dd>' . $player['ruolo'] . '</dd>'
            . '<dt>Altezza</dt>'
            . '<dd>' . $player['altezza'] . '</dd>'
            . '<dt>Maglia</dt>'
            . '<dd>' . $player['maglia'] . '</dd>'
            . '<dt>Maglia nazionale</dt>'
            . '<dd>' . $player['magliaNazionale'] . '</dd>';

            if($player['ruolo'] != 'Libero'){
                $playersString .= '<dt> Punti totali</dt>';
            }else{
                $playersString .= '<dt> Ricezioni</dt>';
            }
            $playersString .= '<dd>' . $player['punti'] . '</dd>';

            if($player['riconoscimenti']){
                $playersString .= '<dt class="riconoscimenti">Riconoscimenti</dt>'
                . '<dd>' . $player['riconoscimenti'] . '</dd>';
            }

            if($player['note']){
                $playersString .= '<dt class="note">Note</dt>'
                . '<dd>' . $player['note'] . '</dd>';
            }

            $playersString .= '</dl></dd>';
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


