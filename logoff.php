<?php
    session_start();

    //Remover indices específicos do array de sessão
    //unset()
    //Exemplo: unset($_SESSION['x'])

    //Destruir a sessaõ completamente
    //session_destroy()

    session_destroy();
    header('Location: index.php');
?>