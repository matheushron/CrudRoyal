<?php

$MensagemFinal = "";

$QtnLapis = 15;
$QtnCaneta = 15;
$QtnBorracha = 15;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the number from the form submission
    $NumeroDeLapis = isset($_POST['NumeroDeLapis']) ? $_POST['NumeroDeLapis'] : null;
    $NumeroDeCanetas = isset($_POST['NumeroDeCanetas']) ? $_POST['NumeroDeCanetas'] : null;
    $NumeroDeBorrachas = isset($_POST['NumeroDeBorrachas']) ? $_POST['NumeroDeBorrachas'] : null;
    
    // Ensure that the input is a valid number
    if (is_numeric($NumeroDeLapis)) {
        $precoLapis = $NumeroDeLapis * 1.5;
        // echo $precoLapis." reais de lapis, ";
        // echo "Voce vai levar " . htmlspecialchars($NumeroDeLapis). " Lapis";
    } else {
        echo "Numero de Materiais invalidos, certifique-se que colocou um nuemro entre 0 e 15";
    }

    if (is_numeric($NumeroDeCanetas)) {
        $precoCanetas = $NumeroDeCanetas * 2;
        // echo $precoCanetas." reais de canetas e ";
        // echo "Voce vai levar " . htmlspecialchars($NumeroDeCanetas). " canetas";
    } else {
        echo "Numero de Materiais invalidos, certifique-se que colocou um nuemro entre 0 e 15";
    }

    if (is_numeric($NumeroDeBorrachas)) {
        $precoBorrachas = $NumeroDeBorrachas * 3.5;
        $MensagemFinal = "Sua conta deu R$".($precoBorrachas + $precoCanetas + $precoLapis).".";
        // echo "Voce vai levar " . htmlspecialchars($NumeroDeBorrachas). " borrachas";
    } else {
        echo "Numero de Materiais invalidos, certifique-se que colocou um nuemro entre 0 e 15";
    }
} else {
    echo "";
}

$QtnLapis = $QtnLapis - $NumeroDeLapis;
$QtnCaneta = $QtnCaneta - $NumeroDeCanetas;
$QtnBorracha = $QtnBorracha - $NumeroDeBorrachas;

?>