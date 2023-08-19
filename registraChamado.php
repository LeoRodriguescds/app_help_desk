<?php

    session_start();

    $arquivo = fopen('arquivo.hd', 'a');
    //Opens file or URL;

    $texto = $_SESSION['id'] . '-' . implode('-', $_POST);
    
    fwrite($arquivo, $texto . PHP_EOL);
    //Escreve dentro do arquivo
    //PHP_EOL quebra a linha no documento
    
    fclose($arquivo);
    //Fecha o arquivo

    header('Location: home.php');

    //ATENÇÃO: A ORDEM É DE SUMA IMPORTÂNCIA

    echo $texto;
?>