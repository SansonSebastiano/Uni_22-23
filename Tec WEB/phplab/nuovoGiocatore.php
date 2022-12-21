
<!-- Chiedi come testare quanto fatto fin'ora -->

<?php
require_once "..".DIRECTORY_SEPARATOR."connection.php";

$HTMLPage = file_get_contents("form.html");

use DB\DBAccess;

$tagPermessi = '<em><strong><ul><li><span>';

$messagiPerForm = '';
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

function pulisciInput($input){
    $input = trim($input);
    $input = strip_tags($input);
    $input = htmlentities($input);
    return $input;
}

function pulisciNote($input){
    global $tagPermessi;

    $input = trim($input);
    $input = strip_tags($input, $tagPermessi);
    return $input;
}

if(isset($_POST['submit'])){
    $nome = pulisciInput($_POST['nome']);
    if(strlen($nome) == 0){
        $messagiPerForm .= '<li>Il nome non può essere vuoto</li>';
    } else {
        if(preg_match("/\d/", $nome)){
            $messagiPerForm .= '<li>Il nome non può contenere numeri</li>';
        }
    }

    $capitano = pulisciInput($_POST['capitano']);

    $dataNascita = pulisciInput($_POST['dataNascita']);
    if(strlen($dataNascita) == 0){
        $messagiPerForm .= '<li>Data di nascita non inserita</li>';
    } else {
        if(!preg_match("/\d{4}\-\d{2}\-\d{2}/", $nome)){
            $messagiPerForm .= '<li>Formato della data di nascita non corretto</li>';
        }
    }

    $luogo = pulisciInput($_POST['luogo']);
    if(strlen($luogo) == 0){
        $messagiPerForm .= '<li>Il luogo non può essere vuoto</li>';
    } else {
        if(preg_match("/\d/", $luogo)){
            $messagiPerForm .= '<li>Il luogo non può contenere numeri</li>';
        }
    }

    $altezza = pulisciInput($_POST['altezza']);
    if(strlen($altezza) == 0){
        $messagiPerForm .= '<li>L\'altezza non può essere vuoto</li>';
    } elseif(!(ctype_digit($altezza) && ($altezza > 129))){
            $messagiPerForm .= '<li>L\'altezza non può contenere numeri</li>';
    }

    $squadra = pulisciInput($_POST['squadra']);
    if(strlen($squadra) == 0){
        $messagiPerForm .= '<li>Il campo squadra non può essere vuoto</li>';
    } else {
        if(preg_match("/\d/", $squadra)){
            $messagiPerForm .= '<li>Il campo squadra non può contenere numeri</li>';
        }
    }

    $maglia = pulisciInput($_POST['maglia']);
    if(strlen($maglia) == 0){
        $messagiPerForm .= '<li>La maglia non può essere vuoto</li>';
    } elseif(!(ctype_digit($maglia))){
            $messagiPerForm .= '<li>La maglia non può contenere numeri</li>';
    }

    $ruolo = pulisciInput($_POST['ruolo']);
    if(strlen($ruolo) == 0){
        $messagiPerForm .= '<li>Il campo ruolo non può essere vuoto</li>';
    } else {
        if(preg_match("/\d/", $ruolo)){
            $messagiPerForm .= '<li>Il campo ruolo non può contenere numeri</li>';
        }
    }

    $punti = pulisciInput($_POST['punti']);
    if(strlen($punti) == 0){
        $messagiPerForm .= '<li>I punti non può essere vuoto</li>';
    } elseif(!(ctype_digit($punti))){
            $messagiPerForm .= '<li>I punti deve contenere numeri</li>';
    }

    $magliaNazionale = pulisciInput($_POST['magliaNazionale']);
    if(strlen($magliaNazionale) == 0){
        $messagiPerForm .= '<li>La maglia nazionale non può essere vuoto</li>';
    } elseif(!(ctype_digit($magliaNazionale))){
            $messagiPerForm .= '<li>La maglia nazionale non può contenere numeri</li>';
    }


    // gli altri dati sono identici, mancano
        // note
        // riconoscimenti
        // immagine

    // dopo aver fatto tutti i controllo
    if (strlen($messagiPerForm) == 0) {
        $connection = new DBAccess();
        $connOK = $connection->openDBConnection();

        if ($connOK) {
            $queryOK = $connection->insertNewPlayer($nome, $capitano, $dataNascita, $luogo, $squadra, $ruolo, $altezza, $maglia, $magliaNazionale, $punti, $riconoscimenti, $note);

            if ($queryOK) {
                $messagiPerForm = '<div id="messageSuccess"><p>Il giocatore è stato inserito correttamente</p></div>';
            } else {
                $messagiPerForm = '<div id="messageErrors"><p>Il giocatore non è stato inserito correttamente, controlla se i dati sono stati inseriti correttamente</p></div>';
            }

            $connection->closeDBConnection();
        } else {
            $messagiPerForm = '<div id="messageErrors"><p>I nostri sistemi non sono al momento disponibili, ci scusiamo per il disagio </p></div>';
        }
    } else {
        $messagiPerForm = '<div id="messageErrors"><ul>' . $messagiPerForm . '</ul></div>';
    }


}

$HTMLPage = str_replace('<messaggiForm/>', $messagiPerForm, $HTMLPage);
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
