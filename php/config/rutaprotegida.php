<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo '
    <script>
        alert("por favor debes iniciar sesion");
        window.location="../index.html";
    </script>
    ';

    session_destroy();
    die();
}
?>