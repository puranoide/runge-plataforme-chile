<?php
include_once('../config/conection.php');
session_start();

// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
echo $contraseña;
// Buscar el usuario por el correo
$consulta_usuario = mysqli_query($conexion, "SELECT * FROM user WHERE correo='$correo'");

if ($consulta_usuario) {
    if (mysqli_num_rows($consulta_usuario) > 0) {
        $usuario = mysqli_fetch_assoc($consulta_usuario);
        $_SESSION['id'] = $usuario['userid'];
        $_SESSION['correo'] = $usuario['correo'];
        $_SESSION['username'] = $usuario['username'];
        $_SESSION['rol'] = $usuario['rol']; 
        $_SESSION['password']=$usuario['userpass'];
        if ($_SESSION['password']==$contraseña) {
            if ($_SESSION['rol']=='1'){
                header('location:../views/admin/admin.php');
                exit();
            }else{
                header('location:conductoresView.php');
            }
        }else {
            echo'
            <script>
                alert("contraseña incorrecta,intentelo de nuevo");
                window.location="../../index.html";
            </script>
            
            ';
        }
       
    } else {
        echo '
            <script>
                alert("No se encontró el usuario,por favor vuelva a intentarlo");
                window.location="../../index.html";
            </script>
        ';
        exit();
    }
} else {
    echo '
        <script>
            alert("Error en la consulta a la base de datos");
            window.location="../index.html";
        </script>
    ';
    exit();
}
?>
