<?php
require_once "..".DIRECTORY_SEPARATOR."connection.php";

$HTMLPage = file_get_contents("form.html");

use DB\DBAccess;

$connection = new DBAccess();


$tagPermessi = '<em><strong><ul><li><span>';

$messagiPerForm = '';
$nome = '';
$capitano = '';
$dataNascita = '';
$luogo = '';

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

    // gli altri dati sono identici
}

$HTMLPage = str_replace('<messaggiForm/>', $messagiPerForm, $HTMLPage);
$HTMLPage = str_replace('<valoreNome/>', $nome, $HTMLPage);
$HTMLPage = str_replace('<valoreData/>', $dataNascita, $HTMLPage);
$HTMLPage = str_replace('<valoreLuogo/>', $luogo, $HTMLPage);

echo $HTMLPage;
?>
