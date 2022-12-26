<?php
require_once ".".DIRECTORY_SEPARATOR."connection.php";

$HTMLPage = file_get_contents("form.html");

use DB\DBAccess;

$tagPermessi = '<em><strong><ul><li><span>';

$formMessages = '';
$nome = '';
$capitano = '';
$dataNascita = '';
$luogo = '';
$altezza = '';
$squadra = '';
$ruolo = '';
$maglia = '';
$magliaNazionale = '';
$punti = '';
$riconoscimenti = '';
$note = '';
$immagine = '';

function inputCleaner($input){
    $input = trim($input);
    $input = strip_tags($input);
    $input = htmlentities($input);
    return $input;
}

function noteCleaner($input){
    global $tagPermessi;

    $input = trim($input);
    $input = strip_tags($input, $tagPermessi);
    return $input;
}

if(isset($_POST['submit'])){
    $nome = inputCleaner($_POST['nome']);
    if(strlen($nome) == 0){
        $formMessages .= '<li>Il nome non può essere vuoto</li>';
    } else {
        if(preg_match("/\d/", $nome)){
            $formMessages .= '<li>Il nome non può contenere numeri</li>';
        }
    }

    $capitano = inputCleaner($_POST['capitano']);

    $dataNascita = inputCleaner($_POST['dataNascita']);
    if(strlen($dataNascita) == 0){
        $formMessages .= '<li>Data di nascita non inserita</li>';
    } else {
        if(!preg_match("/\d{4}\-\d{2}\-\d{2}/", $nome)){
            $formMessages .= '<li>Formato della data di nascita non corretto</li>';
        }
    }

    $luogo = inputCleaner($_POST['luogo']);
    if(strlen($luogo) == 0){
        $formMessages .= '<li>Il luogo non può essere vuoto</li>';
    } else {
        if(preg_match("/\d/", $luogo)){
            $formMessages .= '<li>Il luogo non può contenere numeri</li>';
        }
    }

    $altezza = inputCleaner($_POST['altezza']);
    if(strlen($altezza) == 0){
        $formMessages .= '<li>L\'altezza non può essere vuoto</li>';
    } elseif(!(ctype_digit($altezza) && ($altezza > 129))){
            $formMessages .= '<li>L\'altezza non può contenere numeri</li>';
    }

    $squadra = inputCleaner($_POST['squadra']);
    if(strlen($squadra) == 0){
        $formMessages .= '<li>Il campo squadra non può essere vuoto</li>';
    } else {
        if(preg_match("/\d/", $squadra)){
            $formMessages .= '<li>Il campo squadra non può contenere numeri</li>';
        }
    }

    $maglia = inputCleaner($_POST['maglia']);
    if(strlen($maglia) == 0){
        $formMessages .= '<li>La maglia non può essere vuoto</li>';
    } elseif(!(ctype_digit($maglia))){
            $formMessages .= '<li>La maglia non può contenere numeri</li>';
    }

    $ruolo = inputCleaner($_POST['ruolo']);
    if(strlen($ruolo) == 0){
        $formMessages .= '<li>Il campo ruolo non può essere vuoto</li>';
    } else {
        if(preg_match("/\d/", $ruolo)){
            $formMessages .= '<li>Il campo ruolo non può contenere numeri</li>';
        }
    }

    $punti = inputCleaner($_POST['punti']);
    if(strlen($punti) == 0){
        $formMessages .= '<li>I punti non può essere vuoto</li>';
    } elseif(!(ctype_digit($punti))){
        $formMessages .= '<li>I punti deve contenere numeri</li>';
    }

    $magliaNazionale = inputCleaner($_POST['magliaNazionale']);
    if(strlen($magliaNazionale) == 0){
        $formMessages .= '<li>La maglia nazionale non può essere vuoto</li>';
    } elseif(!(ctype_digit($magliaNazionale))){
            $formMessages .= '<li>La maglia nazionale non può contenere numeri</li>';
    }


    // gli altri dati sono identici, mancano
        // note
        // riconoscimenti
        // immagine

    // dopo aver fatto tutti i controllo
    if (strlen($formMessages) == 0) {
        $connection = new DBAccess();
        $connOK = $connection->openDBConnection();

        if ($connOK) {
            $queryOK = $connection->insertNewPlayer($nome, $capitano, $dataNascita, $luogo, $squadra, $ruolo, $altezza, $maglia, $magliaNazionale, $punti, $riconoscimenti, $note);

            if ($queryOK) {
                $formMessages = '<div id="messageSuccess"><p>Il giocatore è stato inserito correttamente</p></div>';
            } else {
                $formMessages = '<div id="messageErrors"><p>Il giocatore non è stato inserito correttamente, controlla se i dati sono stati inseriti correttamente</p></div>';
            }

            $connection->closeDBConnection();
        } else {
            $formMessages = '<div id="messageErrors"><p>I nostri sistemi non sono al momento disponibili, ci scusiamo per il disagio </p></div>';
        }
    } else {
        $formMessages = '<div id="messageErrors"><ul>' . $formMessages . '</ul></div>';
    }


}

$HTMLPage = str_replace('<messaggiForm/>', $formMessages, $HTMLPage);
$HTMLPage = str_replace('<valoreNome/>', $nome, $HTMLPage);
$HTMLPage = str_replace('<valoreData/>', $dataNascita, $HTMLPage);
$HTMLPage = str_replace('<valoreLuogo/>', $luogo, $HTMLPage);
$HTMLPage = str_replace('<valoreAltezza/>', $altezza, $HTMLPage);
$HTMLPage = str_replace('<valoreSquadra/>', $squadra, $HTMLPage);
$HTMLPage = str_replace('<valoreRuolo/>', $ruolo, $HTMLPage);
$HTMLPage = str_replace('<valoreMaglia/>', $maglia, $HTMLPage);
$HTMLPage = str_replace('<valoreCapitano/>', $capitano, $HTMLPage);
$HTMLPage = str_replace('<valorePunti/>', $punti, $HTMLPage);
$HTMLPage = str_replace('<valoreMagliaNazionale/>', $magliaNazionale, $HTMLPage);
$HTMLPage = str_replace('<valoreNote/>', $note, $HTMLPage);
$HTMLPage = str_replace('<valoreRiconoscimenti/>', $riconoscimenti, $HTMLPage);
$HTMLPage = str_replace('<valoreImmagine/>', $immagine, $HTMLPage);

echo $HTMLPage;
?>
